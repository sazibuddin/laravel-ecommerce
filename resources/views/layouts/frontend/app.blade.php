<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>HDL Designs</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
{{-- fancybox  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/colors/red1.css') }}" id="colors">
<script src="{{ asset('frontend/instashow/elfsight-instagram-feed.js') }}"></script>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body class="fullwidth">
<div id="wrapper">


<!-- Top Bar
================================================== -->


<div class="clearfix"></div>


<!-- Header
================================================== -->
<div class="container" style="display: flex; justify-content: center;">


	<!-- Logo -->
	<div class="two columns" style="width: auto !important">
		<div id="logo">
			<h1><a href="index.html"><img src="{{ asset('frontend/images/logo.png') }}" alt="HDL Designs Logo" /></a></h1>
		</div>
	</div>

	</div>

</div>


<!-- Navigation
================================================== -->
<div class="container">
	<div class="sixteen columns">
		
		<a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Menu</a>

		<nav id="navigation">
			<ul class="menu" id="responsive">
				<li><a href="{{ url('/') }}" class="homepage  {{ Request::path() === '' ? 'current' : ''}}" >HOME</a></li>
				<li class="dropdown">
					<a href="#">SHOP</a>
					<ul>
						@php
							$collection = App\Collection::orderBy('id' , 'DESC')->get();	
						@endphp
						@foreach ($collection as $item)
							<li><a href="{{ url('shop/'.$item->slug) }}">{{ $item->name }}</a></li>
						@endforeach
					</ul>
				</li>				
				<li class="{{ Request::path() === '/about' ? 'current' : ''}}"><a href="{{ url('/about') }}">ABOUT</a></li>
				<li><a href="{{ url('/contact') }}">CONTACT</a></li>						
				<li class="customorderbtn" style="float: right !important; background-color: #7a0400;"><a href="#">CUSTOM ORDER</a></li>	
			</ul>
		</nav>
	</div>
</div>

@yield('content')

<!-- Footer
================================================== -->
<div id="footer">

	<!-- Container -->
	<div class="container" style="display: flex; justify-content: center;">
		
		<div class="two columns" style="width: auto !important">

			<!-- Headline -->
			<h3 class="headline footer">Customer Service</h3>
			<span class="line"></span>
			<div class="clearfix"></div>

			<ul class="footer-links">
				<li><a href="returns.html">Delivery & Returns</a></li>
				<li><a href="policy.html">Privacy Policy</a></li>
				<li><a href="terms.html">Terms & Conditions</a></li>
				<li><a href="faqs.html">FAQS</a></li>
				<li><a href="{{ url('/contact') }}">Contact Us</a></li>
			</ul>

		</div>

		<div class="two columns" style="width: auto !important">
			<img src="{{ asset('frontend/images/logo-footer.png') }}" alt="" class="margin-top-10"/>
			
		</div>
		

		

	</div>
	<!-- Container / End -->

</div>
<!-- Footer / End -->

<!-- Footer Bottom / Start -->
<div id="footer-bottom">

	<!-- Container -->
	<div class="container">

		<div class="sixteen columns" style="text-align: center;"><span>Copyright &copy; HDL Designs <script> var dteNow = new Date(); var intYear = dteNow.getFullYear(); document.write(intYear);</script> </span>. Web Design by <a href="https://tridedesigns.com/">Tride Designs</a></div>
		
	</div>
	<!-- Container / End -->

</div>
<!-- Footer Bottom / End -->

<!-- Back To Top Button -->
<div id="backtotop" style="width: 45px;"><a href="#"></a></div>



<!-- Java Script
================================================== -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="{{ asset('frontend/scripts/jquery.jpanelmenu.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.themepunch.plugins.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.themepunch.showbizpro.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/hoverIntent.js') }}"></script>
<script src="{{ asset('frontend/scripts/superfish.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.pureparallax.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.pricefilter.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.royalslider.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/SelectBox.js') }}"></script>
<script src="{{ asset('frontend/scripts/modernizr.custom.js') }}"></script>
<script src="{{ asset('frontend/scripts/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.tooltips.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('frontend/scripts/puregrid.js') }}"></script>
<script src="{{ asset('frontend/scripts/stacktable.js') }}"></script>
<script src="{{ asset('frontend/scripts/custom.js') }}"></script>





</body>
</html>