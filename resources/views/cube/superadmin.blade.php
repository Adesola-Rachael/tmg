@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')

 
<div class="content">
  @if(Session::get('success_reg'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_reg')}}
        </div>
         @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach
  @endif
	@if(Session::has('success_check')) 
    <div class="alert alert-primary">
      {{Session::get('success_check')}}
    </div>
  	@elseif($errors->any())
  	@foreach($errors->all() as $err)
       <li>{{$err}}</li>
  	@endforeach

  	@endif
  	@if(Session::has('success_delete'))
    <div class="alert alert-primary">
      {{Session::get('success_delete')}}
    </div>
  	@elseif($errors->any())
  	@foreach($errors->all() as $err)
       <li>{{$err}}</li>
  	@endforeach

  	@endif
    @if(Session::has('success_info')) 
    <div class="alert alert-primary">
      {{Session::get('success_info')}}
    </div>
    @elseif($errors->any())
    @foreach($errors->all() as $err)
       <li>{{$err}}</li>
    @endforeach

    @endif
  <div class="animated fadeIn">
    @include('cube.registration')
		    <!-- Show all admin -->
         
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
                <strong class="card-title">All Users</strong>
          </div>
          <div class="table-stats order-table table-responsive">
                <table class="table ">
                    <thead>
                      <tr>
                        <th class="serial">S/N</th>
                        <th class="avatar">image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@foreach($users as $user)
                        <tr>
                          <td class="serial">{{$loop->iteration}}</td>
                          <td class="avatar">
                            <div class="round-img">
                              <a href="#"><img class="rounded-circle" src="/uploads/images/{{$user->image}}" alt=""></a>
                            </div>
                          </td> 
                          <td>  <span class="name">{{$user->name}}</span> </td>
                          <td> <span class="product">{{$user->email}}</span> </td>
                          <td> <span class="product">{{$user->role}}</span> </td>
                          <td>
                            	<a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this admin ?')"  href="{{route('delete_admin',['id'=>$user->id])}}">Remove</a>
                          </td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table>
          </div> <!-- /.table-stats -->
        </div>
        </div>
      </div>
		      <!-- Company info -->
      <div class="container info">
          <h3 style="text-align: center; padding: 5px; margin:4px;">General Information</h3>
        <div class="row">
          <div class="col-md-6">
            <span class="name">Abbreviation: </span><span class="value"> {{$company_infos->abbr}}</span><br>
            <span class="name">Name: </span><span class="value">{{$company_infos->name}} </span><br>
            <span class="name">Description:</span><span class="value">{{$company_infos->description}}</span><br>
            <span class="name">Phone:</span><span class="value">{{$company_infos->phone}}</span><br>
            <span class="name"> Location: </span><span class="value"> {{$company_infos->location}}</span><br>
           </div>
          <div class="col-md-6">
            <span class="name">CEO  :</span><span class="value">{{$company_infos->CEO}} </span><br>
            <span class="name">Email: </span><span class="value"> {{$company_infos->email}}</span><br>
            <span class="name"> Facebook: </span><span class="value">{{$company_infos->facebook}} </span><br>
            <span class="name">Twitter : </span><span class="value">{{$company_infos->twitter}} </span><br>
            <span class="name"> Instagram:</span><span class="value"> {{$company_infos->instagram}}</span><br>
            <span class="name"> Linkedin:</span><span class="value"> {{$company_infos->linkedin}}</span><br>
            <span class="name">Pinterst:</span><span class="value">{{$company_infos->pinterest}}</span><br>
          </div>
        </div>

        <div class="btn btn-primary"s data-toggle = "modal"   data-target="#edit-foundation-{{$company_infos->id}}" style="width: 100%;height:50px;text-align: center;border-radius: 10px; background: #0f52ba;">Edit General Information</div>
                        <div class = "modal fade" id="edit-foundation-{{$company_infos->id}}" tabindex = "-1"  role = "dialog"  >
                        <div class = "modal-dialog" role = "document">
                          <div class = "modal-content">
                            <div class = "modal-header">
                              <h5 class = "modal-title" id = "exampleModalLabel">Edit Info </h5>
                              <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                <span aria-hidden = "true">×</span> 
                              </button>
                            </div>
                            <div class = "modal-body" id ="edit_found">
                              <form role="form" action="{{route('update.info',$company_infos->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                @csrf 
                                <input type="hidden" name="id" value="{{$company_infos->id}}">
                                <div class="card-body">
                                  <!-- name -->
                                  <label>Foundation's Name</label>
                                  <div class="form-group">
                                  <input class="form-control" type="text" name="name" id="name" placeholder="Company's Full Name" value="{{$company_infos->name}}" required="required">
                                  </div>
                                  <!-- description -->
                                   <label>Foundation's Description</label> 
                                  <div class="form-group">
                                  <input class="form-control" type="text" name="description" id="name" placeholder="Company's Full Name" value="{{$company_infos->description}}" required="required">
                                  </div>
                                    <!--  abbreviation   -->
                                  <div class="row"> 
                                    <div class="col-lg-6"> 
                                    <label>Foundation's Name Abbreviation</label>               
                                      <div class="form-group">
                                      <input class="form-control" type="text" name="abbr" id="abbr" placeholder="Company's Abbreviation" value="{{$company_infos->abbr}}" required="required">
                                      </div>
                                    </div>
                                   
                                      <!-- Phone -->
                                    <div class="col-lg-6">  
                                      <div class="form-group">
                                        <label>Phone</label>
                                      <input class="form-control" type="text" name="phone"  id="phone" placeholder="Company's Phone Number" value="{{$company_infos->phone}}" required="required">
                                      </div>
                                    </div>
                                  </div>
                                   <!-- Text location-->
                                  <div class="row"> 
                                    <div class="col-lg-6 col-sm-12"> 
                                      <label>Location</label>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="location" id="location" placeholder="Location" value="{{$company_infos->location}}" required="required">
                                      </div>
                                    </div>
                                  
                                     <!-- CEO-->
                                    <div class="col-lg-6 col-sm-12"> 
                                      <label>Foundation CEO</label>
                                      <div class="form-group">
                                       <input class="form-control" type="text" name="CEO" id="CEO" placeholder="CEO" value="{{$company_infos->CEO}}" required="required">
                                      </div>
                                    </div>
                                  </div>

                                     <!-- Email-->
                                  <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Email</label>
                                      <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$company_infos->email}}" required="required">
                                      </div>
                                    </div>
                                   
                                          <!-- Facebook -->
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Facebook</label>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="facebook" id="facebook" placeholder="e.g https://www/example.com" value="{{$company_infos->facebook}}" required="required">
                                      </div>
                                    </div>
                                  </div>
                                      <!-- twitter-->
                                  <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Twitter</label>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="twitter" id="twitter" placeholder="twitter" value="{{$company_infos->twitter}}" required="required">
                                      </div>
                                    </div>
                                  

                                      <!-- instagram -->
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Instagram</label>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="instagram" id="instagram" placeholder="Instagram" value="{{$company_infos->instagram}}" required="required">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- linkedin -->
                                  <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Linkedin</label>
                                       <div class="form-group">
                                      <input class="form-control" type="text" name="linkedin" id="linkedin" placeholder="Linkedin" value="{{$company_infos->linkedin}}" required="required">
                                      </div>
                                    </div>
                                    <!-- pinterest -->
                                    <div class="col-lg-6 col-sm-12">
                                      <label>Pinterest</label>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="pinterest" id="pinterest" placeholder="Pinterest" value="{{$company_infos->pinterest}}" required="required">
                                      </div>
                                    </div>
                                  </div>
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
      
      
  </div>
</div>

       
<!-- <div> -->
 

@endsection