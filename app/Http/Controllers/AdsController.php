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
        $advertisement->save();

        return redirect('/advertising');
    }

}
