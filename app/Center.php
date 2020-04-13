<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'sites';
    protected $primaryKey = 'Id';

    protected $fillable = ['SiteName', 'Longitude', 'Latitude', 'Province', 'District', 'Sector','SiteType','emmergencyEmail','EmmergencyPhone'];

    public static function getOpenEvents()
    {
        $events = DB::table('events')->select('*')->where('state', '=', 1)->whereDate('date', '>=', Carbon::now()->toDateString())->orderBy('date', 'ASC')->get();
        if(count($events)<3){
            $events = DB::table('events')->select('*')->limit(4)->orderBy('date', 'ASC')->get();
        }
        return $events;
    }
    public static function getCentersInProvince($province)
    {
        $events = DB::table('sites')->select('*')->where("Province",$province)->orderBy('created_at', 'DESC')->paginate(20);
        return $events;
    }
    public function getAllCenters(){
      $centers = DB::table('sites')->select('*')->orderBy('SiteName',ASC);
      return $centers;
    }

}
