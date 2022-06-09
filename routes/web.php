<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceRankController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');

    Route::resource('/users', UserController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/orders/done', [OrderController::class, 'done'])->name('order.done');

    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::resource('/rank', ServiceRankController::class);
        Route::resource('/jenis', ServiceTypeController::class);
    });
});

require __DIR__.'/auth.php';
