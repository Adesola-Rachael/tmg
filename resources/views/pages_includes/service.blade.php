
     <section id="services" class="section-padding">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Services</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <!-- Services item -->

          @foreach($services as $service)
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="{{$service->fonts->font_name}}"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">{{$service->title}}</a></h3>
                <p>{{$service->text}}.</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      </div>
    </section>