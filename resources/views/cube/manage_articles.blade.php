@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')


         
        <!-- New Slides Section -->
<div class="content">
    @if(Session::get('success_article'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_article')}}
        </div>
         @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach
    @endif


    @if(Session::get('success_author_update'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_author_update')}}
        </div>
    @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach
    @endif
<!-- out error for author -->
    @if(Session::get('success_author'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_author')}}
        </div>
         @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach
    @endif

    @if(Session::get('success_author_delete'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_author_delete')}}
        </div>
    @elseif($errors->any())
    @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
    @endforeach

    @endif

    @if(Session::get('success_article'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_article')}}
        </div>
    @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach

  @endif

    @if(Session::get('success_category'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_category')}}
        </div>
    @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach
  @endif

    @if(Session::get('success_category_update'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_category_update')}}
        </div>
         @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach
  @endif

    @if(Session::get('success_category_delete'))
        <div class="alert alert-success" style="text-align: center;" role="alert">
            {{Session::get('success_category_delete')}}
        </div>
    @elseif($errors->any())
  @foreach($errors->all() as $err)
        <div class="alert alert-danger"><li>{{$err}}</li></div>
  @endforeach

  @endif
     
    <div class="animated fadeIn">
         
        <div class="row">
            <!-- column for article creation -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Create New Article</div>
                    <div class="card-body card-block">
                         <form action="{{route('create.article')}}" enctype="multipart/form-data"  method="post" class="">
                        	@csrf
                            <div class="form-group">
                                <div class="input-group">
                                    
                                    <input type="text" id="title" name="article_title" placeholder="Title of Article" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea rows="5"  class="form-control" name="article_desc" id="text" placeholder=" Enter Full Story"> </textarea> 
                             </div>
                                <!-- <div class="form-group">
                                <div class="input-group">
                                    
                                    <input type="text" id="author" name="article_author" placeholder="Name of author" class="form-control">
                                </div>
                            </div> -->
                            
                            <div class="form-group">
                                <div class="input-group">
                                     <input type="file" id="image" name="image" placeholder="Article Image" class="form-control">
                                </div>
                            </div>
                            <label><b>Select Article Category</b></label>
                            <div class="form-group">
                                
                              <select name="category"> 
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->article_category}}</option>
                                @endforeach
                              </select>
                            </div>

                              <label><b>Select Article Author</b></label>
                            <div class="form-group">
                                
                              <select name="author"> 
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                              </select>
                            </div>
                             
                            <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                        </form>
                    </div>
                </div>
                <!-- article Category -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title pull-left">Article Category</strong>

                         <!-- Button trigger modal -->
                            <strong   class="card-title btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                             Add New Category
                            </strong>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Article Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                     <form role="form" action="{{route('create.category')}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                        @csrf 
                                         <div class="card-body">
                                            <!-- article_category Entry   -->                 
                                            <div class="form-group">
                                            <input class="form-control" type="text" name="article_category" id="article_category" placeholder="Enter Article Category" required="required">
                                            </div>
                                            
                                            
                                            <!-- /.card-body -->
                                           <!--  <div class="card-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type ="submit" name="submit" type="button" class="btn btn-primary">Submit</button>

                                                
                                            </div> -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{Session::token()}}">
                                        </div>
                                    </form>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">SN</th>
                                  <th scope="col">Article Category</th>
                                  <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$cat->article_category}}</td>
                                    <td>
                                          
                                         <span><a href="#" style="font-size: 15px;margin: 0 5px 0 0;color: #0f52ba;"><i style="margin-left: 0.2rem !important;" class="fa fa-edit" abbr title="Edit Category" class="far fa-edit" data-toggle = "modal"   data-target="#edit-category-{{$cat->id}}"></i></a>
                                        </span>

                                        <div class = "modal fade" id="edit-category-{{$cat->id}}" tabindex = "-1"  role = "dialog"  >
                                            <div class = "modal-dialog" role = "document">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <h5 class = "modal-title" id = "exampleModalLabel">Edit believe  </h5>
                                                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                                            <span aria-hidden = "true">×</span> 
                                                        </button>
                                                    </div>
                                                    <div class = "modal-body">
                                                        <form role="form" action="{{route('update.cat',$cat->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                                            @csrf 
                                                             <div class="card-body">
                                                                <!-- Small Title Entry   -->                 
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="article_category" id="article_category" placeholder="Enter Article Category" value="{{$cat->article_category}}" required="required">
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="modal-footer">
                                                                    <button type = "button"  class = "btn btn-danger" data-dismiss = "modal">Close</button>
                                                                    <button type ="submit" name="submit" class = "btn btn-primary">  Save Change</button>
                                                                </div>
                                                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      

                                        <span><a onclick="return confirm('Are you sure you want remove this Font ?')" href="{{route('delete.cat',['id'=>$cat->id
                                        ])}}" style="font-size: 15px;margin: 0 5px 0 0;color: red;"> <i  style=" margin-left: 0.2rem !important;" class="fa fa-remove" abbr title="Delete Category" ></i></a></span>

                                    </td>
                                 </tr>

                                 @endforeach
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Article Category -->
                <!-- Show articles -->
                <div class="container">
                    <!-- Blog Entries Column -->
                    <h1 class="my-4">
                      <small>All Articles</small>
                    </h1>

                    <!-- Blog Post -->
                    @foreach($articles as $article)
            <?php
                $date=date("Y-m-d",strtotime($article->created_at));
                     // $now=date("Y-m-d");
                     // $fivedays=date("Y-m-d",strtotime($now.'+5 days'));
                         
                      
            $temp = explode('-',$date);
            $day=$temp[2];
            $month=date("F", mktime(0, 0, 0,$temp[1] , 1));
            $year=$temp[0];
            ?>

            <div class="card mb-4">
              <img class="card-img-top" src="/uploads/images/article/{{$article->image}}" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$article->article_title}}</h2>
                <p class="card-text">{{$article->decs}}</p>
                <p><span><i class="icon-eye"></i>{{$article->views}}</span>
                <span><i class="icon-comment"></i>{{count($article->comments)}}</span></p>
                <!-- Edit Article -->
              <div class="btn btn-primary" data-toggle = "modal"   data-target="#edit-category-{{$article->id}}"> Edit Article</div>
                <div class = "modal fade" id="edit-category-{{$article->id}}" tabindex = "-1"  role = "dialog"  >Edit Article
                      <div class = "modal-dialog" role = "document">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            <h5 class = "modal-title" id = "exampleModalLabel">Edit Article </h5>
                            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                              <span aria-hidden = "true">×</span> 
                            </button>
                          </div>
                          <div class = "modal-body">
                            <form role="form" action="{{route('update.article',$article->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                              @csrf 
                              <input type="hidden" name="id" value="{{$article->id}}">
                              <div class="card-body">
                                <!-- Small Title Entry   -->                 
                               <div class="form-group">
                                <div class="input-group">
                                    
                                    <input type="text" id="title" name="article_title" value="{{$article->article_title}}" placeholder="Title of Article" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea rows="5"  class="form-control" name="article_desc" id="text" value="" placeholder=" Enter Full Story"> {{$article->article_desc}}</textarea> 
                             </div>
                                <!-- <div class="form-group">
                                <div class="input-group">
                                    
                                    <input type="text" id="author" name="article_author" placeholder="Name of author" class="form-control">
                                </div>
                            </div> -->
                            <label>Image</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <input type="file" id="image" name="image" placeholder="Article Image" class="form-control">
                                </div>
                            
                                <input type="hidden" name="image" value="{{$article->image}}">
                            </div>
                            <div class="form-group"> 
                             <img src="/uploads/images/article/{{$article->image}}" style="width:200px; height:100px;">
                             </div>
                            <label><b>Select Article Category</b></label>
                            <div class="form-group">
                                
                              <select name="category"> 
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->article_category}}</option>
                                @endforeach
                              </select>
                            </div>

                              <label><b>Select Article Author</b></label>
                            <div class="form-group">
                                
                              <select name="author"> 
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                              </select>
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
                    <!-- End Edit -->
                    <!-- Delete Article -->
               <a class="btn btn-danger" onclick="return confirm('Are you sure you want remove this admin ?')"  href="{{route('delete_article',['id'=>$article->id
                      ])}}">Delete Article
                    </a>
                    <!-- End Delete -->
                
              </div>
              
              <div class="card-footer text-muted">
                Posted on {{$month}} {{$day}}, {{$year}} by Bola<br>

                Written by {{$article->author->name}}<br>

                 
              </div>
            </div>
                    @endforeach
 
                 </div>
                <!-- End Article Category -->
            </div>
             <!-- column(for article category) -->
            <div class="col-lg-6">
                <!-- Article Author -->
                <div class="card">
                    <div class="card-header" style="font-weight: bold; background: black; color: #fff; border-radius: 10px;">Create New Author</div>
                    <div class="card-body card-block">
                        
                        <form role="form" action="{{route('create.author')}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                            @csrf 
                             <div class="card-body">
                                
                                <!-- article_category Entry   --> 
                                <!--Name of Author  -->
                                <div class="form-group">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Author's Name" required="required">
                                </div>
                                <!--  about Author-->
                                <div class="form-group">
                                <textarea rows="5"  class="form-control" name="about" id="text" placeholder=" Brief story About Author"required="required" ></textarea> 
                                </div>
                                <!-- image -->
                                <label style="font-weight: bold;">Author's Image (Optional)</label>
                                <div class="form-group">
                                <input class="form-control" type="file" name="image" id="image" placeholder=" "  required="required">
                                </div>
                                <!-- facebook -->
                                 <div class="form-group">
                                <input class="form-control" type="text" name="facebook" id="facebook" placeholder="author's Facebook Handle (Optional)" required="required">
                                </div>
                                <!-- twitter -->
                                <div class="form-group">
                                <input class="form-control" type="text" name="twitter" id="article_category" placeholder="Author's Twitter (Optional)" required="required">
                                </div>
                                <!-- email -->
                                <div class="form-group">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Author's Email" required="required">
                                </div>
                                <!-- instagram -->
                                 <div class="form-group">
                                <input class="form-control" type="text" name="instagram" id="instagram" placeholder="Author's instagram Handle (Optional)" required="required">
                                </div>
                               
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                        </form>
                    </div>
                </div>
              <!--  //column(for article category) -->
                       

                        @foreach($authors as $author) 
                        <div class="card">
                           
                            <div class="card-header">
                                <strong class="card-title mb-3 pull-left"> Article Authors' Profile </strong>
                                <strong class="card-title mb-3 pull-right"> Author {{ $loop->iteration }} </strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="/uploads/images/author/{{$author->image}}"  style="width:120px;height:150px;" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><b>{{$author->name}}</b></h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$author->about}}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="{{$author->facebook}}"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="{{$author->twitter}}"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="{{$author->instagram}}"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="{{$author->email}}"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                                    <div class="pull-right">
                                        <span><a href="#" style="font-size: 15px;margin: 0 5px 0 0;color: #0f52ba;"><i style="margin-left: 0.2rem !important;" class="fa fa-edit" abbr title="Edit Category" class="far fa-edit" data-toggle = "modal"   data-target="#edit-category-{{$author->id}}"></i></a></span>

                                        <div class = "modal fade" id="edit-category-{{$author->id}}" tabindex = "-1"  role = "dialog"  >
                                            <div class = "modal-dialog" role = "document">
                                                <div class = "modal-content">
                                                    <div class = "modal-header">
                                                        <h5 class = "modal-title" id = "exampleModalLabel">Edit Author's Profile  </h5>
                                                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                                            <span aria-hidden = "true">×</span> 
                                                        </button>
                                                    </div>
                                                    <div class = "modal-body">
                                                        <form role="form" action="{{route('update.author',$author->id)}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" >
                                                            @csrf 
                                                             <div class="card-body">
                                                                <!-- Small Title Entry   -->                 
                                                                <div class="form-group">
                                                            <input class="form-control" type="text" name="name" id="name"  value="{{$author->name}}" placeholder="Author's Name" required="required">
                                                            </div>
                                                            <!--  about Author-->
                                                            <div class="form-group">
                                                            <textarea rows="5"  class="form-control" name="about" id="text" placeholder=" Brief story About Author"required="required"  >{{$author->about}}</textarea> 
                                                            </div>
                                                            <!-- image -->
                                                            <label style="font-weight: bold;">Author's Image (Optional)</label>
                                                            <div class="form-group">
                                                            <input class="form-control" type="file" name="image" id="image" placeholder=" " >
                                                            <input type="hidden" value="{{$author->image}}" name="image">
                                                            </div>

                                                           <div class="form-group"> 
                                                            <img src="/uploads/images/author/{{$author->image}}"  style="width:200px; height:100px;">
                                                            </div>>
                                                            <!-- facebook -->
                                                             <div class="form-group">
                                                            <input class="form-control" type="text" name="facebook" id="facebook" placeholder="author's Facebook Handle (Optional)" value="{{$author->facebook}}" required="required">
                                                            </div>
                                                            <!-- twitter -->
                                                            <div class="form-group">
                                                            <input class="form-control" type="text" name="twitter" id="article_category" placeholder="Author's Twitter (Optional)" value="{{$author->twitter}}" required="required">
                                                            </div>
                                                            <!-- email -->
                                                            <div class="form-group">
                                                            <input class="form-control" type="text" name="email" id="email" placeholder="Author's Email" value="{{$author->email}}" required="required">
                                                            </div>
                                                            <!-- instagram -->
                                                             <div class="form-group">
                                                            <input class="form-control" type="text" name="instagram" id="instagram" placeholder="Author's instagram Handle (Optional)" value="{{$author->instagram}}" required="required">
                                                            </div>
                                                           
                                                                <!-- /.card-body -->
                                                                <div class="modal-footer">
                                                                    <button type = "button"  class = "btn btn-danger" data-dismiss = "modal">Close</button>
                                                                    <button type ="submit" name="submit" class = "btn btn-primary">  Save Change</button>
                                                                </div>
                                                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <span>
                                        <a onclick="return confirm('Are you sure you want  this Author'+'s profile ?')" href="{{route('delete.author',['id'=>$author->id
                                        ])}}" style="font-size: 15px;margin: 0 5px 0 0;color: red;"> <i  style=" margin-left: 0.2rem !important;" class="fa fa-remove" abbr title="Delete Category" ></i></a>
                                    </span>
                                    </div>
                            </div>
                        </div>
                        @endforeach
               
                     
            </div>
        </div>
    </div>
</div>
 <!-- ///////////////////////////////////// -->
  
        
@endsection