@extends('layouts.frontend.app')
@section('content')
<!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2>About HDL Designs</h2>				
        </div>
    </div>
    </section>
    
    
    <!-- Content
    ================================================== -->
    
    <!-- Container -->
    <div class="container">
    
        <div class="sixteen columns">	
            <h3 class="headline">Our History</h3><span class="line margin-bottom-30"></span><div class="clearfix"></div>
        </div>
    
        <!-- Who We Are? -->
        <div class="one-column">
            {!! $about_Content->aboutContent !!}
        </div>
    
    
    </div>
    <!-- Container / End -->
    
    <br>
    
    <!-- Container -->
    <div class="container">
        
        @foreach ($funfact as $item)
            <div class="four columns">
                <div class="counter-box" style="background-color: white !important;">
                    <span class="counter">{{ $item->count }}</span>
                    <p>{{ $item->name }}</p>
                </div>
            </div>
        @endforeach
       
        
        {{-- <div class="four columns">
            <div class="counter-box" style="background-color: white !important;">
                <span class="counter">634</span>
                <p>FUN FACT 2</p>
            </div>
        </div>
    
        <div class="four columns">
            <div class="counter-box" style="background-color: white !important;">
                <span class="counter">289</span>
                <p>FUN FACT 3</p>
            </div>
        </div>
    
        <div class="four columns">
            <div class="counter-box" style="background-color: white !important;">
                <span class="counter">1,563</span>
                <p>FUN FACT 4</p>
            </div>
        </div> --}}
    
    </div>
    <!-- Container / End -->
    
    <br>
    <br>
    
    <!-- Container -->
    <div class="container">
    
        <div class="sixteen columns">	
            <h3 class="headline">MEET THE TEAM</h3><span class="line margin-bottom-35"></span><div class="clearfix"></div>
        </div>
    
        <!-- #1 -->
        <div class="sixteen columns" style="display: flex;">
            <article class="the-team" style="padding: 10px;">
    
                <figure class="the-team-image">
                    <img src="{{ asset($team1->photo) }}" alt="" style="width: 100%;"
                </figure>
    
                <section class="the-team-content">
                    <h5>{{ $team1->name }}</h5>
                    <i>{{ $team1->position }}</i>
                        <div class="clearfix"></div>
                </section>
    
            </article>
        
    
        <!-- #2 -->
        
            <article class="the-team" style="padding: 10px;">
    
                <figure class="the-team-image">
                    <img src="{{ asset($team2->photo) }}" alt="" style="width: 100%;"
                </figure>
    
                <section class="the-team-content">
                    <h5>{{ $team2->name }}</h5>
                    <i>{{ $team2->position }}</i>				
                        <div class="clearfix"></div>
                </section>
    
            </article>
        </div>
    
    
    
    </div>
    <!-- Container / End -->
    
    <div class="margin-top-50"></div>
    
    
@endsection