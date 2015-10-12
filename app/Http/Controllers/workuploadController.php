<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class workuploadController extends Controller
{

    public function workupload()
    {
        //check if user is logged in

        //ifyes
        return view("gallery/upload");

        //ifno
            //login
    }
}
