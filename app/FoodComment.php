<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodComment extends Model
{
    protected $fillable = [
        'name','email','comment','food_id','shop_id','submit'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class,'food_id');
    }
}
