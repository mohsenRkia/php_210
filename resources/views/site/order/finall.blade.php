@extends('site.layout.more')

@section('title')
    ثبت نهایی
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
                <div class="jsTitleReserve">تاییدیه ثبت سفارش</div>
                ﻿
                <div class="jbDivBoxOrder step3 col-md-12 ">
                    <div class="col-md-12 col-sx-12 col-sg-12 center">
                        <div class="jbOrderNumber">
                            کد رزرو آنلاین شما
                            <span>{{Session::get('ordercode')}}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="stepBank">
                        <div class="alert alert-success">
                            <div class="col-md-12 col-sx-12 col-sg-12 center">
                                سفارش شما تایید نهایی شد و یک ایمیل حاوی اطلاعات خرید برای شما ارسال گردید
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">

                            <div class="col-md-2 col-xs-6" style="float: left !important">

                                <a href="{{route("home.index")}}" class="btn btn-danger btn-block buttonOrder orderPaymentCancelBtn">بازگشت به خانه</a>
                            </div>
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

    <script>


        function hide_overlay_background() {

            $("#overlay-background-fade").removeClass('overlay-background-fade');
        }
        var ChannelManngerAutoCompleteAddress = "https://inh.jabama.ir/v1/AutoComplete";
        var ChannelManngerAddress = "https://inh.jabama.ir/v1";
        $('.submit-mail').click(function () {
            $.ajax({
                url: '/emailsubscription/subscribe',
                type: 'POST',
                data: $('form#email-subscription').serialize(),
                success: function (result) {
                    if (result.IsSuccess) {
                        $(".messageLead").removeClass("none");
                        $(".messageLead").removeClass("failed");
                        $(".messageLead span").removeClass("fa-close");
                        $(".messageLead").addClass("success");
                        $(".messageLead span").addClass("fa-check");
                        $(".messageLead span").text("ایمیل شما با موفقیت ثبت شد .");
                        setTimeout(function () {
                            $('.close-subscriber').click()
                        }, 2000);
                    } else {
                        $(".messageLead").removeClass("none");
                        $(".messageLead").addClass("failed");
                        $(".messageLead span").addClass("fa-close");
                        $(".messageLead span").text(result.Message);
                        $('input[name="emailAddress"]').val("");
                    }
                }
            });
        });



        $(".TourMask").click(function () {
            $('.TourMask').hide();
        });




        $(".divMask").click(function () {
            $('.divMask').hide();
        });
        $(".close-subscriber").click(function () {
            $('.divMask.LeadMask').hide();
        });

        $(".closeError").click(function () {
            $('.jbAllException').hide(500);

        });

        var QueryString = (function (a) {
            if (a === "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i) {
                var p = a[i].split('=', 2);
                if (p.length == 1)
                    b[p[0]] = "";
                else
                    b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(window.location.search.substr(1).split('&'));

        $(document).ready(function () {
            var campaignMarketing = QueryString[encodeURI("رزروهتل")];
            if (typeof campaignMarketing != "undefined") {
                $(".LeadMask").show();
            } else {
                //var visited = $.cookie("visited");
                //if (visited == null) {
                //    $(".TourMask").show();

                //} else {
                //    $(".TourMask").hide();
                //}

                //$.cookie('visited', 'yes', { expires: 14, path: '/' });
            }


        });


        showAllLocalTime();
        function lazyLoadAll() {
            $("a.lazy").lazyload({
                effect: "fadeIn"
            });//
            $("img.lazy").lazyload({
                effect: "fadeIn"
            });
            $("span.lazy").lazyload({
                effect: "fadeIn"
            });
            $("div.lazy").lazyload({
                effect: "fadeIn"
            });
        }
        $(document).ready(function () {



            lazyLoadAll();
            $.ajax({
                url: '/user/get',
                type: 'GET',
                success: function (result) {
                    if (result.balance) {
                        $(".jbAccountBalance .currency").html(result.balance);
                        addDigtGroup();
                    }


                    if (result.userName != "") {
                        $(".authorized").removeClass("hidden");
                        $(".unathorized").addClass("hidden");
                    } else {
                        $(".authorized").addClass("hidden");
                        $(".unathorized").removeClass("hidden");
                    }
                    if (result.fullName != "") {
                        $("#userName").html(result.fullName);
                    }
                    else {
                        $("#userName").html(result.userName);
                    }
                }
            });

            if ($.datepicker) {
                $.datepicker._gotoToday = function (id) {
                    try {
                        $(id).datepicker('setDate', new Date()).datepicker('hide').onClose().blur();
                    } catch (e) {

                    }
                };
            }
        });
        setTimeout(function() {
            $('#chat_window_container').contents().find("head").append($("<style type='text/css'>* {font-family: tahoma !important;direction:rtl;font-size:12px;} </style>"));
        },3000);
    </script>


    <script type="text/javascript" id="">window.__lc=window.__lc||{};window.__lc.license=9309070;(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"==document.location.protocol?"https://":"http://")+"cdn.livechatinc.com/tracking.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})();</script>
    <script src="https://secure.livechatinc.com/licence/9309070/v2/get_dynamic_config.js?t=1533798115741&amp;referrer=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fguests%2Fvilla%2Framsar-baghvila%3FcheckIn%3D13970519%26checkOut%3D13970520%26coins%3D%26rc9386-11405%3D1&amp;url=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fpreorder%2F192184&amp;params=&amp;jsonp=__lc_data_944231"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/get_static_config.0.321.10.10.1373.462.470.76.24.6.11.6.15.js?&amp;jsonp=__lc_data_static_config"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/localization.en.0.043117e7a56a2e3ea008a802da2a0076_56dcba5fc6c6f2145f18866ccc904518.js?jsonp=__lc_lang"></script><div id="livechat-compact-container" style="position: fixed; bottom: 0px; right: 15px; width: 330px; height: 105px; overflow: hidden; visibility: visible; z-index: 2147483639; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; opacity: 1; transform: translateY(0%);"><iframe src="about:blank" id="livechat-compact-view" style="position: relative;top: 20px;left: 0;width: 100%;border: 0;padding: 0;margin: 0;float: none;background: none" scrolling="no" allowtransparency="true" title="LiveChat Minimized Widget" frameborder="0"></iframe><a id="livechat-badge" href="#" onclick="LC_API.show_full_view({source:'minimized click'});return false" style="position: absolute;display: block;visibility: hidden;height: 16px;padding: 0 4px;line-height: 16px;background: #f00;color: #fff;font-size: 10px;text-decoration: none;font-family: 'Lucida Grande', 'Lucida Sans Unicode', Arial, Verdana, sans-serif;border-radius: 3px;box-shadow: 0 -1px 0px #f00, -1px 0 0px #f00, 1px 0 0px #f00, 0 1px 0px #f00, 0 0 2px #000;border-top: 1px solid #f99;width: 16px;border-radius: 50%;box-shadow: none;border-top: 0;padding: 0;text-align: center;font-family: 'Lato', sans-serif;top: 23px;right: 8px"></a></div><div id="livechat-full" style="position: fixed; bottom: 0px; right: 15px; width: 400px; height: 450px; overflow: hidden; visibility: hidden; z-index: -1; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; transform: translateY(100%); opacity: 0;"><iframe src="https://secure.livechatinc.com/licence/9309070/v2/open_chat.cgi?groups=0&amp;embedded=1&amp;newWebserv=undefined&amp;__lc_vv=2&amp;session_id=S1533468975.a5e8fa6e82&amp;server=secure.livechatinc.com#https://www.jabama.com/book/preorder/192184" id="livechat-full-view" name="livechat-full-view" title="LiveChat Widget" scrolling="no" allowtransparency="true" style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%; border: 0px none; padding: 0px; margin: 0px; float: none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;" frameborder="0"></iframe></div><div id="lc_invite_layer" style="text-align: left; display: none; z-index: 16777261;"></div><div id="lc_overlay_layer" style="background-color: rgb(0, 0, 0); position: fixed; left: 0px; top: 0px; z-index: 16777260; display: none; width: 100%; height: 100%;"></div><script id="livechat-ping" src="https://secure.livechatinc.com/licence/9309070/v2/ping?t=1533798149338&amp;data=%7B%22visitor%22%3A%7B%22id%22%3A%22S1533468975.a5e8fa6e82%22%7D%7D&amp;jsonp=__lc_ping_362030"></script></body>

@endsection