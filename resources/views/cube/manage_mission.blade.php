@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')

 
<div class="content">
  <div class="animated fadeIn">
    <div class="row">
       @foreach($missions as $mission)
      <div class="col-md-4">
        <div class="card border border-primary">
          <div class="card-header">

              <strong class="card-title">{{$mission->title}}</strong>
          </div>
          <div class="card-body">
              <p class="card-text">{{$mission->detail}}.</p>
                <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$mission->id}}"> Edit {{$mission->title}} </div>
                    <div class = "modal fade" id="edit-category-{{$mission->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit {{$mission->title}} </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.mission',$mission->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$mission->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Mission Title" value="{{$mission->title}}" required="required">
                                </div>
                                <!-- image Entry -->
                                 
                                 <!-- Text Entry -->
                                <div class="form-group">
                                <textarea rows="5"  class="form-control" name="detail" id="text" placeholder="Enter Mission Details">{{$mission->detail}}</textarea> 
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
        </div>
      </div>
       @endforeach
           <!-- center image  -->
        @foreach($unit_image as $unit_img)
        
          <img src="/uploads/images/unit_image/{{$unit_img->image}}" alt="">
        @endforeach
          <!-- ///////////center image  -->
      @foreach($visions as $vision)
      <div class="col-md-4">
        <div class="card border border-primary">
          <div class="card-header">
              <strong class="card-title">{{$vision->title}}</strong>
          </div>
          <div class="card-body">
            <p class="card-text">{{$vision->detail}}.</p>
             
            <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$vision->id}}"> Edit {{$vision->title}} </div>
                    <div class = "modal fade" id="edit-category-{{$vision->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit {{$vision->title}} </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.mission',$vision->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$vision->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Mission Title" value="{{$vision->title}}" required="required">
                                </div>
                                <!-- image Entry -->
                                 
                                 <!-- Text Entry -->
                                <div class="form-group">
                                <textarea rows="5"  class="form-control" name="detail" id="text" placeholder="Enter Mission Details">{{$vision->detail}}</textarea> 
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
        </div>
      </div>
       @endforeach
    </div>
 
  </div>
</div>
@endsection