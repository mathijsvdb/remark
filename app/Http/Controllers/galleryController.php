<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class galleryController extends Controller
{

    public function gallery()
    {
        //list and filter through all works of users

        return view("gallery");
    }
}
