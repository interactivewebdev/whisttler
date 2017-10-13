<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \App\Http\Controllers\InfluencerController;
use \App\Http\Controllers\UserController;
use Socialite;
use App\Models\SocialType;
use App\Models\InfluencerDetail;
use Illuminate\Support\Facades\DB;
use Auth, Session;

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
	protected $redirectTo = 'influencers/dashboard';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

		$this->middleware('guest')->except('logout');
	}

	public function login() {

		return view('influencer.login');
	}

	public function loginWithFacebook() {

		$redirectUrl = env('FACEBOOK_CALLBACK_URL', url('login/facebook/callback'));
		\Config::set('services.facebook.redirect', $redirectUrl);

		return Socialite::driver('facebook')->scopes(['read_custom_friendlists', 'user_friends', 'user_posts'])->redirect();
	}

	public function handleFacebookCallback() {

		$redirectUrl = env('FACEBOOK_CALLBACK_URL', url('login/facebook/callback'));
		\Config::set('services.facebook.redirect', $redirectUrl);

		$user = Socialite::driver('facebook')->user();
		
		$user_detail = array(
			'name'			=> $user->name,
			'email'			=> $user->email,
			'avatar'		=> $user->avatar,
			'social_id'		=> $user->id,
			'full_image'	=> $user->avatar_original,
			'profileUrl'	=> $user->profileUrl,
			'access_token'	=> $user->token,
			'gender'		=> $user->user['gender']
		);

		$user->role_type = \Config::get('constants.user_role.influencer');
		$user->login_with = SocialType::where('social_name', 'Facebook')->value('id');

		$influencer = InfluencerDetail::where('social_id', $user->id)->first();

		$result = UserController::post($user);

		if (is_null($influencer)) {
			InfluencerController::post($user, $result->id);
		}
		else {
			InfluencerController::update($user, $result->id);
		}

		Auth::loginUsingId($result->id);

		// Get Facebook User Data
		UserController::dashboard();

		Session::put('influencer_detail', $user_detail);

        $auth_verification = DB::table('users')
            ->join('verify_email', 'users.email', '=', 'verify_email.email')
            ->where('users.id', $result->id)
            ->select('users.category_id', 'users.sub_category_id', 'verify_email.is_verified')
            ->get();

		if($auth_verification[0]->is_verified && $auth_verification[0]->category_id != "" && $auth_verification[0]->sub_category_id != ""){
            return redirect($this->redirectTo);
        }else{
            redirect('/influencers/signup');
        }
	}

	public function loginWithTwitter() {

		$redirectUrl = env('TWITTER_CALLBACK_URL', url('login/twitter/callback'));
		\Config::set('services.twitter.redirect', $redirectUrl);

		return Socialite::with('twitter')->redirect();
	}

	public function handleTwitterCallback() {

		$redirectUrl = env('TWITTER_CALLBACK_URL', url('login/twitter/callback'));
		\Config::set('services.twitter.redirect', $redirectUrl);

		// $user = Socialite::driver('twitter')->userFromTokenAndSecret($this->twitter_oauth_token, $this->twitter_oauth_secret);
		$user = Socialite::driver('twitter')->user();
		$user_detail = array(
            'name'			=> $user->name,
            'email'			=> $user->email,
            'avatar'		=> $user->avatar,
            'social_id'		=> $user->id,
            'full_image'	=> $user->avatar,
            'profileUrl'	=> '',
            'access_token'	=> $user->token,
            'gender'		=> ''
        );

		$user->role_type = \Config::get('constants.user_role.influencer');
		$user->login_with = SocialType::where('social_name', 'Twitter')->value('id');
		$user->username = $user->nickname;
		$result = UserController::post($user);
		$influencer = InfluencerDetail::where('social_id', $user->id)->first();

		if (is_null($influencer)) {

			InfluencerController::post($user, $result->id);
		}
		else {

			InfluencerController::update($user, $result->id);
		}

		Auth::loginUsingId($result->id);

		UserController::dashboard();

        Session::put('influencer_detail', $user_detail);

        $auth_verification = DB::table('users')
            ->join('verify_email', 'users.email', '=', 'verify_email.email')
            ->where('users.id', $result->id)
            ->select('users.category_id', 'users.sub_category_id', 'verify_email.is_verified')
            ->get();

        if($auth_verification[0]->is_verified && $auth_verification[0]->category_id != "" && $auth_verification[0]->sub_category_id != ""){
            return redirect($this->redirectTo);
        }else{
            redirect('/influencers/signup');
        }
	}

	public function loginWithInstagram() {

		$redirectUrl = env('INSTAGRAM_CALLBACK_URL', url('login/instagram/callback'));
		\Config::set('services.instagram.redirect', $redirectUrl);

		//return Socialite::with('instagram')->scopes(['follower_list'])->stateless()->redirect();
		return Socialite::with('instagram')->redirect();
	}

	public function handleInstagramCallback() {

		$redirectUrl = env('INSTAGRAM_CALLBACK_URL', url('login/instagram/callback'));
		\Config::set('services.instagram.redirect', $redirectUrl);

		$user = Socialite::driver('instagram')->user();
        $user_detail = array(
            'name'			=> $user->name,
            'email'			=> $user->email,
            'avatar'		=> $user->avatar,
            'social_id'		=> $user->id,
            'full_image'	=> $user->user['profile_picture'],
            'profileUrl'	=> '',
            'access_token'	=> $user->token,
            'gender'		=> ''
        );

		$accessTokenResponseBody = $user->accessTokenResponseBody;

		$user = $accessTokenResponseBody['user'];
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
		}
		else {
			InfluencerController::update($object, $result->id);
		}

		Auth::loginUsingId($result->id);

		UserController::dashboard();

        Session::put('influencer_detail', $user_detail);

        $auth_verification = DB::table('users')
            ->join('verify_email', 'users.email', '=', 'verify_email.email')
            ->where('users.id', $result->id)
            ->select('users.category_id', 'users.sub_category_id', 'verify_email.is_verified')
            ->get();

        if($auth_verification[0]->is_verified && $auth_verification[0]->category_id != "" && $auth_verification[0]->sub_category_id != ""){
            return redirect($this->redirectTo);
        }else{
            redirect('/influencers/signup');
        }
	}

	public function loginWithYoutube() {

		$redirectUrl = env('YOUTUBE_CALLBACK_URL', url('login/google/callback'));
		\Config::set('services.google.redirect', $redirectUrl);

		$scopes = [
			'https://www.googleapis.com/auth/youtube',
			'https://www.googleapis.com/auth/plus.login',
		];

		return Socialite::driver('google')->scopes($scopes)->redirect();

		//return Socialite::driver('youtube')->scopes($scopes)->redirect();
		// return Socialite::driver('google')->redirect();
	}

	public function handleYoutubeCallback() {

		$redirectUrl = env('YOUTUBE_CALLBACK_URL', url('login/google/callback'));
		\Config::set('services.google.redirect', $redirectUrl);

		$user = Socialite::driver('google')->user();
        $user_detail = array(
            'name'			=> $user->name,
            'email'			=> $user->email,
            'avatar'		=> $user->avatar,
            'social_id'		=> $user->id,
            'full_image'	=> $user->avatar_original,
            'profileUrl'	=> $user->user['url'],
            'access_token'	=> $user->token,
            'gender'		=> $user->user['gender']
        );

		$accessTokenResponseBody = $user->token;

		$user->role_type = \Config::get('constants.user_role.influencer');
		$user->login_with = SocialType::where('social_name', 'Youtube')->value('id');

		$result = UserController::post($user);
		$influencer = InfluencerDetail::where('social_id', $user->id)->orwhere('user_id', $result->id)->first();

		if (is_null($influencer)) {

			InfluencerController::post($user, $result->id);
		}
		else {

			InfluencerController::update($user, $result->id);
		}

		Auth::loginUsingId($result->id);

		UserController::dashboard();

        Session::put('influencer_detail', $user_detail);

        $auth_verification = DB::table('users')
            ->join('verify_email', 'users.email', '=', 'verify_email.email')
            ->where('users.id', $result->id)
            ->select('users.category_id', 'users.sub_category_id', 'verify_email.is_verified')
            ->get();

        if($auth_verification[0]->is_verified && $auth_verification[0]->category_id != "" && $auth_verification[0]->sub_category_id != ""){
            return redirect($this->redirectTo);
        }else{
            redirect('/influencers/signup');
        }
	}

}
