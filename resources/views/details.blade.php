@extends('layouts.blog_app')
@section('pageTitle',$pageTitle)
@section('top_nav')
@section('bar_title',$bar_title)
@include('unit_includes.top_nav')
@endsection

 	@section('content')
		<div class="row pt-md-4">
      <h1 class="mb-3" style="padding:1px 10px;">{{$article->article_title}}</h1> 
        <p>
          <img  src="/uploads/images/article/{{$article->image}}" alt=""id="pint_image" class="img-fluid" style=" width:600px;height: 400px; display: block;">
        </p>
        <p class="dec" style=" padding:2px 15px; ">{{$article->article_desc}}</p> 
           <div style ="padding:2px;">@include('unit_includes.user_reaction')</div>
        
              <!-- user reaction -->
            
        <!-- about author -->
        <div class="about-author d-flex p-4 bg-light" style=" ">
          <div class="bio mr-5">
            <img src="/uploads/images/author/{{$article->author->image}}" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc">
            <h3>By <b>{{$article->author->name}}</b></h3>
            <p>{{$article->author->about}}</p>
          </div>
            <!-- actions on details -->
        </div>
    </div>
            <!-- //about author -->

            <!-- comments and reply -->
            @include('pages_includes.blog_comment', ['comments' => $article->comments, 'id' => $article->id, 'count'=>count($article->comments)])
            <!-- comments and reply -->
		 </div>
		<!-- blog pagination -->

		<!--// blog pagination -->
 
 
	@endsection
	<!-- //col to diplay blog article -->
	@section('side_menu_bar')
	<!-- second col to show blog side menu -->
		@include('unit_includes.blog_menu_side_bar')			 
	@endsection
	<!-- //second col to show blog side menu -->
	<!-- END COL -->
 