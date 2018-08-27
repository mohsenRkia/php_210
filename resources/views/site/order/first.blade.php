@extends('site.layout.more')

@section('title','ثبت رزرو')

@section('single')
    <body>
    <link href="/site/bundles/mystyle.css" rel="stylesheet" />
    <script src="/site/content/index-scripts.js"></script>
    <link href="/site/bundles/jquery.Bootstrap-PersianDateTimePicker.css" rel="stylesheet">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4FG9PB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <main class="main">
        <div class="container">
            <div class="row jsOrderRow">
                <div class="jsTitleReserve">مراحل رزرو</div>
                <ul class="jbUlStep">
                    <li class="stepTop1 active">
                        <i class="fa fa-hospital-o"></i> <span class="mobileNone"> اطلاعات سفارش</span>
                    </li>
                    <li class="stepTop3">
                        <i class="fa fa-credit-card"></i> <span class="mobileNone"> پیش فاکتور و ثبت اولیه</span>
                    </li>
                    <li class="stepTop4">
                        <i class="fa fa-file-text-o"></i> <span class="mobileNone"> ثبت نهایی </span>
                    </li>
                </ul>
                <div class="jbDivBoxOrder step1">
                    <form method="POST" action="{{route('order.submit',['id' => $place->id])}}">
                        {{ csrf_field() }}
                        <input class="gfdatehidden" type="hidden" value="" name="checkin">
                        <input class="gtdatehidden" type="hidden" value="" name="checkout">
                        <input class="rentdays" type="hidden" value="" name="rentdays">

                        <div class="jbTopDetHotelOrder">
                        <div class="col-md-3 col-sx-12 col-sg-12">
                            <div class="jbImgResult">
                                <img src="/upload/{{$place->photo}}" width="100%">
                            </div>
                        </div>
                        <div class="col-md-9 col-sx-12 col-sg-12">
                            <ul class="jbUlNameResult">
                                <li>
                                    <h2>
                                        <a class="jbANameJaResult" href="">{{$place->title}}</a>
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

<!-- pickdate -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                    <div class="form-group col-lg-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon" data-mdformat="yyyy/MM/dd" data-mddatetimepicker="true" data-trigger="click" id="fromDate1" data-groupid="group1">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </div>
                                                        <input name="persianf" type="text" class="form-control" id="fromDate1" placeholder="تاریخ ورود (نمونه 1397/6/1)" />
                                                    </div>
                                                </div>
                                                    <div class="form-group col-lg-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon" id="toDate1">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </div>
                                                        <input name="persiant" type="text" class="form-control" id="toDate1" placeholder="تاریخ خروج (نمونه 1397/6/10)" />
                                                    </div>
                                                </div>
                                                        <div class="jbCheckInOut">
                                                            <ul>
                                                                <li><i class="fa fa-toggle-up"></i> تاریخ ورود : <span class="showyearSF"></span></li>
                                                                <li><i class="fa fa-toggle-down"></i> تاریخ خروج : <span class="showyearST"></span></li>
                                                                <li><i class="fa fa-calendar"></i> میزان اقامت : <span class="rentDays"></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                <hr>
                                <div class="col-lg-12">
                                    <div class="form-group col-lg-10">
                                        <label for="guests" class="col-lg-2">
                                            تعداد مهمان :
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="text" name="persons" class="form-control getguest" placeholder="تعداد مهمان ها (حداکثر {{$place->capacity}} نفر)" />
                                        </div>

                                    </div>
                                </div>

<!-- end pick date -->
                            </div>
                            <hr class="jbHr">
                        </div>

                        <div class="clearfix"></div>
                    </div>

                        <div class="jbListOrderPrice col-md-12">
                            <div class="jbAddMosafer">
                                <h4 class="jbTitle"><span>اطلاعات سفارش دهنده</span></h4>
                                <fieldset class="jbFieldsetAddMosafer">
                                    <div class="form-inline boxGest9386-114051">
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="name" id="GuestName9386-114051" placeholder="نام" class="form-control passengerName">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="family" id="GuestLastName9386-114051" required="" placeholder="نام خانوادگی" class="form-control passengerLastName">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="mobile" id="" placeholder="موبایل (09121234567)" class="form-control passengerMobile">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input id="nationalcode" name="nationalcode" placeholder="کد ملی" class="form-control idnumber9386-114051">
                                        </div>
                                        <br>
                                        <hr>
                                    </div>
                                </fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="jbTitle"><span>ملاحظات</span></h4>
                                        <div class="jbAddMosafer">
                                            <textarea name="decription" placeholder="ملاحظات مسافر" class="form-control" style="min-height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <h4 class="jbTitle">
                            <span>اطلاعات اقامتگاه</span>
                        </h4>
                        <div id="no-more-tables">
                            <table class="jbTableOrder">
                                <thead class="cf">
                                <tr>
                                    <th>ظرفیت اقامتگاه</th>
                                    <th>تعداد میهمانان</th>
                                    <th>قیمت برای یک شب (ریال)</th>
                                    <th>قیمت کل (ریال)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td data-dh-rid="11405-0">
                                        {{$place->capacity}} نفر
                                    </td>
                                    <td data-title="مشخصات اتاق">
                                        <span id="showguest"></span> نفر
                                    </td>
                                    <td data-title="قیمت برای یک شب(ریال)">
                                        <span data-dh-per-night-price="" id="pricenight">{{$place->price}}</span>
                                    </td>
                                    <td data-title="قیمت کل (ریال)">
                                        <span id="totalprice"></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="jbDivTotalPrice clearfix">
                            <div class="pull-left">
                                قابل پرداخت : <span><span class="currency" data-dh-sum-detail-price="" id="payprice"></span> ریال</span>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="row paddingB20" style="margin-left: 5px">

                        <div class="col-md-8 mobileNone"></div>
                        <div class="col-md-2 col-xs-6 col-sm-6">

                            <a class="btn btn-info btn-block mobileMarginB10" href="#" onclick="goBack()">برگشت</a>
                        </div>
                        <div class="col-md-2  col-xs-6 col-sm-6">

                            <button type="submit" data-toggle="modal" class="btn btn-success btn-block">ثبت اولیه</button>
                        </div>
                    </div>
                    <br>
                    <div class="jbRules col-md-12">
                        <div class="col-md-4 col-xs-12">
                            <h4 class="jbTitle">
                                <span>قوانین ورود و خروج</span>
                            </h4>
                            <div class="col-md-4 col-xs-4">
                                <img alt="قوانین ورود و خروج" src="/content/images/chek-in.png">
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <p>
                                    مسافرین گرامی ‌می‌توانند بعد از ساعت <span>14</span> اتاق خود را تحویل گیرند و قبل از ساعت <span>12</span> اقامتگاه خود را تحویل دهند.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <h4 class="jbTitle">
                                <span>قوانین خردسال</span>
                            </h4>
                            <div class="col-md-4 col-xs-4">
                                <img alt="قوانین خردسال" src="/content/images/children.png">
                            </div>
                            <div class="col-md-8 col-xs-8">

                                <p>اقامتگاه قانونی برای اقامت کودک اعلام نکرده است </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <h4 class="jbTitle">
                                <span>قوانین کنسل کردن</span>
                            </h4>
                            <div class="col-md-4 col-xs-4">
                                <img alt="قوانین کنسل کردن" src="/content/images/reserve-cancel.png">
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <p></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <style>
        @media (max-width: 768px) {
            #livechat-compact-container {
                display: none;
            }
        }
    </style>




    <div class="divMask LeadMask">
        <div class="LeadBackground">
            <div class="close-subscriber"></div>

        </div>
    </div>


    <script type="text/javascript" id="">window.__lc=window.__lc||{};window.__lc.license=9309070;(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"==document.location.protocol?"https://":"http://")+"cdn.livechatinc.com/tracking.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})();</script>
    <script src="https://secure.livechatinc.com/licence/9309070/v2/get_dynamic_config.js?t=1533743462797&amp;referrer=https%3A%2F%2Fwww.jabama.com%2Fvilla%2Framsar-baghvila%3Fkeyword%3Dramsar-baghvila&amp;url=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fview%2Fvilla%2Framsar-baghvila%3FcheckIn%3D13970518%26checkOut%3D13970519%26coins%3D%26rc9386-11405%3D1&amp;params=&amp;jsonp=__lc_data_848549"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/get_static_config.0.320.10.10.1373.462.470.76.24.6.11.6.15.js?&amp;jsonp=__lc_data_static_config"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/localization.en.0.043117e7a56a2e3ea008a802da2a0076_56dcba5fc6c6f2145f18866ccc904518.js?jsonp=__lc_lang"></script><div id="livechat-compact-container" style="position: fixed; bottom: 0px; right: 15px; width: 330px; height: 105px; overflow: hidden; visibility: visible; z-index: 2147483639; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; opacity: 1; transform: translateY(0%);"><iframe src="about:blank" id="livechat-compact-view" style="position: relative;top: 20px;left: 0;width: 100%;border: 0;padding: 0;margin: 0;float: none;background: none" scrolling="no" allowtransparency="true" title="LiveChat Minimized Widget" frameborder="0"></iframe><a id="livechat-badge" href="#" onclick="LC_API.show_full_view({source:'minimized click'});return false" style="position: absolute;display: block;visibility: hidden;height: 16px;padding: 0 4px;line-height: 16px;background: #f00;color: #fff;font-size: 10px;text-decoration: none;font-family: 'Lucida Grande', 'Lucida Sans Unicode', Arial, Verdana, sans-serif;border-radius: 3px;box-shadow: 0 -1px 0px #f00, -1px 0 0px #f00, 1px 0 0px #f00, 0 1px 0px #f00, 0 0 2px #000;border-top: 1px solid #f99;width: 16px;border-radius: 50%;box-shadow: none;border-top: 0;padding: 0;text-align: center;font-family: 'Lato', sans-serif;top: 23px;right: 8px"></a></div><div id="livechat-full" style="position: fixed; bottom: 0px; right: 15px; width: 400px; height: 450px; overflow: hidden; visibility: hidden; z-index: -1; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; transform: translateY(100%); opacity: 0;"><iframe src="https://secure.livechatinc.com/licence/9309070/v2/open_chat.cgi?groups=0&amp;embedded=1&amp;newWebserv=undefined&amp;__lc_vv=2&amp;session_id=S1533468975.a5e8fa6e82&amp;server=secure.livechatinc.com#https://www.jabama.com/book/view/villa/ramsar-baghvila?checkIn=13970518&amp;checkOut=13970519&amp;coins=&amp;rc9386-11405=1" id="livechat-full-view" name="livechat-full-view" title="LiveChat Widget" scrolling="no" allowtransparency="true" style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%; border: 0px none; padding: 0px; margin: 0px; float: none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;" frameborder="0"></iframe></div><div id="lc_invite_layer" style="text-align: left; display: none; z-index: 16777261;"></div><div id="lc_overlay_layer" style="background-color: rgb(0, 0, 0); position: fixed; left: 0px; top: 0px; z-index: 16777260; display: none; width: 100%; height: 100%;"></div><script id="livechat-ping" src="https://secure.livechatinc.com/licence/9309070/v2/ping?t=1533743648331&amp;data=%7B%22visitor%22%3A%7B%22id%22%3A%22S1533468975.a5e8fa6e82%22%7D%7D&amp;jsonp=__lc_ping_739578"></script></body>
    <script src="/site/bundles/order.js"></script>

@endsection