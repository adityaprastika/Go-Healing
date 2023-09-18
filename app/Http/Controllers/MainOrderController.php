<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;


class MainOrderController extends Controller
{
    public function index()
    {
        $data = Order::whereUserId(Auth::id())->whereStatus('Menunggu')->get();

        return view('customer.order.index' ,compact('data'));
    }

    public function edit(Order $order)
    {
        return view('customer.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        $name = $order->id;
        $order = Order::findOrFail($name);
        if($request->foto != null)
        {
            $img = $request->file('foto');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $name;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('public/order', $foto);
            $order->foto       = $foto;
        }else{
            $order->foto       = $order->foto;
        }
        // dd($order);
        $order->update();

        return redirect()->route('customer.order.index')->withSuccess('Bukti Berhasil Di Upload');
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return back()->withSuccess('Order berhasil dibatalkan');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }

    }
}
