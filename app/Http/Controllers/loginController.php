<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function login(){
        return view("login");
    }
}
