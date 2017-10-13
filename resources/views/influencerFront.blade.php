@extends('app')
@section('content')
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="public/assets/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="public/assets/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul class="headerAlign">
                    @if(Session::get('username') == '')
                        <li><a href="{{url('/brands')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @else
                        <li><a href="{{url('/brands/dashboard')}}" class="brands-border brands-button text-bold">Brands</a></li>
                    @endif
                    <li><a href="{{url('/')}}/influencers/benefits" class="influencers-border benefits-button text-bold">Benefits</a></li>
                    <li><a href="#" class="influencers-border benefits-button text-bold">Talk to us</a></li>
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
            <div id="id01" class="modal" style="overflow-y: hidden;">
                <div class="modal-content animate popup-container">
                    <form class="ui-form">
                        <ul class="FormList">
                            <li class=" section-one">
                                <h2 style="font-size: 28px !important">Log in with your account</h2>
                                <a class="social" href="login/facebook"><img class="" src="public/assets/images/fb.png" alt="Facebook"/><br></a>
                                <a class="ablock" href="login/instagram"><img class="" src="public/assets/images/inst.png" alt="Instagram"/></a><br>
                                <a class="ablock" href="login/twitter"><img class="" src="public/assets/images/twitter.png" alt="TWITTER"/></a><br>
                                <a class="ablock" href="login/google"><img class="" src="public/assets/images/youtube.png" alt="Youtube"/></a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
<section class="container-fulid pad0 header about_banner">
                <div class="container height90vh influencer_back">
                    <section class="banner-text">
                        <h1 class="influencers-heading-text text-center">Work with brand grow your reach and get paid to do what you love </h1>
                    </section>
                    <div class="row" >
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <h4  class="influencers-heading-left text-center" style="font-size: 30px; margin-bottom: 26px;">Join our community of 12100+<br> people like you</h4>
                             <div class="button-group-center">
                            <li><a href="#" class="Login-button btn influncerSignBtn " onclick="document.getElementById('id01').style.display='block'">Sign me up</a></li>
                        </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                             <section class="banner-image">
                        <img class="influencerBanner" src="public/assets/images/influencers-banner.png" alt="AIM Zeneith banner-fornt" class="img-responsive">
                    </section>
                        </div>
                    </div>
                   
                </div>
            </section>
            <section class="clearfix height35vh text-center" style="margin-top: 40px;" >
                <h1 >Introducing whisttler – where you are rewarded for stuff you create.</h1>
            </section>
            <section class="container height55vh" style="margin-bottom: 50px">
                <div class="row">
                <div class="col-md-7 col-lg-6 col-sm-12 col-xs-12 ">
                    <img style = "margin-left: 117px" src ="public/assets/images/Get paid.png" alt="AIM Zeneith meaning to your content" class="" style="width:170px">
                </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12  indexPara">
                    <div style="margin-left: 139px;">
                        <h2 class="heading-text">Get paid for what you do</h2>
                        <p>All you have to do is create and post. We’ll handle the rest.</p>
                        <div class="btn dropdown-link influencers-text-color" id="dropdown-link3"> <img class="ion ion-ios7-close-empty" src="public/assets/images/plus_icon.png"/> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
                    </div>
                    </div>
                </div>
                
            </div>
        </section>
        <section class="container-fluid flex influencers-border hidden-section dsplyNone clickMe1 clickMe3" style="margin-bottom: 80px">
            <div class="container margin90 ">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="public/assets/images/create-content.png" alt="Know your Influence and grow">
                        <p>Create content which produce impact and increase your chances to get work</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="public/assets/images/post-the-content.png" alt="Work with Brands and get paid">
                        <p>Post the content which you create and engage your followers with content they love.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="public/assets/images/effective-content.png" alt="Curated works and brands">
                        <p>Collaborate with “Name” and create effective content for your network and followers.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container height55vh" style="margin-bottom: 90px">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 indexPara">
                <div style="margin-left: 125px;">
                    <h2 class="heading-text">Work with Brands</h2>
                    <p>Receive briefs from brands, collaborate with them to create campaigns which people care about </p>
                    <div class="btn dropdown-link influencers-text-color" id="dropdown-link4"><img class="ion ion-ios7-close-empty" src="public/assets/images/plus_icon.png"/> <span> <span class="glyphicon glyphicon-plus">Learn more</span><span class="glyphicon glyphicon-remove">Close</span> </span>
                </div>
            	</div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <img style="margin-left: 125px" src="public/assets/images/work-with-brand.png" alt="AIM Zeneith Run campaigns" class="" style="width:180px">
            </div>
        </div>
    </section>
    <section class="container-fluid flex influencers-border  hidden-section dsplyNone clickMe2 clickMe4">
        <div class="container margin90">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img  src="public/assets/images/You-can-work-with-big-brands.png" alt="connect with inflencer">
                    <p>You can work with big brands, grow your social presence and be a part of something bigger.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="public/assets/images/work-with-small-brands.png" alt="run champ">
                    <p>Work with small brands and help them reach the right users and be a major part of their growth story.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="public/assets/images/tell-us-what-you-love.png" alt="">
                    <p>Tell us what you love and we’ll connect you with only those brands you’ll enjoy working with.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="container height55vh">
        <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <img style="margin-left: 125px; width:195px;height:246px " src="public/assets/images/your-worth.png" alt="AIM Zeneith meaning to your content" class=""   align="Center">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 indexPara">
            	<div style="margin-left: 125px;">	
                <h2 class="heading-text">Know your worth</h2>
                <p>Our algorithm scans through your profile and tells you your popularity index and value. No more hard negotiations, get what you are worth.</p>
            	</div>	
            </div>
            
        </div>
    </section>
    <section class="container story flex">
    <div class="row footer-top">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 text-center">
            <img src="public/assets/images/categories.png" alt="AIM Zeneith brand success stories">
            <h4 class="title-text">Multiple Categories</h4>
            <p>Add a secondary category and get chances to reach a diverse group of people.</p>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 text-center">
            <img src="public/assets/images/manage-campaign.png" alt="AIM Zeneith influencer stories">
            <h4 class="title-text">Manage Campaign</h4>
            <p>Receive and respond to campaign request from brands. Decide on the deliverables, dates and launch.</p>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 text-center">
            <img src="public/assets/images/analysis.png" alt="AIM Zeneith success stories">
            <h4 class="title-text">Analysis</h4>
            <p>See how you performed in a campaign and receive recommendations from us to do even better the next time.</p>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 text-center">
            <img src="public/assets/images/social-account.png" alt="AIM Zeneith success stories">
            <h4 class="title-text">Multiple social account</h4>
            <p>You can connect various social accounts and receive and run campaigns everywhere.</p>
        </div>
    </div>
</section>
    <section class="container height45vh flex">
        <div class="row">
           
            <div class=" text-center">
                <form>
                    <h3 class="form-heading" style="margin-bottom: 20px">SIGN UP FOR FREE ? </h3>
                     <!-- <span class="cta_input_email_wrapper">
                                <input name="email" type="email" spellcheck="false" id="inline_input" placeholder="Email address">
                            </span> -->
                    <a href="#" class="Login-button btn influncerSignBtn " onclick="document.getElementById('id01').style.display='block'">Yes, sign me up</a>
                </form>
            </form>
        </div>
    </div>
</section>
@endsection

<script>

window.onload = function () { 
    var hash = window.location.hash;
    if(hash == "#login" || hash == "#signup"){
        document.getElementById('id01').style.display = 'block';
    }
}

</script>