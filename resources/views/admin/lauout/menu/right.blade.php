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
                <span>مطالب</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('place.index')}}">مطالب قبلی</a></li>
                <li><a class="" href="{{route('place.create')}}">ایجاد مطلب جدید</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-cogs"></i>
                <span>دسته ها</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{route('category.index')}}">دسته های قبلی</a></li>
                <li><a class="" href="{{route('category.create')}}">ایجاد دسته جدید</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-tasks"></i>
                <span>سفارشات</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="form_component.html">مشاهده لیست</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-th"></i>
                <span>اطلاعات کاربران</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="basic_table.html">لیست کاربران</a></li>
                <li><a class="" href="dynamic_table.html">ایجاد کاربر جدید</a></li>
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
            <a class="" href="http://127.0.0.1:8000/">
                <i class="icon-user"></i>
                <span>ورود به سایت</span>
            </a>
        </li>
    </ul>
    <!-- sidebar menu end-->
</div>