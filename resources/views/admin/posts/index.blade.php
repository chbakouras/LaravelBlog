@extends('admin.admin')

@section('add-to-head')
    <title>Posts</title>
@endsection

@section('content')

    <h2>{{ ucfirst($postType) }}s
        <a href="{{ route('admin.posts.create') }}?type={{ $postType }}" class="btn btn-success">
            <i class="fa fa-plus"></i> New {{ ucfirst($postType) }}
        </a>
    </h2>

    @include('admin.posts.partials.posts-status-tabs')

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Categories</th>
            <th>Type</th>
            <th>Status</th>
            @if($activeStatus === \Illuminate\Support\Facades\Config::get('blog.post.status.trashed'))
                <th>Trashed date</th>
            @endif
            <th>Creation date</th>
            <th>Update date</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    {{ $post->title }} <br>
                    <div>
                        <a href="/{{ $post->slug }}" target="_blank">View</a>
                        <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}">Edit</a>
                        @if($activeStatus === \Illuminate\Support\Facades\Config::get('blog.post.status.trashed'))
                            {{ Form::open(array('url' => route('admin.posts.destroy', ['id' => $post->id]), 'method' => 'DELETE', 'id' => 'delete-form-' . $post->id, 'class' => 'inline-form')) }}
                            <a href="#" onclick="submitForm({{ $post->id }})">Delete Permanently</a>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(array('url' => route('admin.posts.patch', ['id' => $post->id]), 'method' => 'PATCH', 'id' => 'delete-form-' . $post->id, 'class' => 'inline-form')) }}
                            <a href="#" onclick="submitForm({{ $post->id }})">Trash</a>
                            {{ Form::close() }}
                        @endif
                    </div>
                </td>
                <td><a href="{{ route('admin.users.show', [$post->author->id]) }}">{{ $post->author->name }}</a></td>
                <td>
                    @foreach($post->categories as $category)
                    <a href="{{ route('admin.categories.show', ['id' =>$category->id]) }}">{{ $category->name }}</a>
                    @endforeach
                </td>
                <td>{{ $post->type }}</td>
                <td>{{ $post->status }}</td>
                @if($activeStatus === \Illuminate\Support\Facades\Config::get('blog.post.status.trashed'))
                    <td>{{ $post->deleted_at }}</td>
                @endif
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        @endforeach
    </table>
    <div class="paginate">
        {!! $posts->render() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection