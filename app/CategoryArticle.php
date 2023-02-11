<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $fillable = [
        'fa','ar','tr','en'
    ];
    public function Articles()
    {
        return $this->belongsToMany(Article::class,'article_category_articles','category_id');
    }
}
