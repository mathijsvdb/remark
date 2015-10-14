<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class profielController extends Controller
{
    public function profiel(){
        return view("profiel");
    }
}
