<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PembayaranBalance;
use App\Models\PembayaranBulan;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ApiController extends Controller
{

    public function getSppHutang(Request $request)
    {
        $nisn = $request->nisn;
        $spp = Pembayaran::where(['nisn' => $nisn, 'status_pembayaran' => false])->get();

        return response()->json($spp);
    }

    public function getSppId(Request $request)
    {
        $id = $request->id;
        $data = Pembayaran::find($id);
        return response()->json($data);
    }

    public function getSpp(Request $request)
    {
        try {
            $data = Spp::latest()->get();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function storeBalance(Request $request)
    {
        $request->validate([
            'id_pembayaran' => 'required',
            'id_spp' => 'required',
            'nisn' => 'required',
        ]);

        DB::beginTransaction();

        $outstanding = preg_replace("/[,.]/", "", $request->outstanding);

        try {
            $balance = PembayaranBalance::create([
                'balance_code' => PembayaranBalance::generateCode($request->id_spp),
                'id_pembayaran' => $request->id_pembayaran,
                'id_spp' => $request->id_spp,
                'nisn' => $request->nisn,
                'outstanding' => $outstanding,
                'status_balance' => 0,
                'catatan' => $request->catatan
            ]);

            $pembayaran = Pembayaran::findOrFail($request->id_pembayaran);
            $pembayaran->sisa_bayar = str_replace(',', '', $request->unpaid);
            if ($request->unpaid == 0) {
                $pembayaran->status_pembayaran = 1;
            }
            $pembayaran->update();

            DB::commit();

            return response()->json($balance);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()]);
        }
    }

    public function storeSpp(Request $request)
    {
        DB::beginTransaction();

        $jumlah = preg_replace("/[,.]/", "", $request->jumlah_bayar);
        $dibayar = preg_replace("/[,.]/", "", $request->dibayar);
        $sisaBayar = preg_replace("/[,.]/", "", $request->sisa_bayar);
        $status = $sisaBayar > 0 ? false : true;

        try {
            $pembayaran = new Pembayaran;
            $pembayaran->pembayaran_code = Pembayaran::generateCode();
            $pembayaran->id_spp = $request->id_spp;
            $pembayaran->id_user = auth()->user()->id;
            $pembayaran->nisn = $request->nisn;
            $pembayaran->jumlah_bayar = $jumlah;
            $pembayaran->sisa_bayar = $sisaBayar;
            $pembayaran->dibayar = $dibayar;
            $pembayaran->status_pembayaran = $status;
            $pembayaran->catatan = $request->catatan;
            $pembayaran->save();

            foreach ($request->bulan_dibayar as $bulan) {
                $pembayaranBulan = PembayaranBulan::create([
                    'id_pembayaran' => $pembayaran->id,
                    'id_spp' => $pembayaran->id_spp,
                    'bulan' => $bulan
                ]);
            }

            $data = $pembayaran;
            $data['siswa'] = $pembayaran->siswa;

            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()]);
        }
    }
}
