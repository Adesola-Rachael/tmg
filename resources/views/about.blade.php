@extends('layouts.main_page_app')
@section('title',$pageTitle)

@section('top_next_nav')
@section('bar_title',$bar_title)
@include('unit_includes.top_nav')

@endsection
 @section('content')
 
<div class="about-area section-padding bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
              	 @foreach($overview as $overviews)
                <div class="site-heading">
                  <p class="mb-3">{{$overviews->believe_small_title}}</p>
                  <h2 class="section-title">{{$overviews->believe_title}}</h2>
                </div>
                <div class="content">
                  <p>
                     {{$overviews->believe_text}}
                  </p>
                 </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <img class="img-fluid" src="/uploads/images/believe/{{$overviews->image}}" alt="" >
          </div>
        </div>
      </div>
      <section id="features" class="section-padding">
        <div class="container">
          
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="content-right">
                @foreach($missions as $mission)
                <div class="box-item wow fadeInLeft" data-wow-delay="0.3s">
                  
                   <div class="text" style="justify-content: 3px;">
                    <h4 style="text-align:center; text-transform: uppercase;">{{$mission->title}}</h4>
                    <p>{{$mission->detail}}.</p>
                     
                  </div>
                  @endforeach
                </div>
                
              </div>
            </div>
            <!-- center image  -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
                <img src="/assets/images/gif/tenor.gif" alt="" >
                <img src="/uploads/images/unit_image/{{$mission_image->image}}" alt="" style="height: 300px;">
              </div>
            </div>
             <!-- ///////////center image  -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="content-right">
                @foreach($visions as $vision)
                <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
                   
                  <div class="text" style="justify-content: 3px;">
                    <h4 style="text-align:center; text-transform: uppercase;">{{$vision->title}}</h4>
                    <p>{{$vision->detail}}</p>
                  </div>
                </div>
                @endforeach
                 
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection