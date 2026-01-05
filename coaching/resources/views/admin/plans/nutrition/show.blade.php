@extends('layouts.master')

@section('head')
    <style>
        .meal-schedule {
            border-left: 3px solid #10b981;
            padding-left: 15px;
            margin-bottom: 25px;
        }
        .meal-time {
            color: #10b981;
            font-weight: 600;
            font-size: 14px;
        }
        .ingredient-list {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }
        .ingredient-list li {
            padding: 8px 12px;
            margin-bottom: 6px;
            background: rgba(241, 245, 249, 0.5);
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        [data-bs-theme="dark"] .ingredient-list li {
            background: rgba(30, 41, 59, 0.3);
        }
        .calorie-tag {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .nutrition-facts {
            background: linear-gradient(135deg, #f0fdf4 0%, #f8fafc 100%);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        [data-bs-theme="dark"] .nutrition-facts {
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.2) 0%, rgba(30, 41, 59, 0.3) 100%);
            border-color: rgba(34, 197, 94, 0.1);
        }
        .nutrient-bar {
            height: 6px;
            border-radius: 3px;
            background: #e5e7eb;
            margin: 5px 0;
            overflow: hidden;
        }
        .nutrient-fill {
            height: 100%;
            border-radius: 3px;
        }
        .print-hide {
            display: block;
        }
        @media print {
            .print-hide {
                display: none !important;
            }
            .print-show {
                display: block !important;
            }
            .meal-schedule {
                page-break-inside: avoid;
            }
        }
        .badge-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
        .tip-box {
            background: rgba(251, 191, 36, 0.1);
            border-left: 4px solid #f59e0b;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 0 8px 8px 0;
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
                            <i class="ri-restaurant-line me-2"></i>
                            نمایش برنامه غذایی
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
                            <li class="breadcrumb-item active">
                                رژیم کاهش وزن متوسط
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <!-- هدر برنامه -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-lg bg-success bg-opacity-10 rounded-circle p-3">
                                        <i class="ri-restaurant-fill fs-36 text-success"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-1">رژیم کاهش وزن متوسط</h2>
                                    <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                        <span class="badge bg-success">فعال</span>
                                        <span class="badge bg-info">تغذیه</span>
                                        <span class="badge bg-warning">۲ هفته</span>
                                        <span class="badge bg-primary badge-pulse">۱۸۰۰ کالری/روز</span>
                                    </div>
                                    <p class="text-muted mb-0">
                                        برنامه غذایی ۲ هفته‌ای برای کاهش وزن سالم و پایدار با تأکید بر پروتئین و فیبر بالا
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end print-hide">
                                <button class="btn btn-primary" onclick="window.print()">
                                    <i class="ri-printer-line me-1"></i>
                                    چاپ برنامه
                                </button>
                                <a href="#" class="btn btn-success">
                                    <i class="ri-calendar-line me-1"></i>
                                    افزودن به تقویم
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-download-line me-2"></i>دانلود PDF</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-share-line me-2"></i>اشتراک‌گذاری</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی برنامه</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('nutrition.edit', 1) }}"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- سایدبار اطلاعات -->
                <div class="col-xl-3 col-lg-4">
                    <!-- خلاصه تغذیه -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-file-info-line me-2"></i>
                                خلاصه برنامه
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="d-inline-block position-relative">
                                    <div class="calorie-circle">
                                        <span class="fs-24 fw-bold text-success">۱,۸۰۰</span>
                                        <small class="text-muted">کالری/روز</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="fw-bold text-primary">۵</div>
                                    <small class="text-muted">وعده</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-success">۱۴</div>
                                    <small class="text-muted">روز</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-warning">۲۵,۲۰۰</div>
                                    <small class="text-muted">کل کالری</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات تغذیه‌ای -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-heart-pulse-line me-2"></i>
                                اطلاعات تغذیه‌ای
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="nutrition-facts">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">پروتئین</span>
                                        <span class="small fw-medium">۳۵٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-primary" style="width: 35%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">کربوهیدرات</span>
                                        <span class="small fw-medium">۴۰٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-success" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">چربی</span>
                                        <span class="small fw-medium">۲۵٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-warning" style="width: 25%"></div>
                                    </div>
                                </div>
                                <div class="mt-3 pt-3 border-top">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="fw-bold">۱۴۰g</div>
                                            <small class="text-muted">پروتئین</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold">۱۸۰g</div>
                                            <small class="text-muted">کربوهیدرات</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold">۵۰g</div>
                                            <small class="text-muted">چربی</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- نکات مهم -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-lightbulb-flash-line me-2"></i>
                                نکات مهم
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="tip-box">
                                <i class="ri-information-line me-2"></i>
                                روزانه ۸ لیوان آب بنوشید
                            </div>
                            <div class="tip-box">
                                <i class="ri-information-line me-2"></i>
                                وعده‌ها را سر وقت مصرف کنید
                            </div>
                            <div class="tip-box">
                                <i class="ri-information-line me-2"></i>
                                از شکر و نمک اضافه پرهیز کنید
                            </div>
                            <div class="tip-box">
                                <i class="ri-information-line me-2"></i>
                                فعالیت بدنی منظم داشته باشید
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- تب‌های روزانه -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="daysTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#day1" type="button">
                                        روز اول
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day2" type="button">
                                        روز دوم
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day3" type="button">
                                        روز سوم
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day4" type="button">
                                        روز چهارم
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day5" type="button">
                                        روز پنجم
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day6" type="button">
                                        روز ششم
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#day7" type="button">
                                        روز هفتم
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="daysTabsContent">
                                <!-- روز اول -->
                                <div class="tab-pane fade show active" id="day1" role="tabpanel">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">برنامه غذایی روز اول</h5>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success me-2">مجموع کالری: ۱,۸۰۰</span>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="ri-check-double-line me-1"></i>
                                                تکمیل شده
                                            </button>
                                        </div>
                                    </div>

                                    <!-- وعده ۱ -->
                                    <div class="meal-schedule">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">
                                                <i class="ri-sun-line me-2 text-warning"></i>
                                                صبحانه
                                            </h6>
                                            <div>
                                                <span class="meal-time me-2">۷:۰۰ - ۸:۰۰</span>
                                                <span class="calorie-tag">۳۵۰ کالری</span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-2">صبحانه کامل با پروتئین بالا برای شروع روز</p>

                                        <ul class="ingredient-list">
                                            <li>
                                                <div>
                                                    <span class="fw-medium">نان سبوس دار</span>
                                                    <small class="text-muted ms-2">۲ برش</small>
                                                </div>
                                                <span class="calorie-tag">۱۵۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">پنیر کم چرب</span>
                                                    <small class="text-muted ms-2">۳۰ گرم</small>
                                                </div>
                                                <span class="calorie-tag">۸۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">گردو</span>
                                                    <small class="text-muted ms-2">۲ عدد</small>
                                                </div>
                                                <span class="calorie-tag">۱۰۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">چای سبز</span>
                                                    <small class="text-muted ms-2">۱ فنجان</small>
                                                </div>
                                                <span class="calorie-tag">۲ کالری</span>
                                            </li>
                                        </ul>

                                        <div class="alert alert-info bg-info bg-opacity-10 border-info border-opacity-25 mt-2">
                                            <i class="ri-information-line me-2"></i>
                                            <small>نان را می‌توان با نان سنگک جایگزین کرد.</small>
                                        </div>
                                    </div>

                                    <!-- وعده ۲ -->
                                    <div class="meal-schedule">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">
                                                <i class="ri-apple-line me-2 text-success"></i>
                                                میان وعده صبح
                                            </h6>
                                            <div>
                                                <span class="meal-time me-2">۱۰:۰۰ - ۱۱:۰۰</span>
                                                <span class="calorie-tag">۱۵۰ کالری</span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-2">میوه تازه برای تأمین ویتامین‌ها</p>

                                        <ul class="ingredient-list">
                                            <li>
                                                <div>
                                                    <span class="fw-medium">سیب</span>
                                                    <small class="text-muted ms-2">۱ عدد متوسط</small>
                                                </div>
                                                <span class="calorie-tag">۹۵ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">بادام</span>
                                                    <small class="text-muted ms-2">۵ عدد</small>
                                                </div>
                                                <span class="calorie-tag">۵۵ کالری</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- وعده ۳ -->
                                    <div class="meal-schedule">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">
                                                <i class="ri-restaurant-2-line me-2 text-primary"></i>
                                                ناهار
                                            </h6>
                                            <div>
                                                <span class="meal-time me-2">۱۲:۳۰ - ۱۳:۳۰</span>
                                                <span class="calorie-tag">۵۵۰ کالری</span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-2">ناهار با پروتئین بالا و کربوهیدرات متوسط</p>

                                        <ul class="ingredient-list">
                                            <li>
                                                <div>
                                                    <span class="fw-medium">مرغ گریل شده</span>
                                                    <small class="text-muted ms-2">۱۵۰ گرم</small>
                                                </div>
                                                <span class="calorie-tag">۲۵۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">برنج قهوه‌ای</span>
                                                    <small class="text-muted ms-2">۱ پیمانه</small>
                                                </div>
                                                <span class="calorie-tag">۲۰۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">سالاد سبزیجات</span>
                                                    <small class="text-muted ms-2">۱ کاسه</small>
                                                </div>
                                                <span class="calorie-tag">۵۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">ماست کم چرب</span>
                                                    <small class="text-muted ms-2">۱۰۰ گرم</small>
                                                </div>
                                                <span class="calorie-tag">۵۰ کالری</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- وعده ۴ -->
                                    <div class="meal-schedule">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">
                                                <i class="ri-cup-line me-2 text-info"></i>
                                                میان وعده عصر
                                            </h6>
                                            <div>
                                                <span class="meal-time me-2">۱۶:۰۰ - ۱۷:۰۰</span>
                                                <span class="calorie-tag">۲۰۰ کالری</span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-2">اسنک سالم برای رفع گرسنگی عصر</p>

                                        <ul class="ingredient-list">
                                            <li>
                                                <div>
                                                    <span class="fw-medium">کره بادام زمینی</span>
                                                    <small class="text-muted ms-2">۱ قاشق غذاخوری</small>
                                                </div>
                                                <span class="calorie-tag">۱۰۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">کرفس</span>
                                                    <small class="text-muted ms-2">۲ شاخه</small>
                                                </div>
                                                <span class="calorie-tag">۲۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">چای گیاهی</span>
                                                    <small class="text-muted ms-2">۱ فنجان</small>
                                                </div>
                                                <span class="calorie-tag">۰ کالری</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- وعده ۵ -->
                                    <div class="meal-schedule">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">
                                                <i class="ri-moon-line me-2 text-secondary"></i>
                                                شام
                                            </h6>
                                            <div>
                                                <span class="meal-time me-2">۱۹:۰۰ - ۲۰:۰۰</span>
                                                <span class="calorie-tag">۵۵۰ کالری</span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-2">شام سبک با پروتئین گیاهی</p>

                                        <ul class="ingredient-list">
                                            <li>
                                                <div>
                                                    <span class="fw-medium">ماهی قزل آلا</span>
                                                    <small class="text-muted ms-2">۱۲۰ گرم</small>
                                                </div>
                                                <span class="calorie-tag">۲۵۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">سبزیجات بخارپز</span>
                                                    <small class="text-muted ms-2">۲ پیمانه</small>
                                                </div>
                                                <span class="calorie-tag">۱۵۰ کالری</span>
                                            </li>
                                            <li>
                                                <div>
                                                    <span class="fw-medium">عدس پخته</span>
                                                    <small class="text-muted ms-2">½ پیمانه</small>
                                                </div>
                                                <span class="calorie-tag">۱۵۰ کالری</span>
                                            </li>
                                        </ul>

                                        <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25 mt-2">
                                            <i class="ri-alert-line me-2"></i>
                                            <small>شام را حداقل ۳ ساعت قبل از خواب میل کنید.</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- روز دوم -->
                                <div class="tab-pane fade" id="day2" role="tabpanel">
                                    <!-- محتوای روز دوم -->
                                    <div class="text-center py-5">
                                        <div class="avatar-lg bg-light rounded-circle p-3 mb-3 mx-auto">
                                            <i class="ri-calendar-line fs-36 text-muted"></i>
                                        </div>
                                        <h5>برنامه روز دوم</h5>
                                        <p class="text-muted">برای مشاهده جزئیات روز دوم، از تب‌های بالا استفاده کنید.</p>
                                    </div>
                                </div>

                                <!-- سایر روزها -->
                                <div class="tab-pane fade" id="day3" role="tabpanel">
                                    <!-- محتوای روز سوم -->
                                </div>
                                <!-- ... -->
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات تکمیلی -->
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-list-check me-2"></i>
                                        مواد غذایی مجاز
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>سبزیجات برگ‌دار</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>پروتئین بدون چربی</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>میوه تازه</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>غلات کامل</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>آجیل و مغزها</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-checkbox-circle-fill text-success me-2"></i>
                                                <span>حبوبات</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-forbid-line me-2"></i>
                                        مواد غذایی ممنوع
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>شکر سفید</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>فست فود</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>نوشابه</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>روغن نباتی</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>شیرینی‌جات</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="ri-close-circle-fill text-danger me-2"></i>
                                                <span>غذاهای کنسروی</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- مکمل‌ها و آلرژی -->
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="ri-heart-add-line me-2"></i>
                                اطلاعات تکمیلی
                            </h5>
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#additionalInfo">
                                نمایش جزئیات
                            </button>
                        </div>
                        <div class="collapse show" id="additionalInfo">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="mb-3">مکمل‌های پیشنهادی</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-primary">ویتامین D</span>
                                            <span class="badge bg-primary">امگا ۳</span>
                                            <span class="badge bg-primary">پروبیوتیک</span>
                                            <span class="badge bg-primary">مولتی ویتامین</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="mb-3">محدودیت‌های غذایی</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-danger">لاکتوز</span>
                                            <span class="badge bg-warning">گلوتن (اختیاری)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات مربی -->
                    <div class="card mt-3 print-hide">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=مربی+تغذیه&background=10b981&color=fff&size=64"
                                         class="rounded-circle" width="64" height="64" alt="مربی تغذیه">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">طراحی شده توسط: مربی تغذیه</h6>
                                    <p class="text-muted mb-0">
                                        <i class="ri-mail-line me-1"></i>
                                        nutrition@coach.com
                                        <i class="ri-phone-line ms-3 me-1"></i>
                                        ۰۹۱۲۳۴۵۶۷۸۹
                                    </p>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="ri-calendar-line me-1"></i>
                                            آخرین به‌روزرسانی: ۱۴۰۳/۰۱/۲۰
                                        </small>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <button class="btn btn-outline-primary">
                                        <i class="ri-message-3-line me-1"></i>
                                        سوال از مربی
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
        // علامت‌گذاری وعده‌های تکمیل شده
        document.querySelectorAll('.meal-schedule').forEach((meal, index) => {
            const checkBtn = meal.querySelector('button');
            if (checkBtn) {
                checkBtn.addEventListener('click', function() {
                    const isCompleted = this.classList.contains('btn-success');
                    this.classList.toggle('btn-success', !isCompleted);
                    this.classList.toggle('btn-outline-primary', isCompleted);

                    const icon = this.querySelector('i');
                    icon.classList.toggle('ri-check-double-line', !isCompleted);
                    icon.classList.toggle('ri-check-line', isCompleted);

                    const text = isCompleted ? 'تکمیل شده' : 'تأیید تکمیل';
                    this.innerHTML = `<i class="${isCompleted ? 'ri-check-double-line' : 'ri-check-line'} me-1"></i>${text}`;

                    // نمایش پیام
                    const mealName = meal.querySelector('h6').textContent.trim();
                    const message = isCompleted ? `وعده ${mealName} تکمیل نشد` : `وعده ${mealName} با موفقیت تکمیل شد`;
                    showToast(message, isCompleted ? 'warning' : 'success');
                });
            }
        });

        // نمایش نوتیفیکیشن
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // فعال‌سازی پرینت
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                e.preventDefault();
                window.print();
            }
        });

        // نشانگر پیشرفت روز
        const today = new Date().getDay(); // 0-6
        const dayTabs = document.querySelectorAll('#daysTabs .nav-link');
        if (dayTabs[today]) {
            dayTabs[today].classList.add('active');
            dayTabs[today].click();
        }
    </script>
@endsection
