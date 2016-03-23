@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h2>Edit {{ $post->type }}
        <a href="{{ route('admin.posts.create') }}?type={{ $post->type }}" class="btn btn-success">
            <i class="fa fa-plus"></i> New {{ ucfirst($post->type) }}
        </a>
    </h2>
    <div class="row">
        {!! Form::model($post, array(route('admin.posts.update', ['id' => $post->id]), 'method' => 'PUT')) !!}
        <div class="col-lg-9">
            {!! Form::text('title', $post->title, array('class' => 'form-control', 'placeholder' => 'Enter title', 'autocomplete' => 'off')) !!}
            <span id="permalink">Permalink: <a href="{{ URL::to('/') . '/' . $post->slug }}" target="_blank">{{ URL::to('/') . '/' . $post->slug }}</a></span>
            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                    {{ $post->content }}
                </textarea>
            </div>
        </div>
        <div class="col-lg-3">
            @include('admin.posts.partials.categories')
            @include('admin.posts.partials.publish')
        </div>
        {!! Form::hidden('type', $post->type) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection