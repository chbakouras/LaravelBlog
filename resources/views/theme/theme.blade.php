<!DOCTYPE html>
<html lang="en">
<head>
    @include('theme.partials.head')
    @yield('add-to-head')
</head>
<body>
@if(Helpers::sectionExists('sidebar-right'))
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
    <div id="left-sidebar" class="col-lg-3 col-md-3">
        @include('theme.partials.sidebar-left')
    </div>
    <div id="content-wrapper" class="{{ $content_class }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @if($sidebar_right)
    <div id="right-sidebar" class="col-md-3">
        @yield('sidebar-right')
    </div>
    @endif
</div>
@include('theme.partials.footer')

<!-- Scripts -->
<script src="{{ asset('vendor/jquery-2.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
@yield('scripts')
</body>
</html>
