<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use \App\Models\InfluencerDetail;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use \App\Models\VerifyEmail;
use \App\Util;
use \App\Models\IndustryType;
use \App\Models\BrandDetail;
use App\Models\VerifyPhone;
use App\Models\SocialType;

use Thujohn\Twitter\Facades\Twitter as Twitter;
// use Thujohn\Twitter\Traits\StatusTrait as Twitter;

class UserController extends Controller {

	public static $twitter_oauth_token = '874516306925559808-cNVXkzbKe1Kk26sbllRTFEwmeiovBS1';
	public static $twitter_oauth_secret = 'FQ0uavUUSqo7bwsi1b0NFr2tYgeydd0RXOgD0UxVp3Wbp';
	public static $klout_key = 'dy8p3m4awbtqyxts5jmtuppf';
	public static $google_api_key = 'AIzaSyCftP5uli2AY9skhy0U8sMARh6T8CEgMjY';
	public static $google_client_secret = 'pqhkK3AYFKP2dP8RreRLJB6c';
	
	protected static $instagram_posts = [];
	protected static $instagram_posts_count = 0;
	protected static $instagram_follows_count = 0;
	protected static $instagram_followed_by_count = 0;
	
	public static function post($user) {

		if (isset($user->email)) {

			$email = User::where('email', $user->email)->first();
		}
		else if (isset($user->username)) {

			$email = User::where('user_name', $user->username)->first();
		}

		if (!isset($email) || is_null($email)) {

			$new_user = new User;

			$new_user->fname = $user->name;

			$new_user->role_type = $user->role_type;

			if (isset($user->email)) {

				$new_user->email = $user->email;
			} else if (isset($user->username)) {

				$new_user->user_name = $user->username;
			}

			// $email->login_with = $user->login_with;
			// if( isset($user->login_with) ) $new_user->login_with = $user->login_with;
			if(property_exists($user, "login_with")) $new_user->login_with = $user->login_with;

			$new_user->status = 0;
			$new_user->save();
			return $new_user;
		}
		else {

			// $email->login_with = $user->login_with;
			// if( isset($user->login_with) ) $new_user->login_with = $user->login_with;
			if(property_exists($user, "login_with")) $email->login_with = $user->login_with;

			$email->save();
			return $email;
		}
	}

