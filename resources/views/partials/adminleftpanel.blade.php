<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top" style="background-color: lightgrey;">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{-- <li><a href="{{URL::to('/')}}" class="active">Home</a></li>--}}
                <div class="btn-group pull-right">

                    {{-- elements can be added here --}}
                </div>
                <div>
                    <h2><a href="{{URL::to('/ghs/bafut/welcome')}}" class="active"><span ><i class="fa fa-home"></i></span>{{trans('english.home')}}</a></h2>
                </div>
            </div>
            <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a target="__blank"   href="https://www.facebook.com/groups/1609983392606587/" ><span class="fa fa-facebook"></span></a></li>
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

            </div>
        </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class=" navbar-side" role="navigation">
        <div class="sidebar-collapse ">
            <ul class="nav" id="main-menu">
                <li>
                    @if(Auth::user())
                        <a href="{{URL::to('admin/dashboard/manage')}}"><i class="fa fa-desktop "></i>{{trans('english.dashboard')}}</a>
                    @endif
                </li>
                <?php $privileges= \App\Privilege::getAuthorisedPrivileges(Auth::user()->role_id, Auth::user()->userId)?>
                {!! $privileges !!}
            </ul>
        </div>
    </nav>
    <!-- /. NAV SIDE  -->
 </div>
