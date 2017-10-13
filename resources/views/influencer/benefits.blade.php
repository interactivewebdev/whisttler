@extends('app')
@section('content')
<header class="container-fulid height90vh pad0 back_green">
    <div class="back_white">
        <div class="container">
            <nav class="positionRelative">
                <div class="addContainer">
                    <a href="{{url('/')}}"><img src="{{asset('public/assets/images/logo.png')}}" alt="AIM Zeneith Logo" class="logo_img1"></a>
                    <a href="{{url('/')}}"><img src="{{asset('public/assets/images/chage-logo.png')}}" alt="AIM Zeneith Logo" class="logo_img2"></a>
                    <ul class="headerAlign">
                        @if(Session::get('username') == '')
                            <li><a href="{{url('/brands')}}" class="brands-border brands-button text-bold">Brands</a></li>
                        @else
                            <li><a href="{{url('/brands/dashboard')}}" class="brands-border brands-button text-bold">Brands</a></li>
                        @endif
                        <li><a href="{{url('/')}}/pricing" class="influencers-border benefits-button text-bold">Pricing</a></li>
                        <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                        @if(Auth::user() == null && Session::get('username') == '')
                            <li><a href="#" class="Login-button" onclick="document.getElementById('id01').style.display = 'block'">Login</a></li>
                        @else
                            @if(Auth::user()->toArray()['id'] != '')
                                <li><a href="{{url('/influencers/dashboard')}}" class="Login-button">Dashboard</a></li>
                            @else
                                <li><a href="{{url('/brands/dashboard')}}" class="Login-button">Dashboard</a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </nav>

        </div>
    </div>
    <span class="banner-text"></span>
    <img src="{{ url('/') }}/public/assets/images/influencers-benefits-banner.png" alt="AIM Zeneith Influencers Benefits" class="banner_center">
</header>
<div id="id01" class="modal" style="overflow-y: hidden;">
    <div class="modal-content animate  popup-container" action="/action_page.php">
        <form class="ui-form">
            <!-- <ul class="ui-progressbar">
                        <li class="progressbar-active">Enter Email</li>
                        <li>Social Profiles</li>
                        <li>Enter Verification Code</li>
                        <li>Create Password</li>
                        <li>Select Influencer</li>
                        <li>Create Profile</li>
                  </ul>  -->
            <ul class="FormList">
                <li class="section section-one">
                    <h2 style="font-size: 28px !important">Log in with your account</h2>
                    <a href="{{url('/')}}/login/facebook"><img class="btn-next col-md" src="{{asset('public/assets/images/fb.png')}}" alt="FB" /></a>
                    <br>
                    <a href="{{url('/')}}/login/instagram"><img class="btn-next" src="{{asset('public/assets/images/inst.png')}}" alt="EMAIL" /></a>
                    <br>
                    <a href="{{url('/')}}/login/twitter"><img class="btn-next" src="{{asset('public/assets/images/twitter.png')}}" alt="TWITTER" /></a>
                    <br>
                    <a href="javascript:void()"><img class="btn-next" src="{{asset('public/assets/images/youtube.png')}}" alt="FB" /></a>
                </li>
                <li class="section section-two" style="display:none">
                    <h3>Select Primary/Secondary category</h3>
                    <select>
                        <option value="influencer-1">Select Primary-1</option>
                        <option value="influencer-2">Select Primary-2</option>
                        <option value="influencer-3">Select Primary-3</option>
                        <option value="influencer-4">Select Primary-4</option>
                    </select>
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="btn-next">Next</button>
                </li>
                <li class="section section-three" style="display:none">
                    <h3>Complete profile</h3>
                    <input type="email" placeholder="Email id">
                    <input type="Password" placeholder="City">
                    <input type="Password" placeholder="State">
                    <input type="Password" placeholder="Gender">
                    <input type="Password" placeholder="Date of Birth">
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="btn-next">Next</button>
                </li>
                <li class="section section-four" style="display:none">
                    <h3>Enter verification code for email id.</h3>
                    <input type="Password" placeholder="Enter verification code">
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="btn-next">Next</button>
                </li>
                <li class="section section-five" style="display:none">
                    <h3>Phone number.</h3>
                    <input type="Password" placeholder="Phone number">
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="btn-next">Next</button>
                </li>
                <li class="section section-six" style="display:none">
                    <h3>Phone number verification</h3>
                    <input type="Password" placeholder="Enter verification code">
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="btn-next">Next</button>
                </li>
                <li class="section section-six" style="display:none">
                    <h3>Show a profile preview with all the information collected</h3>
                    <p>Name :</p>
                    <br>
                    <p>Select Primary/Secondary category :</p>
                    <br>
                    <p>Email id :</p>
                    <br>
                    <p>City :</p>
                    <br>
                    <p>State :</p>
                    <br>
                    <p>Gender :</p>
                    <br>
                    <p>Date of Birth :</p>
                    <br>
                    <p>Phone number :</p>
                    <br>
                    <button type="button" value="Next" class="btn-back">Back</button>
                    <button type="button" value="Next" class="">Submit</button>
                </li>
            </ul>
        </form>
    </div>
</div>
<section class="container about_banner brands-benefits">
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/horn.png" alt="AIM Zeneith" class="pull-left">
                <p class="">Anyone can be an influencer.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/recieve-hand.png" alt="AIM Zeneith" class="pull-left">
                <p>Receive campaign request from brands who are really looking forward to work with you</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/save-money.png" alt="AIM Zeneith" class="pull-left">
                <p>You get paid for what you love to do</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/right-and-wrong.png" alt="AIM Zeneith" class="pull-left">
                <p>You’ll have the power to accept or reject a brand’s request for a campaign</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/shake-hand.png" alt="AIM Zeneith" class="pull-left">
                <p>There won’t be any hard negotiations</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/stats.png" alt="AIM Zeneith" class="pull-left">
                <p>Whisttler gives you analysis of each campaign you do and suggestion on how can you improve your performance the next time.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/share.png" alt="AIM Zeneith" class="pull-left">
                <p>Know how much influence you have and get recommendations on how to grow your social reach and engagement level</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/knowledge.png" alt="AIM Zeneith" class="pull-left">
                <p>Whisttler give you opportunities to work with big brands so that you can grow your social presence.</p>
            </div>
        </div>
    </div>
</section>
<section class="container brands-benefits">
    <div class="row text-center margin90">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/login.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Log in with your social account</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/profile.png" alt="AIM Zeneith" class="pad10">
            <p class="pad10">complete profile</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/connect-with-other-accounts.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">connect other accounts</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/analytics.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">analytics associated with your accounts</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-bottom.png" alt="Aeroplane Right" class="aeroplane aeroplane-bottom">
        </div>
    </div>
    <div class="row text-center margin130">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/thumbsup.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Run campaign</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
            <img src="{{url('/')}}/public/assets/images/aeroplane-bottom.png" alt="Aeroplane Right" class="aeroplane aeroplane-bottom">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/collabrate.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Collaborate with brands </p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/hammer.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">receive campaign requests </p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/big-horn.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Know you influencer </p>
        </div>
    </div>
    <div class="row text-center margin130" style="margin-top: 110px">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/get-paid.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Get paid</p>
            <img src="{{url('/')}}/public/assets/images/aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 margintb50px">
            <img src="{{url('/')}}/public/assets/images/book.png" alt="AIM Zeneith" class=" pad10">
            <p class="pad10">Receive campaign analysis</p>
        </div>
    </div>
</section>
@endsection