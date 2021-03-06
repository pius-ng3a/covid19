
<!-- Start Slider -->
@if(Session::has('blog_success'))
 <div class="alert alert-success" style="color:red;background-color:white;size=200px;text-align:center;">
    {{Session::get('blog_success')}}
  </div>
 @endif
<section id="mu-slider">
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img" style="opacity: 2">
      <figure>
        <img src="{{URL::asset('image/cor.jpg')}}" alt="school Board">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.welcome')}}</h4>
      <span></span>
      <h2>{{trans('english.help_to_learn')}}</h2>
      <p>{{trans('english.seat_of_knowledge')}}</p>
      <a href="#mu-features" class="mu-read-more-btn">{{trans('english.read_more')}}</a>
    </div>
  </div>
  <!-- Start single slider item -->
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/world.jpg')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.condusive_campus')}}</h4>
      <span></span>
      <h2>{{trans('english.good_envt')}}</h2>
      <a    href="#mu-our-teacher" class="mu-read-more-btn">{{trans('english.tour_campus')}}</a>
    </div>
  </div>
  <!-- Start single slider item -->
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/africa.jpg')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.admins')}}</h4>
      <span></span>
      <h2>{{trans('english.duty_admins')}}</h2>
    </div>
  </div>
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/chemistry_lab.jpg')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.chem_lab')}}</h4>
      <span></span>
      <h2>{{trans('english.equipped_chem')}}</h2>
    </div>
  </div>
  <!-- End of single slider item-->

  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/social_dist.jpg')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.laboratory')}}</h4>
      <span></span>
      <h2>{{trans('english.equipped_laboratory')}}</h2>
    </div>
  </div>
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/washHands.jfif')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.staff')}}</h4>
      <h2>{{trans('english.dynamic_staff')}}</h2>
      <a href="#mu-our-teacher" class="mu-read-more-btn">{{trans('english.view_staff')}}</a>
    </div>
  </div>
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/stayhome.jfif')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.staff')}}</h4>
      <span></span>
      <h2>{{trans('english.stay_home')}}</h2>

    </div>
  </div>
  <!--start -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img">
      <figure>
        <img src="{{URL::asset('image/mask.jfif')}}" alt="img">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.staff')}}</h4>
      <span></span>
      <h2>{{trans('english.wear_mask')}}</h2>
    </div>
  </div>

<!-- Start single slider item -->

  
</section>
<!-- End Slider -->
<!-- Start service  -->
 {{--<section id="mu-service">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-service-area">
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-book"></span>
            <h3>Learn Online</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-users"></span>
            <h3>Expert Teachers</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-table"></span>
            <h3>Best Classrooms</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
        </div>
      </div>
    </div>
  </div>
</section>--}}
<!-- End service  -->

<!-- Start about us -->
<section id="mu-our-teacher" >
  <div class="container" style="margin-top: -100px;">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-our-teacher-area">
          <!-- begain title -->
          <div class="mu-title">
            <h2>{{trans('english.our_teachers')}}</h2>
              <p>{{trans('english.our_teachers_intro')}}</p>
           </div>
          <!-- end title -->
          <!-- begain our teacher content -->
          <div class="mu-our-teacher-content">
            <div class="row">
              <div class="col-lg-6 col-md-6  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/africamap.jpg')}}" alt="dynamic world map">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.principal')}} {{ " : ".trans('english.principal_name')}}</h4>

                    <p>  </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6  col-sm-6">
                <canvas id="myChart" width="400" height="320"></canvas>
              </div>

            </div>
          </div>
          <!-- End our teacher content -->
        </div>
      </div>
    </div>
  </div>
</section>

