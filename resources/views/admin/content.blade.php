@extends('admin.main')
@section('content')
   @include('partials.adminleftpanel')
    <div id="page-wrapper">
        <div id="page-inner">
          @yield('content1')
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

@stop
