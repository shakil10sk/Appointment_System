<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avilableDay extends Model
{
    protected $fillable = [
        'mentor_id','day','from_time','to_time'
    ];
}
