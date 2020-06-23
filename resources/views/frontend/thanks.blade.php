@extends('layouts.frontend.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>Your Order has been confirmed.</strong></p>
            <hr>
            <p>
                For any issue please <a href="{{url('contact')}}">Contact us</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue Shopping</a>
            </p>
        </div>
    </div>
@endsection