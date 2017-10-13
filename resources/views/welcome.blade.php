@extends('app')
@section('content')
<header class="container-fulid pad0">
    <div class="container banner-back height120vh">
        <img src="public/assets/images/banner-lamp.png" alt="AIM Zeneith banner-top" class="pos-abs banner-top-img visible-md visible-lg">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="public/assets/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="public/assets/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul>
                    @if(Session::get('username') == '')
                        <li><a href="{{url('/brands')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @else
                        <li><a href="{{url('/brands/dashboard')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @endif

                    @if(Auth::user() == null)
                        <li><a href="{{url('/influencers')}}" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    @else
                            <li><a href="{{url('/influencers/dashboard')}}" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    @endif
                    <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="clearfix"></div>
<section class="banner-textIndex">
    <h1 class="heading-text text-center padding20">Collaborate &amp; launch  human based marketing campaigns.</h1>
    <p class="text-center">People understand recommendations, not advertisments. On Whisttler, influencers and brands collaborate to create better content, launch opitimized campaigns, with higher results in days, not months.</p>
    <div class="button-group-center">
        <li class="margintop"><a href="#" class="Login-button btn influncerSignBtn ">Sign up for free</a></li>
    </div>
</section>
<div class="clearfix"></div>
<section class="container height80vh flex margin130 about_banner">
    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 indexPara">
            <h2 class="heading-text">Brands and influencers are better when they work together. </h2>
            <p>At Whisttler, you can do exactly that. Our technologies and working methodologies make it easier than ever to create stuff, launch campaign, get detailed analysis and recommendations.</p>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 text-center">
            <img src="{{url('/')}}/public/assets/images/brands-and-influencer.png" alt="AIM Zeneith Brands and influencers" class="img-responsive marginTop66">
        </div>
    </div>
</section>

<section class="container height75vh">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{url('/')}}/public/assets/images/home-pageNew.png" alt="AIM Zeneith meaning to your content" class="responsive_width" >
        </div>
        <div class="col-md-6 indexPara">
            <h2 class="heading-text">Who is an influencer?</h2>
            <p> Influencers are creators, they are the story tellers. They are people who have the ability to inspire others, move them with their impactful content. You can have as little as 2000 followers or more than 2 million, but you are already an influencer if people can easily relate to you, connect with you and feel at home while engaging with you.</p>
           <!--  <div class="dropdown-link influencers-text-color" id="dropdown-link1"> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
        </div> -->
            <div id="dropdown-link1" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer;">
                <img class="ion ion-ios7-close-empty" src="{{url('/')}}/public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid flex influencers-border hidden-section dsplyNone showMe1 link2 link3">
    <div class="container margin90 ">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/know-your-influencer.png" alt="Know your Influence and grow">
                <h4 class="dropdown-text">Know your Influence and grow</h4>
                <p>Our algorithms scan your connected profiles and tell you your true influence and give you recommendations to reach more people and grow.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/work-with-brands.png" alt="Work with Brands and get paid">
                <h4 class="dropdown-text">Work with Brands and get paid</h4>
                <p>Get rewarded for the work you do. Just connect your profile and sign up with us. We’ll keep you updated about opportunities to work and everything else.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/curated-works-and-brands.png" alt="Curated works and brands">
                <h4 class="dropdown-text">Curated works and brands</h4>
                <p>Tell us what you love to do and we’ll curate brands and campaigns specific to your interest so that you keep loving every moment of your work.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="button-group-center">
                    <!--   <a href="#" class="btn highlighted-button" onclick="document.getElementById('id01').style.display='block'">Sign me up as influencer</a> -->
                    <a id="btn_wrapper1" href="javascript: void(0);" class="btn_a btn highlighted-button">Sign me up as influencer</a>
                </div>
            </div>
        </div>
        <div id="popupBox" class="popup_wrapper">
            <div class="overlay"></div>
            <div class="popup text-center">
                <a class="close" href="javascript: void(0);">&times;</a>
                <h2 style="font-size: 28px !important"> login icons of Facebook</h2>
                <a class="social" href="Signmeup.html"><img class="" src="{{url('/')}}/public/assets/images/fb.png" alt="FB"/><br></a>
            </div>
        </div>
    </div>
</section>
<section class="container height75vh">
    <div class="row">
        <div class="col-md-6  indexPara">
            <h2 class="heading-text">Give meaning to your content</h2>
            <p> Whisttler connects you to brands who want to work with you so that you can do more and be more.</p>
            <div id="dropdown-link" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer;">
                <img class="ion ion-ios7-close-empty" src="{{url('/')}}/public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>
        <div class="col-md-6  text-center">
            <img src="{{url('/')}}/public/assets/images/home-page.png" alt="AIM Zeneith meaning to your content" class="img-responsive" style="width: 440px;">
        </div>
    </div>
