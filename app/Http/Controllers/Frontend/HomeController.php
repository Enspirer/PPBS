<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Booking;
use App\Models\Passengers;
use App\Models\Auth\User;
use DB;
use Mail;  
use \App\Mail\BookingUserMail;

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
            $add->pickup_date = $request->pickup_date;
            $add->pickup_time = $request->pickup_time;
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
        // dd($id);
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

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $string = str_shuffle($pin);

        $update = new Booking;
        
        // $update->booking_type = $request->booking_type;
        $update->booking_number = $string;
        // $update->pickup_from = $request->pickup_from;
        // $update->destination = $request->destination;
        // $update->pickup_date = $request->pickup_date;
        // $update->pickup_time = $request->pickup_time;
        // $update->passengers_count = $count;
        // $update->adults = $request->adults;
        // $update->child = $request->child;
        // $update->baby = $request->baby;
        // $update->total_price = $request->result_value;
        $update->number_of_luggages = $request->luggage;
        $update->vehicle_number = $request->vehicle_number;
        $update->departure_date = $request->departure_date;
        $update->departure_time = $request->departure_time;
        $update->pickup_address = $request->pickup_address;
        $update->drop_address = $request->drop_address;
        $update->return_pickup_address = $request->return_pickup_address;
        $update->return_drop_address = $request->return_drop_address;
        $update->return_vehicle_number = $request->return_vehicle_number;
        $update->return_passengers_count = $request->return_passengers_count;     
        $update->customer_name=$request->name;
        $update->customer_email=$request->email;        
        $update->customer_telephone=$request->mobile_number;
        $update->other_information=$request->other_information;
        $update->payment_method=$request->payment_method;        
        if(!empty( auth()->user()->id) === true ){
            $update->user_id=auth()->user()->id;
        }        
        $update->status = 'Pending';
                
        Booking::whereId($request->hidden_id)->update($update->toArray());   
        
        if(empty( auth()->user()->id) === true ){

            if( User::where('email',$request->email)->first() == null  ){            
            
                $words = explode(" ", $request->name);
            
                $first_name = $words[0];

                if( !empty( $words[1]) === true){
                    $second_name = $words[1];
                }else{
                    $second_name = 'Last Name';
                }                

                $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $symbols = '@#$%^&*';

                $pin_number = mt_rand(100, 999)
                    . mt_rand(100, 999)
                    . $symbols[rand(0, strlen($symbols) - 1)]
                    . $letters[rand(0, strlen($letters) - 1)];

                $password = str_shuffle($pin_number);
                
                $user_add = new User;
                
                $user_add->first_name = $first_name;
                $user_add->last_name = $second_name;
                $user_add->email = $request->email;
                $user_add->password = $password;
                $user_add->confirmed = 1;
            
                $user_add->save();

                Booking::whereId($request->hidden_id)->update(array('user_id' => $user_add->id)); 

                $details = [
                    'name' => $request->name,
                    'booking_number' => $string,
                    'email' => $request->email,
                    'password' => $password
                ];

                \Mail::to($request->email)->send(new BookingUserMail($details));

            }else{

                $user_details = User::where('email',$request->email)->first();
                $user_id = $user_details->id;

                Booking::whereId($request->hidden_id)->update(array('user_id' => $user_id));

            }
        }               
                  
        session()->flash('message','Thanks!');

        return back(); 
        

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
