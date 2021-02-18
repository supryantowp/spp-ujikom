<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use App\Exports\HistoriSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('spp.entry', compact('siswas'));
    }

    public function pelunasan()
    {
        $siswas = Siswa::all();
        return view('spp.pelunasan', compact('siswas'));
    }

    public function exportHistoriTransaksi()
    {
        return Excel::download(new HistoriSiswa, 'histori-'.now().'.xlsx');
    }


}
