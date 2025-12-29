@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            ارسال برنامه به شاگردان
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                ارسال برنامه
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <!-- سایدبار -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block">
                                    <i class="ri-send-plane-line fs-36 text-primary"></i>
                                </div>
                                <h5 class="mt-3 mb-1">ارسال برنامه</h5>
                                <p class="text-muted">برنامه حجم‌گیری فاز اول</p>
                            </div>

                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-dumbbell-line fs-20 text-primary me-2"></i>
                                    <div>
                                        <h6 class="mb-0">حجم‌گیری فاز اول</h6>
                                        <small class="text-muted">۴ هفته - سطح متوسط</small>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <small class="text-muted">تمرینات:</small>
                                        <div class="fw-medium">۸ تمرین</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">مدت:</small>
                                        <div class="fw-medium">۶۰ دقیقه</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="mb-3">آمار:</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>شاگردان انتخاب شده:</span>
                                    <span class="badge bg-primary">۲ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>گروه عضلانی:</span>
                                    <div>
                                        <span class="badge bg-info me-1">سینه</span>
                                        <span class="badge bg-info">پا</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>تاریخ ایجاد:</span>
                                    <span class="text-muted">۱۴۰۳/۰۱/۱۵</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- جستجو -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="جستجوی شاگرد...">
                                        <button class="btn btn-primary">
                                            <i class="ri-search-line"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <select class="form-control">
                                        <option>همه سطوح</option>
                                        <option>مبتدی</option>
                                        <option>متوسط</option>
                                        <option>پیشرفته</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- لیست شاگردان -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-group-line me-2"></i>
                                لیست شاگردان
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- شاگرد ۱ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://ui-avatars.com/api/?name=محمد+رضایی&background=3b82f6&color=fff&size=64"
                                                         class="rounded-circle" width="64" height="64">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">محمد رضایی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-mail-line me-1"></i>
                                                        mohammad@example.com
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-warning">متوسط</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-light text-dark">ندارد</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- شاگرد ۲ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://ui-avatars.com/api/?name=فاطمه+احمدی&background=10b981&color=fff&size=64"
                                                         class="rounded-circle" width="64" height="64">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">فاطمه احمدی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-phone-line me-1"></i>
                                                        ۰۹۱۲۱۲۳۴۵۶۷
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-success">مبتدی</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-info">کاهش وزن</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- شاگرد ۳ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://ui-avatars.com/api/?name=علی+محمدی&background=ef4444&color=fff&size=64"
                                                         class="rounded-circle" width="64" height="64">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">علی محمدی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-mail-line me-1"></i>
                                                        ali@example.com
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-danger">پیشرفته</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-warning">حجم‌گیری</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- شاگرد ۴ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                                         style="width: 64px; height: 64px;">
                                                        <span class="text-primary fs-18">س</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">سارا کریمی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-phone-line me-1"></i>
                                                        ۰۹۳۵۵۶۶۷۷۸۸
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-info">متوسط</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-light text-dark">ندارد</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- شاگرد ۵ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://ui-avatars.com/api/?name=رضا+نوروزی&background=8b5cf6&color=fff&size=64"
                                                         class="rounded-circle" width="64" height="64">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">رضا نوروزی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-mail-line me-1"></i>
                                                        reza@example.com
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-success">مبتدی</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-info">استقامت</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- شاگرد ۶ -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                                                         style="width: 64px; height: 64px;">
                                                        <span class="text-success fs-18">م</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">مریم سلیمانی</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="ri-phone-line me-1"></i>
                                                        ۰۹۱۸۷۶۵۴۳۲۱
                                                    </p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="text-muted">سطح:</small>
                                                        <div><span class="badge bg-warning">متوسط</span></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted">برنامه فعلی:</small>
                                                        <div><span class="badge bg-warning">حجم‌گیری</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- اقدامات پایانی -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-2 me-3">
                                            <i class="ri-information-line text-primary fs-18"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">برنامه آماده ارسال است</h6>
                                            <p class="text-muted mb-0">۲ نفر از ۶ نفر انتخاب شده‌اند</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-secondary w-100">
                                            <i class="ri-save-line me-1"></i>
                                            ذخیره
                                        </button>
                                        <button class="btn btn-primary w-100">
                                            <i class="ri-send-plane-line me-1"></i>
                                            ارسال برنامه
                                        </button>
                                    </div>
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
    {{-- بدون اسکریپت اضافی --}}
@endsection
