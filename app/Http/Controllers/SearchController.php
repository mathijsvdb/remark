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

    public function searchThis(Request $request) {

        print_r("call made");

        $q = $request->input('search');
        var_dump($q);

        

        /*$input = Input::all();
        print_r($input);
        print_r("call made");
        //na post ajax call wat zit er in mijn functie
        $q = $_POST["whattosearch"];
        print_r($q);

        $searchTerms = explode(' ', $q);
        $query = DB::table('projects');

        foreach($searchTerms as $term)
        {
            $query->join('users', 'users.id', '=', 'projects.user_id')
                  ->where('title', 'LIKE', '%'. $term .'%')
                  ->orWhere('tags', 'LIKE', '%'. $term .'%')
                  ->orWhere('body', 'LIKE', '%'. $term .'%')
                  ->orWhere('username', 'LIKE', '%'. $term .'%')
                  ->orderBy('created_at', 'desc');
        }

        $projects = $query->get();

        print_r($projects);*/

        //header('Content-type: application/json');
        //echo json_encode($projects);

        //return View::make( 'viewfile' )->with( 'data', $projects );

        //return View::make('projects', compact('projects'));
        //$view =  view('search')->with('projects', $projects);

        //return View('/')->with('projects');

        //View::make('/')->nest('child', 'child.view', $projects);
    }
}