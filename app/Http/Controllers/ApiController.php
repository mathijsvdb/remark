<?php

namespace App\Http\Controllers;


use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class ApiController extends Controller
{
    public function developer()
    {
        return view("developer");
    }

    public function getPopularProjects() {

    }

    public function getProjectById() {

    }
}