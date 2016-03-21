@extends('admin.admin')

@section('add-to-head')
    <title>Posts</title>
@endsection

@section('content')
    <h1>Edit</h1>

@endsection

@section('scripts')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
@endsection