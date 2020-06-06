<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\addAtricle;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\Content;
use App\Models\ContentArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function addArticle(addAtricle $request)
    {
        $this->updateStatus($request->contentId, $request->draft);
        $data = ContentArticle::where('project_id', '=', $request->projectId)->where('content_id', '=', $request->contentId)->first();
        if(is_null($data)) {
            $article = Article::create([
                'user_id' => Auth::user()->id,
                'article' => $request->article,
                'status' => isset($request->draft) ? Article::DRAFT : Article::PUBLISHED
            ]);
            ContentArticle::create([
                'project_id' => $request->projectId,
                'content_id' => $request->contentId,
                'article_id' => $article->id,
            ]);
        } else {
            $article = Article::where('id', '=', $data->id)->update([
                'article' => $request->article,
                'status' => isset($request->draft) ? Article::DRAFT : Article::PUBLISHED
            ]);
        }

        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_CREATE_ARTICLE,$request->contentId,"Article Written by ".Auth::user()->first_name ."-".Auth::user()->last_name);

        return redirect()->route('writter-dash')->with('success','content updated......');
    }

    public function updateStatus($contentID,$draft){
        $status = '';
        $checkStatus = isset($draft) ? Article::DRAFT : Article::PUBLISHED;
        if($checkStatus == Article::PUBLISHED) {
            $status = Content::STATUS_READY_TO_REVIEW;
        } else {
            $status = Content::STATUS_WRITING;
        }
        return Content::where('id','=',$contentID)->update([
            'status' => $status
        ]);
    }
}
