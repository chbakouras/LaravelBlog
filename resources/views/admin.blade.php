<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @yield('add-to-head')
</head>
<body>
@include('partials.admin-header')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 navbar-default sidebar" role="navigation">
            @include('partials.sidebar')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 content">
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery-2.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
@yield('scripts')
</body>
</html>
