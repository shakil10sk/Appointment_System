<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
