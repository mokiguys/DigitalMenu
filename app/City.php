<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'fa','en','tr','image','location','country_id','province_id','show_one'
    ];
}
