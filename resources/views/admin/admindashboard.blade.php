@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <h2 style="text-align: center">{{trans('english.my_dashboard')}}</h2>
                </div>
                <div class="col-md-4">
                    <?php $unread_messages = \App\Message::getUnreadMessages(); ?>
                    @if(count($unread_messages)>0)
                        <p style="text-align:center;color: blue;margin-top: 30px;">{{trans('english.messages')." : ".count($unread_messages)." ".trans('english.unread')."     "}}<a class="btn btn-success" href="{{URL::to('/get/unread/messages')}}">{{trans('english.read')}}</a></p>
                    @endif
                </div>
                <div class="col-md-2">
                        <p style="text-align:center;color: blue;margin-top: 30px;"><a class="btn btn-warning" href="{{URL::to('/get/some/read/messages')}}">{{trans('english.past_msges')}}</a></p>
                </div>

            </div>
            <!-- /. ROW  -->
            <hr />

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <div class="panel panel-primary text-center no-boder bg-color-blue" style="background-color: rgba(2, 5, 2, 0.04); color: black ">
                            <div class="panel-body">
                                <i class="fa fa-info"></i>
                                <?php $logon = Auth::user(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-xs-9">
                                        <p> <img src="{{URL::asset('image/pius_welcome.jpg')}}" style="margin-top: 5%;height: 200px; width: 200px;border-radius: 50%" /> </p>

                                    </div>
                                    <div class="col-md-6 col-xs-9">
                                        <h2>{{trans('english.welcome_admin')."  " . $logon->FirstName . " " .$logon->LastName }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3  > {{trans('english.dashboard_info')}}</h3>
                                    <h4 style="margin-left: 3px;color: blue"> {{trans('english.track_warn')}}</h4>
                                    <p style="margin-left: 3px; "> {{trans('english.best_interest')}}</p>
                                    <p style=" color: darkviolet"> {{trans('english.good_ride')}}</p>
                                </div>
                                 </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 bg-color-blue" style="padding-right: 3%;border-radius: 20px;">
                 <p> <img src="{{URL::asset('image/alumni/exco/dashboard_police.jpg')}}" style="margin-top: 5%;height: 380px; width: 300px;" /> </p>
                 <h2 class="blink_me" style="text-align: center;color: red;">{{trans('english.warning')}}</h2>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
@stop
