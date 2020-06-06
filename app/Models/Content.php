<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    const STATUS_DEFAULT = 0;
    const STATUS_TOPIC_PROPOSED = 1;
    const STATUS_TOPIC_APPROVED = 2;
    const STATUS_WRITING = 3;
    const STATUS_CLIENT_REVIEWING = 4;
    const STATUS_READY_TO_REVIEW = 5;
    const STATUS_READY_TO_PUBLISH = 6;
    const STATUS_PUBLISHED = 7;
    const STATUS_IDEA = 8;
    const STATUS_ASSIGN_TO_WRITER = 9;
    const DISCARD = 1;
    const Un_DISCARD = 0;


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
        'is_discard'
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
                $status = 'Published';
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
                $status = 'Blog Post';
                break;
            case 2:
                $status = 'Podcast';
                break;
            case 3:
                $status = 'Product Category';
                break;
            case 4:
                $status = 'Resource Guide';
                break;
            case 5:
                $status = 'Facebook Ad';
                break;
            case 6:
                $status = 'Product Page';
                break;
            case 7:
                $status = 'Infographic';
                break;
            case 8:
                $status = 'Instagram Post';
                break;
            case 9:
                $status = 'Local Lander';
                break;
            case 10:
                $status = 'White Paper';
                break;
            case 11:
                $status = 'Short Video';
                break;
            case 12:
                $status = 'Services Lander';
                break;
            case 13:
                $status = 'Long Video';
                break;
            case 14:
                $status = 'Sales Page';
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
                $status = 'Comparison Guide';
                break;
            case 2:
                $status = 'Gated Content';
                break;
            case 3:
                $status = 'Interview';
                break;
            case 4:
                $status = 'Curated Roundup';
                break;
            case 5:
                $status = 'Graphic';
                break;
            case 6:
                $status = 'Short Video';
                break;
            case 7:
                $status = 'Expert Guide';
                break;
            case 8:
                $status = 'Hub Post';
                break;
            case 9:
                $status = 'Spoke Post';
                break;
            case 10:
                $status = 'Expert Roundup';
                break;
            case 11:
                $status = 'Infographic';
                break;
            case 12:
                $status = 'Template';
                break;
            case 13:
                $status = 'Tool';
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

    public function persona_rel()
    {
        return $this->belongsTo(Persona::class,'persona','id');
    }

    public function article()
    {
        return $this->belongsToMany(Article::class,'content_articles','content_id', 'article_id');
    }

}
