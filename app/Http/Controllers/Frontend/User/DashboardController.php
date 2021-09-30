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

        return view('frontend.user.dashboard',[
            'booking_pending' => $booking_pending
        ]);
    }

    public function getPendingDetails(Request $request)
    {
        $data = Booking::where('status', 'Pending')->get();

        if($request->ajax())
        {
            
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<button type="button" name="delete"  class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    // ->editColumn('status', function($data){
                    //     if($data->status == 'Pending'){
                    //         $status = '<span class="badge badge-warning">Pending</span>';
                    //     }
                    //     else{
                    //         $status = '<span class="badge badge-success">Approved</span>';
                    //     }   
                    //     return $status;
                    // })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }


}
