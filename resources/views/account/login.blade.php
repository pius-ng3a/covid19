@extends('master')
@section('header')
    @include('header')
    @include("partials.menuItem1")
<link rel="stylesheet" href="{{URL::asset('css/munde.css')}}" type="text/css"/>
@endsection
@section('content')
    <div class="row2">
       <div class="outer" style="background-color: inherit;">

        <div class="center_rect" style="background: #f0f0f0">
            <div>
                @if(session::has('account_creation_success'))
                    <div class="alert alert-info ">
                        {{session::get('account_creation_success')}}
                    </div>
                @endif

                @if(Session::has('reset_success'))
                    <div class="alert alert-success">
                        {{session::get('reset_success')}}
                    </div>
                @endif
                @if(Session::has('login_first'))
                    <div class="alert alert-info">
                        {{Session::get('login_first')}}
                    </div>
                @endif
                @if(Session::has('not_verified'))
                    <div class="alert alert-info">
                        {{Session::get('not_verified')}}
                    </div>
                @endif
            </div>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <div class="user_icon">
               <p> <img style=" margin-left: 40%; width: 150px;height: 150px;border-radius: 20%;" src="{{URL::asset('image/login.jpg')}}" alt="not found" class="img-rounded img-responsive iframe-img">
               </p>
            </div>
            <div style="margin-left: 15%">
                {!! Form::open(['route'=>'auth_user']) !!}
                <div class="row">
                    <div class="col-md-5"style="margin-top: 15px; ">
                        {!! Form::label('UserName') !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::text('username',null,array( 'placeholder'=>'user name','tabindex'=>'4','required','class'=>'form form-control','style'=>'margin-top: 10px;margin-left:-20px;margin-bottom:30px;')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5"style="margin-top: 15px; ">
                        {!! Form::label('password') !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::password('password',  array('class' => 'form form-control','placeholder'=>'password','tabindex'=>'4','required','id'=>'pass1','style'=>'margin-top: 10px;margin-left:-20px;')) !!}
                    </div>
                   {!! Form::submit('Login',['class'=>'btn btn-primary','style'=>'margin-left:25%; margin-bottom:5px;margin-top:40px;width:40%; border-radius: 18px; background:blue;']) !!}
                </div>
                <div class="row">
                    <p style="text-align: center; color: #0083C9"><a href="{{action('UserAccountController@resetPassword')}}"><b>Forgot Password ?</b></a></p>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection