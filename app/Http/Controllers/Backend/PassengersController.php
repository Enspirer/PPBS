<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\BookingRates;
use App\Models\Passengers;
use DataTables;
use DB;


class PassengersController extends Controller
{
    
    public function index()
    {
        return view('backend.passengers.index');
    }

    public function store(Request $request)
    {        
        // dd($request);

        $add = new Passengers;

        $add->name=$request->name;      
        $add->count=$request->count;    
        $add->status=$request->status;

        $add->save();

        return back()->withFlashSuccess('Added Successfully');  

    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Passengers::get();
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
            $data = Passengers::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {    
        $update = new Passengers;

        $update->name=$request->name;      
        $update->count=$request->count;    
        $update->status=$request->status;
                
        Passengers::whereId($request->hidden_id)->update($update->toArray());           

        return back()->withFlashSuccess('Updated Successfully'); 
                 

    }

    public function destroy($id)
    {
        Passengers::where('id', $id)->delete(); 
    }

}
