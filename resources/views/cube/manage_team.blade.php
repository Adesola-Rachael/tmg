@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Slides Section -->
<div class="content">
    @if(Session::has('success_team'))
                <div class="alert alert-primary">
                    {{Session::get('success_team')}}
                </div>
              @endif
    <div class="animated fadeIn">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Create New Team</div>
                <div class="card-body card-block">
                
                    <form action="{{route('create.team')}}" enctype="multipart/form-data"  method="post" class="">
                    	@csrf
                        <div class="form-group">
                            <div class="input-group">
                                
                                <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="role" name="role" placeholder="Role" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="about" name="about" placeholder="About Team" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="facebook" name="facebook" placeholder="Facebook Link" class="form-control">
                            </div>
                        </div>
                          <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="twitter" name="twitter" placeholder="Twitter_Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="text" id="instagram" name="instagram" placeholder="Instagram Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                 <input type="file" id="image" name="image" placeholder="Team Image" class="form-control">
                            </div>
                        </div>
                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                         <input type="hidden" name="_token" value="{{Session::token()}}">
                    </form>
                </div>
            </div>
        </div>

        <section id="team" class="section-padding bg-gray">
            <div class="container">
                <div class="section-header text-center">          
                  <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Meet our team</h2>
                  <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- Team Item Starts -->
                        <div class="team-item wow fadeInRight" data-wow-delay="0.2s">
                          <div class="team-img">
                            <img class="img-fluid" src="/uploads/images/team/{{$team->image}}" style="width:400px; height: 300px;"  alt="">
                          </div>
                          <div class="contetn">
                            <div class="info-text">
                              <h3><a href="#">{{$team->name}}</a></h3>
                              <p>{{$team->role}}</p>
                            </div>
                            <p>{{$team->about}}</p>
                            <ul class="social-icons"> 
                              <span><a href="mailto:'.{{$team->email}}.'"><i class="fa fa-envelope" aria-hidden="true"></i></a></span>
                              <span><a href="{{$team->facebook}}"><i class="lni-facebook-filled" aria-hidden="true"></i></a></span>
                              <span><a href="{{$team->twitter}}"><i class="lni-twitter-filled" aria-hidden="true"></i></a></span>
                              <span><a href="{{$team->instagram}}"><i class="lni-instagram-filled" aria-hidden="true"></i></a></span>
                             </ul>
                            <div class="btn btn-primary"> <a href="#"><i class="far fa-edit" data-toggle = "modal" data-target="#edit-category-{{$team->id}}"></i></a>Edit Team Member</div>
                            <div class = "modal fade" id="edit-category-{{$team->id}}" tabindex = "-1"  role = "dialog"  >
                              <div class = "modal-dialog" role = "document">
                                <div class = "modal-content">
                                  <div class = "modal-header">
                                    <h5 class = "modal-title" id = "exampleModalLabel">Edit Team</h5>
                                    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                      <span aria-hidden = "true">×</span> 
                                    </button>
                                  </div>
                                  <div class = "modal-body">
                                    <form role="form" action="{{route('update.team',$team->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                      @csrf 
                                      <input type="hidden" name="id" value="{{$team->id}}">
                                      <div class="card-body">
                                        <!-- Small Title Entry   -->                 
                                        <div class="form-group">
                                        <input class="form-control" type="text" name="name" placeholder="Enter Namet" value="{{$team->name}}" required="required">
                                        </div>
                                        <!-- image Entry -->
                                        <label>Image</label>    
                                        <div class="form-group">
                                        <input class="form-control" type="file" name="image" id="image">
                                         
                                         <input type="hidden" name="image" value="{{$team->image}}">
                                        </div>
                                        <div class="form-group"> 
                                        <img src="/uploads/images/team/{{$team->image}}" style="width:200px; height:100px;">
                                        </div>
                                         <!-- Title Entry -->
                                        <div class="form-group">
                                        <input class="form-control" type="text" name="role"  id="role" placeholder="Enter Role" value="{{$team->role}}" required="required">
                                        </div>
                                         <!-- Text Entry -->
                                        <div class="form-group">
                                        <textarea rows="5"  class="form-control" name="about" id="text" placeholder="About Team">{{$team->about}}</textarea> 
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                               <input type="text" id="facebook" name="facebook" placeholder="Facebook Link" value="{{$team->facebook}}" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                               <input type="text" id="email" name="email" placeholder="Email" value="{{$team->email}}" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                               <input type="text" id="twitter" name="twitter" placeholder="Twitter_Link" value="{{$team->twitter}}" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                               <input type="text" id="instagram" name="instagram" placeholder="Instagram Link" value="{{$team->instagram}}" class="form-control">
                                          </div>
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
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this Team Member ?')" href="{{route('delete_team',['id'=>$team->id
                            ])}}">Delete Team Memner</a>
                          </div>
                        </div>
                    </div>
                        <!-- Team Item Ends -->
                        @if($loop->iteration %2 ==0)
                </div>
                <div class="row">
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection