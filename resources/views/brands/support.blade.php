@extends('admin')
@section('content')
<section>
    <div class="row">
        @include('brands.sidebar')
        <div class="col-lg-9 admin_margin20 admin padd25">
            <div class="brand_createBorder">
                <h4>Support</h4>
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
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form method="post" action="{{url('/')}}/brands/support">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" rows="10" class="form-control" id="message" placeholder="Give your text here"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection