@extends('admin')

@section('add-to-head')
    <title>Posts</title>
@endsection

@section('content')
    <h1>Posts</h1>
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
                        <a href="/{{ $post->categories->first()->slug }}/{{ $post->slug }}" target="_blank">View</a>
                        <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
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
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
@endsection