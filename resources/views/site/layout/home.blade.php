<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel='shortcut icon' href="/site/content/images/favicon.ico" type='image/x-icon' />
    <link href="/site/content/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/site/bundles/home-libraries435d.css" rel="stylesheet"/>
    <link href="/site/bundles/home-local6534.css" rel="stylesheet"/>

    <script src="/site/content/index-scripts.js"></script>

    <title>@yield('title')</title>
</head>

<body>
@include('site.layout.menu.top')

<main class="content jbMainPage">
    <div id="jabamaSlider" class="carousel slide">

        <div id="backImageFill" class="carousel-inner">
            <div class="item active">
                <div class="fill"></div>
            </div>
        </div>
    </div>

    <div id="dh-trust-seal-images" class="hidden-md hidden-lg hidden-sm">
        <div class="container">
            <div class="row">
                <div class="hidden-lg hidden-md hidden-sm col-xs-12 dh-trust-seal-images-items">
                    <div class="col-xs-12 dh-trust-seal-images-item">

                    </div>
                    <div class="col-xs-12 dh-trust-seal-images-item">

                    </div>
                </div>
            </div>
        </div>
    </div>






    @yield('content')




    <div class="dh-info-icons">
        <div class="container">
            <div class="row">
                <div class="hidden-lg hidden-md hidden-sm col-xs-1"></div>
                <div class="col-md-12 col-sm-12 col-xs-10 dh-icon-container" dir="rtl">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="lazy home-sprite-hotel-image hidden-xs" alt="جست و جوی هتل ها"></div>
                        <div class="col-sm-12 col-xs-12 icon-text"><i class="fa fa-check-square-o dh-icon-font" aria-hidden="true"></i><span>کاملترین سایت رزرو هتلهای خارجی و داخلی</span></div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="lazy home-sprite-money-image hidden-xs" alt="مقایسه هتل ها"></div>
                        <div class="col-sm-12 col-xs-12 icon-text"><i class="fa fa-check-square-o dh-icon-font" aria-hidden="true"></i><span>تضمین بهترین قیمت با بالاترین تخفیف‌ها</span></div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="lazy home-sprite-certificate-image hidden-xs" alt="اشتراک تجربه اقامت"></div>
                        <div class="col-sm-12 col-xs-12 icon-text"><i class="fa fa-check-square-o dh-icon-font" aria-hidden="true"></i><span>تنها آژانس گردشگری با امکان رزرو آنلاین هتل</span></div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="lazy home-sprite-support-image hidden-xs" alt="دریافت واچر آنلاین"></div>
                        <div class="col-sm-12 col-xs-12 icon-text"><i class="fa fa-check-square-o dh-icon-font" aria-hidden="true"></i><span>پشتیبانی ۲۴ ساعته، حتی در روزهای تعطیل</span></div>
                    </div>
                </div>
                <div class="hidden-lg hidden-md hidden-sm col-xs-1"></div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>




</main>

@include('site.layout.menu.bottom')

<div class='divMask LeadMask'>
    <div class="LeadBackground">
        <div class="close-subscriber"></div>

    </div>
</div>

<script src="/site/bundles/home-common-libraries1381"></script>

<script src="/site/bundles/home-libraries-first-partf0c6"></script>

<script src="/site/bundles/home-libraries-second-part850b"></script>

<script src="/site/bundles/home-libraries-third-part4b02"></script>

<script src="/site/bundles/forlazyload.js"></script>


</body>

</html>