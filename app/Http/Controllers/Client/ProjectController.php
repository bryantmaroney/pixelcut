<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\addProject;
use App\Models\Content;
use App\Models\Project;
use App\Models\ProjectContact;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class ProjectController extends Controller
{
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
            array_push($user_ids, $user->id);
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
        return redirect()->back()->with('success', 'project updated...!');
    }

}
