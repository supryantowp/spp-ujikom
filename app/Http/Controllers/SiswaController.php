<?php

namespace App\Http\Controllers;

use App\DataTables\SiswaDataTable;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SiswaDataTable $dataTable)
    {
        return $dataTable->render('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelaes = Kelas::all();
        return view('siswa.add', compact('kelaes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        try {
            $siswa = Siswa::create($request->validated());
            $user = User::create([
                'name' => $siswa->nama,
                'email' => $siswa->nisn.'@gmail.com',
                'password' => Hash::make(123456789),
                'nisn' => $siswa->nisn
            ]);
            $user->assignRole('siswa');

            alert()->success('Siswa berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $siswa = Siswa::findOrFail($id);
        if($request->ajax()) {
            $data = Pembayaran::where('nisn', $siswa->nisn)->get();
            return DataTables::of($data)
                ->addColumn('spp', function($row) {
                    return $row->spp->tahun;
                })
                ->addColumn('total', function($row) {
                    return $row->jumlahIdr;
                })
                ->addColumn('tanggal', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->make(true);
        }


        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelaes = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelaes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, $id)
    {
        try {
            $siswa = Siswa::find($id);
            $siswa->update($request->validated());
            $user = User::where('nisn', $request->old_nisn)->first();
            $user->update([
                'name' => $siswa->nama,
                'email' => $siswa->nisn.'@gmail.com',
                'password' => Hash::make(123456789),
                'nisn' => $siswa->nisn
            ]);
            $user->assignRole('siswa');
            alert()->success('berhasil ditambahkan ke database');
        } catch (Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Siswa::findOrFail($id)->delete();
            alert()->success('Siswa berhasil dihapus');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('siswa.index');
    }

    public function import()
    {
        return view('siswa.import');
    }

    public function storeImport(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $extensions = ['xls', 'xlsx', 'xlm', 'xla', 'xlc', 'xlt', 'xlw'];
            $result = [$request->file('file')->getClientOriginalExtension()];

            if(in_array($result[0], $extensions)) {
                Excel::import(new SiswaImport, $request->file('file'));
                return redirect()->route('siswa.index')->with('success', 'berhasil ditambahkan ke database');
            }

            return redirect()->route('siswa.index')->with('errors', 'terjadi kesalahan : file errors');
        }

        return redirect()->route('siswa.index')->with('errors', 'terjadi kesalahan : no file');

    }
}
