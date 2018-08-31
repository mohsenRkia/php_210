@extends('site.layout.more')

@section('title')
ثبت رزرو {{$place->title}}
@endsection
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
                                {{$place->categories->name}}
                            </div>

                            <hr class="jbHr">
                            <div class="CancellationPolicyMessage">

<!-- pickdate -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                    <div class="form-group col-lg-6">
                                                        <!-- start list -->
                                                            <label for="birth">تاریخ ورود</label>
                                                        <select name="day_from" class="day">
                                                                <option value="1" label="1">1</option>
                                                                <option value="2" label="2">2</option>
                                                                <option value="3" label="3">3</option>
                                                                <option value="4" label="4">4</option>
                                                                <option value="5" label="5">5</option>
                                                                <option value="6" label="6">6</option>
                                                                <option value="7" label="7">7</option>
                                                                <option value="8" label="8">8</option>
                                                                <option value="9" label="9">9</option>
                                                                <option value="10" label="10">10</option>
                                                                <option value="11" label="11">11</option>
                                                                <option value="12" label="12">12</option>
                                                                <option value="13" label="13">13</option>
                                                                <option value="14" label="14">14</option>
                                                                <option value="15" label="15">15</option>
                                                                <option value="16" label="16">16</option>
                                                                <option value="17" label="17">17</option>
                                                                <option value="18" label="18">18</option>
                                                                <option value="19" label="19">19</option>
                                                                <option value="20" label="20">20</option>
                                                                <option value="21" label="21">21</option>
                                                                <option value="22" label="22">22</option>
                                                                <option value="23" label="23">23</option>
                                                                <option value="24" label="24">24</option>
                                                                <option value="25" label="25">25</option>
                                                                <option value="26" label="26">26</option>
                                                                <option value="27" label="27">27</option>
                                                                <option value="28" label="28">28</option>
                                                                <option value="29" label="29">29</option>
                                                                <option value="30" label="30">30</option>
                                                                <option value="31" label="31">31</option>
                                                            </select>
                                                        <select name="month_from" class="month">
                                                            <option value="1" label="فروردین">فروردین</option>
                                                            <option value="2" label="اردیبهشت">اردیبهشت</option>
                                                            <option value="3" label="خرداد">خرداد</option>
                                                            <option value="4" label="تیر">تیر</option>
                                                            <option value="5" label="مرداد">مرداد</option>
                                                            <option value="6" label="شهریور">شهریور</option>
                                                            <option value="7" label="مهر">مهر</option>
                                                            <option value="8" label="آبان">آبان</option>
                                                            <option value="9" label="آذر">آذر</option>
                                                            <option value="10" label="دی">دی</option>
                                                            <option value="11" label="بهمن">بهمن</option>
                                                            <option value="12" label="اسفند">اسفند</option>
                                                        </select>
                                                        <select name="year_from" class="year">
                                                            <option value="1397">1397</option>
                                                            <option value="1398">1398</option>
                                                        </select>
                                                        <!-- end list -->
                                                    </div>
                                                        <div class="form-group col-lg-6">
                                                                <!-- start list -->
                                                            <label for="birth">تاریخ خروج</label>
                                                            <select name="day_to" class="day">
                                                                <option value="1" label="1">1</option>
                                                                <option value="2" label="2">2</option>
                                                                <option value="3" label="3">3</option>
                                                                <option value="4" label="4">4</option>
                                                                <option value="5" label="5">5</option>
                                                                <option value="6" label="6">6</option>
                                                                <option value="7" label="7">7</option>
                                                                <option value="8" label="8">8</option>
                                                                <option value="9" label="9">9</option>
                                                                <option value="10" label="10">10</option>
                                                                <option value="11" label="11">11</option>
                                                                <option value="12" label="12">12</option>
                                                                <option value="13" label="13">13</option>
                                                                <option value="14" label="14">14</option>
                                                                <option value="15" label="15">15</option>
                                                                <option value="16" label="16">16</option>
                                                                <option value="17" label="17">17</option>
                                                                <option value="18" label="18">18</option>
                                                                <option value="19" label="19">19</option>
                                                                <option value="20" label="20">20</option>
                                                                <option value="21" label="21">21</option>
                                                                <option value="22" label="22">22</option>
                                                                <option value="23" label="23">23</option>
                                                                <option value="24" label="24">24</option>
                                                                <option value="25" label="25">25</option>
                                                                <option value="26" label="26">26</option>
                                                                <option value="27" label="27">27</option>
                                                                <option value="28" label="28">28</option>
                                                                <option value="29" label="29">29</option>
                                                                <option value="30" label="30">30</option>
                                                                <option value="31" label="31">31</option>
                                                            </select>
                                                            <select name="month_to" class="month">
                                                                <option value="1" label="فروردین">فروردین</option>
                                                                <option value="2" label="اردیبهشت">اردیبهشت</option>
                                                                <option value="3" label="خرداد">خرداد</option>
                                                                <option value="4" label="تیر">تیر</option>
                                                                <option value="5" label="مرداد">مرداد</option>
                                                                <option value="6" label="شهریور">شهریور</option>
                                                                <option value="7" label="مهر">مهر</option>
                                                                <option value="8" label="آبان">آبان</option>
                                                                <option value="9" label="آذر">آذر</option>
                                                                <option value="10" label="دی">دی</option>
                                                                <option value="11" label="بهمن">بهمن</option>
                                                                <option value="12" label="اسفند">اسفند</option>
                                                            </select>
                                                            <select name="year_to" class="year">
                                                                <option value="1397">1397</option>
                                                                <option value="1398">1398</option>
                                                            </select>
                                                                <!-- end list -->
                                                        </div>
                                                    </div>
                                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="guests" class="col-lg-2">
                                            تعداد مهمان :
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" name="persons" class="form-control" placeholder="تعداد مهمان ها (حداکثر {{$place->capacity}} نفر)" />
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
                                            <input name="name" placeholder="نام" class="form-control">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="family" required="" placeholder="نام خانوادگی" class="form-control">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="mobile" placeholder="موبایل (09121234567)" class="form-control">
                                        </div>
                                        <div class="form-group col-sg-20 col-sm-12 paddingB10">
                                            <input name="nationalcode" placeholder="کد ملی" class="form-control">
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