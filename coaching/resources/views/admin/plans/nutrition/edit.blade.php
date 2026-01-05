@extends('layouts.master')

@section('head')
    <style>
        .meal-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(34, 197, 94, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        .meal-card:hover {
            border-color: rgba(34, 197, 94, 0.4);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.1);
        }
        [data-bs-theme="dark"] .meal-card {
            background: rgba(30, 41, 59, 0.5);
            border-color: rgba(34, 197, 94, 0.1);
        }
        .ingredient-item {
            background: rgba(241, 245, 249, 0.5);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }
        .ingredient-item:hover {
            background: rgba(241, 245, 249, 0.8);
            transform: translateX(4px);
        }
        [data-bs-theme="dark"] .ingredient-item {
            background: rgba(30, 41, 59, 0.3);
        }
        [data-bs-theme="dark"] .ingredient-item:hover {
            background: rgba(30, 41, 59, 0.5);
        }
        .nutrient-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .time-badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        .calorie-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #10b981;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: rgba(16, 185, 129, 0.05);
        }
        .edit-indicator {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 24px;
            height: 24px;
            background: #f59e0b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            z-index: 1;
        }
        .history-item {
            padding: 8px 12px;
            border-radius: 6px;
            background: rgba(241, 245, 249, 0.5);
            margin-bottom: 4px;
            font-size: 12px;
        }
        [data-bs-theme="dark"] .history-item {
            background: rgba(30, 41, 59, 0.3);
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            <i class="ri-pencil-line me-2"></i>
                            ویرایش برنامه غذایی
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    <i class="ri-home-4-line"></i>
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('plans.library') }}">
                                    کتابخانه
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">
                                    رژیم کاهش وزن
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                ویرایش
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <!-- سایدبار اطلاعات -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                        <i class="ri-edit-box-fill fs-36 text-warning"></i>
                                    </div>
                                    <span class="edit-indicator">
                                    <i class="ri-pencil-line"></i>
                                </span>
                                </div>
                                <h5 class="mt-3 mb-1">در حال ویرایش</h5>
                                <p class="text-muted">رژیم کاهش وزن متوسط</p>
                            </div>

                            <!-- اطلاعات برنامه -->
                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">کد برنامه:</small>
                                    <span class="badge bg-dark">#NUT-001</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">تاریخ ایجاد:</small>
                                    <span class="small">۱۴۰۳/۰۱/۱۵</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <span class="small">۱۴۰۳/۰۱/۲۰</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">ویرایش‌کننده:</small>
                                    <span class="small fw-medium">شما</span>
                                </div>
                            </div>

                            <!-- آمار استفاده -->
                            <div class="mt-3">
                                <h6 class="fw-semibold mb-3">
                                    <i class="ri-bar-chart-line me-2"></i>
                                    آمار استفاده
                                </h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">شاگردان فعال:</span>
                                    <span class="badge bg-success">۱۸ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">تکمیل شده:</span>
                                    <span class="badge bg-primary">۱۲ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">میانگین امتیاز:</span>
                                    <span class="badge bg-warning">۴.۸/۵</span>
                                </div>
                            </div>

                            <!-- تاریخچه تغییرات -->
                            <div class="mt-4">
                                <h6 class="fw-semibold mb-2">
                                    <i class="ri-history-line me-2"></i>
                                    آخرین تغییرات
                                </h6>
                                <div class="history-item">
                                    <div class="d-flex justify-content-between">
                                        <span>کالری ناهار کاهش یافت</span>
                                        <small class="text-muted">۲ روز پیش</small>
                                    </div>
                                </div>
                                <div class="history-item">
                                    <div class="d-flex justify-content-between">
                                        <span>وعده جدید اضافه شد</span>
                                        <small class="text-muted">۱ هفته پیش</small>
                                    </div>
                                </div>
                                <div class="history-item">
                                    <div class="d-flex justify-content-between">
                                        <span>آلرژی گلوتن اضافه شد</span>
                                        <small class="text-muted">۲ هفته پیش</small>
                                    </div>
                                </div>
                            </div>

                            <!-- هشدارهای ویرایش -->
                            <div class="mt-4">
                                <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25">
                                    <i class="ri-alert-line me-2"></i>
                                    <small>تغییرات روی همه شاگردان تأثیر می‌گذارد.</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="d-grid gap-2">
                                <button type="submit" form="nutrition-edit-form" class="btn btn-warning">
                                    <i class="ri-save-3-line me-1"></i>
                                    ذخیره تغییرات
                                </button>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary w-100">
                                        <i class="ri-eye-line me-1"></i>
                                        پیش‌نمایش
                                    </a>
                                    <a href="#" class="btn btn-outline-danger w-100" onclick="confirmReset()">
                                        <i class="ri-restart-line me-1"></i>
                                        بازنشانی
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- فرم ویرایش اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <form id="nutrition-edit-form" action="#" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- هدر با وضعیت -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm bg-success bg-opacity-10 rounded-circle p-2">
                                                    <i class="ri-restaurant-fill fs-20 text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <input type="text" class="form-control form-control-lg border-0 fs-4 fw-bold px-0"
                                                       value="رژیم کاهش وزن متوسط"
                                                       id="program-title">
                                                <div class="d-flex align-items-center mt-1">
                                                    <span class="badge bg-success me-2">فعال</span>
                                                    <span class="badge bg-info me-2">تغذیه</span>
                                                    <span class="text-muted small">
                                                    <i class="ri-calendar-line me-1"></i>
                                                    ویرایش: ۱۴۰۳/۰۱/۲۰
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <div class="d-flex gap-2">
                                            <select class="form-select" id="program-status">
                                                <option value="active" selected>فعال</option>
                                                <option value="draft">پیش‌نویس</option>
                                                <option value="archived">آرشیو</option>
                                                <option value="disabled">غیرفعال</option>
                                            </select>
                                            <button type="button" class="btn btn-primary">
                                                <i class="ri-refresh-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تب‌های ویرایش -->
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#basic-info">
                                            <i class="ri-information-line me-1"></i>
                                            اطلاعات پایه
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#meals">
                                            <i class="ri-restaurant-line me-1"></i>
                                            وعده‌ها
                                            <span class="badge bg-primary rounded-pill ms-1">۵</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#settings">
                                            <i class="ri-settings-3-line me-1"></i>
                                            تنظیمات
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#history">
                                            <i class="ri-history-line me-1"></i>
                                            تاریخچه
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- اطلاعات پایه -->
                                    <div class="tab-pane fade show active" id="basic-info">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">هدف برنامه</label>
                                                    <select class="form-control" id="edit-goal">
                                                        <option value="weight_loss" selected>کاهش وزن</option>
                                                        <option value="muscle_gain">افزایش حجم عضلات</option>
                                                        <option value="maintenance">نگهداری وزن</option>
                                                        <option value="detox">سم‌زدایی</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">سطح</label>
                                                    <select class="form-control" id="edit-level">
                                                        <option value="beginner">مبتدی</option>
                                                        <option value="intermediate" selected>متوسط</option>
                                                        <option value="advanced">پیشرفته</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">مدت برنامه (روز)</label>
                                                    <input type="number" class="form-control"
                                                           value="14" min="1" max="365">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">کالری روزانه</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                               value="1800" min="800" max="5000">
                                                        <span class="input-group-text">کالری</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">محدودیت کربوهیدرات (گرم)</label>
                                                    <input type="number" class="form-control"
                                                           value="150" min="0" max="500">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">توضیحات</label>
                                                    <textarea class="form-control" rows="4"
                                                              id="edit-description">برنامه غذایی ۲ هفته‌ای برای کاهش وزن متوسط. شامل ۵ وعده غذایی در روز با تأکید بر پروتئین و فیبر بالا.</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نکات مهم</label>
                                                    <textarea class="form-control" rows="3"
                                                              placeholder="نکات ایمنی و دستورالعمل‌ها...">۱. روزانه ۸ لیوان آب مصرف شود
