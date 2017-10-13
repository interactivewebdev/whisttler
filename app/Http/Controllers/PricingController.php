<?php

namespace App\Http\Controllers;

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

class PricingController extends Controller {

    
     public function getPricingPage() {
       
       
       return view('pricing');
       
       
   }
   
   

    public function getInTouch(Request $request) {

        $validator = Validator::make($request->all(), [
                    'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/pricing')
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
}
