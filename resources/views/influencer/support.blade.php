@extends('admin')
@section('content')
<section>
    <div class="row">
        {{-- @include('brands.sidebar') --}}
        @include('influencer.sidebar')
        <div class="col-lg-9 admin_margin20 admin padd25">
            <div class="brand_createBorder">
                <h4>Support</h4>
                <div class="compaign-form" style="padding: 10px;">
                    <form>
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