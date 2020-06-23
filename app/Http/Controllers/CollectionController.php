<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Image;

class CollectionController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collection::orderBy('id','desc')->paginate(10);
        return view('admin.collection.index',compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $collection = new Collection();

        $validatedData = $request->validate([
            'name'     => 'required|unique:collections'
         ]);
        $collection->name = $request->name;
        $collection->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.rand(10,1000);

        $photo = $request->banner;

        if($request->has('banner')){
            $photo_name = time().rand(10,10000).'.'. $photo->getClientOriginalExtension();
            Image::make($photo)->save('upload/collection/'.$photo_name);
            $collection->banner = 'upload/collection/'.$photo_name;
           $res =  $collection->save();
        } 
        $res =  $collection->save();

        if($res) {
            $notification = array(
                'messege' => 'Collection added successfully',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $collection = Collection::findOrFail($id);
     $banner = $collection->banner;
     unlink($banner);
     if($collection->delete()) {
        $notification = array(
            'messege' => 'Collection delete successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }else{
        $notification = array(
            'messege' => 'failed to delete collection',
            'alert-type' => 'error',
        );
        return Redirect()->back()->with($notification);
    }

    }
}
