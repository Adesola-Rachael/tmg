<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
     <!--Styles-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css" type="text/css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}"/>
     <!--Font-awesome-->
    <link rel="stylesheet" href="{{ asset('fonts/line-icons.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script> 
     
      <!------ Include the above in your HEAD tag -------->
      
      <!-- Fonts -->
      <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <!-- Styles -->
    <style>
     body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #f7f7f7;
      }
      
      #triangle {
         width: 0;
         height: 0;
         border-top: 40px solid transparent;
         border-right: 80px solid lightblue;
         border-bottom: 40px solid transparent;
      }
      .mid-backgound{
        /*background: url("/assets/images/a.jpg") no-repeat 0px 0px;
        background-size: cover;
        border: 1px solid #0f52ba;*/
      }
      .rectangle{
        height: 400px;
        width: 300px;
        background: green;
      }
      .about{
        color:#000;
        /*margin:5px;
        margin-top:50px;*/
        font:italic;
        text-align: center;
        padding: 10px;
      }
      .about h3{
        font-family:Apple Chancery ; 
      }
      .service{

      }
      .box-icon-classic {
        padding: 35px 30px;
        max-width: 370px;
        margin-left: auto;
        margin-right: auto;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 44px rgb(17 29 48 / 6%);
        transition: ease-in-out .3s;
      }
      .box-icon-classic .icon-main {
        position: relative;
        width: 92px;
        height: 92px;
        color: #ffffff;
        font-size: 36px;
        line-height: 92px;
        border-radius: 50%;
/*        background: #1FDE82;
*/        background:#4285f4;
        box-shadow: 0 4px 32px rgb(31 222 130 / 46%);
      }
      .box-icon-classic .icon-main > svg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .service .row {
        margin:10px;

      }
      .service .fa-facebook{
        width:36px;
        height:26;
        fill:none;
        overflow: hidden;
        vertical-align: middle;
        float:center;
      }
      .service2{
        background: url("/assets/images/blue.jpg") no-repeat 0px 0px;
        background-size: cover;
         
      } 
      svg {
          overflow: hidden;
          vertical-align: middle;
      } 
      .about-image{
        background: url("/assets/images/c.jpg") no-repeat 0px 0px;
        background-size: cover;
        width:100%;
        height:300px;
      }
      .about-image2{
         background: url("/assets/images/d.jpg") no-repeat 0px 0px;
        background-size: cover;
        width:100%;
        height:300px;
      } 
      .about-image3{
         background: url("/assets/images/svg/g.jpg") no-repeat 0px 0px;
        background-size: cover;
        width:100%;
        height:300px;
      } 
      .breadcrumbs-custom {
        position: relative;
        z-index: 1;
        padding: 35px 0 40px;
        vertical-align: middle;
        text-align: center;
      }
      .bg-secondary-2 {
    background-color: #6d0eb1;
    fill: #6d0eb1;
}


/*11111111111111111111111//////////////////////////*/
.navbar .nav-item:not(:last-child) {
  margin-right: 10px;
}
 
.dropdown-toggle::after {
   transition: transform 0.15s linear; 
}
 
.show.dropdown .dropdown-toggle::after {
  transform: translateY(3px);
}
/*1111/////////////////////*/
/*22222/////////////////////////////*/
.dropdown-menu {
  margin-top: 0;
}
 
    </style> 
