<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @yield('add-to-head')
</head>
<body>
@include('partials.admin-header')
<div id="wrapper" class="admin">
    <div id="sidebar-wrapper">
        @include('partials.admin-left-sidebar')
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 content">
                    @yield('content')
                </div>
            </div>
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
