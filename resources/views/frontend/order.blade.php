@extends('layouts.frontend.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
@section('content')
<div class="container">
    <form action="{{ route('order.save') }}" method="POST">
        @csrf
    <div class="table-responsive mt-4">
        <table class="table table-bordered text-center">
           <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>subtotal</th>
            </tr>
           </thead>
           <tbody>
            <tr>
                <td class="d-flex justify-content-start"> 
                    <img src="{{ Storage::url($product->freature_image) }}" alt="Product image" style="width: 50px;height: 50px;float: left;">
                    <span style="float: left;margin-left: 20px;margin-top: 5px;"> {{ $product->name }} </span>
                    </td>
                <td>
                    $<span id="order_price">{{ $product->price }}</span>
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <input type="hidden" value="{{ $product->price }}" name="unite_price">
                
                </td>
                <td>
                    <input type="number" value="1" name="quantity" style="width: 60px;border: 2px solid #d3cccc;text-align: center;font-weight: 500;border-radius: 4px;">
                </td>
                <td> $ <input type="number" value="{{ $product->price }}" name="total" style="width: 60px;border: 2px solid #d3cccc;text-align: center;font-weight: 500;border-radius: 4px;background: #cccccc" readonly></td>
            </tr>
           </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="shiping-info">
               <div class="shiping-header pb-4">
                <h3 class="text-center" style="position: relative">Shiping info</h3>
                <hr class="pb-3" style="width: 98px;border-top: 2px solid #ccc;position: absolute;top: 24px;left: 45%;">
                @if(session()->has('failed'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
               </div>
            
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Zip</label>
                                <input type="text" name="zip" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                   
                    {{-- <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="total" class="form-control">
                    </div> --}}
                    <div class="form-group text-center">
                        <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Pay & countinue">
                    </div>
                    
                    <a href="{{ route('payple.payment') }}">pay with payple</a>
            </div>
        </div>
    </div>
</form>
</div>
@endsection