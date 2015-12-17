<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Favorite;
use App\Like;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function filterPopular()
    {
        $projects = DB::table('projects')->select(DB::raw('*, (SELECT count(id) FROM likes WHERE project_id=projects.id) as likes, (SELECT count(id) FROM favorites WHERE project_id=projects.id) as favorites'))
            ->orderBy('likes', 'desc')
            ->orderBy('projects.created_at', 'desc')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->get();

        return response()->json($projects);
    }

    public function filterRecent()
    {
        $projects = DB::table('projects')->select(DB::raw('*, (SELECT count(id) FROM likes WHERE project_id=projects.id) as likes, (SELECT count(id) FROM favorites WHERE project_id=projects.id) as favorites'))
            ->orderBy('projects.created_at', 'desc')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->get();

        return response()->json($projects);
    }

    public function commentProject(Request $request, $project_id) {

        $user = Auth::user();

        $this->validate($request, [
            'comment' => 'required'
        ]);

        //--------------------badge---------------------------//

        $totalComments = DB::table("comments")
            ->where('user_id', $user->id)
            ->where('project_id', $project_id)
            ->count();

        if($totalComments == 4){
            //badgeId + userId naar db sturen
            $badge_id = 3;
            auth::user()->userBadge()->attach($badge_id);
        }
        //--------------------badge---------------------------//

        $comment = new Comment;
        $comment->body = $request->input('comment');
        $comment->user_id = $user->id;
        $comment->project_id = $project_id;
        $comment->new = 1;
        $comment->save();

        $notification = new Notifications;
        $notification->user_id = $user->id;
        $notification->project_id = $project_id;
        $notification->notificationType = 'comment';
        $notification->save();

        $data = [
            'username' => $user->username,
            'fullname' => $user->firstname . ' ' . $user->lastname,
        ];

        if($user->image == 'default.jpg') {
            $data['image'] = '/assets/images/' . $user->image;
        } else {
            $data['image'] = '/uploads/profilepictures/' . $user->image;
        }

        return response()->json($data);
    }

    public function checkUserWithin2Hours($id){
        $timeCreated = DB::table("users")
            ->where('id', $id)
            ->select('created_at')
            ->get();

        $dateCreated = new DateTime($timeCreated[0]->created_at);
        $dateNow = Carbon::now();
        $interval = $dateCreated->diff($dateNow);

        if($interval->format('%a') == 0 && $interval->format('%h') < 2){
            $badge_id = 1;
            User::find($id)->userBadge()->attach($badge_id);
        }
    }
}
