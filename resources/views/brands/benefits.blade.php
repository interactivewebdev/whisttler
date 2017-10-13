@extends('app')
@section('content')   

<header class="container-fulid pad0 height90vh header_blue">
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
    <img src="{{url('/')}}/public/assets/images/brands-benefits-banner.png" alt="AIM Zeneith Influencers Benefits" class="banner_center">
</header>
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
<section class="container about_banner brands-benefits">
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/timer.png" alt="AIM Zeneith" class="pull-left">
                <p class="stories-section">Don’t spend a week searching influencers. Search the one you want through our search filters and influencer recommendations</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/fish.png" alt="AIM Zeneith" class="pull-left">
                <p>Never spend an extra buck by optimizing spend according to our ROI and Cost Analysis</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/help.png" alt="AIM Zeneith" class="pull-left">
                <p>We’ll help you manage you campaign more efficiently</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/social-value.png" alt="AIM Zeneith" class="pull-left">
                <p>Upfront Influencer’s Social Value Indicator for better transparency</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/briefcase.png" alt="AIM Zeneith" class="pull-left">
                <p>Work with only verified and trusted Influencers</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/bulll-eye.png" alt="AIM Zeneith" class="pull-left">
                <p>Our dedicated support lets you focus on the things which you are good at.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/notes.png" alt="AIM Zeneith" class="pull-left">
                <p>In depth analytics of campaigns so you never miss a detail</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row-card">
                <img src="{{url('/')}}/public/assets/images/blue-hammer.png" alt="AIM Zeneith" class="pull-left">
                <p> Whisttler saves your brands time and resources by managing your whole campaign with multiple influencers and across
                    different social platform from one point.</p>
            </div>
        </div>
    </div>
</section>
<section class="container brands-benefits">
    <div class="row text-center margin90">
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-user.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Sign Up</p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right link1">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-search.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Find Influencers </p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/filter.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Use our search filters to narrow down search </p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-list.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">write a campaign brief</p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-bottom.png" alt="Aeroplane Right" class="aeroplane aeroplane-bottom">
        </div>
    </div>
    <div class="row text-center margin130">
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-shake-hand.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Collaborate</p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-bottom.png" alt="Aeroplane Right" class="aeroplane aeroplane-bottom">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/cash-transfer.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Receive Replies </p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/message.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Send Brief </p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-left.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/wallet.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Choose influencers you want to work with </p>
        </div>
    </div>
    <div class="row text-center margin130" style="margin-top: 110px">
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-hammer.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Run campaigns </p>
            <img src="{{url('/')}}/public/assets/images/blue-aeroplane-right.png" alt="Aeroplane Right" class="aeroplane aeroplane-right">
        </div>
        <div class="col-md-3 margintb50px">
            <img src="{{url('/')}}/public/assets/images/brand-stat.png" alt="AIM Zeneith" class="img-responsive1 pad10">
            <p class="pad10">Receive detailed analytics, ROI, reports and custom suggestions. </p>
        </div>
    </div>
</section>
@endsection