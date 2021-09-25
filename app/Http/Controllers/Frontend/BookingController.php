<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


/**
 * Class BookingController.
 */
class BookingController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.booking');
    }

}
