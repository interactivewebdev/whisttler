<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InfluencerDetail;
use App\Models\InfluencerSocialMapping;
// use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\SocialMetaData;
// use App\Models\InfluencerSocialMapping;

use Auth, Session;

class InfluencerController extends Controller {

    protected $influencer_id;
    protected $influencer_data;
    public $total_alerts_notification;
    public $alerts;
    public $compaigns;
    public $user_id;

    function __construct() {

        $this->influencer_id = 1;

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

        $auth_user = Auth::user();
        $categories = Category::select('id', 'category_name', 'image')->get();
        $locations = \App\Models\Location::all();

        return view('influencer.signup')->with(array(
                    'user' => $auth_user,
                    'categories' => $categories,
                    'locations' => $locations
        ));
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
        // $socialScore = InfluencerSocialMapping::where('influencer_id',$userId)->sum('score');

        $score = [];

        if( isset($socialMetaData) && count( $socialMetaData ) ) {
            foreach ( $socialMetaData as $key => $value) {
                if( isset($value['meta_key']) && $value['meta_key'] == 'score' ) {
                    $score[$value['social_type']] = $value['meta_value'];
                }
            }
        }

        $socialScore = array_sum($score);

        return view('influencer.dashboard')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification,
                    'influencer_data'=>$influencerData,
                    'social_meta_data' => $socialMetaData,
                    'social_score' => $socialScore,
        ));
    }

    public function profile() {

        return view('influencer.profile')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function compaigns() {

        return view('influencer.profile')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function categories() {

        return view('influencer.profile')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function support() {

        return view('influencer.support')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function faq() {

        return view('influencer.faq')->with(array(
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

}
