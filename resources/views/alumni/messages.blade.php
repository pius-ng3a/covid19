@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect">
            @if(count($users)>0)
                <div class="dible-respgsive" id="contributorsBody">
                     <table id="example1" class="table table-bordered table-striped">

                            <div>
                                <h2 style="text-align: center;">{{trans('english.messages')}}</h2>
                            </div>
                            <thead>
                            <tr style="background-color: #0088CC">
                                <th style="width: 2%;">{{trans('english.id')}}</th>
                                <th style="width: 15%;">{{trans('english.sender')}}</th>
                                <th style="width: 10%;">{{trans('english.subject')}}</th>
                                <th style="width: 15%;">{{trans('english.read')}}</th>
                            </tr>
                            </thead>
                            <tbody> <?php $counter =0;

                            ?>
                                @foreach($users as $user)
                                    <?php $counter++; ?>

                                   <tr>
                                    <td style="width: 5%;">{{ $counter }}</td>
                                    <td style="width: 20%;">{{ $user->author }}</td>
                                    <td style="width: 60%;">{{ $user->subject  }}</td>
                                    <td style="width: 15%;"><button type="button" class="btn btn-success" onclick="populateModal(this,{{$user->contact_message_id}})"><span><i class="fa fa-eye"></i> </span>{{trans('english.read') }}</button></td>

                                  </tr>

                               @endforeach

                            </tbody>
                            <tfoot>
                            <tr style="background-color: #0088CC" >
                                <th colspan="3">{{trans('english.total_entries')}}</th>
                                <th colspan="4">{{ count($users) }}</th>
                            </tr>

                            </tfoot>
                         </table>
                     </div>
                     <div class="pagination">
                         @if(count($users)>0)
                           {!! $users->render() !!}
                         @endif
                     </div>
                </div><!-- /.box-body -->
            @else
                <div class="alert alert-info">
                     <p>{{trans('english.no_msg')}}</p>
                </div>
            @endif
           </div>
        </div>
    <div class="modal_pop_up">
        <div class="modal-content">
            <span class="close" onclick="closeModal(this)">x</span>
            <div id="modal_content">Some text in the Modal..</div>
        </div>
    </div>
    <script>
        $('div.alert').not('.alert-important').delay(20000).slideUp(500);
        function closeModal(obj){
            $('.modal_pop_up').hide();
        }
        function populateModal(obj,event_id){
            //alert($('#baseUrl').val()+"/event/get/full/event/description/"+event_id)
            $.ajax({
                type: "get",
                url: $('#baseUrl').val()+"/get/unread/message/"+event_id,
                success: function (html) {
                    $("#modal_content").html(html)
                    $(".modal_pop_up").show()
                },
                error: function (error) {
                    alert('Error from server')
                    console.log(error)
                }
            });
        }
    </script>
@stop