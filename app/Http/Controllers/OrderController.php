<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all order where user_id = current user id
        return Order::where('user_id', auth()->user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_rank_id' => 'required|integer|exists:jenis_rank,id',
            'jenis_joki_id' => 'required|integer|exists:jenis_joki,id',
            'payment_method_id' => 'required|integer|exists:payment_method,id',
            'login_method_id' => 'required|integer|exists:login_method,id',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
            'request_hero' => 'required|string|max:255',
            'phone' => 'required|string|max:25'
        ]);
        return Order::create([
            'name' => $request->name,
            'jenis_rank_id' => $request->jenis_rank_id,
            'jenis_joki_id' => $request->jenis_joki_id,
            'payment_method_id' => $request->payment_method_id,
            'login_method_id' => $request->login_method_id,
            'email' => $request->email,
            'password' => $request->password,
            'request_hero' => $request->request_hero,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Check if user is authorized to update this order
        if ($order->user_id !== auth()->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        if ($order->status == Order::PENDING) {
            $fields = $request->validate([
                'jenis_rank_id' => 'integer|exists:jenis_rank,id',
                'jenis_joki_id' => 'integer|exists:jenis_joki,id',
                'payment_method_id' => 'integer|exists:payment_method,id',
                'login_method_id' => 'integer|exists:login_method,id',
                'name' => 'string|max:255',
                'email' => 'string|email|max:255',
                'password' => 'string',
                'request_hero' => 'string|max:255',
                'phone' => 'string|max:25'
            ]);
            $order->update($fields);
            return $order;
        } else if ($order->status == Order::PAID) {
            // If paid, only allow changing name, email, password, request_hero, phone
            $fields = $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|max:255',
                'password' => 'string',
                'request_hero' => 'string|max:255',
                'phone' => 'string|max:25'
            ]);
            $order->update($fields);
        } else if ($order->status == Order::CANCELLED) {
            return response()->json([
                'message' => 'Order has been cancelled, you cannot edit it anymore'
            ], 422);
        } else {
            return response()->json([
                'message' => 'Order has been completed, you cannot edit it anymore'
            ], 422);
        }
        return $order;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        // Check if user is authorized to delete this order
        if ($order->user_id !== auth()->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        if ($order->status == Order::PENDING) {
            // Make order as cancelled
            $order->status = Order::CANCELLED;
            $order->save();
        } else {
            return response()->json([
                'message' => 'Order has been completed, you cannot delete it anymore'
            ], 422);
        }
        return $order;
    }
}
