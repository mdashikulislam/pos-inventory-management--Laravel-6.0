<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function view()
    {
        $users = User::all();
        return view('backend.user.view')->with([
            'users'=>$users
        ]);
    }
    public function addUser(){
        return view('backend.user.add-user');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'usertype'=>['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.view')->with([
            'success'=>'User Added Successfully'
        ]);
    }
}
