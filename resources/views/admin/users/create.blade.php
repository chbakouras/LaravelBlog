@extends('admin.admin')

@section('add-to-head')
    <title>New User</title>
@endsection

@section('content')
    <h2>Create New User</h2>
    <div class="row">
        {!! Form::open(array('url' => route('admin.users.store'))) !!}
        <div class="col-lg-8 col-md-8 col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control margin10', 'placeholder' => 'Type user name', 'autocomplete' => 'off')) !!}
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, array('class' => 'form-control margin10', 'placeholder' => 'Type user email', 'autocomplete' => 'off')) !!}
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', array('class' => 'form-control margin10', 'placeholder' => 'Type user password', 'autocomplete' => 'off')) !!}
            {!! Form::label('password_verify', 'Retype Password') !!}
            {!! Form::password('password_verify', array('class' => 'form-control margin10', 'placeholder' => 'Retype user password', 'autocomplete' => 'off')) !!}
            {!! Form::label('role', 'Role') !!}
            {!! Form::select('role', $roles, null, array('class' => 'form-control margin10', 'placeholder' => 'Choose a role')) !!}
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', $status, null, array('class' => 'form-control margin10', 'placeholder' => 'User status')) !!}

            {!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection