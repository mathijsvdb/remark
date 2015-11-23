<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;

class frontpageController extends Controller
{

    public function frontpage()
    {
        $spotlight = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.user_id')
            ->select('users.username','projects.*')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view("frontpage", compact('spotlight'));
    }

}
