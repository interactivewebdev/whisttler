<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \App\Http\Controllers\InfluencerController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\SocialMetaController;
use Socialite;
use App\Models\SocialType;
use App\Models\InfluencerDetail;
use App\Models\InfluencerSocialMapping;
use Auth, Request;

class ConnectController extends Controller {

	protected $redirectTo = 'influencers/dashboard';

	//	Instagram Account Details
	protected static $instagram_posts = [];
	protected static $instagram_posts_count = 0;
	protected static $instagram_follows_count = 0;
	protected static $instagram_followed_by_count = 0;

	public function loginWithFacebook() {

		$redirectUrl = url('connect/facebook/callback');
		\Config::set('services.facebook.redirect', $redirectUrl);

		return Socialite::driver('facebook')->scopes(['read_custom_friendlists', 'user_friends', 'user_posts'])->redirect();
		// return Socialite::driver('facebook')->redirect();		
	}

	public function handleFacebookCallback() {

		$redirectUrl = url('connect/facebook/callback');
		\Config::set('services.facebook.redirect', $redirectUrl);

		$user = Socialite::driver('facebook')->user();

		self::createInfluencerFacebook( $user );

		return redirect($this->redirectTo);
	}

	public function createInfluencerFacebook( $facebook ) {

		//	Insert in InfluencerDetail

		$create = [
			'user_id' => auth()->id(),
			'social_type' => \Config::get('constants.social_type.facebook'),
			'social_id' => $facebook->id,
			'access_token' => $facebook->token,
			'profile_pic_path' => $facebook->avatar,
			'likes' => 0,
			'comments' => 0,
			'share' => 0,
			'status' => 1,
		];

		$influencerId = InfluencerDetail::create($create)->id;

		//	Get Score

		// $url = "http://api.klout.com/v2/identity.json/facebook?key=" . UserController::$klout_key . "&id=" . $facebook->id;
		// $score = UserController::getScore($url);
		$score = 0;

		//	Insert in InfluencerSocialMapping

		$create = [
			'influencer_id' => isset($influencerId) ? $influencerId : '0',
			'social_type' => \Config::get('constants.social_type.facebook'),
			'social_id' => $facebook->id,
			'access_token' => $facebook->token,
			'total_reach' => 0,
			'total_followers' => 0,
			'engagements' => 0,
			'score' => $score,
			'status' => 1,
		];

		$influencerSocialMappingId = InfluencerSocialMapping::create($create)->id;

		//	Insert in SocialMetaController

		$user = Auth::user();
		$detail = InfluencerDetail::find($influencerSocialMappingId);

		$result = UserController::getFacebookUserDetails( $user , $detail );

		$data['influencer_id'] = $user->id;
		$data['social_type'] = $detail->social_type;
		$data['result'] = $result;
		$data['score'] = $score;
		$data['result']['score'] = $score;

		SocialMetaController::post($data);

		//	Return

		return 1;
	}

	public function loginWithTwitter() {

		$redirectUrl = url('connect/twitter/callback');
		\Config::set('services.twitter.redirect', $redirectUrl);

		return Socialite::with('twitter')->redirect();
	}

	public function handleTwitterCallback() {

		$redirectUrl = url('connect/twitter/callback');
		\Config::set('services.twitter.redirect', $redirectUrl);

		$user = Socialite::driver('twitter')->user();

		self::createInfluencerTwitter( $user );

		return redirect($this->redirectTo);
	}

	public function createInfluencerTwitter( $twitter ) {

		//	Insert in InfluencerDetail

		$create = [
			'user_id' => auth()->id(),
			'social_type' => \Config::get('constants.social_type.twitter'),
			'social_id' => $twitter->id,
			'access_token' => $twitter->token,
			'profile_pic_path' => $twitter->avatar,
			'likes' => 0,
			'comments' => 0,
			'share' => 0,
			'status' => 1,
		];

		$influencerId = InfluencerDetail::create($create)->id;

		//	Get Score

		$url = "http://api.klout.com/v2/identity.json/twitter?key=" . UserController::$klout_key . "&screenName=" . $twitter->nickname;
		$score = UserController::getScore($url);

		//	Insert in influencerSocialMappingId

		$create = [
			'influencer_id' => isset($influencerId) ? $influencerId : '0',
			'social_type' => \Config::get('constants.social_type.twitter'),
			'social_id' => $twitter->id,
			'access_token' => $twitter->token,
			'total_reach' => 0,
			'total_followers' => isset($twitter->user['followers_count']) ? $twitter->user['followers_count'] : 0,
			'engagements' => isset($twitter->user['friends_count']) ? $twitter->user['friends_count'] : 0,
			'score' => $score,
			'status' => 1,
		];

		$influencerSocialMappingId = InfluencerSocialMapping::create($create)->id;

		//	Insert in SocialMetaController

		$user = Auth::user();
		$detail = InfluencerDetail::find($influencerSocialMappingId);

		$result = UserController::getTwitterUserDetails( $user , $detail );

		$data['influencer_id'] = $user->id;
		$data['social_type'] = \Config::get('constants.social_type.twitter');

		$data['result']['followers_count'] = 0;
		$data['result']['average_retweet'] = 0;
		$data['result']['average_favorite'] = 0;
		$data['result']['average_replies'] = 0;
		$data['result']['score'] = 0;
		$data['result']['average_engagement'] = 0;
		$data['result']['following_followers_ratio'] = 0;

		if( isset($result) && count( $result ) ) {
			foreach ( $result as $key => $value) {
				if ( isset($value->retweet_count) ) $data['result']['average_retweet'] += ($value->retweet_count / count( $result ));
				if ( isset($value->favorite_count) ) $data['result']['average_favorite'] += ($value->favorite_count / count( $result ));
			}
		}

		if( isset($result[0]) && count( $result[0] ) ) {
			if( isset( $result[0]->user->followers_count ) ) $data['result']['followers_count'] = $result[0]->user->followers_count;
			if( isset( $result[0]->user->friends_count ) ) $data['result']['follows_count'] = $result[0]->user->friends_count;
		}

		if( $data['result']['followers_count'] > 0 ) {
			$data['result']['following_followers_ratio'] = $data['result']['follows_count'] / $data['result']['followers_count'];
			$data['result']['average_engagement'] = ( ( $data['result']['average_retweet'] + $data['result']['average_favorite'] + $data['result']['average_replies'] ) / $data['result']['followers_count'] );
		}

		$data['score'] = $score;

		SocialMetaController::post($data);

		//	Return

		return 1;
	}

	public function loginWithInstagram() {

		$redirectUrl = url('connect/instagram/callback');
		\Config::set('services.instagram.redirect', $redirectUrl);

		return Socialite::with('instagram')->redirect();
	}

	public function handleInstagramCallback() {

		$redirectUrl = url('connect/instagram/callback');
		\Config::set('services.instagram.redirect', $redirectUrl);

		$user = Socialite::driver('instagram')->user();

		self::createInfluencerInstagram( $user );

		return redirect($this->redirectTo);
	}

