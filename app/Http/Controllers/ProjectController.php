<?php

namespace App\Http\Controllers;

use DB;
use App\Project;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
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
        $client = new ColorExtractor;
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



        if($extension == 'png'){
            $pimage = $client->loadPng('uploads/' . $fileName);
        } else if($extension == 'jpg'){
            $pimage = $client->loadJpeg('uploads/' . $fileName);
        } else{
            return 'wrong image';
        }

        $image_tricolor = $pimage->extract(3);
        $tricolor_correct = str_replace('#', '', "".$image_tricolor[0].",".$image_tricolor[1].",".$image_tricolor[2]);
        $project->img_tricolor = $tricolor_correct;


        $project->user_id = Auth::id();
        //$project->user_id = 1;
        //$table->increments('id');

        $project->save();
        return redirect('/projects');
    }

    public function showProjectById($id) {
        $project = Project::find($id);
        $user = User::find($project['user_id']);

        $colors = $project['img_tricolor'];
        $colorpieces = explode(",",$colors);

        $comments = DB::table("comments")
        ->where('project_id', $id)
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('users.firstname', 'users.lastname', 'comments.*')
        ->get();

        return view('projects.detailProjects', compact('project', 'user', 'colorpieces', 'comments'));
    }

    /**
     * Function to like a project
     */
    public function likeProject($project_id) {
        // check is a user has already liked this project
        $result = DB::table('likes')->where('user_id', '=', Auth::id())
            ->where('project_id', '=', $project_id)
            ->get();

        if($result) {
            Session::flash('error', 'You have already liked this project.');
        } else {
            DB::table('likes')->insert([
                'user_id' => Auth::id(),
                'project_id' => $project_id
            ]);
        }

        return redirect('/projects/' . $project_id);
    }

    /**
     * Function to favorite a project
     */
    public function favoriteProject($project_id)
    {
        // check if a user has already favorited this project.

        $result = DB::table('favorites')->where('user_id', '=', Auth::id())->where('project_id', '=', $project_id)->get();

        if ($result) {
            Session::flash('error', 'You have already favorited this project.');
        } else {
            DB::table('favorites')->insert([
                'user_id' => Auth::id(),
                'project_id' => $project_id
            ]);
        }

        return redirect('/projects/' . $project_id);
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

    public function SearchByColor($colorid){

        $projectsByColor = DB::table("projects")
            ->where('img_tricolor', 'LIKE','%'.$colorid.'%')
            ->get();

        return view('projects.searchProjectsColor', compact('projectsByColor'));
    }
}
