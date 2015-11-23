<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{
    public function showAllActivity() {
        //$activity = Activity::all();
        //return view('projects', compact('activity'));

        return view('UserActivity');
    }

    public function activityFilter(Request $request) {
        $likes = $request->all();
        $user = User::find($p_id);
        if($likes->selected()){
            $likes = DB::table("likes")
            ->where('project_id', $p_id)
            ->join('users', 'users.id', '=', 'likes.user_id')
            ->select('users.firstname', 'users.lastname', 'likes.*')
            ->get();
        }

    }

}
