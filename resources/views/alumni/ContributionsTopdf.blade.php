

    <div class="outer">
        <div class="center_rect">
            <div>
                <h2 style="text-align: center;">
                    @if(Session::has('contributor_batch_to_download'))
                        {{Session::get('contributor_batch_to_download')}}
                    @endif  {{trans('english.contributors_list')}}</h2>
            </div>
            <div class="dible-respgsive"  >
                 <table style=" border-collapse:collapse;" class="table table-bordered table-striped border-collapse" border=".1">
                   <thead>
                        <tr style="background-color: #0088CC">
                            <th style="width: 2%;">{{trans('english.id')}}</th>
                            <th style="width: 15%;">{{trans('english.user_name')}}</th>
                            <th style="width: 10%;">{{trans('english.phone')}}</th>
                            <th style="width: 13%;">{{trans('english.amount')}}</th>
                            <th style="width: 30%;">{{trans('english.purpose')}}</th>
                            <th style="width: 15%;">{{trans('english.reciever')}}</th>
                            <th style="width: 15%;">{{trans('english.date')}}</th>
                        </tr>

                        </thead>
                        <tbody> <?php $counter =0;$sum = 0;
                        ?>
                         @if(count($users)>0)

                            @foreach($users as $user)

                                    <?php $counter++; $sum += $user->amount*1; ?>
                                   <tr>
                                    <td style="width: 2%;">{{ $counter }}</td>
                                    <td style="width: 15%;">{{ $user->first_name }}  {{ $user->last_name  }}</td>
                                    <td style="width: 10%;">{{ $user->phone  }}</td>
                                    <td style="width: 13%;">{{ $user->amount }} FCFA</td>
                                    <td style="width: 30%;">{{ $user->purpose }}</td>
                                    <td style="width: 15%;">
                                       <?php $receiver = \App\AlumniMember::findOrFail($user->reciever_id); echo $receiver->first_name ." ". $receiver->last_name; ?>
                                    </td>
                                    <td style="width: 15%;">{{ $user->created_at }}</td>

                                  </tr>
                               @endforeach
                         @endif
                        </tbody>
                        <tfoot>
                        <tr  style="background-color: rgba(93, 156, 94, 0.36)">
                            <th colspan="3">{{trans('english.total_amount')}}</th>
                            <th colspan="4"  >{{  $sum }} FCFA</th>
                        </tr>
                        <tr style="background-color: #0088CC" >
                            <th colspan="3">{{trans('english.total_entries')}}</th>
                            <th colspan="4">{{ count($users) }}</th>
                        </tr>

                        </tfoot>
                     </table>
            </div><!-- /.box-body -->
           </div>
        </div>

