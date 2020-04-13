<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AlumniMember extends Model
{
    protected $table = 'alumni_members';
    protected $primaryKey = 'user_id';
    protected $fillable = ['email|unique','first_name','last_name','phone','state','picture'];

    public static function getUserByID($user_id){
        $user = DB::table('alumni_members')->select('*')->where('user_id','=',$user_id)->first();
        return $user;

    }
    public static function getUserProfileToUpdate($id){
        $user = AlumniMember::join("roles","alumni_members.role_id","=","roles.role_id")
            ->select("alumni_members.*","roles.role_id","roles.name as role_name")
            ->where("alumni_members.user_id","=",$id)->first();
        return $user;
    }
 public static function getNonAdminUsersOptions(){
        $users = AlumniMember::whereNotIn("user_id",DB::table('users')->select('user_id')->where('state','!=',1)->get())->get();
     $user='';
     foreach($users as $u){
         $user .='<option value='.$u->user_id.'>'.$u->first_name.'  '.$u->last_name.'</option>';
     }
     /*  $users->render();*/
     return $user;
 }
 public static function getAllUsersOptions(){
        $users = AlumniMember::all();
     $user='';
     foreach($users as $u){
         $user .='<option value='.$u->user_id.'>'.$u->first_name.'  '.$u->last_name.'</option>';
     }
     /*  $users->render();*/
     return $user;
    }
 public static function getAlumniMembers(){
     $users = AlumniMember::select("*")->orderBy("created_at","Desc")->orderBy('first_name',"ASC")->orderBy("last_name","ASC")->paginate(5);
     return $users;
 }

}
