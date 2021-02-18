<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
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

        return $request->all();
    }

    public function storeSpp(Request $request)
    {
        DB::beginTransaction();

        $jumlah = preg_replace("/[,.]/", "", $request->jumlah_bayar);
        $dibayar = preg_replace("/[,.]/", "", $request->dibayar);
        $sisaBayar = preg_replace("/[,.]/", "", $request->sisa_bayar);
        $status = $sisaBayar > 0 ? false : true;
        $bulanDibayar = implode(', ', $request->bulan_dibayar);

        try {
            $pembayaran = new Pembayaran;
            $pembayaran->pembayaran_code = Pembayaran::generateCode();
            $pembayaran->id_spp = $request->id_spp;
            $pembayaran->id_user = auth()->user()->id;
            $pembayaran->nisn = $request->nisn;
            $pembayaran->spp_bulan = $bulanDibayar;
            $pembayaran->jumlah_bayar = $jumlah;
            $pembayaran->sisa_bayar = $sisaBayar;
            $pembayaran->dibayar = $dibayar;
            $pembayaran->status_pembayaran = $status;
            $pembayaran->save();


            DB::commit();
            return response()->json(['msg' => 'transaksi berhasil dilakukan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()]);
        }
    }
}
