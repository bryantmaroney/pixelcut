<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addUser;
use App\Http\Requests\updateUser;
use App\Traits\EmailSendTrait;
use App\Traits\GeneralTarit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use EmailSendTrait,GeneralTarit;
    public function newUser()
    {
        return view('theme.admin.users.add-new-user');
    }
    public function contentAssigment()
    {
        return view('theme.admin.users.content-assignment');
    }

    public function listUsers(Request $request)
    {
        $data = User::withTrashed();
        if(isset($request->user)){
            $data->where('first_name','=',$request->user)->orwhere('last_name','=',$request->user);
        }
        if(isset($request->role)){
            $data->where('is_admin','=',$request->role);
        }
        if(isset($request->active)){
            $data->where('status','=',$request->active);
        }
        $data = $data->orderBy('id','desc')->paginate(10);
        return view('theme.admin.users.list-users',[
            'data' => $data
        ]);
    }
    public function myContentAssigment()
    {
        return view('theme.admin.users.my-content-assignments');
    }

    public function insertUser(addUser $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!is_null($user)) {
            return redirect()->back()->with('error', 'email address already exist');
        }
        $message = \DB::transaction(function () use($request) {
            if (isset($request->buttonType1) && !is_null($request->buttonType1)) {
                $newUser = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'is_admin' => $request->is_admin,
                    'status' => $request->status,
                    'password' => bcrypt($request->password)
                ]);
                return 'User created...!';
            } else {
                $newUser = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'is_admin' => $request->is_admin,
                    'status' => $request->status,
                    'password' => bcrypt($request->password),
                    'token' => self::generateRandomStringWithAlPhabet(10)
                ]);
                $link = env('APP_URL').'/setup-pass/'.$newUser->token;
                $html = view('theme.mail.invite', array('email' => $newUser->email, 'username' => $newUser->first_name,'link' => $link))->render();
                $email = self::sendPostmarkEmail($request->email,'Pixel Cut Invite',$html);
                if($email->ErrorCode == 0){
                    return 'User Created and Send Invitation ...!';
                } else {
                    return 'User Created and but email wasn\'t sent...!';
                }
            }
        });

        return redirect()->to(route('list-users'))->with('success', $message);

    }

    public function getV($newUser)
    {
        return  view('theme.mail.invite', array('email' => $newUser->email, 'username' => $newUser->first_name));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('theme.admin.users.editUser',[
            'user' => $user
        ]);
    }
    public function blockUser($id,$bit)
    {
        User::where('id', '=', $id)->update([
            'status' => $bit
        ]);
        if($bit == 0){
            $message = 'User Banned...!';
        }
        else{
            $message = 'User UnBanned...!';
        }
        return redirect()->route('list-users')->with('success', $message);
    }

    public function updateUser(updateUser $request)
    {
        $password = self::checkPassword($request);
        $user =  User::where('id', '=', $request->userId);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'status' => $request->status,
            'password' => $password
        ]);
        return redirect()->to(route('list-users'))->with('success', 'User updated...!');
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

    public function InviteUser($id)
    {
        try {
            $user = User::find($id);
            $html = view('theme.mail.invite', array('email' => $user->email, 'username' => $user->first_name))->render();
            self::sendPostmarkEmail($user->email, 'PixelCut Invitation', $html);
            return redirect()->to(route('list-users'))->with('success', 'Invitation send...!');
        }catch (\Exception $e){
            return redirect()->to(route('list-users'))->with('error', $e->getMessage());
        }
    }

    public function editProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('theme.admin.users.editProfile',[
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
}
