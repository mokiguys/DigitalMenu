<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    protected $fillable = [
        'marketer_id','transaction','about','money','percentage'
    ];
}
