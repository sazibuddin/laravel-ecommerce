<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
class ContactusController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $contactInfo = Contactus::first();

        return view('admin.frontend.contact', compact('contactInfo'));
    }
    public function update(Request $request , $id){
        $contactInfo = Contactus::findOrFail($id);

        $contactInfo->phone = $request->phone;
        $contactInfo->email = $request->email;
        $contactInfo->location = $request->location;
        $contactInfo->facebook_url = $request->facebook_url;
        $contactInfo->instagram_url = $request->instagram_url;
        $contactInfo->phone = $request->phone;

        if($contactInfo->save()) {
            $notification = array(
                'messege' => 'information update successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'information update Failed',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
}
