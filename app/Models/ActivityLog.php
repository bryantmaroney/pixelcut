<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'content',
        'comment',
    ];


    const TYPE_CREATE_ARTICLE = 10;
    const TYPE_UPDATE_ARTICLE = 11;

    const TYPE_CREATE_PROJECT = 12;
    const TYPE_UPDATE_PROJECT = 13;

    const TYPE_CREATE_CONTENT = 14;
    const TYPE_UPDATE_CONTENT = 15;


    /**
     * @param $userId
     * @param $type
     * @param $contentId
     * @param $comment
     */
    public static function saveActivityLog($userId, $type, $contentId, $comment){
        return ActivityLog::create([
            'user_id' => $userId,
            'type' =>  $type,
            'content' => $contentId,
            'comment' => $comment,
        ]);
    }
}
