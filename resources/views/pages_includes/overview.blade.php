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
                    {{\Illuminate\Support\Str::words($overviews->believe_text, 40)}}...
                    
                  </p>
                  @endforeach
                  <a href="{{url('about')}}" class="btn btn-common mt-3">Read More</a>
                </div>
               
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <img class="img-fluid" src="/uploads/images/believe/{{$overviews->image}}" alt="" >
          </div>
        </div>
      </div>
    </div>