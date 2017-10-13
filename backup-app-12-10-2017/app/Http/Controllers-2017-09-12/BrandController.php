<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailAuth;
use App\Mail\SupportMail;
use App\Models\Alerts;

class BrandController extends Controller {

    public $total_alerts_notification;
    public $alerts;
    public $compaigns;

    function __construct() {
        $this->alerts = \App\Models\Alerts::where('status', 0)->count();
        $this->compaigns = \App\Models\Compaign::where('approved', 0)->count();
        $total_alerts_notification = $this->alerts + $this->compaigns;

        $this->total_alerts_notification = $total_alerts_notification;
    }

    public function getBrandFrontPage() {

        return view('brandsFront');
    }

    public static function getSignUp(Request $request) {

        $email = \Illuminate\Support\Facades\Input::get('email');

        $validator = Validator::make($request->all(), [
                    'email' => 'required|e-mail|unique:users,email'
        ]);

        if ($validator->fails()) {
            return redirect('/brands')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        $auth_code = rand(10000, 99999);

        Session::put('brand_email', $email);

        Mail::to($email)
                ->send(new emailAuth($auth_code));

        return redirect('/brands/mailauth/' . md5($auth_code));
    }

    public function mailAuthenticate($code) {
        return view('brands.signup')->with(array(
                    'code' => $code,
                    'email' => Session::get('brand_email')
        ));
    }

    public function checkAuth() {
        $code = \Illuminate\Support\Facades\Input::get('code');
        $code_entered = md5(\Illuminate\Support\Facades\Input::get('code_entered'));

        if ($code === $code_entered) {
            $brand_user_id = DB::table('users')->insertGetId([
                'user_name' => Session::get('brand_email'),
                'email' => Session::get('brand_email'),
                'status' => 1
            ]);

            Session::put('brand_user_id', $brand_user_id);

            return redirect('/brands/password');
        } else {
            return redirect()->back();
        }
    }

    public function password() {
        return view('brands.password')->with(array('brand_user_id' => Session::get('brand_user_id')));
    }

    public function validatePassword(Request $request) {
        $validator = Validator::make($request->all(), [
                    'password' => 'required',
                    'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/password')
                            ->withErrors($validator)
                            ->withInput(array('brand_user_id' => Session::get('brand_user_id')));
        }

        DB::table('users')
                ->where('id', Session::get('brand_user_id'))
                ->update(['password' => Hash::make($request->input('password'))]);

        return redirect('/brands/profiledetail')->with(array('brand_user_id' => Session::get('brand_user_id')));
    }

    public function profiledetail() {
        $industries = \App\Models\IndustryType::select('id', 'name')->get();
        $locations = \App\Models\Location::select('id', 'state_name')->get();

        return view('brands.profileentry')->with(array(
                    'industries' => $industries,
                    'brand_user_id' => Session::get('brand_user_id')));
    }

    public function validateProfile(Request $request) {

        $validator = Validator::make($request->all(), [
                    'fname' => 'required',
                    'lname' => 'required',
                    'brand_name' => 'required',
                    'industry' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/profiledetail')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        DB::table('users')
                ->where('id', $request->input('brand_user_id'))
                ->update(['fname' => $request->input('fname'), 'lname' => $request->input('lname')]);

        $brand_id = DB::table('brand_details')->insertGetId([
            'brand_name' => $request->input('brand_name'),
            'industry_type' => $request->input('industry'),
            'user_id' => $request->input('brand_user_id')
        ]);

        return redirect('/brands/categories')->with(array(
                    'brand_user_id' => $request->input('brand_user_id'),
                    'brand_id' => $brand_id
        ));
    }

    public function listcategory() {
        $categories = \App\Models\Category::select('id', 'category_name', 'image')->get();

        return view('brands.categories')->with(array(
                    'categories' => $categories,
                    'brand_user_id' => Session::get('brand_user_id'),
                    'brand_id' => Session::get('brand_id')
        ));
    }

    public function postCategories(Request $request) {

        $validator = Validator::make($request->all(), [
                    'categories' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/categories')
                            ->withErrors($validator)
                            ->withInput(array(
                                'brand_user_id' => $request->input('brand_user_id'),
                                'brand_id' => $request->input('brand_id')
            ));
        }

        DB::table('brand_details')
                ->where('id', $request->input('brand_id'))
                ->update(['category_id' => implode(',', $request->input('categories'))]);

        Session::put('brand_id', $request->input('brand_user_id'));

        return redirect('/brands/dashboard');
    }

    public function registerBrand(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|e-mail|unique:users,email',
                    'username' => 'required|unique:users,user_name',
                    'password' => 'required',
                    'brand_name' => 'required',
                    'phone' => 'required|numeric',
                    'industry_type' => 'required',
                    'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/sign-up')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        $user_id = DB::table('users')->insertGetId([
            'user_name' => $request->input('username'),
            'name' => $request->input('brand_name'),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'status' => 1
        ]);
        DB::table('brand_details')->insert([
            [
                'brand_name' => $request->input('brand_name'),
                'industry_type' => $request->input('industry_type'),
                'user_id' => $user_id,
                'category_id' => $request->input('category')
            ]
        ]);

        Session::put('brand_id', $user_id);
        Session::put('username', $request->input('username'));
        Session::put('email', $request->input('email'));
        Session::put('name', $request->input('brand_name'));

        return redirect('/brands/dashboard');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/benefits');
        }

        $condition = [
            'user_name' => $request->input('username')
        ];

        if (User::where($condition)->count() > 0) {
            $user_detail = User::where($condition)->first();
            //return $user_detail->password;
            if (Hash::check($request->input('password'), $user_detail->password)) {
                Session::put('brand_id', $user_detail->id);
                Session::put('username', $user_detail->user_name);
                Session::put('email', $user_detail->email);
                Session::put('name', $user_detail->name);
                return redirect('/brands/dashboard');
            } else {
                return redirect('/brands');
            }
        }
    }

    public function getBenefits() {

        return view('brands.benefits');
    }

    public function dashboard() {

        $brand_detail = User::find(Session::get('brand_id'))->Brand;
        $user_detail = User::find(Session::get('brand_id'));
        return view('brands.dashboard')->with(array(
                    'brand_id' => $brand_detail->id,
                    'brand_name' => $brand_detail->brand_name,
                    'brand_email' => $user_detail->email,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function profile() {

        $brand_detail = User::find(Session::get('brand_id'))->Brand;
        $user_detail = User::find(Session::get('brand_id'));
        $location = \App\Models\Location::find($user_detail->location);
        $industry = \App\Models\IndustryType::find($brand_detail->industry_type);
        $catids = explode(',', $brand_detail->category_id);
        $categories = DB::table('categories')
                ->select('id', 'category_name', 'image')
                ->whereIn('id', $catids)
                ->get();

        return view('brands.profile')->with(array(
                    'brand_id' => $brand_detail->id,
                    'brand_name' => $brand_detail->brand_name,
                    'brand_email' => $user_detail->email,
                    'profile' => $user_detail,
                    'categories' => $categories,
                    'industrytype' => $industry,
                    'location' => $location,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function updateProfile() {
        $brand_detail = User::find(Session::get('brand_id'))->Brand;
        $user_detail = User::find(Session::get('brand_id'));
        $locations = \App\Models\Location::select('id', 'state_name')->get();

        return view('brands.updateprofile')->with(array(
                    'brand_id' => $brand_detail->id,
                    'brand_name' => $brand_detail->brand_name,
                    'first_name' => $user_detail->fname,
                    'last_name' => $user_detail->lname,
                    'phone' => $user_detail->phone,
                    'location' => $user_detail->location,
                    'locations' => $locations,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function postUpdateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'phone' => 'required|numeric',
                    'location' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/updateprofile')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        DB::table('users')
                ->where('id', Session::get('brand_id'))
                ->update([
                    'fname' => $request->input('first_name'),
                    'lname' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                    'location' => $request->input('location')
        ]);

        return redirect('/brands/profile')->with('message', 'Profile updated successfully!');
    }

    public function changePassword() {
        $brand_detail = User::find(Session::get('brand_id'))->Brand;
        $user_detail = User::find(Session::get('brand_id'));

        return view('brands.changepassword')->with(array(
                    'brand_id' => $brand_detail->id,
                    'brand_name' => $brand_detail->brand_name,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function postChangePassword(Request $request) {
        $validator = Validator::make($request->all(), [
                    'old_password' => 'required',
                    'new_password' => 'required',
                    'confirm_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/changepassword')
                            ->withErrors($validator)
                            ->withInput(\Illuminate\Support\Facades\Input::all());
        }

        $condition = [
            'id' => Session::get('brand_id')
        ];

        if (User::where($condition)->count() > 0) {
            $user_detail = User::where($condition)->first();
            //return $user_detail->password;
            if (Hash::check($request->input('old_password'), $user_detail->password)) {
                DB::table('users')
                        ->where('id', Session::get('brand_id'))
                        ->update([
                            'password' => Hash::make($request->input('new_password'))
                ]);
            } else {
                return redirect('/brands/changepassword')->with('message', 'Old password didn\'t match with our record!');
            }
        }

        return redirect('/brands/profile')->with('message', 'Password changed successfully!');
    }

    public function compaigns() {

        return view('brands.campaign')->with(array(
                    'brand_id' => Session::get('brand_id'),
                    'brand_name' => Session::get('name'),
                    'brand_email' => Session::get('email'),
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function categoryList() {
        $brand_detail = User::find(Session::get('brand_id'))->Brand;
        $catids = explode(',', $brand_detail->category_id);
        $categories = DB::table('categories')
                ->select('id', 'category_name', 'image')
                ->whereIn('id', $catids)
                ->get();

        return view('brands.categoryList')->with(array(
                    'brand_id' => Session::get('brand_id'),
                    'brand_name' => Session::get('name'),
                    'brand_email' => Session::get('email'),
                    'categories' => $categories,
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function categories() {

        return view('brands.profile')->with(array(
                    'brand_id' => Session::get('brand_id'),
                    'brand_name' => Session::get('name'),
                    'brand_email' => Session::get('email'),
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function support() {

        return view('brands.support')->with(array(
                    'brand_id' => Session::get('brand_id'),
                    'brand_name' => Session::get('name'),
                    'brand_email' => Session::get('email'),
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

    public function postSupport(Request $request) {

        $validator = Validator::make($request->all(), [
                    'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/brands/support')
                            ->withErrors($validator);
        }
        
        $user_detail = User::find(Session::get('brand_id'));
        $message = $request->input('message');
        
        $alerts = new Alerts();
        $alerts->alert_type = 'support';
        $alerts->user_id = $user_detail->id;
        $alerts->user_type = 'Brand';
        $alerts->name = $user_detail->fname." ".$user_detail->lname;
        $alerts->email = $user_detail->email;
        $alerts->telephone = $user_detail->phone;
        $alerts->message = $message;
        $alerts->status = 0;
        $alerts->save();
        
        Mail::to("geetika@aquadsoft.com")
                ->send(new SupportMail([
                    'name' => $user_detail->fname." ".$user_detail->lname,
                    'email' => $user_detail->email,
                    'phone' => $user_detail->phone,
                    'message' => $message
                ]));
        
        return redirect('/brands/support')->with('message', 'I have got your request and we will get in touch with you within 12 hours!');
        
    }

    public function faq() {

        return view('brands.faq')->with(array(
                    'brand_id' => Session::get('brand_id'),
                    'brand_name' => Session::get('name'),
                    'brand_email' => Session::get('email'),
                    'total_alerts' => $this->alerts,
                    'total_compaigns' => $this->compaigns,
                    'total_alerts_notification' => $this->total_alerts_notification
        ));
    }

}
