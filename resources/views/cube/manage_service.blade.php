@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Slides Section -->
<div class="content">
  @if(Session::has('success_service'))
    <div class="alert alert-primary">
      {{Session::get('success_service')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach

  @endif
   @if(Session::has('success_delet'))
    <div class="alert alert-primary">
      {{Session::get('success_delete')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach

  @endif
   @if(Session::has('success_update'))
    <div class="alert alert-primary">
      {{Session::get('success_update')}}
    </div>
  @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach

  @endif
    
    <div class="animated fadeIn">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Create New Slide</div>
                <div class="card-body card-block">
                 
                    <form action="{{route('createService')}}" enctype="multipart/form-data"  method="post" class="">
                    	@csrf
                        <div class="form-group">
                            <div class="input-group">
                                
                                <input type="text" id="title" name="service_title" placeholder="Service Title" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                                    <textarea rows="5"  class="form-control" name="service_text" placeholder=" Enter Service Description"> </textarea> 
                             </div>
                        
                        <label>Select Font</label><br>
                        <select class="form-group" name="service_fonts">
                          @foreach($fonts as $font)
                          <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                          @endforeach

                        
                        </select>
                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Displaying the slides -->

<section id="services" class="section-padding">
  <div class="container" >
        <div class="section-header text-center" >
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Services</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row" >
          <!-- Services item -->
  @foreach($services as $service)
          <div class="col-md-6 col-lg-4 col-xs-12">
          
            <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="{{$service->fonts->font_name}}"></i>
              </div>
              <div class="services-content" >
                <h3 style="color:#000; font-weight: bolder;"><a href="#">{{$service->title}}</a></h3>
                <p>{{$service->text}}</p>
                <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$service->id}}">Edit Service</div>
                    <div class = "modal fade" id="edit-category-{{$service->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit Service  </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.service',$service->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$service->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                               <div class="form-group">
                                <input class="form-control" type="text" name="service_title" id="title" placeholder="Enter Service Title" value="{{$service->title}}" required="required">
                                </div>
                                <!-- font Entry -->
                                  <label>Select Font</label><br>
                                <select class="form-group" name="service_fonts">
                                  @foreach($fonts as $font)
                                  <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                                  @endforeach
                                </select>
                                
                                 <!-- Title Entry -->
                               <div class="form-group">
                                <textarea rows="5"  class="form-control" name="service_text"  id="service_text" placeholder="Enter Service Description">{{$service->text}}</textarea> 
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
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this ?')"  href="{{route('delete_service',['id'=>$service->id
                      ])}}">Delete Course
                    </a>
              </div>
            </div>
           
          </div>
           @if($loop->iteration %3 == 0)
        </div>
          <div class="row">
          @endif
          @endforeach
         </div>

          <!-- Services item -->
          <!-- <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="icon">
                <i class="lni-stats-up"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Awesome Design</a></h3>
                <p>Ut maximus enim dolor. Aenean auctor risus eget tincidunt lobortis. Donec tincidunt bibendum gravida. </p>
              </div>
            </div>
          </div> -->
          <!-- Services item -->
         <!--  <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
              <div class="icon">
                <i class="lni-users"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Easy To Customize</a></h3>
                <p>Ut maximus enim dolor. Aenean auctor risus eget tincidunt lobortis. Donec tincidunt bibendum gravida. </p>
              </div>
            </div>
          </div> -->
          <!-- Services item -->
          <!-- <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lni-layers"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">UI/UX Design</a></h3>
                <p>Ut maximus enim dolor. Aenean auctor risus eget tincidunt lobortis. Donec tincidunt bibendum gravida. </p>
              </div>
            </div>
          </div> -->
          <!-- Services item -->
         <!--  <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
              <div class="icon">
                <i class="lni-mobile"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">App Development</a></h3>
                <p>Ut maximus enim dolor. Aenean auctor risus eget tincidunt lobortis. Donec tincidunt bibendum gravida. </p>
              </div>
            </div>
          </div> -->
          <!-- Services item -->
          <!-- <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
              <div class="icon">
                <i class="lni-rocket"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">User Friendly interface</a></h3>
                <p>Ut maximus enim dolor. Aenean auctor risus eget tincidunt lobortis. Donec tincidunt bibendum gravida. </p>
              </div>
            </div>
          </div> -->
        </div>
  </div>
</section>
@endsection