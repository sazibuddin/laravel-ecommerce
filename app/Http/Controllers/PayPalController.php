<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;
session_start();

class PayPalController extends Controller
{
    public function payment() {
        $provider = new ExpressCheckout; 

        $order_item = Order::where('session_id', session_id())->orderBy('id', 'DESC')->first();

        

        $data = [];
        $data['items'] = [
            [
                'name' => $order_item->product->name,
                'price' => $order_item->unite_price,
                'desc'  => $order_item->address,
                'qty' => $order_item->quantity
            ],
        ];


         $data['invoice_id'] = $order_item->id;
         $data['invoice_description'] = "Hdl product purchase";
         $data['return_url'] = url('payment/success');
        $data['cancel_url'] = url('payple/cancel');

         $total = $order_item->total;
       

         $data['total'] = $total;

        // $response = $provider->setExpressCheckout($data);

        // // // This will redirect user to PayPal
        return redirect($response['paypal_link']);

    }

    public function cancel()
    {
        return redirect()->to('/contact')->with('payment_cancel' , 'Payment cancel, Have any issue please get in touch.');
    }
    public function success()
    {
        $order_item = Order::where('session_id', session_id())->orderBy('id', 'DESC')->first();
        return view('frontend.thanks', compact('order_item'));
    }
}
