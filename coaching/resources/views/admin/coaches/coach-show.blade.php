@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">جزئیات مربی</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('Coach.list') }}">لیست مربیان</a></li>
                            <li class="breadcrumb-item active">جزئیات مربی</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Left Sidebar: Profile Card --}}
                <div class="col-xl-4 col-lg-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="{{ $coach->avatar_url }}" 
                                     class="rounded-circle border border-3 border-primary"
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h4 class="mb-1">{{ $coach->full_name }}</h4>
                            <p class="text-muted mb-3">{{ $coach->code }}</p>
                            
                            <div class="mb-3">
                                @if($coach->status == 'active')
                                    <span class="badge bg-success fs-6">فعال</span>
                                @elseif($coach->status == 'inactive')
                                    <span class="badge bg-secondary fs-6">غیرفعال</span>
                                @else
                                    <span class="badge bg-danger fs-6">تعلیق شده</span>
                                @endif
                            </div>

                            <div class="mt-4 pt-3 border-top">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <p class="text-muted mb-1">سابقه کاری</p>
                                        <h5 class="mb-0">
                                            {{ $coach->experience_years ?? 0 }} سال
                                        </h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted mb-1">روش تمرین</p>
                                        <h5 class="mb-0">
                                            @if($coach->training_style == 'strict')
                                                <span class="badge bg-danger">سخت‌گیرانه</span>
                                            @elseif($coach->training_style == 'moderate')
                                                <span class="badge bg-warning">متوسط</span>
                                            @else
                                                <span class="badge bg-success">ملایم</span>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('Coach.list') }}" class="btn btn-light w-100 mb-2">
                                    <i class="ri-arrow-right-line me-1"></i> بازگشت به لیست
                                </a>
                                <form action="{{ route('Coach.destroy', $coach->id) }}" 
                                      method="POST" 
                                      class="d-inline w-100"
                                      onsubmit="return confirm('آیا از حذف این مربی اطمینان دارید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="ri-delete-bin-line me-1"></i> حذف مربی
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Details --}}
                <div class="col-xl-8 col-lg-7">
                    {{-- Basic Information --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-user-line align-middle me-2"></i>
                                اطلاعات پایه
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">نام و نام خانوادگی</label>
                                    <p class="mb-0 fw-semibold">{{ $coach->full_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">کد مربی</label>
                                    <p class="mb-0">
                                        <span class="badge bg-info">{{ $coach->code }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">شماره موبایل</label>
                                    <p class="mb-0" dir="ltr">{{ $coach->mobile }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">وضعیت</label>
                                    <p class="mb-0">
                                        @if($coach->status == 'active')
                                            <span class="badge bg-success">فعال</span>
                                        @elseif($coach->status == 'inactive')
                                            <span class="badge bg-secondary">غیرفعال</span>
                                        @else
                                            <span class="badge bg-danger">تعلیق شده</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">سابقه کاری</label>
                                    <p class="mb-0">
                                        {{ $coach->experience_years ?? 0 }} سال
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">روش تمرین</label>
                                    <p class="mb-0">
                                        @if($coach->training_style == 'strict')
                                            <span class="badge bg-danger">سخت‌گیرانه</span>
                                        @elseif($coach->training_style == 'moderate')
                                            <span class="badge bg-warning">متوسط</span>
                                        @else
                                            <span class="badge bg-success">ملایم</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">تاریخ ثبت</label>
                                    <p class="mb-0">{{ $coach->created_at->format('Y/m/d H:i') }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">آخرین بروزرسانی</label>
                                    <p class="mb-0">{{ $coach->updated_at->format('Y/m/d H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Biography --}}
                    @if($coach->biography)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-file-text-line align-middle me-2"></i>
                                    بیوگرافی و سوابق
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $coach->biography }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- Certificates --}}
                    @if($coach->certificates)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-award-line align-middle me-2"></i>
                                    مدارک و گواهینامه‌ها
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $coach->certificates }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- Specializations --}}
                    @if($coach->specializations && count($coach->specializations) > 0)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-star-line align-middle me-2"></i>
                                    تخصص‌های ویژه
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($coach->specializations as $specialization)
                                        <span class="badge bg-primary">{{ $specialization }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
</style>
@endsection

