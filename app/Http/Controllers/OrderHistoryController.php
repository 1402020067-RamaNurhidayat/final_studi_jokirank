<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index()
    {
        return view('order.history.index')->with([
            // Get all orders which is not cancelled or completed
            'orders' => OrderHistory::all(),
            'show_edit' => true,
        ]);
    }

    public function show(OrderHistory $order_history)
    {
        return view('order.history.show')->with([
            'order_history' => $order_history,
        ]);
    }

    public function destroy(OrderHistory $order_history)
    {
        $order_history->delete();
        return redirect()->route('order.index');
    }

}
