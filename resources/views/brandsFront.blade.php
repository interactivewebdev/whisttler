@extends('app')
@section('content')  
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="public/assets/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="public/assets/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul class="headerAlign">
                    <li><a href="{{url('/')}}/influencers" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    <li><a href="{{url('/')}}/pricing" class="brands-border brands-button text-bold">Pricing</a></li>
                    <li><a href="{{url('/')}}/brands/benefits" class="brands-border brands-button text-bold">Benefits</a></li>
                    <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                    @if(Auth::user() == null && Session::get('username') == '')
                        <li><a href="#" class="Login-button" onclick="document.getElementById('id01').style.display = 'block'">Login</a></li>
                    @else
                        @if(Auth::user() != null)
                            <li><a href="{{url('/influencers/dashboard')}}" class="Login-button">Dashboard</a></li>
                        @else
                            <li><a href="{{url('/brands/dashboard')}}" class="Login-button">Dashboard</a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </nav>
        <div id="id01" class="modal" style="overflow-y: hidden;">
            <div class="modal-content animate  popup-container">
                <form method="post" action="{{url('/')}}/brands/login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h2>Login with Brand Credential</h2>
                    <br>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</header>
<section class="container-fulid pad0 header about_banner">
    <div class="container height90vh ">
        <section class="banner-text">
            <h1 class="influencers-heading-text text-center">Create powerful content and reach highly relevant users through humans  </h1>
        </section>
        <div class="row">
            <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="button-group-center">
                    <!--  <li><a href="#" class="Login-button btn brandsBtn">Sign up</a></li> -->
                    <p>
                    @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                </p>
                <form method="post" action="{{url('/brands/sign-up')}}" style="margin: 15% 0;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="cta_input_email_wrapper">
                        <input name="email" required type="email" spellcheck="false" id="inline_input" placeholder="Email which you use for business">
                    </span>
                    <button type="submit" class="brandGet">Get Started</button>
                </form>
                </div>
            </div>
            {{--<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <section class="banner-image">
                    <img class="influencerBanner" src="public/assets/images/banner.png" alt="AIM Zeneith banner-fornt" class="img-responsive">
                </section>
            </div>--}}
        </div>

    </div>
</section>

<section class="clearfix  text-center" style="margin-top:-32px;">
    <h1 >Humans respond to recommendations, not ads.</h1>
</section>
<section class="container height80vh flex">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-center">
            <img src="public/assets/images/search_engine.png" alt="AIM Zeneith Run campaigns" class="img-responsive">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 brand-content">
            <h2 class="heading-text">Influncer search engine </h2>
            <p>You can easily search influncers who are valuable to your brand.</p>
            <!-- <div class="btn dropdown-link brands-text-color" id="dropdown-link1"> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
        </div> -->
            <div id="dropdown-link1" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer;padding-top: 20px"> 
                <img class="ion ion-ios7-close-empty" src="public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>

    </div>
</section>
<section class="container-fluid flex brands-border  hidden-section dsplyNone showMe1 link2 link3">
    <div class="container margin90 ">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="public/assets/images/discover_influ.png" alt="connect with inflencer">
                <p>Discover influencers from our curated lists which are customized to your needs and according to whatyou do.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/assets/images/social_plat.png" alt="run champ">

                <p>You can narrow down your search with filters like social platform,category and location.</p>
            </div>
            <div class="col-md-3 text-center popularityImg">
                <img src="public/assets/images/popularity.png" alt="">

                <p>You can see easily how much reach and influnce does an influncer have through the popularity index.</p>
            </div>
            <div class="col-md-3 text-center user-basedImg">
                <img src="public/assets/images/user_based.png" alt="">

                <p>You learn about you and suggest you influncers who are most relevent to what you do and to user base with whom you want to connect.</p>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="container height55vh flex">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 brand-content">
            <h2 class="heading-text">Run online compaigns</h2>
            <p>You can easily run marketing compaigns with influncers in just 5 clicks</p>
            <!-- <div class="btn dropdown-link brands-text-color" id="dropdown-link"> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
        </div> -->
            <div id="dropdown-link" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer; padding-top: 20px"> 
                <img class="ion ion-ios7-close-empty" src="public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-center">
            <img src="public/assets/images/run_online.png" alt="AIM Zeneith meaning to your content" class="run_onlineImg">
        </div>
    </div>
</section>
<section class="container-fluid flex brands-border  hidden-section dsplyNone showMe2 link1 link3">
    <div class="container margin90 ">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="public/assets/images/budget.png" alt="Know your Influence and grow">
                <p>You can set your budget,give a brief and send it to influencers.it's very simple. </p>
            </div>
            <div class="col-md-3 text-center single-influ">
                <img src="public/assets/images/single_influ.png" alt="Work with Brands and get paid">
                <p>You can work with multiple influencers to run a campaign and with single influencers to run a multiple campaigns.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/assets/images/social_platform.png" alt="Curated works and brands">
                <p>You can easlly run campaign across different social platform with single or multiple influncers.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/assets/images/own_content.png" alt="Curated works and brands">
                <p>You can use your own content or ask our influncers to create their own.</p>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="container height55vh flex">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-center">
            <img src="public/assets/images/report_analysis.png" alt="AIM Zeneith Run campaigns" class="run_onlineImg">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 brand-content">
            <h2 class="heading-text">Get a proper analysis report </h2>
            <p>We provide you with overall analysis of your campaigns so you can optimize better.</p>
            <!-- <div class="btn dropdown-link brands-text-color" id="dropdown-link2"> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
        </div> -->
            <div id="dropdown-link2" class="dropdown-link close-panel influencers-text-color" style="cursor:pointer;padding-top: 20px"> 
                <img class="ion ion-ios7-close-empty" src="public/assets/images/plus_icon.png"/><span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span>
            </div>
        </div>

    </div>
</section>
<section class="container-fluid flex brands-border  hidden-section dsplyNone link1 link2 showMe3">
    <div class="container margin90 ">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="public/assets/images/cost_analysis.png" alt="connect with inflencer">
                <p>You'll get individual campaign report and cost analysis from us.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="public/assets/images/customize_analysis.png" alt="run champ">
                <p>you get the power to see where and how every penny of you campaign get spent.Get customized analysis and cost report.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="public/assets/images/social_flag.png">
                <p>You can connect with your social media account and receive recommendations us.</p>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <form method="post" action="{{url('/brands/sign-up')}}" style="margin: 10% 0;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span class="cta_input_email_wrapper">
                        <input name="email" required type="email" spellcheck="false" id="inline_input" placeholder="Email which you use for business">
                    </span>
                <button type="submit" class="brandGet">Get Started</button>
            </form>
        </div>
    </div>
</section>
@endsection
<script>

window.onload = function () { 
    var hash = window.location.hash;
    if(hash == "#login"){
        document.getElementById('id01').style.display = 'block';
    }
}

</script>