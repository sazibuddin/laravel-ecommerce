@extends('layouts.admin.layout')
<style>
.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: #fff;
    background: #9883eb;
    border-radius: 3px;
    padding: 2px 2px 2px 7px;
}
</style>
@section('content')

    <style>
        .card.card-statistics {
            background: linear-gradient(85deg, #06b76b, #f5a623);
            color: #ffffff;
        }
    </style>
    
    <div class="main-panel" style="width: 100% !important;">
        <div class="content-wrapper">
           <div class="row">
               <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add a new product</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            
                        <form action="{{ url('admin/products/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label>Product name</label>
                              <input type="text" class="form-control" name="name" placeholder="Product name" value="{{ $product->name }}">
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Product Price</label>
                                  <input type="text" class="form-control" name="price" placeholder="Product price" value="{{ $product->price }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Collection</label>
                                  @php
                                        $collectons = App\Collection::get();
                                    @endphp
                                  <select name="collection_id" class="form-control">
                                    @foreach ($collectons as $collection_item)
                                    <option selected disabled>Select a collection</option>
                                        <option value="{{ $collection_item->id }}"  @php
                                            if($product->collection_id ==$collection_item->id )
                                              { echo 'selected';}
                                             @endphp >
                                             {{ $collection_item->name }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Featured image</label>
                                  <input type="file" class="form-control-file" name="freature_image">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Tags</label>
                                  <br>
                                  <input type="text" name="tags" placeholder="Tags" data-role="tagsinput" style="width: 100%" value="{{ $product->tags }}">
                                </div>
                                
                              </div>
                            </div>
                            <h5>Additional hat details</h5>
                            <hr>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Style</label>
                                  <br>
                                  <input type="text" name="style" placeholder="Type style name and hit enter" data-role="tagsinput" style="width: 100%" value="{{ $product->style }}">
                                </div>
                               </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Colors</label>
                                  <br>
                                  <input type="text" name="colors" placeholder="type colors name and hit enter" data-role="tagsinput" style="width: 100%" value="{{ $product->colors }}">
                                </div>
                               </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Size</label>
                                  <br>
                                  <input type="text" name="size" placeholder="type size name and hit enter" data-role="tagsinput" style="width: 100%" value="{{ $product->size }}">
                                </div>
                               </div>
                            </div>
                            <div class="form-group">
                              <div class="input-field">
                                <label class="active">Gallery image <small>(max 3)</small></label>
                                <div class="input-images-2"  style="padding-top: .5rem;"></div>
                            </div>
                            <div class="form-group">
                              <label>Video</label>
                              <input type="file" class="form-control-file" name="video">
                            </div>
                            <div class="row">
                                <div class="previous-images mt-4">
                                   <div class="row">
                                    @if(is_array(json_decode($product->photos)))
											@foreach (json_decode($product->photos) as $key => $photo)
												<div class="col-md-3 col-sm-3 col-xs-6">
													<div class="img-upload-preview">
														<img  src="{{ Storage::url($photo) }}" alt="image" class="img-responsive" style="width: 100%">
													</div>
												</div>
											@endforeach
										@endif
                                    </div>
                                </div>    
                            </div>
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                                <textarea name="description" class="summernote" id="summernote">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-success rounded-0">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
               </div>
             
             
           </div>
        </div>

    </div>
@endsection

@section('footer')

      <script>
        $(function () {
    
            $('.input-images-1').imageUploader();
    
            let preloaded = [
                // {id: 1, src: 'https://picsum.photos/500/500?random=1'},
                // {id: 2, src: 'https://picsum.photos/500/500?random=2'},
                // {id: 3, src: 'https://picsum.photos/500/500?random=3'},
                // {id: 4, src: 'https://picsum.photos/500/500?random=4'},
                // {id: 5, src: 'https://picsum.photos/500/500?random=5'},
                // {id: 6, src: 'https://picsum.photos/500/500?random=6'},
            ];
    
            $('.input-images-2').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'photos',
                preloadedInputName: 'old'
            });
    
          
            // Input and label handler
            $('input').on('focus', function () {
                $(this).parent().find('label').addClass('active')
            }).on('blur', function () {
                if ($(this).val() == '') {
                    $(this).parent().find('label').removeClass('active');
                }
            });
    
            // Sticky menu
            let $nav = $('nav'),
                $header = $('header'),
                offset = 4 * parseFloat($('body').css('font-size')),
                scrollTop = $(this).scrollTop();
    
            // Initial verification
            setNav();
    
            // Bind scroll
            $(window).on('scroll', function () {
                scrollTop = $(this).scrollTop();
                // Update nav
                setNav();
            });
    
            function setNav() {
                if (scrollTop > $header.outerHeight()) {
                    $nav.css({position: 'fixed', 'top': offset});
                } else {
                    $nav.css({position: '', 'top': ''});
                }
            }
        });
    </script>
@endsection