@extends('profile.lauout.index')

@section('title' , 'مطالب قبلی')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            مطالب قبلی

                        </header>
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped border-top dataTable" id="sample_1" aria-describedby="sample_1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">شماره</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">تاریخ ورود</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ خروج</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">نام و نام خانوادگی</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 172px;">کدملی</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 172px;">موبایل</th>

                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">مکان</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">مبلغ پرداخت</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تعداد مهمان</th>
                                </tr>
                                </thead>
                                ‍‍‍‍‍
                                <tbody role="alert" aria-live="polite" aria-relevant="all">‍


                                @foreach($orders as $order)
                                    <tr class="gradeX odd">
                                        <td class="hidden-phone">{{$order->id}}</td>
                                        <td class="hidden-phone">{{$order->checkin}}</td>
                                        <td class="hidden-phone">{{$order->checkout}}</td>
                                        @foreach($order->guests as $guests)
                                            <td class="hidden-phone">{{$guests->name}} {{$guests->family}}</td>
                                            <td class="hidden-phone">{{$guests->nationalcode}}</td>
                                            <td class="hidden-phone">{{$guests->mobile}}</td>
                                        @endforeach
                                        <td class="hidden-phone">{{$order->places->title}}</td>
                                        <td class="hidden-phone">{{$order->totallprice}}</td>
                                        <td class="hidden-phone">{{$order->persons}}</td>
                                    </tr>
                                @endforeach

                                </tbody></table>
                        </div>
                    </section>
                </div>
            </div>‍‍


        </section>
    </section>


@endsection


@section('script')
    <script type="text/javascript" src="/admin/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script src="/admin/js/dynamic-table.js"></script>

@endsection
