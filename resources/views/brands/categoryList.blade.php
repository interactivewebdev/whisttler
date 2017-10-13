@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('brands.sidebar')
        <div class="col-lg-9 admin_margin20 admin padd25">
            <div class="brand_createBorder">
                <h4>CATEGORIES</h4>
                <div class="compaign-form">
                    <div class="brandProfile-para" style="padding: 10px;">
                        <h4>Categories of influencers with whom you work with most frequently.</h4>
                    </div>
                    <div class="row brandProfile-categry1"> 
                        @foreach($categories as $key => $listCategory)
                        <div class="col-sm-6 PADDLFT">
                            <div class="brandsProfileImg">
                                <img src="{{url('/')}}/public/{{$listCategory->image}}">
                                <div class="brandCategoryAlign"> 
                                    <span>{{$listCategory->category_name}}</span>
                                </div>

                            </div>
                        </div>
                        <?php if($key+1 % 2 == 0){?>
                        </div>
                        <div class="row brandProfile-categry1">
                        <?php }?>
                        @endforeach
                    </div>                    
                    <div class="submitBtns">
                        <button class="submitBrief">ADD A CATEGORY</button>
                        <button class="submitBrief btn-danger">REMOVE A CATEGORY</button>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection