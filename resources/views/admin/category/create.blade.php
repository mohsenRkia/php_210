@extends('admin.layout.index')

@section('title' , 'ایجاد شهر جدید')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">
            @if($errors->count())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
                @endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ایجاد شهر جدید

                        </header>
            <div class="panel-body">
                <form class="form-horizontal tasi-form" method="post" action="{{route('category.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">نام دسته</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input class="btn btn-danger" type="submit" value="ارسال">
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
