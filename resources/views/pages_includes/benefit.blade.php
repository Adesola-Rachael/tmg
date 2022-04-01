 <section id="pricing" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Your Benefit</h2> <p class="price-value"> </p>

          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          @foreach($benefits as $benefit)
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="table wow fadeInLeft" data-wow-delay="1.2s">
              <div class="icon-box">
                <i class="{{$benefit->fonts->font_name}}"></i>
              </div>
              <div class="pricing-header">
                
              </div>
              <div class="title">
                <h3>{{$benefit->title}}</h3>
              </div>
              <ul class="description">
                <p style=" font-size: 14px;font-weight: 400;color: #abacae;padding: 4px 0;">{{$benefit->detail}}</p>
                 
              </ul>
               <a type="button" class="btn btn-common" href="{{url('/courses')}}">Regiter Now</a>
            </div> 
          </div>
          @endforeach
       <!--    <div class="col-lg-4 col-md-6 col-xs-12 active">
            <div class="table wow fadeInUp" id="active-tb" data-wow-delay="1.2s">
              <div class="icon-box">
                <i class="lni-drop"></i>
              </div>
              <div class="pricing-header">
                
              </div>
              <div class="title">
               <h3>Employment Opprotunity</h3>
              </div>
              <ul class="description">
                <p style=" font-size: 14px;font-weight: 400;color: #abacae;padding: 4px 0;">TMGR me mbership id card is recognise every where and blablabalTMGR me mbership id card is recognise every where and blablabalTMGR me mbership id card is recognise every where and blablabal</p>
              </ul>
                <a type="button" class="btn btn-common" href="{{url('/courses')}}">Regiter Now</a>
           </div> 
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="table wow fadeInRight" data-wow-delay="1.2s">
              <div class="icon-box">
                <i class="lni-star"></i>
              </div>
              <div class="pricing-header">
               </div>
              <div class="title">
                <h3>Training AND certification</h3>
              </div>
             <ul class="description">
                <p style=" font-size: 14px;font-weight: 400;color: #abacae;padding: 4px 0;">TMGR me mbership id card is recognise every where and blablabalTMGR me mbership id card is recognise every where and blablabalTMGR me mbership id card is recognise every where and blablabal</p>
              </ul>
              <a type="button" class="btn btn-common" href="{{url('/courses')}}">Regiter Now</a>
            </div> 
          </div> -->
        </div>
      </div>
    </section>