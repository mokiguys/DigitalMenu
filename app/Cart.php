<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'token', 'name', 'price', 'count', 'discount', 'shop_id', 'shop_id', 'final_price','food_id','way_order'
    ];
}
