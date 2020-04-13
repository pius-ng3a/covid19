
<!-- Start Slider -->
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
      <a  target="__blank" href="{{URL::to('ghsbafut/campus/tour')}}" class="mu-read-more-btn">{{trans('english.tour_campus')}}</a>
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

 <!-- End of single slider item-->

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
<section id="mu-about-us" style="margin-top: -4%;background-color: rgba(55, 85, 93, 0.29)">
{!!Html::style('css/munde.css')!!}
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-about-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>{{trans('english.mother_school')}}</h2>
                </div>
                <!-- End Title -->


                        <img style="height: 40%; width: 50%;padding: 2%;" src="{{URL::asset('image/cor.jpg')}}" align="left" clear="left">
                    <p>{{trans('english.mother_bd')}}</p>
                    <ul>
                    </ul>
                    <p> </p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <h3 class="event_section"><marquee>{{trans('english.latest_news').'&' . trans('english.events')  }}</marquee></h3>
                <?php $events = \App\Message::getUnreadMessages();?>
                @if(count($events)>0)
                  @foreach( $events as $event)

                   <div class="news_element" style=" border:none">
                      <div style="background-color: ghostwhite; margin: 2%;padding: 10px; border:none">
                          <h3 class="event_header" style="margin-bottom: 40px;"> {{$event->event_name}}</h3>
                          <p><span style="color: orchid;text-transform: capitalize;"><i>{{trans('english.when').": "}}</i></span>  <?php $date = DateTime::createFromFormat("Y-m-d",  $event->date);
                          $date2 = strtotime($event->date);
                                    // or your date as well
                                     $now = time();
                                    $datediff = $date2 - $now ;
                                    $days = 0;
                                    $days_gone = -1;
                                    $today = \Carbon\Carbon::now();
                                   if($date > $today){

                                      $days = floor($datediff / (60 * 60 * 24));
                                      $days_gone = $days_gone * $days;
                                   }else{
                                      $days = floor($datediff / (60 * 60 * 24));
                                      $days_gone = $days_gone * $days;
                                   }
                          echo $date->format("D"); echo "  "; echo $date->format("d"); echo " , " ; echo $date->format('M-Y');$event->date ?>
                           @if($days > 0 )
                                <span style="margin-left: 15%; float:right; color: #b03e00"><i class="fa fa-clock-o"></i>{{$days ." ".trans('english.days_to_go')}} </span>
                           @else
                               <span style="margin-left: 15%; float:right ;color: #b03e00"><i class="fa fa-clock-o"></i>{{$days_gone ." ".trans('english.days_ago')}} </span>
                            @endif
                          </p>
                          <p style="color: darkcyan;tranformation: capitalize; "><span style="color: goldenrod;text-transform: capitalize;"><i>{{trans('english.venue')."  :  "}}</i></span>{{ $event->venue}}</p>
                          <p class="plimit">{{ $event->description}} </p>
                          <button type="button" class="modal_listener" onclick="populateModal(this,{{$event->event_id}})">  {{trans('english.read_more').'...'}}  </button>
                      </div>
                    </div>
                  @endforeach
                @else
                  <div class="news_element">
                      <img height="100%" width="100%" src="{{URL::asset('image/no_event.jpg')}}">
                  </div>
                @endif
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
                     $("#modal_content").html('<div class="mu-contact-content"> <div class="row"> <div class="col-md-6"><div class="mu-contact-left">'+
                       '<form method="post" action="'+$('#baseUrl').val()+'/new/message"'+'class="contactform">'+
                       '<input type="hidden" value="'+ fbAppIdContent +'" name="_token"><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>'+
                        '<input class="form form-control" type="text" required="required" size="20" value="" name="author"></p><p class="comment-form-email">'+
                      '<label for="email">Email <span class="required">*</span></label> <input type="email" size="20" class="form form-control" required="required" aria-required="true" value="" name="email">'+
                     '</p><p class="comment-form-url"><label for="subject">Subject</label> <input type="text" size="20" margin-right="-50px" name="subject" class="form form-control"> </p> <p class="comment-form-comment">'+
                    '<label for="comment">Message</label><textarea style="height:80px;width: 100%;" required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>  </p><p class="form-submit">'+
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
 {{--<section id="mu-abtus-counter">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-abtus-counter-area">
          <div class="row">
            <!-- Start counter item -->
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-book"></span>
                <h4 class="counter">568</h4>
                <p>Subjects this id  amdor serious</p>
                <p>Subjects this id  amdor serious</p>
                <p>Subjects this id  amdor serious</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-users"></span>
                <h4 class="counter">3500</h4>
                <p>Students</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-abtus-counter-single">
                <span class="fa fa-flask"></span>
                <h4 class="counter">65</h4>
                <p>Modern Lab</p>
              </div>
            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-abtus-counter-single no-border">
                <span class="fa fa-user-secret"></span>
                <h4 class="counter">250</h4>
                <p>Teachers</p>
              </div>
            </div>
            <!-- End counter item -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>--}}
<!-- End about us counter -->

<!-- Start features section -->
<section   style="background-color: rgba(70, 28, 210, 0.29) " >
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

</section>
<!-- End features section -->
<!-- Start staff here-->
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
              <div class="col-lg-12 col-md-12  col-sm-12">
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

            </div>
          </div>
          <!-- End our teacher content -->
        </div>
      </div>
    </div>
  </div>
</section>

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

</div>
