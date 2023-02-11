<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'typePayment','user_id','shop_id','plan','bank_type','bank_order','price','discount','status_order','currency','marketer_id'
    ];

//    type payment = 1 : First payment
//    type payment = 2 : Sharj

}
