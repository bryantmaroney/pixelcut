<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPersona extends Model
{
    protected $fillable =[
        'project_id',
        'persona_id'
    ];
}
