@extends('app')
@section('content')
    <style>
        ul {
            list-style-type: none;
        }

        li {
            display: inline-block;
        }

        input[type="radio"][id^="cb"] {
            display: none;
        }

        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
        }

        label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }

        label img {
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }

        :checked + label {
            border-color: #ddd;
        }

        :checked + label:before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
        }

        :checked + label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
        }
    </style>
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
            <form method="post" action="{{url('/influencers/category')}}">
                {{ csrf_field() }}
                <div class="headImgTle" align="Center">
                    <img class="logoImg" src="{{asset('public/assets/images/new_logo.png')}}">
                    <h2 class="logoTitle">Sign Up your account</h2>
                </div>
                <div>
                    <fieldset>
                        <div class="loginMsg">
                            <label class="selectCateTittle"> Please select the topic about which you post. This will be your Primary Category.</label>
                        </div>


                        <div class="displyFlex">
                            <ul>
                            @foreach($categories as $key => $category)
                                <li><input type="radio" name="category" id="cb{{$key}}" value="{{$category->id}}" style="visibility: hidden" />
                                    <label for="cb{{$key}}"><img src="{{url('/')}}/public/{{$category->image}}" /></label>
                                    <label>{{$category->category_name}}</label>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="clearfix"></div>

                        <button type="submit" class="next influContinueBtn displyInital">Continue to secondary category</button>

                    </fieldset>
            </form>
        </div>
    </section>
@endsection
@push('scripts')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/slider.js')}}"></script>

@endpush
