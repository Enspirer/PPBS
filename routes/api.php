<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BookingController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('api_booking', [HomeController::class, 'api_booking'])->name('api_booking');
Route::post('api_find_booking', [BookingController::class, 'api_find_booking'])->name('api_find_booking');

Route::post('payment-booking', [BookingController::class, 'checkout'])->name('checkout_booking');