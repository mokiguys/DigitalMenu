<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryStore extends Model
{
    protected $fillable = [
        'fa','tr','en','icon','slug'
    ];

    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
