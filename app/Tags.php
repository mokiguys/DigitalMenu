<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'fa','ar','tr','en'
    ];
    public function Article()
    {
        return $this->belongsToMany(Article::class,'article_tags','tag_id');
    }
}
