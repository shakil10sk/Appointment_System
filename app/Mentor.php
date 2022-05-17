<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Category;
class Mentor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'mentor';
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'status',
        'district_id',
        'thana_id',
        'category_id',
        'specialist',
        'time_limit',
        'fee',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    //category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //available days
    public function available_days(){
        return $this->hasMany(avilableDay::class,'mentor_id');
    }
}
