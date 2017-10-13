<div class="leftSideBar adminLeftSideBar" style="width:17%; float:left;">
    <ul>
        <li class= "sildeIcon {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}">
            <a href="{{url('/admin/dashboard')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/brands_side.png">Brands {!! Request::path() == 'admin/dashboard' ? '<i class="right"></i>' : '' !!}</a>
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/influencers' ? 'active' : '' }}">
            <a href="{{url('/admin/influencers')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/influencers_side.png">Influncers {!! Request::path() == 'admin/influencers' ? '<i class="right pull-right" style="margin:12px 0 0 0;"></i>' : '' !!}</a> 
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/googleanalysis' ? 'active' : '' }}">
            <a href="{{url('/admin/googleanalysis')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/google_side.png">Google analysis {!! Request::path() == 'admin/googleanalysis' ? '<i class="right pull-right" style="margin:12px 0 0 0;"></i>' : '' !!}</a> 
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/compaigns' ? 'active' : '' }}">
            <a href="{{url('/admin/compaigns')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/compaign_side.png">Campaigns {!! Request::path() == 'admin/compaigns' ? '<i class="right pull-right" style="margin:12px 0 0 0;"></i>' : '' !!}</a> 
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/newcompaigns' ? 'active' : '' }}">
            <a href="{{url('/admin/newcompaigns')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/new_compaignside.png">New Campaign <span class="badge">{{$total_compaigns}}</span>{!! Request::path() == 'admin/newcompaigns' ? '<i class="right pull-right" style="margin:12px 0 0 0;"></i>' : '' !!}</a> 
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/alerts' ? 'active' : '' }}">
            <a href="{{url('/admin/alerts')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/alrert_side.png">Alert/request <span class="badge">{{$total_alerts}}</span>{!! Request::path() == 'admin/alerts' ? '<i class="right pull-right" style="margin:12px 0 0 0;"></i>' : '' !!}</a> 
        </li>
        <li class="sildeIcon {{ Request::path() == 'admin/logout' ? 'active' : '' }}">
            <a href="{{url('/admin/logout')}}" class="sileHead"><img class="PADDRIT" src="{{url('/')}}/public/assets/images/logout.png">Logout</a> 
        </li>
    </ul>
</div>