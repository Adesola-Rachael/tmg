@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Slides Section -->
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Create New Slide</div>
                <div class="card-body card-block">
                	@if(Session::has('success_slider'))
				        <div class="alert alert-primary">
				            {{Session::get('success_slider')}}
				        </div>
				    @endif
                    <form action="{{route('createSlide')}}" enctype="multipart/form-data"  method="post" class="">
                    	@csrf
                        <div class="form-group">
                            <div class="input-group">
                                
                                <input type="text" id="title" name="slide_title" placeholder="Slide Title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="text" name="slide_text" placeholder="Slide Text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="file" id="image" name="image" placeholder="slide Image" class="form-control">
                            </div>
                        </div>
                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Displaying the slides -->
        <div class="row">
            @foreach($sliders as $slider)
        	<div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="/uploads/images/slider/{{$slider->image}}" style="width:100%; height:200px;" alt="Card image cap">
                    <div class="card-body">
                    	 
                        <h4 class="card-title mb-3"><small >Title:</small> {{$slider->slide_title}}</h4>
                        <p class="card-text"><small >Short Text :</small>{{$slider->slide_text}}</p>
                        <!-- code to display the date updated  -->
                        <span style="font-size: 14px;margin: 0 10px 0 0;color: #bfbfbf;"> <i style=" margin-right: 0.5rem !important;" class="fa fa-calendar"></i>{{$slider->updated_at}}</span>
                            <!-- code for edit slider -->
                        <span><a href="#" style="font-size: 15px;margin: 0 5px 0 0;color: #0f52ba;"><i style="margin-left: 0.2rem !important;" class="fa fa-edit" abbr title="Edit Slide" data-toggle = "modal" data-target="#edit-category-{{$slider->id}}"></i></a> 

                            <div class = "modal fade" id="edit-category-{{$slider->id}}" tabindex = "-1"  role = "dialog"  >
                                <div class = "modal-dialog" role = "document">
                                <div class = "modal-content">
                                    <div class = "modal-header">
                                        <h5 class = "modal-title" id = "exampleModalLabel">Edit Font</h5>
                                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                        <span aria-hidden = "true">×</span> 
                                        </button>
                                    </div>
                                    <div class = "modal-body">
                                        <form role="form" action="{{route('update.slide',$slider->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$slider->id}}">
                                            <div class="card-body">
                                                <!-- Small Title Entry   -->                 
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="slide_title" placeholder="Enter Slide Title" value="{{$slider->slide_title}}" required="required">
                                                </div>
                                                <!-- image Entry -->
                                                 <!-- Title Entry -->
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="slide_text"  id="slide_text" placeholder="Enter Slide Text" value="{{$slider->slide_text}}" required="required">
                                                </div>
                                                <label>Image</label>        
                                                <div class="form-group">
                                                <input class="form-control" type="file" name="image" id="image">
                                                  <input type="hidden" name="image" value="{{$slider->image}}">
                                                </div>
                                                <div class="form-group"> 
                                                <img src="/uploads/images/slider/{{$slider->image}}" style="width:200px; height:100px;">
                                                </div>
                                                 <!-- Text Entry -->
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
                            </span>
                             
                          
                         <span><a onclick="return confirm('Are you sure you want remove this Font ?')" href="{{route('delete_slide',['id'=>$slider->id
                                    ])}}"style="font-size: 15px;margin: 0 5px 0 0;color: red;"> <i  style=" margin-left: 0.2rem !important;" class="fa fa-remove" abbr title="Delete Slide" ></i></a></span>

                     </div>
                </div>
            </div>
            @if($loop->iteration %3==0)
            
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>       
    </div>

</div>
 
@endsection
