@extends('admin')
@section('content')
    <section>
        <div class="row">
            @include('brands.sidebar')
            <div class="col-lg-9 admin_margin20 admin padd25">
                <div class="brand_createBorder">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="compaign-form">
                        <div class="borderBtm" style="height:70px;">
                            <div class="row" style="margin-top:30px;">
                                <div class="col-sm-1"><img src="{{url('/')}}/public/assets/images/brand_profile.png"></div>
                                <div class="col-sm-11">
                                    <div class="row">
                                        <div class="col-sm-4"><b>Name:</b> </div>
                                        <div class="col-sm-8 text-uppercase"><b>{{$user_data['fname'].' '.$user_data['lname']}}</b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><b>ID:</b> </div>
                                        <div class="col-sm-8 text-uppercase"><b>{{$user_data['id']}}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>USER NAME</label><span>:</span>
                                        </div>
                                        <div class="col-sm-8">{{$user_data['user_name'] or ''}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>CONTACT NO</label><span>:</span>
                                        </div>
                                        <div class="col-sm-8">{{$user_data['phone'] or ''}}</div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>INDUSTRY</label><span>:</span>
                                        </div>
                                        <div class="col-sm-8">{{$industrytype->name or ''}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>LOCATION</label><span>:</span>
                                        </div>
                                        <div class="col-sm-8">{{$location->state_name or ''}}</div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>EMAIL</label><span>:</span>
                                        </div>
                                        <div class="col-sm-8">{{$user_data['email'] or ''}}</div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="{{url('/influencers/updateprofile')}}" class="btn btn-primary btn-sm">Update Profile</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="{{url('/influencers/changepassword')}}" class="btn btn-warning btn-sm">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection