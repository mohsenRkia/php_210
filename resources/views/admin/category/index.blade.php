@extends('admin.lauout.index')

@section('title' , 'لیست دسته بندی ها')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            لیست دسته ها

                        </header>
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped border-top dataTable" id="sample_1" aria-describedby="sample_1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">ردیف</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">نام دسته</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ ایجاد</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ ویرایش</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 172px;"></th>
                                </tr>
                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($categories as $category)
                                <tr class="gradeX odd">
                                    <td class="hidden-phone ">{{$category->id}}</td>
                                    <td class=" ">{{$category->name}}</td>
                                    <td class="hidden-phone ">{{$category->created_at->diffForHumans()}}</td>
                                    <td class="center hidden-phone ">{{$category->updated_at->diffForHumans()}}</td>
                                    <td class="hidden-phone "><a href="{{route('category.edit',['id' => $category->id])}}"><span class="label label-success">ویرایش</span></a>  <a href="{{route('category.destroy',['id' => $category->id])}}"><span class="label label-danger">حذف</span></a> </td>
                                </tr>
                                @endforeach


                                </tbody></table>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>


@endsection


@section('script')
    <script type="text/javascript" src="/admin/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script src="/admin/js/dynamic-table.js"></script>
@endsection
