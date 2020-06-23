<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Team;
use App\Funfact;
Use Image;
class AboutController extends Controller
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
        $about_Content = About::first();
        $team1 = Team::where('id',1)->first();
        $team2 = Team::where('id',2)->first();
        $funfact = Funfact::orderBy('id', 'DESC')->get();
        return view('admin.frontend.about',compact('about_Content','team1','team2','funfact'));
    }

    public function update_about_content(Request $request , $id) {
        $about_Content = About::findOrFail($id);
        $about_Content->aboutContent = $request->aboutContent;

        if($about_Content->save()) {
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
    public function update_team(Request $request,$id) {
        $team = Team::findOrFail($id);
        $old_image = $request->old_image;
        $team->name = $request->name;
        $team->position = $request->position;

        $photo = $request->photo;

        if($request->has('photo')){
            // unlink($old_image);
            $photo_name = time().rand(10,10000).'.'. $photo->getClientOriginalExtension();
            Image::make($photo)->save('upload/team/'.$photo_name);
            $team->photo = 'upload/team/'.$photo_name;
           $res =  $team->save();
        }else{
            $res =  $team->save();
        }
        if($res){
            $notification = array(
                'messege' => 'Team update successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
    }else{
        $notification = array(
            'messege' => 'Failed to update Team',
            'alert-type' => 'error',
        );
        return Redirect()->back()->with($notification);
    }
    }

    public function addFact(Request $request) {
        $funfact = new Funfact();

        $funfact->name = $request->name;
        $funfact->count = $request->count;

        if($funfact->save()) {
            $notification = array(
                'messege' => 'fun fact add successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'fun fact added Failed',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }



    }

    public function deleteFact($id) {
        $funfact = Funfact::findOrFail($id);
       
        if( $funfact->delete()) {
            $notification = array(
                'messege' => 'fun fact delete successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Failed to delete fun fact',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }

    }
}
