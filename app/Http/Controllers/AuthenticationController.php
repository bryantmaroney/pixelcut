<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function forgotPassword()
    {
        return view('theme.login.forgot-pass');
    }
    public function login()
    {
        return view('theme.login.login');
    }
    public function newUserPass()
    {
        return view('theme.login.newuser-pass');
    }
    public function setupPass()
    {
        return view('theme.login.setup-pass');
    }
}
