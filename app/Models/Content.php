<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'min_words_count',
        'content_type',
        'content_tactic',
        'target_keyword',
        'framing_keywords',
        'planned_published_date',
        'target_written_by_date',
        'publish_page',
        'writer_id',
        'voice',
        'notes',
        'meta_description',
        'persona',
        'pillar',
        'cluster',
        'status',
        'project_id',
        'created_by',
        'updated_by',
    ];

    protected $appends = [
        'status_name',
        'content_name',
        'tatic_name',
        'pillar_name',
        'cluster_name',
        'persona_name',
    ];


    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 1:
                $status = 'Topic Proposed';
                break;
            case 2:
                $status = 'Topic Approved';
                break;
            case 3:
                $status = 'Writing';
                break;
            case 4:
                $status = 'Client Reviewing';
                break;
            case 5:
                $status = 'Ready To Review';
                break;
            case 6:
                $status = 'Ready To Publish';
                break;
            case 7:
                $status = 'Publish';
                break;
            case 8:
                $status = 'Idea';
                break;
            case 9:
                $status = 'Assign To Writer';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function getContentNameAttribute()
    {
        switch ($this->content_type) {
            case 1:
                $status = 'Standard Blog Post';
                break;
            case 2:
                $status = 'Product Page';
                break;
            case 3:
                $status = 'Product Category Page';
                break;
            case 4:
                $status = 'Resource/Guide<';
                break;
            case 5:
                $status = 'Service Landing Page';
                break;
            case 6:
                $status = 'Sales Page';
                break;
            case 7:
                $status = 'White paper';
                break;
            case 8:
                $status = 'Wiki Article';
                break;
            case 9:
                $status = 'Infographic';
                break;
            case 10:
                $status = 'Something Else';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function getTaticNameAttribute()
    {
        switch ($this->content_tactic) {
            case 1:
                $status = 'Volvo';
                break;
            case 2:
                $status = 'Saab';
                break;
            case 3:
                $status = 'Mercedes';
                break;
            case 4:
                $status = 'Audi';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function getPillarNameAttribute()
    {
        switch ($this->pillar) {
            case 1:
                $status = 'Volvo';
                break;
            case 2:
                $status = 'Saab';
                break;
            case 3:
                $status = 'Mercedes';
                break;
            case 4:
                $status = 'Audi';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function getClusterNameAttribute()
    {
        switch ($this->cluster) {
            case 1:
                $status = 'Volvo';
                break;
            case 2:
                $status = 'Saab';
                break;
            case 3:
                $status = 'Mercedes';
                break;
            case 4:
                $status = 'Audi';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function getPersonaNameAttribute()
    {
        switch ($this->persona) {
            case 1:
                $status = 'Volvo';
                break;
            case 2:
                $status = 'Saab';
                break;
            case 3:
                $status = 'Mercedes';
                break;
            case 4:
                $status = 'Audi';
                break;
            default:
                $status = '-';
        }
        return $status;
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function writer()
    {
        return $this->belongsTo(User::class,'writer_id','id');
    }

    public function article()
    {
        return $this->belongsToMany(Article::class,'content_articles','article_id', 'article_id');
    }

}
