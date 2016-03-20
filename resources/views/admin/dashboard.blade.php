@extends('admin')

@section('add-to-head')
    <title>Dashboard</title>
@endsection

@section('content')
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