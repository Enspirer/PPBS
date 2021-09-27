<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\BookingRatesController;
use App\Http\Controllers\Backend\PassengersController;
use App\Http\Controllers\Backend\TourBookingController;
use App\Http\Controllers\Backend\ContactUsController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('location/getdetails', [LocationController::class, 'getDetails'])->name('location.getDetails');
Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
Route::post('location/update', [LocationController::class, 'update'])->name('location.update');
Route::get('location/destroy/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

Route::get('passengers', [PassengersController::class, 'index'])->name('passengers.index');
Route::post('passengers/store', [PassengersController::class, 'store'])->name('passengers.store');
Route::get('passengers/getdetails', [PassengersController::class, 'getDetails'])->name('passengers.getDetails');
Route::get('passengers/edit/{id}', [PassengersController::class, 'edit'])->name('passengers.edit');
Route::post('passengers/update', [PassengersController::class, 'update'])->name('passengers.update');
Route::get('passengers/destroy/{id}', [PassengersController::class, 'destroy'])->name('passengers.destroy');

Route::get('booking_rates', [BookingRatesController::class, 'index'])->name('booking_rates.index');
Route::get('booking_rates/create', [BookingRatesController::class, 'create'])->name('booking_rates.create');
Route::post('booking_rates/store', [BookingRatesController::class, 'store'])->name('booking_rates.store');
Route::get('booking_rates/getdetails', [BookingRatesController::class, 'getDetails'])->name('booking_rates.getDetails');
Route::get('booking_rates/edit/{id}', [BookingRatesController::class, 'edit'])->name('booking_rates.edit');
Route::post('booking_rates/update', [BookingRatesController::class, 'update'])->name('booking_rates.update');
Route::get('booking_rates/reset/{id}', [BookingRatesController::class, 'reset'])->name('booking_rates.reset');
Route::get('booking_rates/destroy/{id}', [BookingRatesController::class, 'destroy'])->name('booking_rates.destroy');

Route::get('tour_booking', [TourBookingController::class, 'index'])->name('tour_booking.index');
Route::get('tour_booking/getdetails', [TourBookingController::class, 'getDetails'])->name('tour_booking.getDetails');
Route::get('tour_booking/edit/{id}', [TourBookingController::class, 'edit'])->name('tour_booking.edit');
Route::post('tour_booking/update', [TourBookingController::class, 'update'])->name('tour_booking.update');
Route::get('tour_booking/destroy/{id}', [TourBookingController::class, 'destroy'])->name('tour_booking.destroy');

Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::get('contact_us/getdetails', [ContactUsController::class, 'getDetails'])->name('contact_us.getDetails');
Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
Route::post('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
Route::get('contact_us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');