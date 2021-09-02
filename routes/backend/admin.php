<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\BookingRatesController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('location/getdetails', [LocationController::class, 'getDetails'])->name('location.getDetails');
Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
Route::post('location/update', [LocationController::class, 'update'])->name('location.update');
Route::get('location/destroy/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

Route::get('booking_rates', [BookingRatesController::class, 'index'])->name('booking_rates.index');
Route::post('booking_rates/store', [BookingRatesController::class, 'store'])->name('booking_rates.store');
Route::get('booking_rates/getdetails', [BookingRatesController::class, 'getDetails'])->name('booking_rates.getDetails');
Route::get('booking_rates/edit/{id}', [BookingRatesController::class, 'edit'])->name('booking_rates.edit');
Route::post('booking_rates/update', [BookingRatesController::class, 'update'])->name('booking_rates.update');
Route::get('booking_rates/destroy/{id}', [BookingRatesController::class, 'destroy'])->name('booking_rates.destroy');