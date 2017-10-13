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
		// return Socialite::driver('facebook')->redirect();
		//return Socialite::driver('facebook')->scopes(['read_custom_friendlists', 'user_friends', 'user_posts'])->redirect();
	}

	public function handleFacebookCallback() {

		$redirectUrl = env('FACEBOOK_CALLBACK_URL', url('login/facebook/callback'));
		\Config::set('services.facebook.redirect', $redirectUrl);

		// $user = Socialite::driver('facebook')->stateless()->user();
		$user = Socialite::driver('facebook')->user();

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

		return redirect($this->redirectTo);
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
		// echo "<pre>";
		// print_r($user);
		// exit();

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

		return redirect($this->redirectTo);
		// return redirect()->route('home');
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
		// echo "<pre>";
		// print_r($user);
		// exit();

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

		return redirect($this->redirectTo);
		// return redirect()->route('home', ['id' => $result->id]);
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
		// dd( $user );
		// echo "<pre>";
		// print_r($user);
		// exit();

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

		return redirect($this->redirectTo);
		return redirect()->route('home');
	}

}
