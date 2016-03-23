@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h2>Create New {{ ucfirst($postType) }}</h2>
    <div class="row">
        {!! Form::open(array('url' => '/admin/posts')) !!}
        <div class="col-lg-9">
            {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter title', 'autocomplete' => 'off')) !!}

            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                </textarea>
            </div>
        </div>
        <div class="col-lg-3">
            @include('admin.posts.partials.categories')
            @include('admin.posts.partials.publish')
        </div>
        {!! Form::hidden('type', $postType) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection