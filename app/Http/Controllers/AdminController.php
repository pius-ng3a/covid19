<?php

namespace App\Http\Controllers;

use App\AlumniMember;
use App\Event;
use App\Portfolio;
use App\Center;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Sales;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
USE Input;
use App\Attendance;
use App\Contribution;
use Pagination;

use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    use CheckAllowedPrivileges; // this is trait whose methods are used by this class

    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function manage()
    {
       return view('admin.admindashboard');
    }

   /* public function adminmanage()
    {
        return view('admin/admindashboard');
    }*/
    public function showusers()
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->userId,9)){
            return trans('english.privilege_revoked');
        }
        // $users = DB::select(DB::raw('SELECT * FROM users ORDER BY created_at, updated_at ASC '));
        $users=AlumniMember::getAlumniMembers();
        if(count($users)>0){
            return view('user.selectuser')->with('users',$users);
        }
        else{
            return \Redirect::back()->whith('message', 'No rigistered users!!');
        }
    }

    public function showPatients()
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->userId,9)){
            return trans('english.privilege_revoked');
        }
        // $users = DB::select(DB::raw('SELECT * FROM users ORDER BY created_at, updated_at ASC '));
        $users=AlumniMember::getAlumniMembers();
        if(count($users)>0){
            return view('user.selectuser')->with('users',$users);
        }
        else{
            return \Redirect::back()->whith('message', 'No rigistered users!!');
        }
    }


    /*managing users*/
    public function deleteUser()
    {
        //return view('admin/dashboard');
        return "hello man";
    }
    public function deleteShop()
    {
        // return view('admin/dashboard');
        return 'we saw it too';
    }
    public function addAdmin()
    {
        if(Auth::user() && $this->checkRevokedSubPrivilege(Auth::user()->userId,10)){
            return trans('english.privilege_revoked');
        }
        /*$user -> user_id = "YOUR ID";
        $user -> email = "YOUR@email.com";
        $user -> save();
        */
        return view('admin/addadmin');
        // return view('admin/dashboard');

    }

    /**
     * @param Request $request
     * @return string
     * this updates a user as an admin by changing the user role to 1
     */
    public function updateUserAsAdmin(Request $request)
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->alumni_id,4)){
            return trans('english.privilege_revoked');
        }
        if($request->user_id >0){

            $password= Hash::make(Input::get('password'));
            $portfolio = new User();
            $portfolio->alumni_id = $request->user_id;
            $portfolio->role_id = $request->role_id;
            $portfolio->reign = $request->reign;
            $portfolio->password = $password;
            $portfolio->username = $request->username;

            $portfolio->save();

            \Session::flash('admin_set',trans('english.admin_set'));
        }
        return Redirect::back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * create new user with role as administrator. Only an admin can create such user
     */
    public function saveNewAdminDetails(Request $request)
    {
        //$input = $request->get('user_name');
        $password= Hash::make($request->input('password'));
        $user= new User;
        /*$user->confirmation_code  = $confirmation_code =str_random(10);*/
        $user->password = $password;
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->role_id = $request->input('role_id');
        $user->quarter_id =$request->input('quarter_id');
        $code = rand(2000,5000);
        $user->confirmed = 1;
        $user->save();
        /*$data['msg']= trans('english.confirm_email_msg');
        $data['confirmation_code'] = $code;
        $user->confirmation_code = $code;
        Mail::send('emails.verify',$data, function($message) {
            $message->to(Input::get('email'), Input::get('first_name'))
                ->subject('Verify your email address');
        });*/
        //User::create($request->all());
        \Session::flash('admin_creation_success',trans('english.admin_creation_success'));
        return Redirect::back();
    }
    public function sortUsers(Request $request){

        $user_type=$request->get('sort');

        $sort=AlumniMember::where('role_id',$user_type)->orderBy('created_at','desc')->paginate(40);

        return view('user.selectuser')->with('users',$sort);
    }

    public function generateReport()
    {
        //return view('admin/dashboard');
    }
    public function getsalesPerShop()
    {
        return view('sales.salespershop');
        //return view('admin/dashboard');
    }
    /*managing users*/

    /**



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *
     *
     */
    public function destroy($id)
    {
       // $user_id=Route::input('user_id');
        //dd('this is dengun');
        $user=AlumniMember::findOrNew($id);
        $first_name=$user->first_name;
        $user->state=0;
        $user->save();
        \Session::flash("user_restored",trans('english.user_suspend_success'));
        return Redirect::back();

    }
    public function restoreUser($id)
    {
       // $user_id=Route::input('user_id');
        //dd('this is dengun');
        $user=AlumniMember::findOrNew($id);
        $user->state=1;
        $user->save();
        \Session::flash("user_restored",trans('english.user_restored_success'));
        return Redirect::back();

    }

    public function createEvent( )
    {
      return view('events.createEvent');


    }
    public function createCenter( )
    {
      return view('centers.createCenter');
    }
    public function storeNewCenter(Request $request){
      $center = new Center();
      $center->SiteName = $request->get('SiteName');
      $center->Latitude = $request->get('Latitude');
      $center->Longitude = $request->get('Longitude');
      $center->Province = $request->get('Province');
      $center->District = $request->get('District');
      $center->Sector = $request->get('Sector');
      $center->emmergencyEmail = $request->get('emmergencyEmail');
      $center->EmmergencyPhone = $request->get('EmmergencyPhone');
      $center->SiteType = $request->get('SiteType');
      $center->save();
      \Session::flash('success',trans('english.event_success'));
      return view('centers.createCenter');
    }
    public function showRegisteredPatients(){
      return view('patients.viewPatient');
    }
    public function storeNewEvent(Request $request )
    {
      $event = new Event();
      $event->event_name = $request->get('event_name');
      $event->venue = $request->get('venue');
      $event->date = $request->get('event_date');
      $event->description = $request->get('description');
      $event->start_time = $request->get('start_time');
      $event->user_id = Auth::user()->alumni_id;
      $event->save();
      \Session::flash('success',trans('english.event_success'));
      return view('events.createEvent');

    }
    public function viewEvents( )
    {
        return view('events.viewEvents');

    }
    public function toggleEvent($event_id )
    {

       $event = Event::findOrFail($event_id);
        if($event->state==1){
            $event->state =0;
        }else{
            $event->state =1;
        }
        $event->update();
        Session::flash('success',trans('english.event_toggle_success'));
        return Redirect::back();
    }
     public function editEvent($event_id )
        {

           $event = Event::findOrFail($event_id);
            return view('events.updateEvent',compact('event'));
    }
    public function saveEventUpdate( Request $request )
        {

            $event = Event::findOrFail($request->event_id);
            $event->state = $request->state;
            $event->event_name = $request->event_name;
            $event->description = $request->description;
            $event->venue = $request->venue;
            $event->date = $request->event_date;
            $event->start_time = $request->start_time;
            $event->update();
            Session::flash('success',trans('english.event_update_success'));
            return Redirect::back();
    }

}
