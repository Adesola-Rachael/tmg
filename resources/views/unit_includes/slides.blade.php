 <!--Carouel-->
    <div class="wrapper_top_w3layouts">
      <!-- /slider -->
      <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
              @foreach($sliders as $slider)

                <li>
                    <div class="banner-top2" style="width:100%; background: url(/uploads/images/slider/{{$slider->image}}) no-repeat 0px 0px ;)  ">
                        <div class="banner-info-wthree">
                            <h3>{{$slider->slide_title}}</h3>
                            <p>{{$slider->slide_text}}</p>

                        </div>

                    </div>
                </li>
                @endforeach
               <!--  <li>
                    <div class="banner-top3">
                        <div class="banner-info-wthree">
                            <h3>Heels For All.</h3>
                            <p>For All Walks of Life.</p>

                        </div>

                    </div>
                </li>
                <li>
                    <div class="banner-top">
                        <div class="banner-info-wthree">
                            <h3>Sneakers</h3>
                            <p>See how good they feel.</p>

                        </div>

                    </div>
                </li>
                <li>
                    <div class="banner-top1">
                        <div class="banner-info-wthree">
                            <h3>Adidas</h3>
                            <p>For All Walks of Life.</p>

                        </div>

                    </div>
                </li> -->
            </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
       <!-- //slider -->
    <!-- </div> -->
    <!--//Carousel-->











     <!-- Slideshow 4 -->
  <!--    <div class="header-outs">
        <div class="slider">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img">
                        <div class="container">
                           <div class="slider-info text-left">
                              <h4>Fashion World 
                              </h4>
                              <p>Lorem ipsum dolor</p>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img">
                        <div class="container">
                           <div class="slider-info text-center">
                              <h4>Trend Designs
                              </h4>
                              <p>Lorem ipsum dolor</p>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img text-right">
                        <div class="container">
                           <div class="slider-info">
                              <h4>Exclusive Look
                              </h4>
                              <p>Lorem ipsum dolor</p>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="clearfix"> </div>
         </div> -->
         <!-- This is here just to demonstrate the callbacks -->
         <!-- <ul class="events">
            <li>Example 4 callback events</li>
            </ul>-->
     <!--  </div> -->