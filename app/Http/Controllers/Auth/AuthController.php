<?php

namespace App\Http\Controllers\Auth;

use App\Badges;
use App\User;
use App\Waitlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $loginPath = '/login';
    protected $redirectPath = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    //register users + waitinglist users

    public function postRegister(Request $request)
    {
        $input = $request->all();

        $validator = $this->validator($input);

        //validator fails
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //login + create in database for thomasmore email
        //create in database for non thomasmore emails

        if(str_contains($input['email'], '@student.thomasmore.be')){
            Auth::login($this->create($input));
            $info = 'Congratulations on creating an account, To update your profile visit the profile page!';

            $badge_id = 2;
            $totalUsers = DB::table("users")
                ->count();

            if($totalUsers<100){
                //badgeId + userId naar db sturen
                $this->AddInDatabase(Auth::id(), $badge_id);
            }

        } else {
            $this->addToWaitlist($request->all());
            $info = "Thanks for showing interest in our services, at the moment you will be put on a waiting list. When It's your turn, we will send an activation mail in your inbox.";
        }

        //redirect
        return redirect($this->redirectPath())->with('info', $info);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(str_contains($data['email'], '@student.thomasmore.be')){
            return Validator::make($data, [
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'username' => 'required|max:50|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        } else {
            return Validator::make($data, [
                'firstname' => 'required|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:waitlist',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => ucfirst($data['firstname']),
            'lastname' => ucfirst($data['lastname']),
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'accountstatus' => '1',
            'image' => 'default.jpg',
            
        ]);
    }

    protected function addToWaitlist(array $data)
    {
        return User::create([
            'firstname' => ucfirst($data['firstname']),
            'lastname' => ucfirst($data['lastname']),
            'username' => $data['username'],
            'email' => $data['email'],
            'accountstatus' => '0',
            'image' => 'default.jpg',
            
        ]);
    }

    public function AddInDatabase($user_id, $badge_id){
        $badge = new Badges;

        $totalBadge = DB::table("userbadges")
            ->where('user_id', $user_id)
            ->where('badge_id', $badge_id)
            ->count();

        $badge->user_id = $user_id;
        $badge->badge_id = $badge_id;

        if($totalBadge <= 0){
            $badge->save();
        }
    }
}
