<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
        <li class="active">
            <a class="" href="{{route('profile.myorders')}}">
                <i class="icon-dashboard"></i>
                <span>سفارشات</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-th"></i>
                <span>اطلاعات کاربری</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li>
                    <a class="" href="{{route('profile.setting',['id' => Auth::user()->id])}}">تغییر مشخصات</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="" href="{{route('home.index')}}">
                <i class="icon-user"></i>
                <span>ورود به صفحه اصلی</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                {!! '<i class="icon-user"></i>
                <span>خروج از سایت</span>' !!}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <!-- sidebar menu end-->
</div>
