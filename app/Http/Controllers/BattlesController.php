<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Http\Requests;
use App\Project;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BattlesController extends Controller
{
    public function getBattles()
    {
        $active_battle = Battle::where('active', true)->first();
        //$battle_projects = DB::table('projects')->where('battle_id', $active_battle->id)->get();

        $inactive_battle = Battle::where('active', false)->first();

        $done_battles = DB::table('projects')->select(DB::raw('*, (SELECT count(id) FROM likes WHERE project_id=projects.id) as likes'))
            ->where('battle_id', '=', $inactive_battle->id)
            ->orderBy('likes', 'desc')
            ->take(3)
            ->get();

        $battle_projects = DB::table('projects')->select(DB::raw('*, (SELECT count(id) FROM likes WHERE project_id=projects.id) as likes'))
                                                ->where('battle_id', '=', $active_battle->id)
                                                ->orderBy('likes', 'desc')
                                                ->get();

        return view('battles', compact('active_battle', 'battle_projects', 'done_battles', 'inactive_battle'));
    }

}
