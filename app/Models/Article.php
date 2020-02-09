<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'user_id',
        'article',
        'status'
    ];

    const  DRAFT = 0;
    const  PUBLISH = 1;
}
