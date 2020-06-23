@extends('layouts.frontend.app')

@section('content')
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2>{{ $collection->name }}</h2>				
        </div>
    </div>
    </section>
    
    
    <div class="container">
    
        <!-- Content
        ================================================== -->
    
    
        <!-- Products -->
        <div class="products">
    
    
            @foreach ($products as $item)
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
                                    <span class="product-price">$ {{ $item->price }}</span>
                            </section>
                        </a>
                </figure>
            </div>
        @endforeach
        {{-- {{ $products->links() }}     --}}
          
    
    
     
    
           
    
          
    
    
    
    
         
            <div class="clearfix"></div>
    
    
            <!-- Pagination -->
            {{-- <div class="pagination-container">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </nav>
    
                <nav class="pagination-next-prev full-width">
                    <ul>
                        <li><a href="#" class="prev"></a></li>
                        <li><a href="#" class="next"></a></li>
                    </ul>
                </nav>
            </div> --}}
    
        </div>
    
    </div>
    
    <div class="margin-top-15"></div>
@endsection