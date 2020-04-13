@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect">
            <div  class="row">
                <div class="row">@if(Session::has('select_msg'))
                        <div class="alert alert-info">
                            {{Session::get('select_msg')}}
                            {{Session::forget('select_msg')}}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 col-xs-9">
                    <div class="row">

                        {!! Form::open(['route'=>'filter_contributors_batch','method'=>'POST']) !!}
                        @include('partials.encrypt_form_csrf')
                        <div class="col-xs-9 col-md-6  ">

                             <label style="margin-left: -20px;padding-top: 5px; "><span>{{trans('english.batch_contr')}}</span></label>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <?php $batch = \App\Contribution::getAllContributorsBatches();?>
                            <select style="margin-right: 0%;margin-left:-90px;width:200px;" name="batch_sort" class="form form-control ">
                                <option value="none">{{trans('english.contri_batch')}}</option>
                                @foreach($batch as $rol)
                                    <option value={{$rol->batch}}> {{$rol->batch}}</option>
                                @endforeach
                            </select><span> {!! Form::submit('Submit',['class'=>'btn btn-success','style'=>'border-radius:50px;margin-top:10px;margin-left: -30px;']) !!}</span>
                            <br>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="row">
                        <div class=" col-md-6 col-xs-9">
                            <label style="padding-top: 5px;">{{trans('english.filter_user')}}</label>
                        </div>
                        <div class="col-md-6 col-xs-9">
                            <?php $contributorOption = \App\Contribution::getAllContributorsOptions();?>
                            <select style="margin-right: 0%;margin-left:-90px;width:200px;" name="sort_user_contri" class="form form-control " onchange="getContributionByUserID(this)">
                                {!!  $contributorOption !!}
                            </select>
                        </div>
                    </div>

                        <br>
                </div>
            </div>
            <div class="dible-respgsive" id="contributorsBody">
                 <table id="example1" class="table table-bordered table-striped">

                        <div>
                            <h2 style="text-align: center;">{{trans('english.contributors_list')}}</h2>
                        </div>
                        <thead>
                        <tr style="background-color: #0088CC">
                            <th style="width: 2%;">{{trans('english.id')}}</th>
                            <th style="width: 15%;">{{trans('english.user_name')}}</th>
                            <th style="width: 10%;">{{trans('english.phone')}}</th>
                            <th style="width: 10%;">{{trans('english.amount')}}</th>
                            <th style="width: 15%;">{{trans('english.purpose')}}</th>
                            <th style="width: 10%;">{{trans('english.reciever')}}</th>
                            <th style="width: 10%;">{{trans('english.edit')}}</th>
                        </tr>

                        </thead>
                        <tbody> <?php $counter =0;$sum = 0;
                                $users = \App\Contribution::getAllContributors();
                        ?>
                            @foreach($users as $user)
                                <?php $counter++; $sum += $user->amount*1; ?>

                               <tr>
                                <td  hidden name="countribution_id">{{ $user->contribution_id }}</td>
                                <td style="width: 2%;">{{ $counter }}</td>
                                <td style="width: 15%;">{{ $user->first_name }}  {{ $user->last_name  }}</td>
                                <td style="width: 10%;">{{ $user->phone  }}</td>
                                <td style="width: 10%;">{{ $user->amount }} FCFA</td>
                                <td style="width: 15%;">{{ $user->purpose }}</td>
                                <td style="width: 15%;">
                                   <?php $receiver = \App\AlumniMember::findOrFail($user->reciever_id); echo $receiver->first_name ." ". $receiver->last_name; ?>
                                </td>
                                <td style="width: 10%;"><a href="{{URL::to('/user/contribution/update/'.$user->contribution_id)}}" class="btn btn-success"><span><i class="fa fa-edit"></i> </span>{{trans('english.edit') }}</a></td>

                              </tr>

                           @endforeach

                        </tbody>
                        <tfoot>
                        <tr  style="background-color: rgba(93, 156, 94, 0.36)">
                            <th colspan="3">{{trans('english.total_amount')}}</th>
                            <th colspan="4" id="sum">{{  $sum }} FCFA</th>
                        </tr>
                        <tr style="background-color: #0088CC" >
                            <th colspan="3">{{trans('english.total_entries')}}</th>
                            <th colspan="4">{{ count($users) }}</th>
                        </tr>

                        </tfoot>
                     </table>
                     <div class="pagination" id="pagination">
                         {!! $users->render() !!}
                     </div>
            </div>
                     <p style="float: right">
                       <a href="{{URL::to('/download/contributions/as/pdf')}}">   <button class="btn btn-success" >{{trans('english.pdf')}}</button></a>
                     </p>

            </div><!-- /.box-body -->
           </div>
        </div>
    <script>
        $("#priv_3").addClass('active');
        $("#subpriv_23").css('background-color','skyblue');
        $('div.alert').not('.alert-important').delay(20000).slideUp(500);
        function  getContributionByUserID(obj){

            HoldOn.open();
            $.ajax({
                type: "get",
                url: $('#baseUrl').val()+"/filter/contributions/by/userId/"+obj.value,
                success: function (data) {
                    var object = JSON.parse(data)
                    $("#contributorsBody").html('')
                    $("#contributorsBody").html(object.contributions)
                    $("#pagination").html('')

                    HoldOn.close();

                    // alert(html)
                },
                error: function (error) {
                   alert('Error reaching the server')
                    console.log(error)
                    HoldOn.close();
                }
            });
        }
    </script>
@stop