۲. از شکر و نمک اضافه پرهیز شود
۳. وعده‌ها سر وقت مصرف شوند</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- وعده‌ها -->
                                    <div class="tab-pane fade" id="meals">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">مدیریت وعده‌های غذایی</h6>
                                            <button type="button" class="btn btn-sm btn-success" onclick="addMeal()">
                                                <i class="ri-add-line me-1"></i>
                                                وعده جدید
                                            </button>
                                        </div>

                                        <div id="meals-container">
                                            <!-- وعده ۱ -->
                                            <div class="meal-card position-relative">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1">صبحانه</h6>
                                                        <div class="d-flex align-items-center gap-2">
                                                        <span class="time-badge">
                                                            <i class="ri-time-line me-1"></i>
                                                            ۷:۰۰ - ۸:۰۰
                                                        </span>
                                                            <span class="badge bg-success bg-opacity-10 text-success">
                                                            ۳۵۰ کالری
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                                            <i class="ri-clipboard-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label small">نام وعده</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="صبحانه پروتئینی">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">زمان</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="۷:۰۰ - ۸:۰۰">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">کالری</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="350" min="0" max="2000">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small">مواد غذایی</label>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">نان سبوس دار</span>
                                                                    <small class="text-muted ms-2">۲ برش</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۱۵۰ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">پنیر کم چرب</span>
                                                                    <small class="text-muted ms-2">۳۰ گرم</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۸۰ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">چای سبز</span>
                                                                    <small class="text-muted ms-2">۱ فنجان</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۲ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                                                        <i class="ri-add-line me-1"></i>
                                                        افزودن ماده غذایی
                                                    </button>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small">توضیحات</label>
                                                    <textarea class="form-control form-control-sm" rows="2">صبحانه با پروتئین بالا برای شروع روز</textarea>
                                                </div>
                                            </div>

                                            <!-- وعده ۲ -->
                                            <div class="meal-card position-relative">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1">ناهار</h6>
                                                        <div class="d-flex align-items-center gap-2">
                                                        <span class="time-badge">
                                                            <i class="ri-time-line me-1"></i>
                                                            ۱۲:۳۰ - ۱۳:۳۰
                                                        </span>
                                                            <span class="badge bg-success bg-opacity-10 text-success">
                                                            ۵۵۰ کالری
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                                            <i class="ri-clipboard-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label small">نام وعده</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="ناهار پروتئینی">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">زمان</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="۱۲:۳۰ - ۱۳:۳۰">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">کالری</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="550" min="0" max="2000">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small">مواد غذایی</label>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">مرغ گریل شده</span>
                                                                    <small class="text-muted ms-2">۱۵۰ گرم</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۲۵۰ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">برنج قهوه‌ای</span>
                                                                    <small class="text-muted ms-2">۱ پیمانه</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۲۰۰ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ingredient-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                                <div>
                                                                    <span class="fw-medium">سالاد سبزیجات</span>
                                                                    <small class="text-muted ms-2">۱ کاسه</small>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <small class="text-success">۵۰ کالری</small>
                                                                <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                                                    <i class="ri-pencil-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                                                        <i class="ri-add-line me-1"></i>
                                                        افزودن ماده غذایی
                                                    </button>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label small">توضیحات</label>
                                                    <textarea class="form-control form-control-sm" rows="2">ناهار با پروتئین بالا و کربوهیدرات متوسط</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- تنظیمات -->
                                    <div class="tab-pane fade" id="settings">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <h6 class="mb-3">آلرژی‌ها و محدودیت‌ها</h6>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-allergy1" checked>
                                                                <label class="form-check-label" for="edit-allergy1">لاکتوز</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-allergy2">
                                                                <label class="form-check-label" for="edit-allergy2">گلوتن</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-allergy3">
                                                                <label class="form-check-label" for="edit-allergy3">بادام زمینی</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-allergy4">
                                                                <label class="form-check-label" for="edit-allergy4">ماهی</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <h6 class="mb-3">مکمل‌ها</h6>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement1">
                                                                <label class="form-check-label" for="edit-supplement1">مولتی ویتامین</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement2" checked>
                                                                <label class="form-check-label" for="edit-supplement2">ویتامین D</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement3">
                                                                <label class="form-check-label" for="edit-supplement3">امگا ۳</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement4">
                                                                <label class="form-check-label" for="edit-supplement4">پروتئین</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">تنظیمات پیشرفته</label>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="edit-setting1" checked>
                                                                <label class="form-check-label" for="edit-setting1">اعلان زمان وعده</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="edit-setting2">
                                                                <label class="form-check-label" for="edit-setting2">جایگزینی مواد</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="edit-setting3" checked>
                                                                <label class="form-check-label" for="edit-setting3">نمایش کالری</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- تاریخچه -->
                                    <div class="tab-pane fade" id="history">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                <tr>
                                                    <th>تاریخ</th>
                                                    <th>تغییر</th>
                                                    <th>کاربر</th>
                                                    <th>جزئیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۲۰</td>
                                                    <td><span class="badge bg-warning">ویرایش</span></td>
                                                    <td>شما</td>
                                                    <td>کاهش کالری ناهار</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۸</td>
                                                    <td><span class="badge bg-success">افزودن</span></td>
                                                    <td>مدیر سیستم</td>
                                                    <td>وعده جدید (میان وعده عصر)</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۵</td>
                                                    <td><span class="badge bg-primary">ایجاد</span></td>
                                                    <td>مدیر سیستم</td>
                                                    <td>ایجاد برنامه جدید</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۰</td>
                                                    <td><span class="badge bg-info">تنظیمات</span></td>
                                                    <td>شما</td>
                                                    <td>اضافه کردن آلرژی گلوتن</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- دکمه‌های نهایی -->
                        <div class="mt-3">
                            <div class="row justify-content-between g-2">
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-secondary w-100" onclick="saveAsDraft()">
                                            <i class="ri-save-line me-1"></i>
                                            ذخیره پیش‌نویس
                                        </button>
                                        <button type="button" class="btn btn-outline-danger w-100" onclick="confirmDelete()">
                                            <i class="ri-delete-bin-line me-1"></i>
                                            حذف
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2 justify-content-lg-end">
                                        <a href="#" class="btn btn-light w-100">
                                            <i class="ri-close-line me-1"></i>
                                            انصراف
                                        </a>
                                        <button type="submit" class="btn btn-warning w-100">
                                            <i class="ri-save-3-line me-1"></i>
                                            ذخیره تغییرات
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // شمارنده وعده‌ها
        let mealCount = 2;

        // اضافه کردن وعده جدید
        function addMeal() {
            mealCount++;
            const mealTypes = ['میان وعده صبح', 'میان وعده عصر', 'شام', 'قبل خواب', 'وعده ورزشی'];
            const mealType = mealTypes[Math.min(mealCount - 3, mealTypes.length - 1)];

            const newMeal = `
        <div class="meal-card position-relative">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h6 class="mb-1">${mealType}</h6>
                    <div class="d-flex align-items-center gap-2">
                        <span class="time-badge">
                            <i class="ri-time-line me-1"></i>
                            --:--
                        </span>
                        <span class="badge bg-success bg-opacity-10 text-success">
                            ۰ کالری
                        </span>
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <i class="ri-clipboard-line"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label small">نام وعده</label>
                        <input type="text" class="form-control form-control-sm"
                               value="${mealType}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">زمان</label>
                        <input type="text" class="form-control form-control-sm"
                               placeholder="مثال: ۱۰:۰۰ - ۱۱:۰۰">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">کالری</label>
                        <input type="number" class="form-control form-control-sm"
                               value="0" min="0" max="2000">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small">مواد غذایی</label>
                <div class="ingredient-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-sm btn-link text-danger p-0 me-2">
                                <i class="ri-close-line"></i>
                            </button>
                            <div>
                                <span class="fw-medium">ماده غذایی</span>
                                <small class="text-muted ms-2">مقدار</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <small class="text-success">۰ کالری</small>
                            <button type="button" class="btn btn-sm btn-link text-primary p-0">
                                <i class="ri-pencil-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                    <i class="ri-add-line me-1"></i>
                    افزودن ماده غذایی
                </button>
            </div>

            <div class="mb-3">
                <label class="form-label small">توضیحات</label>
                <textarea class="form-control form-control-sm" rows="2"></textarea>
            </div>
        </div>`;

            document.getElementById('meals-container').insertAdjacentHTML('beforeend', newMeal);
        }

        // حذف وعده
        function removeMeal(button) {
            if (confirm('آیا از حذف این وعده مطمئن هستید؟')) {
                button.closest('.meal-card').remove();
                mealCount--;
            }
        }

        // ذخیره پیش‌نویس
        function saveAsDraft() {
            alert('تغییرات به عنوان پیش‌نویس ذخیره شد.');
        }

        // تأیید بازنشانی
        function confirmReset() {
            if (confirm('آیا می‌خواهید همه تغییرات را بازنشانی کنید؟')) {
                location.reload();
            }
        }

        // تأیید حذف
        function confirmDelete() {
            if (confirm('آیا از حذف این برنامه غذایی مطمئن هستید؟ این عمل غیرقابل بازگشت است.')) {
                alert('برنامه غذایی حذف شد.');
                // در حالت واقعی، درخواست DELETE ارسال می‌شود
            }
        }

        // ارسال فرم ویرایش
        document.getElementById('nutrition-edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('تغییرات با موفقیت ذخیره شدند.');
            // در حالت واقعی، درخواست PUT ارسال می‌شود
        });
    </script>
@endsection
