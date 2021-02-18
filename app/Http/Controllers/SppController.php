<?php

namespace App\Http\Controllers;

use App\DataTables\SppDataTable;
use App\Http\Requests\StoreSppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SppDataTable $dataTable)
    {
        return $dataTable->render('spp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSppRequest $request)
    {
        $input = $request->validated();
        $input['nominal'] = preg_replace("/[,.]/", "", $request->nominal);
        try {
            Spp::create($input);
            alert()->success('Spp berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('spp.index');
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
        $spp = Spp::findOrFail($id);
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSppRequest $request, $id)
    {
        $input = $request->validated();
        $input['nominal'] = preg_replace("/[,.]/", "", $request->nominal);
        try {
            Spp::findOrFail($id)->update($input);
            alert()->success('Spp berhasil disimpan ke database');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('spp.index');
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
            Spp::findOrFail($id)->delete();
            alert()->success('Spp berhasil dihapus');
        } catch (\Exception $exception) {
            alert()->error($exception->getMessage());
        }
        return redirect()->route('spp.index');
    }
}
