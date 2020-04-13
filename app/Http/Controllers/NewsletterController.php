<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Newslettersubscriber;
use Auth;
use Input;
use Mail;
use DB;
use App\Sentnewsletter;
use Pagination;


class NewsletterController extends Controller
{
    use CheckAllowedPrivileges; // this is trait whose methods are used by this class
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct(){
        $this->middleware('newsletter',['except'=>["save_newsletters_subscription","verify_newslettermail","get_all_subscribersOfCategory","newsletterSubscription"]]);
    }

    public function index()
    {
            if($this->checkRevokedSubPrivilege(Auth::user()->user_id,25)){
                return "Unauthorized!! You no longer have this privilege.";
            }
            return view('newsletter.sendnewsletter');
    }

    /**
     * Newsletter sending is done only by site administrator.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendnewsletter(Request $request)
    {
        if ($this->checkRevokedSubPrivilege(Auth::user()->user_id, 25)) {
            return "Unauthorized!! You no longer have this privilege.";
        }
        else {
            $role_id = $request->role_id;
            $total_user = $request->total_user;
            $data['msg'] = $message = $request->message;
            $subject = $request->subject;
            $data['subject'] = $subject;
            if ($role_id == 100) {
                $users = DB::table('newslettersubscribers')->select('email', 'state')->where('state', 1)->where('user_id', 100)->limit($total_user)->get();
            } elseif ($role_id == 50) {
                $users = DB::table('newslettersubscribers')->select('email', 'state')->where('state', 1)->limit($total_user)->get();
            } else {
                $users = DB::select(DB::raw("
              SELECT user_id,state FROM newslettersubscribers  WHERE user_id IN (SELECT user_id FROM users WHERE role_id=$role_id)
              AND state=1
             ")); /*uses limit here oh*/
            }
            $receivers_email = " ";
            foreach ($users as $user) {
                $email = $user->email;
                if (
                Mail::send('newsletter.letters', $data, function ($msge) use ($email, $subject) {
                    $msge->to($email, $email)->subject($subject);

                })
                ) {
                    $receivers_email .= ' ' . $email;
                }

            }
            $new_messages = new Sentnewsletter();
            $new_messages->user_type = $request->role_id;;
            $new_messages->message = $message;
            $new_messages->subject = $subject;
            $new_messages->total_users = $total_user;
            $new_messages->emails = $receivers_email;
            $new_messages->user_id = Auth::user()->user_id;
            $new_messages->save();
            \Session::flash('newsletter_success', trans('english.newsletter_success'));
            return \Redirect::back();
        }
        return "404  unauthorised action";
    }

    /** function checks if request if from a registered user
     * registered user's email is saved and validated in newsletters table.
     * subscription form is displayed to Unregistered members to subscribe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function newsletterSubscription()
    {
        if(Auth::user()){
            $subscribed_users = Newslettersubscriber::all(['email','user_id']);
            foreach($subscribed_users as $sub){
                if($sub->email == Auth::user()->email ){
                    if($sub->user_id != (Auth::user()->user_id)){ /*if user had subscribed before signup change his user id*/
                        $sub->user_id = Auth::user()->user_id;
                        $sub->save();
                    }
                    \Session::flash('subcription_success',trans('english.subcription_success1'));
                    return  \Redirect::back();
                }
            }
            $subscriber = new Newslettersubscriber();
            $subscriber->email = Auth::user()->email;
            $subscriber->user_id = Auth::user()->user_id;
            $subscriber->state = 1;
            $subscriber->phone = Auth::user()->phone;
            $subscriber->save();
            \Session::flash('subcription_success',trans('english.subscription_success'));
            return \Redirect::back();
        }
        else{
            return view('newsletter.newslettersubscribe');
        }
    }

    /**function checks if user is already subscribed and saves the email
     * then sends a request for email verification
     * @param Request $request
     * @return mixed
     */
    public function save_newsletters_subscription(Request $request)
    {
        $subscribed_users = Newslettersubscriber::all('email');
        foreach($subscribed_users as $sub){
            if($sub->email == $request->email){
                \Session::flash('subcription_success',trans('english.subcription_success1'));
                return \Redirect::back();
            }
        }
        $confirmed_code = rand(2,2000);
        $subscriber = new Newslettersubscriber();
        $subscriber->email = $email=$request->email;
        $subscriber->user_id = 100;
        $subscriber->state = 0;
        $subscriber->phone = $request->phone;
        $subscriber->v_code = $confirmed_code;
        $subscriber->save();
        $data['msg']= trans('english.msg_letter');
        $data['confirmation_code']=$confirmed_code;
        Mail::send('newsletter.verifyemail',$data, function($message) use ($email){
            $message->to($email)->subject('Verify your Account for go-orderDeliver');
        });
        \Session::flash('subcription_success',trans('english.subscription_success'));
        return \Redirect::back();
    }
    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function get_newsletters_sent()
    {
        if ($this->checkRevokedSubPrivilege(Auth::user()->user_id, 27)) {
            return "Unauthorized!! You no longer have this privilege.";
        }
        else{
            $sentletters = DB::table('sentnewsletters')
                ->join('users', 'users.user_id', '=', 'sentnewsletters.user_id')
                ->select('users.user_id','users.first_name','users.last_name', 'sentnewsletters.*')->paginate(30);
            $path = '/dashboard/sent/newsletter';
            $sentletters->setPath($path);
            return view('newsletter.sentletters',compact('sentletters'));
        }
        return \Redirect::to('/');
    }

    /**select letters sent by a particular administrator
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_individual_letter( Request $request)
    {
        if ($this->checkRevokedSubPrivilege(Auth::user()->user_id, 27)) {
            return "Unauthorized!! You no longer have this privilege.";
        }
        $user_id = $request->user_id;
        $sentletters = DB::table('sentnewsletters')
            ->join('users', 'users.user_id', '=', 'sentnewsletters.user_id')
            ->select('users.user_id','users.first_name','users.last_name', 'sentnewsletters.*')->where('sentnewsletters.user_id',$user_id)
            ->paginate(30);
        $path = '/dashboard/sent/newsletter';
            $sentletters->setPath($path);
        return view('newsletter.sentletters',compact('sentletters'));
    }
    /**this method verifies emails of users who subscribed to newsletter update
     * and changes the state to 1 so email can receive letters
     * @param $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verify_newslettermail($code)
    {
        $confirm = Newslettersubscriber::where('v_code',$code)->first();
        if($confirm){
            $confirm->state = 1;
            $confirm->v_code=' ';
            $confirm->save();
            $verification_success = trans('english.verification_success');
            return view('index',compact('verification_success'));
        }
        $notice = "You delayed to verify your mail. Kindly repeat subscription process!";
        return view('emails.confirmed',compact('notice'));
    }

    /** gets the total number of valid subscribers of a given category and returns it
     * @return int
     */
    public function get_all_subscribersOfCategory(){
        $role_id = Input::get('role_id');
        if($role_id==100){ /*picks valid subscribers who are visitors to site*/
           $number = DB::table('newslettersubscribers')->select('*')->where('user_id',$role_id)->where('state',1)->count();
            return $number;
        }
        elseif($role_id == 50){ /*picks all valid subscribers*/
            $number = DB::table('newslettersubscribers')->select('*')->where('state',1)->count();
            return $number;
        }
        else{
              /*pick a category of valid subscribers based on user role */
             $number = DB::select(DB::raw("
              SELECT user_id,state FROM newslettersubscribers WHERE user_id IN (SELECT user_id FROM users WHERE role_id=$role_id)
              AND state=1
             "));
            return  count($number);
        }
    }
}
