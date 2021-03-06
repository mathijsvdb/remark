<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Request;
use Stripe\Stripe;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class AdsController extends Controller
{
    public function ads()
    {
        $user_id = Auth::id();

        $myAds = DB::table('ads')
            ->where('user_id', '=', $user_id)
            ->select('ads.*')
            ->get();

        return view("ads", compact('myAds'));
    }


    public function AddAds()
    {
        return view("addAds");
    }

    public function updateAds($id){

        $oldad = Advertisement::find($id);

        return view("updateAds", compact('oldad'));
    }

    public function postUpdateAds($id){

        //rules
        $file = array(
            'fileToUpload' => Request::input('img'),
            'title' => Request::input('title'),
            'url' => Request::input('url')
        );
        $rules = array(
            'fileToUpload' => 'image|mimes:jpeg,png',
            'title' => 'required',
            'url' => 'required'
        );

        //validator
        $validator = Validator::make($file, $rules);

        //if validator fails
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/advertising/update/' . $id)->withInput()->withErrors($validator);
        }

        $ad = Advertisement::find($id);
        $image = Input::file('fileToUpload');
        $oldimage = Advertisement::find($id)->img;
        $destinationPath = 'uploads/reclam';

        if(!empty($image)){
            if($image->isValid()){
                File::delete(public_path().$oldimage);
                $extension = $image->getClientOriginalExtension(); // getting image extension
                $fileName = Auth::user()->username . '_' . rand(11111,99999).'.'.$extension; // renaming image
                Input::file('fileToUpload')->move($destinationPath, $fileName);
                $ad->img = '/uploads/reclam/' . $fileName;
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/advertising/add');
            }
        } else {
            $ad->img = $oldimage;
        }

        $ad->title = Request::input('title');
        $ad->url = Request::input('url');
        $ad->save();

        return redirect('/advertising');
    }

    public function postAddAdvertisement()
    {

        $title = Request::input('title');
        $url = Request::input('url');
        $image = Input::file('fileToUpload');
        $start_date = Request::input('data-picker');
        $end_date = date('Y-m-d', strtotime($start_date. ' + 30 days'));
        $destinationPath = 'uploads/reclam';

        //rules
        $file = array(
            'fileToUpload' => $image,
            'title' => $title,
            'url' => $url
        );
        $rules = array(
            'fileToUpload' => 'required|image|mimes:jpeg,png',
            'title' => 'required',
            'url' => 'required'
        );

        //validator
        $validator = Validator::make($file, $rules);

        //if validator fails
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/advertising/add')->withInput()->withErrors($validator);
        }

        $user = User::find(Auth::id());

        $user->charge(5000, [
            'source' => $_POST['stripeToken'],
            'currency' => 'eur'
        ]);

        //if input is a file upload to destination /uploads
        //else redirect to view with error message
        if($image->isValid()){
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $fileName = Auth::user()->username . '_' . rand(11111,99999).'.'.$extension; // renaming image
            Input::file('fileToUpload')->move($destinationPath, $fileName);
        } else {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('/advertising/add');
        }

        $advertisement = new Advertisement;

        $advertisement->title = $title;
        $advertisement->description = $title;
        $advertisement->url = $url;
        $advertisement->img = '/uploads/reclam/' . $fileName;
        $advertisement->start_date = $start_date;
        $advertisement->end_date = $end_date;
        $advertisement->user_id = Auth::id();
        $advertisement->save();

        return redirect('/advertising');
    }

    public function postClickCounter(Request $request) {

        $id = $request->input('id');
        //var_dump($request);
        //DB::update("update ads set clicks = clicks+1 where id = ?", [$id]);

        DB::table('ads')
            ->where('id', $id)
            ->increment('clicks', 1);

        return $id;
    }

}
