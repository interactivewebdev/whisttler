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
            <form method="post" action="{{url('/influencers/mailauth')}}">
                {{ csrf_field() }}
                <input type="hidden" name="code" value="{{ $code }}">
                <div class="headImgTle" align="Center">
                    <img class="logoImg" src="{{asset('public/assets/images/new_logo.png')}}">
                    <h2 class="logoTitle">Sign Up your account</h2>
                </div>
                <div>

                <fieldset>
                    <div class="loginMsg">
                        <label> We sent you a code on ''{!! $email !!}'', enter the code below.</label>
                    </div>
                    <input  class="getInput" name="code_entered" placeholder="Enter the Your Code"  />
                    <button type="submit" class="next influContinueBtn">Continue to Phone Number</button>
                </fieldset>
            </form>
        </div>
    </section>
@endsection
@push('scripts')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/slider.js')}}"></script>

@endpush
