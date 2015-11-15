<?php

namespace App\Http\Controllers;

use DB;
use App\Project;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Requests;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;
use \League\ColorExtractor\Client as ColorExtractor;

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
        $title = Request::input('title');
        $body = Request::input('body');
        $tags = Request::input('tags');
        $image = Input::file('fileToUpload');
        $destinationPath = 'uploads'; // upload path

        //rules
        $file = array(
            'fileToUpload' => $image,
            'title' => $title,
            'body' => $body,
            'tags' => $tags,
        );
        $rules = array(
            'fileToUpload' => 'required|image',
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
        );

        //validator
        $validator = Validator::make($file, $rules);

        //if validator fails
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/projects/add')->withInput()->withErrors($validator);
        }

        //if input is a file upload to destination /uploads
        //else redirect to view with error message
        if($image->isValid()){
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = Auth::user()->username . '_' . rand(11111,99999).'.'.$extension; // renaming image
            Input::file('fileToUpload')->move($destinationPath, $fileName);
        } else {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('/projects/add');
        }

        $project = new Project;

        $project->title = $title;
        $project->body = $body;
        $project->tags = $tags;
        $project->img = $fileName;

        $project->user_id = Auth::id();
        //$project->user_id = 1;
        //$table->increments('id');

        $project->save();
        return redirect('/projects');
    }

    public function showProjectById($id) {
        $project = Project::find($id);
        $user = User::find($project['user_id']);
        $image = $project['img'];

        $client = new ColorExtractor;

        if(str_contains($project['img'], '.png')){
            $imagecolor = $client->loadPng('uploads/' . $image);
        } else if(str_contains($image, '.jpg')){
            $imagecolor = $client->loadJpeg('uploads/' . $image);
        } else{
            return 'nope';
        }

        $palette = $imagecolor->extract(3);

        $comments = DB::table("comments")
        ->where('project_id', $id)
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('users.firstname', 'users.lastname', 'comments.*')
        ->get();



        return view('projects.detailProjects', compact('project', 'user', 'palette', 'comments'));
    }

    public function addComment(Request $request){

        $user = Auth::user();
        $comment = new Comment;

        $comment->body = Request::input('body');
        $comment->user_id = $user->id;
        $comment->project_id = Request::input('project_id');
        $comment->new = 1;

        $comment->save();

        return redirect('projects/' . $comment->project_id);
    }
}
