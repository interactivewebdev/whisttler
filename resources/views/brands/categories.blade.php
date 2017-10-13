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
            <fieldset id="categories">
                <div class="loginMsg">
                <label class="selectCateTittle"> Select categories of influencers you would want to work with.</label>
            </div>
            <form method="post" action="{{url('/')}}/brands/categories">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="brand_user_id" value="{{ $brand_user_id }}">
            <input type="hidden" name="brand_id" value="{{ $brand_id }}">
            <div class="displyFlex">
                @foreach($categories as $key => $category)
                <div class="brandsCateg">
                    <img class="images" src="{{url('/')}}/public/{{$category->image}}">
                    <input type="checkbox" name="categories[]" value="{{$category->id}}">
                    <h5>{{$category->category_name}}</h5>
                </div>

                <?php if (($key + 1) % 9 == 0) { ?>
                </div>
                <div class="displyFlex">
                <?php } ?>
                @endforeach
            </div>
            <button type="submit" value="Next" class="nextBtn1 displyInital">Take me to my dashboard</button>
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