@extends('admin.main')
@section('content')
  @include('partials.adminleftpanel')
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2 style="text-align: center">{{trans('english.my_dashboard')}}</h2>
        </div>
      </div>
      <!-- /. ROW  -->
      <hr />

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="form-group">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
              <div class="panel-body">
                <i class="fa fa-info"></i>

                <section id="mu-error">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="mu-error-area">
                          <p>{{trans('english.401')}}</p>
                          <span>{{trans('english.not_authorized')}}</span>
                          <h2>401</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            </div>
        </div>             <!-- /. ROW  -->
      </div>
    </div>
   </div>
    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
  </div>
@stop
