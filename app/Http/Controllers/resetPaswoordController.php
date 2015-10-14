<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class resetPaswoordController extends Controller
{
    public function reset_paswoord(){
        return view("resetPaswoord");
    }
}
