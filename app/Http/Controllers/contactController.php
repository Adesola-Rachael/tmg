<?php

namespace App\Http\Controllers;
use App\Mail\contactMail;
use Illuminate\Http\Request;
use App\Models\contact;
use Mail;

class contactController extends Controller
{
    public function getcontact(){
    	$pageTitle="contact";
    	return view('contact',compact('pageTitle'));
    }
    public function createContact(){
    	//
    }
    public function sendEmail(Request $request)
    {
    	$details=[
			'name'=>$request->name,
			'subject'=>$request->subject,
			'email'=>$request->email,
			'phone'=>$request->phone,
			'message'=>$request->message

    	];
    	Mail::to('rachaeladesolami1616@gmail.com')->send(new contactMail($details)); 
    	return back()->with('message','messsage sent');
    }
    
}
