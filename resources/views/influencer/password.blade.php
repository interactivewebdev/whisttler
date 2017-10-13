@extends('app')
@section('content') 
<header class="container-fulid pad0 headerSignup">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="{{asset('public/assets/images/logo.png')}}" alt="AIM Zeneith Logo" class="logo_imgSign"></a>
            </div>

        </nav>
    </div>
</header>
<section class="container flex about_banner">
    <div class="wrapper_log">
        <form id="msform" action="{{url('/influencers/password')}}" method="post">
            {{ csrf_field() }}
            <div class="headImgTle" align="Center">
                <img class="logoImg" src="{{asset('public/assets/images/new_logo.png')}}">
                <h2 class="logoTitle">Sign Up your account</h2>
            </div>
            <div>

            <fieldset style="height: 780px;">
                <div class="loginMsg">
                    <label> Give your password</label>
                </div>
                <div class="dsplyGrid">
                    <label class="influfirstTle">Password:</label>
                    <input type="password" class="getInput" name="password" placeholder="Password" value="" />
                </div>
                <div class="dsplyGrid">
                    <label class="influfirstTle">Confirm Password:</label>
                    <input type="password" class="getInput" name="confirm_password" placeholder="Confirm Password" value="" />
                </div>
                <button type="submit" class="next influContinueBtn">Continue to Category</button>
            </fieldset>
        </form>
    </div>
</section>
@endsection
@push('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('public/assets/js/slider.js')}}"></script>

@endpush
