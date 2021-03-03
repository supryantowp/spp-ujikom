<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelaes = Kelas::orderBy('nama_kelas', 'ASC')->get();
        return view('kelas.index', compact('kelaes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        try {
            Kelas::create($request->validated());
            alert()->success('Kelas berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswas = Siswa::where('id_kelas', $kelas->id)->get();
        return view('kelas.show', compact('kelas', 'siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrfail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKelasRequest $request, $id)
    {
        try {
            Kelas::findOrFail($id)->update($request->validated());
            alert()->success('Kelas berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        try {
            $kelas->delete();
            alert()->success('Kelas berhasil dihapus');
        } catch (\Exception $exception) {
            alert()->error('Error');
        }
        return redirect()->route('kelas.index');
    }
}
