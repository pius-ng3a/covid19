@extends('master')
@section("header")
@include("header")
@include("partials.menuItem3")


@endsection

@section('content')
        <!-- ####################################################################################################### -->
<section id="mu-our-teacher">
  <div class="container" style="margin-top: -6%;">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-our-teacher-area">
          <!-- begain title -->
          <div class="mu-title" >
            <h2 style="color: #b03e00">{{trans('english.ghs_campus_view')}}</h2>
            <p style="color: #0066cc">
              {{trans('english.ghs_campus_view_msg')}}
            </p>
          </div>
          <!-- end title -->
          <!-- begain our teacher content -->
          <div class="mu-our-teacher-content" style="margin-top: -.5%;">
            <div class="row">
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/staffroom.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.staffroom')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/chemistry_lab.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.chem_lab')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/physics_lab2.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.physics_lab')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/Adm_block.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.admin_block')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/labs.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.science_labs')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/first_cycle.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.first_cycle')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/library.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.library')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/down_campus_s1.jpg')}}" alt="footbal pitch">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.second_cycle')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students.jpg')}}" alt="footbal pitch">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.assembly1')}}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/football_pitch.jpg')}}" alt="footbal pitch">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.football_pitch')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/d_campus.jpg')}}" alt="footbal pitch">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.campus1')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/down_camp.jpg')}}" alt="footbal pitch">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.campus1')}}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color: grey; height: 8%;">
                <h3 style="text-align: center;color: blue;padding-top: .9%;">{{trans('english.meet_students')}}</h3>
            </div>
            <div class="row"style="margin-top: 3%;">
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/USA.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.room_usa')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/lss2.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.room_lss2')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/uss.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.room_uss')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/uss2.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.room_uss')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/rev.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.rev')}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-our-teacher-single">
                  <figure class="mu-our-teacher-img">
                    <img src="{{URL::asset('image/students/USA2.jpg')}}" alt="admin block">
                  </figure>
                  <div class="mu-ourteacher-single-content">
                    <h3>{{trans('english.room_usa22')}}</h3>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <!-- End our teacher content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ####################################################################################################### -->
@endsection


@section("footer")
@include("footer")
@endsection
