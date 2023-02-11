<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessComment extends Model
{
    protected $fillable = [
        'name','email','comment','shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
