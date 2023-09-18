<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mobil;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::whereUserId(Auth::id())->whereStatus('Terverifikasi')->get();

        return view('customer.history.index' ,compact('data'));
    }

    public function cetak($id)
    {
        $data = Order::whereId($id)->first();


        return view('admin.report.nota' ,compact('data'));
    }
}
