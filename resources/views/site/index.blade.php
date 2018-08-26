@extends('site.layout.home')

@section('title','صفحه اصلی سایت رزرو هتل')

@section('content')

    <div class="jbOfferHotel other-accommodation">
        <aside class="section container">
            <h2 class="jbTitle dh-home-title no-bottom-margin">
                <a href="" style="color: black;float: right;font-family: Tahoma, sans-serif;font-size: 18px">اقامتگاه‌ها</a>

            </h2>
            <div class="row image-box hotel listing-style1">
                <div id="owl-other-accommodation" class="owl-carousel owl-theme">

                    @foreach($places as $place)

                        <div class="item">
                            <article class="box">
                                <figure class="animated">

                                    <a target="_blank" data-norouz-hotel title="جنگلی روستایی چالو" href="{{route('place.show',['id' => $place->id])}}" class="hover-effect popup-gallery lazy" data-original="/upload/{{$place->photo}}" style="-moz-animation-duration: 0.6s; -webkit-animation-duration: 0.6s; animation-duration: 0.6s;">
                                        <div class="feedback row" style="left: 0px;margin-right: 0px;margin-left: 0px;">
                                            <span class="col-md-6 col-sm-6 starName s0" style="padding: 0px;"></span>
                                        </div>
                                    </a>
                                </figure>
                                <div class="details">


                                    <h3>
                                        <a target="_blank" class="box-title" href="{{route('place.show',['id' => $place->id])}}">
                                            {{$place->title}}
                                        </a>
                                    </h3>
                                    <span class="price">

                                            <span class="currency">{{$place->price}}</span> ریال
                                            <small>شروع قیمت</small>
                                        </span>
                                </div>
                            </article>
                        </div>

                @endforeach

                </div>
            </div>
        </aside>
        <div class="clearfix"></div>
    </div>
@endsection