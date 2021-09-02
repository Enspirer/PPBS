<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use DataTables;
use DB;


class BookingRatesController extends Controller
{
    public function index()
    {
        $location = Location::where('status','=','Enabled')->get();

        return view('backend.booking_rates.index',[
            'location' => $location
        ]);
    }

    public function store(Request $request)
    {        
        // dd($request);
        
            $add = new BookingRates;

            $add->booking_type=$request->booking_type;        
            $add->start_point=$request->start_point;
            $add->end_point=$request->end_point;        
            $add->one_four_price=$request->one_four_price;
            $add->five_eight_price=$request->five_eight_price;

            $add->save();

            return back()->withFlashSuccess('Added Successfully'); 
                  

    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = BookingRates::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</button>';
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
        if(request()->ajax())
        {
            $data = BookingRates::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {    
            $update = new BookingRates;

            $update->booking_type=$request->booking_type;        
            $update->start_point=$request->start_point;
            $update->end_point=$request->end_point;        
            $update->one_four_price=$request->one_four_price;
            $update->five_eight_price=$request->five_eight_price;
                
            BookingRates::whereId($request->hidden_id)->update($update->toArray());           

            return back()->withFlashSuccess('Updated Successfully'); 
                 

    }

    public function destroy($id)
    {
        BookingRates::where('id', $id)->delete(); 
    }



}
