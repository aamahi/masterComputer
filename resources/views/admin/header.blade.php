<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="{{url('/admin')}}" class="logo">Master <span>Computer</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a href="{{route('bkash')}}" @yield('bkash')>
                    <i class="fa fa-tumblr-square"></i> Bkash
                </a>
            </li>
            <li class="dropdown">
                <a href="{{route('bakiKhata')}}"@yield('baki')>
                    <i class="fa fa-edit"></i> Baki Kahta
                </a>
            </li>
            <li class="dropdown font-weight-bold">
                <a href="{{route('joma')}}" @yield('joma')>
                    <i class="fa fa-plus-square-o"></i> Joma
                </a>
            </li>
            <li class="dropdown">
                <a href="{{route('customar')}}"@yield('customer')>
                    <i class="fa fa-user"></i> Customar
                </a>
            </li>
            <li class="dropdown">
                <a href="{{route('report')}}"@yield('report')>
                    <i class="fa fa-file"></i> Report
                </a>
            </li>
            <li class="dropdown">
                <a href="{{route('product')}}"@yield('product')>
                    <i class="fa fa-shopping-cart"></i> Product
                </a>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
{{--                    <img alt="" width="38" src="{{asset('mahi.jpg')}}">--}}
                    <span class="username"> {{Auth::User()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li>
                        <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-key"></i>
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>
</header>
