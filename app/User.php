<?php

namespace App;

use App\Models\Project;
use App\Models\ProjectContact;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'is_admin',
        'status',
        'last_login',
        'password',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    protected $appends = [
        'user_name',
        'status_name',
        'role_name'
    ];

    const Admin = 1;
    const Client = 0;
    const Writter = 2;

    public function getUserNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

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

    public function getRoleNameAttribute()
    {
        switch ($this->is_admin) {
            case 0:
                $status = 'Client';
                break;
            case 1:
                $status = 'Admin';
                break;
            case 2:
                $status = 'Writter';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public static function userPassword($request){
        return User::select('password')->where('id','=' ,$request->userId)->first();
    }

    public function project(){
        return $this->hasone(ProjectContact::class, 'project_contact_id', 'id');
    }
}
