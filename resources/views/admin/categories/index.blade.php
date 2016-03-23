@extends('admin.admin')

@section('add-to-head')
    <title>Categories</title>
@endsection

@section('content')

    <h2>Categories
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> New Category
        </a>
    </h2>

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Creation date</th>
            <th>Update date</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    {{ $category->name }} <br>
                    <div>
                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Edit</a>
                        {{ Form::open(array('url' => route('admin.categories.destroy', ['id' => $category->id]), 'method' => 'DELETE', 'id' => 'delete-form-' . $category->id, 'class' => 'inline-form')) }}
                        <a href="#" onclick="submitForm({{ $category->id }})">Delete Permanently</a>
                        {{ Form::close() }}
                    </div>
                </td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
            </tr>
        @endforeach
    </table>
    <div class="paginate">
        {!! $categories->render() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection