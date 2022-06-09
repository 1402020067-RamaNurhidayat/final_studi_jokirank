<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('/order', OrderController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
