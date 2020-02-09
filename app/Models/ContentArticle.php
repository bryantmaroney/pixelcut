<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentArticle extends Model
{
    protected $fillable = [
        'project_id',
        'content_id',
        'article_id',
    ];
}
