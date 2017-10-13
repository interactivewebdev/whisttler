<div class="col-lg-2 leftSideBar leftSideBarHeight pad0 text-center">
    <ul>
        <li class= "sildeIcon">
            <a href="#" class="sileHead">
                <img class="" src="{{url('/')}}/public/assets/images/brand_create1.png">
                <br><span style="text-transform: uppercase;">{{$brand_name or ''}}</span><br> <span>{{$brand_id or ''}}</span>
            </a>
        </li>
        <li class="marginTop40"></li>
        <li class=" sildeIcon {{ Request::path() == 'brands/dashboard' ? 'active' : '' }}"><a href="{{url('/')}}/brands/dashboard" class="sileHead padd20 {{ Request::path() == 'brands/dashboard' ? 'active' : '' }}">Dashboard</i></a> </li>
        <li class=" sildeIcon {{ Request::path() == 'brands/profile' ? 'active' : '' }}"><a href="{{url('/')}}/brands/profile" class="sileHead padd20 {{ Request::path() == 'brands/profile' ? 'active' : '' }}">Profile</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'brands/compaigns' ? 'active' : '' }}"><a href="{{url('/')}}/brands/compaigns" class="sileHead padd20 {{ Request::path() == 'brands/compaigns' ? 'active' : '' }}">Compaigns</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'brands/category' ? 'active' : '' }}"><a href="{{url('/')}}/brands/category" class="sileHead padd20 {{ Request::path() == 'brands/category' ? 'active' : '' }}">Categories</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'brands/support' ? 'active' : '' }}"><a href="{{url('/')}}/brands/support" class="sileHead padd20 {{ Request::path() == 'brands/support' ? 'active' : '' }}">Support</a> </li>
        <li class=" sildeIcon {{ Request::path() == 'brands/faq' ? 'active' : '' }}"><a href="{{url('/')}}/brands/faq" class="sileHead padd20 {{ Request::path() == 'brands/faq' ? 'active' : '' }}">FAQ</a> </li>
        <li class=" sildeIcon"><a href="{{url('/')}}/logout" class="sileHead padd20">Logout</a> </li>
        <li class=" sildeIcon">&nbsp;</li>
        <li class=" sildeIcon"><a href="{{url('/')}}/whisttler" target="_blank" class="sileHead padd20">Blog</a> </li>
    </ul>
</div>