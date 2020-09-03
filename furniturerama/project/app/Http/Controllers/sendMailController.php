<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sendMailController extends Controller
{
    function index(){
    	return view('contact');
    }

    function send(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required',
    		'message' => 'required'
    	]);
    	$details = array(
    		'name' => $request->name,
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'message' => $request->message
    	);
    	\Mail::to('furniture.rama.mail@gmail.com')->send(new \App\Mail\contactmail($details));
        return back()->with('success','Thanks for contacting! Your email has been recieved.');
    }
}
