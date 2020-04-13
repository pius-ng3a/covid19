<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $primaryKey ='role_id';
    protected $table='roles';
    protected $fillable = [
        'role_name'

    ];
    public static function get_All_Roles(){
        $roles= DB::table('roles')->get();

        return $roles;
    }
    public static function getRoleOptions(){
        $roles = DB::table('roles')->select('role_id','name')->orderBy('role_id',"DESC")->get();
        $options = '';
        foreach($roles as $rol){
            if($rol->role_id != 1){
                 $options .='<option value='.$rol->role_id.'>'.$rol->name.'</option>';
            }
        }
        return $options;
    }
    public static function getRoleByID($id){
        $role = Role::findOrFail($id);
        return $role;
    }
}
