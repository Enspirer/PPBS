<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\SendContact;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;  
use \App\Mail\ContactUsMail;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact_us');
    }

    public function store(Request $request)
    {        
        // dd($request);

        $contactus = new ContactUs;

        $contactus->name=$request->name;
        $contactus->email=$request->email;
        $contactus->subject=$request->subject;
        $contactus->message=$request->message;
        $contactus->status='Pending'; 

        $contactus->save();

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        \Mail::to(['nihsaan.enspirer@gmail.com'])->send(new ContactUsMail($details));
        
        session()->flash('message','Thanks!');

        return back();    
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    // public function send(SendContactRequest $request)
    // {
    //     Mail::send(new SendContact($request));

    //     return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    // }
}
