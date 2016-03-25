@extends('admin.admin')

@section('add-to-head')
    <title>Users</title>
@endsection

@section('content')

    <h2>Users
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create New User
        </a>
    </h2>

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th>Name</th>
            <th></th>
            <th>Email</th>
            <th>Role</th>
            <th>Posts</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    <img src="{!! Gravatar::src($user->email) !!}" alt="{{ $user->name }}" class="circle-img" width="50" height="50" />
                    {{ $user->name }}
                </td>
                <td class="vertical-align-middle">
                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}">Edit</a>
                    {{ Form::open(array('url' => route('admin.users.destroy', ['id' => $user->id]), 'method' => 'DELETE', 'id' => 'delete-form-' . $user->id, 'class' => 'inline-form')) }}
                    <a href="#" onclick="submitForm({{ $user->id }})">Delete Permanently</a>
                    {{ Form::close() }}
                </td>
                <td class="vertical-align-middle">{{ $user->email }}</td>
                <td class="vertical-align-middle">{{ ucfirst($user->role->name) }}</td>
                <td class="vertical-align-middle">{{ $posts[$user->id] }}</td>
            </tr>
        @endforeach
    </table>
    <div class="paginate">
        {!! $users->render() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
@endsection
