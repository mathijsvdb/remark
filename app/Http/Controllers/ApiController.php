<?php

namespace App\Http\Controllers;


use App\Advertisement;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function developer()
    {
        return view("developer");
    }

    public function getPopularProjects() {

    }

    public function getProjectById($id) {
        $project  = Project::find($id);
        $user     = $project->user;
        $comments = $project->comments->implode('body', ', ');
        $likes    = $project->likes->count();

        $data = [
            'id' => $project->id,
            'title'=> $project->title,
            'url' => url('projects/' . $project->id),
            'image_url' => url('uploads/' . $project->img),
            'author name' => $project->user->firstname . ' ' . $user->lastname,
            'author profile image url' => url('uploads/profilepictures/' . $user->image),
            'comments' => $comments,
            'likes' => $likes,
        ];

        header('Content-type: application/json');
        echo json_encode($data);
    }
}