<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    protected $fillable = [
        'fa','tr','en','categoryShop_id'
    ];
    public function CategoryStore()
    {
        return $this->belongsTo(CategoryStore::class,'categoryShop_id');
    }
    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
