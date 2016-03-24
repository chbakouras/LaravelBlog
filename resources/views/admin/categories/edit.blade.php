@extends('admin.admin')

@section('add-to-head')
    <title>Edit</title>
@endsection

@section('content')
    <h2>Edit Category {{ $category->name }}</h2>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            {!! Form::open(array('url' => route('admin.categories.update', ['id' => $category->id]), 'method' => 'PUT', 'id' => 'edit-form')) !!}
            {!! Form::text('name', $category->name, array('class' => 'form-control margin10', 'placeholder' => 'Type category name', 'autocomplete' => 'off')) !!}
            {!! Form::textarea('description', $category->description, array('class' => 'form-control margin10', 'placeholder' => 'Type category description', 'autocomplete' => 'off')) !!}
            {!! Form::text('slug', $category->slug, array('class' => 'form-control margin10', 'placeholder' => 'Type category slug (Leave it empty to auto generate!)', 'autocomplete' => 'off')) !!}
            {!! Form::submit('Update', array('class' => 'btn btn-primary pull-right rl-margin10', 'form' => 'edit-form')) !!}
            {!! Form::close() !!}

            {!! Form::open(array('url' => route('admin.categories.destroy', ['id' => $category->id]), 'method' => 'DELETE', 'id' => 'delete-form', 'class' => 'inline-form')) !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger pull-right rl-margin10', 'form' => 'delete-form')) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            @include('admin.categories.partials.category-list')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection