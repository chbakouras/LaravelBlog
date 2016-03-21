@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h2>Edit {{ $post->type }}
        <a href="/admin/posts/create" class="btn btn-success">
            <i class="fa fa-plus"></i> New Post
        </a>
    </h2>
    <div class="row">
        {!! Form::model($post, array('route' => array('admin.posts.update', $post->id), 'method' => 'PUT')) !!}
        <div class="col-lg-10">
            {!! Form::text('title', $post->title, array('class' => 'form-control', 'placeholder' => 'Enter title', 'autocomplete' => 'off')) !!}
            <span id="permalink">Permalink: <a href="{{ URL::to('/') . '/' . $post->categories->first()->slug . '/' . $post->slug }}" target="_blank">{{ URL::to('/') . '/' . $post->categories->first()->slug . '/' . $post->slug }}</a></span>
            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                    {{ $post->content }}
                </textarea>
            </div>
        </div>
        <div class="col-lg-2">
            <div id="publish">
                {!! Form::submit('Update', array('class' => 'btn btn-primary pull-right')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection