@extends('admin')
@section('content')  
<section>
    <div class="row">
        <div class="height50px"></div>
        <div class="clearfix"></div>
        <div class="col-lg-offset-3 col-lg-6">
            <div class="jumbotron pad30">
                <h3>Admin Control Panel</h3>
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
                
                @if(Session::has('message'))
                <p class="alert alert-danger">{{Session::get('message')}}</p>
                @endif
                </p>
                <form method="post" action="admin" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="username" name="username" class="form-control" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary btn-sm">Sign in</button>
                        </div>
                    </div>
                </form>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
@endsection