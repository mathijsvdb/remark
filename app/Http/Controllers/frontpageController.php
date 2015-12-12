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
        $spotlight = Project::orderBy('created_at', 'DESC')->take(20)->get();;

        return view("newdesign.frontpage", compact('spotlight'));
    }

}
