<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Booking;
use App\Models\Passengers;
use App\Models\Auth\User;
use DB;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    
    public function index()
    {
        $booking_pending = Booking::where('status','=','Pending')->get();

        // dd(count(Booking::where('status','=','Pending')->get()));

        return view('frontend.user.dashboard',[
            'booking_pending' => $booking_pending
        ]);
    }

    public function getPendingDetails(Request $request)
    {
        if($request->ajax())
        {            
            $data = Booking::where('status','=','Pending')->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data)
            
            ->addColumn('action', function($data){
                       
                $button = '<a href="'.route('frontend.user.booking_print',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View</a>';
                return $button;
            })                 
                     
            ->rawColumns(['action'])  
            ->make(true);
        }
        return back();
    }  
    
    public function getCompletedDetails(Request $request)
    {
        if($request->ajax())
        {            
            $data = Booking::where('status','=','Approved')->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data)  
            
            ->addColumn('action', function($data){
                       
                $button = '<a href="'.route('frontend.user.booking_print',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View</a>';
                return $button;
            })                 
                     
            ->rawColumns(['action'])  
                    
            ->make(true);
        }
        return back();
    } 

    public function getCancelledDetails(Request $request)
    {
        if($request->ajax())
        {            
            $data = Booking::where('status','=','Disapproved')->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data)  
            
            ->addColumn('action', function($data){
                       
                $button = '<a href="'.route('frontend.user.booking_print',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View</a>';
                return $button;
            })                 
                     
            ->rawColumns(['action'])  
                    
            ->make(true);
        }
        return back();
    } 

    public function getDraftDetails(Request $request)
    {
        if($request->ajax())
        {            
            $data = Booking::where('status','=',null)->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data) 

            ->addColumn('action', function($data){
                       
                $button = '<a href="'.route('frontend.booking_customer',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-arrow-circle-right"></i> Continue</a>';
                return $button;
            })                 
                     
            ->rawColumns(['action'])           
                    
            ->make(true);
        }
        return back();
    } 



    public function booking_print($id)
    {
        $booking_print = Booking::where('id',$id)->first();

        // dd($booking_print);

        return view('frontend.user.booking_print',[
            'booking_print' => $booking_print
        ]);
    }




}
