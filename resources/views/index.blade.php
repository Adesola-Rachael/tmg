@extends('layouts.main_page_app')
  @section('title',$pageTitle)

@section('content')

   @section('top_next_nav')
   @include('unit_includes.slides')
   @endsection

   <!-- Services Section Start -->
    @include('pages_includes.service')
    <!-- //Services Section End -->

    <!-- About Section start -->
    @include('pages_includes.overview')
    <!-- About Section End -->

    <!-- Features Section Start -->
    @include('pages_includes.courses')
    
    <!-- Features Section End -->   

    <!-- Team Section Start -->
    @include('pages_includes.team')
     
    <!-- Team Section End -->

    <!-- Pricing section Start --> 
    @include('pages_includes.benefit')
    
    <!-- Pricing Table Section End -->
  
    <!-- Testimonial Section Start -->
     

    <!-- related blog articles -->
     <section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="blog-text section-header text-center">  
              <div>   
                <h2 class="section-title">Latest Article Posts</h2>
                <div class="desc-text">
                 <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p> -->
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row">
          <!-- Start Col -->
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
          <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="/uploads/images/article/{{$article->image}}" class="img-fluid" alt="">
                </a>             
              </div>
              <div class="blog-item-text"> 
                <h3><a href="{{url('articles')}}">{{$article->article_title}}</a></h3>
                <p>{{\Illuminate\Support\Str::words($article->article_desc, 20)}}...</p>
                <a href="{{url('articles')}}" class="read-more">Read More</a>
              </div>
              <div class="author">
                <span class="name"><i class="lni-user"></i><a href="#">By {{$article->author->name}}</a></span>
                <span class="date float-right"><i class="lni-calendar"></i><a href="#">{{$month}} {{$day}}, {{$year}}</a></span>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
          @endforeach
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </section>
    <!--related blog articles-->

    <!-- Contact Section Start -->

<!-- ================ Start contact-page Area  ================= -->
      
    <!-- Contact Section End -->
@endsection
    <!-- Footer Section Start -->
   
