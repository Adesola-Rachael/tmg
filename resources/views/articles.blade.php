@extends('layouts.blog_app')
@section('pageTitle',$pageTitle)
@section('top_nav')
@section('bar_title',$bar_title)
@include('unit_includes.top_nav')
@endsection

  	@section('content')
		<div class="row pt-md-4">
			@foreach($articles as $article)
				<?php
					$date=date("Y-m-d",strtotime($article->created_at));
					 $now=date("Y-m-d");
					 $fivedays=date("Y-m-d",strtotime($now.'+5 days'));
						 
					  
					$temp = explode('-',$date);
					$day=$temp[2];
					$month=date("F", mktime(0, 0, 0,$temp[1] , 1));
					$year=$temp[0];
				?>


				<div class="col-md-12">
					<div class="blog-entry-2 ftco-animate">
						<a href="" class="img"   style="background-image: url(/uploads/images/article/{{$article->image}});"></a>
						<div class="text pt-4">
							<h3 class="mb-4"><a href="#">{{$article->article_title}}</a></h3> 
							<p class="mb-4 dec" >{{\Illuminate\Support\Str::words($article->article_desc, 30)}}...</p>
							<div class="author mb-4 d-flex align-items-center">
								<a href="#" class="img"    style="background-image: url(/uploads/images/author/{{$article->author->image}});"></a>
								<div class="ml-3 info">
									<span>Written by</span>
									<h3><a href="#">{{$article->author->name}}</a>, <span>{{$month}} {{$day}}, {{$year}}</span></h3>
								</div>
							</div>
							<div class="meta-wrap d-md-flex align-items-center">
							 @include('unit_includes.user_reaction') 
								<div class="half">
									<!-- <p><a href="/details/{{$article->article_id}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue Reading</a></p> -->
									<p><a href="{{route('detail',$article->article_id)}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue Reading</a></p>
								</div>
	            			</div>
	            		</div>
					</div>
				</div>
			@endforeach	 
		
		
		
		</div>
	 	<div class="row text-center">{{$articles->links()}}</div>

		 <!-- END-->
		<!-- blog pagination -->
		<!-- <div class="row">
      	 	<div class="col">
	            <div class="block-27">
	              <ul>
	                <li><a href="#">&lt;</a></li>
	                <li class="active"><span>1</span></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">4</a></li>
	                <li><a href="#">5</a></li>
	                <li><a href="#">&gt;</a></li>
	              </ul>
	            </div>
      		</div>
    	</div> -->
		<!--// blog pagination -->
	</div>
	@endsection
	<!-- //col to diplay blog article -->
	@section('side_menu_bar')
	<!-- second col to show blog side menu -->
		@include('unit_includes.blog_menu_side_bar')			 
	@endsection
	<!-- //second col to show blog side menu -->
	<!-- END COL -->
		    		

