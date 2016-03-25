<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
</head>

<body>
<img id="logo" src="{{ asset('img/logo.png') }}" />
<div id="login">
    {!! Form::open(array('url' => route('admin.auth.login'), 'name' => 'form-login' )) !!}
        {!! Form::token() !!}
        <span class="fa fa-user fa-2x"></span>
        {!! Form::text('email', null, array('id' => 'user', 'placeholder' => 'Username')) !!}

        <span class="fa fa-lock fa-2x"></span>
        {!! Form::password('password', array('id' => 'password', 'placeholder' => 'Password')) !!}

        {!! Form::submit('Login') !!}
    {!! Form::close() !!}
</div>
<div id="dev-by">
    <span>Developed by <a href="https://github.com/chbakouras" target="_blank">Chrisostomos Bakouras.</a></span>
</div>
</body>
</html>
