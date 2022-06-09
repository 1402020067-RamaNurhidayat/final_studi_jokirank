<?php

namespace App\Http\Controllers;

use App\Models\JenisJoki;
use App\Models\JenisRank;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index')->with([
            // Get all orders which is not cancelled or completed
            'orders' => Order::where('status', '!=', Order::CANCELLED)
                ->where('status', '!=', Order::COMPLETED)
                ->get(),
            'show_edit' => true,
        ]);
    }

    public function show(Order $order)
    {
        return view('order.show')->with([
            'order' => $order,
        ]);
    }

    public function edit(Order $order)
    {
        return view('order.edit')->with([
            'order' => $order,
            'statuses' => Order::statuses(),
            'paymentMethods' => PaymentMethod::all(),
            'jenisRanks' => JenisRank::all(),
            'jenisJokis' => JenisJoki::all(),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $field = $request->validate([
            'status' => 'string|in:'.implode(',', Order::statuses()),
            'jenis_rank_id' => 'integer|exists:jenis_rank,id',
            'jenis_joki_id' => 'integer|exists:jenis_joki,id',
            'payment_method_id' => 'integer|exists:payment_method,id',
        ]);
        $order->update($field);

        return redirect()->route('order.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }

    public function search(Request $request)
    {
        $orders = Order::where('name', 'like', '%'.$request->q.'%')
            ->orWhere('email', 'like', '%'.$request->q.'%')
            ->orWhere('phone', 'like', '%'.$request->q.'%')
            ->orWhere('jenis_joki', 'like', '%'.$request->q.'%')
            ->orWhere('jenis_rank', 'like', '%'.$request->q.'%')
            ->orWhere('login_method', 'like', '%'.$request->q.'%')
            ->orWhere('payment_method', 'like', '%'.$request->q.'%')
            ->orWhere('payment_amount', 'like', '%'.$request->q.'%')
            ->orWhere('payment_status', 'like', '%'.$request->q.'%')
            ->orWhere('payment_proof', 'like', '%'.$request->q.'%')
            ->get();

        return view('order.index')->with([
            'orders' => $orders,
        ]);
    }


    public function done()
    {
        return view('order.index')->with([
            // Get all orders which is cancelled or completed
            'orders' => Order::where('status', '=', Order::CANCELLED)
                ->orWhere('status', '=', Order::COMPLETED)
                ->get(),
            'show_edit' => false,
        ]);
    }
}
