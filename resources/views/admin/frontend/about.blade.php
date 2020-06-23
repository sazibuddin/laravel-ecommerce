@extends('layouts.admin.layout')
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
                        <h4>Edit about us content</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/update/about_content/1') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="aboutContent" class="summernote" id="summernote">{{ $about_Content->aboutContent }}</textarea>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
               </div>
               <div class="col-md-12 mt-4">
                   <div class="card">
                       <div class="card-header">
                           <h4>Fun facts area</h4>
                       </div>
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="card">
                                       <div class="card-header">
                                           Add fun facts
                                       </div>
                                       <div class="card-body">
                                           <form action="{{ url('admin/add/funfact') }}" method="POST">
                                            @csrf
                                               <div class="form-group">
                                                   <label><b>Name</b></label>
                                                   <input type="text" name="name" class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label><b>Fun count</b></label>
                                                   <input type="number" name="count" class="form-control">
                                               </div>
                                               <div class="form-group float-right">
                                                   <button type="submit" class="btn btn-success">Save</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        all fun facts
                                    </div>
                                    <div class="card-body">
                                       
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Count</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($funfact as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->count }}</td>
                                                        <td><a href="{{ url('admin/funfact/delete/'.$item->id) }}" class="btn btn-danger rounded-0 btn-sm p-1" id="delete"><i class="fas fa-trash"></i></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    
                                    </div>
                                </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit team content</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit team one</h4>
                                </div>
                                <div class="card-body">
                                 <form action="{{ url('admin/update/team/'.$team1->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label><b>Name</b></label>
                                        <input type="text" class="form-control" name="name" value="{{ $team1->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Position</b></label>
                                        <input type="text" class="form-control" name="position" value="{{ $team1->position }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Photo <small>(600*400)</small></b></label>
                                        <input type="file" id="file" class="form-control" name="photo" onchange="readImage(this)" >
                                        <input type="hidden" name="old_image" value="{{ $team1->photo }}">
                                    </div>
                                    <div class="prev_image" style="margin-bottom:20px;">
                                        <img src="{{ asset($team1->photo) }}" id="image_one" alt="image" style="width:100%">
                                      </div>
                                      <div class="form-group float-right">
                                          <button type="submit" class="btn btn-success">Save</button>
                                      </div>
                                </form>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit team two</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('admin/update/team/'.$team2->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><b>Name</b></label>
                                            <input type="text" class="form-control" name="name" value="{{ $team2->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Position</b></label>
                                            <input type="text" class="form-control" name="position" value="{{ $team2->position }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Photo <small>(600*400)</small></b></label>
                                            {{-- <input type="file" class="form-control" name="photo"> --}}
                                            <input type="file" id="file" class="form-control" name="photo" onchange="readImage1(this)" >
                                            <input type="hidden" name="old_image" value="{{ $team2->photo }}">
                                        </div>
                                        <div class="prev_image" style="margin-bottom:20px;">
                                            <img src="{{ asset($team2->photo) }}" id="image_two" style="width:100%">
                                          </div>
                                          <div class="form-group float-right">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
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
      </script>
@endsection