<?php
namespace App\Http\Controllers;

use App\Badges;
use App\Favorite;
use App\Project;
use App\Referrals;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;
use Auth;
use MandrillMail;


class ProfileController extends Controller {

    /**
     * Update the user's profile.
     *
     * @return Response
     */
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $projects = Project::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(10);
        $favorites = Favorite::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $badges = DB::table('badges')->get();
        $userbadges = $user->badges;
        $userbadge_ids = [];

        foreach($userbadges as $userbadge) {
            $userbadge_ids[] = $userbadge->badge_id;
        }

        return view("profile.profile", compact('user', 'projects', 'favorites', 'badges', 'userbadge_ids'));
    }

    public function updateProfile()
    {
            $user = Auth::user();
            return view("profile.editProfile", compact('user'));
    }

    public function postProfile()
    {
        $user = User::find(Auth::id());
        $image = Input::file('fileToUpload');
        $destinationPath = 'uploads/profilepictures/';
        $oldfile = $user->image;

        $file = array('fileToUpload' => $image);
        $rules = array('fileToUpload' => 'image|mimes:jpeg,png');

        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            return Redirect::to('/update')->withInput()->withErrors($validator);
        }

        if(!empty($image)){
            if($image->isValid()){
                $extension = $image->getClientOriginalExtension();
                $fileName = Auth::user()->username.'.'.$extension;
                File::delete('uploads/profilepictures/' . $oldfile);

                if (!file_exists($destinationPath)) {
                    File::makeDirectory($destinationPath, $mode = 0777, true, true);
                }

                $img = Image::make($image);
                $img->fit(500,500)->crop(500, 500, 0, 0)->save($destinationPath . $fileName);

                $user->image = $fileName;
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('/update');
            }
        } else {
            $user->image = $oldfile;
        }

        $user->firstname = ucfirst(Request::input('firstname'));
        $user->lastname = ucfirst(Request::input('lastname'));
        $user->email = Request::input('email');
        $user->bio = Request::input('bio');
        $user->facebook = Request::input('facebook');
        $user->twitter = Request::input('twitter');
        $user->website = Request::input('website');
        
        if (Input::get('commentmail_yes') === 'yes') {
            $user->comment_mail = 1;
        } else {
            $user->comment_mail = 0;
        }

        if (Input::get('highlightmail_yes') === 'yes') {
            $user->highlight_mail = 1;
        } else {
            $user->highlight_mail = 0;
        }

        $user->save();

        return redirect("profile/" . $user->username);
    }

    public function referralMail(){
        $file = array(
            'email' => Request::input('referral-email'),
        );
        $rules = array(
            'email' => 'email|max:255|unique:users|unique:referrals',
        );
        $messages = array(
            'unique' => 'There is already a user with this email or this user is already referred. If you have another friend refer him :)',
        );

        $validator = Validator::make($file, $rules, $messages);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('/referral')->withInput()->withErrors($validator);
        }

        $referral = new Referrals;

        $token = str_random(20) . rand(11111,99999);

        $referral->email = Request::input('referral-email');
        $referral->token = $token;
        $referral->save();

            $template_content = [];

            $message = [
                'subject' => 'Notification alert',
                'from_email' => 'RemarkTeam@remark.com',
                'from_name' => 'Remark',
                'to' => array(
                    array(
                        'email' => Request::input('referral-email'),
                        'name' => 'sir, madam',
                        'type' => 'to'
                    )
                ),
                'merge_vars' => array(
                    array(
                        'rcpt' => Request::input('referral-email'),
                        'vars' => array(
                            array(
                                'name' => 'RECEIVER',
                                'content' =>  "sir, madam",
                            )
                        )
                    )
                )
            ];

        MandrillMail::messages()->sendTemplate('remark-referral', $template_content, $message);

        if(isset($_GET['username'])){
            $user = DB::table('users')
                ->where('username', '=', $_GET['username'])
                ->get();

            User::find($user[0]->id)->userBadge()->attach(6);
        }

        $info = "thank you for referring a friend";

        return redirect(url())->with('info', $info);
    }
}