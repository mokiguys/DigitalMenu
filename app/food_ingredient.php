<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food_ingredient extends Model
{
    protected $fillable = [
      'food_id' , 'ingredient_id'
    ];
}
