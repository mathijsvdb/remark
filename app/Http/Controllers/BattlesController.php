<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BattlesController extends Controller
{
    public function battles()
    {
        return view("battles");
    }
}
