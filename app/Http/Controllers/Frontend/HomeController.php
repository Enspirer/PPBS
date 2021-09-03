<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Passengers;
use DataTables;
use DB;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $location = Location::where('status','=','Enabled')->get();

        return view('frontend.index',[
            'location' => $location
        ]);
    }

    public function store(Request $request)
    {     
        // dd($request);        

        $count = $request->adults + $request->child + $request->baby;

        $booking = BookingRates::where('booking_type',$request->booking_type)
        ->where('start_point',$request->pickup_from)
        ->where('end_point',$request->destination)
        ->first();

        // dd($booking);

        if($booking == null){
            return('Something Error!');
        }

        // $start_point = Location::where('id',$booking->start_point)->first();
        // $end_point = Location::where('id',$booking->end_point)->first();
        
        $output = [];

        foreach(json_decode($booking->price_details) as $key => $price_detail){
            // dd($price_detail);

            if($count == $price_detail->count){
                $output = [
                    'count' => $price_detail->count,
                    'price' => $price_detail->price,
                    'pickup_from' => $request->pickup_from,
                    'destination' => $request->destination
                ];

            }
        }

        if(count($output) == 0){
            return('passengers limit exceeded');
        }

        return json_encode($output);                  

    }


    public function api_booking(Request $request)
    {     
        // dd($request);        

        $count = $request->adults + $request->child + $request->baby;

        $booking = BookingRates::where('booking_type',$request->booking_type)
        ->where('start_point',$request->pickup_from)
        ->where('end_point',$request->destination)
        ->first();

        // dd($booking);

        if($booking == null){
            return('Something Error!');
        }

        // $start_point = Location::where('id',$booking->start_point)->first();
        // $end_point = Location::where('id',$booking->end_point)->first();
        
        $output = [];

        foreach(json_decode($booking->price_details) as $key => $price_detail){
            // dd($price_detail);

            if($count == $price_detail->count){
                $output = [
                    'count' => $price_detail->count,
                    'price' => $price_detail->price,
                    'pickup_from' => $request->pickup_from,
                    'destination' => $request->destination
                ];

            }
        }

        if(count($output) == 0){
            return('passengers limit exceeded');
        }

        return json_encode($output);                   

    }



}
