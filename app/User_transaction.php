<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_transaction extends Model
{
    protected $fillable = [
        'user_id','transaction','about','price'
    ];
}
