<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Privilege extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privileges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [''];

 /**
  * Get all privileges
  * @retrun Array
  */

    public static function getAllPrivileges(){
        $query = DB::table('privileges')->where('state',1)
                ->get();
        return $query;
    }

    /** selects all authorized privileges for a given user with  a role id
     * @param $role_id
     * @param $userId
     * @return string
     */
    public static function getAuthorisedPrivileges($role_id,$userId){
        $root = getenv('BASE_URL').'/COVID19/public/' ?: 'localhost/';
        $result = "";
        /*select allowed privileges for the user */
        $privileges= DB::select(DB::raw("SELECT * from privileges  WHERE privileges.state=1 AND
                     privileges.privilege_id IN ( SELECT roles_has_privileges.privilege_id FROM roles_has_privileges
                     WHERE roles_has_privileges.role_id=$role_id)AND privileges.privilege_id NOT IN
                     (SELECT revoke_privileges.privilege_id FROM revoke_privileges WHERE revoke_privileges.user_id=$userId AND revoke_privileges.state=1)
                     ORDER BY privileges.privilege_id ASC
                     "));
        /*select allowed Sub privileges */
        $sub_priv = DB::select(DB::raw("Select * From sub_privileges WHERE sub_privileges.state=1 AND sub_privileges.privilege_id IN
                    (SELECT roles_has_privileges.privilege_id from roles_has_privileges WHERE roles_has_privileges.role_id=$role_id)
                   AND  sub_privileges.privilege_id NOT IN (SELECT revoke_sub.sub_privilege_id FROM revoke_sub
                    WHERE revoke_sub.user_id=$userId)
                    "));
        /*result holds the privileges and sub privileges allowed for a given user*/
        foreach($privileges as $row){
            $result .="<li id='priv_$row->privilege_id'>
                   <a href='#'><i class='fa fa-folder'></i>$row->name<span class='fa arrow'></span></a>
            <ul class='nav nav-second-level'>";
            foreach($sub_priv as $row1){
                if($row1->privilege_id == $row->privilege_id){
                   $result .="<li >
                             <a href='".$root.$row1->action."' id='subpriv_$row1->sub_privilege_id' >
                                                <i class='fa fa-file'></i>$row1->name
                                            </a>
                                        </li>";
                }
            }
            $result .="</ul>
                       </li>";
        }
        return $result;
    }
    public static function getRevokedPrivileges(){
        $privileges = DB::table('revoke_privileges')
            ->join('privileges','revoke_privileges.privilege_id','=','privileges.privilege_id')
            ->select('privileges.*','revoke_privileges.*')->where('revoke_privileges.state',1)->distinct('privileges.privilege_id')->get();
        /*$privilege='';
        foreach($privileges as $u){
            $privilege .='<option value='.$u->privilege_id.'>'.$u->name.'</option>';
        }*/
        return $privileges;
    }



}
