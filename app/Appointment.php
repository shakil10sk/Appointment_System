<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id','mentor_id','reson','document','method','medium','details','date','is_paid','is_approved'
    ];
}
