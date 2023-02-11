<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'fa','tr','en'
    ];

    public function foods()
    {
        $this->belongsToMany(Food::class,'food_ingredients');
    }

}
