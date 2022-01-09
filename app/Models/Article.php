<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'issue_time', 'serial_number', 'content', 'chapter_id'];

    // 文章所属章节 一对多
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

}
