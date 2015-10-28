<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
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

        $project->img_tricolor = "".$image_tricolor[0].",".$image_tricolor[1].",".$image_tricolor[2];


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

        return view('projects.detailProjects', compact('project', 'user', 'palette'));
    }
}
