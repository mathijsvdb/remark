<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Routing\Controller;
use Auth;


class ProfileController extends Controller {

    /**
     * Update the user's profile.
     *
     * @return Response
     */
    public function profile()
    {
        $user = Auth::user();

        return view("profile", compact('user'));
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

            $user->name = Request::input('name');
            $user->email = Request::input('email');

            $user->save();


            // $upname = Input::get('name');
            // $upemail = Input::get('email');


            // $sql = "UPDATE users SET name= ? email= ? WHERE id= ?";
            // DB::update($sql, array($upname, $upemail, $id));

            return view("profile", compact('user'));
        // }
    }

}