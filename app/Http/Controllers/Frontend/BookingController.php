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
use \App\Mail\BookingDetailsMail;
use \App\Mail\BookingDetailsBothMail;
use DateTime;


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

        $booking_value = Booking::get();

        if(count($booking_value) == 0){
            $date = new DateTime();
            $input = 1;
            $string = date_format($date,"Ymd").sprintf('%03u', $input);
        }else{
            $booking_number = Booking::latest()->take(1)->first();
            // dd($booking_number);

            $date = new DateTime();
            $input = $booking_number->booking_number + 1;
            $newstring = substr($input, -3);
            $string = date_format($date,"Ymd").sprintf('%03u', $newstring);
        }

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
        $add->customer_email=$request->email;        
        $add->customer_telephone=$request->mobile_number;
        $add->other_information=$request->other_information;
        $add->payment_method=$request->payment_method;        
        if(!empty( auth()->user()->id) === true ){
            $add->user_id=auth()->user()->id;
        }        
        $add->status = 'Pending';
        $add->save(); 

        $pickup_from = Location::where('id',$request->pickup_from)->first()->name;
        $destination = Location::where('id',$request->destination)->first()->name;
        
        if($request->booking_type == 'One Way'){

            $booking_details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->mobile_number,
                'booking_number' => $string,
                'pickup_from' => $pickup_from,
                'destination' => $destination,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'adults' => $request->adults,
                'child' => $request->child,
                'baby' => $request->baby,
                'passengers_count' => $count,
                'pickup_address' => $request->pickup_address,
                'drop_address' => $request->drop_address,
                'vehicle_number' => $request->vehicle_number,
                'luggage' => $request->luggage,
                'total_price' => $request->result_value,
                'payment_method' => $request->payment_method,
                'booking_type' => $request->booking_type,
                'created_at' => $add->created_at->toDateString(),
            ];
            
            \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new BookingDetailsMail($booking_details));

        }else{

            $booking_details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->mobile_number,
                'booking_number' => $string,
                'pickup_from' => $pickup_from,
                'destination' => $destination,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'adults' => $request->adults,
                'child' => $request->child,
                'baby' => $request->baby,
                'passengers_count' => $count,
                'pickup_address' => $request->pickup_address,
                'drop_address' => $request->drop_address,
                'vehicle_number' => $request->vehicle_number,
                'luggage' => $request->luggage,
                'total_price' => $request->result_value,
                'payment_method' => $request->payment_method,
                'booking_type' => $request->booking_type,
                'return_pickup_address' => $request->return_pickup_address,
                'return_drop_address' => $request->return_drop_address,
                'return_vehicle_number' => $request->return_vehicle_number,
                'return_passengers_count' => $request->return_passengers_count,
                'departure_date' => $request->departure_date,
                'departure_time' => $request->departure_time,
                'other_information' => $request->other_information,
                'created_at' => $add->created_at->toDateString(),
            ];
            
            \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new BookingDetailsBothMail($booking_details));

        }      
        
        // dd($booking_details);

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

                // dd($password);

                $user_add = new User;
                
                $user_add->first_name = $first_name;
                $user_add->last_name = $second_name;
                $user_add->email = $request->email;
                $user_add->password = $password;
                $user_add->confirmed = 1;
            
                $user_add->save();

                Booking::whereId($add->id)->update(array('user_id' => $user_add->id));

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

                Booking::whereId($add->id)->update(array('user_id' => $user_id));

            }
        }               
                  
        session()->flash('message','Thanks!');

        return back();        

    }


    public function checkout(Request $request) {

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
        $add->customer_email=$request->email;        
        $add->customer_telephone=$request->mobile_number;
        $add->other_information=$request->other_information;
        $add->payment_method=$request->payment_method;        
        if(!empty( auth()->user()->id) === true ){
            $add->user_id=auth()->user()->id;
        }        
        $add->status = 'Pending';
        $add->save(); 

        $pickup_from = Location::where('id',$request->pickup_from)->first()->name;
        $destination = Location::where('id',$request->destination)->first()->name;
        
        if($request->booking_type == 'One Way'){

            $booking_details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->mobile_number,
                'booking_number' => $string,
                'pickup_from' => $pickup_from,
                'destination' => $destination,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'adults' => $request->adults,
                'child' => $request->child,
                'baby' => $request->baby,
                'pickup_address' => $request->pickup_address,
                'drop_address' => $request->drop_address,
                'vehicle_number' => $request->vehicle_number,
                'luggage' => $request->luggage,
                'total_price' => $request->result_value,
                'payment_method' => $request->payment_method,
                'booking_type' => $request->booking_type,
                'created_at' => $add->created_at->toDateString(),
            ];
            
            \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new BookingDetailsMail($booking_details));

        }else{

            $booking_details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->mobile_number,
                'booking_number' => $string,
                'pickup_from' => $pickup_from,
                'destination' => $destination,
                'pickup_date' => $request->pickup_date,
                'pickup_time' => $request->pickup_time,
                'adults' => $request->adults,
                'child' => $request->child,
                'baby' => $request->baby,
                'pickup_address' => $request->pickup_address,
                'drop_address' => $request->drop_address,
                'vehicle_number' => $request->vehicle_number,
                'luggage' => $request->luggage,
                'total_price' => $request->result_value,
                'payment_method' => $request->payment_method,
                'booking_type' => $request->booking_type,
                'return_pickup_address' => $request->return_pickup_address,
                'return_drop_address' => $request->return_drop_address,
                'return_vehicle_number' => $request->return_vehicle_number,
                'return_passengers_count' => $request->return_passengers_count,
                'departure_date' => $request->departure_date,
                'departure_time' => $request->departure_time,
                'other_information' => $request->other_information,
                'created_at' => $add->created_at->toDateString(),
            ];
            
            \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new BookingDetailsBothMail($booking_details));

        }      
        
        // dd($booking_details);

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

                // dd($password);

                $user_add = new User;
                
                $user_add->first_name = $first_name;
                $user_add->last_name = $second_name;
                $user_add->email = $request->email;
                $user_add->password = $password;
                $user_add->confirmed = 1;
            
                $user_add->save();

                Booking::whereId($add->id)->update(array('user_id' => $user_add->id));

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

                Booking::whereId($add->id)->update(array('user_id' => $user_id));

            }
        }               
                  
        return json_encode(
            [
                "booking_code" => $string,
            ]
        );
    }


    public function findBooking(Request $request) {

        $booking = Booking::where('booking_number', $request->booking_id)->where('customer_email', $request->email)->first();

        if($booking){
            $book = $booking->id;
            return redirect()->route('frontend.booking_search', [$book]);
        }else{
            return back()->withErrors('Invalid Booking Number or Email Address'); 
        }
    }


    public function bookingSearch($book) {
        
        $booking_print = Booking::where('id', $book)->first();

        return view('frontend.find_booking', ['booking_print' => $booking_print]);
    }

    public function api_find_booking(Request $request)
    {     
       
        $booking = Booking::where('booking_number', $request->booking_id)->where('customer_email',$request->email)->first();
    
        if($booking){
            return json_encode($booking);
        }else{
            return json_encode('no_data');
        }              

    }




}
