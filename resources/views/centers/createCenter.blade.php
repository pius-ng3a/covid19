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
              {!! Form::open(['route'=>'save_center']) !!}
                  @include('partials.encrypt_form_csrf')
                   <h2 style="text-align: center;">{{trans('english.create_center')}}</h2>
                    <br>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Center Name") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('SiteName',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>"e.g Nyamirambo Statium")) !!}
                        </div>
                     </div>

                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Longitude") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('Longitude',null,
                          array(
                                'class'=>'form form-control',
                                'placeholder'=>"e.g 19845")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Latitude") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('Latitude',null,
                          array(
                                'class'=>'form form-control',
                                'placeholder'=>"e.g 5387")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Province") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('Province',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>"e.g South West")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("District") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('District',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>"e.g Meme")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Sector") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('Sector',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>"e.g Kumba")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Email") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('emmergencyEmail',null,
                          array(
                                'class'=>'form form-control',
                                'placeholder'=>"e.g center@info.gov")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Phone") !!}
                        </div>
                        <div class="col-xs-9">
                            {!! Form::text('EmmergencyPhone',null,
                          array('required',
                                'class'=>'form form-control',
                                'placeholder'=>"e.g 6724727783")) !!}
                        </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-xs-2">
                             {!! Form::label("Center Type") !!}
                        </div>
                        <div class="col-xs-9">
                            <select class="" name="SiteType">
                              <option value="1">Testing Site Only</option>
                              <option value="2">Quarantine Site Only</option>
                              <option value="3">Combined Testing and Quarantine</option>
                            </select>
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
