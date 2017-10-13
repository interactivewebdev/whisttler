<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<link href="{{asset('public/assets/css/select2.min.css')}}" rel='stylesheet' type='text/css'>

@push('css')
<link href="{{asset('public/assets/css/select2.min.css')}}" rel='stylesheet' type='text/css'>
@endpush
<h1>Enter Details</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"><label>Enter Name</label></div>
        <div class="col-lg-4"><input class="form-control" type="text" id="user_name" required /></div>
        </div>
    <div class="row">
        <div class="col-lg-3"><label>Enter Brand Name</label></div>
        <div class="col-lg-4"><input class="form-control" type="text" id="brand_name" required  /></div>
    </div>
    <div class="row">
         <div class="form-group">
         <div class="col-lg-3"><label>Select Industry</label></div>


     <div class="col-lg-4"><select class="select-industry-type form-control" id="industry_type">
        @foreach ($industry_type as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach  
         </select>
     </div>
         </div>
         </div>
    <input type="hidden" id="hidden_id" value="{{$user->id}}"  />

    <div class="row"><input class="btn" type="button" id="save_details" value="Submit" /></div>
</div>

<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/backend.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/select2.full.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$(".select-industry-type").select2();
});
</script>
@push('scripts')
<script type="text/javascript" src="{{asset('public/assets/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
$(".js-example-basic-single").select2();
});
</script>
@endpush