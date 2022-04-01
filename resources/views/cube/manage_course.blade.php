@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Slides Section -->
<div class="content">
  @if(Session::has('success_course'))
    <div class="alert alert-primary">
      {{Session::get('success_course')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
       <li>{{$err}}</li>
  @endforeach

  @endif
   @if(Session::has('success_course_update'))
    <div class="alert alert-primary">
      {{Session::get('success_course_update')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
       <div class="alert alert-primary"> <li>{{$err}}</li></div>
  @endforeach

  @endif

  <div class="animated fadeIn">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">Create New Course</div>
          <div class="card-body card-block">
            <form action="{{route('create.course')}}" enctype="multipart/form-data"  method="post" class="">
            	@csrf
                <div class="form-group">
                  <div class="input-group">
                        
                    <input type="text" id="title" name="course_title" placeholder="Course Title" class="form-control" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <textarea rows="5"  class="form-control"  name="course_desc" placeholder="Course Description" required="required"></textarea> 
                </div>

                 
                <label>Select Font</label><br>
                <select class="form-group" name="course_fonts">
                  @foreach($fonts as $font)
                  <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                  @endforeach
                </select>
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-primary btn-sm">Submit
                  </button>
                </div>
            </form>
          </div>
        </div>

      </div>
    </div>
        <!-- section to show course -->
        <section id="features" class="section-padding">
          <div class="container">
            <div class="section-header text-center">          
              <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Online Courses</h2>
              <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="content-left">
                  @foreach($cor1 as $cor)
                  <div class="box-item wow fadeInLeft" data-wow-delay="0.3s">
                    <span class="icon">
                      <i class="{{$cor->fonts->font_name}}"></i>
                    </span>
                    <div class="text">
                      <h4>{{$cor->title}}</h4>
                      <p>{{$cor->description}}</p>
                      <div class="btn btn-primary" data-toggle= "modal"   data-target="#edit-category-{{$cor->id}}">Edit Course</div>
                    <div class = "modal fade" id="edit-category-{{$cor->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit Course  </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.course',$cor->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$cor->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                               <div class="form-group">
                                <input class="form-control" type="text" name="course_title" id="title" placeholder="Enter Course Title" value="{{$cor->title}}" required="required">
                                </div>
                                <label>Select Font</label><br>
                                <select class="form-group" name="course_fonts">
                                  @foreach($fonts as $font)
                                  <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                                  @endforeach
                                </select>
                                <!-- image Entry -->
                                 
                                
                                 <!-- Description Entry -->
                                <div class="form-group">
                                <textarea rows="5"  class="form-control" name="course_desc"  id="title" placeholder="Enter Courses Description">{{$cor->description}}</textarea> 
                                </div>

                               
                                 
                               <!-- //////////////////////////reserved for font/////////// -->
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
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this admin ?')"  href="{{route('delete_course',['id'=>$cor->id
                      ])}}">Delete Course
                    </a>
                    </div>
                  </div>
                  @endforeach
                 <!--  <div class="box-item wow fadeInLeft" data-wow-delay="0.6s">
                    <span class="icon">
                      <i class="lni-laptop-phone"></i>
                    </span>
                    <div class="text">
                      <h4>Fully Responsive</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <div class="btn btn-primary">Register Now</div>
                    </div>
                  </div>
                  <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
                    <span class="icon">
                      <i class="lni-cog"></i>
                    </span>
                    <div class="text">
                      <h4>HTML5, CSS3 & SASS</h4>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                      <div class="btn btn-primary">Register Now</div>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
                  @foreach($unit_image as $unit_img)
                  <img src="/uploads/images/unit_image/{{$unit_img->image}}" alt="">
                  @endforeach
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="content-right">
                  @foreach($cor2 as $cor)
                  <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
                    <span class="icon">
                      <i class="{{$cor->fonts->font_name}}"></i>
                    </span>
                    <div class="text">
                      <h4>{{$cor->title}}</h4>
                      <p>{{$cor->description}}</p>
                      <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$cor->id}}">Edit Course</div>
                    <div class = "modal fade" id="edit-category-{{$cor->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit Course  </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.course',$cor->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$cor->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                               <div class="form-group">
                                <input class="form-control" type="text" name="course_title" id="title" placeholder="Enter Course Title" value="{{$cor->title}}" required="required">
                                </div>
                                <!-- font Entry -->
                                  <label>Select Font</label><br>
                                <select class="form-group" name="course_fonts">
                                  @foreach($fonts as $font)
                                  <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                                  @endforeach
                                </select>
                                
                                 <!-- Title Entry -->
                               <div class="form-group">
                                <textarea rows="5"  class="form-control" name="course_desc"  id="title" placeholder="Enter Courses Description">{{$cor->description}}</textarea> 
                                </div>
                                 
                               <!-- //////////////////////////reserved for font/////////// -->
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
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this ?')"  href="{{route('delete_course',['id'=>$cor->id
                      ])}}">Delete Course
                    </a>
                    </div>
                  </div>
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- //section to show course -->
  </div>

        
@endsection