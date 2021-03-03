<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use App\Exports\HistoriSiswa;
use App\Models\Kelas;
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
        $kelas = Kelas::with('siswa')->get();
        return view('spp.entry', compact('kelas'));
    }

    public function pelunasan()
    {
        $kelas = Kelas::with('siswa')->get();
        return view('spp.pelunasan', compact('kelas'));
    }

    public function exportHistoriTransaksi()
    {
        return Excel::download(new HistoriSiswa, 'histori-' . now() . '.xlsx');
    }
}
