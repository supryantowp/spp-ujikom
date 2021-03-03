<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totUang = Pembayaran::sum('jumlah_bayar');
        $totTransaksi = Pembayaran::count();
        $totSiswa = Siswa::count();
        $totKelas = Kelas::count();

        $search = $request->search;
        $pembayarans = $search !== null ? $this->getSearchValue($search) : [];

        $transaskiSiswa = Pembayaran::where('nisn', auth()->user()->nisn)->get();

        return view('dashboard', compact('totUang', 'totTransaksi', 'totSiswa', 'totKelas', 'pembayarans', 'transaskiSiswa'));
    }

    protected function getSearchValue($search)
    {
        return Pembayaran::whereHas('siswa', function ($query) use ($search) {
            $query->where('nama', 'ilike', '%' . $search . '%');
        })
            ->with('siswa', function ($query) use ($search) {
                $query->where('nama', 'ilike', '%' . $search . '%');
            })->get();
    }
}
