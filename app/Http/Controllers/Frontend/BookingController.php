<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Booking;
use App\Models\Passengers;
use DB;

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
        $location = Location::where('status','=','Enabled')->get();

        return view('frontend.booking',[
            'location' => $location
        ]);
    }

    public function store(Request $request)
    {    
        // dd($request);

        $count = $request->adults + $request->child + $request->baby;

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $string = str_shuffle($pin);

        $add = new Booking;
        
        $add->booking_type = $request->booking_type;
        $add->booking_number = $string;
        $add->pickup_from = $request->pickup_from;
        $add->destination = $request->destination;
        $add->pickup_date = $request->pickup_date;
        $add->pickup_time = $request->pickup_time;
        $add->passengers_count = $count;
        $add->adults = $request->adults;
        $add->child = $request->child;
        $add->baby = $request->baby;
        $add->total_price = $request->result_value;
        $add->number_of_luggages = $request->luggage;
        $add->vehicle_number = $request->vehicle_number;
        $add->departure_date = $request->departure_date;
        $add->departure_time = $request->departure_time;
        $add->pickup_address = $request->pickup_address;
        $add->drop_address = $request->drop_address;
        $add->return_pickup_address = $request->return_pickup_address;
        $add->return_drop_address = $request->return_drop_address;
        $add->return_vehicle_number = $request->return_vehicle_number;
        $add->return_passengers_count = $request->return_passengers_count;     
        $add->customer_name=$request->name;       
        $add->customer_telephone=$request->mobile_number;
        $add->other_information=$request->other_information;
        $add->payment_method=$request->payment_method;
        $add->status = 'Pending';
        $add->save();                
                  
        session()->flash('message','Thanks!');

        return back();        

    }

}
