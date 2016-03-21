<!DOCTYPE html>
<html lang="en">
<head>
    @include('theme.partials.head')
    @yield('add-to-head')
</head>
<body>
@if($sidebarRight)
    <?php
    $content_class = "col-lg-6 col-md-6";
    $sidebar_right = true;
    ?>
@else
    <?php
    $content_class = "col-lg-9 col-md-9";
    $sidebar_right = false;
    ?>
@endif
@include('theme.partials.header')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div id="left-sidebar" class="col-lg-3 col-md-3">
                @include('theme.partials.sidebar-left')
            </div>
            <div id="content-wrapper" class="{{ $content_class }}">
                @yield('content')
            </div>
            @if($sidebarRight)
            <div id="right-sidebar" class="col-md-3">
                @yield('sidebar-right')
            </div>
            @endif
        </div>
    </div>
</div>
@include('theme.partials.footer')

<!-- Scripts -->
<script src="{{ asset('vendor/jquery-2.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
@yield('scripts')
</body>
</html>
