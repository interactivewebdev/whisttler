@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="admin" style="width:82%; float:right;">
            <div class="subAdminTable dsplyShow">
                <div class="borderSection">
                    <div class="row">
                        <div class="col-sm-4"><h3 class="pageHead">INFLUENCERS</h3></div>
                        <div class="col-sm-8 text-right paddingright"><a style="margin-top:10px;" href="javascript:void(0)" class="btn btn-primary btn-sm">ADD NEW INFLUENCER</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        <div class="jumbotron text-center">
                            <h1>{{$total_influencers}}</h1>
                            <p>PROFILE CREATED</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="jumbotron text-center">
                            <h1>{{$total_influencers}}</h1>
                            <p>INVOLVED IN COMPAIGN</p>
                        </div>
                    </div>
                </div>
                <div class="filter" style="margin-right: 20px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="width20"><span class="txtcolor">FILTERS:</span></th>
                                <th style="width:180px;"><div class="">
                                        <select class="droplist" style="width:100%;">
                                            <option value="">-- Social Media --</option>
                                            @foreach($socialtypes as $social)
                                            <option value="{{$social->id}}">{{$social->social_name}}</option>
                                            @endforeach
                                        </select>
                                    </div></th>
                                <th style="width:180px;"><div class="">
                                        <select class="droplist" style="width:100%;">
                                            <option value="">-- Category --</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div></th>
                                <th style="width:200px;"><div class="">
                                        <select class="droplist" style="width:100%;">
                                            <option value="">-- Location --</option>
                                            @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->state_name}}</option>
                                            @endforeach
                                        </select>
                                    </div></th>
                                <th style="width:70px;"><div class="">
                                        <select class="droplist" style="width:100%;">
                                            <option value="">-- Comapaign Run Status --</option>
                                            <option value="">-- Yes --</option>
                                            <option value="">-- No --</option>
                                        </select>
                                    </div></th>
                        </thead>
                    </table>
                </div>
                <div style="margin:0 20px 100px;">
                    <table style="width:100%;">
                        <tr class="backClr txtcolor" style="height:30px;">
                            <th style="width:30px;">ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>LOCATION</th>
                            <th>SOCIAL TYPE</th>
                            <th>CATEGORY</th>
                            <th>SOCIAL CONNECTION</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach($influencers as $key => $influencer)
                        <tr style="width:30px;">
                            <th scope="row">{{++$key}}</th>
                            <td><a href="javascript:void(0)">{{$influencer->fname.' '.$influencer->lname}}</a></td>
                            <td>{{$influencer->email}}</td>
                            <td>{{$influencer->phone}}</td>
                            <td>{{$influencer->location}}</td>
                            <td>{{$influencer->social_name}}</td>
                            <td>{{$influencer->category_name}}</td>
                            <td></td>
                            <td><a href="javascript:void(0)">Edit</a> | <a href="javascript:void(0)">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection