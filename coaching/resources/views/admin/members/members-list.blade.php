@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            لیست اعضا
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مدیریت باشگاه
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                لیست اعضا
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filters & Actions --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <form action="{{ route('members.list') }}" method="get">
                                <div class="row g-2 align-items-center">
                                    {{-- جستجو — موبایل فول، از md به بعد در یک ردیف با بقیه --}}
                                    <div class="col-12 col-md-6 col-xl-3">
                                                <div class="position-relative">
                                            <input autocomplete="off" class="form-control form-control-sm" name="search"
                                                   placeholder="نام، موبایل یا کد..."
                                                   type="search" value="{{ old('search', $request->search ?? '') }}"
                                                   style="padding-inline-end: 2.25rem;"/>
                                            <i class="ri-search-line position-absolute top-50 translate-middle-y text-muted opacity-75" style="right: 0.75rem; left: auto; font-size: 1rem; pointer-events: none;"></i>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-xl-2">
                                        <select class="form-select form-select-sm" name="status">
                                            <option value="">وضعیت</option>
                                            <option value="active" {{ ($request->status ?? '') === 'active' ? 'selected' : '' }}>فعال</option>
                                            <option value="expired" {{ ($request->status ?? '') === 'expired' ? 'selected' : '' }}>منقضی</option>
                                            <option value="suspended" {{ ($request->status ?? '') === 'suspended' ? 'selected' : '' }}>معلق</option>
                                            <option value="expiring_soon" {{ ($request->status ?? '') === 'expiring_soon' ? 'selected' : '' }}>نزدیک انقضا</option>
                                            </select>
                                        </div>
                                    <div class="col-6 col-md-4 col-xl-2">
                                        <select class="form-select form-select-sm" name="subscription_type">
                                                <option value="">نوع اشتراک</option>
                                            <option value="monthly" {{ ($request->subscription_type ?? '') === 'monthly' ? 'selected' : '' }}>ماهیانه</option>
                                            <option value="3month" {{ ($request->subscription_type ?? '') === '3month' ? 'selected' : '' }}>سه ماهه</option>
                                            <option value="6month" {{ ($request->subscription_type ?? '') === '6month' ? 'selected' : '' }}>۶ ماهه</option>
                                            <option value="yearly" {{ ($request->subscription_type ?? '') === 'yearly' ? 'selected' : '' }}>سالانه</option>
                                            </select>
                                        </div>
                                    <div class="col-6 col-md-4 col-xl-2">
                                        <select class="form-select form-select-sm" name="coach_id">
                                                <option value="">مربی</option>
                                            @foreach($coaches ?? [] as $c)
                                                <option value="{{ $c->id }}" {{ (string)($request->coach_id ?? '') === (string)$c->id ? 'selected' : '' }}>{{ $c->full_name }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-6 col-md-6 col-xl-3">
                                        <div class="d-flex flex-wrap gap-1 gap-sm-2 justify-content-end flex-nowrap">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="ri-filter-line me-1"></i>اعمال
                                            </button>
                                            @if($request->hasAny(['search', 'status', 'subscription_type', 'coach_id']))
                                                <a href="{{ route('members.list') }}" class="btn btn-outline-secondary btn-sm">پاک</a>
                                            @endif
                                            <button class="btn btn-outline-secondary btn-sm px-2" type="button" title="خروجی"><i class="ri-download-line"></i></button>
                                            <button class="btn btn-outline-secondary btn-sm px-2" type="button" title="چاپ"><i class="ri-printer-line"></i></button>
                                            <a href="{{ route('members.add') }}" class="btn btn-success btn-sm text-nowrap">
                                                <i class="ri-add-line me-1"></i>عضو جدید
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">کل اعضا</span>
                                    <h4 class="mb-0">{{ number_format($stats['total'] ?? 0) }} نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-primary rounded fs-24">
                                            <i class="ri-team-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">اشتراک‌های فعال</span>
                                    <h4 class="mb-0">{{ number_format($stats['active'] ?? 0) }} نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-success rounded fs-24">
                                            <i class="ri-checkbox-circle-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">منقضی در ۷ روز</span>
                                    <h4 class="mb-0">{{ number_format($stats['expiring_soon'] ?? 0) }} نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-danger rounded fs-24">
                                            <i class="ri-alarm-warning-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">حضور امروز</span>
                                    <h4 class="mb-0">{{ number_format($stats['today_attendance'] ?? 0) }} نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info rounded fs-24">
                                            <i class="ri-calendar-check-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Members Table --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                            <div>
                                <h4 class="card-title">
                                    لیست همه اعضا
                                </h4>
                            </div>
                            <div class="dropdown">
                                <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                                   data-bs-toggle="dropdown" href="#">
                                    <i class="ri-filter-line me-1"></i>
                                    فیلتر
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-sort-asc me-2"></i> قدیمی‌ترین
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-sort-desc me-2"></i> جدیدترین
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-calendar-close-line me-2"></i> نزدیک به انقضا
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-money-dollar-circle-line me-2"></i> پرداخت نشده
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheckAll" type="checkbox"/>
                                                <label class="form-check-label" for="customCheckAll">
                                                </label>
                                            </div>
                                        </th>
                                        <th>
                                            عضو
                                        </th>
                                        <th>
                                            موبایل
                                        </th>
                                        <th>
                                            مربی
                                        </th>
                                        <th>
                                            اشتراک
                                        </th>
                                        <th>
                                            وضعیت
                                        </th>
                                        <th>
                                            انقضا
                                        </th>
                                        <th>
                                            حضور
                                        </th>
                                        <th>
                                            اقدامات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($members as $member)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input member-checkbox" type="checkbox" value="{{ $member->id }}" name="members[]"/>
                                                <label class="form-check-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle" src="{{ $member->avatar_url }}"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details', $member) }}">
                                                        {{ $member->full_name }}
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">{{ $member->code }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $member->mobile }}</td>
                                        <td>
                                            @if($member->coach)
                                                <span class="badge bg-soft-primary">{{ $member->coach->full_name }}</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">{{ $member->subscription_type_label }}</span>
                                                <p class="text-muted mb-0 fs-12">اشتراک</p>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $statusConfig = [
                                                    'active' => ['class' => 'bg-success', 'icon' => 'ri-checkbox-circle-line', 'label' => 'فعال'],
                                                    'expired' => ['class' => 'bg-danger', 'icon' => 'ri-close-circle-line', 'label' => 'منقضی'],
                                                    'suspended' => ['class' => 'bg-secondary', 'icon' => 'ri-pause-circle-line', 'label' => 'معلق'],
                                                    'expiring_soon' => ['class' => 'bg-warning', 'icon' => 'ri-alarm-warning-line', 'label' => 'نزدیک انقضا'],
                                                ];
                                                $cfg = $statusConfig[$member->subscription_status] ?? ['class' => 'bg-secondary', 'icon' => 'ri-information-line', 'label' => $member->subscription_status];
                                            @endphp
                                            <span class="badge {{ $cfg['class'] }}">
                                                <i class="ri {{ $cfg['icon'] }} align-middle me-1"></i>{{ $cfg['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">{{ $member->subscription_expires_at_shamsi ?? '—' }}</span>
                                                <p class="mb-0 fs-12 {{ $member->subscription_status === 'expired' ? 'text-danger' : ($member->subscription_status === 'expiring_soon' ? 'text-danger' : 'text-muted') }}">{{ $member->expiry_label ?? '—' }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">{{ $member->attendance_sessions }}</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details', $member) }}" data-bs-toggle="tooltip" title="مشاهده جزئیات">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken"></iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#" data-bs-toggle="tooltip" title="ویرایش">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken"></iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-success btn-sm" href="#" data-bs-toggle="tooltip" title="ثبت پرداخت">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:wallet-broken"></iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-info btn-sm" href="{{ route('chat.index') }}?member={{ $member->id }}" data-bs-toggle="tooltip" title="ارسال پیام">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:chat-line-broken"></iconify-icon>
                                                </a>
                                                <button type="button" class="btn btn-soft-secondary btn-sm btn-copy-entry-link" data-entry-url="{{ $member->entry_url }}" data-bs-toggle="tooltip" title="کپی لینک ورود به پنل شاگرد">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:link-round-broken"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">عضوی یافت نشد.</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="text-muted">
                                        @if(isset($members) && $members->total() > 0)
                                            نمایش {{ $members->firstItem() }} تا {{ $members->lastItem() }} از {{ number_format($members->total()) }} عضو
                                        @else
                                            هیچ عضوی یافت نشد.
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    @if(isset($members) && $members->hasPages())
                                        <nav aria-label="صفحه‌بندی" class="float-lg-end">
                                            {{ $members->withQueryString()->links() }}
                                    </nav>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bulk Actions --}}
            <div class="row mt-3 d-none" id="bulkActions">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted" id="selectedCount">0 عضو انتخاب شده</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="ri-mail-line me-1"></i> ارسال پیام گروهی
                                    </button>
                                    <button class="btn btn-outline-success btn-sm">
                                        <i class="ri-notification-2-line me-1"></i> ارسال اعلان
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm" id="clearSelection">
                                        <i class="ri-close-line me-1"></i> لغو انتخاب
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Bulk selection functionality
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('customCheckAll');
            const memberCheckboxes = document.querySelectorAll('input.member-checkbox');
            const bulkActionsDiv = document.getElementById('bulkActions');
            const selectedCountSpan = document.getElementById('selectedCount');
            const clearSelectionBtn = document.getElementById('clearSelection');

            // Select all functionality
            selectAllCheckbox.addEventListener('change', function() {
                memberCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActions();
            });

            // Individual checkbox change
            memberCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActions);
            });

            // Clear selection
            clearSelectionBtn.addEventListener('click', function() {
                memberCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectAllCheckbox.checked = false;
                updateBulkActions();
            });

            function updateBulkActions() {
                const selectedCount = Array.from(memberCheckboxes).filter(cb => cb.checked).length;

                if (selectedCount > 0) {
                    bulkActionsDiv.classList.remove('d-none');
                    selectedCountSpan.textContent = selectedCount + ' عضو انتخاب شده';
                } else {
                    bulkActionsDiv.classList.add('d-none');
                }
            }

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Copy member entry link to clipboard
            document.querySelectorAll('.btn-copy-entry-link').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var url = this.getAttribute('data-entry-url');
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(url).then(function() {
                            var t = bootstrap.Tooltip.getInstance(btn);
                            if (t) { t.setContent({ '.tooltip-inner': 'لینک کپی شد!' }); t.show(); }
                            setTimeout(function() { if (t) t.hide(); }, 1500);
                        });
                    } else {
                        prompt('لینک ورود به پنل شاگرد (کپی کنید):', url);
                    }
                });
            });
        });
    </script>

    <style>
        .card-height-100 {
            height: 100%;
        }
        .bg-soft-primary {
            background-color: rgba(85, 110, 230, 0.15);
            color: #556ee6;
        }
        .bg-soft-success {
            background-color: rgba(45, 206, 137, 0.15);
            color: #2dce89;
        }
        .table > :not(caption) > * > * {
            vertical-align: middle;
        }
    </style>
@endsection
