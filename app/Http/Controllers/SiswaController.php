<?php

namespace App\Http\Controllers;

use App\DataTables\SiswaDataTable;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;

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
            Siswa::create($request->validated());
            alert()->success('Siswa berhasil disimpan ke database');
            return redirect()->route('siswa.index');
        } catch (Exception $exception) {
            alert()->error($exception->getMessage());
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
