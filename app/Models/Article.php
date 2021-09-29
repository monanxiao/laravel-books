<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 文章所属章节 一对多
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
