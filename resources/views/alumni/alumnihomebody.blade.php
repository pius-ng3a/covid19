
<!-- Start Slider -->
<section id="mu-slider">
  <!-- Start single slider item -->
  <div class="mu-slider-single" style="height: 75%;">
    <div class="mu-slider-img" >
      <figure>
        <img src="{{URL::asset('image/alumni/alumnibackground.jpg')}}" alt="alumni background">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{trans('english.lybexwelcome')}}</h4>
      <span></span>
      <h2>{{trans('english.ghs_alumni_ass')}}</h2>
      <p style="opacity: .9; margin-left: -50%; border-radius: 50%;">     <span >   <img style="height: 12000%;border-radius: 43%; width: 500%; margin-left: -15%;" src="{{URL::asset('image/alumni/alumni_logo2.jpg')}}" alt="alumni background">
             </span></p>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <p>{{trans('english.unity')}}</p>
{{--
      <a href="#mu-features" class="mu-read-more-btn">{{trans('english.read_more')}}</a>
--}}
    </div>
  </div>
  <!-- Start single slider item -->
</section>
<!-- End Slider -->
<!-- Start about us -->
<section id="mu-about-us" style="background-color: gainsboro">
{!!Html::style('css/munde.css')!!}
  <div class="container">
      <div class="row">
          <div class="col-md-12 col-xs-12 col-sm-12">
              @if(Session::has('benefactor_success'))
                <div class="alert alert-success">
                    {{ Session::get('benefactor_success') }}
                </div>
              @endif
          </div>
      </div>
    <div class="row" >
      <div class="col-md-12">
        <div class="mu-about-us-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="mu-about-us-left">
                <!-- Start Title -->
                <div class="mu-title">
                  <h2>{{trans('english.lybex')}}</h2>
                </div>
                <!-- End Title -->
                        <img style="height: 30%; border-radius:45%; width: 30%;padding: 2%;" src="{{URL::asset('image/alumni/exco/2016_president.jpg')}}" align="left" clear="left" alt="president img">
                    <p class="break_words">{{trans('english.lybex_message')}}</p>
                    <ul>
                    </ul>
                    <p> </p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
            <div class="mu-title">
                       <h2 style="text-align: center"> {{trans('english.poineer_exco')}}
                      </h2>
            </div>
                <!-- EXCO section starts -->
                <section id="mu-testimonial" style="background-color: gainsboro; height: 60%; width:95%; padding-bottom: -0%;">
                   <div class="container" style="height:200%;margin-top:-15%;margin-left: -28%; height: 90%; width: 155%;" >
                    <div class="row">
                      <div class="col-md-12" style=" margin-left:20%; width:60%;">

                        <div class="mu-testimonial-area"  >
                          <div id="mu-testimonial-slide" class="mu-testimonial-content" style="width: 300%; margin-left: -100%;">
                            <!-- start testimonial single item -->
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.president')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/2016_president.jpg')}}" alt="president">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.president_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->
                            <!-- start testimonial single item --> <!-- start testimonial single item -->
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.sg')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/SG_Che_Beltous_Che.jpg')}}" alt="sg">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.sg_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->
                            <!-- start testimonial single item -->
                            <!-- start testimonial single item -->
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.fin_sec')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Financial_Sec_Ngwa Shu Princewill.jpg')}}" alt="fin_sec">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.fin_sec_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->
                             <!-- start testimonial single item -->
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.tresurer')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Treasurer_Mforkaa_Magdalene_Lum.jpg')}}" alt="tresurer">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.tresurer_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->

                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.v_president')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/VP_Gloria_Binwi_Ngwane.jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.v_president_nm')}}</h4>
                              </div>
                            </div>
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.protocol')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Protocol_Officer_Tumanteh_Agnes_Fusi.jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.protocol_nm')}}</h4>
                              </div>
                            </div>
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.pub_sec')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Pub_Sec_Neba_Puisance_Oswold..jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.pub_sec_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.socials_1')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Socials_Boy_Neba_Louis_Ngwa.jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.socials_1_nm')}}</h4>
                              </div>
                            </div>
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.socials_2')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Socials_Girl_Fube_Abongtaah_Sirri.jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.socials_2_nm')}}</h4>
                              </div>
                            </div>
                            <div class="mu-testimonial-item" style="padding-top: 0%;">
                              <div class="mu-testimonial-quote">
                                <blockquote>
                                  <p>{{trans('english.technical_ad')}}</p>
                                </blockquote>
                              </div>
                              <div class="mu-testimonial-img">
                                <img height="120px" width="120px" src="{{URL::asset('image/alumni/exco/Adviser_Abinwi_Numfor_Muwanki.jpg')}}" alt="technical_ad">
                              </div>
                              <div class="mu-testimonial-info">
                                <h4>{{trans('english.technical_ad_nm')}}</h4>
                              </div>
                            </div>
                            <!-- end testimonial single item -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- EXCO section ends -->

                <!-- Modal div for popup starts -->

               <div class="alu_modal_pop_up" style="background-color: black">

                  <div class="alu_modal-content">
                    <p><span class="close" style="color: firebrick;margin-right:20px;margin-top: 5px;" onclick="closeModal(this)">x</span></p>
                    @if(Session::has('msg_success'))
                     <div class="alert alert-success">
                        {{Session::get('msg_success')}}
                      </div>
                    @endif
                    <div id="alu_modal_content" style="color: black" >

                    </div>
                  </div>
               </div>



                <!-- Modal div for popup ends -->
                <!-- script for Modal manipulation  starts-->

                <script>
                    function closeModal(obj){
                      $('.alu_modal_pop_up').hide();
                    }
                    function showScholarshipContributionDetails(obj){

                      $('#alu_modal_content').html('<div class="row" style="background-color: inherit">' +
                       '<div style="border: solid 1px black;" class="col-md-12 col-xs-12 col-lg-12"> ' +
                        '<h2 style="text-align: center;">'
                         + $('#alu_scholarship_contribute').html()
                         + '</h2><p>'+$('#alu_scholarship_info').html()
                         +'</p><p>'
                         +'</p> <p>'+$('#alu_scholarship_contact').html()+'</p><p>'+

                       +'</p></div><div style="margin-left: 5% ;text-align: center;">' +
                        '<div><h3 style="color: dodgerblue; text-align: center;"> </div>'
                              + $('#current_donors').html());
                      $('#alu_modal_content').show();
                      $('.alu_modal_pop_up').show();
                    }
                   function populateModal(obj,event_id){
                      //alert($('#baseUrl').val()+"/event/get/full/event/description/"+event_id)
                      $.ajax({
                          type: "get",
                          url: $('#baseUrl').val()+"/event/get/full/event/description/"+event_id,
                          success: function (html) {
                              $("#alu_modal_content").html(html)
                              $(".alu_modal_pop_up").show()
                          },
                          error: function (error) {
                              alert('Error from server')
                              console.log(error)
                          }
                      });
                   }
                   //reading image function
                   function showImage(obj){
                      $('#profilePicFile').change(function(){
                          readURL1(this);
                      }
                     );
                   }

                  function readURL1(input){
                      if(input.files && input.files[0]){
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('#pic').attr('src', e.target.result);
                          }
                          reader.readAsDataURL(input.files[0]);
                      }

                  }
                  function supportLybexsa(obj){
                      if(input.files && input.files[0]){
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('#pic').attr('src', e.target.result);
                          }
                          reader.readAsDataURL(input.files[0]);
                      }

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

                     $("#alu_modal_content").html('<div class="mu-contact-content"> <div class="row"> <div class="col-md-6"><div class="mu-contact-left">'+
                       '<form method="post" action="'+$('#baseUrl').val()+'/new/message"'+'class="contactform">'+
                       '<input type="hidden" value="'+ fbAppIdContent +'" name="_token"><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>'+
                        '<input class="form form-control" type="text" required="required" size="20" value="" name="author"></p><p class="comment-form-email">'+
                      '<label for="email">Email <span class="required">*</span></label> <input type="email" size="20" class="form form-control" required="required" aria-required="true" value="" name="email">'+
                     '</p><p class="comment-form-url"><label for="subject">Subject</label> <input type="text" size="20" margin-right="-50px" name="subject" class="form form-control"> </p> <p class="comment-form-comment">'+
                    '<label for="comment">Message</label><textarea style="height:80px;width: 100%;" required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>  </p><p class="form-submit">'+
                   '<input style="margin-left: 70%;background-color: green" type="submit" value="Send Message" class="mu-post-btn" name="submit"></p></form></div></div><div class="col-md-6"><div class="mu-contact-right"><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d6249.345033302234!2d-80.02791918555701!3d40.45935344513505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8834f411a7b748bd%3A0xaec8197db3de9a9e!2sCalifornia-Kirkbride%2C+Pittsburgh%2C+PA%2C+USA!3m2!1d40.4600435!2d-80.0213538!5e0!3m2!1sen!2sbd!4v1464270878470" width="100%" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>'+
                    '</div></div></div></div>')

                     $(".alu_modal_pop_up").show()

                   }

                </script>

               <!-- script for Modal manipulation  ends-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about us -->

