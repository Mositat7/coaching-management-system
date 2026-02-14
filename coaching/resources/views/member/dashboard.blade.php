@extends('layouts.member', ['member' => $member])

@section('title', 'داشبورد | پنل شاگرد')

@section('head')
<style>
    .stat-card { transition: transform .15s; }
    .stat-card:hover { transform: translateY(-2px); }
    .quick-action-card { text-decoration: none; color: inherit; display: block; transition: all .2s; border: 1px solid var(--bs-border-color); }
    .quick-action-card:hover { border-color: var(--bs-primary); box-shadow: 0 4px 12px rgba(0,0,0,.08); color: inherit; }
</style>
@endsection

@section('content')
<div class="container-fluid">

    {{-- هیرو: خوش‌آمد + وضعیت اشتراک --}}
    <div class="member-hero p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="mb-1 text-white">سلام، {{ $member->full_name }} 👋</h4>
                <p class="text-white mb-0 opacity-90">خوش اومدی به پنل شخصی‌ات</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                @php
                    $statusConfig = [
                        'active' => ['label' => 'عضویت فعال', 'class' => 'bg-success bg-opacity-25'],
                        'expiring_soon' => ['label' => 'نزدیک به انقضا', 'class' => 'bg-warning bg-opacity-25'],
                        'expired' => ['label' => 'منقضی شده', 'class' => 'bg-danger bg-opacity-25'],
                        'suspended' => ['label' => 'معلق', 'class' => 'bg-secondary bg-opacity-25'],
                    ];
                    $cfg = $statusConfig[$member->subscription_status] ?? ['label' => '—', 'class' => 'bg-secondary bg-opacity-25'];
                @endphp
                <span class="badge {{ $cfg['class'] }} text-white px-3 py-2">{{ $cfg['label'] }}</span>
                @if($member->expiry_label)
                    <p class="text-white mb-0 mt-1 small opacity-90">{{ $member->expiry_label }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- کارت‌های آمار --}}
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded bg-primary bg-opacity-10 p-3">
                        <i class="ri-calendar-check-line text-primary fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">نوع اشتراک</p>
                        <h5 class="mb-0">{{ $member->subscription_type_label }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded bg-success bg-opacity-10 p-3">
                        <i class="ri-fire-line text-success fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">جلسات انجام‌شده</p>
                        <h5 class="mb-0">{{ $member->attendance_sessions }} جلسه</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded bg-info bg-opacity-10 p-3">
                        <i class="ri-user-star-line text-info fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">مربی</p>
                        <h5 class="mb-0">{{ $member->coach?->full_name ?? '—' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded bg-secondary bg-opacity-10 p-3">
                        <i class="ri-id-card-line text-secondary fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">کد عضویت</p>
                        <h5 class="mb-0">{{ $member->code }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- هشدار انقضا --}}
    @if($member->subscription_status === 'expiring_soon' || $member->subscription_status === 'expired')
    <div class="alert {{ $member->subscription_status === 'expired' ? 'alert-danger' : 'alert-warning' }} border-0 shadow-sm mb-4">
        <i class="ri-alarm-warning-line me-2"></i>
        @if($member->subscription_status === 'expired')
            اشتراک شما منقضی شده. برای تمدید با مربی یا باشگاه تماس بگیر.
        @else
            اشتراک شما {{ $member->expiry_label }} — در صورت نیاز تمدید کن.
        @endif
    </div>
    @endif

    {{-- دسترسی سریع --}}
    <h5 class="mb-3">دسترسی سریع</h5>
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-4">
            <a href="#" class="card quick-action-card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded-circle bg-primary bg-opacity-10 p-3">
                        <i class="ri-run-line text-primary fs-4"></i>
                    </div>
                    <div class="flex-grow-1 text-start">
                        <h6 class="mb-0">برنامه تمرینی</h6>
                        <small class="text-muted">برنامه هفتگی و حرکات</small>
                    </div>
                    <i class="ri-arrow-left-line text-muted"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="#" class="card quick-action-card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded-circle bg-success bg-opacity-10 p-3">
                        <i class="ri-restaurant-line text-success fs-4"></i>
                    </div>
                    <div class="flex-grow-1 text-start">
                        <h6 class="mb-0">برنامه تغذیه</h6>
                        <small class="text-muted">وعده‌ها و کالری</small>
                    </div>
                    <i class="ri-arrow-left-line text-muted"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="#" class="card quick-action-card border-0 shadow-sm h-100 rounded-3 overflow-hidden">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="avatar rounded-circle bg-info bg-opacity-10 p-3">
                        <i class="ri-message-3-line text-info fs-4"></i>
                    </div>
                    <div class="flex-grow-1 text-start">
                        <h6 class="mb-0">تماس با مربی</h6>
                        <small class="text-muted">سوال یا درخواست برنامه</small>
                    </div>
                    <i class="ri-arrow-left-line text-muted"></i>
                </div>
            </a>
        </div>
    </div>

    {{-- خلاصه امروز (پلیس‌holder) --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">برنامه امروز</h5>
                </div>
                <div class="card-body text-center py-5 text-muted">
                    <i class="ri-file-list-3-line fs-1 opacity-50 d-block mb-2"></i>
                    <p class="mb-0">وقتی مربیت برنامه‌ای برات ثبت کنه، اینجا نمایش داده می‌شه.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">یادآوری</h5>
                </div>
                <div class="card-body">
                    @if($member->subscription_status === 'expiring_soon')
                        <div class="alert alert-warning py-2 small mb-2">
                            ⏳ {{ $member->expiry_label }} — تمدید را فراموش نکن.
                        </div>
                    @endif
                    <div class="alert alert-success py-2 small mb-0">
                        💪 با همین نظم ادامه بده!
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
