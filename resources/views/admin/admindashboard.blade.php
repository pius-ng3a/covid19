@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <h2 style="text-align: center">{{trans('english.my_dashboard')}}</h2>
                    <p>NB:Implemented functionalities are: Add User, Add Center, Add Patient, View Patients</p>
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
                                        <h4>{{trans('english.welcome_admin')."  " . $logon->FirstName . " " .$logon->LastName }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3  > Use The Left Pane for differnt functionalities.</h3>
                                    <h4 style="margin-left: 3px;color: blue"> Together, we shall beat COVID19</h4>
                                    <p style="margin-left: 3px; "> Protect yourself and others.</p>
                                </div>
                                 </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 bg-color-blue" >
                <table style="table-layout:fixed " class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #0088CC">
                     <th>Total Cases </th>
                    <th>Recovered</th>
                    <th>Critical</th>
                    <th>deaths </th>
                    <th>stable</th> </tr>
                  </thead>
                  <tbody> <?php $counter =0;$sum = 66;
                          $patients = \App\Patient::getSomePatients(30);
                          $critical = DB::table('patient_records')->select('*')->where("state","critical")->get();
                          $stable= DB::table('patient_records')->select('*')->where("state","stable")->get();
                          $healed= DB::table('patient_records')->select('*')->where("state","healed")->get();
                          $died= DB::table('patient_records')->select('*')->where("state","died")->get();
                          $all = DB::table('patient_records')->select('*')->get();

                          $cr = count($critical);
                          $st = count($stable);
                          $he = count($healed);
                          $al = count($all);
                          $die = count($died);
                       ?>
                       <tr style="color: #00000">
                            <td style="color: red">{!!$al !!}</td>
                            <td style="color: green">{!! $he  !!}</td>
                            <td style="color: red">{!!$cr  !!}</td>
                            <td style="color: black">{!!   $die !!}</td>
                            <td style="color: darkviolet">{!!$st  !!}</td>
                       </tr>
                </tbody>
                </table>
                 <br/>
                </div>
                <div class="col-md-3">
                  here
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
@stop
