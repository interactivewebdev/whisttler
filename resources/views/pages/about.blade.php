@extends('app')
@section('content')
<header class="container-fulid pad0 headerBckclr">
    <div class="container">
        <nav class="positionRelative">
            <div class="addContainer">
                <a href="{{url('/')}}"><img src="public/images/logo.png" alt="AIM Zeneith Logo" class="logo_img1"></a>
                <a href="{{url('/')}}"><img src="public/images/chage-logo.png" alt="AIM Zeneith Logo" class="logo_img2"></a>
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
<section class="AboutUs banner-text">
    <div class="container">
        <div class="About-page">

            <div class="about-head">
                <h1>About US</h1>
            </div>
            <div class="about-content">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>
            </div>
        </div>

        <div class="abtMiddleContent">
            <h2>Our Leaders</h2>
        </div>
        <div class="row ">


            <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12  abt-image text-left">
                <img class="abtBrandsImg img-responsive" src="public/assets/images/men1.png"/>
                <p class="abtName">NIRAJAN</p><p class="abtName1">WHISTTLER</p>
            </div>


            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 " style="position: relative; height:204px" >

                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
                </p>
                <p style=" position: absolute;bottom:0; text-align: center;" >Email :avanish@gmail.com</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12 abt-image text-right">
                <img class="abtBrandsImg" src="public/assets/images/men2.png"/>
                <p>NIRAJAN</p> <p>WHISTTLER</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 " style="position: relative; height:204px">

                <p >
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem 
                </p>
                <p style=" position: absolute;bottom: 0; text-align: center;" >Email :avanish@gmail.com</p>

            </div>




            <!--  <div class="col-md-4 abt-image">
               <img class="abtBrandsImg" src="assets/images/men1.png"/>
                <p>NIRAJAN</p> <p>WHISTTLER</p>
             </div> -->
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</section>
@endsection