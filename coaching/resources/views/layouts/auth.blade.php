<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود مربی - سیستم مدیریت</title>

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!-- Remix Icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- Vazir Font (فونت فارسی - لوکال) -->
    <link href="{{ asset('vendor/vazir/font-face.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: Vazir, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
@yield('content')

<!-- Bootstrap JS (لوکال) -->
<script src="{{ asset('assets/js/vendor.js') }}"></script>

@yield('scripts')
</body>
</html>
