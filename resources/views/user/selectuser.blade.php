@extends('admin.content')
@section('content1')
    <div class="outer">
        <div class="center_rect">
            <div style="margin-left: 20%;">
                 {!! Form::open(['route'=>'select_user_cat', 'method'=>'post' ,'class'=>'form-inline','role'=>'form']) !!}
                  <div class="form-group pull-center">
                      <?php $roles = \App\Role::all();?>
                       <select name="sort" class="form form-control  input-lg">
                          <option >{{trans('english.user_category')}}</option>
                          @foreach($roles as $rol)
                          <option value={{$rol->role_id}}> {{$rol->name}}</option>
                          @endforeach
                       </select>
                  </div>
             &nbsp; &nbsp; &nbsp;
              {!! Form::submit('Get Users',['id'=>'register-submit', 'class'=>'btn btn-info pull-center']) !!}
             {!! Form::close() !!}
              <br>
            </div>
            <div class="dible-respgsive">
                @if(Session::has('user_restored'))
                    <div class="alert alert-info" style="text-align: center;">
                        {{Session::get('user_restored')}}
                    </div>
                @endif
                @if(count($users)>0)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr style="background-color: #0088CC">
                            <th style="width: 5%;">{{trans('english.id')}}</th>
                            <th style="width: 25%;">{{trans('english.user_name')}}</th>
                            <th style="width: 20%;">{{trans('english.email')}}</th>
                            <th style="width: 15%;">{{trans('english.phone')}}</th>
                            <th style="width: 10%;">{{trans('english.suspend')}}</th>
                            <th style="width: 10%;">{{trans('english.edit')}}</th>
                        </tr>
                        </thead>
                        <tbody> <?php $counter =0; ?>
                        @foreach($users as $user)
                            <?php $counter++;  ?>
                        <tr>
                            <td  hidden name="user_id">{{ $user->user_id }}</td>
                            <td style="width: 5%;">{{ $counter }}</td>
                            <td style="width: 25%;">{{ $user->first_name }}  {{ $user->last_name  }}</td>
                            <td style="width: 20%;">{{ $user->email  }}</td>
                            <td style="width: 15%;">{{ $user->phone  }}</td>
                            @if($user->state ==1)
                                <td style="width: 10%;"><a href="{{URL::to('users/'.$user->user_id)}}" class="btn btn-warning"><span><i class="fa fa-trash"></i> </span>{{trans('english.suspend_user')}}</a></td>
                            @else
                                <td style="width: 10%;"><a href="{{URL::to('users/suspend/'.$user->user_id)}}" class="btn btn-success"><span><i class="fa fa-trash"></i> </span>{{trans('english.restore_user')}}</a></td>
                            @endif
                            <td style="width: 10%;"><a href="{{URL::to('/users/profile/update/'.$user->user_id)}}" class="btn btn-success"><span><i class="fa fa-edit"></i> </span>{{trans('english.edit') }}</a></td>

                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr style="background-color: #0088CC" >
                            <th colspan="4">{{trans('english.total_entries')}}</th>
                            <th colspan="2">{{ count($users) }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="pagination">
                        {!! $users->render() !!}
                    </div>
                @else
                    <div class="alert alert-info" style="height: 80px;">
                        <h3 style="text-align: center; ">{{trans('english.no_user_of_category')}}</h3>
                    </div>
                @endif
            </div><!-- /.box-body -->
           </div>
        </div>
    <script>
        $("#priv_1").addClass('active');
        $("#subpriv_2").css('background-color','skyblue');
        $('div.alert').not('.alert-important').delay(20000).slideUp(500);

    </script>
@stop