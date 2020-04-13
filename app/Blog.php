<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';

    protected $fillable = ['message', 'user_id', 'subject'];

    public static function getLatestBlogs($number)
    {
        $blogs = DB::table('blogs')->join('alumni_members','blogs.user_id',"=","alumni_members.user_id")
        ->select('blogs.*','alumni_members.user_id','alumni_members.first_name','alumni_members.last_name','alumni_members.picture')->limit($number)->orderBy('created_at', 'DESC')->get();

        return $blogs;
    }

}