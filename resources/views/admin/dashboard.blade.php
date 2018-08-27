@extends('admin.layout.index')

@section('title' , 'داشبورد')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="icon-user"></i>
                        </div>
                        <div class="value">
                            <h1>22</h1>
                            <p>کاربر جدید</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol red">
                            <i class="icon-tags"></i>
                        </div>
                        <div class="value">
                            <h1>140</h1>
                            <p>فروش</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="value">
                            <h1>345</h1>
                            <p>سفارش جدید</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="icon-bar-chart"></i>
                        </div>
                        <div class="value">
                            <h1>34,500</h1>
                            <p>سود خالص</p>
                        </div>
                    </section>
                </div>
            </div>
            <!--state overview end-->

        </section>
    </section>


@endsection


@section('script')
    <script src="/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admin/js/owl.carousel.js" ></script>
    <script src="/admin/js/jquery.customSelect.min.js" ></script>
    <script src="/admin/js/sparkline-chart.js"></script>
    <script src="/admin/js/easy-pie-chart.js"></script>
@endsection
