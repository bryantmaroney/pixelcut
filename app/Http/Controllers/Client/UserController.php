<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Project;
use App\Traits\EmailSendTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use EmailSendTrait;

    public function contentAssigment($id)
    {
        $content = Content::with('project','article')->where('id','=',$id)->first();
        return view('theme.client.content.content-assignment',[
            'content' =>  $content,
            'article' => $content->article->first()
        ]);
    }

    public function myContentAssigment()
    {
        return view('theme.admin.users.my-content-assignments');
    }

    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('theme.client.users.editProfile',[
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $password = self::checkPassword($request);
        $user =  User::where('id', '=', $request->userId);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $password
        ]);
        return redirect()->back()->with('success', 'Profile updated...!');
    }

    public function checkPassword($request){
        if(is_null($request->password)){
            $userPassword = User::userPassword($request);
            $password =  $userPassword->password;
        } else {
            $password = Hash::make($request->password);
        }
        return $password;
    }
}
