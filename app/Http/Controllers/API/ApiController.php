<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index() {
        return view('developers');
    }

    public function generateAPIKey() {
        // generate an API key here!
    }
}
