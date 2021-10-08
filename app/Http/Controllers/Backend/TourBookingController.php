<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Passengers;
use App\Models\Booking;
use DataTables;
use DB;

class TourBookingController extends Controller
{
    
    public function index()
    {
        return view('backend.tour_booking.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Booking::where('status','!=',null)->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('admin.tour_booking.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-stamp"></i> Approval </a>';
                        $button2 = '<a href="'.route('admin.booking_print',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-success btn-sm ml-2"><i class="fas fa-print"></i> Print</a>';
                        $button3 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i> Delete</button>';

                        return $button. $button2. $button3;
                    })
                    ->addColumn('booked_date', function($data){
                        
                        $detail = '<p>'.$data->created_at->toDateString().'</p>';
                        return $detail;                        
                    })
                    ->addColumn('status', function($data){
                        
                        if($data->status == 'Approved'){
                            $details = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->status == 'Disapproved'){                            
                            $details = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $details = '<span class="badge badge-warning">Pending</span>';
                        }
                        return $details;                        
                    })

                    ->rawColumns(['action','status','booked_date'])
                    ->make(true);
        }
        return back();
    }

   
    public function edit($id)
    {
        $location = Location::get();
        $tour_booking = Booking::where('id',$id)->first();


        return view('backend.tour_booking.edit',[
            'location' => $location,
            'tour_booking' => $tour_booking
        ]);
    }

    public function update(Request $request)
    {    
        
        $update = new Booking;

        $update->status=$request->status; 
                
        Booking::whereId($request->hidden_id)->update($update->toArray());           

        return redirect()->route('admin.tour_booking.index')->withFlashSuccess('Updated Successfully'); 
                 

    }

    public function destroy($id)
    {
        Booking::where('id', $id)->delete(); 
    }


    public function booking_print($id)
    {
        $booking_print = Booking::where('id',$id)->first();

        // dd($booking_print);

        return view('backend.tour_booking.booking_print',[
            'booking_print' => $booking_print
        ]);
    }
}
