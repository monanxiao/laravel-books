<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use Traits\VisitorTraits;
    //
    protected $fillable = [
        'area', 'visitor', 'page', 'created_at'
    ];
}
