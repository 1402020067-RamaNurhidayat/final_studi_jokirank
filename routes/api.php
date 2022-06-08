<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/form_data', function (Request $request) {
    return response([
        'payment_method' => \App\Models\PaymentMethod::all(),
        'login_method' => \App\Models\LoginMethod::all(),
        'jenis_rank' => \App\Models\JenisRank::all(),
        'jenis_joki' => \App\Models\JenisJoki::all(),
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
