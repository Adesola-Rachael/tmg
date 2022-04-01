<section id="features" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Online Courses</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
         @if(Session::get('success_course_registered'))
                  <div class="alert alert-success" style="text-align: center;" role="alert">
                      {{Session::get('success_course_registered')}}
                  </div>
                @elseif($errors->any())
                @foreach($errors->all() as $err)
                  <div class="alert alert-danger"><li>{{$err}}</li></div>
                @endforeach
                @endif
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
                 </div>
                <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$cor->id}}">Register Now</div>
                    <div class = "modal fade" id="edit-category-{{$cor->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Register Course</h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('registerCourse')}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="course_id" value="{{$cor->id}}">
                              <div class="card-body">
                                <!-- Name   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="required">
                                </div>
                                 <!-- Email  -->                 
                                <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email"  required="required">
                                </div>
                                 <!-- Phone   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" required="required">
                                </div>
                                <!-- Location   -->
                                 <div class="form-group">
                                <input class="form-control" type="text" name="location" id="Location" placeholder="Location" required="required">
                                </div>
                                <!-- Aim of Study -->
                                 <div class="form-group">
                                   <textarea rows="5"  class="form-control" name="comment" id="comment"  placeholder=" Enter Comment (Optional)"></textarea> 
                                </div>
                                 
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

                
                

              </div>
              @endforeach
 


            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
               <img src="/uploads/images/unit_image/{{$course_image->image}}" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="content-right">
              @foreach($cor2 as $cor)
              <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
                <span class="icon">
                  <i class="lni-leaf"></i>
                </span>
                <div class="text">
                <h4>{{$cor->title}}</h4>
                <p>{{$cor->description}}</p> 
                  <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$cor->id}}">Register Now</div>
                    <div class = "modal fade" id="edit-category-{{$cor->id}}" tabindex = "-1"  role = "dialog"  >
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Register Course</h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('registerCourse')}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="course_id" value = "{{$cor->id}}">
                              <div class="card-body">
                                <!-- Name   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required="required">
                                </div>
                                 <!-- Email  -->                 
                                <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email"  required="required">
                                </div>
                                 <!-- Phone   -->                 
                                <div class="form-group">
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" required="required">
                                </div>
                                <!-- Location   -->
                                 <div class="form-group">
                                <input class="form-control" type="text" name="location" id="Location" placeholder="Location" required="required">
                                </div>
                                <!-- Aim of Study -->
                                <div class="form-group">
                                   <textarea rows="5"  class="form-control" name="comment" id="comment"  placeholder=" Enter Comment (Optional)"></textarea> 
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
              @endforeach
 
            </div>
          </div>
        </div>
      </div>
    </section>