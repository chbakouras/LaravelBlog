<!DOCTYPE html>
<html lang="en">
<head>
 @include('partials.head')
 @yield('add-to-head')
</head>
<body>

@if (!Auth::guest())

 @include('partials.header')

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
@else
 <div class="container-fluid">
  @yield('content')
 </div>
 @endif

         <!-- Scripts -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="{{ asset('vendors/bootstrap/js/bootstrap.js') }}"></script>
 @yield('scripts')
</body>
</html>


