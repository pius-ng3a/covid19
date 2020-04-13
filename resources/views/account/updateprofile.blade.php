@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div class="outer"style="margin-top: -40px;" >
            <div class="registration" style="background: #f0f0f0">
            <?php $roleOptions = \App\Role::getRoleOptions();?>
                @if(Session::has('success'))
                    <div class="alert alert-success centralize">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            <div style="margin-left: 5%">
                <div>
                    <h3 style="color: dodgerblue; text-align: center; border-bottom: 1px solid blue;">{{trans('english.update_profile')}}</h3>
                </div>
                {!! Form::model($user,['route'=>'save_user_profileupdate','files'=>'true']) !!}
                <div class="row">
                   @include('partials.encrypt_form_csrf')
                    {!! Form::text('user_id',$user->user_id,array( 'placeholder'=>'last name','tabindex'=>'4','required','hidden'  )) !!}
                    <div class="col-md-6">
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12 " style="margin-top: 10px; ">
                                {!! Form::label(trans('english.f_name')) !!}
                            </div>
                            <div  class="col-md-8 col-sm-8 col-xs-12 "  >
                                {!! Form::text('first_name',$user->first_name,array( 'placeholder'=>'first name','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px; ">
                                {!! Form::label(trans('english.l_name')) !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px; " >
                                {!! Form::text('last_name',$user->last_name,array( 'placeholder'=>'last name','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12"style="margin-top: 15px; ">
                                {!! Form::label(trans('english.email')) !!}
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                {!! Form::email('email',$user->email,array( 'placeholder'=>'email address','tabindex'=>'4' ,'class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b ><img border="5" style="width:200px;height:150px; margin-left:  8%;" alt="140x140" id="pic" class="img-thumbnail" data-src="holder.js/140x140" src="{{URL::asset('image/alumni/members/'.$user->picture)}}"  /></b></i>

                        <label for="profilePicFile"style="margin-left: 8%" ;>  {{trans("english.userpicture")}}  </label>
                        <span >    <input onclick="showImage(this)" type="file" value="{{old('profilePicFile')}}" id="profilePicFile" name="profilePicFile">
                        </span> <p class="help-block" style="color: #ff0000"></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"style="margin-top: 15px; ">
                        {!! Form::label(trans('english.batch')) !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::text('batch', $user->batch,array( 'placeholder'=>'batch e.g 1999','tabindex'=>'4','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:15px;')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2" >
                        {!! Form::label('Phone') !!}
                    </div>
                    <div class="col-sm-10">
                        {!! Form::text('phone',$user->phone,array( 'placeholder'=>'Phone number','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-left:-20px;margin-bottom:15px;')) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2" class="top-space" style="margin-top: 25px;">
                        {!! Form::label('Address') !!}
                    </div>
                    <div class="col-sm-10" class="top-space" style="margin-left: -20px;">

                        <input name="address" class="form form-control top-space" value="{{$user->address}}"/>

                    </div>
                </div>
                <div class="row" class="top-space">
                    <div class="col-sm-2" style="margin-top:5px;" >
                        {!! Form::label('User Type') !!}
                    </div>
                    <div class="col-sm-10" style="margin-top:5px;margin-left: -20px;">
                        <select class="form-control " name="role_id" >
                         <option value="{{$user->role_id}}"> <?php $role =\App\Role::getRoleByID($user->role_id); echo $role->name;?></option>
                            {!! $roleOptions !!}
                        </select>
                    </div>
                </div>
                <div>
                    {!! Form::submit(trans('english.update_profile'),['id'=>'register-submit','class'=>'btn btn-primary','style'=>'margin-left:25%;width:5%; margin-bottom:5px;margin-top:-4px;width:40%; border-radius: 18px; background:blue;']) !!}
                </div>

                {!! Form::close() !!}

            </div>
            <script>
                $('document').ready(function() {
                    <!-- validate the password input to be sure there is no mismatch-->
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
                    $("#priv_1").addClass('active');
                    $("#subpriv_2").css('background-color','skyblue');
                    $('div.alert').not('.alert-important').delay(20000).slideUp(500);
                });
            </script>
        </div>
    </div>
@endsection
