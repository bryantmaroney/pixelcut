<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Content;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function writterDash(Request $request)
    {
        $projects = Project::activeProjects();
        $Contents = Content::with('project','writer')->where('writer_id','=',Auth::user()->id);
        if(isset($request->title)){
            $Contents->where('title','=',$request->title);
        }
        if(isset($request->status)){
            $Contents->where('status','=',$request->status);
        }
        if(isset($request->project)){
            $Contents->where('project_id','=',$request->project);
        }
        $Contents = $Contents->paginate(10);
        return view('theme.writter.content.writter-dash',[
            'Contents' => $Contents,
            'projects' => $projects
        ]);
    }

    public function editDash($id)
    {
        $content = Content::with('project', 'article')->where('id','=',$id)->first();
        return view('theme.writter.content.content-assignment',[
            'content' =>  $content,
            'article' => isset($content->article->first()->article) ? $content->article->first()->article :''
        ]);
    }

    public function contentAssigmentFinalize()
    {
        return view('theme.writter.content.content-assignment-finalize');
    }


    public function getLog($contentId){
        $log = ActivityLog::where('content','=',$contentId)->orderBy('id', 'desc')->get();
        return view('theme.writter.changeLog.log',[
            'data' => $log
        ]);
    }
}
