@extends('admin.admin')

@section('add-to-head')
    <title>New User</title>
@endsection

@section('content')
    <h2>Update User {{ $user->name }}</h2>
    <div class="row">
        {!! Form::open(array('url' => route('admin.users.update', ['id' => $user->id]), 'method' => 'PUT')) !!}
        <div class="col-lg-8 col-md-8 col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $user->name, array('class' => 'form-control margin10', 'placeholder' => 'Type user name', 'autocomplete' => 'off')) !!}
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $user->email, array('class' => 'form-control margin10', 'placeholder' => 'Type user email', 'autocomplete' => 'off')) !!}
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', array('class' => 'form-control margin10', 'placeholder' => 'Type user password', 'autocomplete' => 'off')) !!}
            {!! Form::label('password_verify', 'Retype Password') !!}
            {!! Form::password('password_verify', array('class' => 'form-control margin10', 'placeholder' => 'Retype user password', 'autocomplete' => 'off')) !!}
            {!! Form::label('role', 'Role') !!}
            {!! Form::select('role', $roles, $user->role_id, array('class' => 'form-control margin10', 'placeholder' => 'Choose a role')) !!}
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', $status, $user->status, array('class' => 'form-control margin10', 'placeholder' => 'User status')) !!}

            {!! Form::submit('Update', array('class' => 'btn btn-primary pull-right')) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection