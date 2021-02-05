<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getSpp(Request $request)
    {
        try {
            $data = Spp::latest()->get();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function storeSpp(Request $request)
    {
        DB::beginTransaction();

        $jumlah = preg_replace("/[,.]/", "", $request->jumlah_bayar);
        $bulanDibayar = implode(',', $request->bulan_dibayar);

        try {
            DB::table('pembayaran')->insert([
                'id_spp' => $request->id_spp,
                'id_user' => auth()->user()->id,
                'nisn' => $request->nisn,
                'spp_bulan' => $bulanDibayar,
                'jumlah_bayar' => $jumlah,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return response()->json(['msg' => 'transaksi berhasil dilakukan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()]);
        }
    }
}
