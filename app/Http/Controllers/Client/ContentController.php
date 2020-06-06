<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\addAtricle;
use App\Http\Requests\addContent;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\Content;
use App\Models\ContentArticle;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function contentReviewSave(Request $request)
    {
        $this->updateStatus($request->contentId , $request->draft);
        $content = Content::where('id','=',$request->contentId)->first();
        $article =  $content->article->first();
        if ($article != null){
            $article->update([
                'article' => $request->article,
            ]);
        }elseif($request->article != null){
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
        }
        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_UPDATE_CONTENT,$request->contentId,"Content Updated by ".Auth::user()->first_name ."-".Auth::user()->last_name);
//        $article = Article::create([
//            'user_id' => Auth::user()->id,
//            'article' => $request->article,
//            'status' => isset($request->draft) ? Article::DRAFT : Article::PUBLISH
//        ]);
//        ContentArticle::create([
//            'project_id' => $request->projectId,
//            'content_id' => $request->contentId,
//            'article_id' => $article->id,
//        ]);

        return redirect()->route('client-dash')->with('success','content updated......');
    }

    public function updateStatus($contentId,$draft){
        $status = '';
        $checkStatus = isset($draft) ? Article::DRAFT : Article::PUBLISHED;
        if($checkStatus == Article::PUBLISHED) {
            $status = Content::STATUS_READY_TO_PUBLISH;
        } else {
            $status = Content::STATUS_CLIENT_REVIEWING;
        }
        return Content::where('id','=',$contentId)->update([
           'status' => $status
        ]);
    }

//    public function editDash($id)
//    {
//        $projects = Project::activeProjects();
//        $writers = User::select(['id','first_name','last_name'])->where('is_admin','=',User::Writter)->get();
//        $content = Content::where('id','=',$id)->first();
//        return view('theme.client.content.client-edit-content',[
//            'content' =>  $content,
//            'projects' => $projects,
//            'writers' => $writers
//        ]);
//    }

//    public function updateContent(addContent $request)
//    {
//        $content = Content::where('id','=',$request->rowId)->first();
//        $content->update([
//            'title'=>$request->title,
//            'min_words_count'=>$request->word_count,
//            'content_type'=>$request->content_type,
//            'content_tactic'=>$request->tatic,
//            'target_keyword'=>$request->target_keyword,
//            'framing_keywords'=>implode(',',collect(json_decode($request->framing_keyword))->pluck('value')->toArray()),
//            'planned_published_date'=>$request->publish_date,
//            'target_written_by_date'=>$request->target_date,
//            'publish_page'=>$request->publish_page,
//            'writer_id'=>$request->writter,
//            'voice'=>$request->voice,
//            'notes'=>$request->notes,
//            'meta_description'=>$request->meta_discription,
//            'persona'=>$request->persona,
//            'pillar'=>$request->pillar,
//            'cluster'=>$request->cluster,
//            'status'=>$request->status,
//            'project_id'=>$request->project,
//            'created_by'=> $content->created_by,
//            'updated_by'=> Auth::user()->id,
//        ]);
//        return redirect()->route('client-dash')->with('success','content updated......');
//    }
}