<!-- Start about us counter -->
<section style="background-color:  #245269" >
  <div class="container" >
    <div class="row" >
      <div class="col-md-12" style="margin-top: 4%;"  id="alu_mission">
        <div class="mu-abtus-counter-area">
          <h2 style="text-align: center;color: ghostwhite;margin-bottom: 3%;"><span>
            <img class="img-responsive" style="height: 20%;width: 100%;" src="{{URL::asset('image/alumni/alu_mission.jpg')}}" ></span></h2>
            <p style="color: white"> {{trans('english.alu_mission')}}</p>
          <div class="row">
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3" >

              <div class="mu-abtus-counter-single" style=" background-color: darkgray; padding: 7%;padding-bottom:30% ">
                <span>
                  <img class="img-responsive" style="height: 10%;border-radius: 5%;margin-bottom: 5%; width: 90%;" src="{{URL::asset('image/alumni/unity.jpg')}}">
                </span>
                <p style="height: 395px;">{{trans('english.alu_unity')}}</p>

              </div>

            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3" >

              <div class="mu-abtus-counter-single" style=" background-color: darkgray; padding: 7%;padding-bottom:74% ">
                <span>
                  <img class="img-responsive" style="height: 10%;border-radius: 5%;margin-bottom: 5%; width: 90%;" src="{{URL::asset('image/alumni/counseling.jpg')}}">
                </span>
                <p style="height: 278px;">{{trans('english.alu_counseling')}}</p>

              </div>

            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3" >

              <div class="mu-abtus-counter-single" style=" background-color: darkgray; padding: 7%;padding-bottom:57% ">
                <span>
                  <img class="img-responsive" style="height: 10%;border-radius: 5%;margin-bottom: 5%; width: 90%;" src="{{URL::asset('image/alumni/alu_development.jpg')}}">
                </span>
                <p style="height: 327px;">{{trans('english.alu_development')}}</p>

              </div>

            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
            <div class="col-lg-3 col-md-3 col-sm-3" >

              <div class="mu-abtus-counter-single" style=" background-color: darkgray; padding: 7%;">
                <span>
                  <img class="img-responsive" style="height: 10%;border-radius: 5%;margin-bottom: 5%; width: 90%;" src="{{URL::asset('image/alumni/scholarships.jpg')}}">
                </span>
                <p >{{trans('english.alu_scholarships')}}

                </p>
                <p style="text-align: left;">
                <span class="modal_listener" >
                      <button type="button" class="btn btn-success" style="background-color: green;margin-top: -10px;width: 150px;margin-left:-10px;padding-bottom:5px;" onclick="showScholarshipContributionDetails(this)">{{trans('english.alu_donate')}} </button>
                  </span>
                </p>
              </div>

            </div>
            <!-- End counter item -->
            <!-- Start counter item -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about us counter -->
