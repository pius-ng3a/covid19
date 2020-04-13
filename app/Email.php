<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $primaryKey='promotion_id';
    protected $table='emailpromotions';
    protected $fillable =[
        'email',
        'target',
        'total_people',
        'user_id',
        'item_id'
    ];
}
