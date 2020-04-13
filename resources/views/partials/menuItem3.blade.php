<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" style="background-color: #67b168;">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- TEXT BASED LOGO -->
                @if(Auth::check())
                    <a class="navbar-brand" href="{{URL::to('admin/dashboard')}}"><i class="fa fa-university"></i><span>{{trans('english.dashboard')}}</span></a>
                @else
                    <a class="navbar-brand" href="{{URL::to('/ghs/bafut/welcome')}}"><i class="fa fa-university"></i><span>{{trans('english.ghs')}}</span></a>
                    @endif
                            <!-- IMG BASED LOGO  -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li><a href="{{URL::to('/ghs/bafut/welcome')}}">{{trans('english.home')}}</a></li>
                    <li><a  href="{{URL::to("/ghs/bafut/welcome#about_us")}}">{{trans('english.about_ghs_bafut')}}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('english.program')}} <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{URL::to('/ghs/bafut/welcome#mu-features')}}">{{trans('english.science')}}</a></li>
                            <li><a href="{{URL::to('/ghs/bafut/welcome#mu-features')}}">{{trans('english.arts')}}</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="{{URL::to('/ghsbafut/campus/tour')}}">{{ trans('english.campus')}}</a></li>
                    <li><a href="{{URL::to('/ghs/bafut/welcome#mu-our-teacher')}}">{{ trans('english.staff')}}</a></li>
                    <li><a target="__blank" href="{{URL::to('/ghsbafut/alumni/association')}}"> {{ trans('english.ex-students')}}</a></li>
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
