<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = [
        'roles_fa','roles_en','roles_tr','expireTime','rial','discount','dollar','lir'
    ];
}
