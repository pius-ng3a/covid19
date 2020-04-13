@extends('admin.main')
@section('content')
    @include('partials.adminleftpanel')
    <div class="outer">

        <div class="center_rect" style="margin-left: 35%;width: 50%; background-color: rgba(2, 5, 2, 0.04)">
            <div class="user_icon"> <img style=" align-content: center; width: 100%;height: 100%;border-radius: 20%;" src="{{URL::asset('image/security.jpg')}}" alt="not found" class="img-rounded img-responsive iframe-img">
            </div>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <div style="margin-left: 15%">

                {!! Form::open(['route'=>'save_changepaswd']) !!}
                @include('partials.encrypt_form_csrf')
                <div class="row">
                    <div class="col-sm-2"style="margin-top: 15px; ">
                        {!! Form::label(trans('english.username')) !!}
                    </div>
                    <div class="col-sm-10">
                        <div class="col-sm-11" style="margin-left: -15px;">
                            {!! Form::text('username',Auth::user()->username,  array('class' => 'form form-control','readonly','placeholder'=>trans('english.username'),'tabindex'=>'4','required', 'style'=>'margin-top: 10px;')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"style="margin-top: 15px; ">
                        {!! Form::label('password') !!}
                    </div>
                    <div class="col-sm-10">
                        <div class="col-sm-11" style="margin-left: -15px;">
                            {!! Form::password('password',  array('class' => 'form form-control','placeholder'=>trans('english.new_pass'),'tabindex'=>'4','required','id'=>'pass1','style'=>'margin-top: 10px;')) !!}
                        </div>
                        <div class="col-sm-1">
                            <p id="tickpass1"> </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"style="margin-top: 15px; ">
                        {!! Form::label('Confirm') !!}
                    </div>
                    <div class="col-sm-10">
                        <div class="col-sm-11" style="margin-left: -15px; ">
                            {!! Form::password('password',  array('class' => 'form form-control','placeholder'=>trans('english.retype'),'tabindex'=>'4','required','id'=>'pass2','style'=>'margin-top: 10px;')) !!}
                        </div>
                        <div class="col-sm-1">
                            <p id="tickpass2"> </p>
                        </div>
                    </div>
                    <div>
                        <p id="passwordcheck" style="color: red;margin-left: 20%;"></p>
                    </div>
                </div>

                <p style="color: red" id="passwordcheck"> </p>

                <div>
                    {!! Form::submit('Save',['class'=>'btn btn-primary','style'=>'margin-left:40%; margin-bottom:5px;margin-top:10px;']) !!}
                </div>

                {!! Form::close() !!}

                <script type="text/javascript">
                    $('document').ready(function() {
                        <!-- validate the password input to be sure there is no mismatch-->
                        $('#pass1').change(function(){
                            if(($('#pass1').val().length) >5){
                                $('#tickpass1').html("<i style='margin-top: 20px; color: green;'class='fa fa-check'></i>");
                            }
                            else{
                                $('#tickpass1').html("<span style='color:red'><i class='fa fa-times'></i> min:6 chars</span>");
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
                </script>

            </div>
        </div>
    </div>
@endsection
