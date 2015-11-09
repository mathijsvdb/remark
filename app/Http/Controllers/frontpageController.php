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

        //print_r($spotlight);

        return view("frontpage", compact('spotlight'));
    }

    public function search() {
        var_dump($_POST);

        print_r($_POST);



       /*
        //$q = Input::get('search');
        $searchTerms = explode(' ', $q);
        $query = DB::table('projects');

        foreach($searchTerms as $term)
        {
            $query->where('title', 'LIKE', '%'. $term .'%')
                  ->orWhere('tags', 'LIKE', '%'. $term .'%')
                  ->orWhere('body', 'LIKE', '%'. $term .'%');

            //->orWhere('tags', 'LIKE', "%{$term}%")
        }

        $projects = $query->get();

        //return View::make('projects', compact('projects'));
        return view('search')->with('projects', $projects);*/
    }

    public function filterbytag() {

       //
    }


}
