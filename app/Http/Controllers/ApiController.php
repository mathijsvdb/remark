<?php

namespace App\Http\Controllers;


use App\Advertisement;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    public function developer()
    {
        return view("developer");
    }

    public function getPopularProjects() {

        $projects = [];
        $page = Input::get('page', 1);
        $perpage = Input::get('perpage', 200);
        $offset = ($perpage * $page) - $perpage;

        foreach(Project::with('user', 'comments', 'likes')->take($perpage)->skip($offset)->get() as $project){
            $data = [
                'id' => $project->id,
                'title' => $project->title,
                'url' => url('/projects/' . $project->id),
                'image_url' => url('/uploads/' . $project->img),
                'author_name' => $project->user->firstname . ' ' . $project->user->lastname,
                'author_profile_picture' => url('/uploads/profilepictures/' . $project->user->image),
                'comments' => $project->comments->implode('body', ',  '),
                'likes' => $project->likes->count()
            ];
            array_push($projects, $data);
        }

        echo json_encode($projects);
    }

    public function getProjectById() {

    }
}