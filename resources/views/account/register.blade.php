@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div class="outer" style="margin-top: -5%;">
        <div class="registration" style="background: #f0f0f0;height:850px;">
            @if(Session::has('success'))
                <div class="alert alert-success centralize">
                    {{Session::get('success')}}
                </div>
            @endif
            <?php $roleOptions = \App\Role::getRoleOptions();?>
            <div style="margin-left: 5%">
                <div>
                    <h3 style="color: dodgerblue; text-align: center; border-bottom: 1px solid blue;">{{trans('english.add_member')}}</h3>
                </div>
                {!! Form::open(['route'=>'store_user','files'=>true]) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12 " style="margin-top: 10px; ">
                                {!! Form::label(trans('english.f_name')) !!}
                            </div>
                            <div  class="col-md-8 col-sm-8 col-xs-12 "  >
                                {!! Form::text('first_name',null,array( 'placeholder'=>'first name','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label(trans('english.l_name')) !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                                {!! Form::text('last_name',null,array( 'placeholder'=>'last name','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12"style="margin-top: 15px; ">
                                {!! Form::label(trans('english.email')) !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {!! Form::email('email',null,array( 'placeholder'=>'email address','tabindex'=>'4' ,'class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b ><img border="5" style="width:200px;height:150px; margin-left:  8%;" alt="140x140" id="pic" class="img-thumbnail" data-src="holder.js/140x140"  /></b></i>

                           <label for="profilePicFile"style="margin-left: 8%" ;>  {{trans("english.userpicture")}}  </label>
                        <span >    <input onclick="showImage(this)" type="file" value="{{old('profilePicFile')}}" id="profilePicFile" name="profilePicFile">
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"style="margin-top: 15px; ">
                        {!! Form::label(trans('english.batch')) !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::text('batch',null,array( 'placeholder'=>'name of town e.g Gikondo ','tabindex'=>'4','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:15px;')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" >
                        {!! Form::label('Phone') !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::text('phone',null,array( 'placeholder'=>'Phone number','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-left:-20px;margin-bottom:15px;')) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2" class="top-space" style="margin-top: 25px;">
                        {!! Form::label('Address') !!}
                    </div>
                    <div class="col-sm-10" class="top-space" style="margin-left: -20px;">

                        <input name="address" class="form form-control top-space" />

                    </div>

                </div>
                <div class="row" class="top-space">
                    <div class="col-sm-2" style="margin-top:5px;" >
                      {!! Form::label('User Type') !!}
                    </div>
                    <div class="col-sm-10" style="margin-top:5px;margin-left: -20px;">
                         <select class="form-control " name="role_id" >
                            {!! $roleOptions !!}
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2" class="top-space" style="margin-top: 25px;">
                        {!! Form::label('UserName') !!}
                    </div>
                    <div class="col-sm-10" class="top-space" style="margin-left: -20px;">

                        <input name="username" class="form form-control top-space" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" class="top-space" style="margin-top: 25px;">
                        {!! Form::label('Password') !!}
                    </div>
                    <div class="col-sm-10" class="top-space" style="margin-left: -20px;">

                        <input name="password" class="form form-control top-space" />
                    </div>
                </div>

                <div class="row" class="top-space" >
                  <div class="col-sm-2" style="margin-top:15px;" >

                  </div>
                  <div class="col-sm-10" style="margin-top:25px;margin-left: -20px;">
                         {!! Form::submit('Register',['id'=>'register-submit','class'=>'btn btn-primary','style'=>'margin-left:25%;width:50%; margin-bottom:5px;margin-top:-10px;width:40%; border-radius: 18px; background:blue;']) !!}
                  </div>
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
