<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RatesController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/rates', [RatesController::class, 'index'])->name('rates');

Route::get('/online-booking', [BookingController::class, 'index'])->name('booking');
Route::post('online-booking/store', [BookingController::class, 'store'])->name('online_booking.store');

Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');
Route::post('contact-us/send', [ContactController::class, 'store'])->name('contact_us.store');

Route::get('booking_customer/{id}', [HomeController::class, 'booking_customer'])->name('booking_customer');

Route::post('booking/store', [HomeController::class, 'store'])->name('booking.store');
Route::post('booking_customer/store', [HomeController::class, 'booking_customer_store'])->name('booking_customer.store');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});


