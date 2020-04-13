<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" style="background-color: rgba(7, 77, 108, 0.16)">

        <div class="container  " >
               <div class="navbar-header " >
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <span   class="avatar" style="position: absolute;border-radius: 20px; text-align: center; margin-left: -21.5%;margin-top: 50px;margin-right: 4.5%;  height:20%; max-height: 50%;width: 11%;">
                        <img class='img-responsive img-circle ' style="-webkit-border-radius: 48px;-moz-border-radius: 48px;border-radius: 48%;height:70px;width: 150px;margin-left: -550px;margin-top: -50px;" src="{{URL::asset('image/alumni/alumni_logo2.jpg')}}" alt="moto here" width="250%" ></span>

                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- TEXT BASED LOGO -->
                @if(Auth::check())

                    <a class="navbar-brand" href="{{URL::to('admin/dashboard/manage')}}"><span style="margin-left: 600px;color: blue"> {{trans('english.dashboard')}}
                        </span>
                          </a>
                @else
                       <a class="navbar-brand" href="{{URL::to('/ghs/bafut/welcome')}}"><span style="margin-left: 29%;color: blue">
                        </span>
                       </a>

                @endif
                            <!-- IMG BASED LOGO  -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
             </div>
             <div id="navbar" class="navbar-collapse collapse  ">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li ><a href="{{URL::to('/ghsbafut/alumni/association')}}">{{trans('english.home')}}</a></li>
                      <li><a target="_blank"  href="{{URL::to('/ghs/bafut/welcome')}}">{{trans('english.ghs')}}</a></li>
                    <li class="active"><a href="{{URL::to('/lybexsa/view/members/contributions')}}">{{trans('english.alum_view_contributions')}}</a></li>
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
