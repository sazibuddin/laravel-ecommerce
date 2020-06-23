<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $validatedData = $request->validate([
            'name'              => 'required|unique:products',
            'price'              => 'required',
            'collection_id'     => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'freature_image'       => 'required|image|mimes:png,jpg,jpeg',
         ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->collection_id = $request->collection_id;
        $product->tags = $request->tags;
        $product->style = $request->style;
        $product->colors = $request->colors;
        $product->size = $request->size;
        $product->description = $request->description;
        $photos = array();
        $product->added_by = Auth::user()->id;

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.rand(100,1000);



        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos','public');
                array_push($photos, $path);
                //ImageOptimizer::optimize(base_path('public/').$path);
            }
            $product->photos = json_encode($photos);
        }

        if($request->hasFile('freature_image')){
            $product->freature_image = $request->freature_image->store('uploads/products/photos','public');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        if($request->hasFile('video')){
            $product->video = $request->video->store('uploads/products/video','public');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        
        if($product->save()) {
            $notification = array(
                'messege' => 'Product added successfully',
                'alert-type' => 'success',
            );
            return Redirect()->to('admin/products')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Failed to added product',
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
        $product = Product::findOrFail($id);
        return view('admin.products.edit',compact('product'));
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
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name'              => 'required',
            'price'              => 'required',
            'collection_id'     => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'freature_image'       => 'image|mimes:png,jpg,jpeg',
         ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->collection_id = $request->collection_id;
        $product->tags = $request->tags;

        $product->style = $request->style;
        $product->colors = $request->colors;
        $product->size = $request->size;
        
        $product->description = $request->description;
        $photos = array();
        // $freature_image = $request->freature_image;
        $product->added_by = Auth::user()->id;




        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos','public');
                array_push($photos, $path);
                //ImageOptimizer::optimize(base_path('public/').$path);
            }
            $product->photos = json_encode($photos);
        }

        if($request->hasFile('freature_image')){
            $product->freature_image = $request->freature_image->store('uploads/products/photos','public');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }

        if($request->hasFile('video')){
            $product->video = $request->video->store('uploads/products/video','public');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }
        
        if($product->save()) {
            $notification = array(
                'messege' => 'Product update successfully',
                'alert-type' => 'success',
            );
            return Redirect()->to('admin/products')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Failed to update product',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::findOrFail($id);
         
        if($product->delete()) {
            $notification = array(
                'messege' => 'Product delete successfully',
                'alert-type' => 'success',
            );
            return Redirect()->to('admin/products')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Failed to delete product',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
}
