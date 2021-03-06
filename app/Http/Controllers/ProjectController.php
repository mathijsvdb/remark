<?php

namespace App\Http\Controllers;

use App\Badges;
use App\Battle;
use App\Favorite;
use App\Like;
use Carbon\Carbon;
use DateTime;
use DB;
use App\Project;
use App\User;
use App\Comment;
use App\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Request;
use App\Http\Requests;
use Validator;
use Redirect;
use MandrillMail;
use App\Http\Controllers\Controller;
use \League\ColorExtractor\Client as ColorExtractor;

class ProjectController extends Controller
{
    public function showAllProjects() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(20);

        return view('projects.projects', compact('projects'));
    }

    public function getAddProject() {
        $battles = Battle::where('active', true)->get();

        return view('projects.addProject', compact('battles'));
    }

    public function postAddProject() {
        $title = Request::input('title');
        $body = Request::input('body');
        $tags = Request::input('tags');
        $image = Input::file('fileToUpload');
        $destinationPath = 'uploads/'; // upload path
        $client = new ColorExtractor;
        //rules
        $file = array(
            'fileToUpload' => $image,
            'title' => $title,
            'body' => $body,
            'tags' => $tags,
        );
        $rules = array(
            'fileToUpload' => 'required|image|mimes:jpeg,png',
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
            $img = Image::make($image);
            $img->fit(500,500)->crop(500, 500, 0, 0)->save($destinationPath . $fileName);
        } else {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('/projects/add');
        }


        $project = new Project;
        if(strlen($title) <= 50){
            $project->title = $title;
        } else {
            return Redirect::to('/projects/add')->withInput()->withErrors("Title is too long, max 50 characters");
        }

        $project->body = $body;
        $project->tags = $tags;
        $project->img = $fileName;

        //add battle_id if user participates in battle
        $battle_id = Request::input('battle');

        if($battle_id != "") {
            $project->battle_id = $battle_id;
        }

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
        $this->CheckUploadedProject(Auth::id());
        $project->save();

        return redirect('/projects');
    }

    public function showProjectById($id) {
        $project = Project::find($id);
        $tags = explode(',', $project->tags);
        $likes = $project->likes->count();
        $favorites = $project->favorites->count();

        $user = User::find($project['user_id']);

        $colors = $project['img_tricolor'];
        $colorpieces = explode(",",$colors);

        // check if current user liked project
        $user_liked = DB::table('likes')->where('user_id', '=', Auth::id())
                                        ->where('project_id', '=', $project->id)
                                        ->get();

        $user_favorited = DB::table('favorites')->where('user_id', '=', Auth::id())
            ->where('project_id', '=', $project->id)
            ->get();

        $comments = DB::table("comments")
        ->where('comments.deleted_at', '=', NULL)
        ->where('project_id', $id)
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('users.firstname', 'users.lastname', 'comments.*', 'users.image', 'users.username')
            ->orderBy('created_at', 'desc')
        ->get();

        return view('projects.detailProject', compact('project', 'user', 'colorpieces', 'comments', 'likes', 'favorites', 'user_liked', 'user_favorited', 'tags'));
    }

    /**
     * Function to like a project
     */
    public function likeProject($project_id) {
        $user_liked = Like::where('project_id', $project_id)->where('user_id', Auth::id())->take(1)->get();

        $user = Auth::user();
        $notification = new Notifications;

        $notification->user_id = $user->id;
        $notification->project_id = $project_id;
        $notification->notificationType = 'like';
        $notification->save();

        if(count($user_liked) > 0)
        {
            return Redirect::back();
        }
        else
        {
            $like = new Like;
            $like->user_id = Auth::id();
            $like->project_id = $project_id;
            $like->save();

            return Redirect::back();
        }
    }

    public function unlikeProject($project_id) {
        Like::where('user_id', Auth::id())->where('project_id', $project_id)->delete();
        return Redirect::back();
    }

    /**
     * Function to favorite a project
     */
    public function favoriteProject($project_id)
    {
        $user_favorited = Favorite::where('project_id', $project_id)->where('user_id', Auth::id())->take(1)->get();

        if(count($user_favorited) > 0)
        {
            return Redirect::back();
        }
        else
        {
            $favorite = new Favorite;
            $favorite->user_id = Auth::id();
            $favorite->project_id = $project_id;
            $favorite->save();

            return Redirect::back();
        }
    }

    public function unfavoriteProject($project_id) {
        Favorite::where('user_id', Auth::id())->where('project_id', $project_id)->delete();
        return Redirect::back();
    }

    public function addComment(Request $request, $id){

        $user = Auth::user();
        $comment = new Comment;

        $comment->body = Request::input('body');
        $comment->user_id = $user->id;
        $comment->project_id = $id;
        $comment->new = 1;

        $comment->save();
        $this->checkComments($user->id, Request::input('project_id'));

        $result = DB::table('projects')
            ->where('projects.id','=', $id )
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->select('users.*', 'projects.*')
            ->first();

        $notification = new Notifications;

        $notification->user_id = $user->id;
        $notification->project_id = $id;
        $notification->notificationType = 'comment';
        $notification->save();


        if($result->comment_mail == 1){

        $template_content = [];

            $message = [
                'subject' => 'Notification alert',
                'from_email' => 'RemarkTeam@remark.com',
                'from_name' => 'Remark',
                'to' => array(
                    array(
                        'email' => $result->email,
                        'name' => $result->firstname . " " . $result->lastname,
                        'type' => 'to'
                    )
                ),
                'merge_vars' => array(
                    array(
                        'rcpt' => $result->email,
                        'vars' => array(
                            array(
                                'name' => 'COMMENT',
                                'content' =>  Request::input('body'),

                            ),
                            array(
                                'name' => 'COMMENTERNAME',
                                'content' => $user->firstname . " " . $user->lastname,
                            ),
                            array(
                                'name' => 'FIRSTNAME',
                                'content' => $result->firstname . " " . $result->lastname,
                            )
                        )
                    )
                )
            ];

        MandrillMail::messages()->sendTemplate('remark-comment', $template_content, $message);
    }
    
        $this->checkUserWithin2Hours($user->id);
        return redirect('projects/' . $comment->project_id);
    }

    public function deleteProject($project_id) {
        $project = Project::find($project_id);

        $project->forceDelete();
        File::delete('uploads/' . $project->img);

        return redirect("/projects");
    }

    public function getEditProject($project_id) {
        $project = Project::find($project_id);

        return view('projects/editProject', compact('project'));
    }

    public function postEditProject($project_id)
    {
        $project = Project::find($project_id);
        $oldimage = $project->img;
        $oldtricolor = $project->img_tricolor;
        $title = Request::input('title');
        $body = Request::input('body');
        $tags = Request::input('tags');
        $image = Input::file('fileToUpload');
        $destinationPath = 'uploads/';
        $client = new ColorExtractor;
        //rules
        $file = array(
            'fileToUpload' => $image,
            'title' => $title,
            'body' => $body,
            'tags' => $tags,
        );
        $rules = array(
            'fileToUpload' => 'image',
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
        );

        //validator
        $validator = Validator::make($file, $rules);

        //if validator fails
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/projects/' . $project_id . '/edit')->withInput()->withErrors($validator);
        }

        //if input is a file upload to destination /uploads
        //else redirect to view with error message
        if($image == ""){
            $fileName = $oldimage;
        }else {
            if($image->isValid()){
                $extension = $image->getClientOriginalExtension(); // getting image extension
                $fileName = Auth::user()->username . '_' . rand(11111,99999).'.'.$extension; // renaming image
                File::delete('uploads/' . $project->img);
                $img = Image::make($image);
                $img->fit(500,500)->crop(500, 500, 0, 0)->save($destinationPath . $fileName);
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/projects/' . $project_id . '/edit');
            }
        }

        $project->title = $title;
        $project->body = $body;
        $project->tags = $tags;
        $project->img = $fileName;

        if($image == ""){
            $tricolor_correct = $oldtricolor;
        }else {
            if($extension == 'png'){
                $pimage = $client->loadPng('uploads/' . $fileName);
            } else if($extension == 'jpg'){
                $pimage = $client->loadJpeg('uploads/' . $fileName);
            } else{
                return 'wrong image';
            }

            $image_tricolor = $pimage->extract(3);
            $tricolor_correct = str_replace('#', '', "".$image_tricolor[0].",".$image_tricolor[1].",".$image_tricolor[2]);
        }

        $project->img_tricolor = $tricolor_correct;
        $project->user_id = Auth::id();

        $project->save();

        return redirect('/projects/' . $project_id);
    }

    public function SearchByColor($colorid){

        $projectsByColor = DB::table("projects")
            ->where('img_tricolor', 'LIKE','%'.$colorid.'%')
            ->get();

        return view('projects.searchProjectsColor', compact('projectsByColor'));
    }


    //badges

    public function CheckUploadedProject($id){
        $totalProjects = DB::table("projects")
            ->where('user_id', $id)
            ->count();

        if($totalProjects == 0){
            //badgeId + userId naar db sturen
            $badge_id = 4;
            User::find($id)->userBadge()->attach($badge_id);
        } else if($totalProjects >=49){
            $badge_id = 5;
            User::find($id)->userBadge()->attach($badge_id);
        }
    }

    public function spam($id){
        
        $project = Project::find($id);

        $project->spam ++;

        $project->save();

        if($project->spam >= 5){

            $project->delete();
            return redirect('/');
        }

        return Redirect::to('/projects/' . $id);

    }

    public function spamComment($id){
        
        $comment = Comment::find($id);

        $comment->spam ++;

        $comment->save();

        if($comment->spam >= 5){

            $comment->delete();
            return redirect::back();
        }

        return Redirect::back();

    }

}
