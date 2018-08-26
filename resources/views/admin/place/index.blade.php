@extends('admin.lauout.index')

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
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">عنوان</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ ایجاد</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ ویرایش</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 172px;"></th>
                                </tr>
                                </thead>
‍‍‍‍‍
                                <tbody role="alert" aria-live="polite" aria-relevant="all">‍
                                @foreach($places as $place)
                                    <tr class="gradeX odd">
                                        <td class="hidden-phone ">{{$place->id}}</td>
                                        <td class=" ">{{$place->title}}</td>
                                        <td class="hidden-phone ">{{$place->created_at->diffForHumans()}}</td>
                                        <td class="center hidden-phone ">{{$place->updated_at->diffForHumans()}}</td>
                                        <td class="hidden-phone "><a href="{{route('place.edit',['id' => $place->id])}}"><span class="label label-success">ویرایش</span></a>  <a href="{{route('place.destroy',['id' => $place->id])}}"><span class="label label-danger">حذف</span></a> </td>
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
    <script src="/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admin/js/owl.carousel.js" ></script>
    <script src="/admin/js/jquery.customSelect.min.js" ></script>
    <script src="/admin/js/sparkline-chart.js"></script>
    <script src="/admin/js/easy-pie-chart.js"></script>
@endsection
