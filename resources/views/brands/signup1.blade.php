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
<div class="back_blue">
    <div class="container">
        <h2>Brand Signup</h2>
    </div>
</div>

<section class="faq_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Fill all the fields of forms</h1>

                <div class="row">
                    <div class="col-lg-12">
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
                        <form method="post" action="{{url('/')}}/brands/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" value="{{isset($email)?$email:Input::old('email')}}" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value="{{ Input::old('username') }}" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" name="brand_name" value="{{ Input::old('brand_name') }}" class="form-control" id="brand_name" placeholder="Brand Name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" value="{{ Input::old('phone') }}" class="form-control" id="phone" placeholder="Contact number">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select class="form-control" name="location" id="location">
                                    <option value="">-- Choose Location --</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{ Input::old('location') == $location->id?"selected":""}}>{{$location->state_name}}</option>
                                    @endforeach
                                </select>
                            </div>                                                           
                            <div class="form-group">
                                <label for="industry_type">Industry Type</label>
                                <select class="form-control" name="industry_type" id="industry_type">
                                    <option value="">-- Choose Industry --</option>
                                    @foreach($industries as $industry)
                                    <option value="{{$industry->id}}" {{ Input::old('industry_type') == $industry->id?"selected":""}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">-- Choose Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ Input::old('category') == $category->id?"selected":""}}>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">SignUp</button>
                        </form>
                    </div>
                </div>
            </div>
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