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

}
