<?php
namespace App\Http\Controllers;
use DB;

trait CheckAllowedPrivileges {
    /**
     * @param $user_id
     * @param $privilege_id
     * @return boolean
     * returns true if user has supended privilege
     */

    public static function checkRevokedPrivilege($user_id,$privilege_id)
    {
        return  DB::table('revoke_privileges')->select('user_id','privilege_id','state')
            ->where('user_id',$user_id)->where('privilege_id',$privilege_id)->where('state',1)->get();
    }
    /**
     * @param $user_id
     * @param $privilege_id
     * @return boolean
     * returns true if user has supended sub_privilege
     */
    public function checkRevokedSubPrivilege($user_id,$privilege_id)
    {
        return  DB::table('revoke_sub')->select('user_id','sub_privilege_id','state')
            ->where('user_id',$user_id)->where('sub_privilege_id',$privilege_id)->where('state',1)->get();
    }

    /**
     * @param $role_id
     * @param $privilege_id
     * @return mixed
     * verify if user has assigned privilege
     */
    public static function checkUserHasPrivilege($role_id,$privilege_id)
    {
        return  DB::table('roles_has_privileges')->select('role_id','privilege_id')
            ->where('role_id',$role_id)->where('privilege_id',$privilege_id)->get();
    }
}