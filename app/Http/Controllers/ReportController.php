<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mobil;
use App\Models\Order;
use App\Models\Travel;
use App\Models\Wisata;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now()->translatedFormat('d F Y');

        // $this->ttdName = 'Dr. H. Sufiansyah, M.AP';
    }

    public function userall()
    {
        $data = User::all();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.user', compact('now', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan User.pdf');
    }

    public function wisataall()
    {
        $data = Wisata::all();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.wisata', compact('now', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Wisata.pdf');
    }
    public function mobilall()
    {
        $data = Mobil::all();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.mobil', compact('now', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Mobil.pdf');
    }
    public function travelall()
    {
        $data = Travel::all();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.travel', compact('now', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Travel.pdf');
    }

    public function orderall()
    {
        $data = Order::whereStatus('menunggu')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.order', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order.pdf');
    }

    public function orderfilter()
    {
        return view('admin.order.filter');
    }

    public function orderdate(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereStatus('Menunggu')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.orderdate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order.pdf');
    }

    public function orderwisata()
    {
        $data = Order::whereNotNull('wisata_id')->whereStatus('Menunggu')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.orderwisata', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Wisata.pdf');
    }
    public function ordertravel()
    {
        $data = Order::whereNotNull('travel_id')->whereStatus('Menunggu')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.ordertravel', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Travel.pdf');
    }

    public function orderrental()
    {
        $data = Order::whereNotNull('mobil_id')->whereStatus('Menunggu')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.orderrental', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Rental.pdf');
    }

    public function orderfilterwisata()
    {
        return view('admin.order.filterwisata');
    }

    public function orderfiltertravel()
    {
        return view('admin.order.filtertravel');
    }

    public function orderfilterrental()
    {
        return view('admin.order.filterrental');
    }

    public function orderdatewisata(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereNotNull('wisata_id')->whereStatus('Menunggu')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.orderwisatadate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Wisata.pdf');
    }

    public function orderdatetravel(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereNotNull('travel_id')->whereStatus('Menunggu')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.ordertraveldate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Travel.pdf');
    }

    public function orderdaterental(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereNotNull('mobil_id')->whereStatus('Menunggu')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.orderrentaldate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Order Rental.pdf');
    }


    public function veriffilter()
    {
        return view('admin.verif.filter');
    }
    public function veriffilterwisata()
    {
        return view('admin.verif.filterwisata');
    }

    public function veriffiltertravel()
    {
        return view('admin.verif.filtertravel');
    }

    public function veriffilterrental()
    {
        return view('admin.verif.filterrental');
    }

    public function filterpendapatan()
    {
        return view('admin.pendapatan.filterpendapatan');
    }

    public function verifdate(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereStatus('Terverifikasi')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.verifdate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Wisata Terverifikasi.pdf');
    }

    public function pendapatan(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereStatus('Terverifikasi')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.pendapatan', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pendapatan.pdf');
    }

    public function verifdatewisata(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereTipe('Wisata')->whereStatus('Terverifikasi')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.verifwisatadate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Wisata Terverifikasi.pdf');
    }

    public function verifdatetravel(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereTipe('Travel')->whereStatus('Terverifikasi')->get();
        $now = $this->now;
        // dd($data);

        $pdf = PDF::loadView('admin.report.veriftraveldate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Travel Terverifikasi.pdf');
    }

    public function verifdaterental(Request $request)
    {
        $start  = $request->start;
        $end  = $request->end;
        $data = Order::wherebetween('tanggal', [$start, $end])->whereTipe('Rental')->whereStatus('Terverifikasi')->get();
        $now = $this->now;

        $pdf = PDF::loadView('admin.report.verifrentaldate', compact('now', 'data', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Rental Terverifikasi.pdf');
    }

    public function verifall()
    {
        $data = Order::whereStatus('Terverifikasi')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.verif', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Verifikasi Wisata.pdf');
    }

    public function verifwisata()
    {
        $data = Order::whereNotNull('wisata_id')->whereStatus('Terverifikasi')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.verifwisata', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Verifikasi Wisata.pdf');
    }

    public function veriftravel()
    {
        $data = Order::whereNotNull('travel_id')->whereStatus('Terverifikasi')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.veriftravel', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Verifikasi Travel.pdf');
    }

    public function verifrental()
    {
        $data = Order::whereNotNull('mobil_id')->whereStatus('Terverifikasi')->get();
        $now = $this->now;
        $pdf = PDF::loadView('admin.report.verifrental', compact('now', 'data'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Verifikasi Rental.pdf');
    }
}
