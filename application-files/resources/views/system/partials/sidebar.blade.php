<div class="sidebar-wrapper">
    <div class="logo-wrapper d-flex">
        <a href="{{route('home')}}">
            <img class="img-fluid for-light" src="{{asset('uploads/config/')}}/{{ getCmsConfig('cms logo')}}"
                 alt="">
            <img class="img-fluid for-dark" src="{{asset('uploads/config/')}}/{{ getCmsConfig('cms logo')}}"
                 alt="">
            @if(getCmsConfig('cms title'))
                <h3>{{getCmsConfig('cms title')}}</h3>
            @endif
        </a>
        <div class="back-btn">
            <i class="fa fa-angle-left"></i>
        </div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{route('home')}}">
            <img class="img-fluid" src="{{ asset('images/logo-icon.png') }}" alt="">
        </a>
    </div>
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                    <a href="{{route('home')}}">
                        <img class="img-fluid" src="{{ asset('images/logo-icon.png') }}" alt="">
                    </a>
                    <div class="mobile-back text-end">
                        <span>Back</span>
                        <i class="fa fa-angle-right ps-2" aria-hidden="true"> </i>
                    </div>
                </li>
                @foreach ($modules as $module)
                        @if ($module['hasSubmodules'])
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title"
                                   href="#sidenav{{$loop->index}}">
                                    {!! $module['icon'] ?? '' !!} <span>{{$module['name']}}</span></a>
                                <ul class="sidebar-submenu">
                                    @foreach ($module['submodules'] as $subModule)
                                            <li>
                                                <a href="{{url(getSystemPrefix().$subModule['route'])}}">{{$subModule['name']}}</a>
                                            </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav"
                                   @if($module['name']=='Inbound Dashboard')
                                       style="border-top: 1px solid grey;border-radius: 0"
                                   @elseif($module['name']=='Return Team Dashboard')
                                       style="border-bottom: 1px solid grey;border-radius: 0"

                                   @endif
                                   href="{{url(getSystemPrefix().$module['route'])}}">
                                        {!! $module['icon'] ?? '' !!} <span>{{$module['name']}} </span>
                                </a>
                            </li>
                        @endif
                @endforeach
            </ul>

        </div>
    </nav>
</div>
