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
                                <a href="{{ route('nutrition.show', ['plan' => $plan->id]) }}">{{ $plan->name }}</a>
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
                                <p class="text-muted">{{ $plan->name }}</p>
                            </div>

                            <!-- اطلاعات برنامه -->
                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">شناسه:</small>
                                    <span class="badge bg-dark">#{{ $plan->id }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">تاریخ ایجاد:</small>
                                    <span class="small">{{ $plan->created_at?->format('Y/m/d') }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <span class="small">{{ $plan->updated_at?->format('Y/m/d') }}</span>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mb-2">
                                <a href="{{ route('nutrition.show', ['plan' => $plan->id]) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="ri-eye-line me-1"></i>پیش‌نمایش
                                </a>
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
                                    <a href="{{ route('nutrition.show', ['plan' => $plan->id]) }}" class="btn btn-outline-primary w-100">
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
                    <form id="nutrition-edit-form" action="{{ route('nutrition.update', ['plan' => $plan->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- هدر فشرده و تمیز برای ویرایش -->
                        <div class="card mb-3 border-0 shadow-sm">
                            <div class="card-body py-3 px-3 px-md-4">
                                <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3">
                                    <div class="d-flex align-items-center flex-grow-1 min-w-0 gap-3">
                                        <div class="flex-shrink-0 d-none d-sm-flex">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2 d-inline-flex align-items-center justify-content-center">
                                                <i class="ri-restaurant-fill fs-4 text-success"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <input type="text"
                                                   class="form-control form-control-lg border-0 px-0 fw-semibold text-truncate"
                                                   name="name" id="program-name" form="nutrition-edit-form"
                                                   value="{{ old('name', $plan->name) }}"
                                                   placeholder="نام برنامه غذایی"
                                                   required>
                                            <div class="d-flex flex-wrap align-items-center gap-2 mt-1 small text-muted">
                                                <span class="badge bg-success-subtle text-success">فعال</span>
                                                <span class="badge bg-info-subtle text-info">تغذیه</span>
                                                <span>
                                                    <i class="ri-calendar-line me-1"></i>
                                                    آخرین ویرایش: {{ $plan->updated_at?->format('Y/m/d') }}
                                              </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2 justify-content-lg-end">
                                        <a href="{{ route('plans.library') }}" class="btn btn-light btn-sm">
                                            <i class="ri-arrow-go-back-line me-1"></i>
                                            بازگشت
                                        </a>
                                        <a href="{{ route('nutrition.show', ['plan' => $plan->id]) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="ri-eye-line me-1"></i>
                                            پیش‌نمایش
                                        </a>
                                        <button type="submit" form="nutrition-edit-form" class="btn btn-warning btn-sm">
                                            <i class="ri-save-3-line me-1"></i>
                                            ذخیره تغییرات
                                        </button>
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
                                                    <select class="form-control" name="goal" id="edit-goal">
                                                        <option value="">انتخاب هدف</option>
                                                        <option value="weight_loss" @selected($plan->goal === 'weight_loss')>کاهش وزن</option>
                                                        <option value="muscle_gain" @selected($plan->goal === 'muscle_gain')>افزایش حجم عضلات</option>
                                                        <option value="maintenance" @selected($plan->goal === 'maintenance')>نگهداری وزن</option>
                                                        <option value="detox" @selected($plan->goal === 'detox')>سم‌زدایی</option>
                                                        <option value="energy" @selected($plan->goal === 'energy')>افزایش انرژی</option>
                                                        <option value="health" @selected($plan->goal === 'health')>سلامت عمومی</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">سطح</label>
                                                    <select class="form-control" name="level" id="edit-level">
                                                        <option value="">انتخاب سطح</option>
                                                        <option value="beginner" @selected($plan->level === 'beginner')>مبتدی</option>
                                                        <option value="intermediate" @selected($plan->level === 'intermediate')>متوسط</option>
                                                        <option value="advanced" @selected($plan->level === 'advanced')>پیشرفته</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">مدت برنامه (روز)</label>
                                                    <input type="number" class="form-control" name="duration_days"
                                                           value="{{ old('duration_days', $plan->duration_days ?? 14) }}" min="1" max="365">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">کالری روزانه</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="daily_calories"
                                                               value="{{ old('daily_calories', $plan->daily_calories ?? 1800) }}" min="800" max="5000">
                                                        <span class="input-group-text">کالری</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">توضیحات</label>
                                                    <textarea class="form-control" rows="4" name="description" id="edit-description">{{ old('description', $plan->description) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نکات مهم</label>
                                                    <textarea class="form-control" rows="3" name="notes" placeholder="نکات ایمنی و دستورالعمل‌ها...">{{ old('notes', $plan->notes) }}</textarea>
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

                                                <div class="mb-3">
                                                    <label class="form-label small">نام وعده</label>
                                                    <input type="text" class="form-control form-control-sm meal-name" value="صبحانه">
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
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">زمان مصرف</label><input type="text" class="form-control form-control-sm meal-time-text" value="۷:۰۰ - ۸:۰۰"></div></div>
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">کالری وعده</label><input type="number" class="form-control form-control-sm meal-calories" value="350" min="0" max="2000"></div></div>
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">اولویت</label><select class="form-control form-control-sm meal-priority"><option value="required">ضروری</option><option value="optional">اختیاری</option><option value="if_possible">در صورت امکان</option></select></div></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small">توضیحات</label>
                                                    <textarea class="form-control form-control-sm meal-description" rows="2">صبحانه با پروتئین بالا برای شروع روز</textarea>
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
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMeal(this)"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small">نام وعده</label>
                                                    <input type="text" class="form-control form-control-sm meal-name" value="ناهار">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small">مواد غذایی این وعده</label>
                                                    <input type="hidden" class="meal-items-json" value="[]">
                                                    <div class="row g-2 mb-2">
                                                        <div class="col-md-4"><input type="text" class="form-control form-control-sm food-name" placeholder="نام ماده غذایی"></div>
                                                        <div class="col-6 col-md-2"><div class="input-group input-group-sm"><input type="number" class="form-control food-weight" placeholder="150" min="0" step="1"><span class="input-group-text">گرم</span></div></div>
                                                        <div class="col-6 col-md-2"><div class="input-group input-group-sm"><input type="number" class="form-control food-kcal" placeholder="کالری" min="0" step="1"><span class="input-group-text">kcal</span></div></div>
                                                        <div class="col-12 col-md-4"><div class="d-flex gap-1"><input type="number" class="form-control form-control-sm food-protein" placeholder="پ" min="0" step="0.1"><input type="number" class="form-control form-control-sm food-carbs" placeholder="ک" min="0" step="0.1"><input type="number" class="form-control form-control-sm food-fat" placeholder="چ" min="0" step="0.1"></div></div>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-outline-success w-100 mb-2" onclick="addFoodItem(this)"><i class="ri-add-line me-1"></i>افزودن به لیست مواد غذایی</button>
                                                    <div class="meal-items-list"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">زمان مصرف</label><input type="text" class="form-control form-control-sm meal-time-text" value="۱۲:۳۰ - ۱۳:۳۰"></div></div>
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">کالری وعده</label><input type="number" class="form-control form-control-sm meal-calories" value="550" min="0" max="2000"></div></div>
                                                    <div class="col-lg-4"><div class="mb-3"><label class="form-label small">اولویت</label><select class="form-control form-control-sm meal-priority"><option value="required">ضروری</option><option value="optional">اختیاری</option><option value="if_possible">در صورت امکان</option></select></div></div>
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
                                                    <textarea class="form-control form-control-sm meal-description" rows="2">ناهار با پروتئین بالا و کربوهیدرات متوسط</textarea>
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
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement1" name="supplements[]" value="multivitamin" @checked(in_array('multivitamin', $plan->supplements ?? []))>
                                                                <label class="form-check-label" for="edit-supplement1">مولتی ویتامین</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement2" name="supplements[]" value="vitamin_d" @checked(in_array('vitamin_d', $plan->supplements ?? []))>
                                                                <label class="form-check-label" for="edit-supplement2">ویتامین D</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement3" name="supplements[]" value="omega_3" @checked(in_array('omega_3', $plan->supplements ?? []))>
                                                                <label class="form-check-label" for="edit-supplement3">امگا ۳</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" id="edit-supplement4" name="supplements[]" value="protein" @checked(in_array('protein', $plan->supplements ?? []))>
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

        // افزودن ماده غذایی به لیست وعده (همان منطق صفحه ایجاد)
        function addFoodItem(button) {
            var card = button.closest('.meal-card');
            var name = (card.querySelector('.food-name') && card.querySelector('.food-name').value.trim()) || '';
            if (!name) { alert('نام ماده غذایی را وارد کنید.'); return; }
            var weight = parseFloat(card.querySelector('.food-weight') && card.querySelector('.food-weight').value) || 0;
            var calories = parseFloat(card.querySelector('.food-kcal') && card.querySelector('.food-kcal').value) || 0;
            var protein = parseFloat(card.querySelector('.food-protein') && card.querySelector('.food-protein').value) || 0;
            var carbs = parseFloat(card.querySelector('.food-carbs') && card.querySelector('.food-carbs').value) || 0;
            var fat = parseFloat(card.querySelector('.food-fat') && card.querySelector('.food-fat').value) || 0;
            var hidden = card.querySelector('.meal-items-json');
            var listEl = card.querySelector('.meal-items-list');
            if (!hidden || !listEl) return;
            var items = JSON.parse(hidden.value || '[]');
            items.push({ name: name, weight: weight, calories: calories, protein: protein, carbs: carbs, fat: fat });
            hidden.value = JSON.stringify(items);
            var row = document.createElement('div');
            row.className = 'ingredient-item d-flex justify-content-between align-items-center w-100 border rounded p-2 mb-2 small';
            row.innerHTML = '<div><span class="fw-medium">' + name + '</span><small class="text-muted ms-2">' + (weight ? weight + 'g' : '') + '</small></div><div class="text-end"><span class="text-success">' + calories + ' kcal</span><br><span class="text-muted">' + protein + 'P • ' + carbs + 'C • ' + fat + 'F</span></div>';
            listEl.appendChild(row);
            if (card.querySelector('.food-name')) card.querySelector('.food-name').value = '';
            if (card.querySelector('.food-weight')) card.querySelector('.food-weight').value = '';
            if (card.querySelector('.food-kcal')) card.querySelector('.food-kcal').value = '';
            if (card.querySelector('.food-protein')) card.querySelector('.food-protein').value = '';
            if (card.querySelector('.food-carbs')) card.querySelector('.food-carbs').value = '';
            if (card.querySelector('.food-fat')) card.querySelector('.food-fat').value = '';
        }

        // ارسال فرم ویرایش با PUT و payload مشابه صفحه ایجاد
        document.getElementById('nutrition-edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = this;
            var days = [{ day_index: 0, title: 'روز ۱', notes: '', meals: [] }];
            document.querySelectorAll('#meals-container .meal-card').forEach(function(card) {
                var itemsJson = card.querySelector('.meal-items-json');
                var items = itemsJson ? JSON.parse(itemsJson.value || '[]') : [];
                var nameEl = card.querySelector('.meal-name');
                var timeEl = card.querySelector('.meal-time-text');
                var calEl = card.querySelector('.meal-calories');
                var prioEl = card.querySelector('.meal-priority');
                var descEl = card.querySelector('.meal-description');
                days[0].meals.push({
                    name: (nameEl && nameEl.value) || 'وعده',
                    time_text: (timeEl && timeEl.value) || '',
                    calories: parseInt((calEl && calEl.value) || 0, 10),
                    priority: (prioEl && prioEl.value) || 'required',
                    description: (descEl && descEl.value) || '',
                    items: items
                });
            });
            var nameInput = document.getElementById('program-name') || form.querySelector('[name="name"]');
            var payload = {
                _token: form.querySelector('input[name="_token"]').value,
                _method: 'PUT',
                name: (nameInput && nameInput.value) ? nameInput.value : '',
                goal: form.querySelector('[name="goal"]') && form.querySelector('[name="goal"]').value,
                level: form.querySelector('[name="level"]') && form.querySelector('[name="level"]').value,
                duration_days: form.querySelector('[name="duration_days"]') && form.querySelector('[name="duration_days"]').value,
                daily_calories: form.querySelector('[name="daily_calories"]') && form.querySelector('[name="daily_calories"]').value,
                description: form.querySelector('[name="description"]') && form.querySelector('[name="description"]').value,
                notes: form.querySelector('[name="notes"]') && form.querySelector('[name="notes"]').value,
                supplements: (function() { var a = []; form.querySelectorAll('input[name="supplements[]"]:checked').forEach(function(el) { a.push(el.value); }); return a; })(),
                restrictions: (function() { var a = []; var sel = form.querySelector('select[name="restrictions[]"]'); if (sel) for (var i = 0; i < sel.options.length; i++) if (sel.options[i].selected) a.push(sel.options[i].value); return a; })(),
                days: days
            };
            fetch(form.action, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': payload._token },
                body: JSON.stringify(payload)
            }).then(function(r) { return r.json().then(function(data) { return { ok: r.ok, data: data }; }).catch(function() { return { ok: r.ok, data: null }; }); })
              .then(function(res) {
                if (res.ok && res.data && res.data.success) window.location.href = '{{ route("plans.library") }}?saved=1';
                else window.location.href = '{{ route("plans.library") }}';
            }).catch(function() { window.location.href = '{{ route("plans.library") }}'; });
        });
    </script>
@endsection
