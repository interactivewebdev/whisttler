<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use \App\Http\Middleware\admin\CheckAdmin;
use App\Http\Middleware\CheckUser;

Route::get('phpinfo', function() {
  phpinfo();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/home', 'UserController@dashboard')->name('home');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::post('auth/login', 'Auth\LoginController@loginUser');

Route::get('/login/facebook', 'Auth\LoginController@loginWithFacebook');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
Route::get('/login/twitter', 'Auth\LoginController@loginWithTwitter');
Route::get('/login/twitter/callback', 'Auth\LoginController@handleTwitterCallback');
Route::get('login/instagram', 'Auth\LoginController@loginWithInstagram');
Route::get('login/instagram/callback', 'Auth\LoginController@handleInstagramCallback');
Route::get('login/youtube', 'Auth\LoginController@loginWithYoutube');
Route::get('login/youtube/callback', 'Auth\LoginController@handleYoutubeCallback');
Route::get('login/google', 'Auth\LoginController@loginWithYoutube');
Route::get('login/google/callback', 'Auth\LoginController@handleYoutubeCallback');

Route::group([ 'prefix' => 'connect' , 'middleware' => [ 'CheckUserAuth' ] ], function () {
  Route::get('facebook', 'Auth\ConnectController@loginWithFacebook');
  Route::get('twitter', 'Auth\ConnectController@loginWithTwitter');
  Route::get('instagram', 'Auth\ConnectController@loginWithInstagram');
  Route::get('youtube', 'Auth\ConnectController@loginWithYoutube');
  Route::get('google', 'Auth\ConnectController@loginWithYoutube');
});

Route::get('connect/facebook/callback', 'Auth\ConnectController@handleFacebookCallback');
Route::get('connect/twitter/callback', 'Auth\ConnectController@handleTwitterCallback');
Route::get('connect/instagram/callback', 'Auth\ConnectController@handleInstagramCallback');
Route::get('connect/youtube/callback', 'Auth\ConnectController@handleYoutubeCallback');
Route::get('connect/google/callback', 'Auth\ConnectController@handleYoutubeCallback');

/* Sign-up */
Route::get('/brands/verify-code/{any}', 'UserController@verifyCode');
Route::get('/brands/enter-password/{user_id}', 'UserController@enterPassword');
Route::get('/brands/enter-details/{user_id}', 'UserController@enterDetail');

/* Brands */
Route::get('/brands', 'BrandController@getBrandFrontPage');
Route::get('/brands/benefits', 'BrandController@getBenefits')->name('brandBenefit');
Route::get('/brands/categories', 'BrandController@categories');
Route::post('/brands/login', 'BrandController@login');
Route::get('/brands/sign-up', 'BrandController@getSignUp');
Route::post('/brands/sign-up', 'BrandController@getSignUp');
Route::get('/brands/mailauth/{code}', 'BrandController@mailAuthenticate');
Route::post('/brands/mailauth', 'BrandController@checkAuth');
Route::get('/brands/password', 'BrandController@password');
Route::post('/brands/password', 'BrandController@validatePassword');
Route::get('/brands/signupcategory', 'BrandController@signupCategoryList');
Route::post('/brands/signupcategory', 'BrandController@postSignupCategories');
Route::get('/brands/profiledetail', 'BrandController@profiledetail');
Route::post('/brands/profiledetail', 'BrandController@validateProfile');
Route::get('/brands/dashboard', 'BrandController@dashboard')->middleware(CheckUser::class);
Route::get('/brands/profile', 'BrandController@profile')->middleware(CheckUser::class);
Route::get('/brands/compaigns', 'BrandController@compaigns')->middleware(CheckUser::class);
Route::get('/brands/category', 'BrandController@categoryList')->middleware(CheckUser::class);
Route::get('/brands/support', 'BrandController@support')->middleware(CheckUser::class);
Route::post('/brands/support', 'BrandController@postSupport')->middleware(CheckUser::class);
Route::get('/brands/faq', 'BrandController@faq')->middleware(CheckUser::class);
Route::get('/brands/updateprofile', 'BrandController@updateProfile')->middleware(CheckUser::class);
Route::post('/brands/updateprofile', 'BrandController@postUpdateProfile')->middleware(CheckUser::class);
Route::get('/brands/changepassword', 'BrandController@changePassword')->middleware(CheckUser::class);
Route::post('/brands/changepassword', 'BrandController@postChangePassword')->middleware(CheckUser::class);
Route::get('/brands/addcategory', 'BrandController@listcategory')->middleware(CheckUser::class);
Route::post('/brands/addcategory', 'BrandController@postCategories')->middleware(CheckUser::class);

/* Influencer */
Route::get('/influencers', 'InfluencerController@getInfluencerFrontPage');
Route::get('/influencers/signup', 'InfluencerController@getSignUp')->name('influencerSignup');
Route::post('/influencers/postsignup', 'InfluencerController@postSignUp');
Route::get('/influencers/mailauth/{code}', 'InfluencerController@mailAuthenticate');
Route::post('/influencers/mailauth', 'InfluencerController@checkAuth');
Route::post('/influencers/phoneauth', 'InfluencerController@phoneAuthenticate');
Route::get('/influencers/phonevalidate/{code}', 'InfluencerController@validatePhone');
Route::post('/influencers/phoneconfirm', 'InfluencerController@confirmPhone');
Route::get('/influencers/password', 'InfluencerController@password');
Route::post('/influencers/password', 'InfluencerController@validatePassword');
Route::get('/influencers/category', 'InfluencerController@categoryList');
Route::post('/influencers/category', 'InfluencerController@postCategories');
Route::get('/influencers/secondarycategory', 'InfluencerController@secondaryCategoryList');
Route::post('/influencers/secondarycategory', 'InfluencerController@postSecondaryCategories');
Route::get('/influencers/benefits', 'InfluencerController@getBenefits')->name('influencerBenefit');
Route::post('/influencers/submitUrl', 'InfluencerController@submitUrl');

/* Sign-up */
Route::group([ 'prefix' => 'influencers' , 'middleware' => [ 'CheckUserAuth' ] ], function () {
  Route::get('dashboard', 'InfluencerController@dashboard');
  Route::get('profile', 'InfluencerController@profile');
  Route::get('compaigns', 'InfluencerController@compaigns');
  Route::get('categories', 'InfluencerController@categories');
  Route::get('support', 'InfluencerController@support');
  Route::get('faq', 'InfluencerController@faq');
});



/* Pricing */
Route::get('/pricing', 'PricingController@getPricingPage');
Route::post('/pricing/getintouch', 'PricingController@getInTouch');

/* Content Pages */
Route::get('/privacy', 'ContentController@privacyPolicy');
Route::get('/faq', 'ContentController@faq');
Route::get('/aboutus', 'ContentController@aboutus');

/* Content Pages */
Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@login');
Route::get('/admin/dashboard/{plan?}/{duration?}/{status?}', 'AdminController@dashboard')->middleware(CheckAdmin::class);
Route::get('/admin/newbrand', 'AdminController@newbrand')->middleware(CheckAdmin::class);
Route::post('/admin/newbrand', 'AdminController@postnewbrand')->middleware(CheckAdmin::class);
Route::get('/admin/updatebrand/{brand_id}', 'AdminController@updatebrand')->middleware(CheckAdmin::class);
Route::post('/admin/updatebrand/{brand_id}', 'AdminController@postupdatebrand')->middleware(CheckAdmin::class);
Route::post('/admin/updatebrand', 'AdminController@postupdatebrand')->middleware(CheckAdmin::class);
Route::get('/admin/viewbrand/{brand_id}', 'AdminController@viewbrand')->middleware(CheckAdmin::class);
Route::get('/admin/deletebrand/{brand}', 'AdminController@deletebrand')->middleware(CheckAdmin::class);

Route::get('/admin/influencers', 'AdminController@influencers')->middleware(CheckAdmin::class);
Route::get('/admin/newinfluencer', 'AdminController@newinfluencer')->middleware(CheckAdmin::class);
Route::post('/admin/newinfluencer', 'AdminController@postnewinfluencer')->middleware(CheckAdmin::class);
Route::get('/admin/updateinfluencer/{influencer_id}', 'AdminController@updateinfluencer')->middleware(CheckAdmin::class);
Route::post('/admin/updateinfluencer/{influencer_id}', 'AdminController@postupdateinfluencer')->middleware(CheckAdmin::class);
Route::post('/admin/updateinfluencer', 'AdminController@postupdateinfluencer')->middleware(CheckAdmin::class);
Route::get('/admin/deleteinfluencer/{influencer}', 'AdminController@deleteinfluencer')->middleware(CheckAdmin::class);

Route::get('/admin/googleanalysis', 'AdminController@googleanalysis')->middleware(CheckAdmin::class);
Route::get('/admin/compaigns', 'AdminController@compaigns')->middleware(CheckAdmin::class);
Route::get('/admin/newcompaigns', 'AdminController@newcompaigns')->middleware(CheckAdmin::class);
Route::get('/admin/updatecompaign/{compaign_id}', 'AdminController@updateCompaign')->middleware(CheckAdmin::class);
Route::post('/admin/updatecompaign/{compaign_id}', 'AdminController@editCompaign')->middleware(CheckAdmin::class);
Route::post('/admin/newcompaigns', 'AdminController@addcompaign')->middleware(CheckAdmin::class);
Route::get('/admin/approvecompaigns/{compaign_id}', 'AdminController@approvecompaign')->middleware(CheckAdmin::class);
Route::get('/admin/alerts', 'AdminController@alerts')->middleware(CheckAdmin::class);
Route::get('/admin/logout', 'AdminController@logout');

// Route::get('check-data','UserController@getInstagramUserDetails');
// Route::get('check-facebook','UserController@getFB');
// Route::get('check-twitter', function() {
//   $twitter = Thujohn\Twitter\Facades\Twitter::getUserTimeline(['screen_name' => 'nealray_cis','count'=>200]);
//   // dd( count($twitter) );
//   dump( $twitter[0] );die("_D");
//   dump( $twitter[0]->user );
//   dump( $twitter[0]->user->followers_count );
//   dd( $twitter );
//   $result['followers_count'] = $twitter[0]->user->followers_count;
// });

// Route::get('check-fb/{id}', function( $id ) {

//   $a = DB::table('admin_details')->get();
//   dd( $a );


// 	$user = App\Models\User::find($id);
// 	$detail = App\Models\InfluencerDetail::where('user_id', $user->id)->first();

// 	dump( $detail );

// 	$a = App\Http\Controllers\UserController::getFacebookUserDetails( $user , $detail );

// 	dd( $a );

// });
