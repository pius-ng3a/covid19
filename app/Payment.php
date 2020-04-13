<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'contributions';
    protected $primaryKey = 'contribution_id';

    protected $fillable = ['purpose', 'user_id','amount'];

}
