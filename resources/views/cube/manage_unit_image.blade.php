@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')
  
<div class="content">
	@if(Session::has('success_unit_image'))
    <div class="alert alert-primary">
      {{Session::get('success_unit_image')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
       <li>{{$err}}</li>
  @endforeach

  @endif
    <div class="animated fadeIn">
    	<div class="row">
    		@foreach($unit_image as $unit_img)
    		<div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="/uploads/images/unit_image/{{$unit_img->image}}" alt="Card image cap">
                    <div class="card-body">
                        	<h4 class="card-title mb-3" style="font-weight: bolder;">{{$unit_img->image_title}}</h4>
                            <p class="card-text"  style="font-weight: bolder;">{{$unit_img->image_location_decription}}</p>
                             <span class="card-text"  ><a style="color:red;" href="{{$unit_img->url}}">Go To Page</a></span>

                             <span><div class="btn btn-primary" data-toggle = "modal" data-target="#edit-category-{{$unit_img->id}}"></div>
										<div class = "modal fade" id="edit-category-{{$unit_img->id}}" tabindex = "-1"  role = "dialog"  >
											<div class = "modal-dialog" role = "document">
												<div class = "modal-content">
													<div class = "modal-header">
														<h5 class = "modal-title" id = "exampleModalLabel">Edit {{$unit_img->image_title }} </h5>
														<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
															<span aria-hidden = "true">×</span> 
														</button>
													</div>
													<div class = "modal-body">
														<form role="form" action="{{route('update.unit_image',$unit_img->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
														 	@csrf 
														 	<input type="hidden" name="id" value="{{$unit_img->id}}">
															<div class="card-body">
																                  
											                  	 
																<!-- image Entry -->
																<label>Image</label>		
																<div class="form-group">
																<input class="form-control" type="file" name="image" id="image">
																 
																 <input type="hidden" name="image" value="{{$unit_img->image}}">
																</div>
																<div class="form-group"> 
																<img src="/uploads/images/unit_image/{{$unit_img->image}}" style="width:200px; height:100px;">
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
										</div></span>
                    </div>
                </div>
            </div>
            @endforeach
    	</div>
    </div>
</div>
@endsection