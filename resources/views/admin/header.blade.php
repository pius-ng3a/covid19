<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>COVID19</title>
    <!-- BOOTSTRAP STYLES-->
    {!! Html::style('css/bootstrap.min.css') !!}}

    <!-- FONTAWESOME STYLES-->
    {!! Html::style('font-awesome-4.5.0/css/font-awesome.min.css') !!}}
    <!-- CUSTOM STYLES-->
    {{--
        <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet" />
    --}}
    {!! Html::style('css/custom.css') !!}}
    {!! Html::style('css/custom_select2.min.css') !!}}
    {!! Html::style('css/munde1.css') !!}}
    {!! Html::style('css/HoldOn.min.css') !!}}


    <script type="text/javascript">
        var URL = 'http://localhost:8000/';
    </script>
    {!! Html::script('js/jquery-1.11.3.min.js') !!}}

    {!! Html::style('css/adminpanel.css') !!}}
    {!! Html::script('js/adminpanel.js') !!}}
    {!! Html::script('js/custom_select2.js') !!}}

</head>
<body >

<input type="hidden" id="baseUrl" value="{!! URL::to('/') !!}"/>
