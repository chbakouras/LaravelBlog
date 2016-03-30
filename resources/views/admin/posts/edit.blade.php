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
        {!! Form::model($post, array('url' => route('admin.posts.update', ['id' => $post->id]), 'method' => 'PUT')) !!}
        <div class="col-lg-9">
            {!! Form::text('title', $post->title, array('class' => 'form-control', 'placeholder' => 'Enter title', 'autocomplete' => 'off')) !!}
            <span id="permalink">Permalink: <a href="{{ URL::to('/') . '/' . $post->slug }}" target="_blank">{{ URL::to('/') . '/' . $post->slug }}</a></span>
            <div id="editor-wrapper">
                <textarea title="editor" id="editor" name="content">
                    {{ $post->content }}
                </textarea>
            </div>

            <div class="panel panel-default margin10">
                <div class="panel-heading">
                    <h3 class="panel-title">Choose {{ ucfirst($post->type) }} template:</h3>
                </div>
                <div class="panel-body">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default">
                            <input type="radio" name="view_template" value="{{ $post->type }}Default"/>
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
        {!! Form::hidden('type', $post->type) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection