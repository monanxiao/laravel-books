<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use Traits\VisitorTraits;
    //
    protected $casts = [
        'area' => 'json',
    ];

    protected $fillable = [
        'area', 'visitor', 'page', 'created_at', 'link_id', 'type'
    ];

    /**
     * 关联书籍
     */
    public function books() {
        return $this->hasOne(Book::class, 'id', 'link_id');
    }

    /**
     * 关联章节
     */
    public function article() {

        return $this->hasOne(Article::class, 'id', 'link_id');
    }
}
