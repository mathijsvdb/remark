<?php

namespace App\Http\Controllers\Api;

use App\Apikey;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ApiController extends Controller
{
    public function index() {
        $user_key = Apikey::where('user_id', Auth::id())->get();

        return view('developers', compact('user_key'));
    }

    public function generateAPIKey() {
        $hasKey = Auth::user()->apikey;

        if(!$hasKey) {
            $key = new Apikey;
            $key->apikey = Auth::id().md5(microtime().rand());

            Auth::user()->apikey()->save($key);
        }

        return Redirect::back();
    }
}
