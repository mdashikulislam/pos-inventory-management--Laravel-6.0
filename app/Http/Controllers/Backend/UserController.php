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
}
