@extends('layouts.admin.layout')
@section('content')

    <div class="main-panel" style="width: 100% !important;">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Update Home page hero Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/home/update/'. $home_setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Text one</b></label>
                                <input type="text" name="text_one" class="form-control rounded-0" value="{{ $home_setting->text_one }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Text two</b></label>    
                                <input type="text" name="text_two" class="form-control rounded-0" value="{{ $home_setting->text_two }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button text</b></label>    
                                <input type="text" name="button_text" class="form-control rounded-0" value="{{ $home_setting->button_text }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button link</b></label>    
                                <input type="text" name="button_link" class="form-control rounded-0" value="{{ $home_setting->button_link }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Banner</b></label>    
                                <input type="file" name="banner" class="form-control rounded-0" onchange="readImage(this)">
                                <input type="hidden" value="{{ $home_setting->banner }}" name="old_image">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="prev_image" style="margin-bottom:20px;">
                                <img src="{{ asset($home_setting->banner) }}" id="photo" alt="image" style="width:100%">
                              </div>    
                        </div>       
                            
                       
                            
                           
                     <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                     </div>
                    </div>  
                    
                    </form>    
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')
<script>
    function readImage(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
           $('#photo').css('display','block');
          $('#photo')
          .attr('src' , e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
     
@endsection