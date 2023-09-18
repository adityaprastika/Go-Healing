<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainTravelController extends Controller
{
    public function index()
    {
        $data = Travel::whereStatus('tersedia')->get();

        return view('customer.travel.index', compact('data'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $jumlah = $request->jumlah;
        $input = $request->all();
        $input['user_id'] = $user;
        $input['status'] = 'Menunggu';
        $input['tipe'] = 'Travel';
        $travel = Travel::whereId($request->travel_id)->first();
        $harga = $travel->harga;
        $input['harga'] = $harga;
        $input['tanggal'] = $travel->tanggal_berangkat;
        $input['total'] = $jumlah * $harga;
        //dd($input);

        Order::create($input);

        return redirect()->route('travel')->withSuccess('Order Berhasil Dilakukan, Silahkan upload Bukti Pembayaran Anda');
    }

    public function edit()
    {

    }

    public function upload()
    {

    }

    public function cancel()
    {

    }
}
