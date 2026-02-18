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
<!-- ظرف توست برای اعلان‌ها -->
<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 9999;" id="notificationToasts"></div>
<script>
window._notificationOriginalTitle = document.title;
window.playNotificationSound = function() {
    try {
        var C = window.AudioContext || window.webkitAudioContext;
        if (!C) return;
        var ctx = new C();
        var osc = ctx.createOscillator();
        var g = ctx.createGain();
        osc.connect(g); g.connect(ctx.destination);
        osc.frequency.value = 720; osc.type = 'sine';
        g.gain.setValueAtTime(0.12, ctx.currentTime);
        g.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
        osc.start(ctx.currentTime); osc.stop(ctx.currentTime + 0.12);
    } catch (e) {}
};
window.showNotificationToast = function(title, body, type) {
    type = type || 'primary';
    var container = document.getElementById('notificationToasts');
    if (!container) return;
    var el = document.createElement('div');
    el.className = 'toast align-items-center text-bg-' + type + ' border-0';
    el.setAttribute('role', 'alert');
    el.innerHTML = '<div class="d-flex"><div class="toast-body">' + (title || '') + (body ? '<br><small class="opacity-90">' + body + '</small>' : '') + '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>';
    container.appendChild(el);
    var t = new bootstrap.Toast(el, { delay: 4500 });
    t.show();
    el.addEventListener('hidden.bs.toast', function() { el.remove(); });
};
window.setTitleNotification = function(count) {
    document.title = (count > 0 ? '(' + count + ') ' : '') + (window._notificationOriginalTitle || 'پنل');
};
window.clearTitleNotification = function() {
    document.title = window._notificationOriginalTitle || document.title.replace(/^\(\d+\)\s*/, '');
};
</script>
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
