<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index () 
    {
        $users = User::all();

        return view('user_list', compact('users'));
    }

    public function edit ($id) 
    {
        $user = User::find($id);
        if ($user == null) {
            $user = new User();
        }

        return view('user_detail', compact('user'));
    }

    public function add (Request $request)
    {
        $user = User::find($request->id);
        if ($user == null) {
            $user = new User();
        }

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->user_password);
        $user->note = $request->user_note;
        $user->auth = $request->user_auth;
        $user->valid = 1;
//        $user->create_user_id = 0;
//        $user->created = 0;
//        $user->update_user_id = 0;
//        $user->updated = 0;
        $user->save();

        return redirect('user_list/0');
    }

}
