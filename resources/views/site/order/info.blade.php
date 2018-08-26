@extends('site.layout.more')
@section('title')
    اطلاعات مسافر
@endsection


@section('single')
    <body>
    <link href="/site/bundles/mystyle.css" rel="stylesheet" />
    <script src="/site/content/index-scripts.js"></script>


    <main class="main">
        <div class="container">
            <div class="row jsOrderRow">
                <div class="jsTitleReserve">مراحل رزرو</div>


                <ul class="jbUlStep">
                    <li class="stepTop1"><i class="fa fa-hospital-o"></i> <span class="mobileNone"> اطلاعات سفارش</span></li>
                    <li class="stepTop2 active"><i class="fa fa-check-square-o"></i> <span class="mobileNone"> اطلاعات مسافر</span></li>
                    <li class="stepTop3"><i class="fa fa-credit-card"></i> <span class="mobileNone"> پیش فاکتور و پرداخت</span></li>
                    <li class="stepTop4"><i class="fa fa-file-text-o"></i> <span class="mobileNone"> دریافت واچر </span></li>
                </ul>

                <div class="jbDivBoxOrder step2 col-md-12 marginB15">
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
                                        <a class="jbANameJaResult" href="#">{{$place->title}}</a>
                                    </h2>
                                </li>
                                <li><span class="starName s0 marginT5"></span></li>
                            </ul>
                            <div class="JbOrderLocationDet">
                                {{$cat->name}}
                            </div>
                            <hr class="jbHr">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <form action="{{route('order.submit',['id' => $place->id])}}" method="POST" id="guestInfoForm">
                        <input type="hidden" value="{{Session::get('checkin')}}" name="checkin">
                        <input type="hidden" value="{{Session::get('checkout')}}" name="checkout">
                        <input type="hidden" value="{{Session::get('rentdays')}}" name="rentdays">
                        <input type="hidden" value="{{Session::get('persons')}}" name="persons">

                        {{csrf_field()}}

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

                        </div>

                        <div class="row">
                            <div class="col-md-8 mobileNone"></div>
                            <div class="col-md-2 col-xs-6 col-sm-6">
                                <a class="btn btn-info btn-block" href="#" onclick="goBack()">برگشت</a>
                            </div>
                            <div class="col-md-2 col-xs-6 col-sm-6">

                                <button class="btn btn-success btn-block" type="submit">
                                    ثبت اولیه
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>

                <script>
                    $("#btn_validateCopoun").click(function ()
                    {
                        var _couponCode = $('#coupon').val();
                        var discountAmount;
                        var targetPrice;
                        var token = $('#guestInfoForm input[name="__RequestVerificationToken"]').val();
                        $.ajax({
                            url: '/book/checkcouponvalidation',
                            data: {
                                couponCode: _couponCode,
                                checkIn: '13970519',
                                checkOut: '13970520',
                                __RequestVerificationToken: token,
                                currentReserveType: 'DomesticHotel',
                                cityName: 'کتالم و سادات شهر',
                                placeCategory: 'Villa',
                                placeName: 'سه خوابه منتظمی',
                                totalPrice: '3000000.00'
                            },
                            type: 'POST',
                            datatype: "application/json",
                            success: function (respond) {
                                discountAmount = (3000000.00 * respond.DiscountValue) / 100;
                                if (discountAmount > respond.MaxValue)
                                    discountAmount = respond.MaxValue;
                                targetPrice = 3000000.00 - discountAmount;
                                $('.invalidCoupon').removeClass('hidden');
                                if (respond.Result == true) {
                                    $('.invalidCoupon').html( "<h5 class='right'>کوپن قابل استفاده است</h5><br/><ul><li>مبلغ کل: <span class='currency'>"+3000000.00+"</span></li><li>مبلغ تخفیف: <span class='currency'>"+discountAmount+"</span></li><li>مبلغ قابل پرداخت"+"<span class='currency'>" + targetPrice + "</span></li></ul>");
                                    $('.invalidCoupon').removeClass('alert-danger');
                                    $('.invalidCoupon').addClass('alert-discount-success');
                                    addDigtGroup();
                                }
                                else {
                                    //if(ErrorCode == 1)
                                    //    $("#ConfirmMobileModal").modal("show");
                                    //else
                                    $('.invalidCoupon').html(respond.ErrorMessage);
                                }
                            }});
                    });

                    $("#frmBtn").click(function ()
                    {
                        var guestInfoForm = $('#guestInfoForm');
                        if (!guestInfoForm[0].checkValidity()) {
                            return guestInfoForm[0].reportValidity();
                        }

                        var _couponCode = $('#coupon').val();
                        if (_couponCode != undefined && _couponCode != "")
                        {
                            $.ajax({
                                url: '/book/iscouponvalid',
                                data: {
                                    couponCode: _couponCode,
                                    checkIn: '13970519',
                                    checkOut: '13970520',
                                    cityName: 'کتالم و سادات شهر',
                                    placeName: 'سه خوابه منتظمی',
                                    totalPrice: '3000000.00'
                                },
                                type: 'GET',
                                contentType: "json",
                                success: function (result) {
                                    if (result == "True")
                                        $('#guestInfoForm').submit();
                                    else {
                                        $('.invalidCoupon').removeClass('hidden');
                                        $('.invalidCoupon').removeClass('alert-success');
                                        $('.invalidCoupon').addClass('alert-danger');
                                        $('.invalidCoupon').text("کوپن قابل استفاده نیست");
                                    }
                                },
                                error: function (e) {
                                    alert(e);
                                }
                            });
                        }
                        else
                        {
                            $('#guestInfoForm').submit();
                        }
                    });

                    function loadGuestInfo(guestRowIndex)
                    {
                        $.ajax({
                            url: '/book/getallguestinfohistory',
                            data: { GuestRowIndex: guestRowIndex, IsTour: false },
                            type: 'GET',
                            contentType: "json",
                            success: function (result) {
                                $("#guestHistoryModal").html(result);
                                $('#guestHistoryModal').modal('show');
                            }
                        });
                    }
                </script>


                <script type="text/javascript">
                    //<![CDATA[

                    if (!window.mvcClientValidationMetadata) { window.mvcClientValidationMetadata = []; }
                    window.mvcClientValidationMetadata.push(
                        {
                            "Fields": [
                                {
                                    "FieldName": "NationalCode",
                                    "ReplaceValidationMessageContents": true,
                                    "ValidationMessageId": "NationalCode_validationMessage",
                                    "ValidationRules": [
                                        {
                                            "ErrorMessage": "کد ملی نامعتبر است!",
                                            "ValidationParameters": {},
                                            "ValidationType": "NationalCodeValidator"
                                        }]
                                },
                                {
                                    "FieldName": "Mobile",
                                    "ReplaceValidationMessageContents": true,
                                    "ValidationMessageId": "Mobile_validationMessage",
                                    "ValidationRules":
                                        [{
                                            "ErrorMessage": "شماره موبایل نامعتبر است",
                                            "ValidationParameters": {},
                                            "ValidationType": "IranianMobileValidator"
                                        }]
                                }

                            ],
                            "FormId": "form0",
                            "ReplaceValidationSummary": false,
                            "ValidationSummaryId": "validationSummary"
                        });
                    //]]>
                </script>
            </div>
        </div>
    </main>
    <div class="modal fade" id="guestHistoryModal" tabindex="-1" role="dialog" aria-labelledby="guestHistoryModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="guestHistoryModalLabel">مسافران سابق</h4>
                </div>
                <div id="modal-body">

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var datePickerTo = $('.datepickerBirthDay').datepicker({
                rangeSelect: true,
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0',
                dateFormat: "yy/mm/dd",
                showOn: "both",
                buttonImage: '/content/images/calender.png',
                buttonImageOnly: true,
                minDate: "",
                locale: 'en',
            });

            $('.nationality').change(function () {
                var firstName = "نام", lastName = "نام خانوادگی", phoneNumber = "موبایل (09121234567)", birthDate = "تاریخ تولد", idNumber = "کد ملی";
                var selector = 'input[name$=';
                var englishFirstNameAndLastNameSelector = selector + 'EnglishName],' + selector + 'EnglishLastName]';
                var container = $(this).parents('.guestContainer:eq(0)');
                var paddingB10Div = $('.paddingB10', container);
                var isPersian = $(this).val() !== '0';
                if (!isPersian) {
                    firstName = "Name"; lastName = "Last Name"; phoneNumber = "Cell Phone"; idNumber = "Passport Number"; birthDate = "Date of birth";
                    $(englishFirstNameAndLastNameSelector, container).removeAttr("required").closest('div').hide();
                    $(selector + 'Nationality]', container).closest('div').attr("required", "required").show();
                    $(selector + 'idNumber]', container).removeAttr("required");
                    paddingB10Div.addClass('floatLeft');
                } else {
                    $(englishFirstNameAndLastNameSelector, container).attr("required", "required").closest('div').show();
                    $(selector + 'Nationality]', container).removeAttr("required").closest('div').hide();
                    paddingB10Div.removeClass('floatLeft');
                }
                $(selector + "'PersianName']", container).attr({ "placeholder": firstName });
                $(selector + "'PersianLastName']", container).attr({ "placeholder": lastName });
                $(selector + "'PhoneNumber']", container).attr({ "placeholder": phoneNumber });
                $(selector + "'Birthday']", container).attr({ "placeholder": birthDate });
                $(selector + "'IdNumber']", container).attr({ "placeholder": idNumber });
                $(".validationDate", container).addClass("none");
                setCalendar(isPersian, container);
            });
        });
        function jbradioIdType(id) {

            var ids = id;
            var meli = $("#guestIdMeli" + id);
            var pas = $("#guestIdPas" + id);
            var radio = $("input[name='IsIranian" + ids + "']:checked").val();
            if (radio == "0") {
                meli.removeAttr("name");
                meli.prop("type", "hidden");
                pas.prop("value", meli.val());
                pas.prop("name", "GuestIdNumber" + id);
                pas.removeAttr("type");
                $(".boxGest" + ids).addClass("ltrPassanger");

                $("input[name='GuestName" + ids + "']").attr({ "placeholder": "Name" });
                $("input[name='GuestLastName" + ids + "']").attr({ "placeholder": "Last Name" });
                $("input[name='GuestNational" + ids + "']").attr({ "placeholder": "Nationality" });
                $("input[name='PhoneNumber" + ids + "']").attr({ "placeholder": "Cell Phone" });
                $("input[name='Birthday" + ids + "']").attr({ "placeholder": "Date of birth" });
                $(".divGuestNational" + ids).show();
                $("input[name='GuestNational" + ids + "']").attr({ "required": "required" });
                $("input[name='GuestNational" + ids + "']").attr({ "value": $("input[name='GuestNational" + ids + "']").val() });
                $("input[name='GuestNational" + ids + "']").attr({ "value": "" });
                setCalendar();
            }
            else {
                pas.removeAttr("name");
                pas.prop("type", "hidden");
                meli.prop("name", "GuestIdNumber" + id);
                meli.removeAttr("type");
                $(".boxGest" + ids).removeClass("ltrPassanger");

                $(".divGuestNational" + ids).hide();
                $("input[name='GuestName" + ids + "']").attr({ "placeholder": "نام" });
                $("input[name='GuestLastName" + ids + "']").attr({ "placeholder": "نام خانوادگی" });
                $("input[name='GuestNational" + ids + "']").attr({ "placeholder": "ملیت (ایرانی)" });
                $("input[name='PhoneNumber" + ids + "']").attr({ "placeholder": "موبایل (09121234567)" });
                $("input[name='GuestNational" + ids + "']").attr({ "value": "ایرانی" });
                $("input[name='Birthday" + ids + "']").attr({ "placeholder": "تاریخ تولد" });
                $("input[name='GuestNational" + ids + "']").removeAttr("required");
                setCalendar(true);

            }

        }

        function setCalendar(persian, container) {
            var calendarInstance = container ? $('.datepickerBirthDay', container) : $('.datepickerBirthDay');
            if (persian) {
                $.datepicker.regional['fa'] = {
                    calendar: JalaliDate,
                    closeText: "بستن",
                    prevText: "قبل",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-100:+0',
                    nextText: "بعد",
                    currentText: "امروز",
                    monthNames: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                    monthNamesShort: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                    dayNames: ["یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
                    dayNamesShort: ["یک", "دو", "سه", "چهار", "پنج", "جمعه", "شنبه"],
                    dayNamesMin: ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                    weekHeader: "ه",
                    dateFormat: "yy/mm/dd",
                    firstDay: 6,
                    isRTL: true,
                    showMonthAfterYear: false,
                    yearSuffix: "",
                    calculateWeek: function (e) {
                        var t = new JalaliDate(e.getFullYear(), e.getMonth(), e.getDate() + (e.getDay() || 7) - 3);
                        return Math.floor(Math.round((t.getTime() - (new JalaliDate(t.getFullYear(), 0, 1)).getTime()) / 864e5) / 7) + 1
                    }
                };
                $(".datepicker", container).datepicker();
            } else {
                $.datepicker.regional['en'] = {
                    calendar: Date,
                    closeText: "Done",
                    prevText: "prev",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-100:+0',
                    nextText: "next",
                    currentText: "today",
                    monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                    weekHeader: "ه",
                    dateFormat: "dd/mm/yy",
                    firstDay: 6,
                    showMonthAfterYear: false,
                    yearSuffix: "",
                    calculateWeek: function (e) { var t = new JalaliDate(e.getFullYear(), e.getMonth(), e.getDate() + (e.getDay() || 7) - 3); return Math.floor(Math.round((t.getTime() - (new JalaliDate(t.getFullYear(), 0, 1)).getTime()) / 864e5) / 7) + 1 }
                };
                $(".datepicker", container).datepicker();
            }
            var language = persian ? 'fa' : 'en';
            var options = $.extend({}, $.datepicker.regional[language], {
                rangeSelect: true,
                showButtonPanel: true,
                dateFormat: "yy/mm/dd",
                showOn: "both",
                yearRange: '-100:+0',
                buttonImage: '/content/images/calender.png',
                buttonImageOnly: true,
                minDate: "",
                language: language
            });
            calendarInstance.datepicker("option", options);
        }
        function step(id) {
            var ids = id;
            var idss = id + 1;

            $(".step" + idss).slideDown(500);
            $(".step" + ids).slideUp(500);
            $(".stepTop" + idss).addClass("active");
            $(".stepTop" + ids).removeClass("active");
        }
        function stepBack(id) {
            var ids = id;
            var idss = id - 1;
            $(".step" + idss).slideDown(500);
            $(".step" + ids).slideUp(500);
            $(".stepTop" + idss).addClass("active")
            $(".stepTop" + ids).removeClass("active")
        }
        $("#checkBoxID").click(function () {
            $("#buttonID").attr("disabled", !this.checked);
        });
        $("#checkBoxID").click(function () {
            var checked_status = this.checked;
            if (checked_status == true) {
                $(".buttonOrder").removeAttr("disabled");
            } else {
                $(".buttonOrder").attr("disabled", "disabled");
            }
        });
    </script>

    <script type="text/javascript">
        //<![CDATA[
        if (!window.mvcClientValidationMetadata) { window.mvcClientValidationMetadata = []; }
        window.mvcClientValidationMetadata.push(
            {
                "Fields": [
                    {
                        "FieldName": "NationalCode",
                        "ReplaceValidationMessageContents": true,
                        "ValidationMessageId": "NationalCode_validationMessage",
                        "ValidationRules": [
                            {
                                "ErrorMessage": "کد ملی نامعتبر است!",
                                "ValidationParameters": {},
                                "ValidationType": "NationalCodeValidator"
                            }]
                    },
                    {
                        "FieldName": "Mobile",
                        "ReplaceValidationMessageContents": true,
                        "ValidationMessageId": "Mobile_validationMessage",
                        "ValidationRules":
                            [{
                                "ErrorMessage": "شماره موبایل نامعتبر است",
                                "ValidationParameters": {},
                                "ValidationType": "IranianMobileValidator"
                            }]
                    }

                ],
                "FormId": "form0",
                "ReplaceValidationSummary": false,
                "ValidationSummaryId": "validationSummary"
            });
        //]]>
    </script>

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


    <script src="/scripts/bootstrap-datepicker.min.js"></script>
    <script src="/scripts/bootstrap-datepicker.fa.min.js"></script>





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
    <script src="https://secure.livechatinc.com/licence/9309070/v2/get_dynamic_config.js?t=1533798220221&amp;referrer=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fview%2Fvilla%2Framsar-baghvila%3FcheckIn%3D13970519%26checkOut%3D13970520%26coins%3D%26rc9386-11405%3D1&amp;url=https%3A%2F%2Fwww.jabama.com%2Fbook%2Fguests%2Fvilla%2Framsar-baghvila%3FcheckIn%3D13970519%26checkOut%3D13970520%26coins%3D%26rc9386-11405%3D1&amp;params=&amp;jsonp=__lc_data_923739"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/get_static_config.0.321.10.10.1373.462.470.76.24.6.11.6.15.js?&amp;jsonp=__lc_data_static_config"></script><script src="https://secure.livechatinc.com/licence/9309070/v2/localization.en.0.043117e7a56a2e3ea008a802da2a0076_56dcba5fc6c6f2145f18866ccc904518.js?jsonp=__lc_lang"></script><div id="livechat-compact-container" style="position: fixed; bottom: 0px; right: 15px; width: 330px; height: 105px; overflow: hidden; visibility: visible; z-index: 2147483639; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; opacity: 1; transform: translateY(0%);"><iframe src="about:blank" id="livechat-compact-view" style="position: relative;top: 20px;left: 0;width: 100%;border: 0;padding: 0;margin: 0;float: none;background: none" scrolling="no" allowtransparency="true" title="LiveChat Minimized Widget" frameborder="0"></iframe><a id="livechat-badge" href="#" onclick="LC_API.show_full_view({source:'minimized click'});return false" style="position: absolute;display: block;visibility: hidden;height: 16px;padding: 0 4px;line-height: 16px;background: #f00;color: #fff;font-size: 10px;text-decoration: none;font-family: 'Lucida Grande', 'Lucida Sans Unicode', Arial, Verdana, sans-serif;border-radius: 3px;box-shadow: 0 -1px 0px #f00, -1px 0 0px #f00, 1px 0 0px #f00, 0 1px 0px #f00, 0 0 2px #000;border-top: 1px solid #f99;width: 16px;border-radius: 50%;box-shadow: none;border-top: 0;padding: 0;text-align: center;font-family: 'Lato', sans-serif;top: 23px;right: 8px"></a></div><div id="livechat-full" style="position: fixed; bottom: 0px; right: 15px; width: 400px; height: 450px; overflow: hidden; visibility: hidden; z-index: -1; background: transparent none repeat scroll 0% 0%; border: 0px none; transition: transform 0.2s ease-in-out 0s; backface-visibility: hidden; transform: translateY(100%); opacity: 0;"><iframe src="https://secure.livechatinc.com/licence/9309070/v2/open_chat.cgi?groups=0&amp;embedded=1&amp;newWebserv=undefined&amp;__lc_vv=2&amp;session_id=S1533468975.a5e8fa6e82&amp;server=secure.livechatinc.com#https://www.jabama.com/book/guests/villa/ramsar-baghvila?checkIn=13970519&amp;checkOut=13970520&amp;coins=&amp;rc9386-11405=1" id="livechat-full-view" name="livechat-full-view" title="LiveChat Widget" scrolling="no" allowtransparency="true" style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%; border: 0px none; padding: 0px; margin: 0px; float: none; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;" frameborder="0"></iframe></div><div id="lc_invite_layer" style="text-align: left; display: none; z-index: 16777261;"></div><div id="lc_overlay_layer" style="background-color: rgb(0, 0, 0); position: fixed; left: 0px; top: 0px; z-index: 16777260; display: none; width: 100%; height: 100%;"></div><script id="livechat-ping" src="https://secure.livechatinc.com/licence/9309070/v2/ping?t=1533798225854&amp;data=%7B%22visitor%22%3A%7B%22id%22%3A%22S1533468975.a5e8fa6e82%22%7D%7D&amp;jsonp=__lc_ping_362395"></script></body>
@endsection