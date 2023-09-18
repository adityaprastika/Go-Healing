<?php

namespace App\Http\Controllers;

use App\Models\RentalMobil;
use Illuminate\Http\Request;

class RentalMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RentalMobil::all();

        return view('admin.rentalMobil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = new RentalMobil;
        $data->namaMobil = $request->namaMobil;
        $data->noPolisi = $request->noPolisi;
        $data->harga = $request->harga;
        $data->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        $data = RentalMobil::find($request->id);
        $data->namaMobil = $request->namaMobil;
        $data->noPolisi = $request->noPolisi;
        $data->harga = $request->harga;
        $data->update();

        return back();
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
    public function destroy(RentalMobil $id)
    {
        $id->delete();

        return back()->withSuccess('Data Berhasil Dihapus');
    }
}