</section>
<section class="container-fluid flex influencers-border hidden-section dsplyNone showMe2 link1 link3">
    <div class="container margin90">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/know-your-influencer.png" alt="Know your Influence and grow">
                <h4 class="dropdown-text">Know your Influence and grow</h4>
                <p>Our algorithms scan your connected profiles and tell you your true influence and give you recommendations to reach more people and grow.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/work-with-brands.png" alt="Work with Brands and get paid">
                <h4 class="dropdown-text">Work with Brands and get paid</h4>
                <p>Get rewarded for the work you do. Just connect your profile and sign up with us. We’ll keep you updated about opportunities to work and everything else.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{url('/')}}/public/assets/images/curated-works-and-brands.png" alt="Curated works and brands">
                <h4 class="dropdown-text">Curated works and brands</h4>
                <p>Tell us what you love to do and we’ll curate brands and campaigns specific to your interest so that you keep loving every moment of your work.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="button-group-center">
                    <a id="btn_wrapper2" href="javascript: void(0);" class="btn_a btn highlighted-button">Sign me up as brand</a>
                </div>
            </div>
        </div>
        <div id="popupBox2" class="popup_wrapper">
            <div class="overlay"></div>
            <div class="popup text-center">
                <a class="close" href="javascript: void(0);">&times;</a>
                <div class="button-group-center">
                    <!--  <li><a href="#" class="Login-button btn brandsBtn">Sign up</a></li> -->
                    <form style="margin: 15% 0;">
                        <input type="hidden" name="done" value="1">
                        <input type="hidden" name="crumb" value="">
                        <span class="cta_input_email_wrapper">
                            <input name="email" type="email" spellcheck="false" id="inline_input" placeholder="Email which you use for business">
                        </span>
                        <a class="brandGet" href="signup.html">Get Started</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container height75vh responsive_margin">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{url('/')}}/public/assets/images/campaigns.png" alt="AIM Zeneith Run campaigns" class="" style="width: 300px;">
        </div>
        <div class="col-md-6 indexPara">
            <h2 class="heading-text">Run campaigns which have a human touch and reach relevant users through relevant influencers</h2>
            <p>At Whisttler, you as a brand – big or small – can reach to a larger user base through recommendations and campaigns done by real people and make a memorable mark in your user’s memory.</p>
            <div id="dropdown-link2" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer;">
                <img class="ion ion-ios7-close-empty" src="{{url('/')}}/public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>

    </div>
</section>
<section class="container-fluid flex brands-border  hidden-section dsplyNone link1 link2 showMe3">
    <div class="container margin90 ">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 text-center">
                <img src="{{url('/')}}/public/assets/images/connect-with-inflencer.png" alt="connect with inflencer">
                <h4 class="dropdown-text">Connect with Influencers</h4>
                <p>Discover influencers or zero down to the correct influencers which you want according to your requirement – social platform, category and location.</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 text-center">
                <img src="{{url('/')}}/public/assets/images/run-champ.png" alt="run champ">
                <h4 class="dropdown-text">Run Campaigns</h4>
                <p>Collaborate with influencers of your choice and run your online campaigns with multiple influencer across multiple platforms.</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 text-center">
                <img src="{{url('/')}}/public/assets/images/analysis-result.png" alt="">
                <h4 class="dropdown-text">Analyse your results</h4>
                <p>You get the power to see where and how every penny of you campaign got spent. Get customized analysis and cost report.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="button-group-center">
                    <a href="#" class="btn highlighted-button">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</section>
{{--<section class="container stories-section">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="{{url('/')}}/public/assets/images/icon-brand-success-stories.png" alt="AIM Zeneith brand success stories">
            <h4 class="title-text">Brand Success Stories</h4>
            <a href="#" class="highlighted-button">Read</a>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{url('/')}}/public/assets/images/icon-influencer-stories.png" alt="AIM Zeneith influencer stories">
            <h4 class="title-text">Influencer Stories</h4>
            <a href="#" class="highlighted-button">Read</a>
        </div>
        <div class="col-md-4 text-center">
            <img src="{{url('/')}}/public/assets/images/icon-success-stories.png" alt="AIM Zeneith success stories">
            <h4 class="title-text">Whisttler Stories</h4>
            <a href="#" class="highlighted-button">Read</a>
        </div>
    </div>
</section>--}}
@endsection