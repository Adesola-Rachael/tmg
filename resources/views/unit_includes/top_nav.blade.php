<div class="home_container">
		@foreach($unit_image as $unit_img)
			<div class="home_background parallax-window" data-parallax="scroll" style="background-image: url('/uploads/images/unit_image/{{$unit_img->image}}');   height:2px;   "data-speed="0.8"></div>
			@endforeach
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content d-flex flex-row align-items-center justify-content-start">
							<div class="home_title">@yield('bar_title')</div>
							<div class="home_breadcrumbs ml-auto">
								<ul class="breadcrumbs">
									<li><a href="{{url('/')}}">Home</a></li>
									<li>@yield('bar_title')</li> 
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	 