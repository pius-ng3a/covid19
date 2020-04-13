<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Pagination;
use App\Shop;
use Session;

class Contribution extends Model
{
    protected $table = "contributions";
    protected $primaryKey = "contribution_id";
    protected $fillable =
        ['user_id','reciever_id','amount','created_at','purpose','batch','updated_at',
        ];


    /**
     * @return  mixed
     * Function gets all salaries of workers excluding overtime
     * */

    /**@param $user_id
     * @return  mixed
     * Gets salary of a user excluding overtime
    */
    public static function getSalaryByUserId($user_id){
        $sal = DB::table('user_works_on_project')
            ->join('projects','projects.project_id','=','user_works_on_project.project_id')
            ->join('attendance',function($join){
                $join->on('attendance.user_id','=','user_works_on_project.user_id')
                    ->On('attendance.project_id','=','user_works_on_project.project_id')
                    ->where('attendance.status','=','0')
                    ->where('present','=','1');
            })
            ->join('users','users.user_id','=','attendance.user_id')
            ->where('attendance.user_id',$user_id)
            ->orderBy('date_present','desc')
            ->groupBy('attendance.user_id')
            ->select(DB::raw('users.user_id,user_works_on_project.project_id,first_name,last_name,project_name,daily_pay,
                count(date_present) as days,sum(paid_amount) as monthly_pay,users.amount_owed as amount_owed,sum(paid_amount)+users.amount_owed as net_payable'))
            ->first();
        return $sal;
    }



    public static function getAllContributors( ){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
            ->orderBy('created_at','desc')
            ->paginate(35);
        return $contr;
    }
    public static function getLimitedContributors($num ){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
             ->limit($num)
            ->orderBy('batch','ASC')
            ->orderBy('first_name','ASC')
            ->orderBy('last_name','ASC')
            ->orderBy('created_at','ASC')
            ->get();
        return $contr;
    }

    /**
     * @param $user_id
     * @return mixed
     * function retrieves all contributions made by a given user
     */
    public static function getAllContributionsByUserID($user_id ){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
             ->where('contributions.user_id','=',$user_id)
            ->orderBy('created_at','desc')
            ->get();
        return $contr;
    }
    public static function getAllContributionsByBatch($batch ){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
             ->where('contributions.batch','=',$batch)
            ->orderBy('created_at','desc')
            ->paginate(50);
        return $contr;
    }
    public static function getAllContributionsByBatchForDownload($batch ){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
             ->where('contributions.batch','=',$batch)
            ->orderBy('created_at','desc')
            ->orderBy('first_name','asc')
            ->orderBy('last_name','asc')
            ->limit(200)->get();
        return $contr;
    }

    public static function getAllContributorsOptions(){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
             ->distinct('contributions.user_id')
            ->orderBy('created_at','desc')->orderBy('first_name','ASC')->orderBy('last_name','ASC')
            ->get();
        $contributors = "<option value='none'>".trans('english.select_contr').'</option>';
        foreach($contr as $con){
            $contributors .= '<option value="'.$con->user_id.'">'.$con->first_name.' '. $con->last_name.'</option>';
        }
        return $contributors;
    }
    public static function getContributionToUpdate( $id){
        $contr = DB::table('contributions')
            ->join('alumni_members','contributions.user_id','=','alumni_members.user_id')
             ->select('contributions.*','alumni_members.first_name','alumni_members.last_name','alumni_members.phone')
            ->where('contribution_id','=',$id)
            ->first();
        return $contr;
    }
    public static function getAllContributorsBatches(){
            $years = DB::table('contributions')
                 ->select('batch')->distinct('batch')->orderBy('batch','asc')->get();
            return $years;
    }
}
