@include('unit_includes.blog_header')
  </head>
<body>
@include('unit_includes.nav')
@section('top_nav')
@show

 
 
<div id=" ">
	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			    		<!-- main page row -->
			  <div class="row d-flex">
			    			<!-- first col to show blog articles -->
			    			<div class="col-xl-8 py-5 px-md-5">
@section('content')
@show
@section('side_menu_bar')
@show
</div>
		    		<!-- //main page row -->
		    	</div>
	    	</section>
		</div>
		<!-- END COLORLIB-MAIN -->
	 <!-- END COLORLIB-PAGE -->

  <!-- loader -->
@include('unit_includes.blog_footer')