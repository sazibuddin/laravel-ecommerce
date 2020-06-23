<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
use App\About;
use App\Collection;
use App\Funfact;
use App\Team;
use App\HomeSetting;
use App\Product;
use Image;
use PhpParser\ErrorHandler\Collecting;

class HomeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_setting = HomeSetting::first();
        return view('frontend.index', compact('home_setting'));
    }


    public function contact() {
        $contactInfo = Contactus::first();

        return view('frontend.contact' , compact('contactInfo'));
    }
    public function about() {
        $about_Content = About::first();
        $funfact = Funfact::take(4)->get();
        $team1 = Team::where('id',1)->first();
        $team2 = Team::where('id',2)->first();

        return view('frontend.about',compact('about_Content','funfact','team1','team2'));
    }


    public function homeSetting() {
        $home_setting = HomeSetting::first();
        return view('admin.frontend.home' ,compact('home_setting'));
    }

    public function updatehomeSetting(Request $request , $id) {
        $home_setting = HomeSetting::findOrFail($id);
        $old_image = $request->old_image;

        $home_setting->text_one = $request->text_one;
        $home_setting->text_two = $request->text_two;
        $home_setting->button_text = $request->button_text;
        $home_setting->button_link = $request->button_link;
        $banner = $request->banner;

        if($request->has('banner')){
            // unlink($old_image);
            $banner_name = time().rand(10,10000).'.'. $banner->getClientOriginalExtension();
            Image::make($banner)->save('upload/banner/'.$banner_name);
            $home_setting->banner = 'upload/banner/'.$banner_name;
            $res = $home_setting->save();
        }else{
            $res = $home_setting->save();
        }
        if($res){
            $notification = array(
                'messege' => 'Home setting update successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
    }else{
        $notification = array(
            'messege' => 'Failed to update Home setting',
            'alert-type' => 'error',
        );
        return Redirect()->back()->with($notification);
    }
    
    }

    public function single_product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        
        return view('frontend.product_details', compact('product'));
    }
    public function single_collection($slug)
    {
        $collection = Collection::where('slug', $slug)->first();
        $coll_id = $collection->id;
        $products = Product::where('collection_id', $coll_id)->orderBy('id', 'DESC')->get();
        
        return view('frontend.shop', compact('products','collection'));
    }
}
