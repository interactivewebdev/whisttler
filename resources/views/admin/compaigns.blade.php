@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="admin" style="width:82%; float:right;">
            <div class="subAdminTable dsplyShow">
                <div class="borderSection">
                    <h3 class="pageHead">CAMPAIGNS <a href="{{url('/admin/newcompaigns')}}"><img class="IMGPADD" src="{{url('/')}}/public/assets/images/add-icon.png"></a></h3>
                </div>
                <div style="margin:0 20px 100px;">
                    <table style="width:100%;">
                        <tr class="backClr txtcolor" style="height:30px;">
                            <th style="width:30px;">ID</th>
                            <th>PURPOSE</th>
                            <th>CATEGORY</th>
                            <th>LOCATION</th>
                            <th>DATE</th>
                            <th>DURATION</th>
                            <th>BUDGET</th>
                            <th style="text-align:center;">ACTION</th>
                        </tr>
                        @foreach($compaigns as $key=>$compaign)
                        <tr style="width:30px;">
                            <th scope="row">{{++$key}}</th>
                            <td>{{$compaign->purpose}}</td>
                            <td>{{$compaign->category_name}}</td>
                            <td>{{$compaign->state_name}}</td>
                            <td>{{Carbon\Carbon::parse($compaign->start_date)->format('d-m-Y')}}</td>
                            <td>{{$compaign->duration}}</td>
                            <td>{{$compaign->budget}}</td>
                            <td class="text-center"><a href="{{url('/admin/updatecompaign')}}/{{$compaign->id}}" style="border:none;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection