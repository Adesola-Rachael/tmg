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
        <div class="team-item wow fadeInRight" data-wow-delay="0.2s" style=" max-height:400px">
          <div class="team-img">
            <img class="img-fluid" src="/uploads/images/team/{{$team->image}}" style="height:200px; width:200px;" alt="">
          </div>
          <div class="contetn">
            <div class="info-text">
              <h3><a href="#">{{$team->name}}</a></h3>
              <p>{{$team->role}}</p>
            </div>
            <p>{{$team->about}}</p>
            <ul class="social-icons">
              <li><a href="{{$team->facebook}}"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
              <li><a href="{{$team->twitter}}"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
              <li><a href="{{$team->instagram}}"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
              <li><a href="mailto::{{$team->email}}"><i class="lni-instagram-filled" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- Team Item Ends -->
      </div>
       @endforeach
    </div>
  </div>
</section>