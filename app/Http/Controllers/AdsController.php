<?php

namespace App\Http\Controllers;


use App\Advertisement;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Requests;
use Stripe\Stripe;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class AdsController extends Controller
{
    public function ads()
    {
        /*$user_ads = DB::table("ads")
            ->join('ads', 'id' , '=' , 'badges.id')
            ->where('user_id', $id)
            ->orderBy('created_at', 'asc')
            ->take(3)
            ->get();*/

        return view("ads");
    }


    public function AddAds()
    {
        return view("addAds");
    }

    public function postAddAdvertisement()
    {


        $user = User::find(1);

        $user->charge(5000, [
            'source' => $_POST['stripeToken'],
            'currency' => 'eur'
        ]);

        $title = Request::input('title');
        $url = Request::input('url');
        $image = Input::file('fileToUpload');
        $start_date = Request::input('data-picker');
        $destinationPath = 'uploads/reclam';

        //rules
        $file = array(
            'fileToUpload' => $image,
            'title' => $title,
            'url' => $url
        );
        $rules = array(
            'fileToUpload' => 'required|image',
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
        $advertisement->img = $fileName;
        $advertisement->start_date = $start_date;
        $advertisement->save();

        return redirect('/advertising');
    }

}
