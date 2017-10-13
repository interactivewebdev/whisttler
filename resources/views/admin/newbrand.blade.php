@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="admin" style="width:82%; float:right;">
            <div class="subAdminTable dsplyShow" style="margin-right: 20px;">
                <div class="borderSection">
                    <h3 class="pageHead">NEW BRAND</h3>
                </div>

                <div class="row border padd20">
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
                        <form method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="username">Username</label>
                                        <input type="email" class="form-control" name="username" id="username" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" required class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" required class="form-control" name="fname" id="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" required class="form-control" name="lname" id="lname" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" required class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" required class="form-control" name="phone" id="phone" placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="location">Location</label>
                                        <select name="location" required id="location" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($locations as $location)
                                            <option value="{{$location['id']}}">{{$location['state_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <label for="industry">Industry Type</label>
                                        <select name="industry" required id="industry" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($industries as $industry)
                                            <option value="{{$industry['id']}}">{{$industry['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category">Categories</label>
                                        <select name="category[]" multiple size="5" required id="category" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subscription">Subscription Plan</label>
                                        <select name="subscription" required id="subscription" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($subscriptions as $subscription)
                                            <option value="{{$subscription['id']}}">{{$subscription['plan_name'].' - '.$subscription['amount'].' INR'}}</option>
                                            @endforeach
                                        </select>
                                        <label for="period">Subscription Period</label>
                                        <select name="period" required id="period" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="1">1 Month</option>
                                            <option value="3">3 Month</option>
                                            <option value="6">6 Month</option>
                                            <option value="12">12 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection