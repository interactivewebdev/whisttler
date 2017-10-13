@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="admin" style="width:82%; float:right;">
            <div class="subAdminTable dsplyShow">
                <div class="borderSection">
                    <div class="row">
                        <div class="col-sm-4"><h3 class="pageHead">BRANDS</h3></div>
                        <div class="col-sm-8 text-right paddingright"><a style="margin-top:10px;" href="{{url('/')}}/admin/newbrand" class="btn btn-primary btn-sm">ADD NEW BRAND</a></div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        <div class="jumbotron text-center">
                            <h1>{{$total_brands}}</h1>
                            <p>PROFILE CREATED</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="jumbotron text-center">
                            <h1>{{$paid_subscription}}</h1>
                            <p>PAID</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="jumbotron text-center">
                            <h1>0</h1>
                            <p>AMOUNT EARNED</p>
                        </div>
                    </div>
                </div>
                <div class="filter" style="margin-right: 20px;">
                    <table class="table" id="brandsearch">
                        <thead>
                            <tr>
                                <th class="width20"><span class="txtcolor">FILTERS:</span></th>
                                <th style="width:200px;"><div class="">
                                        <select name="plan" class="droplist" style="width:100%;">
                                            <option value="">-- Subscription Plan --</option>
                                            @foreach($subscription_plans as $plan)
                                            <option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                                            @endforeach
                                        </select>
                                    </div></th>
                                <th style="width:200px;"><div class="">
                                        <select name="duration" class="droplist" style="width:100%;">
                                            <option value="">-- Plan Duration --</option>
                                            <option value="1">1 Month</option>
                                            <option value="3">3 Month</option>
                                            <option value="6">6 Month</option>
                                            <option value="12">12 Month</option>
                                        </select>
                                    </div></th>
                                <th style="width:230px;"><div class="">
                                        <select name="status" class="droplist" style="width:100%;">
                                            <option value="">-- Comapaign Run Status --</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
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
                            <th>INDUSTRY</th>
                            <th>CREATED AT</th>
                            <th>SUBSCRIPTION</th>
                            <th>SUBS. DATE</th>
                            <th>AMOUNT</th>                            
                            <th>PERIOD</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach($brands as $key => $brand)
                        <tr style="height:30px;">
                            <th scope="row">{{++$key}}</th>
                            <td><a href="javascript:void(0)">{{$brand->brand_name}}</a></td>
                            <td>{{$brand->industrytype}}</td>
                            <td>{{$brand->date_taken}}</td>
                            <td>{{$brand->plan}}</td>
                            <td>{{$brand->date_taken}}</td>                            
                            <td>{{$brand->price}}</td>
                            <td>{{$brand->period/30}} Month</td>
                            <td>
                                <a href="{{url('/')}}/admin/updatebrand/{{$brand->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                <a href="{{url('/')}}/admin/deletebrand/{{$brand->user_id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                <a href="javascript:void(0)"><i class="fa fa-inr" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</section>
<script>
$('#brandsearch').find('select').on('change', function(){
    console.log(this, this.value);
});
</script>
@endsection