@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
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

            <!-- آمار کلی -->
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="avatar-sm rounded bg-primary-subtle d-flex align-items-center justify-content-center me-3">
                                <i class="ri-file-add-line text-primary fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $stats['total'] ?? 0 }}</h5>
                                <small class="text-muted">کل درخواست‌ها</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="avatar-sm rounded bg-success-subtle d-flex align-items-center justify-content-center me-3">
                                <i class="ri-checkbox-circle-line text-success fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $stats['accepted'] ?? 0 }}</h5>
                                <small class="text-muted">تایید شده</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="avatar-sm rounded bg-warning-subtle d-flex align-items-center justify-content-center me-3">
                                <i class="ri-time-line text-warning fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $stats['pending'] ?? 0 }}</h5>
                                <small class="text-muted">در انتظار بررسی</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="avatar-sm rounded bg-danger-subtle d-flex align-items-center justify-content-center me-3">
                                <i class="ri-close-circle-line text-danger fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $stats['rejected'] ?? 0 }}</h5>
                                <small class="text-muted">رد شده</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- فیلتر و جستجو -->
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body py-3">
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
            </div>

            <!-- لیست سفارشات (ریسپانسیو: جدول در دسکتاپ، کارت در موبایل) -->
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body p-0">
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
@endsection