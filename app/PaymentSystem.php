<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id','type','account_no','detals','status'
    ];
}
