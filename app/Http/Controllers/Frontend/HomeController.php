<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
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

        // dd($count);
        
        $booking = BookingRates::where('booking_type',$request->booking_type)->where('start_point',$request->pickup_from)->where('end_point',$request->destination)->first();

        // dd($booking);

        if($count <= 4){
            $price = $booking->one_four_price;
        }
        // if( 4 << $count << 8){
        //     $price = $booking->five_eight_price;
        // }
        if($count > 8){
            $price = 'passengers limit exceeded';
        }

        // if($count <= 4){
        //     $price = $booking->one_four_price;
        // }elseif( $count = 5 ){
        //     $price = $booking->five_eight_price;
        // }elseif( $count > 10 ){
        //     $price = 'passengers limit exceeded';
        // }
        


        dd($price);
        


        

        return back(); 
                  

    }



}
