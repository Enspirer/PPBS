<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\ContactUs;
use App\Models\Booking;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookings_pending = Booking::where('status','=','Pending')->get()->count();
        $bookings = Booking::get()->count();
        $contactus = ContactUs::where('status','=','Pending')->get()->count();
        $users = User::get()->count();

        return view('backend.dashboard',[
            'bookings_pending' => $bookings_pending,
            'bookings' => $bookings,
            'contactus' => $contactus,
            'users' => $users
        ]);
    }
}
