<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient_records';
    protected $primaryKey = 'patient_record_id';

    protected $fillable = ['patient_userId', 'doctor_id', 'site_id', 'appointment_id', 'quarantine', 'consulted_on','discharged_on','state','observation'];

    public static function getSomePatients($num)
    {
        $patient = DB::table('patient_records')->select('*')->limit($num)->orderBy('created_at', 'DESC')->get();
              return $patient;
    }
    public static function getAUser($id)
    {
        $user = DB::table('users')->select('*')->where('userId',$id)->get();
          return $user;
    }
    public static function getASite($id){
      $site = DB::table('sites')->select(["SiteName","Id"])->where("Id",$id)->get();
      return $site;
    }

}
