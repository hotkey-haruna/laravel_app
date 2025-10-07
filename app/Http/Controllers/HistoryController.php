<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HistoryController extends Controller
{
    public function index () 
    {
        $users = "";//DB::table('users')->get()->toArray();
        $hello = 'Hello,World!';
        $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];

        return view('index', compact('users'));
    }
}
