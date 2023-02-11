<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'lang' ,'title','short_text','text','image','show_index','seo','slug'
    ];
    public function Category()
    {
        return $this->belongsToMany(CategoryArticle::class,'article_category_articles','article_id','category_id');
    }

//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }

    public function Tag()
    {
        return $this->belongsToMany(Tags::class,'article_tags','article_id','tag_id');
    }
}
