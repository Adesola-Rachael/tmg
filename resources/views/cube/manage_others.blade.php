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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Create New Fonts</div>
                <div class="card-body card-block">
                	@if(Session::has('success_fonts'))
				        <div class="alert alert-primary">
				            {{Session::get('success_fonts')}}
				        </div>
				    @endif
                    <form action="{{route('createFonts')}}" enctype="multipart/form-data"  method="post" class="">
                    	@csrf
                        <div class="form-group">
                            <div class="input-group">
                                
                                <input type="text" id="title" name="font_name" placeholder="Font Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="text" name="font_desc" placeholder="Font Description" class="form-control">
                            </div>
                        </div>
                       
                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="mr-2 fa fa-align-justify"></i>
                <strong class="card-title">Modals</strong>
            </div>
            <div class="card-body">
                <div class="icon-section">

                    <div class="icon-section">
                        @foreach($fonts as $font)
                        <div class="icon-container">
                            <span class="{{$font->font_name}}"></span><span class="icon-name">{{$font->font_name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span><a href="#"><i class="fa fa-edit" abbr title="Edit Font" data-toggle = "modal" data-target="#edit-category-{{$font->id}}"></i></a> 
                            <div class = "modal fade" id="edit-category-{{$font->id}}" tabindex = "-1"  role = "dialog"  >
                                <div class = "modal-dialog" role = "document">
                                <div class = "modal-content">
                                    <div class = "modal-header">
                                        <h5 class = "modal-title" id = "exampleModalLabel">Edit Font</h5>
                                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                        <span aria-hidden = "true">×</span> 
                                        </button>
                                    </div>
                                    <div class = "modal-body">
                                        <form role="form" action="{{route('update.font',$font->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$font->id}}">
                                            <div class="card-body">
                                                <!-- Small Title Entry   -->                 
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="font_name" placeholder="Enter Font Name" value="{{$font->font_name}}" required="required">
                                                </div>
                                                <!-- image Entry -->
                                                 <!-- Title Entry -->
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="font_desc"  id="font_desc" placeholder="Enter Font Description" value="{{$font->font_desc}}" required="required">
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
                            <span><a abbr title="Delete Font" onclick="return confirm('Are you sure you want remove this Font ?')" href="{{route('delete_font',['id'=>$font->id
                                    ])}}"><i class="fa fa-remove"></i></a>
                            </span>
                            <!-- <span style="font-size: 20px;margin: 0 10px 0 0;color: #0f52ba;"><a href="#"> <i   style=" margin-left: 1.0rem !important;" class="fa fa-edit ">edit</i></a></span> -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- brand Icons -->
            </div>
        </div>
    </div>

</div>
@endsection