@extends('admin.admin')

@section('add-to-head')
    <title>Posts</title>
@endsection

@section('content')

    <h2>Posts
        <a href="/admin/posts/create" class="btn btn-success">
            <i class="fa fa-plus"></i> New Post
        </a>
    </h2>

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Categories</th>
            <th>Type</th>
            <th>Creation date</th>
            <th>Update date</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    {{ $post->title }} <br>
                    <div>
                        {{ Form::open(array('url' => '/admin/posts/' . $post->id, 'method' => 'PATCH', 'id' => 'soft-delete-form')) }}
                        <a href="/{{ $post->slug }}" target="_blank">View</a>
                        <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                        <a href="#" id="soft-delete">Thrash</a>
                        {{ Form::close() }}
                    </div>
                </td>
                <td><a href="/users/{{ $post->author->id }}">{{ $post->author->name }}</a></td>
                <td>
                    @foreach($post->categories as $category)
                    <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                    @endforeach
                </td>
                <td>{{ $post->type }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/posts.js') }}"></script>
@endsection