<header class="header" id="dh-jabama-header">
    <h1 class="seo-h-content">رزرو هتل</h1>

    <nav class="navbar navbar-fixed-top navbar-inverse" style="z-index:1030">
        <h2 class="seo-h-content">منوی کاربری</h2>
        <div class="row">
            <div class="col-md-10 col-xs-12 col-sm-12 backcolor_Header">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="jbLeftLoginMobile">

                            <span class="unathorized hidden">
                                    <a class="" href="user/login9aa9.html?returnUrl=%2F%3Futm_source%3DPPC%26utm_medium%3DMediaad-Native%26utm_campaign%3DJB97DH2%26utm_medium%3Dcpc%26utm_source%3Dmediaad%26utm_content%3D511-526a7469-bedb-4491-82de-5652ddb4e172%26utm_campaign%3Dnull%26utm_term%3Dsnn.ir"><i class="fa fa-user"></i></a>
                            </span>

                        <span class="">
                            <a class="" href="http://host.jabama.com/"><i class="fa fa-home"></i></a>
                        </span>
                        <span class="dropdown authorized hidden">
                                <a href="user/login7d19.html"><i class="fa fa-user"></i></a>

                            </span>
                    </div>

                    <a href="index.html" class="navbar-brand jdlogoTop">
                        <img src="/site/content/images/logo-en.png" alt="رزرو هتل در جاباما" title="رزرو هتل در مشهد، کیش، شیراز، اصفهان، تهران و تبریز - جاباما"/>
                    </a>
                </div>

                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dh-navbar-item" href="87687678">
                                رزرو هتل ایران
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dh-navbar-item dropdown-toggle" href="7545476587">
                                اقامتگاه و ویلا
                            </a>
                        </li>
                        <li class="select"><a class="dh-navbar-item" href="hotels.html"> رزرو هتل خارجی</a></li>
                        <li class="select"><a class="dh-navbar-item" href="pages/article.html"> مجله جاباما</a></li>
                        <li class="dropdown authorized hidden"><a href="user/login7d19.html#book">رزروهای من</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-left navLeftHeader">
                        @if (Auth::check())
                            <li class="liHeader">
                                <a class="jbLogin buttonLogin buttonHost dh-header-signup-btn"
                                   style="margin-top: 7px; background: #69C0AC; color: #fff !important;width:unset !important;"
                                   href="">{{ Auth::user()->name }} خوش آمدی</a>
                            </li>
                            <li class="liHeader">
                                <a class="jbLogin buttonLogin buttonHost dh-header-signup-btn"
                                   style="margin-top: 7px; background: #69C0AC; color: #fff !important;width:unset !important;"
                                   href="{{ route('profile.index') }}">پروفایل</a>
                            </li>
                        @else
                        <li class="liHeader">
                            <a class="jbLogin buttonLogin buttonHost dh-header-signup-btn"
                               style="margin-top: 7px; background: #69C0AC; color: #fff !important;width:unset !important;"
                               href="{{ route('register') }}">ثبت نام</a>
                        </li>
                            <li class="liHeader">
                                <a class="jbLogin buttonLogin buttonHost dh-header-signup-btn"
                                   style="margin-top: 7px; background: #69C0AC; color: #fff !important;width:unset !important;"
                                   href="{{ route('login') }}">ورود</a>
                            </li>
                        @endif
                        <li id="unathorizedUser" class="liHeader unathorized hidden">
                            <a class="jbLogin buttonLogin dh-header-signup-btn" style="margin-top: 7px;" href="user/login9aa9.html?returnUrl=%2F%3Futm_source%3DPPC%26utm_medium%3DMediaad-Native%26utm_campaign%3DJB97DH2%26utm_medium%3Dcpc%26utm_source%3Dmediaad%26utm_content%3D511-526a7469-bedb-4491-82de-5652ddb4e172%26utm_campaign%3Dnull%26utm_term%3Dsnn.ir">ورود / عضویت</a>
                        </li>


                        <li id="authorizedUser" class="dropdown authorized hidden">
                            <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" >
                                    <span id="userName">
                                    </span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" style="margin-top:3px">
                                <li class="jbAccountBalance rtl">
                                    <div>موجودی حساب شما :</div>
                                    <span id="user-balance" class="currency"></span>&nbsp;<span class="rial"><div class="cssload-loading" id="user-balance-loading" style="direction:ltr"><i></i><i></i><i></i><i></i></div></span>
                                </li>
                                <script>
                                    $('#authorizedUser').click(function () {
                                        $('#user-balance').html('');
                                        $("#user-balance-loading").show();
                                        $.ajax({
                                            url: "/user/getbalance", success: function (result) {
                                                $("#user-balance-loading").hide();
                                                $("#user-balance").html(result.balance + ' (ریال)');
                                            }
                                        });
                                    })
                                </script>


                                <li><a href="user/login7d19.html"><i class="fa fa-user" aria-hidden="true"></i> پروفایل من</a></li>
                                <li><a href="user/login7d19.html#book"><i class="fa fa-list-ul fa-flip-horizontal" aria-hidden="true"></i> رزرو های من</a></li>
                                <li><a href="user/login7d19.html#transaction"><i class="fa fa-file-text-o" aria-hidden="true"></i> تراکنش‌های من</a></li>
                                <li><a href="user/login7d19.html#charge"><i class="fa fa-credit-card" aria-hidden="true"></i> شارژ حساب</a></li>
                                <li><a href="user/login7d19.html#coins"><i class="fa fa-file-text-o" aria-hidden="true"></i>سکه‌های من</a></li>
                                <li><a href="user/login7d19.html#password"> <i class="fa fa-cog" aria-hidden="true"></i> تغییر رمز عبور</a></li>

                            </ul>

                        </li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
            <div class="col-md-2 col-sm-3 col-xs-5 destopPadingL0 info_header">
                <div class="sprite-line-menu"></div>
                <div class="info_header_inner">
                    <div class="jb-tel">
                        <span class="fa fa-phone"></span>
                        <a href="tel:02143900900">021-43900900</a>
                    </div>
                    <div class="jb-Mail">
                        <span class="fa fa-envelope-o"></span>
                        <a href="mailto:&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#064;&#106;&#097;&#098;&#097;&#109;&#097;&#046;&#105;&#114;">
                            &#115;&#117;&#112;&#112;&#111;&#114;&#116;&#064;&#106;&#097;&#098;&#097;&#109;&#097;&#046;&#105;&#114;
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </nav>

</header>
