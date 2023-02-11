<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredients_menus extends Model
{
    protected $fillable = [
        'ingredient_id','menu_id'
    ];
}
