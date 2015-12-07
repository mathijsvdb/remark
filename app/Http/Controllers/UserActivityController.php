<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Notifications;
use DB;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{
    public function showAllActivity(Request $request) {
        $user = User::find(Auth::id());

        // $myNotifications = DB::table('notifications')
        //     ->where('notifications.user_id', '=', $user->id)
        //     ->orWhere('projects.user_id','=',$user->id)
        //     ->join('projects', 'projects.id', '=', 'notifications.project_id')
        //     ->join('users', 'users.id', '=', 'projects.user_id')
        //     ->select('notifications.*', 'users.firstname', 'users.lastname', 'projects.title')
        //     ->get();

         $myNotifications = DB::table('notifications')
        ->where('notifications.user_id', '=', $user->id)
        ->join('projects', 'projects.id', '=', 'notifications.project_id')
        ->join('users', 'users.id', '=', 'projects.user_id')
        ->select('notifications.*', 'users.firstname', 'users.lastname', 'projects.title')
        ->get();

        $othersNotifications = DB::table('notifications')
            ->where('projects.user_id','=',$user->id)
            ->join('projects', 'projects.id', '=', 'notifications.project_id')
            ->join('users', 'users.id', '=', 'notifications.user_id')
            ->select('notifications.*', 'users.firstname', 'users.lastname', 'projects.title')
            ->get();

        $result = array_merge($myNotifications, $othersNotifications);

        return view('UserActivity', compact('users', 'result'));
    }
}