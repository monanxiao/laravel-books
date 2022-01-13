<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Str;

class Banner extends Model
{
    //
    protected $fillable = ['title', 'link', 'src_img'];

    // 获取封面完整路径
    public function getSrcImgAttribute()
    {
        // 如果 src_img 字段本身已经是完整的 url 地址 就直接返回
        if (Str::startsWith($this->attributes['src_img'], ['http://', 'https://'])) {
            return $this->attributes['src_img'];
        }

        return env('APP_URL') . $this->attributes['src_img'];
    }

}
