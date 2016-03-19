<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
<img id="logo" src="{{ asset('img/logo.png') }}" />
<div id="login">
    {!! Form::open(array('url' => 'auth/login', 'name' => 'form-login' )) !!}
        {!! Form::token() !!}
        <span class="fontawesome-user"></span>
        {!! Form::text('email', null, array('id' => 'user', 'placeholder' => 'Username')) !!}

        <span class="fontawesome-lock"></span>
        {!! Form::password('password', array('id' => 'password', 'placeholder' => 'Password')) !!}

        {!! Form::submit('Login') !!}
    {!! Form::close() !!}
</div>
<div id="dev-by">
    <span>Developed by <a href="https://github.com/chbakouras" target="_blank">Chrisostomos Bakouras.</a></span>
</div>
</body>
</html>
