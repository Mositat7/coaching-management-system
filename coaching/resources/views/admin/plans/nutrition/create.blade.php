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

            <!-- هدر فشرده با دکمه‌های ارسال / ذخیره -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-3 px-3 px-md-4 d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3 gap-lg-4">
                            <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 d-none d-md-flex align-items-center justify-content-center">
                                    <i class="ri-restaurant-fill fs-4 text-success"></i>
                                </div>
                                    <div class="min-w-0 flex-grow-1">
                                        <input type="text"
                                               class="form-control form-control-lg border-0 bg-transparent px-0 fw-semibold"
                                               id="program-name"
                                               name="name"
                                               form="nutrition-form"
                                               placeholder="نام برنامه غذایی خود را اینجا بنویسید..."
                                               style="font-size: 1.1rem;"
                                               required>
                                    </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2 flex-shrink-0">
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                                <button type="submit" form="nutrition-form" class="btn btn-success btn-sm">
                                    <i class="ri-save-3-line me-1"></i>
                                    ذخیره برنامه غذایی
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form id="nutrition-form" action="{{ route('nutrition.store') }}" method="POST">
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
                                                <i class="ri-target-line me-1"></i>
                                                هدف برنامه <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="program-goal" name="goal" required>
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
                                            <select class="form-control" id="program-level" name="level" required>
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
                                            <select class="form-control" id="program-duration" name="duration_days" required>
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
                                                       name="daily_calories"
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
                                            <textarea class="form-control" id="program-description" name="description"
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
                                        <label class="form-label small d-flex justify-content-between align-items-center">
                                            <span>مواد غذایی</span>
                                            <span class="text-muted fst-italic" style="font-size: 0.8rem;">نام، وزن، کالری، پروتئین / کربوهیدرات / چربی</span>
                                        </label>

                                        <!-- فرم ورود ماده غذایی جدید -->
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm" placeholder="نام ماده غذایی">
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control" placeholder="100">
                                                    <span class="input-group-text">گرم</span>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control" placeholder="کالری">
                                                    <span class="input-group-text">kcal</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex gap-1">
                                                    <input type="number" class="form-control form-control-sm" placeholder="پروتئین (g)">
                                                    <input type="number" class="form-control form-control-sm" placeholder="کربوهیدرات (g)">
                                                    <input type="number" class="form-control form-control-sm" placeholder="چربی (g)">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2">
                                            <i class="ri-add-line me-1"></i>
                                            افزودن به لیست مواد غذایی
                                        </button>

                                        <hr class="my-2">

                                        <!-- نمونه لیست مواد غذایی این وعده (نمایشی) -->
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">نان سبوس‌دار</span>
                                                    <small class="text-muted ms-2">۲ برش (۶۰g)</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۱۵۰ kcal</div>
                                                    <div class="text-muted">۵P • ۲۸C • ۲F</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">پنیر کم‌چرب</span>
                                                    <small class="text-muted ms-2">۳۰g</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۸۰ kcal</div>
                                                    <div class="text-muted">۷P • ۱C • ۵F</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">چای سبز</span>
                                                    <small class="text-muted ms-2">۱ فنجان</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۲ kcal</div>
                                                    <div class="text-muted">۰P • ۰C • ۰F</div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <label class="form-label small d-flex justify-content-between align-items-center">
                                            <span>مواد غذایی</span>
                                            <span class="text-muted fst-italic" style="font-size: 0.8rem;">نام، وزن، کالری، پروتئین / کربوهیدرات / چربی</span>
                                        </label>

                                        <!-- فرم ورود ماده غذایی جدید -->
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm" placeholder="نام ماده غذایی">
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control" placeholder="مثال: 150">
                                                    <span class="input-group-text">گرم</span>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control" placeholder="کالری">
                                                    <span class="input-group-text">kcal</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex gap-1">
                                                    <input type="number" class="form-control form-control-sm" placeholder="پروتئین (g)">
                                                    <input type="number" class="form-control form-control-sm" placeholder="کربوهیدرات (g)">
                                                    <input type="number" class="form-control form-control-sm" placeholder="چربی (g)">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2">
                                            <i class="ri-add-line me-1"></i>
                                            افزودن به لیست مواد غذایی
                                        </button>

                                        <hr class="my-2">

                                        <!-- نمونه لیست مواد غذایی این وعده (نمایشی) -->
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">مرغ گریل شده</span>
                                                    <small class="text-muted ms-2">۱۵۰g</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۲۵۰ kcal</div>
                                                    <div class="text-muted">۳۰P • ۰C • ۸F</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">برنج قهوه‌ای</span>
                                                    <small class="text-muted ms-2">۱ پیمانه</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۲۰۰ kcal</div>
                                                    <div class="text-muted">۴P • ۴۲C • ۲F</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">سالاد سبزیجات</span>
                                                    <small class="text-muted ms-2">۱ کاسه</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۵۰ kcal</div>
                                                    <div class="text-muted">۲P • ۸C • ۱F</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ingredient-item">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div>
                                                    <span class="fw-medium">ماست کم‌چرب</span>
                                                    <small class="text-muted ms-2">۱۰۰g</small>
                                                </div>
                                                <div class="text-end small">
                                                    <div class="text-success">۵۰ kcal</div>
                                                    <div class="text-muted">۴P • ۵C • ۱F</div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <select class="form-select" name="restrictions[]" multiple>
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
                                            <select class="form-select" name="supplements[]" multiple>
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
                                            <textarea class="form-control" name="notes" rows="4"
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
                                                        <input class="form-check-input" type="checkbox" id="supplement1" name="supplements[]" value="multivitamin">
                                                        <label class="form-check-label" for="supplement1">مولتی ویتامین</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="supplement2" name="supplements[]" value="vitamin_d" checked>
                                                        <label class="form-check-label" for="supplement2">ویتامین D</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="supplement3" name="supplements[]" value="omega_3">
                                                        <label class="form-check-label" for="supplement3">امگا ۳</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- دکمه‌های نهایی (فقط انصراف، چون ذخیره بالا است) -->
                        <div class="mt-3 text-end">
                            <a href="{{ route('plans.library') }}" class="btn btn-light">
                                <i class="ri-close-line me-1"></i>
                                انصراف
                            </a>
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

        // ارسال فرم (فعلاً فقط جلوگیری از رفرش کامل صفحه)
        // فرم مستقیماً به روت بک‌اند ارسال می‌شود (nutrition.store)
    </script>
@endsection
