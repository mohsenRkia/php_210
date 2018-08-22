@extends('admin.lauout.index')

@section('title' , 'ویرایش دسته')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ویرایش دسته

                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="{{route('category.update',['id' => $categories->id])}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام دسته</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" value="{{$categories->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input class="btn btn-danger" type="submit" value="ویرایش">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>


@endsection


@section('script')
    <script src="/admin/js/sparkline-chart.js"></script>
    <script src="/admin/js/easy-pie-chart.js"></script>
@endsection
