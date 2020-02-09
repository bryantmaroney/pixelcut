<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->is_admin == User::Admin){
            return redirect(route('team-dash'));
        } elseif(\Auth::user()->is_admin == User::Writter) {
            return redirect(route('writter-dash'));
        }
        else{
            return redirect(route('client-dash'));
        }
    }
}
