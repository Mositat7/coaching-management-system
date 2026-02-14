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
        :root {
            --member-primary: #6366f1;
            --member-primary-dark: #4f46e5;
            --member-accent: #22d3ee;
            --member-bg: #f8fafc;
            --member-card: #ffffff;
            --member-border: #e2e8f0;
            --member-text: #1e293b;
            --member-text-muted: #64748b;
        }
        body { background: var(--member-bg); color: var(--member-text); font-family: inherit; }
        /* تم دارک هم‌رنگ با داشبورد ادمین (Bootstrap dark) */
        body.theme-dark {
            --member-bg: #141a21;
            --member-card: #1c252e;
            --member-border: #2f3944;
            --member-text: #aab8c5;
            --member-text-muted: #afb9cf;
        }
        body.theme-dark .member-header { box-shadow: 0 1px 3px rgba(0,0,0,.4); }
        body.theme-dark .text-muted { color: var(--member-text-muted) !important; }
        body.theme-dark .text-body { color: var(--member-text) !important; }
        body.theme-dark .card-member,
        body.theme-dark .stat-card-member,
        body.theme-dark .quick-card { background: var(--member-card); border-color: var(--member-border); color: var(--member-text); }
        body.theme-dark .quick-card:hover { color: var(--member-text); }
        body.theme-dark .alert-member.alert-warning { background: rgba(240,147,78,.15); border: 1px solid rgba(240,147,78,.35); color: #f8ac59; }
        body.theme-dark .alert-member.alert-danger { background: rgba(233,103,103,.15); border: 1px solid rgba(233,103,103,.35); color: #e96767; }
        body.theme-dark .alert-member.alert-success { background: rgba(92,193,132,.15); border: 1px solid rgba(92,193,132,.35); color: #5cc184; }
        body.theme-dark .empty-state { color: var(--member-text-muted); }
        body.theme-dark .border-secondary { border-color: var(--member-border) !important; }
        body.theme-dark .member-dash { --member-bg: #141a21; --member-card: #1c252e; --member-border: #2f3944; }
        body.theme-dark .btn-outline-secondary { border-color: var(--member-border); color: var(--member-text-muted); }
        body.theme-dark .btn-outline-secondary:hover { background: var(--member-border); border-color: var(--member-border); color: var(--member-text); }
        .member-wrapper { min-height: 100vh; display: flex; flex-direction: column; }
        .member-header {
            background: var(--member-card);
            border-bottom: 1px solid var(--member-border);
            box-shadow: 0 1px 3px rgba(0,0,0,.04);
            position: sticky; top: 0; z-index: 100;
        }
        .member-header .brand { color: var(--member-primary); font-weight: 700; font-size: 1.1rem; }
        .member-header .brand:hover { color: var(--member-primary-dark); }
        .member-content { flex: 1; padding: 1.5rem 1rem; }
        @media (min-width: 768px) { .member-content { padding: 2rem 1.5rem; } }
        .btn-theme-toggle { width: 40px; height: 40px; padding: 0; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid var(--member-border); background: var(--member-card); color: var(--member-text); }
        .btn-theme-toggle:hover { background: var(--member-border); color: var(--member-text); border-color: var(--member-border); }
    </style>
</head>
<body id="member-body" class="">
<div class="member-wrapper">
    <header class="member-header py-3 px-3 px-md-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('dashboard.member') }}" class="text-decoration-none d-flex align-items-center gap-2 brand">
                    <span class="d-none d-sm-inline rounded-3 bg-primary bg-opacity-10 p-2">
                        <i class="ri-dashboard-2-line text-primary"></i>
                    </span>
                    <span>پنل شاگرد</span>
                </a>
                <div class="d-flex align-items-center gap-2 gap-md-3">
                    <button type="button" class="btn-theme-toggle" id="memberThemeToggle" title="تغییر تم (روشن / تاریک)" aria-label="تغییر تم">
                        <i class="ri-moon-line" id="themeIconLight"></i>
                        <i class="ri-sun-line d-none" id="themeIconDark"></i>
                    </button>
                    @if(isset($member) && $member)
                        <span class="d-none d-md-inline text-muted small">{{ $member->full_name }}</span>
                        <span class="d-none d-md-inline text-muted">|</span>
                        <a href="{{ route('member.logout') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-3">
                            <i class="ri-logout-box-line me-1"></i>خروج
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <main class="member-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
                <i class="ri-checkbox-circle-line me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-3" role="alert">
                <i class="ri-error-warning-line me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </main>
</div>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script>
(function() {
    var KEY = 'memberTheme';
    var body = document.getElementById('member-body');
    var btn = document.getElementById('memberThemeToggle');
    var iconLight = document.getElementById('themeIconLight');
    var iconDark = document.getElementById('themeIconDark');
    if (!body || !btn) return;
    function applyTheme(isDark) {
        if (isDark) {
            body.classList.add('theme-dark');
            if (iconLight) iconLight.classList.add('d-none');
            if (iconDark) iconDark.classList.remove('d-none');
        } else {
            body.classList.remove('theme-dark');
            if (iconLight) iconLight.classList.remove('d-none');
            if (iconDark) iconDark.classList.add('d-none');
        }
    }
    function getStored() {
        try { return localStorage.getItem(KEY); } catch (e) { return null; }
    }
    function setStored(val) {
        try { localStorage.setItem(KEY, val); } catch (e) { }
    }
    var stored = getStored();
    var isDark = stored === 'dark';
    applyTheme(isDark);
    btn.addEventListener('click', function() {
        isDark = !isDark;
        setStored(isDark ? 'dark' : 'light');
        applyTheme(isDark);
    });
})();
</script>
@yield('scripts')
</body>
</html>
