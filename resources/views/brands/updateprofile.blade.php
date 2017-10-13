@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('brands.sidebar')
        <div class="col-lg-9 admin_margin20 admin padd25">
            <div class="brand_createBorder">
                Update Your Profile
                <div class="compaign-form" style="padding: 10px;">
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
                    <form method="post" action="{{url('/')}}/brands/updateprofile">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="first_name" value="<?php echo $first_name; ?>" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" placeholder="Phone number">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Location</label>
                                    <select class="form-control" name="location" id="location">
                                        <option value="">-- Your location --</option>
                                        @foreach($locations as $loc)
                                        <option value="{{ $loc->id }}" <?php echo ($location == $loc->id) ? "Selected" : ""; ?>>{{ $loc->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection