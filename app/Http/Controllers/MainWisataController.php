<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainWisataController extends Controller
{
    public function index()
    {
        $data = Wisata::all();

        return view('customer.wisata.index', compact('data'));
    }

    public function show(Wisata $wisata)
    {
        // dd($wisata);
        return view('customer.wisata.show', compact('wisata'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $jumlah = $request->jumlah;
        $input = $request->all();
        $input['user_id'] = $user;
        $input['status'] = 'Menunggu';
        $input['tipe'] = 'Wisata';
        $wisata = Wisata::whereId($request->wisata_id)->first();
        $harga = $wisata->harga;
        $input['harga'] = $harga;
        $input['total'] = $jumlah * $harga;
        //dd($input);

        Order::create($input);

        return redirect()->route('wisata')->withSuccess('Order Berhasil Dilakukan, Silahkan upload Bukti Pembayaran Anda');
    }


}
