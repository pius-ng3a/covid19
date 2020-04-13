@extends('master')
@section("header")
@include("header")
@include("partials.menuItem1")

@include("headerpart2")

@endsection

@section('content')
        <div class="wrapper row1">
            <div id="container" class="clear" style="background-color: white;">
                <div class="col-md-3"></div>
               <div id="content" class="col-md-8">
                   <h3 style=" background-color:red; text-align: center;margin-top: 2%;"> {{$event->event_name}}</h3>
                   <div class="row" style="color: orangered;padding-left: 5%;padding-right: 5%;">
                       <div class="col-md-4">
                           <p style="float: left;" ><i>{{trans('english.when')." : "}}</i></p>
                       </div>
                       <div class="col-md-4">
                           <p style="text-align: left;" ><i> <?php echo date("d",strtotime($event->date)); echo "  "; echo date("M",strtotime($event->date)); echo " , "; echo date("Y",strtotime($event->date));
                               ?></i> </p>
                       </div>
                   </div>
                   <div class="row" style="margin-bottom: 5%;color:#c0a16b;padding-left: 5%;padding-right: 5%;">
                       <div class="col-md-4">
                           <p style="float: left; " ><i>{{trans('english.venue')." : "}}</i></p>
                       </div>
                       <div class="col-md-4">
                           <i><p style="text-align: left;" > {{$event->venue}}</i></p>
                       </div>
                   </div>
                   <div class="row" style="padding-left: 5%;padding-right: 5%; margin-top: -3%;">
                       {{$event->description}}
                   </div>
                  <?php $other_events = \App\Event::getOtherOpenEventsExceptCurrentEvent($event->event_id) ; ?>
                  @if(count($other_events)>0)
                       <div class="row" >
                           <h4 style="background-color: rgba(255, 196, 81, 0.55);margin-left: 2%;margin-right: 1%; collapse: black; text-align: center; margin-top: 2%;">{{trans('english.upcoming_events')}}</h4>

                       @foreach($other_events as $even)

                            <div class="col-md-12">
                                <div style="background-color: lightgrey; border: solid black 1px; padding-left: 2%;margin-right: -2%; padding-top: -21%;padding-bottom: .1%;">
                                    <div style="height: 5%;background-color:lightgrey; padding-top: 1%; padding-bottom: 1%;margin-top: 1px;margin-bottom: 1px; border-radius: 7px;animation: blinker 5s linear infinite; ">
                                        <p style="color:#99cb84; text-align: center;width: 100%; "><i><span style=" color:black; text-transform: capitalize;"><strong>{{$event->event_name}}</strong></span></i><br /></p>
                                    </div>
                                    <div >
                                        <p><span style="text-transform:capitalize;color:black; color: #BE5C00;"> {{trans('english.when') . " : "}}
                                                <?php echo date("d",strtotime($event->date)); echo "  "; echo date("M",strtotime($event->date)); echo " , "; echo date("Y",strtotime($event->date));
                                                ?> </span><br/>
                                            <span style="text-transform:capitalize;color:black;  color:#c0a16b ;"> {{trans('english.venue') . " : "  . $event->venue}}</span><br/>
                                        </p>
                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 600px;"> {{ $event->description }}</p>
                                        <span class="readmore"> <a target="__blank" href="{{URL::to('/event/get/full/event/description/'.$even->event_id)}}">Read The Full Story &raquo;</a></span></p>
                                    </div>
                                </div>
                            </div>

                       @endforeach
                       </div>
                  @endif
               </div>
              <div class="col-md-3"></div>

            </div>

            <hr/>

        </div> <br/>
<?php ?>

        <!-- Homepage Specific -->
<script type="text/javascript" src="{{URL::asset('js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.timers.1.2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.galleryview.2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.galleryview.setup.js')}}"></script>
<!-- / Homepage Specific -->
@endsection


@section("footer")
    @include("footer")
@endsection