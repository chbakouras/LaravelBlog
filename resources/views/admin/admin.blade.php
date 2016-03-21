<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
    @yield('add-to-head')
</head>
<body>
@include('admin.partials.header')
<div id="wrapper" class="admin">
    <div id="sidebar-wrapper">
        @include('admin.partials.left-sidebar')
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
    @include('admin.partials.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery-2.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
@yield('scripts')
</body>
</html>
