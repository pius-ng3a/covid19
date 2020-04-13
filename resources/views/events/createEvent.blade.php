@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect " >
          <div class ="row">{!! Html::style('') !!}
              <link href="{{URL::asset('jquery-ui-1.11.4.custom/jquery-ui.css')}}" rel="stylesheet" />
              <link href="{{URL::asset('css/jquery.datetimepicker.css')}}" rel="stylesheet" />
              @if(Session::has('success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{Session::get('success')}}
                  </div>
              @endif
              {!! Form::open(['route'=>'save_event']) !!}
                  @include('partials.encrypt_form_csrf')
                   <h2 style="text-align: center;">{{trans('english.create_event')}}</h2>
                    <br>
                     <div class="form-group row">

                        <?php $user = \App\AlumniMember::getAllUsersOptions();
                             $roles =\App\Role::getRoleOptions();
                        ?>
                        <div class="col-xs-2">
                             {!! Form::label(trans('english.event')) !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('event_name',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>trans('english.event_nm'))) !!}
                        </div>
                     </div>
                  <div class="form-group row">
                      <div class="col-xs-2">
                          {!! Form::label(trans('english.event_date')) !!}
                      </div>
                      <div class="col-xs-9">
                          <input type="date" class="form form-control" id="datepicker" name='event_date' value={{\Carbon\Carbon::now()}}>
                      </div>
                      <div class="col-xs-1">

                      </div>
                  </div>
                     <div class="form-group row">
                          <div class="col-xs-2">
                              {!! Form::label(trans('english.venue')) !!}
                          </div>
                          <div class="col-xs-9">
                              {!! Form::text('venue',null,
                                  array('required',
                                        'class'=>'form form-control',
                                        'placeholder'=>trans("english.event_vn"))) !!}
                          </div>
                   </div>
                  <div class="form-group row">
                      <div class="col-xs-2">
                          {!! Form::label(trans('english.start_time')) !!}
                      </div>
                      <div class="col-xs-9">
                          {!! Form::text('start_time',null,
                              array(
                                    'class'=>'form form-control',
                                    'placeholder'=>trans('english.event_start_time'), 'style'=>'margin-right: 0px;')) !!}
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-xs-2">
                          {!! Form::label(trans('english.description')) !!}
                      </div>
                      <div class="col-xs-9">
                          {!! Form::textarea('description',null,
                                  array(
                                        'class'=>'form form-control',
                                        'placeholder'=>trans("english.event_description"),'style'=>'height:50px;')) !!}
                      </div>
                  </div>



          </div>
          <div>
                        <div class="form-group" style="text-align: center;">
                            {!! Form::submit(trans('english.save'),
                              array('class'=>'btn btn-primary','id'=>'register-submit','style'=>'margin-top:20px;border-radius:30%;')) !!}
                        </div>
                      {!! Form::close() !!}
                    </div>

         <hr/>
          </div>
          <div class = "row">
                <br>
                {!! Form::open(['route'=>'store_new_admin','class'=>'form-horizontal','role'=>'form']) !!}
             {{--   @include('admin.registeradminform')--}}
                {!! Form::close() !!}
          </div>

        </div>
    </div>
    <script>
        $("#priv_2").addClass('active');
        $("#subpriv_10").css('background-color','skyblue');
        $(function(){
            $('div.alert').not('.alert-important').delay(20000).slideUp(500);
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

        })
        $('document').ready(function() {
            <!-- validate the password input to be sure there is no mismatch-->

        });
    </script>
@stop