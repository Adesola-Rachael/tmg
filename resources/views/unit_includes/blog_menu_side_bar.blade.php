 <!-- second col to show blog side menu -->

		    		<!-- 	<div class="">
		    				<ul>
		    					<li><a href="{{route('articles',['type'=>'visited'])}}">Most Visited</a></li>
		    					<li><a href="{{route('articles',['type'=>'recent'])}}">Most Recent</a></li>
		    				</ul>
		    			</div> -->




		    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
				            <div class="sidebar-box pt-md-4">
				              <form action="{{route('articles',['type'=>'search'])}}" class="search-form">
				                <div class="form-group">
				                  <span class="icon icon-search"></span>
				                  <input type="text" class="form-control typeahead" placeholder="Type a keyword and hit enter">
				                </div>
				              </form>
				            </div>
				             
				            <div class="sidebar-box ftco-animate">
				              <h3 class="sidebar-heading">Sort By</h3>
				              <ul class="tagcloud">
				                <a href="{{route('articles',['type'=>'visited'])}}" class="tag-cloud-link">Most Visited</a>
				                <a  href="{{route('articles',['type'=>'recent'])}}" class="tag-cloud-link">Recent Posts</a>
				                <!-- <a href="{{route('articles',['type'=>'popular'])}}" class="tag-cloud-link">Popular</a> -->
				                <!-- <a href="#" class="tag-cloud-link">dog</a>
				                <a href="#" class="tag-cloud-link">nature</a>
				                <a href="#" class="tag-cloud-link">leaves</a>
				                <a href="#" class="tag-cloud-link">food</a> -->
				              </ul>
				            </div>
				            <!-- section for news letter -->
							<div class="sidebar-box subs-wrap img py-4" style="background-image: url(/assets/images/blog_image/bg_1.jpg);">
								<div class="overlay"></div>
								<h3 class="mb-4 sidebar-heading">Newsletter</h3>
								<p class="mb-4">Subscribe to our newsletter to get updates about new articles and books</p>
					            <form action="{{route('newsletter')}}" accept-charset="UTF-8"    method="post" enctype="multipart/form-data" class="subscribe-form">
					            	@csrf
					                <div class="form-group">
					                  <input type="text" class="form-control" name="email" placeholder="Email Address">
					                  <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
					                </div>
					            </form>
					            @if(Session::get('success_newsletter'))
						        <div class="alert alert-success" style="text-align: center;" role="alert"> 
						            {{Session::get('success_newsletter')}}
						        </div>
						        @endif
		            		</div>
		            		<!--// part for news letter -->
		            		<!-- part for Archives -->
				            <!-- <div class="sidebar-box ftco-animate">
				            	<h3 class="sidebar-heading">Archives</h3>
				              <ul class="categories">
				              	<li><a href="#">Decob14 2018 <span>(10)</span></a></li>
				                <li><a href="#">September 2018 <span>(6)</span></a></li>
				                <li><a href="#">August 2018 <span>(8)</span></a></li>
				                <li><a href="#">July 2018 <span>(2)</span></a></li>
				                <li><a href="#">June 2018 <span>(7)</span></a></li>
				                <li><a href="#">May 2018 <span>(5)</span></a></li>
				              </ul>
				            </div> -->
				            <!--// part for Archives -->
							<!-- part for Archives -->
				            <!-- <div class="sidebar-box ftco-animate">
				              <h3 class="sidebar-heading">Paragraph</h3>
				              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
				            </div> -->
		          		</div>
		          		<!-- //second col to show blog side menu -->