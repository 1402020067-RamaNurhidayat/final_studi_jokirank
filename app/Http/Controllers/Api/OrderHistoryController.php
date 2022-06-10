<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all OrderHistory where user_id = current user id
        return OrderHistory::where('user_id', auth()->user()->id)->get();
    }
}
