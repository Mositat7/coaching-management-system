<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <!-- Title Meta -->
    <meta charset="utf-8"/>
    <title>
        @yield('title', 'My Club')
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="A fully responsive premium admin dashboard template, Real Estate Management Admin Template" name="description"/>
    <meta content="Techzaa" name="author"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!-- App favicon -->
    <link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon"/>
    <!-- Vendor css (Require in all Page) -->
    <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons css (Require in all Page) -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App css (Require in all Page) -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Theme Config js (Require in all Page) -->
    <script src="{{asset('assets/js/config.min.js')}}">
    </script>
{{--    </link>--}}
{{--    </meta>--}}
    @yield('head')
</head>
<body>
<!-- START Wrapper -->
<div class="wrapper">
    <!-- ========== Topbar Start ========== -->
    <header class="">
        @include('partials.header')
    </header>
    <!-- Right Sidebar (Theme Settings) -->
    @include('partials.sidebar')
    <!-- ========== Topbar End ========== -->
    <!-- ========== App Menu Start ========== -->
    @include('partials.Topbar')
    <!-- ========== App Menu End ========== -->
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    @yield('content')
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- End Container Fluid -->
    <!-- ========== Footer Start ========== -->
    <footer class="footer">
        @include('partials.footer')
    </footer>
    <!-- ========== Footer End ========== -->
    <!-- ==================================================== -->
</div>
<!-- END Wrapper -->
<!-- Vendor Javascript (Require in all Page) -->
<script src="{{asset('assets/js/vendor.js')}}">
</script>
<!-- App Javascript (Require in all Page) -->
<script src="{{asset('assets/js/app.js')}}">
</script>
<!-- Vector Map Js -->
<script src="{{asset('assets/vendor/jsvectormap/js/jsvectormap.min.js')}}">
</script>
<script src="{{asset('assets/vendor/jsvectormap/maps/world-merc.js')}}">
</script>
<script src="{{asset('assets/vendor/jsvectormap/maps/world.js')}}">
</script>
<!-- Dashboard Js -->
<script src="{{asset('assets/js/pages/dashboard.js')}}">
</script>
@yield('scripts')
</body>
</html>
