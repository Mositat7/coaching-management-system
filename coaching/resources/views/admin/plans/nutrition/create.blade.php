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
                                        <input type="text" class="form-control form-control-sm meal-name"
                                               value="صبحانه" placeholder="نام وعده">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small d-flex justify-content-between align-items-center">
                                            <span>مواد غذایی این وعده</span>
                                            <span class="text-muted fst-italic" style="font-size: 0.8rem;">نام، وزن (گرم)، کالری، پروتئین / کربوهیدرات / چربی</span>
                                        </label>
                                        <input type="hidden" class="meal-items-json" value="[]">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm food-name" placeholder="نام ماده غذایی (مثلاً سبوس، چای سبز)">
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control food-weight" placeholder="100" min="0" step="1">
                                                    <span class="input-group-text">گرم</span>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control food-kcal" placeholder="کالری" min="0" step="1">
                                                    <span class="input-group-text">kcal</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex gap-1">
                                                    <input type="number" class="form-control form-control-sm food-protein" placeholder="پ (g)" min="0" step="0.1">
                                                    <input type="number" class="form-control form-control-sm food-carbs" placeholder="ک (g)" min="0" step="0.1">
                                                    <input type="number" class="form-control form-control-sm food-fat" placeholder="چ (g)" min="0" step="0.1">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2" onclick="addFoodItem(this)">
                                            <i class="ri-add-line me-1"></i>
                                            افزودن به لیست مواد غذایی
                                        </button>
                                        <div class="meal-items-list"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">زمان مصرف</label>
                                                <input type="text" class="form-control form-control-sm meal-time-text"
                                                       value="۷:۰۰ - ۸:۰۰" placeholder="ساعت">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">کالری وعده</label>
                                                <input type="number" class="form-control form-control-sm meal-calories"
                                                       value="350" min="0" max="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">اولویت</label>
                                                <select class="form-control form-control-sm meal-priority">
                                                    <option value="required">ضروری</option>
                                                    <option value="optional">اختیاری</option>
                                                    <option value="if_possible">در صورت امکان</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">توضیحات</label>
                                        <textarea class="form-control form-control-sm meal-description" rows="2"
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
                                        <input type="text" class="form-control form-control-sm meal-name"
                                               value="ناهار" placeholder="نام وعده">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small d-flex justify-content-between align-items-center">
                                            <span>مواد غذایی این وعده</span>
                                            <span class="text-muted fst-italic" style="font-size: 0.8rem;">نام، وزن، کالری، پروتئین / کربوهیدرات / چربی</span>
                                        </label>
                                        <input type="hidden" class="meal-items-json" value="[]">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control form-control-sm food-name" placeholder="نام ماده غذایی">
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control food-weight" placeholder="150" min="0" step="1">
                                                    <span class="input-group-text">گرم</span>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" class="form-control food-kcal" placeholder="کالری" min="0" step="1">
                                                    <span class="input-group-text">kcal</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex gap-1">
                                                    <input type="number" class="form-control form-control-sm food-protein" placeholder="پ (g)" min="0" step="0.1">
                                                    <input type="number" class="form-control form-control-sm food-carbs" placeholder="ک (g)" min="0" step="0.1">
                                                    <input type="number" class="form-control form-control-sm food-fat" placeholder="چ (g)" min="0" step="0.1">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2" onclick="addFoodItem(this)">
                                            <i class="ri-add-line me-1"></i>
                                            افزودن به لیست مواد غذایی
                                        </button>
                                        <div class="meal-items-list"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">زمان مصرف</label>
                                                <input type="text" class="form-control form-control-sm meal-time-text"
                                                       value="۱۲:۳۰ - ۱۳:۳۰" placeholder="ساعت">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">کالری وعده</label>
                                                <input type="number" class="form-control form-control-sm meal-calories"
                                                       value="550" min="0" max="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label small">اولویت</label>
                                                <select class="form-control form-control-sm meal-priority">
                                                    <option value="required" selected>ضروری</option>
                                                    <option value="optional">اختیاری</option>
                                                    <option value="if_possible">در صورت امکان</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small">توضیحات</label>
                                        <textarea class="form-control form-control-sm meal-description" rows="2"
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
                <label class="form-label small">نام وعده</label>
                <input type="text" class="form-control form-control-sm meal-name" value="${mealType}" placeholder="نام وعده">
            </div>
            <div class="mb-3">
                <label class="form-label small">مواد غذایی این وعده</label>
                <input type="hidden" class="meal-items-json" value="[]">
                <div class="row g-2 mb-2">
                    <div class="col-md-4"><input type="text" class="form-control form-control-sm food-name" placeholder="نام ماده غذایی"></div>
                    <div class="col-6 col-md-2"><div class="input-group input-group-sm"><input type="number" class="form-control food-weight" placeholder="100" min="0" step="1"><span class="input-group-text">گرم</span></div></div>
                    <div class="col-6 col-md-2"><div class="input-group input-group-sm"><input type="number" class="form-control food-kcal" placeholder="کالری" min="0" step="1"><span class="input-group-text">kcal</span></div></div>
                    <div class="col-12 col-md-4"><div class="d-flex gap-1"><input type="number" class="form-control form-control-sm food-protein" placeholder="پ" min="0" step="0.1"><input type="number" class="form-control form-control-sm food-carbs" placeholder="ک" min="0" step="0.1"><input type="number" class="form-control form-control-sm food-fat" placeholder="چ" min="0" step="0.1"></div></div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2" onclick="addFoodItem(this)"><i class="ri-add-line me-1"></i>افزودن به لیست مواد غذایی</button>
                <div class="meal-items-list"></div>
            </div>
            <div class="row">
                <div class="col-lg-4"><div class="mb-3"><label class="form-label small">زمان مصرف</label><input type="text" class="form-control form-control-sm meal-time-text" placeholder="۱۰:۰۰ - ۱۱:۰۰"></div></div>
                <div class="col-lg-4"><div class="mb-3"><label class="form-label small">کالری وعده</label><input type="number" class="form-control form-control-sm meal-calories" value="0" min="0" max="2000"></div></div>
                <div class="col-lg-4"><div class="mb-3"><label class="form-label small">اولویت</label><select class="form-control form-control-sm meal-priority"><option value="required">ضروری</option><option value="optional">اختیاری</option><option value="if_possible" selected>در صورت امکان</option></select></div></div>
            </div>
            <div class="mb-3"><label class="form-label small">توضیحات</label><textarea class="form-control form-control-sm meal-description" rows="2" placeholder="نکات مهم درباره این وعده..."></textarea></div>
        </div>`;

            document.getElementById('meals-container').insertAdjacentHTML('beforeend', newMeal);
            if (typeof updatePreview === 'function') updatePreview();
        }

        // افزودن ماده غذایی به لیست وعده
        function addFoodItem(button) {
            const card = button.closest('.meal-card');
            const name = (card.querySelector('.food-name') && card.querySelector('.food-name').value.trim()) || '';
            if (!name) { alert('نام ماده غذایی را وارد کنید.'); return; }
            const weight = parseFloat(card.querySelector('.food-weight') && card.querySelector('.food-weight').value) || 0;
            const calories = parseFloat(card.querySelector('.food-kcal') && card.querySelector('.food-kcal').value) || 0;
            const protein = parseFloat(card.querySelector('.food-protein') && card.querySelector('.food-protein').value) || 0;
            const carbs = parseFloat(card.querySelector('.food-carbs') && card.querySelector('.food-carbs').value) || 0;
            const fat = parseFloat(card.querySelector('.food-fat') && card.querySelector('.food-fat').value) || 0;
            const hidden = card.querySelector('.meal-items-json');
            const listEl = card.querySelector('.meal-items-list');
            const items = JSON.parse(hidden.value || '[]');
            items.push({ name: name, weight: weight, calories: calories, protein: protein, carbs: carbs, fat: fat });
            hidden.value = JSON.stringify(items);
            const row = document.createElement('div');
            row.className = 'ingredient-item d-flex justify-content-between align-items-center w-100 border rounded p-2 mb-2 small';
            row.innerHTML = '<div><span class="fw-medium">' + name + '</span><small class="text-muted ms-2">' + (weight ? weight + 'g' : '') + '</small></div><div class="text-end"><span class="text-success">' + calories + ' kcal</span><br><span class="text-muted">' + protein + 'P • ' + carbs + 'C • ' + fat + 'F</span></div>';
            listEl.appendChild(row);
            card.querySelector('.food-name').value = '';
            if (card.querySelector('.food-weight')) card.querySelector('.food-weight').value = '';
            if (card.querySelector('.food-kcal')) card.querySelector('.food-kcal').value = '';
            if (card.querySelector('.food-protein')) card.querySelector('.food-protein').value = '';
            if (card.querySelector('.food-carbs')) card.querySelector('.food-carbs').value = '';
            if (card.querySelector('.food-fat')) card.querySelector('.food-fat').value = '';
        }

        // حذف وعده
        function removeMeal(button) {
            if (confirm('آیا از حذف این وعده مطمئن هستید؟')) {
                button.closest('.meal-card').remove();
                mealCount--;
                if (typeof updatePreview === 'function') updatePreview();
            }
        }

        // ارسال فرم با جمع‌آوری وعده‌ها و مواد غذایی
        document.getElementById('nutrition-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const days = [{ day_index: 0, title: 'روز ۱', notes: '', meals: [] }];
            document.querySelectorAll('#meals-container .meal-card').forEach(function(card) {
                const itemsJson = card.querySelector('.meal-items-json');
                const items = itemsJson ? JSON.parse(itemsJson.value || '[]') : [];
                days[0].meals.push({
                    name: (card.querySelector('.meal-name') && card.querySelector('.meal-name').value) || 'وعده',
                    time_text: (card.querySelector('.meal-time-text') && card.querySelector('.meal-time-text').value) || '',
                    calories: parseInt((card.querySelector('.meal-calories') && card.querySelector('.meal-calories').value) || 0, 10),
                    priority: (card.querySelector('.meal-priority') && card.querySelector('.meal-priority').value) || 'required',
                    description: (card.querySelector('.meal-description') && card.querySelector('.meal-description').value) || '',
                    items: items
                });
            });
            const nameInput = document.getElementById('program-name') || form.querySelector('[name="name"]');
            const payload = {
                _token: form.querySelector('input[name="_token"]').value,
                name: (nameInput && nameInput.value) ? nameInput.value : '',
                goal: form.querySelector('[name="goal"]') && form.querySelector('[name="goal"]').value,
                level: form.querySelector('[name="level"]') && form.querySelector('[name="level"]').value,
                duration_days: form.querySelector('[name="duration_days"]') && form.querySelector('[name="duration_days"]').value,
                daily_calories: form.querySelector('[name="daily_calories"]') && form.querySelector('[name="daily_calories"]').value,
                description: form.querySelector('[name="description"]') && form.querySelector('[name="description"]').value,
                notes: form.querySelector('[name="notes"]') && form.querySelector('[name="notes"]').value,
                supplements: (function() { var a = []; form.querySelectorAll('input[name="supplements[]"]:checked').forEach(function(el) { a.push(el.value); }); var sel = form.querySelector('select[name="supplements[]"]'); if (sel) for (var i = 0; i < sel.options.length; i++) if (sel.options[i].selected) a.push(sel.options[i].value); return a; })(),
                restrictions: (function() { var a = []; var sel = form.querySelector('select[name="restrictions[]"]'); if (sel) for (var i = 0; i < sel.options.length; i++) if (sel.options[i].selected) a.push(sel.options[i].value); return a; })(),
                days: days
            };
            fetch(form.action, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': payload._token },
                body: JSON.stringify(payload)
            }).then(function(r) {
                return r.json().then(function(data) { return { ok: r.ok, data: data }; }).catch(function() { return { ok: r.ok, data: null }; });
            }).then(function(res) {
                if (res.ok && res.data && res.data.success) {
                    window.location.href = '{{ route("plans.library") }}?saved=1';
                } else {
                    window.location.href = '{{ route("plans.library") }}';
                }
            }).catch(function() {
                window.location.href = '{{ route("plans.library") }}';
            });
        });
    </script>
@endsection
