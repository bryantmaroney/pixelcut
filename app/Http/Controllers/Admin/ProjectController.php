<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addProject;
use App\Models\ActivityLog;
use App\Models\Content;
use App\Models\Project;
use App\Models\ProjectContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{
    public function listProjects(Request $request)
    {
        $projectManagers = User::select(['id', 'first_name', 'last_name'])->where('is_admin', '=', User::Client)->get();
        $projects = Project::with('projectManager', 'articles');
        if (isset($request->project)) {
            $projects->where('project_name', '=', $request->project);
        }
        if (isset($request->manager)) {
            $projects->where('project_manager_id', '=', $request->manager);
        }
        if (isset($request->status)) {
            $projects->where('status', '=', $request->status);
        }
        if (isset($request->discarded)) {
            $projects->where('status', '=', $request->discarded);
        }

        $projects = $projects->orderBy('id','desc')->paginate(10);
        return view('theme.admin.projects.team-projects', [
            'projects' => $projects,
            'projectManagers' => $projectManagers,
            'status' => $request->status
        ]);
    }

    public function newProject()
    {
        $projectManagers = User::where('is_admin', '=', User::Admin)->get();
        $users = User::whereDoesntHave('project')->select(['id', 'first_name', 'last_name'])->where('is_admin', User::Client)->get();
        $usersList = collect();
        foreach ($users as $Key => $user) {
            $usersList->push($user->first_name . ' ' . $user->last_name);
        }
        return view('theme.admin.projects.add-new-project', [
            'users' => $usersList,
            'projectManagers' => $projectManagers
        ]);
    }

    public function projectSave(addProject $request)
    {
        $contactId = self::getProjectContactID($request);
        if (collect($contactId)->isEmpty()){
               return redirect()->back()->with('error', 'no contact exist in the database...!')->withInput(Input::all());
           }
        $pillars = self::pillars($request);
        $clusters = self::clusters($request);
        $project = Project::create([
            'project_name' => $request->p_name,
            'client_website' => $request->website,
            'project_manager_id' => $request->p_manager,
            'voice' => $request->voice,
            'pillars' => $pillars,
            'clusters' => $clusters,
            'status' => $request->status
        ]);
        foreach ($contactId as $key => $val) {
            ProjectContact::create([
                'project_id' => $project->id,
                'project_contact_id' => $val
            ]);
        }

        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_CREATE_PROJECT,null,"Project Created by ".Auth::user()->first_name ."-".Auth::user()->last_name);

        return redirect()->route('list-projects')->with('success', 'project created...!');
    }

    public function pillars($request)
    {
        $pillars = json_decode($request->pillars);
        $pillars_String = Array();
        foreach ($pillars as $key) {
            array_push($pillars_String, $key->value);
        }
        return implode(",", $pillars_String);
    }

    public function clusters($request)
    {
        $clusters = json_decode($request->clusters);
        $clusters_String = Array();
        foreach ($clusters as $key) {
            array_push($clusters_String, $key->value);
        }
        return implode(",", $clusters_String);
    }

    public function getProjectContactID($request)
    {
        $users = json_decode($request->user_name);
        $users_array = Array();
        foreach ($users as $key) {
            array_push($users_array, $key->value);
        }
        $user_ids = Array();
        foreach ($users_array as $key => $val) {
            $name = explode(' ', $val);
            $user = User::where('first_name', '=', $name[0])->first();
            if (!is_null($user)){
                array_push($user_ids, $user->id);
            }
        }
        return $user_ids;
    }

    public function changeStatus($id, $bit)
    {
        Project::where('id', '=', $id)->update([
            'status' => $bit
        ]);
        if ($bit == Project::DE_ACTIVE) {
            $message = 'Project De Active...!';
        } else {
            $message = 'Project Active...!';
        }
        return redirect()->route('list-projects')->with('success', $message);
    }

    public function editProject(Request $request, $id)
    {
        $projectManagers = User::select(['id', 'first_name', 'last_name'])->where('is_admin', '=', User::Client)->get();
        $project = Project::with(['clients','personas' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->where('id', '=', $id)->first();
        $clients = $project->clients;
        $persona = $project->personas;
        $clientNames = implode(',', $clients->pluck('user_name')->toArray());
        $users = $projectManagers->pluck('user_name');
        $contents = Content::whereHas('persona_rel')->where('project_id', '=', $id)->get();
        return view('theme.admin.projects.editProject', [
            'project' => $project,
            'projectManagers' => $projectManagers,
            'clientNames' => $clientNames,
            'users' => $users,
            'Contents' => $contents,
            'tab' => $request->tab,
            'persona' => $persona
        ]);
    }

    public function updateProject(addProject $request)
    {
        $contactId = self::getProjectContactID($request);
        $project = Project::where('id', '=', $request->rowId)->first();
        $project->update([
            'project_name' => $request->p_name,
            'client_website' => $request->website,
            'project_manager_id' => $request->p_manager,
            'voice' => $request->voice,
            'pillars' => implode(',', collect(json_decode($request->pillars))->pluck('value')->toArray()),
            'clusters' => implode(',', collect(json_decode($request->clusters))->pluck('value')->toArray()),
            'status' => $request->status
        ]);
        ProjectContact::where('project_id', '=', $project->id)->delete();
        foreach ($contactId as $key => $val) {
            ProjectContact::create([
                'project_id' => $project->id,
                'project_contact_id' => $val
            ]);
        }

        ActivityLog::saveActivityLog(Auth::user()->id,ActivityLog::TYPE_UPDATE_PROJECT,null,"Project Updated by ".Auth::user()->first_name ."-".Auth::user()->last_name);


        return redirect()->route('list-projects')->with('success', 'project updated...!');
    }

    public function getProject($id)
    {
       $project = Project::where('id','=',$id)->first();
       return collect([
           'project' => $project
       ]);

    }
//    public function viewProject($id)
//    {
//        $projectManagers = User::select(['id', 'first_name', 'last_name'])->where('is_admin','=',User::Client)->get();
//        $project = Project::with('clients')->where('id','=',$id)->first();
//        $clients = $project->clients;
//        $clientNames = implode(',',$clients->pluck('user_name')->toArray());
//        $users = $projectManagers->pluck('user_name');
//        return view('theme.admin.projects.editProject',[
//            'project' => $project,
//            'projectManagers' => $projectManagers,
//            'clientNames' => $clientNames,
//            'users' => $users
//        ]);
//    }
}
