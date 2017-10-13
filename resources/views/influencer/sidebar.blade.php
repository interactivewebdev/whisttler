<div class="col-lg-2 leftSideBar pad0 text-center">
    <ul>
        <li class= "sildeIcon marginTop40">
            <a href="#" class="sileHead">
                @if ( isset($influencer_data) && count( $influencer_data->first() ) && isset( $influencer_data->first()->profile_pic_path ) && $influencer_data->first()->profile_pic_path != '' )
                    <img class="" src= {{ $influencer_data->first()->profile_pic_path }}><br>
                @endif
                <span>{{ Auth::user()->fname }}</span><br>
                <span class="hide">{{ Auth::user()->id }}</span>
            </a>
        </li>
        <li class="marginTop40"></li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/dashboard' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/dashboard" class="sileHead padd20 {{ Request::path() == 'influencers/dashboard' ? 'active' : '' }}">Dashboard</i></a> </li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/profile' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/profile" class="sileHead padd20 {{ Request::path() == 'influencers/profile' ? 'active' : '' }}">Profile</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/compaigns' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/compaigns" class="sileHead padd20 {{ Request::path() == 'influencers/compaigns' ? 'active' : '' }}">Compaigns</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/categories' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/categories" class="sileHead padd20 {{ Request::path() == 'influencers/categories' ? 'active' : '' }}">Categories</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/support' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/support" class="sileHead padd20 {{ Request::path() == 'influencers/support' ? 'active' : '' }}">Support</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'influencers/faq' ? 'active' : '' }}"><a href="{{url('/')}}/influencers/faq" class="sileHead padd20 {{ Request::path() == 'influencers/faq' ? 'active' : '' }}">FAQ</a> </li>
        <li class=" sildeIcon"><a href="{{url('/')}}/logout" class="sileHead padd20">Logout</a> </li>
        <li class=" sildeIcon">&nbsp;</li>
        <li class=" sildeIcon {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}"><a href="{{url('/')}}/whisttler" class="sileHead padd20">Blog</a> </li>
    </ul>
</div>