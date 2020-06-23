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
                    <div class="card-header d-flex justify-content-between">
                        <h4>All product</h4>
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary badge-pill" >Add product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Actions</th>    
                                    </tr>       
                                </thead> 
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($products as $product)
                                    @php
                                        $i++;
                                    @endphp

                            <tr>
                                <td>{{ $i }}</td>
                                <td><a href="#" style="color: #000000;text-decoration: none">{{ $product->name }}</a></td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->freature_image) }}" alt="image" style="width: 50px;height: 50px;">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle rounded-0 btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        select
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ url('admin/product/edit/'.$product->id) }}" class="dropdown-item" type="button">Edit</a>
                                        <a href="{{ url('admin/product/delete/'.$product->id) }}" class="dropdown-item" type="button">delete</a>
                                        <a href="" class="dropdown-item" type="button">View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         @endforeach
                                    
                                </tbody>
                            </table> 
                            {{ $products->links() }}   
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