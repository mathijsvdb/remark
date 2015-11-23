<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search()
    {
        return view("search");
    }

    public function searchFrontpage(Request $request) {

        $q = $request->input('search');

        $searchTerms = explode(' ', $q);
        $query = DB::table('projects');



        foreach($searchTerms as $term)
        {
            $query
                ->where('title', 'LIKE', '%'. $term .'%')
                ->orWhere('tags', 'LIKE', '%'. $term .'%')
                ->orWhere('body', 'LIKE', '%'. $term .'%')
                ->orderBy('title', 'desc')
                ->leftJoin('users', 'users.id', '=', 'projects.user_id')
                ->orWhere('username', 'LIKE', '%'. $term .'%');
                //->orderBy('created_at', 'desc');
        }

        $searches = $query->get();

        return view("frontpage", compact('searches'));
        //return $searches;
        //return View::make('/')->with('searches', $searches);

    }
}