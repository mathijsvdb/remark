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
    public function ShowUserRewards(){
        $user = \App\User::find(Auth::id());
        $all_badges = DB::table("userbadges")
            ->where('user_id', $user->id)
            ->get();

        $userBadges = array();
        $NumberOfBadges = array();

        $all_badges_in_DB = DB::table("badges")
            ->get();

        for($i = 0, $c = count($all_badges_in_DB); $i < $c; $i++){
            array_push($NumberOfBadges, $i+1);
            //+1 voor de IDs
        }

        foreach ($all_badges as $badges) {
            $badgeID = $badges->badge_id;
            array_push($userBadges, $badgeID);
        }

        //welke ID's zitten er niet in?
        $yettoearn = array_merge(array_diff($userBadges, $NumberOfBadges), array_diff($NumberOfBadges, $userBadges));

        return view( "rewardsProfile",compact('all_badges','yettoearn'));
    }
}
