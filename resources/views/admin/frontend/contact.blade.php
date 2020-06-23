@extends('layouts.admin.layout')
@section('content')

    <div class="main-panel" style="width: 100% !important;">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4>Update contact us infromation</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/contact_info/update/'.$contactInfo->id) }}" method="POST">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Contact phone number</b></label>    
                                <input type="text" name="phone" class="form-control rounded-0" value="{{ $contactInfo->phone }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Contact Email</b></label>    
                                <input type="email" name="email" class="form-control rounded-0" value="{{ $contactInfo->email }}">
                            </div>      
                        </div>       
                            
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Contact location</b></label>    
                                <textarea name="location" rows="4" class="form-control">{{ $contactInfo->location }}</textarea>
                            </div>      
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Facebook Link</b></label>    
                                <input type="text" name="facebook_url" class="form-control rounded-0" value="{{ $contactInfo->facebook_url }}">
                            </div>      
                        </div>       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Instagram Link</b></label>    
                                <input type="text" name="instagram_url" class="form-control rounded-0" value="{{ $contactInfo->instagram_url }}">
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