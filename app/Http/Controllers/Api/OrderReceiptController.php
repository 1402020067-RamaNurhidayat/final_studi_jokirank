<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderReceiptController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $orderReceipt = $order->orderReceipt()->create([
            'image' => $request->file('image')->store('order-receipt', 'public'),
        ]);

        return response()->json([
            'message' => 'Order receipt successfully uploaded.',
            'data' => $orderReceipt,
        ]);

    }
}
