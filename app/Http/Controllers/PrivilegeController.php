<?php

namespace App\Http\Controllers;

use App\DuePay;
use App\Privilege;
use App\Revoke_privilege;
use App\Role_has_privilege;
use App\SalariedWorker;
use App\Salary;
use App\SubPrivilege;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Role;
use DB;
use Auth;
use Input;


class PrivilegeController extends Controller
{
    use CheckAllowedPrivileges; // this is trait whose methods are used by this class
    /**
     * middlewares checks for assigned privilege to manage privileges
     */
    public function __construct(){
        $this->middleware('privilege');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_salary(){
        return view('account.changesalary');
    }
    public function save_salary_change(){
        $user_id = Input::get('user_id');
        $user = SalariedWorker::where('user_id','=',$user_id)->first();
        if($user){
            $user->salary = Input::get('new_salary');
            $user->update();
            \Session::flash('success',trans('english.salary_changed'));
            return \Redirect::to('dashboard/admin/modify/worker');
        }
        $newSalariedWorker = new SalariedWorker();
        $newSalariedWorker->user_id = $user_id;
        $newSalariedWorker->salary =  Input::get('new_salary');
        $newSalariedWorker->project_id = 1;
        $newSalariedWorker->save();
        \Session::flash('success',trans('english.salary_worker_created'));
        return \Redirect::to('dashboard/admin/modify/worker');
    }
    public function create_subprivilege()
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->user_id,16)){
            return " ".trans('english.privilege_revoked')." ";
        }
        $privilege= $this::getPrivileges();
        $result='';
        foreach($privilege as $privi){
            $result .= '<option value='.$privi->privilege_id.'>'.$privi->name.'</option>';

        }
        return view('privilege.subprivilge',compact('result'));
    }
    public static function getPrivileges(){
        $priv= Privilege::all();
        return $priv;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->checkRevokedSubPrivilege(Input::get('user_id'),14)){
            return " ".trans('english.privilege_revoked')." ";
        }
        return view('privilege.createprivilege');
    }
    /*
     * revoke a privilege from a user
     * */
    public function revoke_privilege()
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->user_id,15)){
            return " ".trans('english.privilege_revoked')." ";
        }
        $priv  = Privilege::getAllPrivileges();
        $users = User::getAllUsers();
        return view('privilege.revokeprivilege',compact('users','priv'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * change the state of salary subprivilege and makes it inaccessible for
     * users
     */
    public function activateDeactivateSalary()
    {
        if($this->checkRevokedSubPrivilege(Auth::user()->user_id,25)){
            return " ".trans('english.privilege_revoked')." ";
        }

        return view('admin.togglesalary');


    }
    public function togglePayout(){
        $sucess = '';
        $status = Input::get('salary_state');
        $priv  = SubPrivilege::findOrFail(9);
        $arrears1  = SubPrivilege::findOrFail(49);
        if(isset($status)){
            //populate due pay table here if the last entry for a salaried worker is at least 25 days old
            /*$data = DB::table('table_name')
                ->select(DB::raw('MONTH(record_date) as m, YEAR(record_date) as y, SUM(amount) as t'))
                ->whereRaw('record_date > DATE_SUB(now(), INTERVAL 6 MONTH)')
                ->groupBy(DB::raw('YEAR(record_date), MONTH(created_at)'))
                ->get();*/
           $last_due_pay_recorded  = DB::table('due_pay')
                                    ->select(DB::raw('MONTH(created_at) as m, YEAR(created_at) as y'))
                                    ->whereRaw('(created_at - DATE_SUB(now(),INTERVAL 24 DAY)) >0')
                                    ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))->get();


            if(count($last_due_pay_recorded)>0){

            }else{
                $salaried_workers = SalariedWorker::getAllSalariedWorkers();
                foreach($salaried_workers as $salaried){
                    $new_due_pay = new DuePay();
                    $new_due_pay->user_id = $salaried->user_id;
                    $new_due_pay->regular_pay = $salaried->salary;
                    $overtime = Salary::getOvertime($salaried->user_id);
                    if(count($overtime)>0){
                        $new_due_pay->overtime_pay = $overtime->overtime_pay;

                    }
                    else{
                        $new_due_pay->overtime_pay = 0;

                    }
                    $new_due_pay->month_end = Carbon::now();
                    $new_due_pay->save();
                }

                //record pay for none salaried workers
                $waged_workers_ids = Salary::getAllNoneSalariedWorkersID();
                foreach($waged_workers_ids as $user){
                    $new_for_waged = new DuePay();
                    $new_for_waged ->user_id = $user->user_id;

                    $wage = Salary::getWagedWorkersUnpaidSalaryByID($user->user_id);
                    $days_worked=0;
                    if(count($wage)>0){

                        $new_for_waged ->regular_pay = $wage->amount_worked;
                        $days_worked = $wage->days_worked;
                    }
                    else{
                        $new_for_waged ->regular_pay = 0;
                    }

                    $overtime = Salary::getOvertime($user->user_id);
                    if(count($overtime)>0){
                        $new_for_waged ->overtime_pay = $overtime->overtime_pay;

                    }
                    else{
                        $new_for_waged ->overtime_pay = 0;

                    }
                    if($new_for_waged->regular_pay>0){
                        $new_for_waged->month_end = Carbon::now();
                        $new_for_waged->save();
                    }
                    elseif($new_for_waged->overtime_pay >0){
                        $new_for_waged->month_end = Carbon::now();
                        $new_for_waged->save();

                    }
                }
            }


            $priv->state =1;
            $arrears1->state =1;
            $sucess .= trans('english.payout_activated');
        }else{
            $priv->state =0;
            $arrears1->state =0;
            $sucess .= trans('english.payout_deactivated');
        }
        $sucess .= '';
        $priv->save();
        $arrears1->save();
        \Session::flash('success',$sucess);
        return \Redirect::back();
    }

    /*
     * method selects users who have been revoked a privilege and returns a view
     * with the users and all privileges that have been revoke for any users
     * */
    public function grantPrivilege(){
        if($this->checkRevokedSubPrivilege(Input::get("user_id"),18)){
            return " ".trans('english.privilege_revoked')." ";
        }
        $user = User::getUsersWithRevokedPrivileges();
        $priv  = Privilege::getRevokedPrivileges();

        return view('privilege.grantprivilege',compact('user','priv'));
    }

    /*@param - req
     cancels revoked privilege
    * allows user to perform action again
     * restores user privilege in the database
    */
    public function grant_privilege(Request $request){
        $revoke =Revoke_privilege::where('user_id',$request->user_id)
             ->where('privilege_id',$request->privilege_id)->where('state',1)->first();
        if(count($revoke)>0){
            $revoke->state = 0;
            $revoke->save();
           /* Revoke_privilege::where('user_id',$request->user_id)
        ->where('privilege_id',$request->privilege_id)->first()->delete();
       */
        \Session::flash('success',trans('english.grant_success'));
        return Redirect::back();
        }else{
            \Session::flash('grant_success','User has never been revoked the specified privilege');
            return Redirect::back();
        }

    }

    public function revoke_privilege_save(Request $request)
    {
        $revoked_privileges = Revoke_privilege::where("privilege_id",$request->privilege_id)
            ->where('user_id',$request->user_id)->first();
        if(count($revoked_privileges)>0){
            $revoked_privileges->state = 1;
            $revoked_privileges->reason= $request->reason;
            $revoked_privileges->save();
            \Session::flash('revoke_success',trans('english.revoke_success'));
            return Redirect::back();
        }
        $privilege_revoke = new Revoke_privilege();
        $privilege_revoke->privilege_id = $request->privilege_id;
        $privilege_revoke->user_id = $request->user_id;
        $privilege_revoke->state = 1;
        $privilege_revoke->reason= $request->reason;
        $privilege_revoke->save();
        \Session::flash('revoke_success',trans('english.revoke_success'));
        return Redirect::back();
    }
    /*methode to assign privilege to user type
    *A privilege is assigned to a role and not a particular individual
     * */
    public function assignPrivilege(){
        if($this->checkRevokedSubPrivilege(Auth::user()->user_id,28)){
            return " ".trans('english.privilege_revoked')." ";
        }
        $types = Role::getAllRoles();
        $priv  = Privilege::getAllPrivileges();
        return view('privilege.assignprivilege',compact('priv','types'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * method strips a user category of a particular privilege
     */
    public function unasign_privilege(){
        $types = Role::getAllRoles();
        $priv  = Privilege::getAllPrivileges();
        return view('privilege.unassignprivilege',compact('priv','types'));
    }
    public function save_unasigned_privilege(){
        $role_id = Input::get('role_id');
        $privilege_id = Input::get('privilege_id');
        Role_has_privilege::where('role_id',$role_id)->where('privilege_id',$privilege_id)->delete();
        \Session::flash('role_unassigned',trans('english.role_unassigned'));
        return Redirect::back();


        return view('privilege.unassignprivilege',compact('priv','types'));
    }
    public function addUserCategory(Request $request)

    {
        $roles = Role::all();
        foreach ($roles as $role ) {
            if(strtolower($role->name) == strtolower($request->name)){
                \Session::flash('role_created','Roles  '.$request->name."  already exists");
                return Redirect::back();
            }
        }

        $new_role = new Role();
        $new_role->name = $request->name;
        $new_role->save();
        \Session::flash('role_created',trans('english.role_created'));
        return Redirect::back();


    }


    public function save_assignPrivilege(Request $request){

        $privileges= Role_has_privilege::select('privilege_id')->where('role_id',$request->role_id)->get();
        foreach($privileges as $priv){
            if($priv->privilege_id == $request->privilege_id){
                \Session::flash('assign_success',trans('english.privilege_already_assigned'));
                return Redirect::back();
            }
        }
        $new_privilege = new Role_has_privilege();
        $new_privilege->privilege_id= $request->privilege_id;
        $new_privilege->role_id = $request->role_id;
        $new_privilege->save();
        \Session::flash('assign_success',trans('english.assign_privilege_success'));
        return Redirect::back();

    }

    public function save_subprivilege(Request $request){
        $subpriv = new Sub_privilege();
        $subpriv->privilege_id= $request->privilege_id;
        $subpriv->name = $request->name;
        $subpriv->action = $request->action;
        $subpriv->state = 1;
        $subpriv->save();
        \Session::flash('sub_privilege',trans('english.sub_privilege'));
        return Redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $privilege = new Privilege();
        $privilege->name = $request->name;
        $privilege->action= $request->action;
        $privilege->save();
        return Redirect::back()->with('privilege_success',trans('english.privilege_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_users_with_aprivilege()
    {

        $privilege_id = Input::get('privilege_id');
        $users = DB::select(DB::raw("SELECT * from users  WHERE users.role_id
                IN ( SELECT roles_has_privileges.role_id FROM roles_has_privileges
                     WHERE roles_has_privileges.privilege_id=$privilege_id)AND users.user_id NOT IN
                     (SELECT revoke_privileges.user_id FROM revoke_privileges WHERE revoke_privileges.privilege_id=$privilege_id
                     AND revoke_privileges.state=1)
                     ORDER BY users.user_id ASC
                     "));
        $options="<option value='none'>Select user</option>";
        foreach($users as $user){
            $options .= "<option value=". $user->user_id.">".$user->first_name." ".$user->last_name. "</option>";
        }

        return $options;
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
    public function update(Request $request, $id)
    {
        //
    }

}
