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
    /* درخواست برنامه — UI/UX + ریسپانسیو */
    .request-program-card {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,.06);
    }
    .request-program-header {
        background: linear-gradient(135deg, rgba(99, 102, 241, .09) 0%, rgba(79, 70, 229, .05) 100%);
        padding: 1.5rem 1.5rem;
        border-bottom: 1px solid var(--member-border);
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .request-program-header .icon-box {
        width: 52px; height: 52px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--member-primary), var(--member-primary-dark));
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        box-shadow: 0 6px 16px -4px rgba(99, 102, 241, .35);
        flex-shrink: 0;
    }
    .request-program-header h5 { margin: 0; font-weight: 700; font-size: 1.1rem; color: var(--member-text, #1e293b); }
    .request-program-header p { margin: .3rem 0 0; font-size: .875rem; color: var(--member-text-muted, #64748b); }
    .request-program-body { padding: 1.5rem; }
    .request-program-desc {
        font-size: .9rem;
        line-height: 1.65;
        color: var(--member-text-muted, #64748b);
        margin-bottom: 1.5rem;
        padding: 1rem 1.25rem;
        background: var(--member-bg, #f8fafc);
        border-radius: 14px;
        border: 1px solid var(--member-border);
    }
    /* فرم */
    .request-form-card {
        background: var(--member-card);
        border: 1px solid var(--member-border);
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 2px 12px rgba(0,0,0,.04);
    }
    .request-form-card label { font-weight: 600; font-size: .875rem; color: var(--member-text, #1e293b); margin-bottom: .4rem; }
    .request-form-card .form-select, .request-form-card textarea {
        border-radius: 12px;
        border: 1px solid var(--member-border);
        font-size: .95rem;
        transition: border-color .2s, box-shadow .2s;
    }
    .request-form-card .form-select:focus, .request-form-card textarea:focus {
        border-color: var(--member-primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
        outline: none;
    }
    .request-form-card textarea { min-height: 96px; resize: vertical; max-height: 180px; }
    .request-form-card .btn-submit-request {
        padding: .75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: .95rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        transition: transform .15s, box-shadow .2s;
    }
    .request-form-card .btn-submit-request:hover { transform: translateY(-1px); box-shadow: 0 6px 20px -4px rgba(99, 102, 241, .4); }
    .request-form-card .btn-submit-request:active { transform: translateY(0); }
    /* انتخاب نوع برنامه با کارت */
    .request-type-label { font-size: .9rem; font-weight: 600; margin-bottom: .75rem; display: block; color: var(--member-text, #1e293b); }
    .request-type-options { display: flex; flex-wrap: wrap; gap: .75rem; }
    .request-type-option {
        flex: 1;
        min-width: 140px;
        position: relative;
        cursor: pointer;
        border: 2px solid var(--member-border);
        border-radius: 14px;
        padding: 1rem 1.25rem;
        transition: all .2s ease;
        display: flex;
        align-items: center;
        gap: .75rem;
    }
    .request-type-option:hover { border-color: var(--member-primary); background: rgba(99, 102, 241, .05); }
    .request-type-option input { position: absolute; opacity: 0; pointer-events: none; }
    .request-type-option input:checked + .request-type-option-inner { border-color: var(--member-primary); background: rgba(99, 102, 241, .08); box-shadow: 0 0 0 1px var(--member-primary); }
    .request-type-option-inner { border-radius: 12px; padding: .75rem 1rem; display: flex; align-items: center; gap: .75rem; width: 100%; border: 2px solid transparent; transition: all .2s; }
    .request-type-option .req-option-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
    .request-type-option.workout .req-option-icon { background: rgba(99, 102, 241, .12); color: var(--member-primary); }
    .request-type-option.nutrition .req-option-icon { background: rgba(34, 197, 94, .12); color: #16a34a; }
    .request-type-option .req-option-text strong { display: block; font-size: .95rem; }
    .request-type-option .req-option-text span { font-size: .8rem; color: var(--member-text-muted); }
    .request-form-card .form-group-desc { margin-top: 1.25rem; }
    .request-form-card .form-group-desc label { display: block; margin-bottom: .5rem; }
    body.theme-dark .request-type-label { color: var(--member-text); }
    body.theme-dark .request-type-option { border-color: var(--member-border); }
    body.theme-dark .request-type-option:hover { border-color: var(--member-primary); }
    body.theme-dark .request-type-option input:checked + .request-type-option-inner { border-color: var(--member-primary); background: rgba(99, 102, 241, .12); }
    /* عنوان لیست */
    .request-list-title { font-size: 1rem; font-weight: 600; color: var(--member-text, #1e293b); margin-bottom: 1rem; display: flex; align-items: center; gap: .5rem; }
    .request-list-title i { font-size: 1.1rem; color: var(--member-primary); }
    /* لیست درخواست‌ها */
    .request-list { list-style: none; padding: 0; margin: 0; border-radius: 16px; overflow: hidden; border: 1px solid var(--member-border); background: var(--member-card); }
    .request-list-item {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: .75rem 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--member-border);
        transition: background .2s ease;
    }
    .request-list-item:last-child { border-bottom: none; }
    .request-list-item:hover { background: var(--member-bg, #f8fafc); }
    .request-list-item .req-type-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .request-list-item.workout .req-type-icon { background: rgba(99, 102, 241, .12); color: var(--member-primary); }
    .request-list-item.nutrition .req-type-icon { background: rgba(34, 197, 94, .12); color: #16a34a; }
    .request-list-item .req-body { flex: 1; min-width: 0; }
    .request-list-item .req-body strong { display: block; font-size: .95rem; margin-bottom: .2rem; }
    .request-list-item .req-body p { font-size: .85rem; color: var(--member-text-muted); margin: 0; line-height: 1.45; }
    .request-list-item .req-meta-wrap { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
    .request-list-item .req-meta { font-size: .8rem; color: var(--member-text-muted); }
    .req-status-badge { font-size: .75rem; font-weight: 600; padding: .4rem .8rem; border-radius: 20px; white-space: nowrap; }
    .req-status-badge.pending { background: rgba(234, 179, 8, .18); color: #b45309; }
    .req-status-badge.in_progress { background: rgba(99, 102, 241, .18); color: var(--member-primary); }
    .req-status-badge.done { background: rgba(34, 197, 94, .18); color: #15803d; }
    /* حالت خالی */
    .request-empty-state { padding: 2rem 1.25rem; text-align: center; background: var(--member-bg, #f8fafc); border-radius: 16px; border: 1px dashed var(--member-border); }
    .request-empty-state i { font-size: 2.75rem; opacity: .35; color: var(--member-primary); display: block; margin-bottom: .75rem; }
    .request-empty-state p { font-size: .9rem; color: var(--member-text-muted); margin: 0; line-height: 1.5; }
    @media (max-width: 768px) {
        .request-program-body { padding: 1.25rem; }
        .request-program-desc { padding: .875rem 1rem; font-size: .875rem; margin-bottom: 1.25rem; }
        .request-form-card { padding: 1.25rem; }
        .request-form-card .btn-submit-request { width: 100%; }
        .request-list-item { padding: .875rem 1rem; gap: .5rem .75rem; }
        .request-list-item .req-body { order: 1; width: 100%; }
        .request-list-item .req-type-icon { width: 42px; height: 42px; font-size: 1.25rem; }
        .request-list-item .req-meta-wrap { order: 2; width: 100%; margin-right: calc(42px + .75rem); }
    }
    @media (max-width: 576px) {
        .request-program-header { padding: 1.25rem 1rem; }
        .request-program-header .icon-box { width: 46px; height: 46px; font-size: 1.35rem; }
        .request-program-header h5 { font-size: 1rem; }
        .request-list-item .req-meta-wrap { margin-right: 0; }
    }
    /* تم دارک — بخش درخواست برنامه */
    body.theme-dark .request-program-card,
    body.theme-dark .request-form-card,
    body.theme-dark .request-list { background: var(--member-card); border-color: var(--member-border); }
    body.theme-dark .request-program-card { box-shadow: 0 4px 20px rgba(0,0,0,.2); }
    body.theme-dark .request-program-header { background: linear-gradient(135deg, rgba(99, 102, 241, .15) 0%, rgba(79, 70, 229, .1) 100%); border-bottom-color: var(--member-border); }
    body.theme-dark .request-program-header h5 { color: var(--member-text); }
    body.theme-dark .request-program-header p { color: var(--member-text-muted); }
    body.theme-dark .request-program-desc { background: var(--member-bg); border-color: var(--member-border); color: var(--member-text-muted); }
    body.theme-dark .request-form-card { box-shadow: 0 2px 12px rgba(0,0,0,.15); }
    body.theme-dark .request-form-card label { color: var(--member-text); }
    body.theme-dark .request-form-card .form-select,
    body.theme-dark .request-form-card .form-control { background: var(--member-bg); color: var(--member-text); border-color: var(--member-border); }
    body.theme-dark .request-form-card .form-control::placeholder { color: var(--member-text-muted); opacity: .8; }
    body.theme-dark .request-form-card .form-select:focus,
    body.theme-dark .request-form-card .form-control:focus { background: var(--member-bg); border-color: var(--member-primary); box-shadow: 0 0 0 3px rgba(99, 102, 241, .25); color: var(--member-text); }
    body.theme-dark .request-list-title { color: var(--member-text); }
    body.theme-dark .request-list-title i { color: var(--member-primary); }
    body.theme-dark .request-list-item { border-bottom-color: var(--member-border); }
    body.theme-dark .request-list-item:hover { background: var(--member-bg); }
    body.theme-dark .request-list-item .req-body strong { color: var(--member-text); }
    body.theme-dark .request-list-item .req-body p { color: var(--member-text-muted); }
    body.theme-dark .request-list-item .req-meta { color: var(--member-text-muted); }
    body.theme-dark .req-status-badge.pending { background: rgba(234, 179, 8, .25); color: #facc15; }
    body.theme-dark .req-status-badge.in_progress { background: rgba(99, 102, 241, .3); color: #a5b4fc; }
    body.theme-dark .req-status-badge.done { background: rgba(34, 197, 94, .25); color: #4ade80; }
    body.theme-dark .request-empty-state { background: var(--member-bg); border-color: var(--member-border); }
    body.theme-dark .request-empty-state i { color: var(--member-primary); opacity: .5; }
    body.theme-dark .request-empty-state p { color: var(--member-text-muted); }
</style>
@endsection

@section('content')
<div class="container-fluid member-dash">

    @if(session('success'))
    <div class="alert alert-success alert-member d-flex align-items-center mb-4" role="alert">
        <i class="ri-checkbox-circle-fill me-2 fs-5"></i>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-member d-flex align-items-center mb-4" role="alert">
        <i class="ri-error-warning-fill me-2 fs-5"></i>
        {{ session('error') }}
    </div>
    @endif

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

    {{-- درخواست برنامه + یادآوری --}}
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="request-program-card">
                <div class="request-program-header">
                    <div class="icon-box">
                        <i class="ri-file-list-3-line"></i>
                    </div>
                    <div>
                        <h5>درخواست برنامه</h5>
                        <p class="mb-0">برنامه تمرینی یا تغذیه رو از مربیت درخواست کن</p>
                    </div>
                </div>
                <div class="request-program-body">
                    <p class="request-program-desc">
                        نوع برنامه و در صورت تمایل توضیحات (هدف، محدودیت، زمان) را وارد کن. درخواست ثبت می‌شود و مربی در اسرع وقت آن را بررسی و برنامه را آماده می‌کند.
                    </p>
                    <form action="{{ route('member.program-request.store') }}" method="post" class="request-form-card mb-4" id="programRequestForm">
                        @csrf
                        <label class="request-type-label">نوع برنامه</label>
                        <div class="request-type-options">
                            <label class="request-type-option workout">
                                <input type="radio" name="type" value="workout" {{ old('type', '') === 'workout' ? 'checked' : '' }} required>
                                <span class="request-type-option-inner">
                                    <span class="req-option-icon"><i class="ri-run-line"></i></span>
                                    <span class="req-option-text">
                                        <strong>برنامه تمرینی</strong>
                                        <span>ورزش و حرکات</span>
                                    </span>
                                </span>
                            </label>
                            <label class="request-type-option nutrition">
                                <input type="radio" name="type" value="nutrition" {{ old('type') === 'nutrition' ? 'checked' : '' }}>
                                <span class="request-type-option-inner">
                                    <span class="req-option-icon"><i class="ri-restaurant-line"></i></span>
                                    <span class="req-option-text">
                                        <strong>برنامه تغذیه</strong>
                                        <span>رژیم و وعده‌ها</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        @error('type')<small class="text-danger d-block mt-1">{{ $message }}</small>@enderror
                        <div class="form-group-desc">
                            <label for="req-body" class="form-label">توضیحات (اختیاری)</label>
                            <textarea name="body" id="req-body" class="form-control" placeholder="مثلاً: هدف کاهش وزن، ۳ روز در هفته، بدون باشگاه">{{ old('body') }}</textarea>
                            @error('body')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-submit-request">
                                <i class="ri-send-plane-line me-1"></i>ثبت درخواست
                            </button>
                        </div>
                    </form>
                    <h6 class="request-list-title"><i class="ri-list-check-2"></i>درخواست‌های من</h6>
                    @if(isset($programRequests) && $programRequests->isNotEmpty())
                        <ul class="request-list">
                            @foreach($programRequests as $req)
                            <li class="request-list-item {{ $req->type }}">
                                <div class="req-type-icon">
                                    @if($req->type === 'workout')<i class="ri-run-line"></i>@else<i class="ri-restaurant-line"></i>@endif
                                </div>
                                <div class="req-body">
                                    <strong>{{ $req->type_label }}</strong>
                                    @if($req->body)<p class="mb-0">{{ Str::limit($req->body, 55) }}</p>@endif
                                </div>
                                <div class="req-meta-wrap">
                                    <span class="req-status-badge {{ $req->status }}">{{ $req->status_label }}</span>
                                    <span class="req-meta">{{ $req->created_at->diffForHumans() }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="request-empty-state">
                            <i class="ri-file-list-3-line"></i>
                            <p>هنوز درخواستی ثبت نکردی. با فرم بالا اولین درخواستت رو بفرست.</p>
                        </div>
                    @endif
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
