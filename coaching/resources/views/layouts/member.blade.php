<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title', 'پنل شاگرد')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon"/>
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/js/config.min.js') }}"></script>
    @yield('head')
    <style>
        .member-nav { background: var(--bs-body-bg); border-bottom: 1px solid var(--bs-border-color); }
        .member-hero { background: linear-gradient(135deg, var(--bs-primary) 0%, var(--bs-primary-dark, #0d6efd) 100%); border-radius: 16px; color: #fff; }
    </style>
</head>
<body>
<div class="wrapper">
    <header class="member-nav py-2 px-3">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('dashboard.member') }}" class="text-decoration-none fw-semibold text-body">
                <i class="ri-dashboard-2-line me-1"></i>پنل شاگرد
            </a>
            <div class="d-flex align-items-center gap-2">
                @if(isset($member) && $member)
                    <span class="d-none d-sm-inline text-muted small">{{ $member->full_name }}</span>
                    <a href="{{ route('member.logout') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="ri-logout-box-line me-1"></i>خروج
                    </a>
                @endif
            </div>
        </div>
    </header>
    <div class="content p-3 p-md-4">
        @yield('content')
    </div>
</div>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
@yield('scripts')
</body>
</html>
