<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function view()
    {
        $profile =  Auth::user();
       return view('backend.profile.view')->with([
           'profile'=>$profile
       ]);
    }

    public function edit($id)
    {
        $profile = User::findOrFail($id);
        return view('backend.profile.edit')->with([
            'profile'=>$profile
        ]);
    }

    public function update($id,Request $request)
    {

        $info = User::findOrFail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$info->id],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:13|min:11'
        ]);
        $info->name = $request->name;
        $info->email = $request->email;
        $info->mobile = $request->mobile;
        $info->address = $request->address;
        $info->gender = $request->gender;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/'.$info->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/user_images',$filename);
            $info['image'] = $filename;
        }
        $info->save();
        toast('Profile Update Successfully','success');
        return redirect()->route('profile.view');

    }

    public function changePassword()
    {
        return view('backend.profile.change-password');
    }

    public function passwordUpdate(Request $request)
    {
        if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::findOrFail(\auth()->id());
            $user->password = bcrypt($request->password);
            $user->save();
            toast('Password Change Successfully','success');
            return redirect()->route('profile.change_password');
        }else{
            toast('Current password dose not match','warning');
            return redirect()->route('profile.change_password');
        }


    }
}
