<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \App\Http\Controllers\InfluencerController;
use \App\Http\Controllers\UserController;
use Socialite;
use App\Models\SocialType;
use App\Models\InfluencerDetail;
use Auth;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    protected $twitter_oauth_token = '441797932-GUW5aV7evNnUT4b3sZ2iGGKEMU0bst3vugJ98mgt';
    protected $twitter_oauth_secret = 'bz3PGbVTXk7BHYiTNkPx242AePGl0NjzMEr2bQy8e5WkH';

    public function login() {

        return view('influencer.login');
    }

    public function loginWithFacebook() {

        return Socialite::driver('facebook')->redirect();
        //return Socialite::driver('facebook')->scopes(['read_custom_friendlists', 'user_friends', 'user_posts'])->redirect();
    }

    public function handleFacebookCallback() {

        try {

            // $user = Socialite::driver('facebook')->user();
            $user = Socialite::driver('facebook')->stateless()->user();
        }
        catch (Exception $e) {

            print_r($e);
            exit();
        }

        dd($user);
        $user->role_type = \Config::get('constants.user_role.influencer');
        $user->login_with = SocialType::where('social_name', 'Facebook')->value('id');

        $influencer = InfluencerDetail::where('social_id', $user->id)->first();

        $result = UserController::post($user);

        if (is_null($influencer)) {

            InfluencerController::post($user, $result->id);
        } else {

            InfluencerController::update($user, $result->id);
        }
        Auth::loginUsingId($result->id);
        return redirect()->route('influencerSignup');
    }

    public function loginWithTwitter() {

        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback() {

        $user = Socialite::driver('twitter')->userFromTokenAndSecret($this->twitter_oauth_token, $this->twitter_oauth_secret);
        dd($user);
        $user->role_type = \Config::get('constants.user_role.influencer');
        $user->login_with = SocialType::where('social_name', 'Twitter')->value('id');
        $user->username = $user->nickname;
        $result = UserController::post($user);
        $influencer = InfluencerDetail::where('social_id', $user->id)->first();


        if (is_null($influencer)) {

            InfluencerController::post($user, $result->id);
        } else {

            InfluencerController::update($user, $result->id);
        }

        Auth::loginUsingId($result->id);

        return redirect()->route('home');
    }

    public function loginWithInstagram() {

        return Socialite::with('instagram')->scopes(['follower_list'])->stateless()->redirect();
    }

    public function handleInstagramCallback() {

        $user = Socialite::driver('instagram')->stateless()->user();

        $accessTokenResponseBody = $user->accessTokenResponseBody;

        $user = $accessTokenResponseBody['user'];
        dd($user);
        $user['role_type'] = \Config::get('constants.user_role.influencer');
        $user['login_with'] = SocialType::where('social_name', 'Instagram')->value('id');
        $user['token'] = $accessTokenResponseBody['access_token'];
        $user['name'] = $user['full_name'];
        $user['avatar'] = $user['profile_picture'];

        $object = (object) $user;

        $result = UserController::post($object);

        $influencer = InfluencerDetail::where('social_id', $user['id'])->first();


        if (is_null($influencer)) {

            InfluencerController::post($object, $result->id);
        } else {

            InfluencerController::update($object, $result->id);
        }
        Auth::loginUsingId($result->id);


        return redirect()->route('home', ['id' => $result->id]);
    }

    public function loginWithYoutube() {
        return Socialite::driver('youtube')->scopes($scopes)->redirect();
    }

    public function handleYoutubeCallback() {

        $user = Socialite::driver('youtube')->stateless()->user();
        
        $accessTokenResponseBody = $user->accessTokenResponseBody;


        $user->role_type = \Config::get('constants.user_role.influencer');
        $user->login_with = SocialType::where('social_name', 'Google')->value('id');


        $result = UserController::post($user);
        $influencer = InfluencerDetail::where('social_id', $user->id)->orwhere('user_id', $result->id)->first();

        if (is_null($influencer)) {

            InfluencerController::post($user, $result->id);
        } else {

            InfluencerController::update($user, $result->id);
        }

        Auth::loginUsingId($result->id);


        return redirect()->route('home');
    }

    public function loginUser() {
        
    }

}
