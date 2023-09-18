<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wisata::all();

        return view('admin.wisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wisata = wisata::create($request->all());

        $wisata_id = $wisata->id;
        $upload = wisata::findOrFail($wisata_id);

        if($request->foto != null)
        {
            $img = $request->file('foto');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $wisata_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('public/wisata', $foto);
            $upload->foto       = $foto;
        }else{
            $upload->foto       = $upload->foto;
        }
        $upload->update();

        return redirect()->route('admin.wisata.index')->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata)
    {
        $wisata->update($request->all());

        $wisata_id = $wisata->id;
        $upload = wisata::findOrFail($wisata_id);

        if($request->foto != null)
        {
            $img = $request->file('foto');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $wisata_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('public/wisata', $foto);
            $upload->foto       = $foto;
        }else{
            $upload->foto       = $upload->foto;
        }
        $upload->update();

        return redirect()->route('admin.wisata.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        try {
            $wisata->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
