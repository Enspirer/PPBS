<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use DataTables;
use DB;

class LocationController extends Controller
{
    public function index()
    {
        return view('backend.location.index');
    }

    public function store(Request $request)
    {        
        // dd($request);

        $location = Location::where('name',$request->name)->first(); 
        // dd($data);

        if( $location == null ){

            $add = new Location;

            $add->name=$request->name;        
            $add->status=$request->status;

            $add->save();
            return back()->withFlashSuccess('Added Successfully'); 
        }else{
            return back()->withErrors('Already Added This Location');
        }             

    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Location::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('status', function($data){
                        if($data->status == 'Enabled'){
                            $status = '<span class="badge badge-success">Enabled</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Disabled</span>';
                        }   
                        return $status;
                    })

                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Location::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {    
            $update = new Location;

            $update->name=$request->name;        
            $update->status=$request->status; 
                
            Location::whereId($request->hidden_id)->update($update->toArray());           

            return back()->withFlashSuccess('Updated Successfully'); 
                 

    }

    public function destroy($id)
    {
        $start_point = BookingRates::where('start_point',$id)->update(array('start_point' => null));
        $end_point = BookingRates::where('end_point',$id)->update(array('end_point' => null));

        Location::where('id', $id)->delete(); 
    }



}
