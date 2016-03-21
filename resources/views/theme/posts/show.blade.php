@extends('theme.theme')

@section('add-to-head')

    <title>{{ $post->title }}</title>
@endsection

@section('content')
    {!! $post->content !!}
    {{ $post->type }}
@endsection

@if($sidebarLeft)
@section('sidebar-left')
    @include('theme.partials.sidebar-left')
@endsection
@endif

@if($sidebarRight)
@section('sidebar-right')
    @include('theme.partials.sidebar-right')
@endsection
@endif

@section('scripts')
@endsection