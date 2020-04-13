<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Sales;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;
use App\Event;

class EventController extends Controller
{


    public function getEventDetails($event_id){

        $event = Event::where('event_id','=',$event_id)->first();

        $Day = date("D",strtotime($event->date));
        $day = date("d",strtotime($event->date));
        $month =date("M",strtotime($event->date));
        $year = date("Y",strtotime($event->date));
        $view ='<div style="background-color: white; margin: 2%;padding: 10px;height:80%;"> <h3 class="blink_me event_header">'. $event->event_name.'</h3>
                    <p style="margin-left:31%;"><span style="color: orchid;text-transform: capitalize;"><i>'.trans('english.when').' : </i></span>
                    '.$Day.' '.$day.  '  '.$month. ' , '.$year.'</p>
                    <p style="color: darkcyan;tranformation: capitalize; margin-left:31%; " ><span style="color: goldenrod;text-transform: capitalize;"><i>'.trans('english.venue').' :  </i></span>'.$event->venue.'</p>

                   <p style="float:left; margin-left:31%;padding-right:15%;" >'.$event->description. '</p></div>';

        return $view;
    }
}
