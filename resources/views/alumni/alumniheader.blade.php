<!DOCTYPE html lang="en">

<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="ngwa pius">
    <meta name="viewport" content="width=device-width, initial-scale=1">{{--make page touch zooming --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="keywords" content="GHS Bafut Ex-students,LYBEXSA ,LYBEXSA Association,GHS Bafut alumni,GHS Bafut Ex-students,Bafut" />
    <meta property="token" name="csrf-token" content="{{csrf_token()}}" />

    <title>{{trans('english.lybexsa')}}</title>

    {!!Html::style('font-awesome-4.5.0/css/font-awesome.min.css')!!}

    {{-- CSS  IMPORTED --}}
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{URL::asset('image/varsity/img/favicon.ico')}}" type="image/x-icon">

    <!-- Font awesome -->

    {!! Html::style('css/varsity/font-awesome.css') !!}
    <!-- Bootstrap -->
    {!! Html::style('css/varsity/bootstrap.css') !!}
    <!-- Slick slider -->
    {!! Html::style('css/varsity/slick.css') !!}
    <!-- Fancybox slider -->
    {!! Html::style('css/varsity/jquery.fancybox.css') !!}
    <!-- Theme color -->
    {!! Html::style('css/varsity/theme-color/default-theme.css') !!}

    <!-- Main style sheet -->
    {!! Html::style('css/varsity/style.css') !!}


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

   {{-- END OF CSS --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

   {{-- <script type="text/javascript" src="layout/scripts/jquery.ui.min.js"></script>--}}

</head>
<input type="hidden" id="baseUrl" value="{!! URL::to('/') !!}"/>



<body>

<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
</a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header  -->
<header id="mu-header"  style="background-color: #269abc">
    <div class="container" style="background-color: #269abc">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mu-header-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-left">
                                <div class="mu-top-email">
                                    <i class="fa fa-envelope"></i>
                                    <span>{{trans('english.associationmail')}}</span>
                                </div>
                                <div class="mu-top-phone">
                                    <i class="fa fa-phone"></i>
                                    <span>{{trans('english.alumnitel')}} </span>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="mu-header-top-right">
                                <nav>
                                    <ul class="mu-top-social-nav">
                                        <li><a target="__blank" href="https://www.facebook.com/groups/1609983392606587/"><span class="fa fa-facebook"></span></a></li>
                                       {{-- <li><a target="__blank" href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a target="__blank" href="#"><span class="fa fa-google-plus"></span></a></li>
                                        <li><a target="__blank" href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a target="__blank" href="#"><span class="fa fa-youtube"></span></a></li>--}}
                                        <li class="dropdown" style="background-color: inherit; hover: blue;">

                                            @if(Session::get('locale') == 'fr')
                                                <a style="text-decoration: none;color: blue; background-color: inherit;" href="{!!URL::to('language?lang=en')!!}" >
                                                    <img src="{{URL::asset('image/en.png')}}" style="width: 20px;height: 10px;border-radius: 10%" />
                                                    English
                                                </a>
                                            @else
                                                <a style="text-decoration: none;color: blue;background-color: inherit;" href="{!!URL::to('language?lang=fr')!!}" >
                                                    <img src="{{URL::asset('image/fr.jpg')}}" style="width: 20px;height: 10px;border-radius: 10%" />
                                                    Fran&ccedilais
                                                </a>
                                            @endif
                                        </li>
                                        @if( Auth::check())
                                            <li class="dropdown" style="background-color: inherit;">
                                                <a style="background-color: inherit;" href="#" class="dropdown-toggle" data-toggle="dropdown" style=" ">
                                                    <i class="fa fa-user"></i> {{Auth::user()->first_name." " .Auth::user()->last_name}}<b class="caret"></b> </a>
                                                <ul class="dropdown-menu">
                                                    <li style="background-color: white;"><a style="text-decoration: none;color: blue; background-color: inherit;" href="{{action('LoginController@updateUserProfile')}}"><i class="fa fa-edit"></i> {{trans('english.update_profile')}}</a></li>
                                                    <li style="background-color: white;"> <a style="text-decoration: none;color: blue; background-color: inherit;" href="{{action('LoginController@changePassword')}}"><i class="fa fa-key"></i> {{trans('english.change_pwd_english')}} </a></li>
                                                    <li class="divider"></li>
                                                    <li><a style="color:black; border-radius: 20px;" href="{{URL::to('/user/auth/logout')}}"><i class="fa fa-power-off"></i> {{trans('english.logout')}}</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li><a style="background-color: inherit;transformation: capitalize;" href="{{URL::to('/auth/user/login')}}"><i class="fa fa-lock"></i> {{trans('english.login')}}</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End header  -->
<!-- Start menu -->

