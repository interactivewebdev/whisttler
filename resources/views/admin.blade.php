
@if(session()->has('userid'))
    @include('admin.admin-header')
@else 
    @include('admin.admin-header0')
@endif


@yield('content')


@include('admin.admin-footer')