<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'fa','tr','en','categoryShop_id','categoryFood_id'
    ];

    public function CategoryStore()
    {
        return $this->belongsTo(CategoryStore::class,'categoryShop_id');
    }

    public function CategoryFood()
    {
        return $this->belongsTo(CategoryFood::class,'categoryFood_id');
    }

    public function ingredients()
    {
       return $this->belongsToMany(Ingredient::class);
    }
}
