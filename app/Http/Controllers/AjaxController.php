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
            $resp = [
                'error' => 'You have already liked this project.'
            ];
        } else {
            DB::table('likes')->insert([
                'user_id' => Auth::id(),
                'project_id' => $project_id
            ]);

            // get # likes to update the quantity
            $resp = [
                'likes' => DB::table('likes')->where('project_id', '=', $project_id)->count()
            ];
        }

        header('Content-type: application/json');
        echo json_encode($resp);
    }

    public function favoriteProject(Request $request) {
        $project_id = $request->input('project_id');

        $result = DB::table('favorites')->where('user_id', '=', Auth::id())
                                        ->where('project_id', '=', $project_id)
                                        ->get();

        if ($result) {
            $resp = [
                'error' => 'You have already favorited this project.'
            ];
        } else {
            DB::table('favorites')->insert([
                'user_id' => Auth::id(),
                'project_id' => $project_id
            ]);

            $resp = [
                'favorites' => DB::table('favorites')->where('project_id', '=', $project_id)->count()
            ];
        }

        header('Content-type: application/json');
        echo json_encode($resp);
    }
}
