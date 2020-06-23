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
                        <h4>Collections</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Collection</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('admin/collection/store/') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>collection name</label>
                                            <input type="text" class="form-control" name="name">
                                            @error('name')
                                            <br>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>collection banner</label>
                                            <input type="file" class="form-control-file" name="banner">
                                            @error('banner')
                                            <br>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $banner }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group float-right">
                                            <input type="submit" class="btn btn-primary rounded-0" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Collection</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Name</th>
                                                 <th>banner</th>
                                                <th>Actions</th>    
                                            </tr>       
                                        </thead> 
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach ($collection as $item)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <img src="{{ asset($item->banner) }}" alt="image" style="width: 60px;height: 60px;">
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        select
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ url('admin/collection/delete/'.$item->id) }}" class="dropdown-item" id="delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                           

                                        </tbody>
                                    </table>
                                    {{ $collection->links() }}    
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

    </div>
@endsection

@section('footer')

@endsection