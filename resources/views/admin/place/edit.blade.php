@extends('admin.layout.index')

@section('title' , 'ویرایش اقامتگاه')

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
                            ویرایش اقامتگاه

                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="{{route('place.update',['id' => $places->id])}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">عنوان مطلب</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="title" value="{{$places->title}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">چکیده مطلب</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="body">{{$places->body}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">قیمت</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="price" value="{{$places->price}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ظرفیت</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="capacity" value="{{$places->capacity}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">شهر</label>
                                    <div class="col-sm-6">
                                        <select class="form-control input-sm m-bot15" name="category_id">
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">نویسنده</label>
                                    <div class="col-sm-6">
                                        <select class="form-control input-sm m-bot15" name="user_id">
                                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">تصویر</label>
                                    <div class="col-sm-6">
                                        <input id="exampleInputFile" type="file" name="photo">
                                    </div>
                                    <div class="col-sm-4"><img src="/upload/{{$places->photo}}" width="100"></div>
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
    <script src="/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admin/js/owl.carousel.js" ></script>
    <script src="/admin/js/jquery.customSelect.min.js" ></script>
    <script src="/admin/js/sparkline-chart.js"></script>
    <script src="/admin/js/easy-pie-chart.js"></script>
@endsection


