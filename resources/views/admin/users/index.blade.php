@extends('admin.layout.index')

@section('title' , 'لیست کاربران')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            لیست کاربران
                        </header>
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped border-top dataTable" id="sample_1" aria-describedby="sample_1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">ردیف</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 168px;">نام کاربری</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">تاریخ ثبت نام</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">ایمیل</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 212px;">درجه</th>
                                    <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 172px;"></th>
                                </tr>
                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($users as $user)
                                    <tr class="gradeX odd">
                                        <td class="hidden-phone ">{{$user->id}}</td>
                                        <td class=" ">{{$user->name}}</td>
                                        <td class="hidden-phone ">{{$user->created_at}}</td>
                                        <td class="center hidden-phone ">{{$user->email}}</td>
                                        <td class="center hidden-phone ">
                                            @if($user->role_id == 1)
                                                {{'مدیر سایت'}}
                                            @else
                                                {{'مشتری'}}
                                            @endif
                                        </td>
                                        <td class="hidden-phone "><a href="{{route('users.edit',['id' => $user->id])}}"><span class="label label-success">ویرایش</span></a>  <a href="{{route('users.delete',['id' => $user->id])}}"><span class="label label-danger">حذف</span></a> </td>
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
