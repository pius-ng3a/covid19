@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect " >
          <div class ="row">
              @if(Session::has('admin_set'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{Session::get('admin_set')}}
                  </div>
              @endif
              @if(Session::has('admin_creation_success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{Session::get('admin_creation_success')}}
                  </div>
              @endif
              {!! Form::open(['route'=>'store_admin']) !!}
                  @include('partials.encrypt_form_csrf')
                   <h2 style="text-align: center;">{{trans('english.set_administrator')}}</h2>
                    <br>
                     <div class="form-group row">

                        <?php $user = \App\AlumniMember::getNonAdminUsersOptions();
                             $roles =\App\Role::getRoleOptions();
                        ?>
                        <div class="col-xs-2">
                             {!! Form::label(trans('english.user_name')) !!}
                        </div>
                        <div class="col-xs-9">
                                <select name="user_id" class="form form-control" required>
                                    <option>{{trans('english.select_user_name')}}</option>
                                    {!! $user !!}
                                </select>
                        </div>
                     </div>
                        <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.role_name1')) !!}
                                </div>
                                <div class="col-xs-9">
                                    <select name="role_id" class="form form-control" required>
                                        <option value="1">{{trans('english.select_pos')}}</option>
                                        {!!  $roles!!}
                                    </select>
                                </div>
                            </div>

                        <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.username')) !!}
                                </div>
                                <div class="col-xs-9">
                                    {!! Form::text('username',null,
                                        array('required',
                                              'class'=>'form form-control',
                                              'placeholder'=>trans("english.username"))) !!}
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.password')) !!}
                                </div>
                                <div class="col-xs-9">
                                    {!! Form::password('password',
                                        array('required|min:8',
                                              'class'=>'form form-control',
                                              'placeholder'=>' Password','id'=>'pass1','style'=>'margin-right: 0px;')) !!}
                                </div>
                                <div class="col-xs-1">
                                    <p style=" margin-left: -310%; z-index: 2;" id="tickpass1">  </p>
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.retype')) !!}
                                </div>
                                <div class="col-xs-9">
                                    {!! Form::password('password_confirm',
                                        array('required',
                                              'class'=>'form form-control',
                                              'placeholder'=>'Retype Password','id'=>'pass2')) !!}
                                </div>
                                <div class="col-xs-1">
                                    <p id="passwordcheck" style="color: red;margin-left: -310%; z-index: 2">  </p>
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.reign')) !!}
                                </div>
                                <div class="col-xs-9">
                                    {!! Form::text('reign',null,
                                        array('required',
                                              'class'=>'form form-control',
                                              'placeholder'=>trans('english.year_elect'))) !!}
                                </div>
                                <div class="col-xs-1">

                                </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group" style="text-align: center;">
                            {!! Form::submit(trans('english.set_admin'),
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
        $("#priv_4").addClass('active');
        $("#subpriv_3").css('background-color','skyblue');
        $('div.alert').not('.alert-important').delay(20000).slideUp(500);
        $(function(){
        })
        $('document').ready(function() {
            <!-- validate the password input to be sure there is no mismatch-->
            $('#pass1').change(function(){
                if(($('#pass1').val().length) >5){
                    $('#tickpass1').html("<i style=' margin-top: 10px; color: green;  'class='fa fa-check'></i>");
                }
                else{
                    $('#tickpass1').html("<span style='color:red'><i class='fa fa-times'></i> min:6</span>");
                }
            });
            $('#pass2').change(function(){
                if($('#pass1').val()== $('#pass2').val()){
                    $('#passwordcheck').html("<i style='  color: green;margin-top: 10px; 'class='fa fa-check'></i>");
                }
                else{
                    $('#passwordcheck').html('Password mismatch');
                }

            });


        });
    </script>
@stop