<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu">
        <li class="active">
            <a class="" href="{{route('admin.index')}}">
                <i class="icon-dashboard"></i>
                <span>صفحه اصلی</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>اقامتگاه ها</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('place.index')}}">لیست اقامتگاه ها</a></li>
                <li><a class="" href="{{route('place.create')}}">ایجاد اقامتگاه جدید</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-cogs"></i>
                <span>شهر ها</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('category.index')}}">لیست شهر ها</a></li>
                <li><a class="" href="{{route('category.create')}}">ایجاد شهر جدید</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-tasks"></i>
                <span>سفارشات من</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('admin.myorders')}}">مشاهده لیست</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-tasks"></i>
                <span>سفارشات مشتری</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('admin.allorders')}}">مشاهده لیست</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-th"></i>
                <span>اطلاعات کاربران</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('users.index')}}">لیست کاربران</a></li>
                <li><a class="" href="{{route('users.create')}}">ایجاد کاربر جدید</a></li>
            </ul>
        </li>
        <li>
            <a class="" href="inbox.html">
                <i class="icon-envelope"></i>
                <span>ایمیل </span>
                <span class="label label-danger pull-right mail-info">2</span>
            </a>
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
