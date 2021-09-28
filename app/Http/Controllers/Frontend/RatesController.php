<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Passengers;
use App\Models\Booking;
use DB;


/**
 * Class RatesController.
 */
class RatesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $oneway_rates = BookingRates::where('booking_type','=','One Way')->get();
        // dd($oneway_rates);
        $return_rates = BookingRates::where('booking_type','=','Return')->get();

        return view('frontend.rates',[
            'oneway_rates' => $oneway_rates,
            'return_rates' => $return_rates
        ]);
    }

}
