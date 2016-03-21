@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h2>Create New Post</h2>
    <div class="row">
        {!! Form::open(array('url' => '/admin/posts')) !!}
        <div class="col-lg-10">
            {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter title', 'autocomplete' => 'off')) !!}

            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                </textarea>
            </div>
        </div>
        <div class="col-lg-2">
            <div id="publish">
                {!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection