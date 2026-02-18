@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <!-- عنوان صفحه -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <h4 class="mb-0 fw-semibold">
                                <i class="ri-shopping-cart-line me-2"></i>
                                سفارشات / درخواست برنامه
                            </h4>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.index') }}">داشبورد</a>
                                </li>
                                <li class="breadcrumb-item active">سفارشات</li>
                            </ol>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-soft-primary btn-sm">
                                <i class="ri-refresh-line me-1"></i> بروزرسانی
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- یک کارت با دو تب: درخواست‌های برنامه از شاگرد | سفارشات -->
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-header border-0 bg-transparent pt-3 px-3">
                    <ul class="nav nav-tabs card-header-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-program-requests" role="tab">
                                <i class="ri-file-list-3-line me-1"></i>درخواست‌های برنامه از شاگرد
                                @if(isset($programRequests) && $programRequests->total() > 0)
                                    <span class="badge bg-primary ms-1">{{ $programRequests->total() }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-orders" role="tab">
                                <i class="ri-shopping-cart-line me-1"></i>سفارشات
                                @if(($stats['total'] ?? 0) > 0)
                                    <span class="badge bg-secondary ms-1">{{ $stats['total'] }}</span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <!-- تب درخواست‌های برنامه از پنل شاگرد -->
                        <div class="tab-pane fade show active" id="tab-program-requests" role="tabpanel">
                            @php $ps = $prStats ?? ['pending' => 0, 'in_progress' => 0, 'done' => 0]; @endphp
                            <div class="d-flex flex-wrap gap-3 align-items-center px-3 py-2 border-bottom bg-light bg-opacity-50">
                                <span class="text-muted small">وضعیت:</span>
                                <span class="badge bg-warning-subtle text-warning"><i class="ri-time-line me-1"></i>در انتظار {{ $ps['pending'] }}</span>
                                <span class="badge bg-info-subtle text-info"><i class="ri-loader-4-line me-1"></i>در حال تهیه {{ $ps['in_progress'] }}</span>
                                <span class="badge bg-success-subtle text-success"><i class="ri-checkbox-circle-line me-1"></i>انجام‌شده {{ $ps['done'] }}</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>شاگرد</th>
                                            <th>نوع</th>
                                            <th>توضیحات</th>
                                            <th>تاریخ</th>
                                            <th style="width: 180px;">وضعیت</th>
                                            <th class="text-center" style="width: 80px;">چت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($programRequests as $pr)
                                        @php
                                            $statusMap = [
                                                'pending' => ['badge' => 'bg-warning-subtle text-warning', 'label' => 'در انتظار', 'icon' => 'ri-time-line'],
                                                'in_progress' => ['badge' => 'bg-info-subtle text-info', 'label' => 'در حال تهیه', 'icon' => 'ri-loader-4-line'],
                                                'done' => ['badge' => 'bg-success-subtle text-success', 'label' => 'انجام شد', 'icon' => 'ri-checkbox-circle-line'],
                                            ];
                                            $sc = $statusMap[$pr->status] ?? ['badge' => 'bg-secondary-subtle text-secondary', 'label' => $pr->status, 'icon' => 'ri-circle-line'];
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">{{ $pr->member?->full_name ?? '—' }}</div>
                                                @if($pr->member?->mobile)
                                                    <small class="text-muted">{{ $pr->member->mobile }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pr->type === 'workout')
                                                    <span class="badge bg-primary-subtle text-primary">برنامه تمرینی</span>
                                                @else
                                                    <span class="badge bg-success-subtle text-success">برنامه تغذیه</span>
                                                @endif
                                            </td>
                                            <td><span class="text-muted">{{ Str::limit($pr->body, 50) ?: '—' }}</span></td>
                                            <td>{{ $pr->created_at?->format('Y/m/d H:i') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-status {{ $sc['badge'] }} btn-status-trigger" data-bs-toggle="modal" data-bs-target="#statusChangeModal" data-request-id="{{ $pr->id }}" data-current="{{ $pr->status }}" title="تغییر وضعیت">
                                                    <i class="{{ $sc['icon'] }} me-1 opacity-75"></i>
                                                    <span>{{ $sc['label'] }}</span>
                                                    <i class="ri-arrow-left-s-line ms-1 small opacity-75"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                @if($pr->member_id)
                                                <a href="{{ route('chat.index') }}?member={{ $pr->member_id }}" class="btn btn-soft-info btn-sm" title="چت با {{ $pr->member?->full_name }}">
                                                    <i class="ri-message-3-line"></i>
                                                </a>
                                                @else
                                                <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-5">
                                                <i class="ri-file-list-3-line d-block fs-1 mb-2 opacity-50"></i>
                                                هنوز درخواست برنامه‌ای از پنل شاگرد ثبت نشده است.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if(isset($programRequests) && $programRequests->hasPages())
                                <div class="card-footer bg-transparent py-2 border-0">
                                    {{ $programRequests->withQueryString()->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- مودال تغییر وضعیت (همیشه در وسط صفحه، بدون اسکرول) -->
                        <div class="modal fade" id="statusChangeModal" tabindex="-1" aria-labelledby="statusChangeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-update-url="{{ url('Orders/program-request') }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title" id="statusChangeModalLabel">
                                            <i class="ri-settings-3-line me-2 text-primary"></i>تغییر وضعیت درخواست
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                                    </div>
                                    <div class="modal-body pt-2">
                                        <p class="text-muted small mb-3">یکی از وضعیت‌ها را انتخاب کنید:</p>
                                        <div class="d-flex flex-column gap-2" id="statusModalForms">
                                            <form method="post" class="pr-status-form-modal mb-0" data-status="pending">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="pending">
                                                <button type="submit" class="btn btn-status-option w-100 d-flex align-items-center gap-2 py-2 px-3 rounded-3 border text-start btn-pending">
                                                    <i class="ri-time-line fs-5 text-warning"></i>
                                                    <span>در انتظار</span>
                                                </button>
                                            </form>
                                            <form method="post" class="pr-status-form-modal mb-0" data-status="in_progress">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="in_progress">
                                                <button type="submit" class="btn btn-status-option w-100 d-flex align-items-center gap-2 py-2 px-3 rounded-3 border text-start btn-inprogress">
                                                    <i class="ri-loader-4-line fs-5 text-info"></i>
                                                    <span>در حال تهیه</span>
                                                </button>
                                            </form>
                                            <form method="post" class="pr-status-form-modal mb-0" data-status="done">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="done">
                                                <button type="submit" class="btn btn-status-option w-100 d-flex align-items-center gap-2 py-2 px-3 rounded-3 border text-start btn-done">
                                                    <i class="ri-checkbox-circle-line fs-5 text-success"></i>
                                                    <span>انجام شد</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تب سفارشات -->
                        <div class="tab-pane fade" id="tab-orders" role="tabpanel">
                            <div class="p-3 border-bottom">
                                <form action="{{ route('orders.index') }}" method="get" class="row g-2 align-items-center">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ri-search-line text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0"
                                       placeholder="جستجو بر اساس نام شاگرد، توضیح، هدف..."
                                       name="q" value="{{ request('q') }}">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex flex-wrap justify-content-lg-end gap-2">
                                <select class="form-select form-select-sm w-auto" name="type">
                                    <option value="">نوع درخواست</option>
                                    <option value="workout" {{ request('type') === 'workout' ? 'selected' : '' }}>برنامه تمرینی</option>
                                    <option value="nutrition" {{ request('type') === 'nutrition' ? 'selected' : '' }}>برنامه تغذیه</option>
                                </select>
                                <select class="form-select form-select-sm w-auto" name="status">
                                    <option value="">همه وضعیت‌ها</option>
                                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>در انتظار</option>
                                    <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>تایید شده</option>
                                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>رد شده</option>
                                </select>
                                <select class="form-select form-select-sm w-auto" name="priority">
                                    <option value="">اولویت</option>
                                    <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>بالا</option>
                                    <option value="normal" {{ request('priority') === 'normal' ? 'selected' : '' }}>معمولی</option>
                                    <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>کم</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">اعمال</button>
                            </div>
                        </div>
                                </form>
                            </div>

                            <!-- لیست سفارشات -->
                    <!-- دسکتاپ: جدول -->
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>شاگرد</th>
                                <th>نوع درخواست</th>
                                <th>هدف</th>
                                <th>تاریخ ثبت</th>
                                <th>وضعیت</th>
                                <th>اولویت</th>
                                <th class="text-end">اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs rounded-circle bg-light d-flex align-items-center justify-content-center me-2">
                                                <i class="ri-user-line text-muted"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{ $order->member_name }}</div>
                                                <small class="text-muted">{{ $order->member_phone ?? '' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($order->type === 'workout')
                                            <span class="badge bg-primary-subtle text-primary">برنامه تمرینی</span>
                                        @else
                                            <span class="badge bg-success-subtle text-success">برنامه تغذیه</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->goal ?? '—' }}</td>
                                    <td>{{ $order->created_at?->format('Y/m/d H:i') }}</td>
                                    <td>
                                        @php
                                            $status = $order->status;
                                            $map = [
                                                'pending' => ['badge' => 'bg-warning-subtle text-warning', 'label' => 'در انتظار'],
                                                'accepted' => ['badge' => 'bg-success-subtle text-success', 'label' => 'تایید شده'],
                                                'rejected' => ['badge' => 'bg-danger-subtle text-danger', 'label' => 'رد شده'],
                                            ];
                                            $cfg = $map[$status] ?? ['badge' => 'bg-secondary-subtle text-secondary', 'label' => 'نامشخص'];
                                        @endphp
                                        <span class="badge {{ $cfg['badge'] }}">{{ $cfg['label'] }}</span>
                                    </td>
                                    <td>
                                        @if($order->priority === 'high')
                                            <span class="badge bg-danger-subtle text-danger">بالا</span>
                                        @elseif($order->priority === 'low')
                                            <span class="badge bg-secondary-subtle text-secondary">کم</span>
                                        @else
                                            <span class="badge bg-info-subtle text-info">معمولی</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-soft-primary">
                                                <i class="ri-eye-line me-1"></i>جزئیات
                                            </a>
                                            <button type="button" class="btn btn-soft-success">
                                                <i class="ri-check-line me-1"></i>قبول
                                            </button>
                                            <button type="button" class="btn btn-soft-danger">
                                                <i class="ri-close-line me-1"></i>رد
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        هنوز درخواستی ثبت نشده است.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(isset($orders) && $orders->hasPages())
                    <div class="card-footer bg-transparent border-0 py-2">
                        {{ $orders->withQueryString()->links() }}
                    </div>
                    @endif

                    <!-- موبایل: کارت‌ها -->
                    <div class="d-md-none p-2">
                        @forelse($orders as $order)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div>
                                            <div class="fw-semibold">{{ $order->member_name }}</div>
                                            <small class="text-muted">{{ $order->created_at?->format('Y/m/d H:i') }}</small>
                                        </div>
                                        @php
                                            $status = $order->status;
                                            $map = [
                                                'pending' => ['badge' => 'bg-warning-subtle text-warning', 'label' => 'در انتظار'],
                                                'accepted' => ['badge' => 'bg-success-subtle text-success', 'label' => 'تایید شده'],
                                                'rejected' => ['badge' => 'bg-danger-subtle text-danger', 'label' => 'رد شده'],
                                            ];
                                            $cfg = $map[$status] ?? ['badge' => 'bg-secondary-subtle text-secondary', 'label' => 'نامشخص'];
                                        @endphp
                                        <span class="badge {{ $cfg['badge'] }}">{{ $cfg['label'] }}</span>
                                    </div>
                                    <div class="d-flex flex-wrap gap-1 small mb-2">
                                        @if($order->type === 'workout')
                                            <span class="badge bg-primary-subtle text-primary">برنامه تمرینی</span>
                                        @else
                                            <span class="badge bg-success-subtle text-success">برنامه تغذیه</span>
                                        @endif
                                        @if($order->priority === 'high')
                                            <span class="badge bg-danger-subtle text-danger">اولویت بالا</span>
                                        @endif
                                    </div>
                                    <p class="text-muted small mb-2">
                                        {{ \Illuminate\Support\Str::limit($order->description ?? 'بدون توضیح', 120) }}
                                    </p>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-soft-primary btn-sm w-100">
                                            <i class="ri-eye-line me-1"></i>مشاهده
                                        </a>
                                        <button type="button" class="btn btn-soft-success btn-sm w-100">
                                            <i class="ri-check-line me-1"></i>قبول
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted py-4">
                                هنوز درخواستی ثبت نشده است.
                            </div>
                        @endforelse
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
<style>
.nav-tabs-custom .nav-link { border: none; color: #6c757d; font-weight: 500; padding: .75rem 1rem; border-radius: 8px; }
.nav-tabs-custom .nav-link:hover { color: var(--vz-primary); }
.nav-tabs-custom .nav-link.active { color: var(--vz-primary); background: rgba(var(--vz-primary-rgb), .08); }
/* وضعیت = دکمه‌ی دراپ‌داون با ظاهر بج */
.status-dropdown .btn-status {
    font-size: .8rem;
    font-weight: 600;
    padding: .35rem .75rem;
    border-radius: 20px;
    border: none;
    min-width: 130px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: transform .15s, box-shadow .15s;
}
.btn-status:hover, .btn-status-trigger:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,.12); }
.btn-status-trigger .ri-arrow-left-s-line { font-size: .9rem; }
/* دکمه‌های وضعیت داخل مودال */
.btn-status-option { transition: background .15s, border-color .15s; }
.btn-status-option:hover { background: var(--vz-light); }
.btn-pending:hover { border-color: rgba(var(--vz-warning-rgb), .5) !important; background: rgba(var(--vz-warning-rgb), .08) !important; }
.btn-inprogress:hover { border-color: rgba(var(--vz-info-rgb), .5) !important; background: rgba(var(--vz-info-rgb), .08) !important; }
.btn-done:hover { border-color: rgba(var(--vz-success-rgb), .5) !important; background: rgba(var(--vz-success-rgb), .08) !important; }
.pr-status-form-modal { margin: 0; }
</style>
@endsection

@section('scripts')
<script>
(function() {
    var modal = document.getElementById('statusChangeModal');
    if (!modal) return;
    var baseUrl = modal.getAttribute('data-update-url');
    var forms = modal.querySelectorAll('.pr-status-form-modal');
    modal.addEventListener('show.bs.modal', function(e) {
        var trigger = e.relatedTarget;
        if (!trigger || !trigger.classList.contains('btn-status-trigger')) return;
        var id = trigger.getAttribute('data-request-id');
        var current = trigger.getAttribute('data-current') || '';
        if (!id) return;
        var action = baseUrl + '/' + id;
        forms.forEach(function(form) {
            form.setAttribute('action', action);
            var btn = form.querySelector('.btn-status-option');
            if (btn) {
                var status = form.getAttribute('data-status');
                btn.classList.remove('border-primary', 'bg-primary-subtle');
                if (status === current) {
                    btn.classList.add('border-primary', 'bg-primary-subtle');
                }
            }
        });
    });
})();
</script>
@endsection