@extends('layouts.frontend.app')
<style>
#product-slider-vertical {
height: 600px !important;
}

.buyhover:hover {
background: rgba(122, 4, 0, .50);
}

.hatdetails {
background-color:#7a0400;
height: 44px;
margin: auto;
color: white;
font-weight: 600;
font-size: 18px !important;
align-text: center;
}


</style>

@section('content')
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2>{{ $product->name }}</h2>				
        </div>
    </div>
    </section>
    
    
    <div class="container">
    
    <!-- Slider
    ================================================== -->
        <div class="eight columns" >
            <div class="slider-padding">
                <div id="product-slider-vertical" class="royalSlider rsDefault">
                    @if(is_array(json_decode($product->photos)))
                    @foreach (json_decode($product->photos) as $key => $photo)
                        
                    <a href="{{ Storage::url($photo) }}" class="mfp-gallery" title="First Title">
                        <img class="rsImg" src="{{ Storage::url($photo) }}" data-rsTmb="{{ Storage::url($photo) }}" alt="" style="width: 100%"/>
                    </a>
                    
                    @endforeach
                @endif
              @if ($product->video != null)
              {{-- <a href="{{ Storage::url($product->video) }}" class="mfp-gallery" title="Third Title">
                <img class="rsImg" src="{{ asset('frontend/images/Click-Here-to-Play-Video.jpg') }}" data-rsTmb="{{ asset('frontend/images/product_item_thumb_04c_video.png') }}" alt="" /></a> --}}

                <a data-fancybox data-width="640" data-height="360" href="{{ Storage::url($product->video) }}">
                    {{-- <img src="{{ asset('frontend/images/product_item_thumb_04c_video.png') }}"/> --}}
                    <img class="rsImg" src="{{ asset('frontend/images/Click-Here-to-Play-Video.jpg') }}" data-rsTmb="{{ asset('frontend/images/product_item_thumb_04c_video.png') }}" alt="" />
               </a>

               
              @endif
             
                 </div>
                
                 <div class="clearfix"></div>
            </div>
        </div>
    
    
    <!-- Content
    ================================================== -->
        <div class="eight columns">
            <div class="product-page">
              

                <!-- Headline -->
                <section class="title" style="border-bottom: 1px solid #ebebeb;">
                    <h2>{{ $product->name }}</h2>
                    <span class="product-price">${{ $product->price }}</span>
                </section>
    
                <!-- Text Parapgraph -->
                <section>
                    <p class="margin-reset">
                        {!! $product->description !!}
                    </p>
    
            
                    <div class="clearfix"></div>
                    </section>
                <section style="padding-top: 20px; border: none;">
                
                <a href="{{ url('order/'.Crypt::encrypt($product->id)) }}" class="button adc buyhover" style="width: 100px; text-align: center;">BUY NOW</a>
                
                </section>
    
            </div>
        </div>
    
    </div>


<div class="container">
	<div class="sixteen columns">
			<!-- Tabs Navigation -->
			<ul class="tab1 hatdetails">
				<li style="line-height: 43px !important; text-align: center;">ADDITIONAL HAT DETAILS</li>
			</ul>

			<!-- Tabs Content -->
			<div class="tabs-container">
				<div class="tab-content" id="tab2">
					<table class="basic-table">
						<tr>
							<th>STYLE</th>
							<td>{{ $product->style }}</td>
						</tr>
						<tr>
							<th>COLORS</th>
                            <td>{{ $product->colors }}
                                
                            </td>
						</tr>
						<tr>
							<th>HEAD SIZE</th>
							<td>{{ $product->size }}</td>
						</tr>						
					</table>
				</div>	
			</div>

	</div>
</div>

<!-- Related Products -->
<div class="container margin-top-5">

	<!-- Headline -->
	<div class="sixteen columns">
		<h3 class="headline">Related Products</h3>
		<span class="line margin-bottom-0"></span>
	</div>

	<!-- Products -->
	<div class="products">
        @php
            $related_product = App\Product::where('tags','like', $product->tags )->get();
        @endphp
        @foreach ($related_product as $item)
            <div class="four columns">
                <figure class="product">
                    <div class="mediaholder">
                        <a href="{{ url('product/'.$item->slug)}}">
                            <img alt="" src="{{ Storage::url($item->freature_image) }}"/>
                            <div class="cover">
                                <img alt="" src="{{ Storage::url($item->freature_image) }}"/>
                            </div>
                        </a>
                        <a href="{{ url('product/'.$item->slug)}}" class="product-button">VIEW HAT</a>
                    </div>

                        <a href="{{ url('product/'.$item->slug)}}">
                            <section>
                                <span class="product-category">{{ $item->collection->name }}</span>
                                    <h5>{{ $item->name }}</h5>
                                    <span class="product-price">${{ $item->name }}</span>
                            </section>
                        </a>
                </figure>
            </div>
        @endforeach
	


	</div>
</div>

<div class="margin-top-50"></div>
@endsection