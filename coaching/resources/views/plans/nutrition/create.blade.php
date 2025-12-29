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
        }
        [data-bs-theme="dark"] .ingredient-item {
            background: rgba(30, 41, 59, 0.3);
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
                            ساخت برنامه غذایی جدید
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
                                    برنامه‌ها
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                برنامه غذایی جدید
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <!-- سایدبار پیش‌نمایش -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-block">
                                    <i class="ri-restaurant-fill fs-36 text-success"></i>
                                </div>
                                <h5 class="mt-3 mb-1">پیش‌نمایش برنامه غذایی</h5>
                                <p class="text-muted" id="preview-goal">هدف: تعریف نشده</p>
                            </div>

                            <!-- خلاصه تغذیه -->
                            <div class="border rounded p-3 mb-3">
                                <div class="text-center mb-3">
                                    <div class="calorie-circle mx-auto">
                                        <span class="fs-20 fw-bold text-success" id="preview-calories">0</span>
                                        <small class="text-muted">کالری</small>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="fw-medium" id="preview-meals">0</div>
                                            <small class="text-muted">وعده</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="fw-medium" id="preview-days">0</div>
                                            <small class="text-muted">روز</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- مواد غذایی اصلی -->
                            <div class="mt-3">
                                <h6 class="fw-semibold mb-2">مواد غذایی اصلی:</h6>
                                <div id="preview-ingredients">
                                    <span class="badge bg-light text-dark me-1 mb-1">هیچ کدام</span>
                                </div>
                            </div>

                            <!-- هشدارها -->
                            <div class="mt-4">
                                <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25">
                                    <i class="ri-alert-line me-2"></i>
                                    <small>اطلاعات غذایی پیشنهادی است. برای مشاوره تخصصی به متخصص تغذیه مراجعه کنید.</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="d-grid gap-2">
                                <button type="submit" form="nutrition-form" class="btn btn-success">
                                    <i class="ri-save-line me-1"></i>
                                    ذخیره برنامه غذایی
                                </button>
                                <a href="{{ route('plans.library') }}" class="btn btn-light">
                                    <i class="ri-arrow-go-back-line me-1"></i>
                                    بازگشت
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- فرم اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <form id="nutrition-form" action="#" method="POST">
                        @csrf

                        <!-- اطلاعات کلی -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-information-line me-2"></i>
                                    اطلاعات کلی برنامه
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-pencil-line me-1"></i>
                                                نام برنامه غذایی <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control"
                                                   id="program-name"
                                                   placeholder="مثال: رژیم کاهش وزن ۱۵۰۰ کالری"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-target-line me-1"></i>
                                                هدف برنامه <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="program-goal" required>
                                                <option value="">انتخاب هدف</option>
                                                <option value="weight_loss">کاهش وزن</option>
                                                <option value="muscle_gain">افزایش حجم عضلات</option>
                                                <option value="maintenance">نگهداری وزن</option>
                                                <option value="detox">سم‌زدایی و پاکسازی</option>
                                                <option value="energy">افزایش انرژی</option>
                                                <option value="health">سلامت عمومی</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-user-line me-1"></i>
                                                سطح <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="program-level" required>
                                                <option value="">انتخاب سطح</option>
                                                <option value="beginner">مبتدی</option>
                                                <option value="intermediate">متوسط</option>
                                                <option value="advanced">پیشرفته</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-calendar-line me-1"></i>
                                                مدت برنامه <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="program-duration" required>
                                                <option value="">انتخاب مدت</option>
                                                <option value="7">۱ هفته</option>
                                                <option value="14">۲ هفته</option>
                                                <option value="30">۱ ماه</option>
                                                <option value="60">۲ ماه</option>
                                                <option value="90">۳ ماه</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-fire-line me-1"></i>
                                                کالری روزانه <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control"
                                                       id="daily-calories"
                                                       min="800" max="5000"
                                                       step="50"
                                                       value="1800"
                                                       required>
                                                <span class="input-group-text">کالری</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="ri-file-text-line me-1"></i>
                                                توضیحات برنامه
                                            </label>
                                            <textarea class="form-control" id="program-description"
                                                      rows="3"
                                                      placeholder="توضیحات کامل برنامه غذایی، نکات مهم و دستورالعمل‌ها..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- وعده‌های غذایی -->
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="ri-restaurant-2-line me-2"></i>
                                    وعده‌های غذایی
                                </h5>
                                <button type="button" class="btn btn-sm btn-success" onclick="addMeal()">
                                    <i class="ri-add-line me-1"></i>
                                    اضافه کردن وعده
                                </button>
                            </div>
                            <div class="card-body" id="meals-container">
                                <!-- وعده ۱ -->
                                <div class="meal-card">
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
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">نام وعده</label>
                                        <input type="text" class="form-control form-control-sm"
                                               value="صبحانه کامل" placeholder="نام وعده">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">مواد غذایی</label>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">نان سبوس دار</span>
                                                    <small class="text-muted ms-2">۲ برش</small>
                                                </div>
                                                <small class="text-success">۱۵۰ کالری</small>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">پنیر کم چرب</span>
                                                    <small class="text-muted ms-2">۳۰ گرم</small>
                                                </div>
                                                <small class="text-success">۸۰ کالری</small>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">چای سبز</span>
                                                    <small class="text-muted ms-2">۱ فنجان</small>
                                                </div>
                                                <small class="text-success">۲ کالری</small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                                            <i class="ri-add-line me-1"></i>
                                            اضافه کردن ماده غذایی
                                        </button>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">زمان مصرف</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="۷:۰۰ - ۸:۰۰" placeholder="ساعت">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">کالری وعده</label>
                                                <input type="number" class="form-control form-control-sm"
                                                       value="350" min="0" max="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">اولویت</label>
                                                <select class="form-control form-control-sm">
                                                    <option>ضروری</option>
                                                    <option>اختیاری</option>
                                                    <option>در صورت امکان</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">توضیحات</label>
                                        <textarea class="form-control form-control-sm" rows="2"
                                                  placeholder="نکات مهم درباره این وعده...">صبحانه کامل با پروتئین بالا برای شروع روز</textarea>
                                    </div>
                                </div>

                                <!-- وعده ۲ -->
                                <div class="meal-card">
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
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">نام وعده</label>
                                        <input type="text" class="form-control form-control-sm"
                                               value="ناهار پروتئینی" placeholder="نام وعده">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">مواد غذایی</label>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">مرغ گریل شده</span>
                                                    <small class="text-muted ms-2">۱۵۰ گرم</small>
                                                </div>
                                                <small class="text-success">۲۵۰ کالری</small>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">برنج قهوه‌ای</span>
                                                    <small class="text-muted ms-2">۱ پیمانه</small>
                                                </div>
                                                <small class="text-success">۲۰۰ کالری</small>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">سالاد سبزیجات</span>
                                                    <small class="text-muted ms-2">۱ کاسه</small>
                                                </div>
                                                <small class="text-success">۵۰ کالری</small>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="fw-medium">ماست کم چرب</span>
                                                    <small class="text-muted ms-2">۱۰۰ گرم</small>
                                                </div>
                                                <small class="text-success">۵۰ کالری</small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                                            <i class="ri-add-line me-1"></i>
                                            اضافه کردن ماده غذایی
                                        </button>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">زمان مصرف</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="۱۲:۳۰ - ۱۳:۳۰" placeholder="ساعت">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">کالری وعده</label>
                                                <input type="number" class="form-control form-control-sm"
                                                       value="550" min="0" max="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">اولویت</label>
                                                <select class="form-control form-control-sm">
                                                    <option selected>ضروری</option>
                                                    <option>اختیاری</option>
                                                    <option>در صورت امکان</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">توضیحات</label>
                                        <textarea class="form-control form-control-sm" rows="2"
                                                  placeholder="نکات مهم درباره این وعده...">ناهار با پروتئین بالا و کربوهیدرات متوسط</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تنظیمات مواد غذایی -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-list-check me-2"></i>
                                    تنظیمات مواد غذایی
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">مواد غذایی ممنوع</label>
                                            <select class="form-select" multiple>
                                                <option>شکر سفید</option>
                                                <option>نوشابه</option>
                                                <option>فست فود</option>
                                                <option>روغن نباتی</option>
                                                <option>نان سفید</option>
                                                <option>شیرینی‌جات</option>
                                                <option>سس‌های صنعتی</option>
                                                <option>غذاهای کنسروی</option>
                                            </select>
                                            <div class="form-text">مواد غذایی که باید حذف شوند (چند انتخابی)</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">مواد غذایی ضروری</label>
                                            <select class="form-select" multiple>
                                                <option>سبزیجات برگ‌دار</option>
                                                <option>میوه تازه</option>
                                                <option>پروتئین بدون چربی</option>
                                                <option>آجیل و مغزها</option>
                                                <option>حبوبات</option>
                                                <option>غلات کامل</option>
                                                <option>ماهی چرب</option>
                                                <option>تخم مرغ</option>
                                            </select>
                                            <div class="form-text">موادی که باید حتماً مصرف شوند</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">آلرژی‌ها و محدودیت‌ها</label>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy1">
                                                        <label class="form-check-label" for="allergy1">لاکتوز</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy2">
                                                        <label class="form-check-label" for="allergy2">گلوتن</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy3">
                                                        <label class="form-check-label" for="allergy3">بادام زمینی</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy4">
                                                        <label class="form-check-label" for="allergy4">ماهی</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy5" checked>
                                                        <label class="form-check-label" for="allergy5">گیاهخواری</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="allergy6">
                                                        <label class="form-check-label" for="allergy6">ویگان</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- نکات و هشدارها -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-alert-line me-2"></i>
                                    نکات و هشدارها
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">نکات مهم</label>
                                            <textarea class="form-control" rows="4"
                                                      placeholder="نکات ایمنی، دستورالعمل‌ها و هشدارها...">۱. روزانه ۸ لیوان آب بنوشید
۲. از نمک و شکر اضافه پرهیز کنید
۳. وعده‌ها را سر وقت مصرف کنید
۴. در صورت هرگونه مشکل پزشکی با متخصص مشورت کنید
۵. فعالیت بدنی منظم داشته باشید</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">مکمل‌های پیشنهادی</label>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="supplement1">
                                                        <label class="form-check-label" for="supplement1">مولتی ویتامین</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="supplement2" checked>
                                                        <label class="form-check-label" for="supplement2">ویتامین D</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="supplement3">
                                                        <label class="form-check-label" for="supplement3">امگا ۳</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- دکمه‌های نهایی -->
                        <div class="mt-3">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="ri-save-line me-1"></i>
                                        ذخیره
                                    </button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ route('plans.library') }}" class="btn btn-light w-100">
                                        <i class="ri-close-line me-1"></i>
                                        انصراف
                                    </a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-outline-secondary w-100" onclick="previewPlan()">
                                        <i class="ri-eye-line me-1"></i>
                                        پیش‌نمایش
                                    </button>
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
            const mealTypes = ['صبحانه', 'میان وعده صبح', 'ناهار', 'میان وعده عصر', 'شام', 'قبل خواب'];
            const mealType = mealTypes[Math.min(mealCount - 1, mealTypes.length - 1)];

            const newMeal = `
        <div class="meal-card">
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
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </div>

            <div class="mb-3">
                <label class="form-label small">نام وعده</label>
                <input type="text" class="form-control form-control-sm"
                       value="${mealType}" placeholder="نام وعده">
            </div>

            <div class="mb-3">
                <label class="form-label small">مواد غذایی</label>
                <div class="ingredient-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fw-medium">ماده غذایی</span>
                            <small class="text-muted ms-2">مقدار</small>
                        </div>
                        <small class="text-success">۰ کالری</small>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success w-100 mt-2">
                    <i class="ri-add-line me-1"></i>
                    اضافه کردن ماده غذایی
                </button>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label small">زمان مصرف</label>
                        <input type="text" class="form-control form-control-sm"
                               placeholder="مثال: ۱۰:۰۰ - ۱۱:۰۰">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label small">کالری وعده</label>
                        <input type="number" class="form-control form-control-sm"
                               value="0" min="0" max="2000">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label small">اولویت</label>
                        <select class="form-control form-control-sm">
                            <option>ضروری</option>
                            <option>اختیاری</option>
                            <option selected>در صورت امکان</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small">توضیحات</label>
                <textarea class="form-control form-control-sm" rows="2"
                          placeholder="نکات مهم درباره این وعده..."></textarea>
            </div>
        </div>`;

            document.getElementById('meals-container').insertAdjacentHTML('beforeend', newMeal);
            updatePreview();
        }

        // حذف وعده
        function removeMeal(button) {
            if (confirm('آیا از حذف این وعده مطمئن هستید؟')) {
                button.closest('.meal-card').remove();
                mealCount--;
                updatePreview();
            }
        }

        // به‌روزرسانی پیش‌نمایش
        function updatePreview() {
            // به‌روزرسانی تعداد وعده‌ها
            const mealCards = document.querySelectorAll('.meal-card').length;
            document.getElementById('preview-meals').textContent = mealCards;

            // به‌روزرسانی کالری کل
            let totalCalories = 0;
            document.querySelectorAll('input[type="number"]').forEach(input => {
                if (input.value) {
                    totalCalories += parseInt(input.value) || 0;
                }
            });
            document.getElementById('preview-calories').textContent = totalCalories;

            // به‌روزرسانی هدف
            const goalSelect = document.getElementById('program-goal');
            if (goalSelect.value) {
                const goalText = goalSelect.options[goalSelect.selectedIndex].text;
                document.getElementById('preview-goal').textContent = `هدف: ${goalText}`;
            }

            // به‌روزرسانی تعداد روزها
            const durationSelect = document.getElementById('program-duration');
            if (durationSelect.value) {
                const days = parseInt(durationSelect.value);
                document.getElementById('preview-days').textContent = days;
            }
        }

        // پیش‌نمایش کامل
        function previewPlan() {
            updatePreview();
            alert('پیش‌نمایش برنامه آماده شد!');
        }

        // رویدادهای به‌روزرسانی پیش‌نمایش
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = ['program-name', 'program-goal', 'program-duration', 'daily-calories'];
            inputs.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('change', updatePreview);
                    element.addEventListener('input', updatePreview);
                }
            });

            // مقداردهی اولیه
            updatePreview();
        });

        // ارسال فرم
        document.getElementById('nutrition-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('برنامه غذایی با موفقیت ذخیره شد!');
            // در حالت واقعی، اینجا اطلاعات به سرور ارسال می‌شود
        });
    </script>
@endsection
