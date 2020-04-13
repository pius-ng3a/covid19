@extends('master')
@section("header")
    @include("alumni.alumniheader")
    @include("alumni.viewContributionsMenu")
@endsection
@section('content')
    <div class="outer">
        <div class="center_rect" style="margin-left:40px;margin-right: 40px;">
            <div  class="row" >

                <div class="col-md-6 col-xs-9" style="margin-top: 60px;">
                    <div class="row">

                        {!! Form::open(['route'=>'mem_filter_contributors_batch','method'=>'POST']) !!}
                        @include('partials.encrypt_form_csrf')
                        <div class="row" style="text-align: center;margin-left: 30px;">
                            <div class="row">
                                @if(Session::has('select_msg'))
                                    <div class="alert alert-info">
                                        {{Session::get('select_msg')}}
                                        {{Session::forget('select_msg')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                 <label style="margin-left: -20px;padding-top: 5px; "><span>{{trans('english.batch_contr')}}</span></label>
                                <br>
                            </div>
                            <div class="col-md-6" style="text-align: center;margin-left: 30px;">
                                <?php $batch = \App\Contribution::getAllContributorsBatches();?>
                                <select style="margin-right: 0%;margin-left:-90px;width:200px;" name="batch_sort" class="form form-control ">
                                    <option value="none">{{trans('english.contri_batch')}}</option>
                                    @foreach($batch as $rol)
                                        <option value={{$rol->batch}}> {{$rol->batch}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1" style="text-align: center;margin-left: -150px;margin-top: -12px;">
                                <span> {!! Form::submit('Submit',['class'=>'btn btn-success','style'=>'border-radius:50px;margin-top:10px;margin-left: -30px;']) !!}</span>
                                <br>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
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
                            <th style="width: 10%;">{{trans('english.date')}}</th>
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
                                <td style="width: 10%;">{{$user->created_at }} </td>

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
        <!-- div containing items for the contact pop_up -->
    <div class="collapse row" style="background-color: inherit;height: .002%;text-align: center;visibility: hidden" >
        <div style="border: solid 1px black;visibility: hidden;height: .002%;" class="col-md-12 col-xs-12 col-lg-12">
            <h2 id="alu_scholarship_contribute" style="text-align: center;visibility: hidden"> {{trans("english.alu_scholarship_contribute")}}</h2>
            <p id="alu_scholarship_info" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_info")}}</p>
            <p id="alu_scholarship_account" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_account")}}</p>
            <p id="alu_scholarship_contact" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_contact")}}</p>
            <p id="alu_scholarship_benefactor" style="text-align: center;visibility: hidden">{{trans("english.alu_scholarship_benefactor")}}</p>
        </div>
        <div style="margin-left: 5%;height: .002%;" style="text-align: center;visibility: hidden">
            <div>
                <h3 style="visibility: hidden" id="signup">{{trans("english.signup")}}</h3>
            </div>
            <div id="save_benefactor">
                {!! Form::open(["route"=>"save_benefactor","files"=>true]) !!}
            </div>
            <div class="row" style="visibility: hidden;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-4"style="margin-top: 10px; " id="first_name">
                            {!! Form::label(trans("english.first_name")) !!}
                        </div>
                        <div class="col-sm-8" id="first_name1">
                            {!! Form::text("first_name",null,array( "placeholder"=>trans("english.first_name"),"tabindex"=>"4","required","class"=>"form form-control","style"=>"margin-top: 10px;margin-left:-20px;margin-bottom:30px;")) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"style="margin-top: 10px; " id="last_name">
                            {!! Form::label(trans("english.last_name")) !!}
                        </div>
                        <div class="col-sm-8" id="last_name1">
                            {!! Form::text("last_name",null,array( "placeholder"=>trans("english.last_name"),"tabindex"=>"4","required","class"=>"form form-control","style"=>"margin-top: 10px;margin-left:-20px;margin-bottom:30px;")) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"style="margin-top: 15px;" id="email">
                            {!! Form::label(trans("english.email")) !!}
                        </div>
                        <div class="col-sm-8" id="email1">
                            {!! Form::email("email","email@example.com",array( "placeholder"=>trans("english.email"),"tabindex"=>"4","class"=>"form form-control","style"=>"margin-top: 10px;margin-left:-20px;margin-bottom:30px;","required")) !!}
                        </div>
                    </div>
                    <span id="userpicture">{{trans("english.userpicture")}}</span>
                                               <span id="oldprofilepic"><input onclick="showImage(this)" type="file" value="79" id="profilePicFile" name="profilePicFile">
                                                </span>
                </div>
            </div>
            <div class="row"style="visibility: hidden;">
                <div class="col-sm-2"style="margin-top: 15px;" id="phone">
                    {!! Form::label(trans("english.phone")) !!}
                </div>
                <div class="col-sm-11" id="phone1">
                    {!! Form::text("phone",null,array("placeholder"=>trans("english.phone"),"tabindex"=>"4","class"=>"form form-control","style"=>"margin-top: 10px;margin-left:-20px;width:88%;margin-bottom:30px;","required")) !!}
                </div>
            </div>
            <div class="row" style="visibility: hidden;">
                <div class="col-sm-2"style="margin-top: 15px; " id="address">
                    {!! Form::label(trans("english.address")) !!}
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-11" style="margin-left: -15px;" id="address1">
                        {!! Form::text("address", null, array("class" => "form form-control","placeholder"=>trans("english.address"),"tabindex"=>"4",  "style"=>"margin-top: 10px;margin-left:-20px;")) !!}
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>
                <div>
                    <p id="passwordcheck2" style="color: red;margin-left: 20%;"></p>
                </div>
            </div>
            <div id="Register" style="visibility: hidden;">
                {!! Form::submit("Register",["id"=>"register-submit","class"=>"btn btn-primary","style"=>"margin-left:2%;width:50%; margin-bottom:5px;margin-top:40px;width:40%; border-radius: 18px; background:blue;"]) !!}
            </div>
            <div id="close_form" style="visibility: hidden;">
                {!! Form::close() !!}
            </div>
            <div id="error" style="visibility: hidden;">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div>



        </div>
    </div>

    <!-- script for Modal manipulation  starts-->

    <script>
        function closeModal(obj){
            $('.alu_modal_pop_up').hide();
        }
        function showScholarshipContributionDetails(obj){

            $('#alu_modal_content').html('<div class="row" style="background-color: inherit">' +
                    '<div style="border: solid 1px black;" class="col-md-12 col-xs-12 col-lg-12"> ' +
                    '<h2 style="text-align: center;">'
                    + $('#alu_scholarship_contribute').html()
                    + '</h2><p>'+$('#alu_scholarship_info').html()
                    +'</p><p>'+$('#alu_scholarship_account').html()
                    +'</p> <p>'+$('#alu_scholarship_contact').html()+'</p><p>'+
                    $('#alu_scholarship_benefactor').html()
                    +'</p></div><div style="margin-left: 5% ;text-align: center;">' +
                    '<div><h3 style="color: dodgerblue; text-align: center;">'
                    +$('#signup').html() +'</h3></div>'+
                    $('#save_benefactor').html() + '<div class="row"><div class="col-md-6">' +
                    '<div class="row"><div class="col-sm-4"style="margin-top: 10px; ">'
                    +$('#first_name').html()+'</div><div class="col-sm-8">'+
                    $('#first_name1').html()+'</div></div><div class="row">' +
                    '<div class="col-sm-4"style="margin-top: 10px; ">'+$('#last_name').html()+
                    '</div><div class="col-sm-8">'+$('#last_name1').html()+
                    '</div></div><div class="row"><div class="col-sm-4"style="margin-top: 15px; ">'+
                    $('#email').html()+'</div><div class="col-sm-8">'+
                    $('#email1').html()+'</div></div></div>' +
                    ' <div class="col-md-6" ><b ><img border="5" style="width:200px;height:150px; margin-left: -47%;" alt="140x140" id="pic" class="img-thumbnail" data-src="holder.js/140x140"  /></b></i>'+
                    '<span >' + $('#oldprofilepic').html() +
                    '</span>'+
                    '<label for="profilePicFile"> <span style="margin-left: -87%">'+$('#userpicture').html() +
                    '</span> * <span style="color:#ff0000;">Max Size(512Kb)</span></label></div>' +

                    '</div><div class="row"><div class="col-sm-2"style="margin-top: 15px; ">'+$('#phone').html()
                    +'</div><div class="col-sm-10">'+$('#phone1').html()
                    +'</div></div><div class="row"><div class="col-sm-2"style="margin-top: 15px; ">'+
                    $('#address').html()+'</div><div class="col-sm-10"><div class="col-sm-11" style="margin-left: -15px; ">'
                    +$('#address1').html()+'</div> <div class="col-sm-1"></div></div></div><div>'+$('#Register').html()+'</div>'+
                    $('#close_form').html()+ $('#error').html() + '</div><div></div></div>');
            $('#alu_modal_content').show();
            $('.alu_modal_pop_up').show();
        }
        function populateModal(obj,event_id){
            //alert($('#baseUrl').val()+"/event/get/full/event/description/"+event_id)
            $.ajax({
                type: "get",
                url: $('#baseUrl').val()+"/event/get/full/event/description/"+event_id,
                success: function (html) {
                    $("#alu_modal_content").html(html)
                    $(".modal_pop_up").show()
                },
                error: function (error) {
                    alert('Error from server')
                    console.log(error)
                }
            });
        }
        //reading image function
        function showImage(obj){
            $('#profilePicFile').change(function(){
                        readURL1(this);
                    }
            );
        }

        function readURL1(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }
        function supportLybexsa(obj){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }

        function showContactForm(obj ){
            var metaTags=document.getElementsByTagName("meta");

            var fbAppIdContent = "";
            for (var i = 0; i < metaTags.length; i++) {
                if (metaTags[i].getAttribute("property") == "token") {
                    fbAppIdContent = metaTags[i].getAttribute("content");
                    break;
                }
            }

            $("#alu_modal_content").html('<div class="mu-contact-content"> <div class="row"> <div class="col-md-6"><div class="mu-contact-left">'+
                    '<form method="post" action="'+$('#baseUrl').val()+'/new/message"'+'class="contactform">'+
                    '<input type="hidden" value="'+ fbAppIdContent +'" name="_token"><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>'+
                    '<input class="form form-control" type="text" required="required" size="20" value="" name="author"></p><p class="comment-form-email">'+
                    '<label for="email">Email <span class="required">*</span></label> <input type="email" size="20" class="form form-control" required="required" aria-required="true" value="" name="email">'+
                    '</p><p class="comment-form-url"><label for="subject">Subject</label> <input type="text" size="20" margin-right="-50px" name="subject" class="form form-control"> </p> <p class="comment-form-comment">'+
                    '<label for="comment">Message</label><textarea style="height:80px;width: 100%;" required="required" aria-required="true" rows="8" cols="45" name="comment"></textarea>  </p><p class="form-submit">'+
                    '<input style="margin-left: 70%;background-color: green" type="submit" value="Send Message" class="mu-post-btn" name="submit"></p></form></div></div><div class="col-md-6"><div class="mu-contact-right"><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d6249.345033302234!2d-80.02791918555701!3d40.45935344513505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x8834f411a7b748bd%3A0xaec8197db3de9a9e!2sCalifornia-Kirkbride%2C+Pittsburgh%2C+PA%2C+USA!3m2!1d40.4600435!2d-80.0213538!5e0!3m2!1sen!2sbd!4v1464270878470" width="100%" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>'+
                    '</div></div></div></div>')

            $(".alu_modal_pop_up").show()

        }

    </script>

    <!-- script for Modal manipulation  ends-->
@section("footer")
    @include("alumni.alumnifooter")
@endsection