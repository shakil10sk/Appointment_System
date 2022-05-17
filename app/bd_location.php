<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bd_location extends Model
{
    protected $fillable = [
        'parent_id','name','type','status'
    ];
}
