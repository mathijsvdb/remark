<?php

namespace App\Http\Controllers\API;

use App\Apikey;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
    public function index()
    {
        return response()->json([
            'error'     => 'parameters not defined.',
            'more info' => url('developers'),
        ], 400);
    }

    public function getProjectById(Request $request, $id) {
        $key = $request->input('key');

        if($key) {
            $is_valid = Apikey::where('apikey', '=', $key)->get();

            if($is_valid) {
                $project  = Project::find($id);

                if(count($project) > 0) {
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

                    return response()->json($data, 200);
                } else {
                    return response()->json(['error' => 'no project with that ID'], 400);
                }
            } else {
                return response()->json(['error' => 'invalid API key'], 400);
            }
        } else {
            return response()->json(['error' => 'API key not found'], 400);
        }
    }

    public function getPopularProjects(Request $request) {
        $key = $request->input('key');

        if($key) {
            $is_valid = Apikey::where('apikey', '=', $key)->get();

            if($is_valid) {
                $page     = $request->get('page');
                $perpage  = $request->get('perpage');
                $data     = [];

                if((isset($page) && !empty($page) && (isset($perpage) && !empty($perpage)))) {
                    $projects = Project::paginate($perpage);

                    $links = [
                        'previous' => $projects->previousPageUrl() . '&perpage=' . $perpage,
                        'self'     => $projects->url($projects->currentPage() . '&perpage=' . $perpage),
                        'next'     => $projects->nextPageUrl() . '&perpage=' . $perpage,
                        'last'     => $projects->url($projects->lastPage() . '&perpage=' . $perpage),
                    ];

                    foreach($projects as $project) {
                        $info = [
                            'id' => $project->id,
                            'title' => $project->title,
                            'url' => url('/projects/' . $project->id),
                            'image_url' => url('/uploads/' . $project->img),
                            'author_name' => $project->user->firstname . ' ' . $project->user->lastname,
                            'author_profile_image_url' => url('/uploads/profilepictures/' . $project->user->image),
                            'comments' => $project->comments->implode('body', ',  '),
                            'likes' => $project->likes->count()
                        ];

                        array_push($data, $info);
                    }

                    $sorted = [];

                    foreach($data as $items => $item) {
                        $sorted[$items] = $item['likes'];
                    }

                    array_multisort($sorted, SORT_DESC, $data);

                    $response = [
                        'links' => $links,
                        'data'  => $data
                    ];

                    return response()->json($response, 200);
                }
                else
                {
                    return response()->json(['error' => 'page and perpage URL parameters not defined'], 400);
                }
            } else {
                return response()->json(['error' => 'invalid API key'], 400);
            }
        } else {
            return response()->json(['error' => 'API key not found'], 400);
        }
    }
}
