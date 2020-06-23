@extends('layouts.frontend.app')

@section('content')
    
<!-- Slider
================================================== -->
<div class="container fullwidth-element home-slider">

	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>

				<!-- Slide 1  -->
				<li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
 					<img src="{{ asset($home_setting->banner) }}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption dark sfb fadeout" data-x="750" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>{{ $home_setting->text_one }}</h2>
						<h3>{{ $home_setting->text_two }}</h3>
						<a href="{{ $home_setting->button_link }}" class="caption-btn">{{ $home_setting->button_text }}</a>
					</div>
				</li>

				 {{-- DISABLED FOR NOW --}}
				{{-- Slide 2  --}}
				{{-- <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500" >
					<img src="images/slider.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption sfb fadeout" data-x="145" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>Dress Sharp</h2>
						<h3>Learn from the classics</h3>
						<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>
					</div>
				</li> --}}


			 {{-- Slide 3  --}}
				{{-- <li data-transition="fadetotopfadefrombottom" data-slotamount="7" data-masterspeed="1000">
 					<img src="images/slider3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
 					<div class="caption dark sfb fadeout" data-x="850" data-y="170" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
						<h2>New In</h2>
						<h3>Pants and T-Shirts</h3>
						<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>
					</div>
				</li> --}}
				
				
			</ul>
		</div>
	</div>
</div>


<!-- Featured
================================================== -->
<div class="container" >

	@php
		$collection = App\Collection::orderBy('id', 'DESC')->limit(3)->get();
	@endphp
@foreach ($collection as $collection_item)
<div class="one-third column">
	<a href="{{ url('shop/'.$collection_item->slug) }}" class="img-caption" >
		<figure>
			<img src="{{ asset($collection_item->banner) }}" alt="" style="width: 100%;"/>
			<figcaption>
				<h3>{{ $collection_item->name }}</h3>
				<span>Browse This Collection</span>
			</figcaption>
		</figure>
	</a>
</div>	
@endforeach


	{{-- <div class="one-third column">
		<a href="#" class="img-caption" >
			<figure>
				<img src="{{ asset('frontend/images/lightbox-sample-01a.jpg') }}" alt="" style="width: 100%;"/>
				<figcaption>
					<h3>HDL CONTOURS</h3>
					<span>Browse This Collection</span>
				</figcaption>
			</figure>
		</a>
	</div> --}}

</div>
<div class="clearfix"></div>


<!-- New Arrivals
================================================== -->
<div class="container">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">NEW ADDITIONS</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Carousel -->
	<div id="new-arrivals" class="showbiz-container sixteen columns" >

		<!-- Navigation -->
		<div class="showbiz-navigation">
			<div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clearfix"></div>

		<!-- Products -->
		<div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
			<div class="overflowholder">

				<ul>
	@php
		$recent_product = App\Product::orderBy('id', 'DESC')->limit(10)->get();	
	@endphp
				@foreach ($recent_product as $product)
				<li>
					<figure class="product">
						<div class="mediaholder">
							<a href="{{ url('product/'.$product->slug)}}">
								<img alt="" src="{{ Storage::url($product->freature_image) }}"/>
								<div class="cover">
									<img alt="" src="{{ Storage::url($product->freature_image) }}"/>
								</div>
							</a>
							<a href="{{ url('product/'.$product->slug)}}" class="product-button">VIEW HAT</a>
						</div>

						<a href="{{ url('product/'.$product->slug)}}">
							<section>
								<span class="product-category">{{ $product->collection->name }}</span>
								<h5>{{ $product->name }}</h5>
								<span class="product-price">${{ $product->price }}</span>
							</section>
						</a>
					</figure>
				</li>

				@endforeach
				


				</ul>
				<div class="clearfix"></div>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>

</div>

<!-- CUSTOM ORDER BANNER -->
<div class="container">
	<div class="sixteen columns">

		<div class="info-banner">
			<div class="info-content">
				<h3>HAVE SOMETHING DIFFERENT IN MIND?</h3>
				<p>Get a custom order, your hat, your style!</p>
			</div>
			<a href="#" class="button color">CUSTOM ORDER</a>
			<div class="clearfix"></div>
		</div>

	</div>
</div>
<!-- CUSTOM ORDER BANNER / End -->



<!-- INSTAGRAM FEED -->
<div class="container">
	<div class="sixteen columns" style="margin-top:30px; ">
		<h3 class="headline">SOCIAL FEED</h3>
		<span class="line margin-bottom-50"></span>
	</div>

    <div class="sixteen columns">
	<div data-is
     data-is-api="instashow/api/index.php"
     data-is-source="@hdl_11"
     data-is-width="auto"
     data-is-layout="grid"
     data-is-columns="3"
     data-is-gutter="10"
     data-is-color-grid-load-more-button="#7a0400"
     data-is-rows="2"
     data-is-lang="en">
	</div>
	</div>
</div>
<!-- INSTAGRAM FEED END -->

<div class="margin-top-50"></div>

<!-- TESTIMONIALS -->
<div class="container">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">TESTIMONIALS</h3>
		<span class="line margin-bottom-20"></span>
	</div>

	<!-- Navigation / Left -->
	<div id="showbiz_left_3" class="sb-navigation-left-2 alt"><i class="fa fa-angle-left"></i></div>

	<!-- ShowBiz Carousel -->
	<div id="happy-clients" class="showbiz-container sixteen carousel columns" >

	<!-- Portfolio Entries -->
	<div class="showbiz our-clients" data-left="#showbiz_left_3" data-right="#showbiz_right_3">
		<div class="overflowholder">

			<ul>

				<li>
					<div class="happy-clients-photo"><img src="images/happy-clients-01.jpg" alt="" /></div>
					<div class="happy-clients-cite">Super sexy hats! this is a sample review</div>
					<div class="happy-clients-author">Lesan Sierra</div>
				</li>
				
				<li>
					<div class="happy-clients-photo"><img src="images/happy-clients-02.jpg" alt="" /></div>
					<div class="happy-clients-cite">best in the biz!!!. This is a sample review.</div>
					<div class="happy-clients-author">Demetrius Lee</div>
				</li>
				
				<li>
					<div class="happy-clients-photo"><img src="images/happy-clients-03.jpg" alt="" /></div>
					<div class="happy-clients-cite">ready to rock my custom hat for church! this is a sample review</div>
					<div class="happy-clients-author">Alier Garcia</div>
				</li>

			</ul>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>

	</div>
	</div>

	<!-- Navigation / Right -->
	<div id="showbiz_right_3" class="sb-navigation-right-2 alt"><i class="fa fa-angle-right"></i></div>

</div>
<!-- TESTIMONIAL / End -->
@endsection