
<label>Email</label>
<input type="email" id="signup_email_address" required value='{{$user->email}}' disabled=""/></br>
<label>Enter Password</label>
<input type="password" id="signup_password" required  /></br>
<input type="hidden" id="hidden_id" value="{{$user->id}}"  /></br>

<input type="button" id="save_password" value="Submit" />

<span id=""></span>
   <script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/backend.js')}}"></script>