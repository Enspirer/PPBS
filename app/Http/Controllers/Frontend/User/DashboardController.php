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
            
                    // ->addColumn('action', function($data){
                       
                    //     $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    //     return $button;
                    // })                  
                    
                    
                    // ->rawColumns(['action'])
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
                    
                    ->make(true);
        }
        return back();
    } 




}