<div class="row" style="background-color: white; height: 80px;">



</div>
<!-- Start exco and   section -->
<section id="mu-features"  style="background-color:rgba(3, 53, 156, 0.12);margin-top: -80px;">
  <!-- Start exco and profile content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-our-teacher-area">
          <!-- begain title -->
          <div class="mu-title">
            <h2 style="text-align:left; text-align: center; margin-top: -80px; margin-bottom: 40px;">{{trans('english.alu_poineer_exco')}}</h2>
             <p   class="break_words"> </p>
          </div>
          <!-- end title -->
          <!-- begain our exco content -->
          <div class="mu-our-teacher-content">
            <div class="row">
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/2016_president.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a target="_blank" href="https://www.facebook.com/atangodemanagiama?fref=ts"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-linkedin"></span></a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.president')}} {{ " : ".trans('english.president_nm')}}</h4>
                    <p class="break_words"> {{trans('english.president_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/VP_Gloria_Binwi_Ngwane.jpg')}}" alt="Vice president">
                    <div class="mu-our-teacher-social">
                      <a   href="#"> </a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.v_president')}} {{ " : ".trans('english.v_president_nm')}}</h4>
                    <p class="break_words"> {{trans('english.v_president_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/SG_Che_Beltous_Che.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a target="_blank" href="https://www.facebook.com/search/top/?q=che%20beltous"><span class="fa fa-facebook"></span></a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.sg')}} {{ " : ".trans('english.sg_nm')}}</h4>
                    <p class="break_words"> {{trans('english.sg_profile')}} </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Financial_Sec_Ngwa Shu Princewill.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a    ></a>
                      <a href="#"> </a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.fin_sec')}} {{ " : ".trans('english.fin_sec_nm')}}</h4>
                    <p class="break_words"> {{trans('english.fin_sec_profile')}} </p>
                                 <br/>

                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Treasurer_Mforkaa_Magdalene_Lum.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a  > </a>
                      <a href="#"> </a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.tresurer')}} {{ " : ".trans('english.tresurer_nm')}}</h4>
                    <p class="break_words"> {{trans('english.tresurer_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Socials_Boy_Neba_Louis_Ngwa.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a    >  </a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.socials_1')}} {{ " : ".trans('english.socials_1_nm')}}</h4>
                    <p class="break_words"> {{trans('english.socials_1_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Socials_Girl_Fube_Abongtaah_Sirri.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a > </a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.socials_2')}} {{ " : ".trans('english.socials_2_nm')}}</h4>
                    <p class="break_words"> {{trans('english.socials_2_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/ngong_peter.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">
                      <a target="_blank" href="https://www.facebook.com/ngong.peter.9"><span class="fa fa-facebook"></span></a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.socio_1')}} {{ " : ".trans('english.socio_1_nm')}}</h4>
                    <p class="break_words"> {{trans('english.socio_1_profile')}} </p>
                    <br/>
                    <br/>
                    <br/>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Sociocultural_officer_Atoh_Denis_Fuh.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">

                     </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.socio_2')}} {{ " : ".trans('english.socio_2_nm')}}</h4>
                    <p class="break_words"> {{trans('english.socio_2_profile')}} </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Protocol_Officer_Tumanteh_Agnes_Fusi.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">

                     </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.protocol')}} {{ " : ".trans('english.protocol_nm')}}</h4>
                    <p class="break_words"> {{trans('english.protocol_profile')}} </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/Adviser_Abinwi_Numfor_Muwanki.jpg')}}" alt="president">
                    <div class="mu-our-teacher-social">

                     </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.advicer_1')}} {{ " : ".trans('english.advicer_1_nm')}}</h4>
                    <p class="break_words"> {{trans('english.advicer_1_profile')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; height: 150px;width: 150px;" src="{{URL::asset('image/alumni/exco/So.jpg')}}" alt="Manka'a Miranda">
                    <div class="mu-our-teacher-social">

                     </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.advicer_2')}} {{ " : ".trans('english.advicer_2_nm')}}</h4>
                    <p class="break_words"> {{trans('english.advicer_2_profile')}} </p>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End programs section -->

<!-- atart of alumni members-->
<section id="mu-our-teacher" style="margin-top: -70px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-our-teacher-area">
          <!-- begain title -->
          <div class="mu-title">
            <h2>{{trans('english.alu_members')}}</h2>
              <p>{{trans('english.alu_members_intro')}}</p>
           </div>
          <!-- end title -->
          <!-- begain our teacher content -->
          <div class="mu-our-teacher-content">
            <div class="row">
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/ngwa_pius.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">
                      <a target="_blank" href="https://www.facebook.com/ngwa.pius"><span class="fa fa-facebook"></span></a>
                      <a  target="_blank" href="https://twitter.com/puzlelo"><span class="fa fa-twitter"></span></a>
                      <a  target="_blank" href="https://www.linkedin.com/in/pius-ngwa-64b35182?trk=hp-identity-name"><span class="fa fa-linkedin"></span></a>
                      <a  target="_blank" href="https://plus.google.com/u/0/115431515274397491656/about"><span class="fa fa-google-plus"></span></a>
                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_pius'). " : ".trans('english.mem_pius_occup')}}</h4>
                    <p class="break_words"> {{trans('english.mem_pius_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/WanchiaRene.jpg')}}" alt=" ">

                  </figure>
                  <div class="mu-ourteacher-single-content">

                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/IrineNforsoh.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/Tamabang.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/Tamabang.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/PreciousSirri.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/FabricePiusandRoger.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/VeldaNebasina.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/JoanEuniceandfriend.jpg')}}" alt="pius">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/‪GeraldineSirri.jpg')}}" alt="GeraldineSirri.jpg">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3  col-sm-4">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img style="border-radius: 50%; width: 150px;height: 150px; margin-left: 40px;" src="{{URL::asset('image/alumni/members/ShuEmmanuel.jpg')}}" alt="ShuEmmanuel.jpg">
                    <div class="mu-our-teacher-social">

                    </div>
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h4> {{trans('english.mem_nm'). " : ".trans('english.mem_occu')}}</h4>
                    <p class="break_words"> {{trans('english.mem_description')}} </p>
                  </div>
                </div>
              </div>



            </div>
          </div>
          <!-- End our teacher content -->
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mu-our-teacher-area">
            <div class="mu-title">
                <h2>{{trans('english.activities')}}</h2>
            </div>
            <div class="mu-our-teacher-content">
                <div class="row">
                    <div class="col-lg-4 col-md-4  col-sm-6">
                        <div class="mu-our-teacher-single">
                            <figure class="mu-our-teacher-img">
                                <img style=" width: 360px;height: 350px;" src="{{URL::asset('image/alumni/25th_planning_all.jpg')}}" alt="ShuEmmanuel.jpg">

                            </figure>
                            <div class="mu-ourteacher-single-content">
                                <h4> {{trans('english.25th_an_plan3')}}</h4>
                                <p class="break_words"> {{trans('english.mem_description')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4  col-sm-6">
                        <div class="mu-our-teacher-single">
                            <figure class="mu-our-teacher-img">
                                <img style="width: 360px;height: 350px; " src="{{URL::asset('image/alumni/25th_planning_all1.jpg')}}" alt="ShuEmmanuel.jpg">

                            </figure>
                            <div class="mu-ourteacher-single-content">
                                <h4> {{trans('english.25th_an_plan2')}}</h4>
                                <p class="break_words"> {{trans('english.mem_description')}} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4  col-sm-6">
                        <div class="mu-our-teacher-single">
                            <figure class="mu-our-teacher-img">
                                <img style="width: 360px;height: 350px;" src="{{URL::asset('image/alumni/25th_planning_1.jpg')}}" alt="plannin meeting">
                            </figure>
                            <div class="mu-ourteacher-single-content">
                                <h4> {{trans('english.25th_an_plan1')}}</h4>
                                <p class="break_words"> {{trans('english.mem_description')}} </p>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>

<!-- End of alumni members here -->



<!-- div containing items for the contact pop_up -->
     <div class="collapse row" style="background-color: inherit;height: .002%;text-align: center;visibility: hidden" >
                  <div style="border: solid 1px black;visibility: hidden;height: .002%;" class="col-md-12 col-xs-12 col-lg-12">
                      <h2 id="alu_scholarship_contribute" style="text-align: center;visibility: hidden"> {{trans("english.alu_scholarship_contribute")}}</h2>
                      <p id="alu_scholarship_info" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_info")}}</p>
                      <p id="alu_scholarship_contact" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_contact")}} </p>
                      <div class="row" id="current_donors">
                          <h2 style="text-align: center;">{{trans('english.current_donors')}} <hr/></h2>
                          <div class="col-md-12">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4" style="margin-left: 30px;">
                                  {{trans('english.first_donor')}}
                              </div>
                              <div class="col-md-4">
                              </div>
                          </div>
                      </div>
                  </div>

                  </div>
            </div>

<!-- Start latest events section -->
<section id="mu-latest-courses" style="margin-top: -70px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12"  >
        <div class="mu-latest-courses-area">
          <!-- Start Title -->
          <div class="mu-title">
            <h2>{{trans('english.alu_latest_events')}}</h2>
            <p> {{trans('english.alu_latest_events_intro')}}</p>
          </div>
          <!-- End Title -->
          <?php $events = \App\Event::getSomeEvents(9);

              $mod1 = count($events) % 3;
              $mod =  3 - $mod1 ;
          ?>
          <!-- Start latest course content -->
          <div id="mu-latest-course-slide" class="mu-latest-courses-content">


            @if(count($events)>0)
                   @foreach($events as $event)
                     <div class="col-lg-4 col-md-4 col-xs-12" style="height: 500px;">
                        <div class="mu-latest-course-single">
                                <?php $date = DateTime::createFromFormat("Y-m-d",  $event->date);

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

                                ?>

                            <figure class="mu-latest-course-img">
                              <a  ><img src="{{URL::asset('image/alumni/alu_events_medium.jpg')}}" alt="img"></a>
                              <figcaption class="mu-latest-course-imgcaption">
                                    <a  >{{$event->event_name}}</a>
                                    @if($days > 0 )
                                      <p style="margin-left: 15%; float:left;margin-top:20px;color: #b03e00"> <span><i class="fa fa-clock-o"></i>{{$days ." ".trans('english.days_to_go')}} </span></p>
                                      <button class="modal_listener" style="margin-top:20px;" onclick="populateModal(this,{{$event->event_id}})" type="button"> Read More... </button>

                                  @else
                                      <p style="margin-left: 15%; float:left;margin-top:20px;color: #b03e00"><span><i class="fa fa-clock-o"></i>{{$days_gone ." ".trans('english.days_ago')}} </span>   </p>
                                      <button style="margin-top:20px;" class="modal_listener" onclick="populateModal(this,{{$event->event_id}})" type="button"> Read More... </button>

                                    @endif
                              </figcaption>

                            </figure>
                            <div class="mu-latest-course-single-content" >
                              <h4><a >{{$event->date .", @ " .$event->venue}}</a></h4>
                              <p> {{$event->description }} </p>
                              <div class="mu-latest-course-single-contbottom">
                            </div>
                        </div>
                        </div>
                     </div>
                   @endforeach
                   @for($i=0;$i<$mod;$i++)
                     <div class="col-lg-4 col-md-4 col-xs-12" style="height: 500px;">
                          <div class="mu-latest-course-single">
                             <figure class="mu-latest-course-img">
                              <a href="#"><img style="height: 350px;" src="{{URL::asset('image/alumni/upcoming-event.png')}}" alt="event img"></a>
                              <figcaption class="mu-latest-course-imgcaption">
                                  <a href="#">{{trans('english.alu_visit_later')}}</a>
                              </figcaption>
                            </figure>
                            <div class="mu-latest-course-single-content">
                              <h4><a href="#"></a></h4>
                              <p>{{trans('english.visit_events')}}</p>
                              <div class="mu-latest-course-single-contbottom">
                              </div>
                            </div>
                          </div>
                     </div>
                   @endfor
            @endif



          </div>
          <!-- End latest course content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End latest course section -->

<!-- Start our teacher -->

<!-- End our teacher -->
<!-- Start testimonial  ection with mobility cut here-->




<!-- End testimonial -->
<div class="">

</div>
<!-- Start from blog -->
<section id="mu-from-blog" style="margin-top:-80px;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-from-blog-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>{{trans('english.blog')}}</h2>
            <p>{{trans('english.what_members_saying')}}</p>
              <hr/>
          </div>
          <!-- end title -->
          <!-- start from blog content   -->
          <div class="mu-from-blog-content" style="margin-top: -10px;">
            <div class="row">
                <?php $blogs = \App\Blog::getLatestBlogs(10); ?>
               @if(count($blogs)<2 )
                        <div class="col-md-4 col-sm-4"></div>
                @foreach($blogs as $blog)
                     <div class="col-md-4 col-sm-4">
                    <article class="mu-blog-single-item">
                      <figure class="mu-blog-single-img">
                        <p><img style="height: 150px;width: 150px; border-radius: 50%;margin-left:60px;" src="{{URL::asset('image/alumni/members/'.$blog->picture)}}" alt=" bloger img"></p>
                        <figcaption class="mu-blog-caption">
                          <h3><a>{{$blog->subject}}</a></h3>
                        </figcaption>
                      </figure>
                      <div class="mu-blog-meta">
                        <a href="">{{ trans('english.by') ." ".$blog->first_name." ".$blog->last_name }}</a>
                        <a >{{$blog->created_at}}</a>
                        <span><i class="fa fa-comments-o"></i>87</span>
                      </div>
                      <div class="mu-blog-description">
                      <p class="break_words">{{$blog->message}}</p>
                      </div>
                    </article>
                  </div>
                @endforeach
                    <div class="col-md-4 col-sm-4"></div> <br/><br/>
                @elseif(count($blogs)==2)
                    @foreach($blogs as $blog)
                        <div class="col-md-6 col-sm-6">
                            <article class="mu-blog-single-item">
                                <figure class="mu-blog-single-img">
                                    <p><img style="height: 150px;width: 150px; border-radius: 50%;margin-left:60px;" src="{{URL::asset('image/alumni/members/'.$blog->picture)}}" alt=" bloger img"></p>
                                    <figcaption class="mu-blog-caption">
                                        <h3><a>{{$blog->subject}}</a></h3>
                                    </figcaption>
                                </figure>
                                <div class="mu-blog-meta">
                                    <a href="">{{ trans('english.by') ." ".$blog->first_name." ".$blog->last_name }}</a>
                                    <a >{{$blog->created_at}}</a>
                                    <span><i class="fa fa-comments-o"></i>87</span>
                                </div>
                                <div class="mu-blog-description">
                                    <p class="break_words">{{$blog->message}}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                        <br/><br/>
                @else
                    @foreach($blogs as $blog)
                        <div class="col-md-4 col-sm-4">
                            <article class="mu-blog-single-item">
                                <figure class="mu-blog-single-img">
                                    <p><img style="height: 150px;width: 150px; border-radius: 50%;margin-left:60px;" src="{{URL::asset('image/alumni/members/'.$blog->picture)}}" alt=" bloger img"></p>
                                    <figcaption class="mu-blog-caption">
                                        <h3><a>{{$blog->subject}}</a></h3>
                                    </figcaption>
                                </figure>
                                <div class="mu-blog-meta">
                                    <a href="">{{ trans('english.by') ." ".$blog->first_name." ".$blog->last_name }}</a>
                                    <a >{{$blog->created_at}}</a>
                                    <span><i class="fa fa-comments-o"></i>87</span>
                                </div>
                                <div class="mu-blog-description">
                                    <p class="break_words">{{$blog->message}}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                    <br/><br/>
               @endif
            </div>
            <div class="row" style="margin-left: 15%;margin-right:15%;margin-top:100px;">
                <div class="row">
                      {!! Form::open(['route'=>'save_blog']) !!}
                      <h2 style="text-align: center;">{{trans('english.write_blog_head')}}</h2>
                      <hr/>
                      <br>
                      <div class="col-xs-6 col-md-4" style="margin-right:-15%;">
                        <label for="member_id">{{trans('english.alumni_id')}}</label>
                      </div>
                       <div class="col-xs-9 col-md-8">
                        {!! Form::text('user_id',null, ['class'=>'form form-control','placeholder'=>trans('english.alumnus_code'),'required']) !!}
                      </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-6 col-md-4" style="margin-right:-15%;">
                        <label for="subject">{{trans('english.blog_subject')}}</label>
                      </div>
                       <div class="col-xs-9 col-md-8">
                        {!! Form::text('subject',null, ['class'=>'form form-control','placeholder'=>trans('english.blog_subject')]) !!}
                      </div>
                </div>
                 <br/>
                <div class="row">
                    <div class="col-xs-6 col-md-4" style="margin-right:-15%;">
                        <label for="subject">{{trans('english.msg')}}</label>
                      </div>
                       <div class="col-xs-9 col-md-8">
                        {!! Form::textarea('comment',null, ['class'=>'form form-control','placeholder'=>trans('english.msg')]) !!}
                      </div>
                </div>
                 <br/>
                <p style="text-align: center">{!! Form::submit('Submit',['class'=>'btn btn-primary','style'=>'border-radius:20%;']) !!}</p>
              </div>
            </div>
          <!-- end from blog content   -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End from blog -->
