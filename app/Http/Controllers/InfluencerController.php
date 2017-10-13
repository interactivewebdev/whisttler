<?php

namespace App\Http\Controllers;

use App\Models\VerifyPhone;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\InfluencerDetail;
use App\Models\InfluencerSocialMapping;
use App\Models\Category;
use App\Models\SocialMetaData;
use App\Models\VerifyEmail;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailAuth;
use App\Mail\SupportMail;
use Illuminate\Support\Facades\Hash;
// use App\Models\InfluencerSocialMapping;

use Auth, Session;

use App\Models\User;

class InfluencerController extends Controller {

    protected $influencer_id;
    protected $influencer_data;
    public $total_alerts_notification;
    public $alerts;
    public $compaigns;
    public $user_id;

    function __construct() {

        if( Auth::check() ) {
            $this->user_id = Auth::user()->id;
            $this->influencer_data = InfluencerDetail::where('user_id',$this->user_id)->first();
        }
        else {
            $this->user_id = 0;
            $this->influencer_data = [];
            // $this->influencer_data = InfluencerDetail::where('user_id',26)->first();
        }

        $this->alerts = \App\Models\Alerts::where('status', 0)->count();
        $this->compaigns = \App\Models\Compaign::where('approved', 0)->count();
        $this->total_alerts_notification = $this->alerts + $this->compaigns;        
    }

    public function getInfluencerFrontPage() {

        return view('influencerFront');
    }

    public static function getSignUp() {

        $user_detail = Session::get('influencer_detail');
        $user_data = User::where('email',$user_detail['email'])->first();

        $auth_user = Auth::user();
        $categories = Category::select('id', 'category_name', 'image')->get();
        $locations = \App\Models\Location::all();

        return view('influencer.signup')->with(array(
                    'user' => $auth_user,
                    'locations' => $locations
        ));
    }

    public static function postSignUp(Request $request) {

        $auth_user = Auth::user();

        $fname = Input::get('fname');
        $lname = Input::get('lname');
        $email = Input::get('email');
        $location = Input::get('location');
        $birth_date = Input::get('birth_date');

        $validator = Validator::make($request->all(), [
            'email' => 'required|e-mail'
        ]);

        if ($validator->fails()) {
            return redirect('/brands')
                ->withErrors($validator)
                ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        $user = User::where('email', $email)->get();

        $signup_user = array(
            'fname'			=> $fname,
            'lname'			=> $lname,
            'email'		    => $email,
            'user_name'		=> $email,
            'location'	    => $location,
            'date_of_birth'	=> $birth_date
        );

        Session::put('signup_user', $signup_user);

        if(count($user) > 0){
            User::where('id', $user[0]->id)
                ->update($signup_user);
        }

        $auth_code = rand(10000, 99999);

        $verify_email = VerifyEmail::where('email', $email)->get();
        if(count($verify_email) > 0){
            VerifyEmail::where('email', $email)
                ->update([
                    'code'          => $auth_code,
                    'is_verified'   => 0
                ]);
        }else{
            DB::table('verify_email')->insert(
                ['email' => $email, 'code' => $auth_code, 'is_verified' => 0]
            );
        }

        Mail::to($email)->send(new emailAuth($auth_code));

        return redirect('/influencers/mailauth/' . md5($auth_code));
    }

    public function mailAuthenticate($code) {

        return view('influencer.validate-email')->with(array(
            'code' => $code,
            'email' => Session::get('signup_user')['email']
        ));

    }

    public function checkAuth() {
        $code = Input::get('code');
        $code_entered = md5(Input::get('code_entered'));

        $auth_user = Auth::user();

        if ($code === $code_entered) {
            User::where('id',  $auth_user['id'])
                ->update([
                    'user_name' => Session::get('signup_user')['email'],
                    'email' => Session::get('signup_user')['email']
                ]);

            VerifyEmail::where('email', Session::get('signup_user')['email'])
                ->update([
                    'is_verified'   => 1
                ]);

            return view('influencer.signup-step2');
        } else {
            return redirect()->back();
        }
    }



    public function phoneAuthenticate(Request $request) {

        $auth_code = rand(10000, 99999);

        $verify_phone = VerifyPhone::where('phone', Input::get('phone'))->get();
        $signup_user = Session::get('signup_user');
        $signup_user['phone'] = Input::get('phone');
        Session::put('signup_user', $signup_user);

        if(count($verify_phone) > 0){
            VerifyPhone::where('phone', Input::get('phone'))
                ->update([
                    'code'          => $auth_code,
                    'is_verified'   => 0
                ]);
        }else{
            DB::table('verify_phone')->insert(
                ['phone' => Input::get('phone'), 'code' => $auth_code, 'is_verified' => 0]
            );
        }

        return redirect('/influencers/phonevalidate/'.md5($auth_code));

    }

    public function validatePhone($code) {
        return view('influencer.validate-phone')->with(array(
            'code' => $code,
            'phone' => Session::get('signup_user')['phone']
        ));
    }

    public function confirmPhone() {
        $code = Input::get('code');
        $phone_otp = md5(Input::get('phone_otp'));

        $auth_user = Auth::user();

        if ($code === $phone_otp) {
            User::where('id',  $auth_user['id'])
                ->update([
                    'phone' => Session::get('signup_user')['phone']
                ]);

            VerifyPhone::where('phone', Session::get('signup_user')['phone'])
                ->update([
                    'is_verified'   => 1
                ]);

            return redirect('/influencers/password/');
        } else {
            return redirect()->back();
        }
    }

    public function password() {
        return view('influencer.password');
    }

    public function validatePassword(Request $request) {
        $auth_user = Auth::user();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('/influencers/password')
                ->withErrors($validator);
        }

        DB::table('users')
            ->where('id', $auth_user['id'])
            ->update(['password' => Hash::make($request->input('password'))]);

        return redirect('/influencers/category');
    }

    public function categoryList() {
        $categories = \App\Models\Category::select('id', 'category_name', 'image')->get();

        return view('influencer.signup-category')->with(array(
            'categories' => $categories
        ));
    }

    public function postCategories(Request $request) {
        $auth_user = Auth::user();

        $validator = Validator::make($request->all(), [
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/influencers/category')
                ->withErrors($validator);
        }

        User::where('id', $auth_user['id'])
            ->update(['category_id' => $request->input('category')]);

        return redirect('/influencers/secondarycategory');
    }

    public function secondaryCategoryList() {
        $categories = \App\Models\Category::select('id', 'category_name', 'image')->get();

        return view('influencer.signup-secondary-category')->with(array(
            'categories' => $categories
        ));
    }

    public function postSecondaryCategories(Request $request) {

        $auth_user = Auth::user();

        $validator = Validator::make($request->all(), [
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/influencers/secondarycategory')
                ->withErrors($validator);
        }

        User::where('id', $auth_user['id'])
            ->update(['sub_category_id' => $request->input('category')]);

        return redirect('/influencers/dashboard');
    }

    public static function post($influencerDetail, $user_id, $social_type = '') {

        $influencer = new InfluencerDetail;
        $influencer->user_id = $user_id;
        $influencer->profile_pic_path = $influencerDetail->avatar;
        $influencer->social_id = $influencerDetail->id;
        if( property_exists($influencerDetail, 'login_with') ) {
            $influencer->social_type = $influencerDetail->login_with;
        }
        else {
            $influencer->social_type = $social_type;
        }
        $influencer->access_token = $influencerDetail->token;
        $influencer->save();

        $mapping = new InfluencerSocialMapping;
        $mapping->influencer_id = $influencer->id;
        $mapping->social_id = $influencerDetail->id;

        if( property_exists($influencerDetail, 'login_with') ) {
            $mapping->social_type = $influencerDetail->login_with;
        }
        else {
            $mapping->social_type = $social_type;
        }

        $mapping->access_token = $influencerDetail->token;
        $mapping->status = 1;
        $mapping->save();

        return true;
    }

    public static function update($influencerDetail, $user_id, $social_type = '') {

        $influencer = InfluencerDetail::where('user_id', $user_id)->first();
        $influencer->user_id = $user_id;
        $influencer->profile_pic_path = $influencerDetail->avatar;
        $influencer->social_id = $influencerDetail->id;

        if(property_exists($influencerDetail, 'login_with')) {
            $influencer->social_type = $influencerDetail->login_with;
        }
        else {
            $influencer->social_type = $social_type;
        }

        $influencer->access_token = $influencerDetail->token;
        $influencer->save();

        $mappingExists = [];
        if( property_exists($influencerDetail, 'login_with') ) {
            $mappingExists = InfluencerSocialMapping::where('social_id', $influencerDetail->id)->where('social_type', $influencerDetail->login_with)->first();
        }

        if (is_null($mappingExists)) {

            $mapping = new InfluencerSocialMapping;
            $mapping->influencer_id = $influencer->id;
            $mapping->social_id = $influencerDetail->id;
            $mapping->social_type = $influencerDetail->login_with;
            $mapping->access_token = $influencerDetail->token;
            $mapping->status = 1;
            $mapping->save();
        } else {

            $mappingExists->access_token = $influencerDetail->token;
            $mappingExists->save();
        }

        return true;
    }

    public function getBenefits() {

        return view('influencer.benefits');
    }

    public function dashboard() {

        $userId = auth()->id();

        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $influencerData = $influencerData->keyBy('social_type');

        $socialMetaData = SocialMetaData::where('influencer_id',$userId)->get();
        //dd($socialMetaData->toArray());

        $social_meta_data = array(
            'facebook' => array(
                'reach' => $this->getMetaValue($socialMetaData, '1', 'friends_count'),
                'posts_count' => $this->getMetaValue($socialMetaData, '1', 'posts_count'),
                'average_likes' => $this->getMetaValue($socialMetaData, '1', 'average_likes'),
                'total_likes' => $this->getMetaValue($socialMetaData, '1', 'total_likes'),
                'average_comment' => $this->getMetaValue($socialMetaData, '1', 'average_comment'),
                'conversation_rate' => $this->getMetaValue($socialMetaData, '1', 'total_comment'),
                'average_shares' => $this->getMetaValue($socialMetaData, '1', 'average_shares'),
                'amplification' => $this->getMetaValue($socialMetaData, '1', 'total_shares'),
                'score' => $this->getMetaValue($socialMetaData, '1', 'score'),
                'average_engagement' => $this->getMetaValue($socialMetaData, '1', 'average_engagement'),
                'engagements' => $this->getMetaValue($socialMetaData, '1', 'total_engagement')
            ),
            'twitter' => array(
                'reach' => $this->getMetaValue($socialMetaData, '2', 'followers_count'),
                'follows' => $this->getMetaValue($socialMetaData, '2', 'follows_count'),
                'average_retweet' => $this->getMetaValue($socialMetaData, '2', 'average_retweet'),
                'average_favorite' => $this->getMetaValue($socialMetaData, '2', 'average_favorite'),
                'average_replies' => $this->getMetaValue($socialMetaData, '2', 'average_replies'),
                'average_engagement' => $this->getMetaValue($socialMetaData, '2', 'average_engagement'),
                'following_followers_ratio' => $this->getMetaValue($socialMetaData, '2', 'following_followers_ratio'),
                'score' => $this->getMetaValue($socialMetaData, '2', 'score')
            ),
            'youtube' => array(
                'reach' => $this->getMetaValue($socialMetaData, '3', 'follows_count'),
                'total_views' => $this->getMetaValue($socialMetaData, '3', 'total_views'),
                'average_views' => $this->getMetaValue($socialMetaData, '3', 'average_views'),
                'total_comment' => $this->getMetaValue($socialMetaData, '3', 'total_comment'),
                'average_comment' => $this->getMetaValue($socialMetaData, '3', 'average_comment'),
                'total_likes' => $this->getMetaValue($socialMetaData, '3', 'total_likes'),
                'average_likes' => $this->getMetaValue($socialMetaData, '3', 'average_likes'),
                'total_dislikes' => $this->getMetaValue($socialMetaData, '3', 'total_dislikes'),
                'average_dislikes' => $this->getMetaValue($socialMetaData, '3', 'average_dislikes'),
                'total_videos' => $this->getMetaValue($socialMetaData, '3', 'total_videos'),
                'score' => $this->getMetaValue($socialMetaData, '3', 'score')
            ),
            'instagram' => array(
                'reach' => $this->getMetaValue($socialMetaData, '4', 'followers_count'),
                'avg_likes' => $this->getMetaValue($socialMetaData, '4', 'average_likes'),
                'average_comment' => $this->getMetaValue($socialMetaData, '4', 'average_comment'),
                'total_posts' => $this->getMetaValue($socialMetaData, '4', 'total_posts'),
                'follows_count' => $this->getMetaValue($socialMetaData, '4', 'follows_count'),
                'average_engagement' => $this->getMetaValue($socialMetaData, '4', 'average_engagement'),
                'following_followers_ratio' => $this->getMetaValue($socialMetaData, '4', 'following_followers_ratio'),
                'score' => $this->getMetaValue($socialMetaData, '4', 'score')
            ));

        $total_reach = $this->getMetaValue($socialMetaData, '1', 'friends_count')
            + $this->getMetaValue($socialMetaData, '2', 'followers_count')
            + $this->getMetaValue($socialMetaData, '3', 'follows_count')
            + $this->getMetaValue($socialMetaData, '4', 'followers_count');
        $total_engagements = $this->getMetaValue($socialMetaData, '1', 'total_engagement')
            + $this->getMetaValue($socialMetaData, '2', 'average_engagement')
            + $this->getMetaValue($socialMetaData, '3', 'total_views')
            + $this->getMetaValue($socialMetaData, '4', 'average_engagement');

        return view('influencer.dashboard')->with(array(
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification,
            'influencer_data'=>$influencerData,
            'social_meta_data' => $social_meta_data,
            'total_reach' => $total_reach,
            'total_engagements' => $total_engagements
        ));
    }

    public function getMetaValue($metadata, $social_type, $metakey){
        if( isset($metadata) && count( $metadata ) ) {
            foreach($metadata as $key => $value){
                if(isset($value['meta_key']) && $value['social_type'] == $social_type && $value['meta_key'] == $metakey){
                    return $value['meta_value'];
                }
            }
        }
    }

    public function submitUrl(Request $request)
    {
        $social_type = $request->input('social_type');
        $url = $request->input('url');
        $user_id = auth()->id();

        $mapping = InfluencerSocialMapping::where(['social_type' => $social_type, 'influencer_id' => $user_id])->get();
        if(count($mapping) <= 0) {
            DB::table('influencer_social_mapping')->insert([
                ['influencer_id' => $user_id, 'social_id' => $url, 'social_type' => $social_type, 'access_token' => $url]
            ]);
        }else{
            InfluencerSocialMapping::where(['social_type' => $social_type, 'influencer_id' => $user_id])
                ->update(['social_id' => $url, 'access_token' => $url]);
        }

        $mapping = InfluencerDetail::where(['social_type' => $social_type, 'user_id' => $user_id])->get();
        if(count($mapping) <= 0) {
            DB::table('influencer_details')->insert([
                ['user_id' => $user_id, 'social_id' => $url, 'social_type' => $social_type, 'access_token' => $url]
            ]);
        }else{
            InfluencerDetail::where(['social_type' => $social_type, 'user_id' => $user_id])
                ->update(['social_id' => $url, 'access_token' => $url]);
        }

        return redirect('/influencers/dashboard');
    }

    public function profile() {

        $userId = auth()->id();

        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $userData = User::where('id', $userId)->first()->toArray();
        $influencerData = $influencerData->keyBy('social_type');

        $socialMetaData = SocialMetaData::where('influencer_id',$userId)->get();

        $score = [];

        if( isset($socialMetaData) && count( $socialMetaData ) ) {
            foreach ( $socialMetaData as $key => $value) {
                if( isset($value['meta_key']) && $value['meta_key'] == 'score' ) {
                    $score[$value['social_type']] = $value['meta_value'];
                }
            }
        }

        $socialScore = array_sum($score);

        $data = [
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification,
                    'influencer_data'=>$influencerData,
                    'user_data'=>$userData,
                    'social_meta_data' => $socialMetaData,
                    'social_score' => $socialScore,
                ];

        return view('influencer.profile')->with($data);
    }

    public function compaigns() {

        $userId = auth()->id();
        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $influencerData = $influencerData->keyBy('social_type');

        return view('influencer.profile')->with(array(
                    'influencer_data'=>$influencerData,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function categories() {

        $userId = auth()->id();
        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $influencerData = $influencerData->keyBy('social_type');

        return view('influencer.profile')->with(array(
                    'influencer_data'=>$influencerData,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function support() {

        $userId = auth()->id();
        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $influencerData = $influencerData->keyBy('social_type');

        return view('influencer.support')->with(array(
                    'influencer_data'=>$influencerData,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function faq() {

        $userId = auth()->id();
        $influencerData = InfluencerDetail::where('user_id',$userId)->get();
        $influencerData = $influencerData->keyBy('social_type');

        return view('influencer.faq')->with(array(
                    'influencer_data'=>$influencerData,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

}
