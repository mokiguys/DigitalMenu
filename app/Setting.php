<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'charge','min_price','value_add_tax','percentage_all'
    ];
}
