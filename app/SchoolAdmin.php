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

class SchoolAdmin extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_admin';
    protected $primaryKey = 'school_admin_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','user_id','state','email','reign','first_name','last_name','phone','picture'];


    public static function getActiveAdministrators(){
        $users= DB::table('school_admin')->select("*")->where('state',1)->orderBy('role_id','ASC')->get();
        return $users;
    }

}