	public function createInfluencerInstagram( $instagram ) {

		//	Insert in InfluencerDetail

		$create = [
			'user_id' => auth()->id(),
			'social_type' => \Config::get('constants.social_type.instagram'),
			'social_id' => $instagram->id,
			'access_token' => $instagram->token,
			'profile_pic_path' => $instagram->avatar,
			'likes' => 0,
			'comments' => 0,
			'share' => 0,
			'status' => 1,
		];

		$influencerId = InfluencerDetail::create($create)->id;

		//	Get Score

		$url = "http://api.klout.com/v2/identity.json/ig/" . $instagram->id . "?key=" . UserController::$klout_key;
		$score = UserController::getScore($url);

		//	Insert in InfluencerSocialMapping

		$create = [
			'influencer_id' => isset($influencerId) ? $influencerId : '0',
			'social_type' => \Config::get('constants.social_type.instagram'),
			'social_id' => $instagram->id,
			'access_token' => $instagram->token,
			'total_reach' => 0,
			'total_followers' => isset($instagram->user['counts']['followed_by']) ? $instagram->user['counts']['followed_by'] : 0,
			'engagements' => isset($instagram->user['counts']['follows']) ? $instagram->user['counts']['follows'] : 0,
			'score' => $score,
			'status' => 1,
		];

		$influencerSocialMappingId = InfluencerSocialMapping::create($create)->id;

		//	Insert in SocialMetaController

		$user = Auth::user();
		$detail = InfluencerDetail::find($influencerSocialMappingId);

		$result = self::getInstagramUserDetails($user, $detail);

		$data['influencer_id'] = $user->id;
		$data['social_type'] = \Config::get('constants.social_type.instagram');
		// $data['result'] = $result;

		$data['result']['followers_count'] = 0;
		$data['result']['average_likes'] = 0;
		$data['result']['average_comment'] = 0;

		if( isset($result) && count( $result ) ) {

			foreach ( $result as $key => $value) {

				if ( isset( $value['likes']['count'] ) && $value['likes']['count'] > 0 ) {
					$data['result']['average_likes'] += ($value['likes']['count'] / count( $result ));
				}

				if ( isset( $value['comments']['count'] ) && $value['comments']['count'] > 0 ) {
					$data['result']['average_comment'] += ($value['comments']['count'] / count( $result ));
				}
			}
		}

		$data['result']['total_posts'] = self::$instagram_posts_count;
		$data['result']['follows_count'] = self::$instagram_follows_count;
		$data['result']['followers_count'] = self::$instagram_followed_by_count;

		$data['result']['average_engagement'] = 0;
		$data['result']['following_followers_ratio'] = 0;

		if( self::$instagram_followed_by_count > 0 ) {
			$data['result']['average_engagement'] = (( $data['result']['average_likes'] + $data['result']['average_comment'] ) / self::$instagram_followed_by_count);
			$data['result']['following_followers_ratio'] = self::$instagram_follows_count / self::$instagram_followed_by_count;
		}

		$score = 0;
		$data['score'] = $score;

		$url = "http://api.klout.com/v2/identity.json/ig/" . $detail->social_id . "?key=" . UserController::$klout_key;

		$score = UserController::getScore($url);
		$data['score'] = $score;
		$data['result']['score'] = $score;

		SocialMetaController::post($data);

		//	Return

		return 1;
	}

	public static function getInstagramUserDetails( $user , $detail ) {
		// public static function getInstagramUserDetails(  ) {

		$socialTypeId = \Config::get('constants.social_type.instagram');

		$instagramData = InfluencerDetail::where('user_id', $user->id)->where('social_type', $socialTypeId)->first();
		// $instagramData = InfluencerDetail::where('user_id', '30')->where('social_type', $socialTypeId)->first();

		if( isset( $instagramData ) && count( $instagramData ) ) {

			$url = "https://api.instagram.com/v1/users/self?access_token=" . $instagramData->access_token;
			// $url = "https://api.instagram.com/v1/users/self?access_token=3316953021.24c30bf.5ecbae4a6b4840b68a499c01ba611c4d";

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			//  curl_setopt($ch,CURLOPT_HEADER, false); 
			$output=curl_exec($ch);
			curl_close($ch);

			$user_profile = json_decode( $output, true );

			if ( isset($user_profile) && count( $user_profile ) ) {

				if ( isset( $user_profile['data']['counts'] ) && count( $user_profile['data']['counts'] ) ) {

					//	POST COUNT
					if( isset($user_profile['data']['counts']['media']) ) {
						self::$instagram_posts_count = $user_profile['data']['counts']['media'];
					}

					//	FOLLOWS
					if( isset($user_profile['data']['counts']['follows']) ) {
						self::$instagram_follows_count = $user_profile['data']['counts']['follows'];
					}

					//	FOLLOWERS
					if( isset($user_profile['data']['counts']['followed_by']) ) {
						self::$instagram_followed_by_count = $user_profile['data']['counts']['followed_by'];
					}
				}

				if ( isset( $user_profile['data']['id'] ) ) {

					$instagramId = $user_profile['data']['id'];
					self::getInstagramUserMedia( $instagramId, $instagramData->access_token );

					return self::$instagram_posts;
				}
			}

			$return = [];

			return $return;
		}
	}

	public static function getInstagramUserMedia( $instagramId , $accessToken ) {

		$url = "https://api.instagram.com/v1/users/".$instagramId."/media/recent?access_token=".$accessToken."&count=50";
		// $url = "https://api.instagram.com/v1/users/".$instagramId."/media/recent?access_token=3316953021.24c30bf.5ecbae4a6b4840b68a499c01ba611c4d&count=2";

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		//  curl_setopt($ch,CURLOPT_HEADER, false); 
		$output = curl_exec($ch);
		curl_close($ch);

		$output = json_decode( $output , true );

		if( isset( $output['data'] ) && count( $output['data'] ) ) {
			foreach ( $output['data'] as $key => $value ) {
				if( count( self::$instagram_posts ) > 199 ) {
					break;
				}
				self::$instagram_posts[] = $value;
			}
		}

		// if( isset( $output['pagination']['next_url'] ) ) {
		if( isset( $outputData['pagination']['next_url'] ) && count( self::$instagram_posts ) < 200 ) {

			self::getInstagramUserMediaPagination( $output['pagination']['next_url'] );
		}

		return 1;
	}

