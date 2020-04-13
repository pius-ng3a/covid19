<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Pagination;

class Message extends Model
{
    protected $table = 'contact_messages';
    protected $primaryKey = 'contact_message_id';

    protected $fillable = ['message', 'email', 'subject','author'];

    public static function getLatestMessages($number)
    {
        $mgs = DB::table('contact_messages')
        ->select('*')->limit($number)->orderBy('created_at', 'DESC')->get();

        return $mgs;
    }
    public static function getUnreadMessages()
    {
        $mgs = DB::table('contact_messages')->select("*")->orderBy('created_at', 'DESC')->paginate(20);
        //select('*')->where('status',0)->orderBy('created_at', 'DESC')->paginate(20);

        return $mgs;
    }
     public static function getReadMessages()
    {
        $mgs = DB::table('contact_messages')
        ->select('*')->where('state',1)->orderBy('created_at', 'DESC')->paginate(20);

        return $mgs;
    }

}