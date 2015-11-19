<?php
namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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

        return view("profile", compact('user', 'projects'));
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
        $rules = array('fileToUpload' => 'image');

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

        $user->save();

        return redirect("profile/" . $user->id);
    }

    public function showMyFavorites()
    {
        $user = Auth::user();

        $myFavorites = DB::table('favorites')


        $projectsByColor = DB::table("projects")
            ->where('img_tricolor', 'LIKE','%'.$colorid.'%')
            ->get();


    }
}