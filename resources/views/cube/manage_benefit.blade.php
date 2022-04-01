@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Benefits Section -->
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Create New Benefits</div>
                <div class="card-body card-block">
                	@if(Session::has('success_benefit'))
				        <div class="alert alert-primary">
				            {{Session::get('success_benefit')}}
				        </div>
                @else($errors->any())
                @foreach($errors->all() as $err)
                <div class="alert alert-danger"><li>{{$err}}</li></div>
                @endforeach
				        @endif
                  @if(Session::has('success_update'))
                <div class="alert alert-primary">
                    {{Session::get('success_update')}}
                </div>
                @else($errors->any())
                @foreach($errors->all() as $err)
                <div class="alert alert-danger"><li>{{$err}}</li></div>
                @endforeach
                @endif
                @if(Session::has('success_delete'))
                <div class="alert alert-primary">
                    {{Session::get('success_delete')}}
                </div>
                @endif
                
                    <form action="{{route('create.benefit')}}" enctype="multipart/form-data"  method="post" class="">
                    	@csrf
                        <div class="form-group">
                            <div class="input-group">
                                
                              <input type="text" id="title" name="title" placeholder="Benefit Title" class="form-control">
                            </div>
                        </div>

                         
                     
                        <div class="form-group">
                          <textarea rows="5"  class="form-control"  name="detail" placeholder="Benefit Details" required="required"></textarea> 
                        </div>
                        <label>Select Font</label><br>
                          <select class="form-group" name="benefit_fonts">
                            @foreach($fonts as $font)
                            <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                             @endforeach
                         </select>

                         
                        
                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                         <input type="hidden" name="_token" value="{{Session::token()}}">
                    </form>
                </div>
            </div>
        </div>
        <!-- show Benefit From DB -->
 <section id="pricing" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Your Benefit</h2> <p class="price-value">Things you will benefit after registration</p>

          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">

          @foreach($benefits as $benefit)
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="table wow fadeInLeft" data-wow-delay="1.2s">
              <div class="icon-box">
                <i class="{{$benefit->fonts->font_name}}"></i>
              </div>
              <div class="pricing-header">
                
              </div>
              <div class="title">
                <h3>{{$benefit->title}}</h3>
              </div>
              <ul class="description">
                <p style=" font-size: 14px;font-weight: 400;color: #abacae;padding: 4px 0;">{{$benefit->detail}}</p>
                 
              </ul>
              <!-- Edit Benefit -->
              <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$benefit->id}}">Edit Benefit</div>
                    <div class = "modal fade" id="edit-category-{{$benefit->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit believe  </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.benefit',$benefit->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$benefit->id}}">
                              <div class="card-body">
                                <!-- Title Entry   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Benefit Title" value="{{$benefit->title}}" required="required">
                                <!-- bebefit details -->
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="text" name="detail" id="title" placeholder="Benefit Details" value="{{$benefit->detail}}" required="required">
                                </div>
                                <!-- benefit fonts -->
                                <label>Select Font</label><br>
                                <select class="form-group" name="benefit_fonts">
                                  @foreach($fonts as $font)
                                  <option value="{{$font->id}}" >{{$font->font_desc}}</option>
                                  @endforeach
                                </select>
                                 <!-- Title Entry -->
                               
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
                    <!-- delete function -->
              <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this admin ?')"  href="{{route('delete_benefit',['id'=>$benefit->id
                      ])}}">Delete Benefit
              </a>
            </div> 
          </div>
          @endforeach
 
        </div>
      </div>
    </section>

 
  </div>
</div>
@endsection