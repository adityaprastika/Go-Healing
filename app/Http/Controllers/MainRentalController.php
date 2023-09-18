<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MainRentalController extends Controller
{
    public function index()
    {
        $data = Mobil::all();

        return view('customer.rental.index', compact('data'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $jumlah = $request->jumlah;
        $input = $request->all();
        $input['user_id'] = $user;
        $input['tanggal_selesai'] = Carbon::parse($request->tanggal)->addDays($jumlah);
        $input['status'] = 'Menunggu';
        $input['tipe'] = 'Rental';
        $mobil = Mobil::whereId($request->mobil_id)->first();
        $harga = $mobil->harga;
        $input['harga'] = $harga;
        $input['total'] = $jumlah * $harga;
        //dd($input);

        Order::create($input);

        return redirect()->route('rental')->withSuccess('Order Berhasil Dilakukan, Silahkan upload Bukti Pembayaran Anda');
    }

    public function edit(Order $order)
    {

    }

    public function upload()
    {

    }

    public function cancel()
    {

    }
}
