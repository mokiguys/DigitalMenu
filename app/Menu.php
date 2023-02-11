<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'fa', 'en', 'tr', 'shop_id', 'image', 'price', 'currency', 'discount', 'exist', 'category_id', 'description_fa', 'description_en', 'description_tr'
    ];

    public function CategoryStore()
    {
        return $this->belongsTo(CategoryStore::class, 'categoryShop_id');
    }

    public function Shop()
    {
        return $this->hasOne(Shop::class, 'shop_id');
    }

    public function CategoryFood()
    {
        return $this->belongsTo(CategoryFood::class,'category_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
