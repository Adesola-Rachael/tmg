@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
 

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="container">
            <div class="row"><div class="col-md-12"><h1 style="text-align: center;">Welcome {{$user->name}}</h1></div></div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <img src="/uploads/images/{{$user->image}}" style="width: 150px;height: 150px; float:left; border-radius:50%;margin-right: 25px;">
                </div>
                <div class="col-md-6">
                    <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$user->id}}"> 
                        Edit Your Profile
                    </div>
                    <div class = "modal fade" id="edit-category-{{$user->id}}" tabindex = "-1"  role = "dialog"  >
                            <div class = "modal-dialog" role = "document">
                                <div class = "modal-content">
                                    <div class = "modal-header">
                                        <h5 class = "modal-title" id = "exampleModalLabel">Edit Profile</h5>
                                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                            <span aria-hidden = "true">×</span> 
                                        </button>
                                    </div>
                                    <div class = "modal-body">
                                        <form role="form" action="/cube/myprofile"  accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                            @csrf 
                                            
                                            <div class="card-body">
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <div class="input-group">      
                                                        <input type="text" name="name" placeholder="Name" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                </div>
                                                 <!-- Email -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" name="email" value="{{$user->email}}" placeholder="Email"class="form-control">
                                                    </div>
                                                </div>
                                                 <!-- Password-->
                                                <div class="form-group">
                                                    <div class="input-group">      
                                                        <input  type="password" name="password" placeholder="Enter New Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Update profile Picture</label>
                                                    <div class="input-group">
                                                        <input type="file" name="image" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type = "button"  class = "btn btn-danger" data-dismiss = "modal">Close</button>
                                                    <button type ="submit" name="submit" class = "btn btn-success">  Save Change</button>
                                                </div>
                                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="4"></div>
            </div>
        </div>
    </div>
</div>
@endsection
