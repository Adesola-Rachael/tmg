@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')
 
<div class="content">
	 @if(Session::get('success_beleive'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_beleive')}}
        </div>
         @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach
    @endif
    <div class="animated fadeIn">
	     <div class="about-area section-padding bg-gray">
	        <div class="container">
		        <div class="row">
		            <div class="col-lg-6 col-md-12 col-xs-12 info">
			            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
			              	<div>
				              	@foreach($believes as $believe)
					                <div class="site-heading">
					                  <p class="mb-3">{{$believe->believe_small_title}}</p>
					                  <h2 class="section-title">{{$believe->believe_title}}</h2>
					                </div>
					                <!-- Edit Content -->
					                <div class="content">
					                    <p>
					                     	{{$believe->believe_text}}
					                    </p>
						                <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$believe->id}}">Edit</div>
										<div class = "modal fade" id="edit-category-{{$believe->id}}" tabindex = "-1"  role = "dialog"  >
											<div class = "modal-dialog" role = "document">
												<div class = "modal-content">
													<div class = "modal-header">
														<h5 class = "modal-title" id = "exampleModalLabel">Edit believe  </h5>
														<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
															<span aria-hidden = "true">×</span> 
														</button>
													</div>
													<div class = "modal-body">
														<form role="form" action="{{route('update.believe',$believe->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
														 	@csrf 
														 	<input type="hidden" name="id" value="{{$believe->id}}">
															<div class="card-body">
																<!-- Small Title Entry	 -->                 
											                  	<div class="form-group">
																<input class="form-control" type="text" name="believe_small_title" id="title" placeholder="Enter Overview Top Text" value="{{$believe->believe_small_title}}" required="required">
																</div>
																<!-- image Entry -->
																<label>Image</label>		
																<div class="form-group">
																<input class="form-control" type="file" name="image" id="image">
																<!-- <input type="hidden" value="{{$believe->image}}" name="image"> -->
																 <input type="hidden" name="image" value="{{$believe->image}}">
																</div>
																<div class="form-group"> 
																<img src="/uploads/images/believe/{{$believe->image}}" style="width:200px; height:100px;">
																</div>
																 <!-- Title Entry -->
																<div class="form-group">
																<input class="form-control" type="text" name="believe_title"  id="title" placeholder="Enter Overview Title" value="{{$believe->believe_title}}" required="required">
																</div>
																 <!-- Text Entry -->
																<div class="form-group">
																<textarea rows="5"  class="form-control" name="believe_text" id="text" placeholder="Enter Overview Text">{{$believe->believe_text}}</textarea> 
																</div>
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
				                @endforeach
				            </div>
			            </div>
		            </div>
		            <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
		            <img class="img-fluid" src="/uploads/images/believe/{{$believe->image}}" alt="" >
		            </div>
		        </div>
	        </div>
	    </div>
	</div>
</div>
@endsection