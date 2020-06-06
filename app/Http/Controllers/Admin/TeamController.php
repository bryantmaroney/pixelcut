<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addContent;
use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\Content;
use App\Models\ContentArticle;
use App\Models\Persona;
use App\Models\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function persona()
    {
        return view('theme.admin.persona.client-persona');
    }

    public function addContent()
    {
        $personas = Persona::all();
        $projects = Project::activeProjects();
        $writers = User::select(['id','first_name','last_name'])->where('is_admin','=',User::Writter)->get();
        return view('theme.admin.content.team-add-content',[
            'projects' => $projects ,
             'writers' => $writers,
             'personas' => $personas,

        ]);
    }
    public function teamDash(Request $request)
    {
        $projects = Project::activeProjects();
        $Contents = Content::with('project','writer');
        if(isset($request->title)){
            $Contents->where('title','=',$request->title);
        }
        if(isset($request->status)){
            $Contents->where('status','=',$request->status);
        }
        if(isset($request->project)){
            $Contents->where('project_id','=',$request->project);
        }
        if(isset($request->asc)){
            $Contents->orderBy('id','asc');
        }
        if(isset($request->desc)){
            $Contents->orderBy('id','desc');
        }
        if(isset($request->discarded)){
            $Contents = $Contents->where('is_discard','=',Content::DISCARD)->paginate(10);
        }
        else{
            $Contents = $Contents->where('is_discard','=',Content::Un_DISCARD)->paginate(10);
        }
        return view('theme.admin.content.team-dash',[
            'Contents' => $Contents,
            'projects' => $projects,
            'asc' => $request->asc,
            'desc' => $request->desc,
            'discarded' => $request->discarded
        ]);
    }

    public function contentSave(addContent $request)
    {
        $status = '';
        if($request->idea != '' ) {
            $status = Content::STATUS_IDEA;
        } else {
            $status = Content::STATUS_WRITING;
        }
       $content =  Content::create([
            'title'=>$request->title,
            'min_words_count'=>$request->word_count,
            'content_type'=>$request->content_type,
            'content_tactic'=>$request->tatic,
            'target_keyword'=>$request->target_keyword,
            'framing_keywords'=>implode(',',collect(json_decode($request->framing_keyword))->pluck('value')->toArray()),
            'planned_published_date'=>$request->publish_date,
            'target_written_by_date'=>$request->target_date,
            'publish_page'=>$request->publish_page,
            'writer_id'=>$request->writter,
            'voice'=>$request->voice,
            'notes'=>$request->notes,
            'meta_description'=>$request->meta_discription,
            'persona'=>$request->persona,
            'pillar'=>$request->pillar,
            'cluster'=>$request->cluster,
            'status'=>$status,
            'project_id'=>$request->project,
            'created_by'=> Auth::user()->id,
            'updated_by'=> Auth::user()->id,
        ]);

        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_CREATE_CONTENT,$content->id,"Content Created by ".Auth::user()->first_name ."-".Auth::user()->last_name);

        return redirect()->route('team-dash')->with('success','content added......');

    }
    public function editDash($id)
    {
        $personas = Persona::all();
        $projects = Project::activeProjects();
        $writers = User::select(['id','first_name','last_name'])->where('is_admin','=',User::Writter)->get();
         $content = Content::where('id','=',$id)->first();
        return view('theme.admin.content.team-edit-dash',[
               'content' =>  $content,
               'projects' => $projects,
               'writers' => $writers,
               'personas' => $personas,
               'article' => isset($content->article->first()->article) ? $content->article->first()->article :''
        ]);
    }

    public function updateContent(addContent $request)
    {
        $content = Content::where('id','=',$request->rowId)->first();
        $discard = self::getDiscardStatus($request,$content);
         $oldStatus = (string)$content->status;
        $content->update([
            'title'=>$request->title,
            'min_words_count'=>$request->word_count,
            'content_type'=>$request->content_type,
            'content_tactic'=>$request->tatic,
            'target_keyword'=>$request->target_keyword,
            'framing_keywords'=>implode(',',collect(json_decode($request->framing_keyword))->pluck('value')->toArray()),
            'planned_published_date'=>$request->publish_date,
            'target_written_by_date'=>$request->target_date,
            'publish_page'=>$request->publish_page,
            'writer_id'=>$request->writter,
            'voice'=>$request->voice,
            'notes'=>$request->notes,
            'meta_description'=>$request->meta_discription,
            'persona'=>$request->persona,
            'pillar'=>$request->pillar,
            'cluster'=>$request->cluster,
            'status'=>$request->status,
            'project_id'=>$request->project,
            'created_by'=> $content->created_by,
            'updated_by'=> Auth::user()->id,
            'is_discard' => $discard
        ]);
        $newStatus = $content->status;
        $article =  $content->article->first();
        if ($article != null){
            $article->update([
                'article' => $request->article,
            ]);
        }elseif($request->article != null){
            $article = Article::create([
                'user_id' => Auth::user()->id,
                'article' => $request->article,
                'status' =>  Article::DRAFT
            ]);
            ContentArticle::create([
                'project_id' => $request->project,
                'content_id' => $request->rowId,
                'article_id' => $article->id,
            ]);
        }
        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_UPDATE_CONTENT,$content->id,"Content Updated by ".Auth::user()->first_name ."-".Auth::user()->last_name);

          if( $oldStatus != $newStatus){
              ActivityLog::saveActivityLog(Auth::user()->id,$newStatus,$content->id,"Content ".self::getStatus($newStatus)." ".Auth::user()->first_name ."-".Auth::user()->last_name);
          }
        return redirect()->route('team-dash')->with('success','content updated......');
    }
    public function teamProjects()
    {
        return view('theme.admin.content.team-projects');
    }

    public function getLog($contentId){
        $log = ActivityLog::where('content','=',$contentId)->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();
        return view('theme.admin.changeLog.log',[
            'data' => $log
        ]);
    }

    public function getStatus($newStatus){
        switch ($newStatus) {
            case "1":
                $status = 'Topic Proposed';
                break;
            case "2":
                $status = 'Topic Approved';
                break;
            case "3":
                $status = 'Writing';
                break;
            case "4":
                $status = 'Client Reviewing';
                break;
            case "5":
                $status = 'Ready To Review';
                break;
            case "6":
                $status = 'Ready To Publish';
                break;
            case "7":
                $status = 'Published';
                break;
            case "8":
                $status = 'Idea';
                break;
            case "9":
                $status = 'Assign To Writer';
                break;
        }
        return $status;
    }

    public function getDiscardStatus($request,$content)
    {
        if(isset($request->discard) && $request->discard != null){
            $discard = Content::DISCARD ;
        } else if(isset($request->restore) && $request->restore != null){
            $discard = Content::Un_DISCARD;
        }else{
            $discard = $content->is_discard;
        }
        return  $discard;
    }
}
