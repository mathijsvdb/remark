<?php
namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Request;
use Illuminate\Routing\Controller;
use Auth;


class ProfileController extends Controller {

    /**
     * Update the user's profile.
     *
     * @return Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        $projects = Project::where('user_id', $id)->get();

        $badges = DB::table("userbadges")
            ->join('badges', 'badge_id' , '=' , 'badges.id')
            ->where('user_id', $id)
            ->orderBy('created_at', 'asc')
            ->take(3)
            ->get();


        return view("profile", compact('user', 'projects', 'badges'));
    }

    public function updateProfile(Request $request)
    {
        // if ($request->user())
        // {
            $user = Auth::user();

            return view("update", compact('user'));
        // }
    }

    public function postProfile()
    {
        $user = \App\User::find(Auth::id());
        $image = Input::file('fileToUpload');
        $destinationPath = 'uploads/profilepictures';
        $oldfile = $user->image;

        $file = array('fileToUpload' => $image);
        $rules = array('fileToUpload' => 'image|mimes:jpeg,png');

        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            return Redirect::to('/update')->withInput()->withErrors($validator);
        }

        if(!empty($image)){
            if($image->isValid()){
                $extension = $image->getClientOriginalExtension();
                $fileName = Auth::user()->username.'.'.$extension;
                File::delete('uploads/profilepictures/' . $oldfile);
                Input::file('fileToUpload')->move($destinationPath, $fileName);
                $user->image = $fileName;
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/update');
            }
        } else {
            $user->image = $oldfile;
        }

        $user->firstname = ucfirst(Request::input('firstname'));
        $user->lastname = ucfirst(Request::input('lastname'));
        $user->email = Request::input('email');
        $user->bio = Request::input('bio');
        $user->facebook = Request::input('facebook');
        $user->twitter = Request::input('twitter');
        $user->website = Request::input('website');
        
        if (Input::get('commentmail_yes') === 'yes') {
            $user->comment_mail = 1;
        } else {
            $user->comment_mail = 0;
        }

        if (Input::get('highlightmail_yes') === 'yes') {
            $user->highlight_mail = 1;
        } else {
            $user->highlight_mail = 0;
        }

        $user->save();

        return redirect("profile/" . $user->id);
    }

    public function showFavorites($user_id)
    {
        $myFavorites = DB::table('favorites')
            ->where('favorites.user_id', '=', $user_id)
            ->join('projects', 'projects.id', '=', 'favorites.project_id')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->select('projects.*', 'users.username')
            ->get();

        return view('myFavorites', compact('myFavorites'));
    }
}