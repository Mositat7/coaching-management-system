@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ri-check-line me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if($errors->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ $errors->first('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">لیست مربیان</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="#">مدیریت مربیان</a></li>
                            <li class="breadcrumb-item active">لیست مربیان</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filters & Actions --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-3">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <form method="GET" action="{{ route('Coach.list') }}" class="row g-2">
                                        <div class="col-12 col-sm-6 col-md-5">
                                            <input type="text" 
                                                   name="search" 
                                                   class="form-control" 
                                                   placeholder="جستجوی نام، موبایل یا کد مربی"
                                                   value="{{ request('search') }}">
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <select name="status" class="form-select">
                                                <option value="">همه وضعیت‌ها</option>
                                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>فعال</option>
                                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
                                                <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>تعلیق شده</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3">
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary flex-fill">
                                                    <i class="ri-search-line me-1"></i> <span class="d-none d-sm-inline">جستجو</span>
                                                </button>
                                                @if(request('search') || request('status'))
                                                    <a href="{{ route('Coach.list') }}" class="btn btn-light">
                                                        <i class="ri-close-line"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-md-4 col-lg-6 text-md-end">
                                    <a href="{{ route('Coach.add') }}" class="btn btn-success w-100 w-md-auto">
                                        <i class="ri-add-line me-1"></i> <span class="d-none d-sm-inline">اضافه کردن مربی جدید</span><span class="d-sm-none">مربی جدید</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Coaches Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($coaches->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">عکس</th>
                                                <th scope="col">نام و نام خانوادگی</th>
                                                <th scope="col">کد مربی</th>
                                                <th scope="col">شماره موبایل</th>
                                                <th scope="col">سابقه کاری</th>
                                                <th scope="col">روش تمرین</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تاریخ ثبت</th>
                                                <th scope="col" class="text-center">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($coaches as $index => $coach)
                                                <tr>
                                                    <td>{{ $coaches->firstItem() + $index }}</td>
                                                    <td>
                                                        <img src="{{ $coach->avatar_url }}" 
                                                             alt="{{ $coach->full_name }}"
                                                             class="rounded-circle"
                                                             style="width: 40px; height: 40px; object-fit: cover;"
                                                             onerror="this.src='{{ asset('assets/images/users/coach-default.jpg') }}'">
                                                    </td>
                                                    <td>
                                                        <strong>{{ $coach->full_name }}</strong>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-info">{{ $coach->code }}</span>
                                                    </td>
                                                    <td dir="ltr">{{ $coach->mobile }}</td>
                                                    <td>
                                                        @if($coach->experience_years)
                                                            {{ $coach->experience_years }} سال
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($coach->training_style == 'strict')
                                                            <span class="badge bg-danger">سخت‌گیرانه</span>
                                                        @elseif($coach->training_style == 'moderate')
                                                            <span class="badge bg-warning">متوسط</span>
                                                        @else
                                                            <span class="badge bg-success">ملایم</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($coach->status == 'active')
                                                            <span class="badge bg-success">فعال</span>
                                                        @elseif($coach->status == 'inactive')
                                                            <span class="badge bg-secondary">غیرفعال</span>
                                                        @else
                                                            <span class="badge bg-danger">تعلیق شده</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $coach->created_at->format('Y/m/d') }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('Coach.show', $coach->id) }}" 
                                                               class="btn btn-light btn-sm"
                                                               data-bs-toggle="tooltip" 
                                                               title="مشاهده جزئیات">
                                                                <iconify-icon class="align-middle fs-16" icon="solar:eye-broken"></iconify-icon>
                                                            </a>
                                                            <a href="{{ route('Coach.add') }}" 
                                                               class="btn btn-soft-primary btn-sm"
                                                               data-bs-toggle="tooltip" 
                                                               title="ویرایش">
                                                                <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken"></iconify-icon>
                                                            </a>
                                                            <form action="{{ route('Coach.destroy', $coach->id) }}" 
                                                                  method="POST" 
                                                                  class="d-inline"
                                                                  onsubmit="return confirm('آیا از حذف این مربی اطمینان دارید؟');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" 
                                                                        class="btn btn-soft-danger btn-sm"
                                                                        data-bs-toggle="tooltip" 
                                                                        title="حذف">
                                                                    <iconify-icon class="align-middle fs-16" icon="solar:trash-bin-minimalistic-broken"></iconify-icon>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination --}}
                                <div class="mt-4">
                                    {{ $coaches->links() }}
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="ri-inbox-line" style="font-size: 64px; color: #ccc;"></i>
                                    <p class="text-muted mt-3">هیچ مربی‌ای یافت نشد.</p>
                                    <a href="{{ route('Coach.add') }}" class="btn btn-primary mt-2">
                                        <i class="ri-add-line me-1"></i> اضافه کردن مربی جدید
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection

