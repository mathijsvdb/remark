<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class AdsController extends Controller
{
    public function ads()
    {
        return view("ads");
    }

}
