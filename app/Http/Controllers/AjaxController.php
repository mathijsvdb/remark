<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Like;
use App\Project;
use App\User;
use App\Notifications;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function likeProject($project_id) {
        $user_liked = Like::where('project_id', $project_id)->where('user_id', Auth::id())->take(1)->get();

        if(count($user_liked) > 0)
        {
            $data = [
                'feedback' => 'You already liked the project.',
            ];
        }
        else
        {
            $user = Auth::user();
            $notification = new Notifications;

            $notification->user_id = $user->id;
            $notification->project_id = $project_id;
            $notification->notificationType = 'like';
            $notification->save();

            $like = new Like;
            $like->user_id = Auth::id();
            $like->project_id = $project_id;
            $like->save();

            $data = [
                'feedback' => 'You like the project.',
                'likes' => Like::where('project_id', $project_id)->count(),
            ];
        }

        return response()->json($data);
    }

    public function unlikeProject($project_id) {
        Like::where('user_id', Auth::id())->where('project_id', $project_id)->delete();

        $data = [
            'feedback' => 'You unlike the project.',
            'likes' => Like::where('project_id', $project_id)->count(),
        ];

        return response()->json($data);
    }

    public function favoriteProject($project_id) {
        $user_favorited = Favorite::where('project_id', $project_id)->where('user_id', Auth::id())->take(1)->get();

        if(count($user_favorited) > 0)
        {
            $data = [
                'feedback' => 'You already favorited the project.',
            ];
        }
        else
        {
            $user = Auth::user();
            $notification = new Notifications;

            $notification->user_id = $user->id;
            $notification->project_id = $project_id;
            $notification->notificationType = 'favorite';
            $notification->save();

            $favorite = new Favorite;
            $favorite->user_id = Auth::id();
            $favorite->project_id = $project_id;
            $favorite->save();

            $data = [
                'feedback' => 'You favorite the project.',
                'favorites' => Favorite::where('project_id', $project_id)->count(),
            ];
        }

        return response()->json($data);
    }

    public function unfavoriteProject($project_id) {
        Favorite::where('user_id', Auth::id())->where('project_id', $project_id)->delete();

        $data = [
            'feedback' => 'You unfavorite the project.',
            'favorites' => Favorite::where('project_id', $project_id)->count(),
        ];

        return response()->json($data);
    }

    public function filterPopular(){
        $popular = DB::table('projects')->select(DB::raw('*, (SELECT count(id) FROM likes WHERE project_id=projects.id) as likes'))
            ->orderBy('likes', 'desc')
            ->get();

        return view("projects", compact('popular'));
    }
}
