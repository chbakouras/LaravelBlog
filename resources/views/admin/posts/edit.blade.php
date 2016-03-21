@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h1>Edit {{ $post->type }}</h1>
    <textarea title="editor" id="editor" style="width:100%; min-height:400px">
        {{ $post->content }}
    </textarea>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection