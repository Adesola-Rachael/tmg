 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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
  <!-- script for article social media share -->
  <script type="text/javascript">
  const facebookBtn=document.querySelector(".facebook-btn");
  const twitterBtn=document.querySelector(".twitter-btn");
  const linkedinBtn=document.querySelector(".linkedin-btn");
  const pinterestBtn=document.querySelector(".pinterest-btn");
  const whatsappBtn=document.querySelector(".whatsapp-btn");
  function init(){
   
    const pintImage=document.querySelector("#pint_image");
    let posturl=encodeURI(document.location.href);
    let posttitle=<?php echo json_encode($article->article_title); ?>;
    let pimage=encodeURI(pintImage);
    // console.log(posttitle);

    facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${posturl}`);
    linkedinBtn.setAttribute("href", `https://www.linkedin.com/shareArticle?url=${posturl}&title=${posttitle}`);
    whatsappBtn.setAttribute("href", `https://api.whatsapp.com/send?text=${posttitle} ${posturl}`);
    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${posturl}&text=${posttitle}&via=[via]&hashtags=[hashtags]
    `);

    
}
init();
</script>
 <!-- script for article social media share -->
 <script type="text/javascript">
  
    function show() { 
        if(document.getElementById('comment').style.display=='none') { 
            document.getElementById('comment').style.display='block'; 
        } 
        return false;
    } 
    function hide() { 
        if(document.getElementById('comment').style.display=='block') { 
            document.getElementById('comment').style.display='none'; 
        } 
        return false;
    }  

</script>
<script type="text/javascript">
        var count = 0;
        var btn = document.getElementById("btn");
        var disp = document.getElementById("display");
  
        btn.onclick = function () {
            count++;
            disp.innerHTML = count;
        }
</script>

<script type="text/javascript">

  //  $(document).ready(function () {

  //   $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //   });

     //Validation before submit
   //  $(".name_error_text").hide();
   //  $(".address_error_text").hide();

   //  var error_name = false;
   //  var error_address = false;

   //  $("#name").focusout(function () {
   //     check_name();
   //  });

   //  $("#address").focusout(function () {
   //     check_address();
   //  });

   // function check_name(){
   //  $("#message").hide(); 
   //  var name_length = $("#name").val().length;
   //  if(name_length < 5){
   //       $(".name_error_text").html("Name should be atleat 5 characters");
   //       $(".name_error_text").show().addClass("error");
   //       $("#message").hide();
   //       error_name = true;
   //    }else{
   //       $(".name_error_text").hide();
   //    }
   //  }

   //  function check_address(){
   //  $("#message").hide(); 
   //  var address_length = $("#address").val().length;
   //  if(address_length < 5){
   //       $(".address_error_text").html("Address should be atleast 5 characters");
   //       $(".address_error_text").show().addClass("error");
   //       error_address = true;
   //       $("#message").hide();
   //    }else{
   //       $(".address_error_text").hide();
   //    }
   //  }

    //Submit Data
    // $("#submit").click(function(e){

    //     e.preventDefault();

    //     var name = $("#name").val();
    //     var email = $("#email").val();
    //     var comment = $("#comment").val();
    //     var comment_id = $("#comment_id").val();
    //     var url = '{{ url('addReplies') }}';
        
    // if (name.length < 5 || address.length < 5){

        // check_name();
        // check_address();
       
  //   }else {
 
  //       $.ajax({
  //          url:url,
  //          method:'POST',
  //          data:{
  //                 name:name, 
  //                 email:email,
  //                 comment:comment,
  //                 comment_id:comment
  //               },
  //          success:function(response){
  //             $("#success").html(response.message)
  //          },
  //       });
  //     }
  //  });

// });

</script>

<script >
  $(document).ready(function(){
     $(".dislike").on("click", function(){
      
    });
  });
</script>
<script type="text/javascript">
  var path="{{route('articles')}}";
  $('input.typeahead').typeahead({
      source:function(terms,process){
        return $.get(path,{terms:terms},function(data){
          return process(data)
        });
      }
  });
 
</script>




  <script src="{{ asset('js/blog_js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/popper.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/blog_js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/aos.js') }}"></script>
  <script src="{{ asset('js/blog_js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/scrollax.min.js') }}"></script>
  <script src="{{ asset('js/blog_js/main.js') }}"></script>
  <!-- <script src="{{ asset('js/blog_js/share.js') }}"></script> -->
    
  </body>
</html>
 
