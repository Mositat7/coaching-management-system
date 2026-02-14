@extends('layouts.member', ['member' => $member])

@section('title', 'داشبورد | پنل شاگرد')

@section('head')
<style>
    .member-dash { --member-primary: #6366f1; --member-primary-dark: #4f46e5; --member-bg: #f8fafc; --member-card: #fff; --member-border: #e2e8f0; }
    .hero-member {
        background: linear-gradient(135deg, var(--member-primary) 0%, var(--member-primary-dark) 50%, #4338ca 100%);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 20px 40px -15px rgba(99, 102, 241, .4);
    }
    .hero-member::before {
        content: '';
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: radial-gradient(circle at 30% 20%, rgba(255,255,255,.12) 0%, transparent 50%);
        pointer-events: none;
    }
    .hero-member .content { position: relative; z-index: 1; }
    .hero-avatar {
        width: 64px; height: 64px;
        border-radius: 16px;
        background: rgba(255,255,255,.2);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.75rem; color: #fff;
    }
    .stat-card-member {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        transition: transform .2s, box-shadow .2s;
        overflow: hidden;
    }
    .stat-card-member:hover { transform: translateY(-4px); box-shadow: 0 12px 24px -10px rgba(0,0,0,.12); }
    .stat-card-member .icon-wrap {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
    }
    .quick-card {
        display: block;
        text-decoration: none;
        color: inherit;
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        transition: all .25s ease;
        overflow: hidden;
    }
    .quick-card:hover {
        border-color: var(--member-primary);
        box-shadow: 0 12px 28px -10px rgba(99, 102, 241, .25);
        color: inherit;
        transform: translateY(-2px);
    }
    .quick-card .quick-icon {
        width: 56px; height: 56px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.75rem;
    }
    .card-member {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,.04);
    }
    .progress-ring-wrap {
        width: 72px; height: 72px;
        position: relative;
        display: flex; align-items: center; justify-content: center;
    }
    .progress-ring-wrap .ring-text { font-size: .9rem; font-weight: 700; color: #fff; position: relative; z-index: 1; }
    .alert-member { border-radius: 12px; border: none; }
    .empty-state { padding: 2.5rem 1rem; text-align: center; color: #64748b; }
    .empty-state i { font-size: 3rem; opacity: .4; }
</style>
@endsection

@section('content')
<div class="container-fluid member-dash">

    {{-- Hero: خوش‌آمد + آواتار + وضعیت اشتراک --}}
    <div class="hero-member p-4 p-md-5 mb-4">
        <div class="content">
            <div class="row align-items-center">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="hero-avatar">
                        @if($member->avatar_url)
                            <img src="{{ $member->avatar_url }}" alt="" class="rounded-3 w-100 h-100 object-fit-cover">
                        @else
                            <i class="ri-user-line"></i>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <h1 class="h4 mb-1 text-white fw-bold">سلام، {{ $member->full_name }}</h1>
                    <p class="text-white mb-0 opacity-90 small">خوش اومدی به پنل شخصی‌ات؛ برنامه‌ات اینجاست.</p>
                </div>
                <div class="col-12 col-md-auto mt-3 mt-md-0 text-md-end">
                    @php
                        $statusConfig = [
                            'active' => ['label' => 'عضویت فعال', 'bg' => 'rgba(34,197,94,.25)', 'icon' => 'ri-checkbox-circle-fill'],
                            'expiring_soon' => ['label' => 'نزدیک به انقضا', 'bg' => 'rgba(234,179,8,.3)', 'icon' => 'ri-time-line'],
                            'expired' => ['label' => 'منقضی شده', 'bg' => 'rgba(239,68,68,.25)', 'icon' => 'ri-error-warning-fill'],
                            'suspended' => ['label' => 'معلق', 'bg' => 'rgba(100,116,139,.2)', 'icon' => 'ri-pause-circle-line'],
                        ];
                        $cfg = $statusConfig[$member->subscription_status] ?? ['label' => '—', 'bg' => 'rgba(100,116,139,.2)', 'icon' => 'ri-information-line'];
                    @endphp
                    <span class="badge px-3 py-2 rounded-3 text-white d-inline-flex align-items-center gap-1" style="background: {{ $cfg['bg'] }};">
                        <i class="{{ $cfg['icon'] }}"></i>
                        {{ $cfg['label'] }}
                    </span>
                    @if($member->expiry_label)
                        <p class="text-white mb-0 mt-2 small opacity-90">{{ $member->expiry_label }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- کارت‌های آمار --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="stat-card-member h-100 p-3 p-md-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-wrap bg-primary bg-opacity-10 text-primary">
                        <i class="ri-calendar-check-line"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted small mb-0">نوع اشتراک</p>
                        <h6 class="mb-0 fw-semibold text-truncate">{{ $member->subscription_type_label }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card-member h-100 p-3 p-md-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-wrap bg-success bg-opacity-10 text-success">
                        <i class="ri-fire-line"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted small mb-0">جلسات انجام‌شده</p>
                        <h6 class="mb-0 fw-semibold">{{ $member->attendance_sessions }} جلسه</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card-member h-100 p-3 p-md-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-wrap bg-info bg-opacity-10 text-info">
                        <i class="ri-user-star-line"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted small mb-0">مربی</p>
                        <h6 class="mb-0 fw-semibold text-truncate">{{ $member->coach?->full_name ?? '—' }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card-member h-100 p-3 p-md-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-wrap bg-secondary bg-opacity-10 text-secondary">
                        <i class="ri-id-card-line"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted small mb-0">کد عضویت</p>
                        <h6 class="mb-0 fw-semibold">{{ $member->code }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- هشدار انقضا --}}
    @if($member->subscription_status === 'expiring_soon' || $member->subscription_status === 'expired')
    <div class="alert alert-member {{ $member->subscription_status === 'expired' ? 'alert-danger' : 'alert-warning' }} mb-4 d-flex align-items-center" role="alert">
        <i class="ri-alarm-warning-line me-3 fs-4"></i>
        <div>
            @if($member->subscription_status === 'expired')
                <strong>اشتراک منقضی شده.</strong> برای تمدید با مربی یا باشگاه تماس بگیرید.
            @else
                <strong>اشتراک {{ $member->expiry_label }}</strong> — در صورت نیاز تمدید کنید.
            @endif
        </div>
    </div>
    @endif

    {{-- دسترسی سریع --}}
    <h5 class="mb-3 fw-semibold">دسترسی سریع</h5>
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-4">
            <a href="#" class="quick-card p-4 d-flex align-items-center gap-3">
                <div class="quick-icon bg-primary bg-opacity-10 text-primary">
                    <i class="ri-run-line"></i>
                </div>
                <div class="flex-grow-1 text-start">
                    <h6 class="mb-0 fw-semibold">برنامه تمرینی</h6>
                    <small class="text-muted">برنامه هفتگی و حرکات</small>
                </div>
                <i class="ri-arrow-left-line text-muted"></i>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="#" class="quick-card p-4 d-flex align-items-center gap-3">
                <div class="quick-icon bg-success bg-opacity-10 text-success">
                    <i class="ri-restaurant-line"></i>
                </div>
                <div class="flex-grow-1 text-start">
                    <h6 class="mb-0 fw-semibold">برنامه تغذیه</h6>
                    <small class="text-muted">وعده‌ها و کالری</small>
                </div>
                <i class="ri-arrow-left-line text-muted"></i>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('member.chat') }}" class="quick-card p-4 d-flex align-items-center gap-3">
                <div class="quick-icon bg-info bg-opacity-10 text-info">
                    <i class="ri-message-3-line"></i>
                </div>
                <div class="flex-grow-1 text-start">
                    <h6 class="mb-0 fw-semibold">تماس با مربی</h6>
                    <small class="text-muted">سوال یا درخواست برنامه</small>
                </div>
                <i class="ri-arrow-left-line text-muted"></i>
            </a>
        </div>
    </div>

    {{-- برنامه امروز + یادآوری --}}
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card-member">
                <div class="p-4 border-bottom border-secondary border-opacity-10">
                    <h5 class="mb-0 fw-semibold">برنامه امروز</h5>
                </div>
                <div class="empty-state">
                    <i class="ri-file-list-3-line d-block mb-3"></i>
                    <p class="mb-0">وقتی مربیت برنامه‌ای برات ثبت کنه، اینجا نمایش داده می‌شه.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-member">
                <div class="p-4 border-bottom border-secondary border-opacity-10">
                    <h5 class="mb-0 fw-semibold">یادآوری</h5>
                </div>
                <div class="p-4">
                    @if($member->subscription_status === 'expiring_soon')
                        <div class="alert alert-warning alert-member py-3 small mb-3">
                            <i class="ri-time-line me-2"></i>
                            {{ $member->expiry_label }} — تمدید را فراموش نکنید.
                        </div>
                    @endif
                    <div class="alert alert-success alert-member py-3 small mb-0">
                        <i class="ri-lightbulb-line me-2"></i>
                        با همین نظم ادامه بده!
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
