@extends('layouts.master')

@section('head')
    <style>
        .exercise-edit-card {
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
        }
        .exercise-edit-card:hover {
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
        }
        [data-bs-theme="dark"] .exercise-edit-card {
            background: rgba(30, 41, 59, 0.5);
            border-color: rgba(59, 130, 246, 0.1);
        }
        .set-edit-row {
            background: rgba(241, 245, 249, 0.5);
            border-radius: 8px;
            padding: 15px;
            margin: 8px 0;
            border: 1px dashed rgba(59, 130, 246, 0.3);
        }
        [data-bs-theme="dark"] .set-edit-row {
            background: rgba(30, 41, 59, 0.3);
            border-color: rgba(59, 130, 246, 0.2);
        }
        .set-number-edit {
            width: 32px;
            height: 32px;
            background: #3b82f6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        .muscle-edit-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        .edit-indicator-workout {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 28px;
            height: 28px;
            background: #f59e0b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 1;
            border: 2px solid white;
        }
        [data-bs-theme="dark"] .edit-indicator-workout {
            border-color: #1e293b;
        }
        .difficulty-badge-edit {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
        }
        .difficulty-easy-edit {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .difficulty-medium-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        .difficulty-hard-edit {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        .history-log {
            padding: 8px 12px;
            border-radius: 6px;
            background: rgba(241, 245, 249, 0.5);
            margin-bottom: 4px;
            font-size: 12px;
            border-left: 3px solid #3b82f6;
        }
        [data-bs-theme="dark"] .history-log {
            background: rgba(30, 41, 59, 0.3);
        }
        .rest-time-input {
            max-width: 120px;
        }
        .equipment-tag {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
            border: 1px solid rgba(139, 92, 246, 0.2);
            display: inline-flex;
            align-items: center;
            margin: 2px;
        }
        .tag-remove {
            margin-left: 6px;
            cursor: pointer;
            opacity: 0.7;
        }
        .tag-remove:hover {
            opacity: 1;
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
                            ویرایش برنامه ورزشی
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    <i class="ri-home-4-line"></i>
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">
                                    کتابخانه
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">
                                    برنامه حجم‌گیری فاز اول
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
                                        <i class="ri-dumbbell-fill fs-36 text-warning"></i>
                                    </div>
                                    <span class="edit-indicator-workout">
                                    <i class="ri-pencil-line"></i>
                                </span>
                                </div>
                                <h5 class="mt-3 mb-1">در حال ویرایش</h5>
                                <p class="text-muted">برنامه حجم‌گیری فاز اول</p>
                            </div>

                            <!-- اطلاعات برنامه -->
                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">کد برنامه:</small>
                                    <span class="badge bg-dark">#WRK-001</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">تاریخ ایجاد:</small>
                                    <span class="small">۱۴۰۳/۰۱/۱۰</span>
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
                                    آمار برنامه
                                </h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">شاگردان فعال:</span>
                                    <span class="badge bg-success">۲۴ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">تکمیل شده:</span>
                                    <span class="badge bg-primary">۱۸ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">میانگین امتیاز:</span>
                                    <span class="badge bg-warning">۴.۷/۵</span>
                                </div>
                            </div>

                            <!-- تاریخچه تغییرات -->
                            <div class="mt-4">
                                <h6 class="fw-semibold mb-2">
                                    <i class="ri-history-line me-2"></i>
                                    آخرین تغییرات
                                </h6>
                                <div class="history-log">
                                    <div class="d-flex justify-content-between">
                                        <span>افزایش زمان استراحت</span>
                                        <small class="text-muted">۳ روز پیش</small>
                                    </div>
                                </div>
                                <div class="history-log">
                                    <div class="d-flex justify-content-between">
                                        <span>اضافه کردن تمرین جدید</span>
                                        <small class="text-muted">۱ هفته پیش</small>
                                    </div>
                                </div>
                                <div class="history-log">
                                    <div class="d-flex justify-content-between">
                                        <span>تنظیم مجدد وزن‌ها</span>
                                        <small class="text-muted">۲ هفته پیش</small>
                                    </div>
                                </div>
                            </div>

                            <!-- هشدارهای ویرایش -->
                            <div class="mt-4">
                                <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25">
                                    <i class="ri-alert-line me-2"></i>
                                    <small>تغییرات روی همه شاگردان فعال تأثیر می‌گذارد.</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="d-grid gap-2">
                                <button type="submit" form="workout-edit-form" class="btn btn-warning">
                                    <i class="ri-save-3-line me-1"></i>
                                    ذخیره تغییرات
                                </button>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary w-100" onclick="previewWorkout()">
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
                    <form id="workout-edit-form" action="#" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- هدر برنامه -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm bg-primary bg-opacity-10 rounded-circle p-2">
                                                    <i class="ri-dumbbell-fill fs-20 text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <input type="text" class="form-control form-control-lg border-0 fs-4 fw-bold px-0 bg-transparent"
                                                       value="برنامه حجم‌گیری فاز اول"
                                                       id="workout-title">
                                                <div class="d-flex align-items-center mt-1">
                                                    <span class="badge bg-primary me-2">فعال</span>
                                                    <span class="badge bg-warning me-2">ورزشی</span>
                                                    <span class="text-muted small">
                                                    <i class="ri-calendar-line me-1"></i>
                                                    ۴ هفته - ۵ روز در هفته
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <select class="form-select" id="workout-status">
                                            <option value="active" selected>فعال</option>
                                            <option value="draft">پیش‌نویس</option>
                                            <option value="archived">آرشیو</option>
                                            <option value="disabled">غیرفعال</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تب‌های ویرایش -->
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#workout-basic">
                                            <i class="ri-information-line me-1"></i>
                                            اطلاعات پایه
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#workout-exercises">
                                            <i class="ri-dumbbell-line me-1"></i>
                                            تمرینات
                                            <span class="badge bg-primary rounded-pill ms-1">۸</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#workout-schedule">
                                            <i class="ri-calendar-line me-1"></i>
                                            برنامه زمانی
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#workout-history">
                                            <i class="ri-history-line me-1"></i>
                                            تاریخچه
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- اطلاعات پایه -->
                                    <div class="tab-pane fade show active" id="workout-basic">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">هدف برنامه</label>
                                                    <select class="form-control" id="workout-goal">
                                                        <option value="muscle_gain" selected>افزایش حجم عضلات</option>
                                                        <option value="strength">افزایش قدرت</option>
                                                        <option value="weight_loss">کاهش وزن</option>
                                                        <option value="endurance">افزایش استقامت</option>
                                                        <option value="rehabilitation">توانبخشی</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">سطح</label>
                                                    <select class="form-control" id="workout-level">
                                                        <option value="beginner">مبتدی</option>
                                                        <option value="intermediate" selected>متوسط</option>
                                                        <option value="advanced">پیشرفته</option>
                                                        <option value="professional">حرفه‌ای</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">مدت برنامه (هفته)</label>
                                                    <select class="form-control" id="workout-duration">
                                                        <option value="2">۲ هفته</option>
                                                        <option value="4" selected>۴ هفته</option>
                                                        <option value="6">۶ هفته</option>
                                                        <option value="8">۸ هفته</option>
                                                        <option value="12">۱۲ هفته</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">روزهای تمرین در هفته</label>
                                                    <select class="form-control" id="workout-days">
                                                        <option value="3">۳ روز</option>
                                                        <option value="4">۴ روز</option>
                                                        <option value="5" selected>۵ روز</option>
                                                        <option value="6">۶ روز</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">مدت هر جلسه (دقیقه)</label>
                                                    <input type="number" class="form-control"
                                                           value="60" min="15" max="180">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">توضیحات برنامه</label>
                                                    <textarea class="form-control" rows="4"
                                                              id="workout-description">برنامه ۴ هفته‌ای برای افزایش حجم عضلات. تمرکز بر حرکات ترکیبی و پایه برای حداکثر تحریک عضلانی. مناسب برای سطح متوسط.</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">تجهیزات مورد نیاز</label>
                                                    <div id="equipment-tags" class="mb-2">
                                                    <span class="equipment-tag">
                                                        دمبل
                                                        <span class="tag-remove" onclick="removeEquipment(this)">×</span>
                                                    </span>
                                                        <span class="equipment-tag">
                                                        هالتر
                                                        <span class="tag-remove" onclick="removeEquipment(this)">×</span>
                                                    </span>
                                                        <span class="equipment-tag">
                                                        میز پرس
                                                        <span class="tag-remove" onclick="removeEquipment(this)">×</span>
                                                    </span>
                                                        <span class="equipment-tag">
                                                        جیمبال
                                                        <span class="tag-remove" onclick="removeEquipment(this)">×</span>
                                                    </span>
                                                        <span class="equipment-tag">
                                                        سیمکش
                                                        <span class="tag-remove" onclick="removeEquipment(this)">×</span>
                                                    </span>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               id="new-equipment"
                                                               placeholder="نام تجهیزات جدید">
                                                        <button class="btn btn-outline-secondary" type="button" onclick="addEquipment()">
                                                            <i class="ri-add-line"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نکات ایمنی</label>
                                                    <textarea class="form-control" rows="3"
                                                              placeholder="نکات ایمنی و هشدارها...">۱. قبل از تمرین حتماً گرم کنید
۲. در صورت احساس درد غیرمعمول تمرین را متوقف کنید
۳. بین ست‌ها ۶۰-۹۰ ثانیه استراحت کنید
۴. فرم صحیح حرکات را رعایت کنید</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- تمرینات -->
                                    <div class="tab-pane fade" id="workout-exercises">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">مدیریت تمرینات</h6>
                                            <button type="button" class="btn btn-sm btn-primary" onclick="addExercise()">
                                                <i class="ri-add-line me-1"></i>
                                                تمرین جدید
                                            </button>
                                        </div>

                                        <div id="exercises-container">
                                            <!-- تمرین ۱ -->
                                            <div class="exercise-edit-card">
                                                <div class="edit-indicator-workout">
                                                    <i class="ri-pencil-line"></i>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1">پرس سینه با هالتر</h6>
                                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                                            <span class="muscle-edit-badge">سینه</span>
                                                            <span class="difficulty-badge-edit difficulty-medium-edit">متوسط</span>
                                                            <span class="badge bg-light text-dark">
                                                            <i class="ri-time-line me-1"></i>
                                                            ۹۰s استراحت
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="duplicateExercise(this)">
                                                            <i class="ri-file-copy-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeExercise(this)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label small">نام تمرین</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="پرس سینه با هالتر">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">گروه عضلانی</label>
                                                            <select class="form-control form-control-sm">
                                                                <option selected>سینه</option>
                                                                <option>پشت</option>
                                                                <option>پا</option>
                                                                <option>شانه</option>
                                                                <option>بازو</option>
                                                                <option>ساق</option>
                                                                <option>شکم</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">سختی</label>
                                                            <select class="form-control form-control-sm">
                                                                <option>آسان</option>
                                                                <option selected>متوسط</option>
                                                                <option>سخت</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">تعداد ست‌ها</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="4" min="1" max="10">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">تکرارها</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="8-12" placeholder="مثال: 8-12">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">استراحت (ثانیه)</label>
                                                            <input type="number" class="form-control form-control-sm rest-time-input"
                                                                   value="90" min="0" max="300">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">ترتیب</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="1" min="1" max="20">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 class="mb-3">جزئیات ست‌ها:</h6>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۱</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">گرم کردنی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="60kg × 12" placeholder="وزن × تکرار">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۲</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">ست اصلی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="70kg × 10">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۳</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">ست اصلی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="80kg × 8">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۴</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">ست پایانی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="70kg × 10">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <label class="form-label small">توضیحات و نکات</label>
                                                    <textarea class="form-control form-control-sm" rows="2">حرکت پایه برای عضلات سینه. روی فرم صحیح و کنترل حرکت تمرکز کنید.</textarea>
                                                </div>
                                            </div>

                                            <!-- تمرین ۲ -->
                                            <div class="exercise-edit-card">
                                                <div class="edit-indicator-workout">
                                                    <i class="ri-pencil-line"></i>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1">زیربغل هالتر خم</h6>
                                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                                            <span class="muscle-edit-badge">پشت</span>
                                                            <span class="difficulty-badge-edit difficulty-medium-edit">متوسط</span>
                                                            <span class="badge bg-light text-dark">
                                                            <i class="ri-time-line me-1"></i>
                                                            ۷۵s استراحت
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="duplicateExercise(this)">
                                                            <i class="ri-file-copy-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeExercise(this)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label small">نام تمرین</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="زیربغل هالتر خم">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">گروه عضلانی</label>
                                                            <select class="form-control form-control-sm">
                                                                <option>سینه</option>
                                                                <option selected>پشت</option>
                                                                <option>پا</option>
                                                                <option>شانه</option>
                                                                <option>بازو</option>
                                                                <option>ساق</option>
                                                                <option>شکم</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">سختی</label>
                                                            <select class="form-control form-control-sm">
                                                                <option>آسان</option>
                                                                <option selected>متوسط</option>
                                                                <option>سخت</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">تعداد ست‌ها</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="3" min="1" max="10">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">تکرارها</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   value="10-15" placeholder="مثال: 10-15">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">استراحت (ثانیه)</label>
                                                            <input type="number" class="form-control form-control-sm rest-time-input"
                                                                   value="75" min="0" max="300">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label small">ترتیب</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                   value="2" min="1" max="20">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 class="mb-3">جزئیات ست‌ها:</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۱</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">گرم کردنی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="50kg × 15">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۲</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">ست اصلی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="60kg × 12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="set-edit-row">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="set-number-edit">۳</div>
                                                                <div class="ms-3">
                                                                    <label class="form-label tiny">ست پایانی</label>
                                                                    <input type="text" class="form-control form-control-sm"
                                                                           value="70kg × 10">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <label class="form-label small">توضیحات و نکات</label>
                                                    <textarea class="form-control form-control-sm" rows="2">زانوها را کمی خم کنید و کمر صاف باشد. هالتر را تا پایین سینه بکشید.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- برنامه زمانی -->
                                    <div class="tab-pane fade" id="workout-schedule">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <h6 class="mb-3">انتخاب روزهای تمرین</h6>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-sat" checked>
                                                                <label class="form-check-label" for="day-sat">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    شنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-sun" checked>
                                                                <label class="form-check-label" for="day-sun">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    یکشنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-mon" checked>
                                                                <label class="form-check-label" for="day-mon">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    دوشنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-tue">
                                                                <label class="form-check-label" for="day-tue">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    سه‌شنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-wed" checked>
                                                                <label class="form-check-label" for="day-wed">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    چهارشنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-thu" checked>
                                                                <label class="form-check-label" for="day-thu">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    پنجشنبه
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="checkbox" id="day-fri">
                                                                <label class="form-check-label" for="day-fri">
                                                                    <i class="ri-calendar-2-line me-2"></i>
                                                                    جمعه
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">زمان شروع برنامه</label>
                                                    <input type="date" class="form-control" value="1403-02-01">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ساعت پیشنهادی تمرین</label>
                                                    <select class="form-control">
                                                        <option>صبح (۶-۹)</option>
                                                        <option selected>ظهر (۱۰-۱۴)</option>
                                                        <option>عصر (۱۵-۱۹)</option>
                                                        <option>شب (۲۰-۲۲)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">تذکرات زمانی</label>
                                                    <textarea class="form-control" rows="2"
                                                              placeholder="تذکرات مربوط به زمان‌بندی...">تمرینات را حداقل ۲ ساعت بعد از وعده غذایی اصلی انجام دهید.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- تاریخچه -->
                                    <div class="tab-pane fade" id="workout-history">
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
                                                    <td>افزایش زمان استراحت تمرینات</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۸</td>
                                                    <td><span class="badge bg-success">افزودن</span></td>
                                                    <td>مربی</td>
                                                    <td>افزودن تمرین جدید (پلانک)</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۵</td>
                                                    <td><span class="badge bg-primary">ایجاد</span></td>
                                                    <td>مربی</td>
                                                    <td>ایجاد برنامه اولیه</td>
                                                </tr>
                                                <tr>
                                                    <td>۱۴۰۳/۰۱/۱۰</td>
                                                    <td><span class="badge bg-info">تنظیمات</span></td>
                                                    <td>شما</td>
                                                    <td>به‌روزرسانی وزن‌های پیشنهادی</td>
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
        // شمارنده تمرینات
        let exerciseCount = 2;

        // اضافه کردن تمرین جدید
        function addExercise() {
            exerciseCount++;

            const newExercise = `
        <div class="exercise-edit-card">
            <div class="edit-indicator-workout">
                <i class="ri-pencil-line"></i>
            </div>
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h6 class="mb-1">تمرین جدید ${exerciseCount}</h6>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="muscle-edit-badge">سینه</span>
                        <span class="difficulty-badge-edit difficulty-medium-edit">متوسط</span>
                        <span class="badge bg-light text-dark">
                            <i class="ri-time-line me-1"></i>
                            ۶۰s استراحت
                        </span>
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="duplicateExercise(this)">
                        <i class="ri-file-copy-line"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeExercise(this)">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label small">نام تمرین</label>
                        <input type="text" class="form-control form-control-sm"
                               value="تمرین جدید ${exerciseCount}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">گروه عضلانی</label>
                        <select class="form-control form-control-sm">
                            <option selected>سینه</option>
                            <option>پشت</option>
                            <option>پا</option>
                            <option>شانه</option>
                            <option>بازو</option>
                            <option>ساق</option>
                            <option>شکم</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">سختی</label>
                        <select class="form-control form-control-sm">
                            <option selected>آسان</option>
                            <option>متوسط</option>
                            <option>سخت</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">تعداد ست‌ها</label>
                        <input type="number" class="form-control form-control-sm"
                               value="3" min="1" max="10">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">تکرارها</label>
                        <input type="text" class="form-control form-control-sm"
                               value="10-12" placeholder="مثال: 10-12">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">استراحت (ثانیه)</label>
                        <input type="number" class="form-control form-control-sm rest-time-input"
                               value="60" min="0" max="300">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label class="form-label small">ترتیب</label>
                        <input type="number" class="form-control form-control-sm"
                               value="${exerciseCount}" min="1" max="20">
                    </div>
                </div>
            </div>

            <h6 class="mb-3">جزئیات ست‌ها:</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="set-edit-row">
                        <div class="d-flex align-items-center mb-2">
                            <div class="set-number-edit">۱</div>
                            <div class="ms-3">
                                <label class="form-label tiny">ست اول</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="وزن × تکرار">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="set-edit-row">
                        <div class="d-flex align-items-center mb-2">
                            <div class="set-number-edit">۲</div>
                            <div class="ms-3">
                                <label class="form-label tiny">ست دوم</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="وزن × تکرار">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="set-edit-row">
                        <div class="d-flex align-items-center mb-2">
                            <div class="set-number-edit">۳</div>
                            <div class="ms-3">
                                <label class="form-label tiny">ست سوم</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="وزن × تکرار">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label small">توضیحات و نکات</label>
                <textarea class="form-control form-control-sm" rows="2"></textarea>
            </div>
        </div>`;

            document.getElementById('exercises-container').insertAdjacentHTML('beforeend', newExercise);
        }

        // حذف تمرین
        function removeExercise(button) {
            if (confirm('آیا از حذف این تمرین مطمئن هستید؟')) {
                button.closest('.exercise-edit-card').remove();
                exerciseCount--;
            }
        }

        // کپی تمرین
        function duplicateExercise(button) {
            const exerciseCard = button.closest('.exercise-edit-card');
            const clonedCard = exerciseCard.cloneNode(true);

            // تغییر نام تمرین کپی شده
            const titleInput = clonedCard.querySelector('input[type="text"]');
            if (titleInput) {
                titleInput.value = titleInput.value + ' (کپی)';
            }

            // تغییر ترتیب
            const orderInput = clonedCard.querySelector('input[type="number"]:last-of-type');
            if (orderInput) {
                orderInput.value = parseInt(orderInput.value) + 1;
            }

            exerciseCard.insertAdjacentElement('afterend', clonedCard);
            exerciseCount++;
        }

        // مدیریت تجهیزات
        function addEquipment() {
            const input = document.getElementById('new-equipment');
            const equipment = input.value.trim();

            if (equipment) {
                const tag = document.createElement('span');
                tag.className = 'equipment-tag';
                tag.innerHTML = `
                ${equipment}
                <span class="tag-remove" onclick="removeEquipment(this)">×</span>
            `;

                document.getElementById('equipment-tags').appendChild(tag);
                input.value = '';
            }
        }

        function removeEquipment(element) {
            element.parentElement.remove();
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
            if (confirm('آیا از حذف این برنامه ورزشی مطمئن هستید؟ این عمل غیرقابل بازگشت است.')) {
                alert('برنامه ورزشی حذف شد.');
                // در حالت واقعی، درخواست DELETE ارسال می‌شود
            }
        }

        // پیش‌نمایش
        function previewWorkout() {
            alert('پیش‌نمایش برنامه آماده شد.');
        }

        // ارسال فرم ویرایش
        document.getElementById('workout-edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('تغییرات با موفقیت ذخیره شدند.');
            // در حالت واقعی، درخواست PUT ارسال می‌شود
        });
    </script>
@endsection
