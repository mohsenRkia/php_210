@extends('profile.lauout.index')

@section('title' , 'پروفایل')


@section('maincontent')

    <section id="main-content">
        <section class="wrapper">
            @if(Session::get('done'))
                <div class="alert alert-success">{{Session::get('done')}}</div>
            @elseif(Session::get('didnt'))
                <div class="alert alert-danger">{{Session::get('didnt')}}</div>
            @endif
        </section>
    </section>


@endsection


@section('script')
    <script type="text/javascript" src="/admin/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/admin/assets/data-tables/DT_bootstrap.js"></script>
    <script src="/admin/js/dynamic-table.js"></script>
@endsection