<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoketStoreRequest;
use App\Models\Loket;
use Illuminate\Http\Request;

class LoketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokets = Loket::all();
        return view('lokets.index', compact('lokets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokets.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoketStoreRequest $request)
    {
        Loket::create($request->validated());

        return redirect()->route('lokets.index')->with('success', 'Berhasil menambahkan loket');
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
        $loket  = Loket::findOrFail($id);

        return view('lokets.edit', compact('loket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoketStoreRequest $request, $id)
    {
        $loket = Loket::findOrFail($id);
        $loket->update($request->validated());
        return redirect()->route('lokets.index')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loket = Loket::findOrFail($id);
        $loket->delete();

        return redirect()->route('lokets.index')->with('success', 'Berhasil menghapus data');
    }
}
