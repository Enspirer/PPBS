<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    
    
    public function index()
    {
        return view('backend.contact_us.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = ContactUs::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.contact_us.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Pending'){
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }
                        else{
                            $status = '<span class="badge badge-success">Seen</span>';
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
        $contact_us = ContactUs::where('id',$id)->first();
        
        // dd($contact_us);              
        
        return view('backend.contact_us.edit',[
            'contact_us' => $contact_us         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $up_contactus = new ContactUs;

        $up_contactus->status='Seen';        
        
        ContactUs::whereId($request->hidden_id)->update($up_contactus->toArray());

        return redirect()->route('admin.contact_us.index')->withFlashSuccess('Updated Successfully'); 
                            

    }

    public function destroy($id)
    {        
        $data = ContactUs::findOrFail($id);
        $data->delete();   
    }


}
