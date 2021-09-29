<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    // 批量赋值白名单
    protected $fillable = [
        'name', 'serial_number'
    ];

    // 每章节都属于一本书
    public function books()
    {
    	return $this->belongsTo(Book::class, 'book_id');
    }


    // 拥有文章
    public function article(){

    	return $this->hasMany(Article::class)->orderBy('serial_number','asc');
    }
}
