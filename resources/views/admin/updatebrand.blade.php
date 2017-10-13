@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="admin" style="width:82%; float:right;">
            <div class="subAdminTable dsplyShow" style="margin-right: 20px;">
                <div class="borderSection">
                    <h3 class="pageHead">UPDATE BRAND</h3>
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
                            <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                            <input type="hidden" name="user_id" value="{{ $brand->user_id }}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="username">Username</label>
                                        <input type="email" class="form-control" name="username" id="username" placeholder="Email" value="<?php echo $brand->user_name; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category">Categories</label>
                                        <select name="category[]" multiple size="5" required id="category" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category['id']}}" <?php echo in_array($category['id'], @explode(',', $brand->category_id)) ? "selected" : ""; ?>>{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" required class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $brand->fname; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" required class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php echo $brand->lname; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" required class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" value="<?php echo $brand->brand_name; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" required class="form-control" name="phone" id="phone" placeholder="Contact Number" value="<?php echo $brand->phone; ?>">
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
                                            <option value="{{$location['id']}}" <?php echo ($brand->location == $location['id']) ? "selected" : ""; ?>>{{$location['state_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <label for="industry">Industry Type</label>
                                        <select name="industry" required id="industry" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach($industries as $industry)
                                            <option value="{{$industry['id']}}" <?php echo ($brand->industry_type == $industry['id']) ? "selected" : ""; ?>>{{$industry['name']}}</option>
                                            @endforeach
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