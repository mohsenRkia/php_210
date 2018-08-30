@extends('site.layout.more')
@section('title',' اطلاعات ویلا')
@section('single')
    <link href="/site/bundles/mystyle.css" rel="stylesheet" />

    <body>
    <link href="/site/bundles/domestic-place-style-v651e.css" rel="stylesheet">

    <script src="/site/bundles/domestic-hotel-place-lib-scripts.js"></script>
    <script src="/site/content/index-scripts.js"></script>
    <link href="/site/bundles/jquery.Bootstrap-PersianDateTimePicker.css" rel="stylesheet">

    <div ng-app="myApp" ng-controller="hotelDetailController" ng-init="pageInit()" class="ng-scope">
        <div>
            <main class="main" ng-init="InitLoad()">
                <!-- ngIf: hotelDetailResult.NotEnableReserveMessage.length>0 -->
                <div class="container hotel-page-container no-pad" ng-class="{'showBlur':data.loading,'hasMarginTop':hideshowSearch}">
                    <div class="row jbFeatureHotel jbImagesHotel">
                        <div class="col-md-3 col-xs-12 hotel-right-side-bar">
                            <section id="hotel-facilities">
                                <div class="jbServiceHotel hotel-right-side-bar-content">
                                    <h5 class="block-event-title ng-binding">امکانات ویلا</h5>
                                    <ul class="jbFeatureList">
                                        <li title="پارکینگ">
                                            <span class="icon icon-1037"></span>
                                            <span class="text-facility Attraction ng-binding">پارکینگ</span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <section id="eco-system-rules" class="ng-scope">
                                <div class="hotel-right-side-bar-content">
                                    <h5 class="block-event-title">لازم است بدانید</h5>
                                    <ul class="jbPlaceList" dir="rtl">
                                        <li>
                                            <span class="eco-system-rules-item ng-scope" >
                    <i class="check-width fa icon fa-check jabama-green-color" aria-hidden="true"></i>
                    <span class="important-place">استعمال دخانیات در فضاهای داخلی اقامتگاه مجاز می باشد</span>
                </span>
                                        </li>
                                        <li>
                                            <span class="eco-system-rules-item ng-scope">
                    <i class="check-width fa icon fa-times" aria-hidden="true"></i>
                    <span class="important-place">ورود حیوانات خانگی به فضاهای داخلی اقامتگاه ممنوع می باشد</span>
                </span>
                                        </li>
                                        <li>
                                            <span class="eco-system-rules-item ng-scope">
                    <i class="check-width fa icon fa-times" aria-hidden="true"></i>
                    <span class="important-place">برگزاری مراسم (جشن و مهمانی)  در اقامتگاه ممنوع می باشد</span>
                </span>
                                        </li>
                                        <li>
                                            <span class="eco-system-rules-item ng-scope">
                    <i class="check-width fa icon fa-check jabama-green-color" aria-hidden="true"></i>
                    <span class="important-place">مناسب برای کودکان و سالمندان</span>
                </span>
                                        </li>
                                        <li>
                                            <span class="eco-system-rules-item ng-scope">
                    <i class="check-width fa icon fa-times" aria-hidden="true"></i>
                    <span class="important-place">امکان پذيرش گروه‌هاي مجردي فراهم نمي‌باشد</span>
                </span>
                                        </li>
                                        <li>
                                            <span class="eco-system-rules-item ng-scope">
                    <i class="check-width fa icon fa-check jabama-green-color" aria-hidden="true"></i>
                    <span class="important-place ng-binding">ساعت ورود 14:00 و ساعت خروج 12:00 می باشد</span>
                </span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <div class="clearfix"></div>
                        </div>

                        <article>
                            <div class="col-md-9 col-xs-12 jbResultList">
                                <section id="hotel-introduction-box">
                                    <div class="jbStarHotel jbBoxResultJa left-content-box-class">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row height-100-percent">
                                                <div class="col-md-6">
                                                    <h1 class="dh-hotel-title ng-binding">
                                                    {{$place->title}}
                                                    </h1>
                                                    <span class="starName s0"></span>
                                                    <div class="hotel-address">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        <span class="ng-binding">
                       {{$place->categories->name}}

                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                                <section id="hotel-image-slider">
                                    <!-- ngIf: hotelDetailResult.MaxDiscount -->
                                    <div class="page" data-place-slider="" style="display: block; padding: 20px;">
                                    <center>
                                        <img src="/upload/{{$place->photo}}" width="100%" style="max-width: 600px;">
                                    </center>
                                    </div>
                                </section>


                                <!-- ngIf: !hotelDetailResult.isHotelBase -->
                                <section class="ng-scope">
                                </section><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                <section id="more-information-about-hotel" ng-show="hotelDetailResult.Description">
                                    <div class="jbDescriptionHotel left-content-box-class" id="jbDetailHotel">
                                        {!! $place->body !!}


                                    </div>
                                </section>
                                <form method="POST" action="">
                                    <section id="room-offer" data-menu-partition="" class="hidden-over-flow">
                                        <!-- ngIf: hotelDetailResult.isHotelBase -->
                                        <!-- ngRepeat: room in hotelDetailResult.RoomServices --><!-- ngIf: !hotelDetailResult.isHotelBase -->
                                        <div class="col-md-12 room-offer-wrapper eco-tourism-reserve-structure ng-scope" data-ecosystem-room-details="">
                                            <div class="col-md-12 eco-tourism-warning-text-wrapper">
                                                <p class="col-md-8 no-pad eco-tourism-warning-text">
                                                    <i class="fa fa-volume-down" aria-hidden="true" dir="rtl"></i>
                                                    رزرو این اقامتگاه قابلیت کنسلی دارد و جریمه کنسلی بر اساس قوانین اعلام شده از طرف اقامتگاه محاسبه می‌گردد.
                                                </p>
                                                <div class="col-md-4">
                                                    <a target="_blank" class="col-md-4 btn eco-tourism-reserve-btn btn-jabama-green" href="{{route('order.first',['id' => $place->id])}}">رزرو</a>
                                                </div>
                                            </div>
                                        </div><!-- end ngIf: !hotelDetailResult.isHotelBase --><!-- end ngRepeat: room in hotelDetailResult.RoomServices -->
                                    </section>
                                </form>

                                <section id="hotel-standard-ruls" data-menu-partition="">
                                    <!-- ngIf: hotelDetailResult.isHotelBase -->
                                    <!-- ngIf: !hotelDetailResult.isHotelBase --><div class="col-md-12 left-content-box-class ng-scope">
                                        <div class="col-md-1">&nbsp;</div><div class="col-md-4 col-md-offset-1">
                                            <div class="rules-image in-out-rule-image"></div>
                                            <span class="rules-title">قوانین ورود و خروج</span>
                                            <p class="rules-content ng-binding">مسافرین گرامی می توانند بعد از ساعت 14:00 اتاق خود را تحویل گیرندو قبل از ساعت 12:00 اقامتگاه خود را تحویل دهند.</p>
                                        </div>
                                        <hr class="visible-xs-block">
                                        <hr class="visible-xs-block" style="opacity: 0;visibility: hidden;"><div class="col-md-1">&nbsp;</div>
                                        <div class="col-md-4">
                                            <div class="rules-image cancellation-rule-image"></div>
                                            <span class="rules-title">قوانین کنسل کردن</span>
                                            <p class="rules-content ng-binding">قوانین کنسلی هتل ها بسته به شرایط و زمان لغو رزرو، متفاوت است. به همین دلیل شرایط و مبلغ جریمه در زمان کنسلی اعلام و از مبلغ واریزی کسر خواهد شد. مابقی مبلغ به حساب مسافر واریز خواهد گشت.</p>
                                        </div>
                                    </div><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                </section>
                                <section id="room-offers-xs" class="visible-xs-block" data-room-offers-xs="">

                                    <div class="modal fade" id="room-offer-modal-xs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <div class="col-xs-12 hotel-right-side-bar-content">
                                                        <div class="col-xs-9">
                                                            <h1 class="dh-hotel-title ng-binding">
                                                                ویلا سه خوابه منتظمی
                                                                <!-- ngIf: !hotelDetailResult.isHotelBase --><span class="ng-binding ng-scope">- کد 1867</span><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                                            </h1>
                                                            <!-- ngIf: hotelDetailResult.isHotelBase -->
                                                            <div class="hotel-address">
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                <span class="ng-binding">


                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="detail-price-modal" class="modal-body">
                                                    <div data-room-details="" class="row room-offer-wrapper-xs left-content-box-class ng-scope" data-room-service-id="11405" data-room-id="9386" ng-repeat="room in hotelDetailResult.RoomServices">
                                                        <div class="col-xs-12 no-left-pad">
                                                            <div class="col-xs-3 room-capacity">
                                                                <div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index --><div class="room-capacity-adult ng-scope" ng-repeat="adult in range(room.Capacity) track by $index"></div><!-- end ngRepeat: adult in range(room.Capacity) track by $index -->
                                                                <i class="fa fa-plus ng-hide" aria-hidden="true" ng-show="room.ExtraCapacity"></i>

                                                            </div>
                                                            <div class="col-xs-5 no-pad ng-hide" ng-show="hotelDetailResult.isHotelBase">
                                                                <div class="room-details-coin-xs hotel-vertical-align">
                                                                    <span ng-show="room.Coins" class="room-coin ng-hide"><span data-room-coins="" class="ng-binding"> 0 </span> سکه برای هر شب</span>
                                                                    <div class="room-details-coin-img"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <!-- ngIf: room.Discount -->
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 room-title-wrapper-xs">
                                                            <div class="col-xs-4 no-pad room-title-xs">
                                                                <!-- ngIf: hotelDetailResult.isHotelBase -->
                                                                <!-- ngIf: !hotelDetailResult.isHotelBase --><span class="ng-scope">انتخاب تعداد نفرات</span><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                                            </div>
                                                            <div class="col-xs-4 no-pad online-voucher-xs">
                                                                <!-- ngIf: hotelDetailResult.isHotelBase -->
                                                                <!-- ngIf: hotelDetailResult.isHotelBase -->
                                                            </div>
                                                            <div class="col-xs-4 no-pad room-per-night-xs">
                                                                <span>قیمت برای هر شب</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 room-facility-wrapper-xs">
                                                            <div class="col-xs-6 no-pad room-facility-xs">
                                                                <span ng-show="hotelDetailResult.isHotelBase" class="ng-binding ng-hide">-</span>
                                                            </div>
                                                            <div class="col-xs-6 no-pad room-price-per-night-xs">
                                                                <strike ng-show="room.BoardPricePerNight &amp;&amp; room.BoardPricePerNight!=room.PricePerNight" class="ng-binding ng-hide">0</strike>
                                                                <span data-room-price-per-night="" class="ng-binding">0</span>
                                                                <span class="rial">ريال</span>
                                                            </div>
                                                        </div>
                                                        <!-- ngIf: hotelDetailResult.isHotelBase -->
                                                        <!-- ngIf: !hotelDetailResult.isHotelBase --><div class="col-xs-12 room-counter-xs ng-scope ng-hide">
                                                            <div ng-class="!hotelDetailResult.EnableReserve?'disable-element room-disable-element':'room-counter-plus'" class="col-xs-4 no-pad disable-element room-disable-element" data-room-counter="plus" ng-click="plusMinusSimple($event)">
                                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="col-xs-4 no-pad room-counter-number" data-room-counter-number="">
                                                                <span>0</span>
                                                            </div>
                                                            <div class="col-xs-4 no-pad room-counter-minus" data-room-counter="minus" ng-click="plusMinusSimple($event)">
                                                                <span><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                                        <div ng-show="!room.HasAvailability &amp;&amp; room.EnableWaitingList" class="col-xs-12 room-availibility-button ng-hide">
                                                            <div ng-class="!hotelDetailResult.EnableReserve?'disable-room-waiting-list disable-element':'room-waiting-list'" ng-click="clickWaitingList($event)" class="disable-room-waiting-list disable-element"><span>لیست انتظار</span></div>
                                                        </div>
                                                        <div ng-show="!room.HasAvailability &amp;&amp; !room.EnableWaitingList" class="col-xs-12 room-availibility-button">
                                                            <div ng-class="!hotelDetailResult.EnableReserve?'disable-room-waiting-list disable-element':'room-waiting-list'" class="disable-room-waiting-list disable-element"><span>نا موجود</span></div>
                                                        </div>
                                                        <div class="colxs-12 text-center room-price-details-read-more ng-hide" ng-click="DisplayRoomPriceDetail($event)" ng-show="hotelDetailResult.NightCount>1 &amp;&amp; room.HasAvailability">
                                                            <span>جزییات قیمت</span>
                                                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                                            <hr>
                                                        </div>
                                                        <div class="col-xs-12 room-price-details hidden-content ng-hide" ng-show="hotelDetailResult.NightCount>1" data-room-price-details="">
                                                            <!-- ngRepeat: mobileInventory in room.RoomInventory --><div class="col-xs-4 room-price-details-item ng-scope" ng-repeat="mobileInventory in room.RoomInventory">
                                                                <div class="price-details-day">
                                                                    <span class="ellipsis ng-binding">1397/05/18</span>
                                                                </div>
                                                                <div class="price-details-preice ng-hide" ng-show="mobileInventory.HasAvailability">
                                                                    <span class="ellipsis ng-binding">3,000,000</span>
                                                                    <span class="rial">ريال</span>
                                                                </div>
                                                                <div class="price-details-full-capacity" ng-hide="mobileInventory.HasAvailability">
                                                                    <span class="ellipsis">ظرفیت ندارد</span>
                                                                </div>
                                                            </div><!-- end ngRepeat: mobileInventory in room.RoomInventory -->
                                                        </div>
                                                    </div><!-- end ngRepeat: room in hotelDetailResult.RoomServices -->
                                                </div>
                                                <div class="modal-footer" id="xs-sticky-room-offer">
                                                    <div class="col-xs-12 no-pad total-price-wrapper">
                                                        <span class="col-xs-8 no-pad ng-binding">مجموع قیمت سفارش به ازای 1 شب</span>
                                                        <p class="col-xs-4 no-pad">

                                                            <span class="total-price-xs ng-binding ng-scope">0</span>
                                                            <span class="rial">ريال</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 no-pad text-center">

                                                        <button class="btn btn-jabama-green ng-scope">رزرو</button><!-- end ngIf: !hotelDetailResult.isHotelBase -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </section>

                            </div>
                        </article>

                        <div id="place-map-modal" class="modal mapModal">
                            <div class="modal-content">
                                <span class="close" data-dismiss="modal">×</span>
                                <ng-map zoom="14" id="place-map" center="[36.8861248498116,50.7307935263481]" style="display: block; height: 90%;">
                                    <marker position="36.8861248498116,50.7307935263481" title="ویلا سه خوابه منتظمی"></marker>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>

    </div>

    <script src="/site/bundles/domestic-hotel-place-local-scripts?v=-_Y0sqIX6yET_GV_xEnWhbHdvBvWvpxsTnuzXyPL1AA1"></script>


    <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
    <script src="/site/content/jalaali.js" type="text/javascript"></script>
    <script src="/site/content/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>

@endsection