<?php

namespace App\Http\Controllers;

use App\Badges;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class RewardsController extends Controller
{
    public function countUsers(){
        $badge_id = 1;
        $totalUsers = DB::table("users")
            ->count();

        if($totalUsers<100){
            //badgeId + userId naar db sturen
            $this->AddInDatabase('1', $badge_id);
        }
    }

    public function CheckFirstUploadedProject($id){
        $badge_id = 2;
        $totalProjects = DB::table("projects")
            ->where('user_id', $id)
            ->count();

        if($totalProjects=0){
            //badgeId + userId naar db sturen
            $this->AddInDatabase($id, $badge_id);
        }
    }

    public function checkComments($id, $projectId){
        $badge_id = 3;
        $totalComments = DB::table("comments")
            ->where('user_id', $id)
            ->where('project_id', $projectId)
            ->count();

        if($totalComments >= 4){
            //badgeId + userId naar db sturen
            $this->AddInDatabase($id, $badge_id);
        }
    }

    public function checkUserWithin2Hours($id){
        $badge_id = 4;
        $timeCreated = DB::table("users")
            ->where('id', $id)
            ->select('created_at')
            ->get();

        $dateCreated = new DateTime($timeCreated);
        $dateNow = Carbon::now();
        $interval = $dateCreated->diff($dateNow);

        if($interval->format('%a') == 0 && $interval->format('%h') < 2){
            $this->AddInDatabase($id, $badge_id);
        }
    }

    public function AddInDatabase($user_id, $badge_id){
        $badge = new Badges;

        $totalBadge = DB::table("userbadges")
            ->where('user_id', $user_id)
            ->where('badge_id', $badge_id)
            ->count();

        $badge->user_id = $user_id;
        $badge->badge_id = $badge_id;

        if($totalBadge <= 0){
            $badge->save();
        }
    }

    public function ShowUserRewards(){
        $user = \App\User::find(Auth::id());
        $all_badges = DB::table("userbadges")
            ->where('user_id', $user->id)
            ->get();

        /* DB doesnt contain badges we don't have..
         * $no_badges = DB::table("userbadges")
            ->where('user_id', $user->id)
            ->whereNotIn('badge_id', [1,2,3,4,5,6])
            ->get();
        var_dump($no_badges);
        */

        $userBadges = array();

        //THIS IS A CONSTANT
        $NumberOfBadges = array("1","2","3","4","5");

        foreach ($all_badges as $badges) {
            $badgeID = $badges->badge_id;
            array_push($userBadges, $badgeID);
        }

        //welke ID's zitten er niet in?
        $yettoearn = array_merge(array_diff($userBadges, $NumberOfBadges), array_diff($NumberOfBadges, $userBadges));

        return view( "rewardsProfile",compact('all_badges','yettoearn'));
    }
}
