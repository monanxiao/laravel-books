<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    // 拥有章节
    public function chapter()
    {
    	return $this->hasMany(Chapter::class);
    }


    // 获取封面完整路径
    public function getBkCoverSrcAttribute()
    {
        // 如果 cover_src 字段本身已经是完整的 url 地址 就直接返回
        if (Str::startsWith($this->attributes['cover_src'], ['http://', 'https://'])) {
            return $this->attributes['cover_src'];
        }

        return url('uploads/' . $this->attributes['cover_src']);
    }
}
