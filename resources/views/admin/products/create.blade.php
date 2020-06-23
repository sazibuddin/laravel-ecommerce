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
                             
      <form action="{{ url('admin/products/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label>Product name</label>
                              <input type="text" class="form-control" name="name" placeholder="Product name">
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Product Price</label>
                                  <input type="text" class="form-control" name="price" placeholder="Product price">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Select a collection</label>
                                  @php
                                        $collectons = App\Collection::get();
                                    @endphp
                                  <select name="collection_id" class="form-control">
                                    @foreach ($collectons as $collection_item)
                                        <option value="{{ $collection_item->id }}">{{ $collection_item->name }}</option>
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
                                  <input type="text" name="tags" placeholder="Tags" data-role="tagsinput" style="width: 100%">
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
                                  <input type="text" name="style" placeholder="Type style name and hit enter" data-role="tagsinput" style="width: 100%">
                                </div>
                               </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Colors</label>
                                  <br>
                                  <input type="text" name="colors" placeholder="type colors name and hit enter" data-role="tagsinput" style="width: 100%">
                                </div>
                               </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Size</label>
                                  <br>
                                  <input type="text" name="size" placeholder="type size name and hit enter" data-role="tagsinput" style="width: 100%">
                                </div>
                               </div>
                            </div>
                            <div class="form-group">
                              <div class="input-field">
                                <label class="active">Gallery image <small>(max 3)</small></label>
                                <div class="input-images-2"  style="padding-top: .5rem;"></div>
                            </div>
                            </div>
                            <div class="form-group">
                              <label>Video</label>
                              <input type="file" class="form-control-file" name="video">
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                                <textarea name="description" class="summernote" id="summernote"></textarea>
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
{{-- <script>
    function readImage(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
           $('#image_one').css('display','block');
          $('#image_one')
          .attr('src' , e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
      <script>
        function readImage1(input){
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#image_two').css('display','block');
              $('#image_two')
              .attr('src' , e.target.result)
              .width(80)
              .height(80);
            };
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script> --}}
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
    
            // $('form').on('submit', function (event) {
    
            //     // Stop propagation
            //     event.preventDefault();
            //     event.stopPropagation();
    
            //     // Get some vars
            //     let $form = $(this),
            //         $modal = $('.modal');
    
            //     // Set name and description
            //     $modal.find('#display-name span').text($form.find('input[id^="name"]').val());
            //     $modal.find('#display-description span').text($form.find('input[id^="description"]').val());
    
            //     // Get the input file
            //     let $inputImages = $form.find('input[name^="images"]');
            //     if (!$inputImages.length) {
            //         $inputImages = $form.find('input[name^="photos"]')
            //     }
    
            //     // Get the new files names
            //     let $fileNames = $('<ul>');
            //     for (let file of $inputImages.prop('files')) {
            //         $('<li>', {text: file.name}).appendTo($fileNames);
            //     }
    
            //     // Set the new files names
            //     $modal.find('#display-new-images').html($fileNames.html());
    
            //     // Get the preloaded inputs
            //     let $inputPreloaded = $form.find('input[name^="old"]');
            //     if ($inputPreloaded.length) {
    
            //         // Get the ids
            //         let $preloadedIds = $('<ul>');
            //         for (let iP of $inputPreloaded) {
            //             $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
            //         }
    
            //         // Show the preloadede info and set the list of ids
            //         $modal.find('#display-preloaded-images').show().html($preloadedIds.html());
    
            //     } else {
    
            //         // Hide the preloaded info
            //         $modal.find('#display-preloaded-images').hide();
    
            //     }
    
            //     // Show the modal
            //     $modal.css('visibility', 'visible');
            // });
    
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