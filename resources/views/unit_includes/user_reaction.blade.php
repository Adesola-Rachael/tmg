<div class="half order-md-last text-md-right">
		<p class="meta">              	    
			<span>
        <i class="icon-comment"></i>
          @php
          $mycount=count($article->comments);
          if($mycount<=1){
              echo $mycount." Comment";
          }else{
            echo $mycount." Comments";
          }
          @endphp                         
      </span>            
 		  <span>			  
        <i  style="cursor:pointer;"  id =" " class="icon-share" data-toggle = "modal"   data-target="#edit-category-{{$article->id}}">Share</i>
        <div class = "modal fade"  data-backdrop="false" id="edit-category-{{$article->id}}" tabindex = "-1"  role = "dialog"  >
          <div class = "modal-dialog"  id="iconShare" role = "document">
            <div class = "modal-content">
              <div class = "modal-header">
                <h5 class = "modal-title" id = "exampleModalLabel">{{$article->article_title}}</h5>
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                  <span aria-hidden = "true">×</span> 
                </button>
              </div>
              <div class = "modal-body" >
                <div class="share-btn-container">
                  <a href="#" class="facebook-btn">
                    <i class="fa icon-facebook"></i>
                  </a>
                  <a href="#" class="twitter-btn">
                    <i class="fa icon-twitter"></i>
                  </a>
                  <a href="#" class="linkedin-btn"> 
                    <i class="fa icon-linkedin"></i>
                  </a>
                  
                  <a href="#" class="whatsapp-btn">
                    <i class="fa icon-whatsapp"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </span>
		</p>
</div>