
<section class="contact-page-area section-gap">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
            <div class="contact-text section-header text-center">  
              <div>   
                <h2 class="section-title">Get In Touch</h2>
                <div class="desc-text">
                  <p>@if(Session::has('success_contact'))
                    <div class="alert alert-primary">
                      {{Session::get('success_contact')}}
                     </div>
                    @endif
                  </p>
                </div>
              </div> 
            </div>
          </div>
        </div>
      <div class="row">

       <!--  <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
        <div class="col-lg-4 d-flex flex-column address-wrap">
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-home"></span>
            </div>
            <div class="contact-details">
               
              <h5>{{ $company_infos->location}}, Nigeria</h5>
             
               
            </div>
          </div>
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-phone-handset"></span>
            </div>
            <div class="contact-details">
              <h5>{{ $company_infos->phone}}</h5>
              <p>Mon to Fri 9am to 6 pm</p>
            </div>
          </div>
          <div class="single-contact-address d-flex flex-row">
            <div class="icon">
              <span class="lnr lnr-envelope"></span>
            </div>
            <div class="contact-details">
              <h5><a href="mailto::{{ $company_infos->email}}" style="color:#000;">click here</a></h5>
              <p>To Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <form class="form-area contact-form text-right" id="myForm" action="{{route('contact.send')}}"method="post">
            @csrf
            <div class="row">
              <div class="col-lg-6 form-group">
                <input name="name" placeholder="Enter your name" class="common-input mb-20 form-control" required="" type="text">
                 <input name="phone" placeholder="Enter your Phone Number" class="common-input mb-20 form-control" required="" type="text">

                <input name="email" placeholder="Enter email address"   class="common-input mb-20 form-control" required="" type="email">
                <input name="subject" placeholder="Enter subject" placeholder = 'Enter subject' class="common-input mb-20 form-control" required="" type="text">
              </div>
              <div class="col-lg-6 form-group">
                <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege"  required=""></textarea>
              </div>
              <div class="col-lg-12">
                <div class="alert-msg" style="text-align: left;"></div>
                  <button class="btn btn-common" name="submit" id="submit" type="submit">Send Message</button>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
 