<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset('images/mentor/photos/'.$this->document);
    }
}
