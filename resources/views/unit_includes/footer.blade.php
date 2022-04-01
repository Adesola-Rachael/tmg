

  <footer id="footer" class="footer-area section-padding">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="footer-logo">TMGR</h3>
                <div class="textwidget">
                  <p style="width: 400px;"> {{$company_infos->description}}</p>
                </div>
                <div class="social-icon">
                  <a class="facebook" href="{{$company_infos->facebook}}"><i class="lni-facebook-filled"></i></a>
                  <a class="twitter" href="{{$company_infos->twitter}}"><i class="lni-twitter-filled"></i></a>
                  <a class="instagram" href="{{$company_infos->instagram}}"><i class="lni-instagram-filled"></i></a>
                  <a class="linkedin" href="mailto::{{$company_infos->email}}"><i class="fa fa-google-plus"></i></a>
                
                 </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <h3 class="footer-titel"> </h3>
              <ul class="footer-link">
                <li><a href="{{url('/about')}}">About</a></li>
                <li><a href="{{url('/course')}}">Online Courses</a></li>
                <li><a href="{{url('/services')}}">Services</a></li>
                <li><a href="{{url('/team')}}">Team</a></li>
                <li><a href="{{url('/benefit')}}">Benefit</a></li>           
                          
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
             <h3 class="footer-titel"> </h3>
              <ul class="footer-link">
                <li><a href="{{url('/articles')}}">Articles</a></li> 
                <li><a href="{{url('/about')}}">Believe</a></li>
                <li><a href="{{url('/about')}}">Mission</a></li>
                <li><a href="{{url('/about')}}">Vision</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
               
                          
              </ul>
            </div>
            
          </div>
        </div>  
      </div> 
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-content">
                <p>Copyright © {{date('Y')}}</a> All Right Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>   
  </footer>

 
      <!-- footer -->
  </body>
    <script src="js/jquery-2.1.4.min.js"></script>

        <script src="js/responsiveslides.min.js"></script>
    <!--         <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script> -->
<!--     <script src="js/responsiveslides.min.js"></script>
 -->      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
          // Slideshow 4
          $("#slider4").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 900,
            namespace: "callbacks",
            before: function () {
              $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
              $('.events').append("<li>after event fired.</li>");
            }
          });
         
         });
      </script>
</html>