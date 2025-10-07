<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index () 
    {
        $projects = Project::all();

        return view('project_list', compact('projects'));
    }

    public function edit ($id) 
    {
        $project = Project::find($id);
        if ($project == null) {
            $project = new Project();
        }

        return view('project_detail', compact('project'));
    }

    public function add (Request $request)
    {
        $project = Project::find($request->id);
        if ($project == null) {
            $project = new project();
        }

        $project->name = $request->user_name;
        $project->email = $request->user_email;
        $project->password = $request->user_password;
        $project->note = $request->user_note;
        $project->auth = $request->user_auth;
        $project->valid = 1;
//        $user->create_user_id = 0;
//        $user->created = 0;
//        $user->update_user_id = 0;
//        $user->updated = 0;
        $user->save();

        return redirect('project_list/0');
    }
}
