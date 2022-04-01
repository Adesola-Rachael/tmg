 
  <div class="fixed-top">
    <header class="topbar">
      <div class="container">
        <div class="row">
          <!-- social icon-->
          <div class="col-sm-12">
            <ul class="social-network">
              <li><a class="waves-effect waves-dark" href="url(www.facebook.com/{{$company_infos->facebook}})"><i class="fa fa-facebook"></i></a></li>
              <li><a class="waves-effect waves-dark" href="{{$company_infos->twitter}}"><i class="fa fa-twitter"></i></a></li>
              <li><a class="waves-effect waves-dark" href="{{$company_infos->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="waves-effect waves-dark" href="{{$company_infos->pinterest}}"><i class="fa fa-pinterest"></i></a></li>
              <li><a class="waves-effect waves-dark" href="{{$company_infos->email}}"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
      <div class="container">
        <a class="navbar-brand" href="index.html" style="text-transform: uppercase;">tmgrplatform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">About<i class="fa fa-caret-down" style="color:#fff; font-size: 15px;"></i></a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink1">
                <a class="dropdown-item" href="{{url('/about')}}">About Us</a>
                <a class="dropdown-item" href="{{url('/team')}}">Our Team</a>
               </div>
            </li>

          
  
        <!-- ////// -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">Services<i class="fa fa-caret-down" style="color:#fff; font-size: 15px;"></i></a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink1">
                <a class="dropdown-item" href="{{url('/services')}}">Our Services</a>
                <a class="dropdown-item" href="{{url('/courses')}}">Course</a>
                <a class="dropdown-item" href="{{url('/benefit')}}">Benefits</a>
              </div>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="{{url('/articles')}}">Articles</a>
            </li>
        <!-- //////////////// -->

            <li class="nav-item">
              <a class="nav-link" href="{{url('/contact_us')}}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
    <!-- //Navigation -->