<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    protected $fillable = [
        'user_id','type','account_no','detals','status'
    ];
}