<section id="mu-about-us" style="margin-top: -4%;background-color: rgba(55, 85, 93, 0.29)">
{!!Html::style('css/munde.css')!!}
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
               
            </div>
            <div class="col-lg-6 col-md-6">
              <!-- <h3 class="event_section"><marquee>{{trans('english.latest_news').'&' . trans('english.events')  }}</marquee></h3> -->
                <?php $events = \App\Message::getUnreadMessages();?>
                
               <div class="modal_pop_up">
                  <div class="modal-content">
                    <span class="close" onclick="closeModal(this)">x</span>
                    @if(Session::has('msg_success'))
                     <div class="alert alert-success">
                        {{Session::get('msg_success')}}
                      </div>
                    @endif

                    <div id="modal_content">Some text in the Modal..</div>
                  </div>
               </div>

               <script>
                    function closeModal(obj){
                      $('.modal_pop_up').hide();
                    }
                   function populateModal(obj,event_id){
                      //alert($('#baseUrl').val()+"/event/get/full/event/description/"+event_id)
                      $.ajax({
                          type: "get",
                          url: $('#baseUrl').val()+"/event/get/full/event/description/"+event_id,
                          success: function (html) {
                              $("#modal_content").html(html)
                              $(".modal_pop_up").show()
                          },
                          error: function (error) {
                              alert('Error from server')
                              console.log(error)
                          }
                      });
                   }
                   function showContactForm(obj ){
                   var metaTags=document.getElementsByTagName("meta");

                    var fbAppIdContent = "";
                    for (var i = 0; i < metaTags.length; i++) {
                        if (metaTags[i].getAttribute("property") == "token") {
                            fbAppIdContent = metaTags[i].getAttribute("content");
                            break;
                        }
                    }

                      //alert($('#baseUrl').val()+"/event/get/full/event/description/"+event_id)
                     $("#modal_content").html('<div class="mu-contact-content"> <div class="row"> <h2>Please answer the Questions<br/> <div class="col-md-6"><div class="mu-contact-left">'+
                       '<form method="post" action="'+$('#baseUrl').val()+'/new/covid/status"'+'class="contactform">'+
                       '<input type="hidden" value="'+ fbAppIdContent +'" name="_token"><p class="comment-form-author" style="font-size:20px"><label for="author">1. Travelled to risk zone recently?'+
                       ' <span class="required">*</span></label>'+
                       '<select name="travel" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                       '<p class="comment-form-author" style="font-size:20px"><label for="author">2. Do you have dry cough?<span class="required">*</span></label>'+
                      '<select name="cough" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                      '<p class="comment-form-author" style="font-size:20px"><label for="author">3. Do you have running nostrils?<span class="required">*</span></label>'+
                      '<select name="cold" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                      '<p class="comment-form-author" style="font-size:20px"><label for="author">4. Do you breath with difficulty?<span class="required">*</span></label>'+
                      '<select name="chest" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                      '<p class="comment-form-author" style="font-size:20px"><label for="author">5. Do you have high fever?<span class="required">*</span></label>'+
                      '<select name="fever" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                      '<p class="comment-form-author" style="font-size:20px"><label for="author">6. Experiencing fatigue or body pains?<span class="required">*</span></label>'+
                      '<select name="pain" class="form-control" size=".001"><option value="1">Yes</option><option value="0">No</option></select></p>'+
                   '<input style="margin-left: 70%;background-color: green" type="submit" value="Send Message" class="mu-post-btn" name="submit"></p></form></div></div><div class="col-md-6"><div class="mu-contact-right"><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d6249.345033302234!2d-80.02791918555701!3d40.45935344513505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8834f411a7b748bd%3A0xaec8197db3de9a9e!2sCalifornia-Kirkbride%2C+Pittsburgh%2C+PA%2C+USA!3m2!1d40.4600435!2d-80.0213538!5e0!3m2!1sen!2sbd!4v1464270878470" width="100%" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>'+
                    '</div></div></div></div>')

                     $(".modal_pop_up").show()

                   }
               </script>



             </div>
          </div>



          <?php $encrypter = app('Illuminate\Encryption\Encrypter');
           $encrypted_token = $encrypter->encrypt(csrf_token()); ?>
               <input style="visibility: hidden" id="csrfTokenValue" value="{{$encrypted_token}}"/>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about us -->
<!-- start  of admission notice -->
<br/>
<br/>
<section id="mu-service" >
  <div class="container">
  <div class="row" >
        <h2 style="text-align: center; color: dodgerblue;">{{trans('english.admission_procedure')}}</h2>
  </div>
  <br/>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-service-area">
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-book"></span>
            <h3>{{trans('english.form_one')}}</h3>
            <p>{{trans('english.form_one_interview')}}</p>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single"style="height: ;" >
            <span class="fa fa-users"></span>
            <h3>{{trans('english.form_six')}}</h3>
            <p>{{trans('english.form_six_body')}}</p><br/>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-table"></span>
            <h3>{{trans('english.returning_students')}}</h3>
            <p>{{trans('english.returning_students_body')}}</p>
          </div>
          <!-- Start single service -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End of admission notice -->


<!-- Start about us counter -->

<!-- End about us counter -->

<!-- Start features section -->
{{-- <section   style="background-color: rgba(70, 28, 210, 0.29) " >
  <div class="container" >
    <div class="row"  >
        <div class="col-lg-12 col-md-12 col-xs-12" >
            <h2 style="text-align: center" id="about_us"> {{trans('english.about_ghs_bafut_hd')}}</h2>
            <p >{{trans('english.about_ghs_bafut_bd')}}</p>
            <br/>
             <!-- Start ghs administration histroy profile-->
            <div class="container" >
            <div class="row">
                <div class="col-md-12">
                   <div class="mu-our-teacher-area">
                  <!-- begin ghs administration history content -->
                  <div class="mu-our-teacher-content">
                    <div class="row">
                      <div class="mu-title">
                      <h2>{{trans('english.administration_history')}}</h2>
                      </div>
                      <div class="col-lg-12 col-md-12  col-sm-12">
                        <div class="mu-our-teacher-single" style="margin-left: 400px;">
                          <figure class="mu-our-teacher-img">
                            <img style="border-radius: 50%; height: 250px;width: 250px;" src="{{URL::asset('image/graph1.png')}}" alt=" current principal">
                          </figure>
                          <div class="mu-ourteacher-single-content">
                            <h4> {{trans('english.principal')}} {{ " : ".trans('english.current_p_nm')}}</h4>
                            <p class="break_words"> {{trans('english.current_p_reign')}} </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4  col-sm-4">
                        <div class="mu-our-teacher-single">
                          <figure class="mu-our-teacher-img">
                            <img style="border-radius: 50%; height: 250px;width: 250px;" src="{{URL::asset('image/cor.jpg')}}" alt=" current principal">
                          </figure>
                          <div class="mu-ourteacher-single-content">
                            <h4> {{trans('english.principal')}} {{ " : ".trans('english.2010_p')}}</h4>
                            <p class="break_words"> {{trans('english.2010_p_reign')}} </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4  col-sm-4">
                        <div class="mu-our-teacher-single">
                          <figure class="mu-our-teacher-img">
                            <img style="border-radius: 50%; height: 250px;width: 250px;" src="{{URL::asset('image/graph2.png')}}" alt=" current principal">
                          </figure>
                          <div class="mu-ourteacher-single-content">
                            <h4> {{trans('english.principal')}} {{ " : ".trans('english.2005_p')}}</h4>
                            <p class="break_words"> {{trans('english.2005_p_reign')}} </p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4  col-sm-4">
                        <div class="mu-our-teacher-single">
                          <figure class="mu-our-teacher-img">
                            <img style="border-radius: 50%; height: 250px;width: 250px;" src="{{URL::asset('image/graph4.png')}}" alt=" current principal">
                          </figure>
                          <div class="mu-ourteacher-single-content">
                            <h4> {{trans('english.principal')}} {{ " : ".trans('english.1999_p')}}</h4>
                            <p class="break_words"> {{trans('english.1999_p_reign')}} </p>
                          </div>
                        </div>
                      </div>

                   </div>
                  </div>
        </div>
                </div>
            </div>
        </div>
            <!-- End adminstration history  -->
      </div>
    </div>
    <div class="row"  id="mu-features" style="margin-top:-60px;">
      <div class="col-lg-12 col-md-12" >
        <div class="mu-features-area" >
          <!-- Start Title -->

          <!-- End features content -->
        </div>
      </div>
    </div>
  </div>

</section>--}}
<!-- End features section -->
<!-- Start staff here-->


<!-- End staff here -->



<!-- Start our teacher -->

<!-- End our teacher -->
<!-- Start testimonial -->
<section id="mu-testimonial">
  <div class="container">
    <div class="row">
    <div class="row">
       <h2 style="text-align: center;color: green;">{{trans('english.testimonials')}}</h2>
      </div>
      <div class="col-md-12">

        <div class="mu-testimonial-area">
          <div id="mu-testimonial-slide" class="mu-testimonial-content">
            <!-- start testimonial single item -->
            <div class="mu-testimonial-item">
              <div class="mu-testimonial-quote">
                <blockquote>
                  <p>Globally, nearly 1.5 million confirmed cases of COVID-19 have now been reported to WHO, and more than 92,000 deaths.</p>
                </blockquote>
              </div>
              <div class="mu-testimonial-img">
                <img style="height:450px;width: 450px;" src="{{URL::asset('image/who_president.jfif')}}" alt="img">
              </div>
              <div class="mu-testimonial-info">
                <h4>Precious</h4>
                <span>Happy Student</span>
              </div>
            </div>
            <!-- end testimonial single item -->
            <!-- start testimonial single item -->
            <div class="mu-testimonial-item">
              <div class="mu-testimonial-quote">
                <blockquote>
                  <p>COVID-19 (Coronavirus) Drives Sub-Saharan Africa Toward First Recession in 25 Years</p>
                </blockquote>
              </div>
              <div class="mu-testimonial-img">
                <img style="height: 450px;width: 450px;" src="{{URL::asset('/image/recession_in_africa.png')}}" alt="img">
              </div>
              <div class="mu-testimonial-info">
                <h4>Ngwa Pius</h4>
                <span>Happy Alumnus</span>
              </div>
            </div>
            <!-- end testimonial single item -->
            <!-- start testimonial single item -->
            <!-- end testimonial single item -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End testimonial -->
<div class="">
<meta name="csrf-token" content="{{ csrf_token() }}">
</div>
