<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Email|unique', 'password|min:6','FirstName','LastName','Phone','picture','Address','NationalId'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return mixed
     */
    public static function getNewslettersSenders(){
        $options =' ';
        $users = DB::table("sentnewsletters")
            ->join("users","sentnewsletters.user_id","=","users.userId")
            ->select('users.*','sentnewsletters.user_id')->distinct('user_id')->get();
        foreach($users as $user){
            $options .= "<option value=".$user->userId.">".$user->FirstName."  ".$user->LastName."</option>";
        }
        return $options;
    }
    public function items(){
        return $this->hasMany('App\Item');
    }
    public function shops(){
        return $this->hasMany('App\Shop');
    }

    /**
     * @return string
     * retrives all users in database and returns a string of the various users for use in
     * select input
     */
    public static function getAllUsers(){
        $users= DB::table('users')->where('state',1)->get();
        /*$users= DB::table('users')->paginate(5);*/
        $user='<option value="1">'.trans('english.select_user1').'</option>';
        foreach($users as $u){
            $user .='<option value='.$u->userId.'>'.$u->FirstName.'  '.$u->LastName.'</option>';
        }
        /*  $users->render();*/
        return $user;
    }



    public static function getUserProfileToUpdate($id){
        $user = User::join("departments","users.department_id","=","departments.department_id")
            ->join("roles","users.role_id","=","roles.role_id")
            ->select("users.*","departments.department_id","departments.department_name","roles.role_id","roles.name as role_name")
            ->where("users.userId","=",$id)->first();
        return $user;
    }
   public static function getAllDoctorOptions(){
     $doctor = $users= DB::table('users')->where("role_id",2)->get();
     $docOptions = "";
     foreach($doctor as $doc){
       $docOptions .='<option value='.$doc->userId.'>'.$doc->FirstName.' '.$doc->LastName.'</option>';
     }
     return $docOptions;
   }
   public static function getAllPatientOptions(){
     $patient = DB::table('users')->select('*')->where("role_id",3)->get();
     $patOptions = "";
     foreach($patient as $doc){
       $patOptions .='<option value='.$doc->userId.'>'.$doc->FirstName.' '.$doc->LastName.'</option>';
     }
     return $patOptions;
   }

   public static function getAllCenterOptions(){
     $sites = DB::table('sites')->get();
     $siteOptions = "";
     foreach($sites as $st){
       $siteOptions .='<option value='.$st->site_id.'>'.$st->SiteName.'</option>';
     }
     return $siteOptions;
   }

    public static function getAllAdminUsers(){
        $users= DB::table('users')->join("roles","roles.role_id","=","users.role_id")->select("users.*","roles.role_id","roles.name")->where('users.state',1)->where('users.role_id',"!=",4)->get();
        return $users;
    }
    public static function getUsersWithRevokedPrivileges(){
        $users = DB::table('revoke_privileges')
            ->join('users','revoke_privileges.user_id','=','users.userId')
            ->select('users.*','revoke_privileges.*')->where('revoke_privileges.state',1)->get();
        $user='';
        foreach($users as $u){
            $user .='<option value='.$u->userId.'>'.$u->FirstName.'  '.$u->LastName.'</option>';
        }
        return $user;
    }

    public static function  getUsersOfGivenCategory($category_id){
        $user = DB::table('users')->where('role_id',$category_id)->get();
        return $user;
    }
    public static function getAllUsersCategory(){
        $users= DB::table('roles')->get();
        /*$users= DB::table('users')->paginate(5);*/
        $userCategory='';
        foreach($users as $u){
            $userCategory .='<option value='.$u->role_id.'>'.$u->name.'</option>';
        }
        /*  $users->render();*/
        return $userCategory;
    }

    public static function selectAllRegisterdUsers(){
        $users = User::all();
        return $users;
    }
}
