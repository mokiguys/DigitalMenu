<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'fa','en','ar','tr','description_fa','description_en','description_tr','description_ar','image','icon','slug'
    ];
}
