@extends('admin.admin')

@section('add-to-head')
    <title>New {{ ucfirst($postType) }}</title>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
    <h2>Create New {{ ucfirst($postType) }}</h2>
    <div class="row">
        {!! Form::open(array('url' => route('admin.posts.store'))) !!}
        <div class="col-lg-9">
            {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Type title', 'autocomplete' => 'off')) !!}

            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                </textarea>
            </div>

            <div class="panel panel-default margin10">
                <div class="panel-heading">
                    <h3 class="panel-title">Choose {{ ucfirst($postType) }} template:</h3>
                </div>
                <div class="panel-body">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default">
                            <input type="radio" name="view_template" value="{{ $postType }}Default"/>
                            Default
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="view_template" value="twoColumns" />
                            Two columns
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="view_template" value="threeColumns" />
                            Three columns
                        </label>
                    </div>
                </div>
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