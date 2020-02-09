<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProjectContact extends Model
{
     protected $fillable = [
         'project_id',
         'project_contact_id'
     ];

    public function user()
    {
        return $this->belongsTo(User::class,'project_contact_id','id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
