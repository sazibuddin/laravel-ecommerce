<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderManageController extends Controller {
    
    public function index()
    {
        $orders = Order::orderBy('id' , 'DESC')->paginate(10);

        return view('admin.order.index' , compact('orders'));
    }
    public function view($id){
        $order = Order::findOrFail($id);

        return view('admin.order.view' , compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if($order->delete()) {
            $notification = array(
                'messege' => 'Order delete successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Failed to delte order',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

}
