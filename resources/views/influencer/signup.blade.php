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
        <form id="msform" action="{{url('/influencers/postsignup')}}" method="post">
            {{ csrf_field() }}
            <div class="headImgTle" align="Center">
                <img class="logoImg" src="{{asset('public/assets/images/new_logo.png')}}">
                <h2 class="logoTitle">Sign Up your account</h2>
            </div>
            <div>

            <fieldset style="height: 780px;">
                <div class="loginMsg">
                    <label> Tell us about yourself</label>
                </div>
                <div class="dsplyGrid">
                    <label class="influfirstTle">First Name:</label>
                    <input type="text" class="getInput" name="fname" placeholder="First name" value="{!! $user->fname !!}" />
                </div>
                <div class="dsplyGrid">
                    <label class="influfirstTle">Last Name:</label>
                    <input type="text" class="getInput" name="lname" placeholder="Last name" value="{!! $user->lname !!}" />
                </div>
                <div class="dsplyGrid">
                    <label class="influsecndTle">Email Id which you frequently use:</label>
                    <input type="text" class="getInput" name="email" placeholder="Email ID"  value="{!! $user->email !!}" />
                </div>
                <div class="dsplyGrid">
                    <label class="influthirdTle">Where do you live?:</label>
                    <select name="location" class="getInput">
                        <option value=""></option>
                        @foreach($locations as $location)
                        <option value="{{$location->id}}" {{($user->location == $location->id)?"selected":""}}>{{$location->state_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="dsplyGrid">
                    <label class="influfivthTle" for="full name">When were you born?:</label>
                    <input type="date" class="getInput" name="birth_date" placeholder="Your Date of Birth" date-format="dd-mm-yyyy" />
                </div>
                <button type="submit" class="next influContinueBtn">Continue to Email Verification</button>
            </fieldset>
        </form>
    </div>
</section>
@endsection
@push('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('public/assets/js/slider.js')}}"></script>

@endpush
