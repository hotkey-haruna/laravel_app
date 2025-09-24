<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class IndexController extends Controller
{
    public function index () 
    {
        $users = User::where('valid', 1)->get();

        return view('index', compact('users'));
    }
}

