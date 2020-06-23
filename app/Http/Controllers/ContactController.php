<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
    public function store(Request $request) {



        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['comment'] = $request->comment;

        Mail::to('Lesan360@gmail.com')
        ->send(new ContactMe($data));

        return redirect()->back()->with('success' , "Thanks for messaging us | We will contact you shortly");


    }
}
