<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ProjectContact;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $project = (ProjectContact::with('project.clients')->where('project_contact_id', '=', \Auth::user()->id)->first());
        $project = is_null($project) ? null : $project->project;
        $contents = Content::where('project_id', '=', $project->id)->get();
        $projectManagers = User::select(['id', 'first_name', 'last_name'])->where('is_admin', '=', User::Client)->get();
        $clients = $project->clients;
        $clientNames = implode(',', $clients->pluck('user_name')->toArray());
        $users = $projectManagers->pluck('user_name');

        return view('theme.client.dashboard.client-dash', [
            'project' => $project,
            'Contents' => $contents,
            'projectManagers' => $projectManagers,
            'clientNames' => $clientNames,
            'users' => $users,
        ]);
    }
}
