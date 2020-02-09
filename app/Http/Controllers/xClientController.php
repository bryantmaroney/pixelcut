<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        dd("1");
      return view('theme.client.dashboard.client-dash');
    }
    public function dashContent()
    {
        return view('theme.client.dashboard.client-dash-content');
    }
    public function dashPersonas()
    {
        return view('theme.client.dashboard.client-dash-personas');
    }
    public function dashProject()
    {
        return view('theme.client.dashboard.client-dash-project');
    }
}
