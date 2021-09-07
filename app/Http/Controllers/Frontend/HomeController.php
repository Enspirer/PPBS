<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Booking;
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

        if($booking == null){
            return back()->withErrors('There is no such a Package for Now. Please choose another Package'); 
        }
        
        $output = [];

        foreach(json_decode($booking->price_details) as $key => $price_detail){

            if($count == $price_detail->count){
                $output = [
                    'count' => $price_detail->count,
                    'price' => $price_detail->price,
                    'pickup_from' => $request->pickup_from,
                    'destination' => $request->destination
                ];

            }
        }
        // dd($output);

        if(count($output) == 0){
            return back()->withErrors('Passengers limit exceeded');
        }else{
            $add = new Booking;

            $add->booking_type = $request->booking_type;
            $add->pickup_from = $request->pickup_from;
            $add->destination = $request->destination;
            $add->passengers_count = $count;
            $add->adults = $request->adults;
            $add->child = $request->child;
            $add->baby = $request->baby;
            $add->total_price = $request->result_value;
    
            $add->save();
    
            // dd($add->id);

            // return back(); 
            return redirect()->route('frontend.booking_customer',$add->id); 
        }

            // return json_encode($output);         

    }

    public function booking_customer($id)
    {
        $location = Location::where('status','=','Enabled')->get();
        $booking = Booking::where('id',$id)->first();

        return view('frontend.booking_customer',[
            'location' => $location,
            'booking' => $booking
        ]);
    }

    public function booking_customer_store(Request $request)
    {    
        // dd($request);

        $count = $request->adults + $request->child + $request->baby;
 
        $booking = BookingRates::where('booking_type',$request->booking_type)
        ->where('start_point',$request->pickup_from)
        ->where('end_point',$request->destination)
        ->first();

        if($booking == null){
            return back()->withErrors('There is no such a Package for Now. Please choose another Package'); 
        }
        
        $output = [];

        foreach(json_decode($booking->price_details) as $key => $price_detail){

            if($count == $price_detail->count){
                $output = [
                    'count' => $price_detail->count,
                    'price' => $price_detail->price,
                    'pickup_from' => $request->pickup_from,
                    'destination' => $request->destination
                ];

            }
        }

        if($request->result_value == null){
            $total_price = Booking::where('id',$request->hidden_id)->first()->total_price;
        }else{
            $total_price = $request->result_value;
        }
        
        if(count($output) == 0){
            return back()->withErrors('Passengers limit exceeded');
        }else{

            $update = new Booking;

            $update->booking_type = $request->booking_type;
            $update->pickup_from = $request->pickup_from;
            $update->destination = $request->destination;
            $update->passengers_count = $count;
            $update->adults = $request->adults;
            $update->child = $request->child;
            $update->baby = $request->baby;
            $update->total_price = $total_price;
            $update->customer_title=$request->title;        
            $update->customer_name=$request->name;
            $update->customer_email=$request->email;        
            $update->customer_telephone=$request->telephone;
            $update->status = 'Pending';
                
            Booking::whereId($request->hidden_id)->update($update->toArray());           

            return back(); 
        }

    }    

// ******************************  api  *****************************************************

    public function api_booking(Request $request)
    {     
        // dd($request);        

        $count = 0 + $request->adults + $request->child + $request->baby;
        // dd($count);

        $booking = BookingRates::where('booking_type',$request->booking_type)
        ->where('start_point',$request->pickup_from)
        ->where('end_point',$request->destination)
        ->first();

        // dd($booking);

        if($booking == null){
            return('There is no such a Package for Now. Please choose another Package!');
        }

        
        $max = json_decode($booking->price_details);
        $max_count = end($max);
        $max_count_number = $max_count->count;
       
        
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
            elseif($count > $max_count_number){
                $output = [
                    'price' => 'passengers limit exceeded'
                ];
            }


        }

        if(count($output) == 0){
            return('passengers limit exceeded');
        }

        return json_encode($output);                  

    }

    



}
