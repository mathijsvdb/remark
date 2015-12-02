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

    public function getPopularProjects(Request $request) {
        $page     = $request->get('page');
        $perpage  = $request->get('perpage');
        $response = [];

        if((isset($page) && !empty($page) && (isset($perpage) && !empty($perpage)))) {
            $projects = Project::paginate($perpage);

            foreach($projects as $project) {
                $data = [
                    'id' => $project->id,
                    'title' => $project->title,
                    'url' => url('/projects/' . $project->id),
                    'image_url' => url('/uploads/' . $project->img),
                    'author_name' => $project->user->firstname . ' ' . $project->user->lastname,
                    'author_profile_image_url' => url('/uploads/profilepictures/' . $project->user->image),
                    'comments' => $project->comments->implode('body', ',  '),
                    'likes' => $project->likes->count()
                ];

                array_push($response, $data);
            }

            header('Content-type: application/json');
            echo json_encode($response);
        }
        else
        {
            return 'Use the page and perpage parameters for this request (/popular?page=1&perpage=10)';
        }




    }

    public function getProjectById($id) {
        $project  = Project::findOrFail($id);
        $user     = $project->user;
        $comments = $project->comments->implode('body', ', ');
        $likes    = $project->likes->count();

        $data = [
            'id' => $project->id,
            'title'=> $project->title,
            'url' => url('projects/' . $project->id),
            'image_url' => url('uploads/' . $project->img),
            'author_name' => $project->user->firstname . ' ' . $user->lastname,
            'author_profile_image_url' => url('uploads/profilepictures/' . $user->image),
            'comments' => $comments,
            'likes' => $likes,
        ];

        header('Content-type: application/json');
        echo json_encode($data);
    }
}