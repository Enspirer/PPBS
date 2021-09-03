<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Passengers;
use DataTables;
use DB;


class BookingRatesController extends Controller
{
    public function index()
    {
        // $location = Location::where('status','=','Enabled')->get();

        return view('backend.booking_rates.index');
    }

    public function create()
    {
        $location = Location::where('status','=','Enabled')->get();
        $passengers = Passengers::where('status','=','Enabled')->get();

        return view('backend.booking_rates.create',[
            'location' => $location,
            'passengers' => $passengers
        ]);
    }

    public function store(Request $request)
    {        
        // dd($request);

        $output = [];

        foreach($request->name as $key => $pax_name){
            $same_output = [
                'name' => $pax_name,
                'count' => $request->count[$key],
                'price' => $request->price[$key]
            ];

            array_push($output,$same_output);
        }

        // dd($output);
        
        $add = new BookingRates;

        $add->booking_type=$request->booking_type;        
        $add->start_point=$request->start_point;
        $add->end_point=$request->end_point;        
        $add->price_details = json_encode($output);

        $add->save();

        return redirect()->route('admin.booking_rates.index')->withFlashSuccess('Added Successfully'); 
                  

    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = BookingRates::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('admin.booking_rates.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('start_point', function($data){
                        
                        if($data->start_point == null){
                            $details = '<span class="badge badge-danger">Not Set</span>';
                        }elseif(Location::where('id',$data->start_point)->where('status','=','Disabled')->first()){                            
                            $details = '<span class="badge badge-warning">Location Disabled</span>';
                        }else{
                            $details = Location::where('id',$data->start_point)->first()->name;
                        }
                        return $details;                        
                    })
                    ->addColumn('end_point', function($data){
                        
                        if($data->end_point == null){
                            $details2 = '<span class="badge badge-danger">Not Set</span>';
                        }elseif(Location::where('id',$data->end_point)->where('status','=','Disabled')->first()){                            
                            $details = '<span class="badge badge-warning">Location Disabled</span>';
                        }else{
                            $details2 = Location::where('id',$data->end_point)->first()->name;
                        }
                        return $details2;                        
                    })

                    ->rawColumns(['action','start_point','end_point'])
                    ->make(true);
        }
        return back();
    }

   
    public function edit($id)
    {
        $location = Location::where('status','=','Enabled')->get();
        $passengers = Passengers::where('status','=','Enabled')->get();
        $booking_rates = BookingRates::where('id',$id)->first();
        
        // $booking_rates->price_details;

        // $output = [];

        // foreach($request->name as $key => $pax_name){
        //     $same_output = [
        //         'name' => $pax_name,
        //         'price' => $request->price[$key]
        //     ];

        //     array_push($output,$same_output);
        // }

        return view('backend.booking_rates.edit',[
            'location' => $location,
            'passengers' => $passengers,
            'booking_rates' => $booking_rates
        ]);
    }

    public function update(Request $request)
    {    
        $output = [];

        foreach($request->name as $key => $pax_name){
            $same_output = [
                'name' => $pax_name,
                'price' => $request->price[$key]
            ];

            array_push($output,$same_output);
        }

        $update = new BookingRates;

        $update->booking_type=$request->booking_type;        
        $update->start_point=$request->start_point;
        $update->end_point=$request->end_point;        
        $update->price_details = json_encode($output);
                
        BookingRates::whereId($request->hidden_id)->update($update->toArray());           

        return back()->withFlashSuccess('Updated Successfully'); 
                 

    }

    public function destroy($id)
    {
        BookingRates::where('id', $id)->delete(); 
    }



}
