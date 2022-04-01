<div class="pt-5 mt-5">

  	<h3 class="mb-5 font-weight-bold">
    	@if($count==1)
      		{{$count}} Comment
      		@elseif($count>1)
      		{{$count}} Comments
      	@endif   	  
  	</h3>
  	@foreach($comments as $comment)
  	<?php
		$date=date("Y-m-d h:i:s a",strtotime($comment->created_at));
		 $now=date("Y-m-d");
		  
			 
		  
		$temp = explode('-',$date);
		$day=$temp[2];
		$month=date("F", mktime(0, 0, 0,$temp[1] , 1));
		$year=$temp[0];
		$time= date('h:i:s a',strtotime($comment->created_at));
		// $time=$temp2[1];

		
	?>

  	<ul class="comment-list">
  		 
        <li class="comment">
          <div class="vcard bio">
			<div class=" " style="background: blue; border-radius: 30px; width:50px;height: 50px; color: white; font-size: 30px; text-align: center;">{{$firstStringCharacter = substr(($comment->name), 0, 1)}} </div>
            <!-- <img src="/assets/images/img/team/team-02.png" alt="Image placeholder"> -->
          </div>
          
         	<div class="comment-body">
                <h3>{{$comment->name}}</h3>
                <div class="meta"> {{$year}},{{$month}} {{$day}}</div>
                <p>{{$comment->comment}}</p>


                <!-- <p>	 
                	<div id="opener"><a href="#1" name="1" class="reply" onclick="return show();">reply</a></div> 
					<div class="comment-form-wrap pt-5" id="comment" style="display:none;">
						<h3 class="mb-5">Leave a Reply</h3>
						<form action="{{route('addReplies',['comment_id'=>$comment->id
                            ])}}" method="post" class="p-3 p-md-5 bg-light">
							@csrf
										                		 
			                <div class="form-group">
			                    <label for="name">Name *</label>
			                    <input type="text" class="form-control" id="name" name="name">
			                </div>
			                <div class="form-group">
			                    <label for="email">Email *</label>
			                    <input type="email" class="form-control" id="email" name="email">
			                </div>
			                 <input type="hidden" class="form-control" value="{{$comment->comment}}" id="comment_id" name="comment_id">
			                <div class="form-group">
			                    <label for="message">Message</label>
			                    <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
			                </div>
			                <div class="form-group">
			                    <input type="submit" id="submit" value="Reply" class="btn py-3 px-4 btn-primary">
			                </div>
						</form>
						<div id="upbutton"><a onclick="return hide();">click here</a></div>
					</div>                
									                  	 
					<input type="hidden" name="_token" value="{{Session::token()}}">	 
                </p> -->
          	</div>
               
              	<!-- ul class="children">
                	<li class="comment">
	                    <div class="vcard bio">
	                        <img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
	                    </div>
                        <div class="comment-body">
	                        <h3>Hon Doe</h3>
	                        <div class="meta">October 03, 2018 at 2:21pm</div>
	                        <p>wewewewwew ewewewewewe wewe wewewewe wewewewe wewewewewe wewewew ewewewew wewewewewe wewewewewewew ewewewe wewewewew ewewewe wewewe ewewe ew ewewewew ewewew ewewewewew eweweew ewewewew ewewe wewewewe</p>
	                        <p><a href="#" class="reply">Reply</a></p>
                      	</div>
		                
					</li>
				</ul> -->
					  
        </li>
        @endforeach
       <!--  <li class="comment">
      	    <div class="vcard bio">
         		<img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
     		</div>
      		<div class="comment-body">
            <h3>John Doe</h3>
            <div class="meta">October 03, 2018 at 2:21pm</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
            <p><a href="#" class="reply">Reply</a></p>
      		</div>
        	<ul class="children">
            	<li class="comment">
                    <div class="vcard bio">
                        <img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>John Doe</h3>
                        <div class="meta">October 03, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                  	</div>
	                <ul class="children">
	                        <li class="comment">
		                        <div class="vcard bio">
		                            <img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
		                        </div>
	                          	<div class="comment-body">
		                            <h3>John Doe</h3>
		                            <div class="meta">October 03, 2018 at 2:21pm</div>
		                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                            <p><a href="#" class="reply">Reply</a></p>
	                          	</div>
		                        <ul class="children">
		                              <li class="comment">
		                                <div class="vcard bio">
		                                  <img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
		                                </div>
		                                <div class="comment-body">
		                                  <h3>John Doe</h3>
		                                  <div class="meta">October 03, 2018 at 2:21pm</div>
		                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
		                                  <p><a href="#" class="reply">Reply</a></p>
		                                </div>
		                              </li>
		                        </ul>
        					</li>
      				</ul>
				</li>
				</ul>
		</li>
		<li class="comment">
            <div class="vcard bio">
                <img src="/assets/images/img/team/team-02.png" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">October 03, 2018 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
            </div>
		</li>
		</ul> -->

			<!-- END comment-list -->
		<section >
          	<div class="comment-form-wrap pt-5" id="comment">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{route('comment')}}" method="post" class="p-3 p-md-5 bg-light">
                	@csrf
                	 @if(Session::get('success_comment'))
        				<div class="alert alert-success" style="text-align: center;" role="alert">
            				{{Session::get('success_comment')}}
        				</div>
       					  @elseif($errors->any())
    						@foreach($errors->all() as $err)
       					 <div class="alert alert-danger"><li>{{$err}}</li></div>
    					@endforeach
    					@endif
                		 
			    		<input type="hidden" name="article_id" value="{{$article->id}}">
	                <div class="form-group">
	                    <label for="name">Name *</label>
	                    <input type="text" class="form-control" id="name" name="name">
	                </div>
	                <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input type="email" class="form-control" id="email" name="email">
	                </div>
	                  
	                <div class="form-group">
	                    <label for="message">Message</label>
	                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
	                </div>
	                <div class="form-group">
	                	 <input type="submit" name="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
<!-- 	                    <input type="submit" id="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
 -->	                </div>
                </form>
          	</div>
  	</section>
</div>

