@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div class="outer" style="margin-top: -5%;">
        <div class="registration" style="background: #f0f0f0">
            @if(Session::has('success'))
                <div class="alert alert-success centralize">
                    {{Session::get('success')}}
                </div>
            @endif
            <?php $roleOptions = \App\Role::getRoleOptions();
                  $patientOptions = \App\User::getAllPatientOptions();
                  $doctorOptions =\App\User::getAllDoctorOptions();
                  $centerOptions =\App\Center::getAllCenterOptions();
            ?>
            <div style="margin-left: 5%">
                <div>
                    <h3 style="color: dodgerblue; text-align: center; border-bottom: 1px solid blue;">Register Patient</h3>
                </div>
                {!! Form::open(['route'=>'store_patient','files'=>true]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12 " style="margin-top: 10px; ">
                                {!! Form::label("Patient") !!}
                            </div>
                            <div  class="col-md-8 col-sm-8 col-xs-12 "  >
                              <select name="patient_userId" class="form-control">
                                  {!!$patientOptions!!}
                              </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Doctor") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                              <select name="doctor_id" class="form-control">
                                  {!!$doctorOptions!!}
                              </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Testing Site") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; "  >
                              <select name="site_id" class="form-control">
                                  {!!$centerOptions!!}
                              </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Appointment Num:") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                                  {!! Form::text("appointment_id",null,
                                array('class'=>'form form-control',
                                      'placeholder'=>"e.g 32")) !!}
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12 " style="margin-top: 10px; ">
                                {!! Form::label("Quarantine Centre") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; ">
                                  <select name="quarantine_id" class="form-control">
                                    {!!$centerOptions !!}
                                  </select>
                            </div>

                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Consultation Date") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                                {!! Form::Date("consulted_on",NULL,array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Patient State") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                                 <select name="state" class="form-control">
                                   <option value="stable">stable</option>
                                   <option value="critical">critical</option>
                                   <option value="died">died</option>
                                   <option value="healed">healed</option>
                                 </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Date Discharged") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                              {!! Form::Date("discharged_on",null,
                            array('class'=>'form form-control',
                                  'placeholder'=>"e.g Patient needs intensive care")) !!}
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label("Observation") !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                              {!! Form::text("observation",null,
                            array('class'=>'form form-control',
                                  'placeholder'=>"e.g Patient needs intensive care")) !!}
                            </div>
                        </div>

                    </div>

                </div>

                <div>
                    {!! Form::submit('Register',['id'=>'register-submit','class'=>'btn btn-primary','style'=>'margin-left:25%;width:50%; margin-bottom:5px;margin-top:20px;width:40%; border-radius: 18px; background:blue;']) !!}
                </div>

                {!! Form::close() !!}
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <div id="#newquarterdiv" style="z-index: 2; background-color: red; display: none;">
                    <p>we are here</p>
                </div>
            </div>
            <script>
               $('document').ready(function() {
                    $("#priv_1").addClass('active');
                    $("#subpriv_1").css('background-color','skyblue');
                    $('div.alert').not('.alert-important').delay(20000).slideUp(500);
                    $(function(){
                    })

                    <!-- validate the password input to be sure there is no mismatch-->
                    $('#pass1').change(function(){
                        if(($('#pass1').val().length) >5){
                            $('#tickpass1').html("<i style='margin-top: 20px; color: green;'class='fa fa-check'></i>");
                        }
                        else{
                            $('#tickpass1').html("<span style='color:red'><i class='fa fa-times'></i> min:6</span>");
                        }
                    });
                    $('#pass2').change(function(){
                        if($('#pass1').val()== $('#pass2').val()){
                            $('#passwordcheck').html('');
                            $('#tickpass2').html("<i style='margin-top: 20px; color: green;'class='fa fa-check'></i>");
                        }
                        else{
                            $('#tickpass2').html("<i style='margin-top: 20px; color: red;'class='fa fa-times'></i>");
                            $('#passwordcheck').html('Password mismatch');
                        }

                    });

                });


               //reading image function
               function showImage(obj){
                   $('#profilePicFile').change(function(){
                               readURL1(this);
                           }
                   );
               }

               function readURL1(input){
                   if(input.files && input.files[0]){
                       var reader = new FileReader();
                       reader.onload = function(e){
                           $('#pic').attr('src', e.target.result);
                       }
                       reader.readAsDataURL(input.files[0]);
                   }

               }
            </script>
        </div>
    </div>
@endsection
