@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect">
            <div  class="row">
                <div class="row">@if(Session::has('success'))
                        <div class="alert alert-info">
                            {{Session::get('success')}}
                            {{Session::forget('success')}}
                        </div>
                    @endif
                </div>

            </div>
            <div class="dible-respgsive"  id="contributorsBody">
                 <table id="example1" class="table table-bordered table-striped"style="table-layout:fixed;"
                 >

                        <div>
                            <h2 style="text-align: center;">Patients List</h2>
                        </div>
                        <thead>
                        <tr style="background-color: #0088CC">
                            <th style="width: 5%;">{{trans('english.id')}}</th>
                            <th style="width: 10%;">Patient</th>
                            <th style="width: 10%;">State</th>
                            <th style="width: 10%;">Test Site</th>
                            <th style="width: 10%;">Test Date</th>
                            <th style="width: 8%;"> Doctor</th>
                            <th style="width: 20%;">Observation</th>
                            <th style="width: 10%;">Quarantine</th>
                            <th style="width: 10%;">Discharged</th>
                        </tr>

                        </thead>
                        <tbody> <?php $counter =0;$sum = 66;
                                $patients = \App\Patient::getSomePatients(30);
                        ?>
                            @foreach($patients as $user)
                                <?php $counter++;
                                  $cur_patient = \App\Patient::getAUser($user->patient_userId);
                                  $cur_doctor  = \App\Patient::getAUser($user->doctor_id);
                                  $cur_testing_site = \App\Patient::getASite($user->site_id);
                                  $cur_quarantine_site = \App\Patient::getASite($user->quarantine_id);
                                  ?>
                               <tr>
                                <td  hidden name="patient_record_id">{{ $user->patient_record_id }}</td>
                                <td style="width: 2%;">{{ $counter }}</td>
                                <td style="width: 8%;">{{ $cur_patient[0]->FirstName." ".$cur_patient[0]->LastName }} </td>
                                <td style="width: 5%;">{{ $user->state  }}</td>
                                <td style="width: 8%;">{{ $cur_testing_site[0]->SiteName }}</td>
                                <td style="width: 5%;">{{ $user->consulted_on }}</td>
                                <td style="width: 5%;">{{ $cur_doctor[0]->FirstName." ".$cur_doctor[0]->LastName }}</td>
                                <td style="width: 15%;" >{{ $user->observation }}</td>
                                 <td style="width: 10%;">{{ $cur_quarantine_site[0]->SiteName }}</td>
                                 <td style="width: 10%;">{{ $user->discharged_on }}</td>
                                 <td style="width: 3%;"><a href="{{URL::to('/update/patient/'.$user->patient_record_id)}}" class="btn btn-success"><span><i class="fa fa-edit"></i> </span>{{trans('english.edit') }}</a></td>

                              </tr>
                           @endforeach

                        </tbody>
                        <tfoot>
                        <tr style="background-color: #0088CC" >
                            <th colspan="3">{{trans('english.total_entries')}}</th>
                            <th colspan="4">{{ count($patients) }}</th>
                        </tr>

                        </tfoot>
                     </table>
                 </div>
            </div><!-- /.box-body -->
        </div>
    </div>
    <script>
        $("#priv_2").addClass('active');
        $("#subpriv_11").css('background-color','skyblue');
        $('div.alert').not('.alert-important').delay(20000).slideUp(500);
    </script>
@stop
