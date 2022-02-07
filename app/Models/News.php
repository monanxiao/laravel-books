<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'news_categorie_id', 'type', 'author', 'source', 'issue_time', 'description', 'content'
    ];

    /**
     * 文章所属分类
     *
     */
    public function category()
    {
        return $this->hasOne('App\Models\NewsCategory', 'id', 'news_categorie_id');
    }
}
