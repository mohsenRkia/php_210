@extends('admin.layout.index')

@section('title' , 'ویرایش کاربر')


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
                            ویرایش کاربر {{$user->name}}

                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="{{route('users.update',['id' => $user->id])}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نام کاربری</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ایمیل</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">رمز عبور</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" placeholder="رمز عبور" type="password" name="password">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">درجه</label>
                                    <div class="col-lg-6">

                                        <select class="form-control input-sm m-bot15" name="role_id">

                                            @if($user->role_id == 1)
                                                <option value="1">مدیر سایت</option>
                                            @else
                                                <option value="0">مشتری</option>
                                            @endif



                                            <option value="1">مدیر سایت</option>
                                            <option value="0">مشتری</option>
                                        </select>
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