	public static function dashboard() {

		$user = Auth::user();
		$detail = InfluencerDetail::where('user_id', $user->id)->first();

		if ( $user->login_with == \Config::get('constants.social_type.facebook')) {

			$result = UserController::getFacebookUserDetails($user, $detail);

			$data['influencer_id'] = $user->id;
			$data['social_type'] = $detail->social_type;
			$data['result'] = $result;

			// $url = "http://api.klout.com/v2/identity.json/fb/".$detail->social_id."?key=".UserController::$klout_key;
			// "http://api.klout.com/v2/identity.json/fb/".$detail->social_id."?key=".UserController::$klout_key;
			// die();

			$score = 0;

			$data['score'] = $score;
			$data['result']['score'] = $score;

			SocialMetaController::post($data);
			return 1;
		}
		elseif ($user->login_with == \Config::get('constants.social_type.twitter')) {

			$result = UserController::getTwitterUserDetails( $user, $detail );

			$data['influencer_id'] = $user->id;
			$data['social_type'] = $detail->social_type;
			// $data['result'] = $result;

			$data['result']['followers_count'] = 0;
			$data['result']['average_retweet'] = 0;
			$data['result']['average_favorite'] = 0;
			$data['result']['score'] = 0;

			if( isset($result) && count( $result ) ) {

				foreach ( $result as $key => $value) {

					if ( isset($value->retweet_count) ) $data['result']['average_retweet'] += ($value->retweet_count / count( $result ));
					if ( isset($value->favorite_count) ) $data['result']['average_favorite'] += ($value->favorite_count / count( $result ));
				}
			}

			if( isset($result[0]) && count( $result[0] ) ) {
				$data['result']['followers_count'] = $result[0]->user->followers_count;
			}

			$score = 0;
			$data['score'] = $score;

			if( isset($result[0]) && isset( $result[0]->user->screen_name ) ) {

				$screenName = $result[0]->user->screen_name;

				$url = "http://api.klout.com/v2/identity.json/twitter?key=" . UserController::$klout_key . "&screenName=" . $screenName;
				$score = UserController::getScore($url);
				$data['score'] = $score;
				$data['result']['score'] = $score;
			}

			SocialMetaController::post($data);

			return 1;
		}
		elseif ($user->login_with == \Config::get('constants.social_type.instagram')) {

			$result = UserController::getInstagramUserDetails($user, $detail);

			$data['influencer_id'] = $user->id;
			$data['social_type'] = $detail->social_type;
			// $data['result'] = $result;

			$data['result']['followers_count'] = 0;
			$data['result']['average_likes'] = 0;
			$data['result']['average_comment'] = 0;

			if( isset($result) && count( $result ) ) {

				foreach ( $result as $key => $value) {

					if ( isset( $value['likes']['count'] ) && $value['likes']['count'] > 0 ) $data['result']['average_likes'] += ($value['likes']['count'] / count( $result ));
					if ( isset( $value['comments']['count'] ) && $value['comments']['count'] > 0 ) $data['result']['average_comment'] += ($value['comments']['count'] / count( $result ));
				}
			}

			$data['result']['total_posts'] = self::$instagram_posts_count;
			$data['result']['follows_count'] = self::$instagram_follows_count;
			$data['result']['followers_count'] = self::$instagram_followed_by_count;

			$score = 0;
			$data['score'] = $score;

			$url = "http://api.klout.com/v2/identity.json/ig/" . $detail->social_id . "?key=" . self::$klout_key;

			$score = UserController::getScore($url);
			$data['score'] = $score;
			$data['result']['score'] = $score;

			SocialMetaController::post($data);
			return 1;
		}
		elseif ($user->login_with == \Config::get('constants.social_type.google')) {

			$result = UserController::getGoogleUserDetails($user, $detail);

			$data['influencer_id'] = $user->id;
			$data['social_type'] = $detail->social_type;
			$data['result'] = $result;

			$score = 0;

			$data['score'] = $score;

			SocialMetaController::post($data);
			return 1;

			$url = "http://api.klout.com/v2/identity.json/gp/" . $detail->social_id . "?key=" . UserController::$klout_key;

			$score = UserController::getScore($url);
			$data['score'] = $score;
			$data['result']['score'] = $score;

			SocialMetaController::post($data);
			return 1;
		}
	}

	public static function getScore($url1) {

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$array_network = json_decode($result);

		if( $array_network ) {


			if (is_array($array_network)) {

				$network_id = $array_network['id'];
			}
			else {

				$network_id = $array_network->id;
			}

			$url2 = "http://api.klout.com/v2/user.json/" . $network_id . "/score?key=" . UserController::$klout_key;

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url2);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($curl);
			curl_close($curl);

			$array_score = json_decode($result);

			if (is_array($array_score)) {

				$score = $array_score['score'];
			} else {

				$score = $array_score->score;
			}
		}

