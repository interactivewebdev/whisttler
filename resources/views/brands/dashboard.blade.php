@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('brands.sidebar')
        <div class="col-lg-9 admin_margin20 admin padd25">
            {{--<div class="brand_createBorder">
                <div class="row">
                    <div class="col-lg-9 brand_createsocial">
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createfb.png">
                            <span>Facebook Page</span>
                        </div>
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createinstagram.png">
                            <span>Instagram Page</span>
                        </div>
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createtwitter.png">
                            <span>Twitter Page</span>
                        </div>
                    </div>
                    <div class="col-lg-3 brand_createsocialconnect">
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createplus.png">
                            <span>Connect with Facebook Page</span>
                        </div><br>
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createplus.png">
                            <span>Connect with Instagram Page</span>
                        </div><br>
                        <div class="padd5">
                            <img src="{{url('/')}}/public/assets/images/brand_createplus.png">
                            <span>Connect with Twitter Page</span>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="brand_createBorder">
                <div class="row">
                    <h3>INFLUENCERS: SOCIAL PLATFORM</h3>
                    <div class="col-lg-6 brand_createsocial">
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                        <span>Instagram</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="blue_btn">{{$social_count['instagram']}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                        <span>Twitter</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="skyblue_btn">{{$social_count['twitter']}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createblog.png">
                                        <span>Blog/Website</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="black_btn">{{$social_count['blog']}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 brand_createsocial">
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createyoutube.png">
                                        <span>Youtube</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="red_btn">{{$social_count['youtube']}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                        <span>Facebook</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="ink_btn">{{$social_count['facebook']}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createblog.png">
                                        <span>SnapChat</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="black_btn">{{$social_count['snapchat']}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="brand_createBorder">
                <div class="row">
                    <h3>INFLUENCERS: CATEGORIES</h3>
                    <div class="col-lg-6 brand_createsocial">
                        @if(isset($category_count[0]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/public/'.$category_count[0]['image'])}}">
                                        <span>{{$category_count[0]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$category_count[0]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(isset($category_count[1]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/public/'.$category_count[1]['image'])}}">
                                        <span>{{$category_count[1]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$category_count[1]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(isset($category_count[2]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/public/'.$category_count[2]['image'])}}">
                                        <span>{{$category_count[2]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$category_count[2]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6 brand_createsocial">
                        @if(isset($category_count[3]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/public/'.$category_count[3]['image'])}}">
                                        <span>{{$category_count[3]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$category_count[3]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($category_count[4]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/public/'.$category_count[4]['image'])}}">
                                        <span>{{$category_count[4]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$category_count[4]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="padd10">
                                        <span>Explore Other Categories</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-2">
                                    <img src="{{url('/')}}/public/assets/images/brand_createrighticon.png">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="brand_createBorder">
                <div class="row">
                    <h3>INFLUENCERS: LOCATIONS</h3>
                    <div class="col-lg-6 brand_createsocial">
                        @if(isset($location_count[0]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createlocation.png">
                                        <span>{{$location_count[0]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$location_count[0]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($location_count[1]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createlocation.png">
                                        <span>{{$location_count[1]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$location_count[1]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6 brand_createsocial">
                        @if(isset($location_count[2]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createlocation.png">
                                        <span>{{$location_count[2]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$location_count[2]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($location_count[3]))
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createlocation.png">
                                        <span>{{$location_count[3]['name']}}</span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <button class="grey_btn">{{$location_count[3]['count']}}</button>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>


            <div class="brand_createBorder">
                <div class="row">
                    <h3>TOP INFLUENCERS</h3>
                    <div class="col-lg-6 brand_createsocial">
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9 span_padd">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createsmall.png">

                                        <span class="span_position">Name</span>
                                        <span class="span_position1">
                                            <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                        </span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <h5>Social Scope<span><img src="{{url('/')}}/public/assets/images/brand_createrighticonsmall.png"></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9 span_padd">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createsmall.png">

                                        <span class="span_position">Name</span>
                                        <span class="span_position1">
                                            <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                        </span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <h5>Social Scope<span><img src="{{url('/')}}/public/assets/images/brand_createrighticonsmall.png"></span></h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 brand_createsocial">
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9 span_padd">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createsmall.png">

                                        <span class="span_position">Name</span>
                                        <span class="span_position1">
                                            <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                        </span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <h5>Social Scope<span><img src="{{url('/')}}/public/assets/images/brand_createrighticonsmall.png"></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-lg-9 span_padd">
                                    <div class="padd10">
                                        <img src="{{url('/')}}/public/assets/images/brand_createsmall.png">

                                        <span class="span_position">Name</span>
                                        <span class="span_position1">
                                            <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                            <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                        </span>
                                    </div>
                                </div>
                                <div class="padd5 col-lg-3">
                                    <h5>Social Scope<span><img src="{{url('/')}}/public/assets/images/brand_createrighticonsmall.png"></span></h5>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!--<div class="marginBtm">
                <div class="brand_head">
                    <h4>LIST OF INFLUNCERS</h4>
                </div>
                <div class="brand_createBorder marginTop">
                    <div class="row">
                        <div class="col-lg-9 brand_createsocial">
                            <div class="padd5">
                                <img src="{{url('/')}}/public/assets/images/brand_createinstagram.png">
                                <span>INSTAGRAM</span>
                            </div>
                            <div class="inline-flex selectBox">
                                <div class="PADD_10">
                                    <select class="dropDwonList" name="cars">
                                        <option value="volvo">Categeories </option>
                                        <option value="saab"></option>
                                        <option value="fiat"></option>
                                        <option value="audi"></option>
                                    </select>
                                </div>
                                <div class="">
                                    <select class="dropDwonList" name="cars">
                                        <option value="volvo">Locations</option>
                                        <option value="saab"></option>
                                        <option value="fiat"></option>
                                        <option value="audi"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="brand_createBorder">
                <div class="row">
                    <div class="col-lg-9 brand_createsocial">
                        <div class="col-lg-9 span_padd">
                            <div class="padd10">
                                <img src="{{url('/')}}/public/assets/images/brand_createsmall.png">

                                <span class="span_position">Name</span>
                                <span class="span_position1">
                                    <img src="{{url('/')}}/public/assets/images/brand_createfbsmall.png">
                                    <img src="{{url('/')}}/public/assets/images/brand_createtwittersmall.png">
                                    <img src="{{url('/')}}/public/assets/images/brand_createinstagramsmall.png">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 brand_createsocialconnect">
                        <div class="totalFollow">
                            <span>Total Followers : 30</span>
                            <img class="PAADLFT" src="{{url('/')}}/public/assets/images/downarrow.png">
                        </div><br>
                        <div class="totalFollow">
                            <span>Total Followers : 30</span>
                            <img class="PAADLFT" src="{{url('/')}}/public/assets/images/downarrow.png">
                        </div><br>
                        <div class="totalFollow">
                            <span>Total Followers : 30</span>
                            <img class="PAADLFT" src="{{url('/')}}/public/assets/images/downarrow.png">
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="submitBtns">
                <button class="submitBrief">SUBMIT A CAMPAIGN BRIEF</button>
                <button class="submitBrief">GET CAMPAIGN ASSISTANCE</button>
            </div>
        </div>
</section>
@endsection