<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ContentController extends Controller {

    public function privacyPolicy() {

        return view('pages.privacy');
    }
    
    public function faq() {

        return view('pages.faq');
    }
    
    public function aboutus() {

        return view('pages.about');
    }
    
    public function influencerFaq() {

        return view('pages.influencerFaq');
    }
    
    public function brandFaq() {

        return view('pages.brandFaq');
    }

}
