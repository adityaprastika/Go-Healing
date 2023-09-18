<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Order;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all()->count();
        $mobil = Mobil::all()->count();
        $order = Order::whereStatus('Menunggu')->count();
        $verif = Order::whereStatus('Terverifikasi')->count();
        $totalorder = Order::all()->count();
        $wisata = Wisata::all()->count();

        return view('home', compact('user','mobil','order','wisata','verif','totalorder'));
    }
}