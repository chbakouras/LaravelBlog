@extends('admin.admin')

@section('add-to-head')
    <title>New Category</title>
@endsection

@section('content')
    <h2>Create New Category</h2>
    <div class="row">
        {!! Form::open(array('url' => route('admin.categories.store'))) !!}
        <div class="col-lg-8 col-md-8 col-sm-12">
            {!! Form::text('name', null, array('class' => 'form-control margin10', 'placeholder' => 'Type category name', 'autocomplete' => 'off')) !!}
            {!! Form::textarea('description', null, array('class' => 'form-control margin10', 'placeholder' => 'Type category description', 'autocomplete' => 'off')) !!}
            {!! Form::text('slug', null, array('class' => 'form-control margin10', 'placeholder' => 'Type category slug (Leave it empty to auto generate!)', 'autocomplete' => 'off')) !!}
            {!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
        </div>
        {!! Form::close() !!}
        <div class="col-lg-4 col-md-4 col-sm-12">
            @include('admin.categories.partials.category-list')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection