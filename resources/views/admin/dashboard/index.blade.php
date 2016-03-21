@extends('admin.admin')

@section('add-to-head')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="article-ckeditor" id="article-ckeditor" style="width:100%; min-height:400px"></div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    {{--<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>--}}
@endsection

@section('scripts')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
@endsection