		return 0;
	}

	public static function getFacebookUserDetails( $user, $detail ) {

		$socialTypeId = \Config::get('constants.social_type.facebook');

		$facebookData = InfluencerDetail::where('user_id', $user->id)->where('social_type', $socialTypeId)->first();

		$access_token = $facebookData->access_token;

		$fb = new \Facebook\Facebook([
			'app_id' => env('FACEBOOK_APP_ID'),
			'app_secret' => env('FACEBOOK_SECRET'),
			'default_graph_version' => 'v2.8',
		]);

		/* Friends count api */
		try {
			$friends = $fb->get('/me/friends', $access_token);
		}
		catch (\Facebook\Exceptions\FacebookResponseException $e) {
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		}
		catch (\Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		catch(\Exception $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}

		$friendsGraphObject = $friends->getDecodedBody();

		if( isset($friendsGraphObject['summary']['total_count']) ) {
			$result['friends_count'] = $friendsGraphObject['summary']['total_count'];
		}
		else {
			$result['friends_count'] = 0;
		}

		/* Number of posts api */

		try {

			$posts = $fb->get('/me/feed', $access_token);
			dd( $posts );
		}
		catch (\Facebook\Exceptions\FacebookResponseException $e) {
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		}
		catch (\Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		catch(\Exception $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}

		$postsObject = $posts->getDecodedBody();

		$posts_count = count($postsObject['data']);

		$post_array = $postsObject['data'];

		$postsLikesArray = array();

		if( isset($posts_count) && count( $posts_count ) ) {

			for ($i = 0; $i < $posts_count; $i++) {

				$object_id = $post_array[$i]['id'];

				//	Get Likes >>

				try {

					$postLikes = $fb->get('/' . $object_id . '/likes', $access_token);
					$postsLikesObject = $postLikes->getDecodedBody();

					if( isset($postsLikesObject['data']) ) {
						$postsLikesArray[$i] = count($postsLikesObject['data']);
					}

				}
				catch (\Facebook\Exceptions\FacebookResponseException $e) {

					echo 'Graph returned an error: ' . $e->getMessage();
					exit;
				}
				catch (\Facebook\Exceptions\FacebookSDKException $e) {

					echo 'Facebook SDK returned an error: ' . $e->getMessage();
					exit;
				}
				catch (\Exception $e) {

					echo 'error: ' . $e->getMessage();
					exit;
				}

				//	Get Likes <<

				//	Get Comments >>

				try {

					$postComments = $fb->get('/' . $object_id . '/comments', $access_token);
					$postsCommentsObject = $postComments->getDecodedBody();

					if( isset($postsCommentsObject['data']) ) {
						$postsCommentsArray[$i] = count($postsCommentsObject['data']);
					}

				}
				catch (\Facebook\Exceptions\FacebookResponseException $e) {

					echo 'Graph returned an error: ' . $e->getMessage();
					exit;
				}
				catch (\Facebook\Exceptions\FacebookSDKException $e) {

					echo 'Facebook SDK returned an error: ' . $e->getMessage();
					exit;
				}
				catch (\Exception $e) {

					echo 'error: ' . $e->getMessage();
					exit;
				}

				//	Get Comments >>
			}
		}


		$totalPostsLikes = array_sum($postsLikesArray);

		if( $posts_count > 0 ) {
			$result['average_likes'] = $totalPostsLikes / $posts_count;
		}
		else {
			$result['average_likes'] = 0;
		}
		$result['total_likes'] = isset($totalPostsLikes) ? $totalPostsLikes : 0;
		$result['posts_count'] = isset($posts_count) ? $posts_count : 0;

		return $result;
	}

	public static function getFacebookUserDetailsOld($auth_user, $detail) {

		// $fb = new \Facebook\Facebook([
		// 	'app_id' => '1990796621152165',
		// 	'app_secret' => '4ee0eb8f4796c8540987ef174fbc319d',
		// 	'default_graph_version' => 'v2.8',
		// ]);

		// /* Friends count api */
		// try {
		// 	$friends = $fb->get('/me/friends', $detail->access_token);
		// } catch (\Facebook\Exceptions\FacebookResponseException $e) {
		// 	echo 'Graph returned an error: ' . $e->getMessage();
		// 	exit;
		// } catch (\Facebook\Exceptions\FacebookSDKException $e) {
		// 	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 	exit;
		// }

		// $friendsGraphObject = $friends->getDecodedBody();

		// $result['friends_count'] = $friendsGraphObject['summary']['total_count'];

		// /* Number of posts api */

		// try {

		// 	$posts = $fb->get('/me/feed', $detail->access_token);
		// } catch (\Facebook\Exceptions\FacebookResponseException $e) {
		// 	echo 'Graph returned an error: ' . $e->getMessage();
		// 	exit;
		// } catch (\Facebook\Exceptions\FacebookSDKException $e) {
		// 	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 	exit;
		// }
		// $postsObject = $posts->getDecodedBody();

		// $posts_count = count($postsObject['data']);


		// $post_array = $postsObject['data'];

		// $postsLikesArray = array();

		// for ($i = 0; $i < $posts_count; $i++) {


		// 	$object_id = $post_array[$i]['id'];

		// 	try {

		// 		$postLikes = $fb->get('/' . $object_id . '/likes', $detail->access_token);
		// 	} catch (\Facebook\Exceptions\FacebookResponseException $e) {

		// 		echo 'Graph returned an error: ' . $e->getMessage();
		// 		exit;
		// 	} catch (\Facebook\Exceptions\FacebookSDKException $e) {
		// 		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 		exit;
		// 	}

		// 	$postsLikesObject = $postLikes->getDecodedBody();
		// 	$postsLikesArray[$i] = count($postsLikesObject['data']);
		// }

		// $totalPostsLikes = array_sum($postsLikesArray);

		// // $result['average_likes'] = $totalPostsLikes / $posts_count;
		// $result['average_likes'] = $totalPostsLikes ;

		// return $result;
	}

	public static function getTwitterUserDetails($user, $detail) {

		$socialTypeId = SocialType::where('social_name', 'Twitter')->value('id');
		$twitterId = InfluencerDetail::where('user_id', $user->id)->where('social_type', $socialTypeId)->value('social_id');

		if( isset($twitterId) && $twitterId ) {

			$twitter = Twitter::getUserTimeline(['user_id' => $twitterId,'count'=>200]);

			return $twitter;
		}
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
				self::$instagram_posts[] = $value;
			}
		}

		if( isset( $output['pagination']['next_url'] ) ) {

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

				self::$instagram_posts[] = $value;
			}
		}

		if( isset( $outputData['pagination']['next_url'] ) ) {

			self::getInstagramUserMediaPagination( $outputData['pagination']['next_url'] );
		}

		return 1;
	}

	public static function getGoogleUserDetails($user, $detail) {

		$youtube_api_key = env('YOUTUBE_API_KEY','AIzaSyCftP5uli2AY9skhy0U8sMARh6T8CEgMjY');

		$socialTypeId = \Config::get('constants.social_type.google');

		$googleData = InfluencerDetail::where('user_id', $user->id)->where('social_type', $socialTypeId)->first();

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails&mine=true');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $detail->access_token"
		));
		$result = curl_exec($curl);
		curl_close($curl);

		$channels = json_decode($result);
		//echo "<pre>";print_r($channels);exit;
		
		$youtubeDetails['subscriber_count'] = 0;
		$youtubeDetails['avg_views'] = 0 ;
		$youtubeDetails['avg_no_of_comments'] = 0;

		if(isset($channels->items) && count($channels->items)){

			foreach ($channels->items as $key => $val) {
				if(isset($val->id) && $val->id != '' ){
					$channelId = $val->id;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channelId.'&key='.$youtube_api_key);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec($curl);
					curl_close($curl);

					$channel_details = json_decode($result);
					
					if(isset($channel_details->items[0]->statistics) && count($channel_details->items[0]->statistics)){

						$channel_details = $channel_details->items[0]->statistics;

						if(isset($channel_details->subscriberCount)){
							$youtubeDetails['subscriber_count'] = $youtubeDetails['subscriber_count'] + $channel_details->subscriberCount;
						}
						if(isset($channel_details->viewCount) && isset($channel_details->videoCount)){
							$youtubeDetails['avg_views'] = $channel_details->viewCount / $channel_details->videoCount;
						}
						if(isset($channel_details->commentCount) && isset($channel_details->videoCount)){
							$youtubeDetails['avg_no_of_comments'] = $channel_details->commentCount / $channel_details->videoCount;
						}

						echo "<pre>";print_r($youtubeDetails);exit;

					}
					echo "<pre>";print_r($channel_details->items[0]->statistics);exit;


				}

				if(isset($val->contentDetails->relatedPlaylists->uploads) && $val->contentDetails->relatedPlaylists->uploads!='' ){
					$playlistId = $val->contentDetails->relatedPlaylists->uploads;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId='.$playlistId.'&key='.$youtube_api_key);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec($curl);
					curl_close($curl);

					$playlistItems = json_decode($result);
					echo "<pre>";print_r($playlistItems);exit;
				}
			}
			echo "<pre>";print_r($channels->items);
		}
		
		die("_D_");

		dd($googleData);
		// Get Playlist Details
		// https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=OneDirectionVEVO&key=AIzaSyCftP5uli2AY9skhy0U8sMARh6T8CEgMjY

		// Get Videos from Playlist
		// https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=UUbW18JZRgko_mOGm5er8Yzg&key=AIzaSyCftP5uli2AY9skhy0U8sMARh6T8CEgMjY


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?part=snippet&forMine=true&maxResults=25&type=video&key=AIzaSyCftP5uli2AY9skhy0U8sMARh6T8CEgMjY');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $detail->access_token "
		));
		$result = curl_exec($curl);
		curl_close($curl);

		print_r($result);
		die();
	}

	public static function logout(Request $request) {

		$request->session()->flush();
		Auth::logout();

		return redirect('/');
	}

	public function signUp() {
		return view('signup.enteremail');
	}

	public function checkEmail(Request $request) {

		if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

			return json_encode(0);
		}

		$v = User::where('email', $request->email)->first();

		if (is_null($v)) {
			return json_encode(1);
		}

		return json_encode(0);
	}

	public function postSignup() {

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$location = $_POST['location'];
		$birth_date = $_POST['birth_date'];
		$email = $_POST['email'];
		
		DB::table('users')
				->where('email', $email)
				->update(['fname' => $fname, 'lname' => $lname, 'location' => $location, 'date_of_birth' => $birth_date]);        
		
		$code = Util::generateRandomCode(4);

		$v_email = VerifyEmail::where('email', $email)->first();

		if (is_null($v_email)) {

			$verify_email = new VerifyEmail;
			$verify_email->email = $email;
			$verify_email->code = $code;
			$verify_email->save();

			$id = $verify_email->id;
		} else {

			$v_email->code = $code;
			$v_email->save();
			$id = $v_email->id;
		}



		$data['blade'] = 'emails.verify';
		$data['email'] = $email;

		$data['code'] = $code;

		$data['subject'] = trans('messages.verifySubject', array('code' => $code));
		Util::sendMail($data);

		return json_encode(array('status' => 1));
	}

	public function verifyCode($id) {

		$email = VerifyEmail::where('id', $id)->value('email');
		return view('signup.verifycode')->with('email', $email);
	}

	public function checkPhoneCode() {
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$verify = VerifyPhone::where('phone', $phone)->where('code', $code)->first();

		if (is_null($verify)) {

			return json_encode(array('status' => 0));
		} else {

			$verify->is_verified = 1;
			$verify->save();


			return json_encode(array('status' => 1));
		}
	}

	public function checkCode() {

		$code = $_POST['code'];
		$email = $_POST['email'];
		$verify = VerifyEmail::where('email', $email)->where('code', $code)->first();

		if (is_null($verify)) {

			return json_encode(array('status' => 0));
		} else {

			$verify->is_verified = 1;
			$verify->save();


			return json_encode(array('status' => 1));
		}
	}

	public function enterPassword($user_id) {

		$user = User::find($user_id);

		return view('signup.enterpassword')->with('user', $user);
	}

	public function postEnterpassword(Request $request) {

		$user_id = $request->input('user_id');
		$password = $request->input('password');

		User::where('id', $user_id)->update(array('password' => \Hash::make($password)));

		return json_encode(array('url' => '/brands/enter-details/' . $user_id));
	}

	public function enterDetail($user_id) {

		$user = User::find($user_id);
		$industry_type = IndustryType::select('id', 'name')->get();
		return view('signup.enterdetail')->with(array('user' => $user, 'industry_type' => $industry_type));
	}

	public function postEnterdetails(Request $request) {

		$user_id = $request->input('user_id');
		$brand_name = $request->input('brand_name');
		$name = $request->input('name');
		$industry_type = $request->input('industry_type');

		User::where('id', $user_id)->update(array('name' => $name));

		$brand = new BrandDetail;
		$brand->brand_name = $brand_name;
		$brand->industry_type = $industry_type;
		$brand->user_id = $user_id;
		$brand->save();



		return json_encode(array('url' => '/brands/category/' . $user_id));
	}

	public function postEnterCategory(Request $request) {

		$user_id = $request->input('user_id');
		$category_id = $request->input('category_id');

		BrandDetail::where('user_id', $user_id)->update(array('category_id' => $category_id));

		return json_encode(array('status' => 1));
	}

	public function sendPhoneCode(Request $request) {

		$phone = $request->phone;
		$code = Util::generateRandomCode(4);

		$v_phone = VerifyPhone::where('phone', $phone)->first();

		if (is_null($v_phone)) {

			$verify_phone = new VerifyPhone;
			$verify_phone->phone = $phone;
			$verify_phone->code = $code;
			$verify_phone->save();

			$id = $verify_phone->id;
		} else {


			$v_phone->code = $code;
			$v_phone->save();

			$id = $v_phone->id;
		}
		return json_encode(array('status' => 1));
	}

	public function sendOtpToEmail() {
		
	}
	
	public function setCategory() {

					
		$auth_user = Auth::user();
		return $auth_user;
		
		$category = $_POST['category'];
		
		DB::table('influencer_details')
				->where('user_id', $auth_user->id)
				->update(['category_id' => $category]);
	}

	public function getTwitterDetails() {

		// $twitter = Twitter::getUserTimeline(['screen_name' => 'DerickStewart93']);
		$twitter = Twitter::getUserTimeline(['screen_name' => 'nealray_cis','count'=>200]);
		// dd( count($twitter) );
		dump( $twitter[0]->user );
		dump( $twitter[0]->user->followers_count );
		dd( $twitter );
		$result['followers_count'] = $twitter[0]->user->followers_count;
	}

	public function checkFacebookData() {

		// $access_token = 'EAAcDPFWbrcIBAOcauuRM9OrGItXyHRL9JjHbRnWPBFZAe8FWQSwjKZCAR8Bg7YsocYgjJlcHYr5uxdjNt546TWqoJkdBZAknqkw13CNP2CdG0iwu9eVCrTleBUWBtfzbur0k54FgjGwrwWPKSVXsui03MqZA8dXsVDwAIxfpUQZDZD';

		// $access_token = 'EAAcSnnVsf6UBAJ59ZCpVfDsZALJyCPOduhFM4R3MnE3tALkzNrZAScFaZBqQ9M8AbDWk5ya1Rjg39QJqK4SttcilvMIXOR8ho7TkIHTiZAD9IITjIpjS1TDSxeutIwkj8Uyt2fbUCM8QUXSfrliMIA2nlVXJ14HGAW5ozvPHRMgZDZD';

		/* Get Friends >> */

		/*
      $url = 'https://graph.facebook.com/me/friends?'.http_build_query(array(
        'access_token' => $access_token,
      ));
      $friends = json_decode(file_get_contents($url),TRUE);

      return $friends;
      */

      /* Get Friends << */

		$fb = new \Facebook\Facebook([
			'app_id' => env('FACEBOOK_APP_ID'),
			'app_secret' => env('FACEBOOK_SECRET'),
			'default_graph_version' => 'v2.8',
		]);

		/* Friends count api */
		try {
			$friends = $fb->get('/me/friends', $access_token);
		}
		catch (\Facebook\Exceptions\FacebookResponseException $e) {
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		}
		catch (\Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		catch(\Exception $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}

		$friendsGraphObject = $friends->getDecodedBody();

		$result['friends_count'] = $friendsGraphObject['summary']['total_count'];

		/* Number of posts api */

		try {

			$posts = $fb->get('/me/feed', $access_token);
		}
		catch (\Facebook\Exceptions\FacebookResponseException $e) {
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		}
		catch (\Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		catch(\Exception $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}

		$postsObject = $posts->getDecodedBody();

		$posts_count = count($postsObject['data']);

		$post_array = $postsObject['data'];

		$postsLikesArray = array();

		for ($i = 0; $i < $posts_count; $i++) {

			$object_id = $post_array[$i]['id'];

			try {

				$postLikes = $fb->get('/' . $object_id . '/likes', $detail->access_token);
			}
			catch (\Facebook\Exceptions\FacebookResponseException $e) {

				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
			}
			catch (\Facebook\Exceptions\FacebookSDKException $e) {

				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			catch (\Exception $e) {

				echo 'error: ' . $e->getMessage();
				exit;
			}

			$postsLikesObject = $postLikes->getDecodedBody();
			$postsLikesArray[$i] = count($postsLikesObject['data']);
		}

		$totalPostsLikes = array_sum($postsLikesArray);

		$result['average_likes'] = $totalPostsLikes / $posts_count;
		$result['total_likes'] = $totalPostsLikes ;
		$result['posts_count'] = $posts_count;

		return $result;
	}

}
