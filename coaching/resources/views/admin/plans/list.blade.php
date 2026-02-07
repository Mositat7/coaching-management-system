@extends('layouts.master')

@section('head')
    <style>
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-active {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        .status-expired {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        .status-completed {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        .plan-type-badge {
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 11px;
        }
        .plan-workout {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }
        .plan-nutrition {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }
        .progress-sm {
            height: 6px;
            border-radius: 3px;
        }
        .member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

    </style>
    <style>
        /* غیرفعال کردن hover پیش‌فرض */
        [data-bs-theme="dark"] .table-hover > tbody > tr:hover {
            --bs-table-accent-bg: transparent !important;
        }

        /* استایل سفارشی */
        .custom-hover-effect {
            position: relative;
        }

        .custom-hover-effect::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(59, 130, 246, 0.1);
            opacity: 0;
            transition: opacity 0.2s ease;
            pointer-events: none;
            border-radius: 4px;
        }

        [data-bs-theme="dark"] .custom-hover-effect:hover::after {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            لیست شاگردان و برنامه‌ها
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                لیست برنامه‌ها
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <!-- آمار کلی -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">
                                        شاگردان فعال
                                    </h4>
                                    <p class="text-muted fw-medium fs-22 mb-0">
                                        ۴۸ نفر
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-md bg-success bg-opacity-10 rounded">
                                        <i class="ri-user-follow-fill fs-32 text-success avatar-title"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <p class="mb-0">
                                <span class="text-success fw-medium mb-0">
                                    <i class="ri-arrow-up-line"></i>
                                    ۱۲٪
                                </span>
                                    نسبت به ماه گذشته
                                </p>
                                <div>
                                    <a class="link-primary fw-medium" href="#!">
                                        مشاهده
                                        <i class="ri-arrow-left-fill align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">
                                        برنامه‌های فعال
                                    </h4>
                                    <p class="text-muted fw-medium fs-22 mb-0">
                                        ۶۵ برنامه
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <i class="ri-file-list-fill fs-32 text-primary avatar-title"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <p class="mb-0">
                                <span class="text-success fw-medium mb-0">
                                    <i class="ri-arrow-up-line"></i>
                                    ۱۸٪
                                </span>
                                    نسبت به ماه گذشته
                                </p>
                                <div>
                                    <a class="link-primary fw-medium" href="#!">
                                        مشاهده
                                        <i class="ri-arrow-left-fill align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">
                                        برنامه‌های ورزشی
                                    </h4>
                                    <p class="text-muted fw-medium fs-22 mb-0">
                                        ۴۲ برنامه
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-md bg-warning bg-opacity-10 rounded">
                                        <i class="ri-dumbbell-fill fs-32 text-warning avatar-title"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <p class="mb-0">
                                <span class="text-success fw-medium mb-0">
                                    <i class="ri-arrow-up-line"></i>
                                    ۸٪
                                </span>
                                    نسبت به ماه گذشته
                                </p>
                                <div>
                                    <a class="link-primary fw-medium" href="#!">
                                        مشاهده
                                        <i class="ri-arrow-left-fill align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="card-title mb-2">
                                        برنامه‌های غذایی
                                    </h4>
                                    <p class="text-muted fw-medium fs-22 mb-0">
                                        ۲۳ برنامه
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-md bg-info bg-opacity-10 rounded">
                                        <i class="ri-restaurant-fill fs-32 text-info avatar-title"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <p class="mb-0">
                                <span class="text-danger fw-medium mb-0">
                                    <i class="ri-arrow-down-line"></i>
                                    ۳٪
                                </span>
                                    نسبت به ماه گذشته
                                </p>
                                <div>
                                    <a class="link-primary fw-medium" href="#!">
                                        مشاهده
                                        <i class="ri-arrow-left-fill align-middle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- فیلترها و جستجو -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="ri-search-line"></i>
                            </span>
                                <input type="text" class="form-control border-start-0"
                                       placeholder="جستجوی شاگرد یا برنامه...">
                            </div>
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                                <select class="form-select" style="width: auto;">
                                    <option>همه وضعیت‌ها</option>
                                    <option>فعال</option>
                                    <option>در انتظار</option>
                                    <option>منقضی شده</option>
                                    <option>تکمیل شده</option>
                                </select>

                                <select class="form-select" style="width: auto;">
                                    <option>همه انواع برنامه</option>
                                    <option>فقط ورزشی</option>
                                    <option>فقط غذایی</option>
                                </select>

                                <select class="form-select" style="width: auto;">
                                    <option>همه سطوح</option>
                                    <option>مبتدی</option>
                                    <option>متوسط</option>
                                    <option>پیشرفته</option>
                                </select>

                                <button class="btn btn-outline-primary">
                                    <i class="ri-filter-3-line me-1"></i>
                                    فیلتر
                                </button>

                                <button class="btn btn-primary">
                                    <i class="ri-download-line me-1"></i>
                                    خروجی Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- جدول اصلی -->
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h4 class="card-title mb-0">
                            لیست شاگردان و برنامه‌های اختصاص یافته
                        </h4>
                    </div>
                    <div class="dropdown">
                        <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                           data-bs-toggle="dropdown" href="#">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <i class="ri-download-line me-2"></i>
                                دانلود گزارش
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ri-printer-line me-2"></i>
                                چاپ
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ri-refresh-line me-2"></i>
                                به‌روزرسانی
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                        <thead class="bg-light-subtle">
                        <tr>
                            <th style="width: 20px;">
                                <div class="form-check">
                                    <input class="form-check-input" id="checkAll" type="checkbox"/>
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>شاگرد</th>
                            <th>برنامه</th>
                            <th>نوع</th>
                            <th>وضعیت</th>
                            <th>پیشرفت</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>اقدامات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- ردیف ۱ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check1" type="checkbox"/>
                                    <label class="form-check-label" for="check1">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                             class="member-avatar" alt="محمد رضایی">
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            محمد رضایی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-phone-line fs-12 me-1"></i>
                                            ۰۹۱۲۱۲۳۴۵۶۷
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">برنامه حجم‌گیری فاز اول</div>
                                    <small class="text-muted">۴ هفته - سطح متوسط</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-workout">
                                    <i class="ri-dumbbell-line me-1"></i>
                                    ورزشی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-active">
                                    <i class="ri-checkbox-circle-line me-1"></i>
                                    فعال
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۷۵٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۱/۲۰</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۲/۲۰</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-primary btn-sm" title="ویرایش برنامه">
                                        <i class="ri-pencil-line"></i>
                                    </button>
                                    <button class="btn btn-soft-success btn-sm" title="ارسال پیام">
                                        <i class="ri-message-3-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ردیف ۲ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check2" type="checkbox"/>
                                    <label class="form-check-label" for="check2">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                             class="member-avatar" alt="فاطمه احمدی">
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            فاطمه احمدی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-mail-line fs-12 me-1"></i>
                                            fatemeh@example.com
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">رژیم کاهش وزن متوسط</div>
                                    <small class="text-muted">۲ هفته - سطح مبتدی</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-nutrition">
                                    <i class="ri-restaurant-line me-1"></i>
                                    غذایی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-completed">
                                    <i class="ri-check-double-line me-1"></i>
                                    تکمیل شده
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۱۰۰٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۱/۱۵</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۱/۲۹</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-warning btn-sm" title="تکرار برنامه">
                                        <i class="ri-repeat-line"></i>
                                    </button>
                                    <button class="btn btn-soft-success btn-sm" title="ارسال پیام">
                                        <i class="ri-message-3-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ردیف ۳ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check3" type="checkbox"/>
                                    <label class="form-check-label" for="check3">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                             class="member-avatar" alt="علی محمدی">
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            علی محمدی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-phone-line fs-12 me-1"></i>
                                            ۰۹۳۵۵۶۶۷۷۸۸
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">تمرینات قدرت فول بادی</div>
                                    <small class="text-muted">۶ هفته - سطح پیشرفته</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-workout">
                                    <i class="ri-dumbbell-line me-1"></i>
                                    ورزشی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-active">
                                    <i class="ri-checkbox-circle-line me-1"></i>
                                    فعال
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۵۰٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۱/۲۵</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۳/۰۷</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-primary btn-sm" title="ویرایش برنامه">
                                        <i class="ri-pencil-line"></i>
                                    </button>
                                    <button class="btn btn-soft-success btn-sm" title="ارسال پیام">
                                        <i class="ri-message-3-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ردیف ۴ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check4" type="checkbox"/>
                                    <label class="form-check-label" for="check4">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <div class="member-avatar bg-primary bg-opacity-10 d-flex align-items-center justify-content-center">
                                            <span class="text-primary fs-14">س</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            سارا کریمی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-mail-line fs-12 me-1"></i>
                                            sara@example.com
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">رژیم افزایش حجم عضلات</div>
                                    <small class="text-muted">۸ هفته - سطح متوسط</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-nutrition">
                                    <i class="ri-restaurant-line me-1"></i>
                                    غذایی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-pending">
                                    <i class="ri-time-line me-1"></i>
                                    در انتظار
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 10%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۱۰٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۲/۰۱</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۳/۲۶</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-primary btn-sm" title="ویرایش برنامه">
                                        <i class="ri-pencil-line"></i>
                                    </button>
                                    <button class="btn btn-soft-danger btn-sm" title="لغو برنامه">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ردیف ۵ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check5" type="checkbox"/>
                                    <label class="form-check-label" for="check5">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                             class="member-avatar" alt="رضا نوروزی">
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            رضا نوروزی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-phone-line fs-12 me-1"></i>
                                            ۰۹۱۸۷۶۵۴۳۲۱
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">برنامه شروع بدنسازی</div>
                                    <small class="text-muted">۱۲ هفته - سطح مبتدی</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-workout">
                                    <i class="ri-dumbbell-line me-1"></i>
                                    ورزشی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-expired">
                                    <i class="ri-error-warning-line me-1"></i>
                                    منقضی شده
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 65%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۶۵٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۲/۱۲/۱۰</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۳/۰۳</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-warning btn-sm" title="تمدید برنامه">
                                        <i class="ri-restart-line"></i>
                                    </button>
                                    <button class="btn btn-soft-success btn-sm" title="ارسال پیام">
                                        <i class="ri-message-3-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ردیف ۶ -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" id="check6" type="checkbox"/>
                                    <label class="form-check-label" for="check6">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <div class="member-avatar bg-success bg-opacity-10 d-flex align-items-center justify-content-center">
                                            <span class="text-success fs-14">م</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="text-dark fw-medium fs-15 d-block" href="#!">
                                            مریم سلیمانی
                                        </a>
                                        <small class="text-muted">
                                            <i class="ri-mail-line fs-12 me-1"></i>
                                            maryam@example.com
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">رژیم تناسب اندام بانوان</div>
                                    <small class="text-muted">۴ هفته - سطح متوسط</small>
                                </div>
                            </td>
                            <td>
                                <span class="plan-type-badge plan-nutrition">
                                    <i class="ri-restaurant-line me-1"></i>
                                    غذایی
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-active">
                                    <i class="ri-checkbox-circle-line me-1"></i>
                                    فعال
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="fw-medium">۹۰٪</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۱/۲۸</div>
                            </td>
                            <td>
                                <div class="text-muted">۱۴۰۳/۰۲/۲۸</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-light btn-sm" title="مشاهده برنامه">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="btn btn-soft-primary btn-sm" title="ویرایش برنامه">
                                        <i class="ri-pencil-line"></i>
                                    </button>
                                    <button class="btn btn-soft-success btn-sm" title="ارسال پیام">
                                        <i class="ri-message-3-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="text-muted">
                                نمایش ۱ تا ۶ از ۴۸ نتیجه
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-lg-end">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">
                                            قبلی
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0);">
                                            1
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">
                                            2
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">
                                            3
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">
                                            بعدی
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // انتخاب همه
        document.getElementById('checkAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][id^="check"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection
