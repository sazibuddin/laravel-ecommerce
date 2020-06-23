@extends('layouts.frontend.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    
<!-- Titlebar
================================================== -->
<section class="titlebar margin-bottom-0">
    <div class="container">
        <div class="sixteen columns">
            <h2>Contact Us</h2>
        </div>
    </div>
    </section>
    
    
    <!-- Content
    ================================================== -->
    
    
    <!-- Container -->
    <div class="container margin-top-50">
        @if(session()->has('payment_cancel'))
        <div class="alert alert-success rounded-0">
            {{ session()->get('payment_cancel') }}
        </div>
        @endif
    <div class="four columns">
    
        <!-- Information -->
        <div class="widget margin-top-10">
            <div class="accordion">
                <!-- Section 3 -->
                <h3>Information</h3>
                <div>
                    <ul class="contact-informations second">
                        <li><i class="fa fa-phone"></i> <p>{{ $contactInfo->phone }}</p></li>
                        <li><i class="fa fa-envelope"></i> <p>{{ $contactInfo->email }}</p></li>
                        <li><i class="fa fa-map-marker"></i> <p>{{ $contactInfo->location }}</p></li>
                    </ul>
                </div>
    
            </div>
        </div>
    
        <!-- Social -->
        <div class="widget">
            <h3 class="headline">FOLLOW US</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>
            <ul class="social-icons">
                <li><a class="facebook" href="{{ $contactInfo->facebook_url }}"><i class="icon-facebook"></i></a></li>
                <li><a class="instagram" href="{{ $contactInfo->instagram_url }}"><i class="icon-instagram"></i></a></li>
    
            </ul>
            <div class="clearfix"></div>
        <br>
        </div>
    
    </div>
    
    <!-- Contact Form -->
    <div class="eight columns">
        <div class="extra-padding left">
            <h3 class="headline">Get in Touch</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>
    
            <!-- Contact Form -->
            <section id="contact">
    
                <!-- Success Message -->
                <mark id="message"></mark>
                @if(session()->has('success'))
                <div class="alert alert-success rounded-0">
                    {{ session()->get('success') }}
                </div>
                @endif
    
                <!-- Form -->
                <form method="POST" name="contactform" action="{{ route('contact.me') }}">
                    @csrf
    
                    <fieldset>
    
                        <div>
                            <label>Name:</label>
                            <input name="name" type="text" id="name" />
                        </div>
    
                        <div>
                            <label >Email: <span>*</span></label>
                            <input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                        </div>
    
                        <div>
                            <label>Message: <span>*</span></label>
                            <textarea name="comment" cols="40" rows="3" id="comment" spellcheck="true"></textarea>
                        </div>
    
                    </fieldset>
                    <div id="result"></div>
                    <input type="submit" class="submit" id="submit" value="Send Message" />
                    <div class="clearfix"></div>
                </form>
    
            </section>
            <!-- Contact Form / End -->
        </div>
    </div>
    </div>
    <!-- Container / End -->
    
    <div class="margin-top-50"></div>
@endsection

