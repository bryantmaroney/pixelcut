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
        $project = ProjectContact::with(['project.clients', 'project.personas'])->where('project_contact_id', '=', \Auth::user()->id)->first();
        $project = is_null($project) ? null : $project->project;
        $persona = isset($project->personas) ? $project->personas : '';
        if(!is_null($project)) {
            $contents = Content::where('project_id', '=', $project->id)->get();
            $clients = $project->clients;
            $clientNames = implode(',', $clients->pluck('user_name')->toArray());
        } else {
            $contents = [];
            $clients = '';
            $clientNames = '';
        }
        $projectManagers = User::select(['id', 'first_name', 'last_name'])->where('is_admin', '=', User::Client)->get();
        $users = $projectManagers->pluck('user_name');

        return view('theme.client.dashboard.client-dash', [
            'project' => $project,
            'Contents' => $contents,
            'projectManagers' => $projectManagers,
            'clientNames' => $clientNames,
            'users' => $users,
            'persona' => $persona
        ]);
    }
}
