@extends('admin')
@section('content')  
<section>
    <div class="row">
        @include('admin.sidebar')
        <div class="col-lg-9 admin">
            <div class="subAdminTable dsplyShow">
                <div class="borderSection">
                    <h3 class="pageHead">ALERTS/REQUESTS</h3>
                </div>
                <table class="table table-striped border">
                    <thead>
                        <tr class="backClr txtcolor">
                            <th>TYPE</th>
                            <th>TYPE OF USER</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT</th>
                            <th>POSTED AT</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alerts as $key=>$alert)
                        <tr>
                            <td>{{$alert->alert_type}}</td>
                            <td>Visitor</td>
                            <td>{{$alert->name}}</td>
                            <td>{{$alert->email}}</td>
                            <td>{{$alert->telephone}}</td>
                            <td>{{Carbon\Carbon::parse($alert->posted_at)->format('d-m-Y')}}</td>
                            <td>{{$alert->status?"Resolved":"Active"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>
@endsection