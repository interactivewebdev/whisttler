<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminDetail;
use App\Models\Location;
use App\Models\Category;
use App\Models\BrandDetail;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public $total_alerts_notification;
    public $alerts;
    public $compaigns;

    function __construct() {
        $this->alerts = \App\Models\Alerts::where('status', 0)->count();
        $this->compaigns = \App\Models\Compaign::where('approved', 0)->count();
        $total_alerts_notification = $this->alerts + $this->compaigns;

        $this->total_alerts_notification = $total_alerts_notification;
    }

    public function index() {
        return view('admin.login');
    }

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin')
                            ->withErrors($validator)
                            ->withInput();
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $condition = ['user_id' => $username, 'password' => md5($password)];

        if (AdminDetail::where($condition)->count() > 0) {
            $admin_detail = AdminDetail::where($condition)->first();

            $request->session()->put('userid', $username);
            return redirect('admin/dashboard');
        } else {
            return redirect('admin')->with('message', 'Wrong Credential...');
        }
    }

    public function dashboard($plan = null, $duration = null, $status = null) {

        if (!$plan) {
            
        }

        if (!$duration) {
            
        }

        if (!$status) {
            
        }

        $brands = DB::select(DB::raw("select `brand_details`.*, `industry_type`.`name` as `industrytype`, `subscription_plan`.`plan_name` as `plan`, `subscription_plan`.`amount` as `price`, `user_subscriptions`.`date_taken`, datediff(`user_subscriptions`.`end_upto`, `user_subscriptions`.`starts_from`) as period from `users` inner join `brand_details` on `users`.`id` = `brand_details`.`user_id` left join `industry_type` on `brand_details`.`industry_type` = `industry_type`.`id` left join `user_subscriptions` on (`users`.`id` = `user_subscriptions`.`user_id` and curdate() between `user_subscriptions`.`starts_from` and `user_subscriptions`.`end_upto`) left join `subscription_plan` on `user_subscriptions`.`subscription_id` = `subscription_plan`.`id`"));

        $brands_count = BrandDetail::count();
        $paid_subscription = UserSubscription::where('paid', '=', '1')->count();
        $subscription_plans = \App\Models\SubscriptionPlan::all();

        return view('admin.dashboard', [
            'brands' => $brands,
            'subscription_plans' => $subscription_plans,
            'total_brands' => $brands_count,
            'paid_subscription' => $paid_subscription,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function influencers() {
        $influencers = DB::table('influencer_details')
                ->join('users', 'influencer_details.user_id', '=', 'users.id')
                ->join('social_type', 'influencer_details.social_type', '=', 'social_type.id')
                ->leftJoin('categories', 'influencer_details.category_id', '=', 'categories.id')
                ->select(
                        'influencer_details.*', 'users.*', 'categories.category_name', 'social_type.social_name'
                )
                ->get();
        $influencers_count = \App\Models\InfluencerDetail::count();
        $categories = \App\Models\Category::all();
        $locations = \App\Models\Location::all();
        $socialtypes = \App\Models\SocialType::all();

        return view('admin.influencers', [
            'influencers' => $influencers,
            'categories' => $categories,
            'locations' => $locations,
            'socialtypes' => $socialtypes,
            'total_influencers' => $influencers_count,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function googleanalysis() {
        return view('admin.googleanalysis', [
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function compaigns() {
        $compaigns = DB::table('campaigns')
                ->join('users', 'campaigns.user_id', '=', 'users.id')
                ->join('social_type', 'campaigns.social_type_id', '=', 'social_type.id')
                ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                ->leftJoin('states', 'campaigns.location_id', '=', 'states.id')
                ->where('approved', 1)
                ->select(
                        'campaigns.*', 'users.fname', 'users.lname', 'categories.category_name', 'social_type.social_name', 'states.state_name'
                )
                ->get();
        //return $compaigns;
        return view('admin.compaigns', [
            'compaigns' => $compaigns,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function newcompaigns() {
        $compaigns = DB::table('campaigns')
                ->join('users', 'campaigns.user_id', '=', 'users.id')
                ->join('social_type', 'campaigns.social_type_id', '=', 'social_type.id')
                ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                ->leftJoin('states', 'campaigns.location_id', '=', 'states.id')
                ->where('approved', 0)
                ->select(
                        'campaigns.*', 'users.fname', 'users.lname', 'categories.category_name', 'social_type.social_name', 'states.state_name'
                )
                ->get();

        $locations = Location::all();
        $categories = Category::all();
        $socialtypes = \App\Models\SocialType::all();
        $users = DB::table('users')
                        ->join('brand_details', 'brand_details.user_id', '=', 'users.id')
                        ->select(
                                'users.id', 'users.fname', 'users.lname'
                        )->get();
        $influencers = DB::table('influencer_details')
                        ->join('users', 'influencer_details.user_id', '=', 'users.id')
                        ->select(
                                'influencer_details.id', 'users.fname', 'users.lname'
                        )->get();

        return view('admin.newcompaigns', [
            'socialtypes' => $socialtypes,
            'locations' => $locations,
            'categories' => $categories,
            'users' => $users,
            'influencers' => $influencers,
            'compaigns' => $compaigns,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function updateCompaign($compaign_id) {
        $update_compaigns = DB::table('campaigns')
                ->join('users', 'campaigns.user_id', '=', 'users.id')
                ->join('social_type', 'campaigns.social_type_id', '=', 'social_type.id')
                ->leftJoin('categories', 'campaigns.category_id', '=', 'categories.id')
                ->leftJoin('states', 'campaigns.location_id', '=', 'states.id')
                ->where('campaigns.id', $compaign_id)
                ->select(
                        'campaigns.*', 'users.fname', 'users.lname', 'categories.category_name', 'social_type.social_name', 'states.state_name'
                )
                ->get();

        $locations = Location::all();
        $categories = Category::all();
        $socialtypes = \App\Models\SocialType::all();
        $compaign_stat = \App\Models\Compaign::find($compaign_id)->statistics;
        $users = DB::table('users')
                        ->join('brand_details', 'brand_details.user_id', '=', 'users.id')
                        ->select(
                                'users.id', 'users.fname', 'users.lname'
                        )->get();
        $influencers = DB::table('influencer_details')
                        ->join('users', 'influencer_details.user_id', '=', 'users.id')
                        ->select(
                                'influencer_details.id', 'users.fname', 'users.lname'
                        )->get();

        return view('admin.updatecompaigns', [
            'socialtypes' => $socialtypes,
            'locations' => $locations,
            'categories' => $categories,
            'users' => $users,
            'influencers' => $influencers,
            'compaigns' => $update_compaigns,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'compaign_stat' => $compaign_stat,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function editCompaign($compaign_id) {
        DB::table('campaigns')
                ->where('id', $compaign_id)
                ->update([
                    'purpose' => \Illuminate\Support\Facades\Input::get('purpose'),
                    'social_type_id' => @implode(',', \Illuminate\Support\Facades\Input::get('social_platforms')),
                    'location_id' => \Illuminate\Support\Facades\Input::get('location'),
                    'category_id' => \Illuminate\Support\Facades\Input::get('category'),
                    'influencers' => @implode(',', \Illuminate\Support\Facades\Input::get('influencer')),
                    'no_of_influencers' => \Illuminate\Support\Facades\Input::get('influencers_count'),
                    'start_date' => \Illuminate\Support\Facades\Input::get('start_date'),
                    'duration' => \Illuminate\Support\Facades\Input::get('duration'),
                    'budget' => \Illuminate\Support\Facades\Input::get('budget'),
                    'brief_desc' => \Illuminate\Support\Facades\Input::get('brief')
        ]);

        if (\App\Models\Compaign::find($compaign_id)->statistics) {
            DB::table('compaign_stat')
                    ->where('compaign_id', $compaign_id)
                    ->update([
                        'fb_like' => \Illuminate\Support\Facades\Input::get('fb_like'),
                        'fb_share' => \Illuminate\Support\Facades\Input::get('fb_share'),
                        'fb_comment' => \Illuminate\Support\Facades\Input::get('fb_comment'),
                        'fb_engagement' => \Illuminate\Support\Facades\Input::get('fb_engagement'),
                        'fb_reach' => \Illuminate\Support\Facades\Input::get('fb_reach'),
                        'tw_like' => \Illuminate\Support\Facades\Input::get('tw_like'),
                        'tw_retweet' => \Illuminate\Support\Facades\Input::get('tw_retweet'),
                        'tw_replies' => \Illuminate\Support\Facades\Input::get('tw_replies'),
                        'tw_engagement' => \Illuminate\Support\Facades\Input::get('tw_engagement'),
                        'tw_reach' => \Illuminate\Support\Facades\Input::get('tw_reach'),
                        'tw_clicks' => \Illuminate\Support\Facades\Input::get('tw_clicks'),
                        'yt_upvotes' => \Illuminate\Support\Facades\Input::get('yt_upvotes'),
                        'yt_share' => \Illuminate\Support\Facades\Input::get('yt_share'),
                        'yt_comment' => \Illuminate\Support\Facades\Input::get('yt_comment'),
                        'yt_views' => \Illuminate\Support\Facades\Input::get('yt_views'),
                        'yt_duration' => \Illuminate\Support\Facades\Input::get('yt_duration'),
                        'yt_engagement' => \Illuminate\Support\Facades\Input::get('yt_engagement'),
                        'yt_impressions' => \Illuminate\Support\Facades\Input::get('yt_impressions'),
                        'yt_clicks' => \Illuminate\Support\Facades\Input::get('yt_clicks'),
                        'ig_like' => \Illuminate\Support\Facades\Input::get('ig_like'),
                        'ig_impressions' => \Illuminate\Support\Facades\Input::get('ig_impressions'),
                        'ig_comment' => \Illuminate\Support\Facades\Input::get('ig_comment'),
                        'ig_engagements' => \Illuminate\Support\Facades\Input::get('ig_engagements'),
                        'ig_reach' => \Illuminate\Support\Facades\Input::get('ig_reach'),
                        'blog_views' => \Illuminate\Support\Facades\Input::get('blog_views'),
                        'blog_view_time' => \Illuminate\Support\Facades\Input::get('blog_view_time'),
                        'blog_engagements' => \Illuminate\Support\Facades\Input::get('blog_engagements'),
                        'quora_view' => \Illuminate\Support\Facades\Input::get('quora_view'),
                        'quora_upvotes' => \Illuminate\Support\Facades\Input::get('quora_upvotes'),
                        'snapchat_story_views' => \Illuminate\Support\Facades\Input::get('snapchat_story_views'),
                        'snapchat_screenshots' => \Illuminate\Support\Facades\Input::get('snapchat_screenshots'),
                        'snapchat_fallout' => \Illuminate\Support\Facades\Input::get('snapchat_fallout'),
                        'overall_reach' => \Illuminate\Support\Facades\Input::get('overall_reach'),
                        'overall_engagement' => \Illuminate\Support\Facades\Input::get('overall_engagement'),
                        'overall_roi_reach' => \Illuminate\Support\Facades\Input::get('overall_roi_reach'),
                        'overall_roi_engagement' => \Illuminate\Support\Facades\Input::get('overall_roi_engagement')
            ]);
        } else {
            DB::table('compaign_stat')->insert([
                [
                    'compaign_id' => $compaign_id,
                    'fb_like' => \Illuminate\Support\Facades\Input::get('fb_like'),
                    'fb_share' => \Illuminate\Support\Facades\Input::get('fb_share'),
                    'fb_comment' => \Illuminate\Support\Facades\Input::get('fb_comment'),
                    'fb_engagement' => \Illuminate\Support\Facades\Input::get('fb_engagement'),
                    'fb_reach' => \Illuminate\Support\Facades\Input::get('fb_reach'),
                    'tw_like' => \Illuminate\Support\Facades\Input::get('tw_like'),
                    'tw_retweet' => \Illuminate\Support\Facades\Input::get('tw_retweet'),
                    'tw_replies' => \Illuminate\Support\Facades\Input::get('tw_replies'),
                    'tw_engagement' => \Illuminate\Support\Facades\Input::get('tw_engagement'),
                    'tw_reach' => \Illuminate\Support\Facades\Input::get('tw_reach'),
                    'tw_clicks' => \Illuminate\Support\Facades\Input::get('tw_clicks'),
                    'yt_upvotes' => \Illuminate\Support\Facades\Input::get('yt_upvotes'),
                    'yt_share' => \Illuminate\Support\Facades\Input::get('yt_share'),
                    'yt_comment' => \Illuminate\Support\Facades\Input::get('yt_comment'),
                    'yt_views' => \Illuminate\Support\Facades\Input::get('yt_views'),
                    'yt_duration' => \Illuminate\Support\Facades\Input::get('yt_duration'),
                    'yt_engagement' => \Illuminate\Support\Facades\Input::get('yt_engagement'),
                    'yt_impressions' => \Illuminate\Support\Facades\Input::get('yt_impressions'),
                    'yt_clicks' => \Illuminate\Support\Facades\Input::get('yt_clicks'),
                    'ig_like' => \Illuminate\Support\Facades\Input::get('ig_like'),
                    'ig_impressions' => \Illuminate\Support\Facades\Input::get('ig_impressions'),
                    'ig_comment' => \Illuminate\Support\Facades\Input::get('ig_comment'),
                    'ig_engagements' => \Illuminate\Support\Facades\Input::get('ig_engagements'),
                    'ig_reach' => \Illuminate\Support\Facades\Input::get('ig_reach'),
                    'blog_views' => \Illuminate\Support\Facades\Input::get('blog_views'),
                    'blog_view_time' => \Illuminate\Support\Facades\Input::get('blog_view_time'),
                    'blog_engagements' => \Illuminate\Support\Facades\Input::get('blog_engagements'),
                    'quora_view' => \Illuminate\Support\Facades\Input::get('quora_view'),
                    'quora_upvotes' => \Illuminate\Support\Facades\Input::get('quora_upvotes'),
                    'snapchat_story_views' => \Illuminate\Support\Facades\Input::get('snapchat_story_views'),
                    'snapchat_screenshots' => \Illuminate\Support\Facades\Input::get('snapchat_screenshots'),
                    'snapchat_fallout' => \Illuminate\Support\Facades\Input::get('snapchat_fallout'),
                    'overall_reach' => \Illuminate\Support\Facades\Input::get('overall_reach'),
                    'overall_engagement' => \Illuminate\Support\Facades\Input::get('overall_engagement'),
                    'overall_roi_reach' => \Illuminate\Support\Facades\Input::get('overall_roi_reach'),
                    'overall_roi_engagement' => \Illuminate\Support\Facades\Input::get('overall_roi_engagement')
                ]
            ]);
        }

        return redirect('admin/newcompaigns');
    }

    public function addcompaign(Request $request) {
        $validator = Validator::make($request->all(), [
                    'user' => 'required',
                    'purpose' => 'required',
                    'social_platforms' => 'required',
                    'location' => 'required',
                    'category' => 'required',
                    'influencers_count' => 'required',
                    'start_date' => 'required',
                    'duration' => 'required',
                    'budget' => 'required',
                    'brief' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/newcompaigns')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        DB::table('campaigns')->insert([
            [
                'user_id' => $request->input('user'),
                'purpose' => $request->input('purpose'),
                'social_type_id' => @implode(',', $request->input('social_platforms')),
                'location_id' => $request->input('location'),
                'category_id' => $request->input('category'),
                'influencers' => @implode(',', $request->input('influencer')),
                'no_of_influencers' => $request->input('influencers_count'),
                'start_date' => $request->input('start_date'),
                'duration' => $request->input('duration'),
                'budget' => $request->input('budget'),
                'brief_desc' => $request->input('brief')]
        ]);

        return redirect('admin/compaigns');
    }

    public function approvecompaign($compaign_id) {
        DB::table('campaigns')
                ->where('id', $compaign_id)
                ->update(['approved' => 1]);

        return redirect('admin/compaigns');
    }

    public function alerts() {
        $alerts_data = \App\Models\Alerts::all();

        return view('admin.alerts', [
            'alerts' => $alerts_data,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function newbrand() {
        $locations = Location::all();
        $categories = Category::all();
        $industries = \App\Models\IndustryType::all();
        $subscriptions = \App\Models\SubscriptionPlan::all();

        return view('admin.newbrand', [
            'locations' => $locations,
            'categories' => $categories,
            'industries' => $industries,
            'subscriptions' => $subscriptions,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function postnewbrand(Request $request) {
        $validator = Validator::make($request->all(), [
                    'username' => 'required|e-mail|unique:users,email'
        ]);

        if ($validator->fails()) {
            return redirect('admin/newbrand')
                            ->withErrors($validator);
        }

        $brand_user_id = DB::table('users')->insertGetId([
            'user_name' => $request->input('username'),
            'email' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phone' => $request->input('phone'),
            'location' => $request->input('location'),
            'status' => 1
        ]);

        DB::table('brand_details')->insert([
            [
                'user_id' => $brand_user_id,
                'brand_name' => $request->input('brand_name'),
                'industry_type' => $request->input('industry'),
                'category_id' => @implode(',', $request->input('category'))
            ]
        ]);

        if ($request->input('subscription') != '') {
            DB::table('user_subscriptions')->insert([
                [
                    'user_id' => $brand_user_id,
                    'subscription_id' => $request->input('subscription'),
                    'paid' => 1,
                    'starts_from' => date("Y-m-d"),
                    'end_upto' => date("Y-m-d", time() + (86400 * 30 * (int) $request->input('period'))),
                    'date_taken' => date("Y-m-d")
                ]
            ]);
        }

        return redirect('admin/dashboard');
    }

    public function updatebrand($brand_id) {
        $locations = Location::all();
        $categories = Category::all();
        $industries = \App\Models\IndustryType::all();
        $subscriptions = \App\Models\SubscriptionPlan::all();

        $brands = DB::table('brand_details')
                ->join('industry_type', 'brand_details.industry_type', '=', 'industry_type.id')
                ->join('users', 'brand_details.user_id', '=', 'users.id')
                ->leftJoin('user_subscriptions', [
                    ['brand_details.user_id', '=', 'user_subscriptions.user_id'],
                ])
                ->leftJoin('subscription_plan', 'user_subscriptions.subscription_id', '=', 'subscription_plan.id')
                ->select(
                        'brand_details.*', 'industry_type.name as industrytype', 'subscription_plan.plan_name as plan', 'subscription_plan.amount as price', 'user_subscriptions.date_taken', 'users.user_name', 'users.password', 'users.fname', 'users.lname', 'users.phone', 'user_subscriptions.id as user_subscription', 'users.location', 'user_subscriptions.subscription_id as plan_id', 'user_subscriptions.end_upto', 'user_subscriptions.starts_from'
                )
                ->where('brand_details.id', '=', $brand_id)
                ->get();


        return view('admin.updatebrand', [
            'brand' => $brands[0],
            'locations' => $locations,
            'categories' => $categories,
            'industries' => $industries,
            'subscriptions' => $subscriptions,
            'total_alerts' => $this->alerts,
            'total_compaigns' => $this->compaigns,
            'total_alerts_notification' => $this->total_alerts_notification
        ]);
    }

    public function postupdatebrand(Request $request) {
        DB::table('users')
                ->where('id', $request->input('user_id'))
                ->update([
                    'user_name' => $request->input('username'),
                    'email' => $request->input('username'),
                    'fname' => $request->input('fname'),
                    'lname' => $request->input('lname'),
                    'phone' => $request->input('phone'),
                    'location' => $request->input('location')
        ]);

        DB::table('brand_details')
                ->where('id', $request->input('brand_id'))
                ->update([
                    'brand_name' => $request->input('brand_name'),
                    'industry_type' => $request->input('industry'),
                    'category_id' => @implode(',', $request->input('category'))
        ]);

        return redirect('admin/dashboard');
    }

    public function deletebrand($user) {
        $deleted_brand = DB::delete('delete from brand_details where user_id=' . $user);
        $deleted_subscriptions = DB::delete('delete from user_subscriptions where user_id=' . $user);
        $deleted_user = DB::delete('delete from users where id=' . $user);

        return redirect('admin/dashboard');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/admin');
    }

}
