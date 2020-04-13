@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect " >
          <div class ="row">

              @if(Session::has('success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{Session::get('success')}}
                  </div>
              @endif
              {!! Form::open(['route'=>'save_contribution']) !!}
                  @include('partials.encrypt_form_csrf')
                   <h2 style="text-align: center;">{{trans('english.record_contribution')}}</h2>
                    <br>
                     <div class="form-group row">

                        <?php $user = \App\AlumniMember::getAllUsersOptions();
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
                          {!! Form::label(trans('english.batch')) !!}
                      </div>
                      <div class="col-xs-9">
                          {!! Form::text('batch',null,
                              array('required',
                                    'class'=>'form form-control',
                                    'placeholder'=>trans('english.giver_batch'))) !!}
                      </div>
                      <div class="col-xs-1">

                      </div>
                  </div>
                     <div class="form-group row">
                          <div class="col-xs-2">
                              {!! Form::label(trans('english.amount')) !!}
                          </div>
                          <div class="col-xs-9">
                              {!! Form::text('amount',null,
                                  array('required',
                                        'class'=>'form form-control',
                                        'placeholder'=>trans("english.amount_paid"))) !!}
                          </div>
                         <div class="col-xs-1">
                             <p style="margin-left: -240%;margin-top: 5px; z-index: 2">FCFA</p>
                         </div>
                   </div>
                  <div class="form-group row">
                      <div class="col-xs-2">
                          {!! Form::label(trans('english.reciever')) !!}
                      </div>
                      <div class="col-xs-9">
                          <select name="reciever_id" class="form form-control" required>
                            <option value="1">{{trans('english.select_reciever')}}</option>
                            {!!  $user!!}
                          </select>
                      </div>
                  </div>


                  <div class="form-group row">
                                <div class="col-xs-2">
                                    {!! Form::label(trans('english.purpose')) !!}
                                </div>
                                <div class="col-xs-9">
                                    {!! Form::text('purpose',null,
                                        array(
                                              'class'=>'form form-control',
                                              'placeholder'=>trans('english.purpose'), 'style'=>'margin-right: 0px;')) !!}
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
        $("#priv_3").addClass('active');
        $("#subpriv_43").css('background-color','skyblue');
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