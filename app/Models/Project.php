<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =[
        'id',
        'project_name',
        'client_website',
        'project_manager_id',
        'voice',
        'pillars',
        'clusters',
        'status'
    ];

    const ACTIVE = 1;
    const DE_ACTIVE = 0;

    protected $appends = [
        'status_name',
    ];

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = 'Inactive';
                break;
            case 1:
                $status = 'Active';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function articles()
    {
        return $this->hasMany(ContentArticle::class, 'project_id', 'id');
    }

    public function projectManager()
    {
        return $this->belongsTo(User::class,'project_manager_id','id');
    }

    public function clients()
    {
        return $this->belongsToMany(User::class,ProjectContact::class, 'project_id', 'project_contact_id');
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class,ProjectPersona::class, 'project_id', 'persona_id');
    }

    public static function activeProjects(){
        return  Project::select(['id','project_name'])->where('status','=',Project::ACTIVE)->get();
    }


}