	public static function getInstagramUserMediaPagination( $nextPageUrl ) {

		if( !isset($data) ) $data = [];

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL,$nextPageUrl);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		//  curl_setopt($ch,CURLOPT_HEADER, false); 

		$output = curl_exec($ch);

		curl_close($ch);

		$outputData = json_decode( $output , true );

		if( isset( $outputData['data'] ) && count( $outputData['data'] ) ) {
			foreach ( $outputData['data'] as $key => $value ) {
				if( count( self::$instagram_posts ) > 199 ) {
					break;
				}

				self::$instagram_posts[] = $value;
			}
		}

		// if( isset( $outputData['pagination']['next_url'] ) ) {
		if( isset( $outputData['pagination']['next_url'] ) && count( self::$instagram_posts ) < 200 ) {

			self::getInstagramUserMediaPagination( $outputData['pagination']['next_url'] );
		}

		return 1;
	}

	public function loginWithYoutube() {

		$redirectUrl = url('connect/google/callback');
		\Config::set('services.google.redirect', $redirectUrl);

		$scopes = [
			'https://www.googleapis.com/auth/youtube',
			'https://www.googleapis.com/auth/plus.login',
		];

		return Socialite::driver('google')->scopes($scopes)->redirect();

		// return Socialite::driver('google')->redirectUrl($redirectUrl)->redirect();
	}

	public function handleYoutubeCallback() {

		$redirectUrl = url('connect/google/callback');
		\Config::set('services.google.redirect', $redirectUrl);

		$user = Socialite::driver('google')->user();

		self::createInfluencerYoutube( $user );

		return redirect( $this->redirectTo );

		// $redirectUrl = url('connect/google/callback');
		// \Config::set('services.google.redirect', $redirectUrl);

		// $user = Socialite::driver('google')->user();

		// $accessTokenResponseBody = $user->token;

		// $user->role_type = \Config::get('constants.user_role.influencer');

		// $result = UserController::post($user);
		// $influencer = InfluencerDetail::where('social_id', $user->id)->orwhere('user_id', $result->id)->first();

		// if (is_null($influencer)) {

		// 	InfluencerController::post($user, $result->id);
		// }
		// else {

		// 	InfluencerController::update($user, $result->id);
		// }

		// return redirect($this->redirectTo);
	}

	public function createInfluencerYoutube( $google ) {

		//	Insert in InfluencerDetail

		$create = [
			'user_id' => auth()->id(),
			'social_type' => \Config::get('constants.social_type.google'),
			'social_id' => $google->id,
			'access_token' => $google->token,
			'profile_pic_path' => $google->avatar,
			'likes' => 0,
			'comments' => 0,
			'share' => 0,
			'status' => 1,
		];

		$influencerId = InfluencerDetail::create($create)->id;

		//	Get Score

		$url = "http://api.klout.com/v2/identity.json/gp/" . $google->id . "?key=" . UserController::$klout_key;
		$score = UserController::getScore($url);

		//	Insert in InfluencerSocialMapping

		$create = [
			'influencer_id' => isset($influencerId) ? $influencerId : '0',
			'social_type' => \Config::get('constants.social_type.google'),
			'social_id' => $google->id,
			'access_token' => $google->token,
			'total_reach' => 0,
			'total_followers' => 0,
			'engagements' => 0,
			'score' => $score,
			'status' => 1,
		];

		$influencerSocialMappingId = InfluencerSocialMapping::create($create)->id;

		//	Insert in SocialMetaController

		$user = Auth::user();
		$detail = InfluencerDetail::find($influencerSocialMappingId);

		$result = self::getGoogleUserDetails($user, $detail);

		$data['influencer_id'] = $user->id;
		$data['social_type'] = $detail->social_type;
		$data['result'] = $result;
		$data['score'] = $score;
		$data['result']['score'] = $score;

		SocialMetaController::post($data);

		//	Return

		return 1;
	}
}
