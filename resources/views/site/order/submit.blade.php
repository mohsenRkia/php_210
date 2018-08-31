@extends('site.layout.more')

@section('title')
    مشاهده اطلاعات برای رزرو {{$place->title}}
@endsection

@section('single')

    <body>
    <link href="/site/bundles/mystyle.css" rel="stylesheet" />
    <script src="/site/content/index-scripts.js"></script>

    <link href="/content/order.css" rel="stylesheet">
    <link href="/content/flipclock.css" rel="stylesheet">
    <main class="main">
        <div class="container">
            <div class="row jsOrderRow">
                <div class="jsTitleReserve">مراحل رزرو</div>
                ﻿
                <ul class="jbUlStep">
                    <li class="stepTop1 ">
                        <i class="fa fa-hospital-o"></i> <span class="mobileNone"> اطلاعات سفارش</span>
                    </li>
                    <li class="stepTop3 active">
                        <i class="fa fa-credit-card"></i> <span class="mobileNone"> پیش فاکتور و ثبت اولیه</span>
                    </li>
                    <li class="stepTop4">
                        <i class="fa fa-file-text-o"></i> <span class="mobileNone"> ثبت نهایی </span>
                    </li>
                </ul>
                <div class="jbDivBoxOrder step3 col-md-12 ">
                    <div class="jbTopDetHotelOrder">
                        <div class="col-md-3 col-sx-12 col-sg-12">
                            <div class="jbImgResult">
                                <img src="/upload/{{$place->photo}}" width="100%">
                            </div>
                        </div>
                        <div class="col-md-8 col-sx-12 col-sg-12">
                            <ul class="jbUlNameResult">
                                <li>
                                    <h2>
                                        <a class="jbANameJaResult" href="#">{{$place->title}}</a>
                                    </h2>
                                </li>
                                <li>
                                    <span class=" starName s0 marginT5"></span>
                                </li>
                            </ul>
                            <div class="JbOrderLocationDet">
                                {{$cat->name}}
                            </div>
                            <hr class="jbHr">
                            <div class="CancellationPolicyMessage">
                                <span class="fa fa-bell-o"></span>
                                <div>رزرو این اقامتگاه قابلیت کنسلی دارد و جریمه کنسلی بر اساس قوانین اعلام شده از طرف اقامتگاه محاسبه می‌گردد. </div>
                            </div>
                            <hr class="jbHr">
                            <div class="jbCheckInOut">
                                <ul>
                                    <li><i class="fa fa-toggle-up"></i> تاریخ ورود : <span class="checkins">{{Session::get('checkin')}}</span></li>
                                    <li><i class="fa fa-toggle-down"></i> تاریخ خروج : <span class="checkoutt">{{Session::get('checkout')}}</span></li>
                                    <li><i class="fa fa-calendar"></i> {{Session::get('rentdays')}} شب</li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="jbListOrderPrice">
                        <h4 class="jbTitle">
                            <span>مشخصات سفارش</span>
                        </h4>
                        <div id="no-more-tables">
                            <table class="jbTableOrder">
                                <thead class="cf">
                                <tr>
                                    <th>ظرفیت اقامتگاه</th>
                                    <th>تعداد میهمانان</th>
                                    <th>سرپرست میهمانان</th>
                                    <th>شماره موبایل</th>
                                    <th>کد ملی / پاسپورت</th>
                                    <th>قیمت کل (ریال)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-title="ظرفیت اتاق">
                                        {{$place->capacity}} نفر
                                    </td>
                                    <td data-title="مشخصات اتاق">
                                        {{Session::get('persons')}}
                                    </td>
                                    <td data-title="سرپرست اتاق">
                                        {{Session::get('name')}}                                    <span>&nbsp;</span>
                                        {{Session::get('family')}}                            </td>
                                    <td data-title="شماره موبایل">{{Session::get('mobile')}}</td>
                                    <td data-title="کد ملی / پاسپورت">
                                        <span>{{Session::get('nationalcode')}}</span>
                                    </td>

                                    <td data-title="قیمت کل (ریال)">
                                        <span class="currency bold">{{Session::get('totalprice')}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="dh-price-details-wrapper">
                            <div class="row" style="border: 1px solid #4cb4cd; border-radius: 3px; padding: 10px 20px 20px;">
                                <div class="col-md-12 dh-price-details">ملاحظات : <span>{{Session::get('decription')}}</span></div>

                            </div>
                            <div id="jbPriceChangeAlert" style="display: none;">
                                قیمت نهایی فاکتور مطابق هماهنگی‌های انجام شده به روز شده است
                                &nbsp; <i class="fa fa-arrow-up"></i>
                            </div>

                        </div>
                    </div>
                    <div class="stepBank">
                        <div class="row">

                            <div class="col-md-2 col-xs-6" style="float: left !important">
                                <form action="{{route('order.finall')}}" method="POST" id="toEmail">
                                    {{csrf_field()}}
                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('checkin')}}" name="checkin">
                                    <input class="gtdatehidden" type="hidden" value="{{Session::get('checkout')}}" name="checkout">
                                    <input class="rentdays" type="hidden" value="{{Session::get('rentdays')}}" name="rentdays">
                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('persons')}}" name="persons">
                                    <input class="gtdatehidden" type="hidden" value="{{$place->id}}" name="place_id">
                                    <input class="rentdays" type="hidden" value="{{ Auth::user()->id}}" name="user_id">
                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('totalprice')}}" name="totalprice">

                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('name')}}" name="name">
                                    <input class="gtdatehidden" type="hidden" value="{{Session::get('family')}}" name="family">
                                    <input class="rentdays" type="hidden" value="{{Session::get('mobile')}}" name="mobile">
                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('nationalcode')}}" name="nationalcode">
                                    <input class="gfdatehidden" type="hidden" value="{{Session::get('decription')}}" name="decription">


                                    <div onclick="showMsgRole()">
                                        <button type="submit" class="btn btn-success btn-block">ثبت نهایی سفارش</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-xs-6" style="float: left !important">
                                <a class="btn btn-info btn-block mobileMarginB10" href="#" onclick="goBack()">برگشت</a>                            </div>
                            <div class="col-md-8 mobileNone" style="float: left !important"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <style>
                    .jbDivTotalPoint {
                        text-align: left;
                        direction: rtl;
                        background-color: #Fff;
                        border-left: 1px solid #E6E6E6;
                        border-right: 1px solid #E6E6E6;
                        font-size: 15px;
                    }
                </style>        </div>
        </div>
    </main>

    <script src="/scripts/jquery.signalR-2.2.1.min.js"></script>
    <script src="/signalr/hubs"></script>


    <div class="divMask LeadMask">
        <div class="LeadBackground">
            <div class="close-subscriber"></div>

        </div>
    </div>

    <script src="/scripts/flipclock.min.js"></script>






    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "url": "https://www.jabama.com/"

        }
    </script>


    <script type="text/javascript" id="">window.__lc=window.__lc||{};window.__lc.license=9309070;(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"==document.location.protocol?"https://":"http://")+"cdn.livechatinc.com/tracking.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})();</script>
    <script src="https://secure.livechatinc.com/licence/9309070/v2/get_dynamic_config.js?t=1533798115741&amp;referrer=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fguests%2Fvilla%2Framsar-baghvila%3FcheckIn%3D13970519%26checkOut%3D13970520%26coins%3D%26rc9386-11405%3D1&amp;url=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fpreorder%2F192184&amp;params=&amp;jsonp=__lc_data_944231"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/get_static_config.0.321.10.10.1373.462.470.76.24.6.11.6.15.js?&amp;jsonp=__lc_data_static_config"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/localization.en.0.043117e7a56a2e3ea008a802da2a0076_56dcba5fc6c6f2145f18866ccc904518.js?jsonp=__lc_lang"></script><div id="livechat-compact-container" style="position: fixed; bottom: 0px; right: 15px; width: 330px; height: 105px; overflow: hidden; visibility: visible; z-index: 2147483639; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; opacity: 1; transform: translateY(0%);"><iframe src="about:blank" id="livechat-compact-view" style="position: relative;top: 20px;left: 0;width: 100%;border: 0;padding: 0;margin: 0;float: none;background: none" scrolling="no" allowtransparency="true" title="LiveChat Minimized Widget" frameborder="0"></iframe><a id="livechat-badge" href="#" onclick="LC_API.show_full_view({source:'minimized click'});return false" style="position: absolute;display: block;visibility: hidden;height: 16px;padding: 0 4px;line-height: 16px;background: #f00;color: #fff;font-size: 10px;text-decoration: none;font-family: 'Lucida Grande', 'Lucida Sans Unicode', Arial, Verdana, sans-serif;border-radius: 3px;box-shadow: 0 -1px 0px #f00, -1px 0 0px #f00, 1px 0 0px #f00, 0 1px 0px #f00, 0 0 2px #000;border-top: 1px solid #f99;width: 16px;border-radius: 50%;box-shadow: none;border-top: 0;padding: 0;text-align: center;font-family: 'Lato', sans-serif;top: 23px;right: 8px"></a></div><div id="livechat-full" style="position: fixed; bottom: 0px; right: 15px; width: 400px; height: 450px; overflow: hidden; visibility: hidden; z-index: -1; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; transform: translateY(100%); opacity: 0;"><iframe src="https://secure.livechatinc.com/licence/9309070/v2/open_chat.cgi?groups=0&amp;embedded=1&amp;newWebserv=undefined&amp;__lc_vv=2&amp;session_id=S1533468975.a5e8fa6e82&amp;server=secure.livechatinc.com#https://www.jabama.com/book/preorder/192184" id="livechat-full-view" name="livechat-full-view" title="LiveChat Widget" scrolling="no" allowtransparency="true" style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%; border: 0px none; padding: 0px; margin: 0px; float: none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;" frameborder="0"></iframe></div><div id="lc_invite_layer" style="text-align: left; display: none; z-index: 16777261;"></div><div id="lc_overlay_layer" style="background-color: rgb(0, 0, 0); position: fixed; left: 0px; top: 0px; z-index: 16777260; display: none; width: 100%; height: 100%;"></div><script id="livechat-ping" src="https://secure.livechatinc.com/licence/9309070/v2/ping?t=1533798149338&amp;data=%7B%22visitor%22%3A%7B%22id%22%3A%22S1533468975.a5e8fa6e82%22%7D%7D&amp;jsonp=__lc_ping_362030"></script></body>

@endsection