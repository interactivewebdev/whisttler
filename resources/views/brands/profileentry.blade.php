@extends('app')
@section('content')
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="{{url('/')}}/public/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="{{url('/')}}/public/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul class="headerAlign">
                    <li><a href="{{url('/')}}/influencers" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    <li><a href="{{url('/')}}/brands" class="brands-border brands-button text-bold">Pricing</a></li>
                    <li><a href="{{url('/')}}/brands/benefits" class="brands-border brands-button text-bold">Benefits</a></li>
                    <li><a href="{{url('/')}}/whisttler/" target="_blank" class="highlighted-button">Blog</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<section class="about_banner">
    <div class="wrapper_log">
        <div class="headImgTle" align="Center">
            <h2 class="brandLogoTitle">Sign Up your account</h2>
        </div>
        <div id="msform">
            <fieldset id="profile">
                <p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                </p>
                <form method="post" action="{{url('/')}}/brands/profiledetail">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="dsplyGrid">
                        <div style="width:320px; margin:0px auto;">
                        <input type="text" class="getInput" style="width:150px; float:left;" value="{{ Input::old('fname') }}" name="fname" id="name" placeholder="First Name" />
                        <input type="text" class="getInput" style="width:150px; float:right;" value="{{ Input::old('lname') }}" name="lname" id="name" placeholder="Last Name" />
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dsplyGrid">
                        <input type="text" class="getInput" value="{{ Input::old('brand_name') }}" name="brand_name" id="brand_name" placeholder="Business/brand name" />
                    </div>
                    <div class="dsplyGrid">
                        <select class="getInput" name="industry" id="industry">
                            <option value="">-- Your industry --</option>
                            @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ Input::old('industry') == $industry->id?"selected":""}}>{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" value="Next" class="next nextBtn1">Continue to Dashboard</button>
                </form>
            </fieldset>
        </div>
    </div>
</section>
<footer class="container-fluid footer pad0">
    <div class="container">
        <!-- < class="footer"> -->
        <div class="row">
            <div class="col-md-3">
                <h4 class="heading-text">Company</h4>
                <ul class="footer-ul">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="heading-text">Support</h4>
                <ul class="footer-ul">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="{{url('/')}}/faq">FAQ</a></li>
                    <li><a href="{{url('/')}}/privacy">Privacy &amp; Terms</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="heading-text">Developers</h4>
                <ul class="footer-ul">
                    <li><a href="#">Adwords API</a></li>
                    <li><a href="#">Adwords Scripts</a></li>
                    <li><a href="#">Adwords Remarketing Tips</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="heading-text">Company</h4>
                <ul class="footer-ul">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col-md-6 small">
                Follow us on
                <ul class="inline-flex">
                    <li>
                        <a href="#" target="_blank"><img src="public/assets/images/icon-facebook.png" alt="facebook"></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><img src="public/assets/images/icon-twitter.png" alt="twitter"></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><img src="public/assets/images/icon-apple.png" alt="apple"></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><img src="public/assets/images/icon-pinterest.png" alt="pinterest"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <p class="text-right footer-text small">Copyright &copy; 2017</p>
            </div>
        </div>
        <!-- </footer> -->
        </section>
    </div>
</footer> 
@endsection