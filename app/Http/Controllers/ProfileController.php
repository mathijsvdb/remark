<?php
namespace App\Http\Controllers;

use App\Project;
use App\User;
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
        // if ($request->user())
        // {
            $user = \App\User::find(Auth::id());

            $user->firstname = ucfirst(Request::input('firstname'));
            $user->lastname = ucfirst(Request::input('lastname'));
            $user->email = Request::input('email');
            $user->bio = Request::input('bio');
            $user->facebook = Request::input('facebook');
            $user->twitter = Request::input('twitter');
            $user->website = Request::input('website');

            $user->save();


            // $upname = Input::get('name');
            // $upemail = Input::get('email');


            // $sql = "UPDATE users SET name= ? email= ? WHERE id= ?";
            // DB::update($sql, array($upname, $upemail, $id));

            return redirect("profile/" . $user->id);
        // }
    }

}