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
            <div class="dible-respgsive" id="contributorsBody">
                 <table id="example1" class="table table-bordered table-striped">

                        <div>
                            <h2 style="text-align: center;">{{trans('english.event_list')}}</h2>
                        </div>
                        <thead>
                        <tr style="background-color: #0088CC">
                            <th style="width: 2%;">{{trans('english.id')}}</th>
                            <th style="width: 10%;">{{trans('english.event')}}</th>
                            <th style="width: 10%;">{{trans('english.date')}}</th>
                            <th style="width: 10%;">{{trans('english.venue')}}</th>
                            <th style="width: 5%;">{{trans('english.time')}}</th>
                            <th style="width: 15%;">{{trans('english.description')}}</th>
                            <th style="width: 10%;">{{trans('english.status')}}</th>
                            <th style="width: 10%;">{{trans('english.edit')}}</th>
                        </tr>

                        </thead>
                        <tbody> <?php $counter =0;$sum = 0;
                                $events = \App\Event::getSomeEvents(30);
                        ?>
                            @foreach($events as $user)
                                <?php $counter++; ?>

                               <tr>
                                <td  hidden name="event_id">{{ $user->event_id }}</td>
                                <td style="width: 2%;">{{ $counter }}</td>
                                <td style="width: 10%;">{{ $user->event_name }} </td>
                                <td style="width: 10%;">{{ $user->date  }}</td>
                                <td style="width: 10%;">{{ $user->venue }}</td>
                                <td style="width: 5%;">{{ $user->start_time }}</td>
                                <td style="width: 44%;" class="break_words">{{ $user->description }}</td>
                               @if($user->state ==1)
                                   <td style="width: 3%;"><a href="{{URL::to('toggle/event/state/'.$user->event_id)}}" class="btn btn-success"><span><i class="fa fa-eye "></i> </span>{{trans('english.open')}}</a></td>
                               @else
                                   <td style="width: 3%;"><a href="{{URL::to('toggle/event/state/'.$user->event_id)}}" class="btn btn-warning"><span><i class="fa fa-lock"></i> </span>{{trans('english.close')}}</a></td>
                               @endif
                                 <td style="width: 3%;"><a href="{{URL::to('/update/event/'.$user->event_id)}}" class="btn btn-success"><span><i class="fa fa-edit"></i> </span>{{trans('english.edit') }}</a></td>

                              </tr>

                           @endforeach

                        </tbody>
                        <tfoot>

                        <tr style="background-color: #0088CC" >
                            <th colspan="3">{{trans('english.total_entries')}}</th>
                            <th colspan="4">{{ count($events) }}</th>
                        </tr>

                        </tfoot>
                     </table>
                     <div class="pagination" id="pagination">
                         {!! $events->render() !!}
                     </div>
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