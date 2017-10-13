@extends('app')
@section('content')  
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="{{url('/')}}/public/assets/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="{{url('/')}}/public/assets/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
                <ul class="headerAlign">
                    <li><a href="{{url('/')}}/influencers" class="influencers-border influencers-button text-bold">Influencers</a></li>
                    <li><a href="{{url('/')}}/pricing" class="brands-border brands-button text-bold">Pricing</a></li>
                    <li><a href="{{url('/')}}/brands/benefits" class="brands-border brands-button text-bold">Benefits</a></li>
                    <li><a href="{{url('/')}}/whisttler/" class="highlighted-button">Blog</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<section class="container-fulid pad0 banner-back1 about_banner">
    <div class="container height100vh">
        <label>Enter email</label>
        <input type="email" id="signup_email_address" required /></br>
        <input type="button" id="enter_email" value="Submit" disabled="" />
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