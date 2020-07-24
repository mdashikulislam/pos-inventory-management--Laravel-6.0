<?php

namespace App\Http\Controllers\Backend;

use Alert;
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
        toast('User Added Successfully','success');
//        Alert::success('Add User', 'User Added Successfully');
        return redirect()->route('users.view');

    }

    public function edit($id)
    {
        $user = User::where(['id'=>$id])->first();

        return view('backend.user.edit-user')->with([
            'user'=>$user
        ]);
    }

    public function update($id,Request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'usertype'=>['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toast('User Update Successfully','success');
        return redirect()->route('users.view');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete($user);
        if (file_exists('public/upload/user_images/'. $user->image) AND !empty($user->image)){
            unlink('public/upload/user_images/'.$user->image);
        }
        toast('User Delete Successfully','success');
        return redirect()->route('users.view');
    }
}
