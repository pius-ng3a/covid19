
<div class="form-group">
    <div class="col-xs-3">
       {!! Form::label(trans('english.f_name')) !!}
    </div>
    <div class="col-xs-9">
         {!! Form::text('first_name', null,
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'First name')) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-3">
         {!! Form::label(trans('english.l_name')) !!}
    </div>
    <div class="col-xs-9">
         {!! Form::text('last_name', null,
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Last name')) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-3">
        {!! Form::label(trans('english.email')) !!}
    </div>
    <div class="col-xs-9">
        {!! Form::text('email', null,
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>' E-mail address')) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-3">
      {!! Form::label(trans('english.phone')) !!}
    </div>
    <div class="col-xs-9">
    {!! Form::text('phone', null,
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>' Phone Number')) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-3">
      {!! Form::label(trans('english.password')) !!}
    </div>
    <div class="col-xs-9">
    {!! Form::password('password',
        array('required', 
              'class'=>'form form-control',
              'placeholder'=>' Password','id'=>'pass1')) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-3">
    {!! Form::label(trans('english.retype_password')) !!}
    </div>
    <div class="col-xs-9">
    {!! Form::password('password_confirm',
        array('required', 
              'class'=>'form form-control',
              'placeholder'=>'Retype Password','id'=>'pass2')) !!}
    </div>
    <div>
        <p id="passwordcheck" style="color: red;margin-left: 20%;"></p>
    </div>
</div>
  <div class="form-group">
      <div class="col-xs-3">
                    {!! Form::label(trans('english.user_category')) !!}
      </div>
      <div class="col-xs-9">

                  {!! Form::select('role_id',  ['1'=>'Administrator'],null, ['class' => 'form form-control','placeholder'=>'User type','required']) !!}
      </div>
  </div>
<?php $quarter = \App\Quarter::getQuarterOptions(); ?>
<div class="form-group">
    <div class="col-xs-3">
        {!! Form::label(trans('english.quarter')) !!}
    </div>
    <div class="col-xs-9">

        <select name="quarter_id" class="form form-control">
            {!! $quarter !!}
        </select>
    </div>
</div>
<div class="form-group" style="text-align: center;">
    {!! Form::submit(trans('english.admin'),
      array('class'=>'btn btn-primary','id'=>'register-submit')) !!}
</div>