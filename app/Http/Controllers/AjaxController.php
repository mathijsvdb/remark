<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function likeProject(Request $request) {
        $project_id = $request->input('project_id');

        $result = DB::table('likes')->where('user_id', '=', Auth::id())
            ->where('project_id', '=', $project_id)
            ->get();

        if($result) {
            echo 'You have already liked this project.';
        } else {
            DB::table('likes')->insert([
                'user_id' => Auth::id(),
                'project_id' => $project_id
            ]);

            echo 'your like has been registered';
        }
    }
}
