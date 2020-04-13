<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" style="background-color: rgba(7, 77, 108, 0.16)">

        <div class="container  " >
               <div class="navbar-header " >
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->

                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- TEXT BASED LOGO -->
                @if(Auth::check())

                    <a class="navbar-brand" href="{{URL::to('admin/dashboard/manage')}}"><span style="margin-left: -20px;color: blue"> {{trans('english.dashboard')}}
                        </span>
                          </a>
                @else
                       <span   class="avatar" style="position: absolute;border-radius: 20px; text-align: center; margin-left: -20px;margin-top: 7px;margin-right: 4.5%;  height:20%; max-height: 50%;width: 11%;">
                        <img class='img-responsive img-circle ' style="-webkit-border-radius: 48px;-moz-border-radius: 48px;border-radius: 48%;height:400%;width: 9000%;" src="{{URL::asset('image/alumni/alumni_logo2.jpg')}}" alt="moto here" width="250%" ></span>

                       <a target="_blank" class="navbar-brand" href="{{URL::to('/ghs/bafut/welcome')}}"><span style="margin-left: 29%;color: blue">
                        </span>
                       </a>

                @endif
                            <!-- IMG BASED LOGO  -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
             </div>
             <div id="navbar" class="navbar-collapse collapse  ">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li class="active"><a href="{{URL::to('/ghsbafut/alumni/association')}}">{{trans('english.home')}}</a></li>
                    <li>
                        <a href="{{URL::to('/ghsbafut/alumni/association#alu_mission')}}">{{trans('english.mission')}} </a>
                    </li>
                    <li><a href="{{URL::to('/ghsbafut/alumni/association#mu-features')}}">{{ trans('english.alu_profile')}}</a></li>
                    <li><a href="{{URL::to('ghsbafut/alumni/association#mu-latest-courses')}}">{{ trans('english.alu_events')}}</a></li>
                    <li><a href="{{URL::to('ghsbafut/alumni/association#mu-our-teacher')}}">{{ trans('english.alu_gallery')}}</a></li>

                    <li>
                        <a href="{{URL::to('ghsbafut/alumni/association#mu-from-blog')}}">Blog </a>
                    </li>
                    <li style="cursor: hand;cursor: pointer"><span style="margin-top: 40%; color: grey" class="modal_listener" onclick="showContactForm(this)">Contact</span></li>
                    <li><a target="_blank"  href="{{URL::to('/ghs/bafut/welcome')}}">{{trans('english.ghs')}}</a></li>
                    <li><a href="{{URL::to('/lybexsa/view/members/contributions')}}">{{trans('english.alum_view_contributions')}}</a></li>
                    <li class="modal_listener"style="margin-top: 22px;"  onclick="showScholarshipContributionDetails(this)"><button style="background-color: inherit;color:grey;border: none" >{{ trans('english.alu_support')}}</button></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu -->
<!-- Start search box -->
<div id="mu-search">
    <div class="mu-search-area">
        <button class="mu-search-close"><span class="fa fa-close"></span></button>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="mu-search-form">
                        <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End search box -->
