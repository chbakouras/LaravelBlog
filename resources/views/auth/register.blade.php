<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
</head>

<body>
<img id="logo" src="{{ asset('img/logo.png') }}" />
<div id="login">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth.register') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <span class="fa fa-user fa-2x"></span>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="fa fa-envelope fa-2x"></span>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="fa fa-lock fa-2x"></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <span class="fa fa-check fa-2x"></span>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input type="submit" value="Register">
        </div>
    </form>
</div>
<div id="dev-by">
    <span>Developed by <a href="https://github.com/chbakouras" target="_blank">Chrisostomos Bakouras.</a></span>
</div>
</body>
</html>