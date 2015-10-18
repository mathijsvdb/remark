<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function showAllProjects() {
        $projects = Project::all();

        return view('projects', compact('projects'));
    }

    public function getAddProject() {
        return view('addProject');
    }

    public function postAddProject() {
        $project = new Project;

        $project->title = Request::input('title');
        $project->body = Request::input('body');
        $project->tags = Request::input('tags');
        $project->img = Request::input('fileToUpload');

        $project->user_id = Auth::id();
        //$project->user_id = 1;
        //$table->increments('id');

        $project->save();

        return redirect('/projects');
    }

    public function showProjectById($id) {
        $project = Project::find($id);

        return $project->title;
        return $project->img;
    }
}
