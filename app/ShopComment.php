<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopComment extends Model
{
    protected $fillable = [
        'name','email','comment','shop_id','submit','rate_price','rate_speed','rate_quality','sum'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
