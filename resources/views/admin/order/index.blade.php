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
                        <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Order id</th>
                                                 <th>customer name</th>
                                                 <th>email</th>
                                                 <th>Product name</th>
                                                <th>Actions</th>    
                                            </tr>       
                                        </thead> 
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach ($orders as $item)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        select
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ url('admin/orders/view/'.$item->id) }}" class="dropdown-item" >View</a>
                                                        <a href="{{ url('admin/orders/delete/'.$item->id) }}" class="dropdown-item" id="delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                           

                                        </tbody>
                                    </table>
                                    {{ $orders->links() }}    
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