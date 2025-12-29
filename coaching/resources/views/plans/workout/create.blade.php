@extends('layouts.master')

@section('head')
    {{--    لینک CSS های اختصاصی --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <style>
        .exercise-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .set-row {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px dashed #adb5bd;
        }
        .remove-btn {
            color: #dc3545;
            cursor: pointer;
            transition: all 0.3s;
        }
        .remove-btn:hover {
            color: #bd2130;
            transform: scale(1.1);
        }
        .preview-card {
            border: 2px solid #0d6efd;
            box-shadow: 0 0 20px rgba(13, 110, 253, 0.1);
        }
        .muscle-group-badge {
            font-size: 12px;
            padding: 4px 10px;
            margin: 2px;
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
                            ساخت برنامه ورزشی جدید
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                ساخت برنامه ورزشی
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <!-- سایدبار پیش‌نمایش -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card preview-card">
                        <div class="card-body">
                            <div class="position-relative text-center mb-4">
                                <div class="bg-primary rounded-circle p-4 d-inline-block">
                                    <i class="ri-dumbbell-line fs-36 text-white"></i>
                                </div>
                                <h4 class="mt-3 mb-1" id="preview-program-name">
                                    برنامه حجم‌گیری
                                </h4>
                                <p class="text-muted mb-2">
                                    <i class="ri-user-follow-line align-middle"></i>
                                    <span id="preview-level">متوسط</span>
                                </p>
                            </div>

                            <div class="mt-3">
                                <h5 class="text-dark fw-medium mb-3">
                                    مشخصات برنامه:
                                </h5>

                                <div class="row mt-2 g-2">
                                    <div class="col-6">
                                    <span class="badge bg-light-subtle text-muted border w-100 d-block py-2">
                                        <i class="ri-calendar-2-line align-middle"></i>
                                        <span id="preview-duration">4 هفته</span>
                                    </span>
                                    </div>
                                    <div class="col-6">
                                    <span class="badge bg-light-subtle text-muted border w-100 d-block py-2">
                                        <i class="ri-calendar-check-line align-middle"></i>
                                        <span id="preview-days">5 روز</span>
                                    </span>
                                    </div>
                                    <div class="col-6">
                                    <span class="badge bg-light-subtle text-muted border w-100 d-block py-2">
                                        <i class="ri-timer-line align-middle"></i>
                                        <span id="preview-time">60 دقیقه</span>
                                    </span>
                                    </div>
                                    <div class="col-6">
                                    <span class="badge bg-light-subtle text-muted border w-100 d-block py-2">
                                        <i class="ri-fire-line align-middle"></i>
                                        <span id="preview-calories">450 کالری</span>
                                    </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="fw-semibold mb-3">گروه‌های عضلانی هدف:</h6>
                                    <div id="preview-muscles" class="d-flex flex-wrap gap-1">
                                        <span class="badge bg-info muscle-group-badge">سینه</span>
                                        <span class="badge bg-info muscle-group-badge">پشت</span>
                                        <span class="badge bg-info muscle-group-badge">پا</span>
                                        <span class="badge bg-info muscle-group-badge">شانه</span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="fw-semibold mb-2">تعداد تمرینات:</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">کل تمرینات:</span>
                                        <span class="fw-bold fs-5 text-primary" id="preview-exercise-count">8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary w-100" onclick="saveProgram()">
                                        <i class="ri-save-line align-middle"></i>
                                        ذخیره برنامه
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-danger w-100" onclick="window.location.href='#'">
                                        <i class="ri-close-line align-middle"></i>
                                        انصراف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- خلاصه تمرینات -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-list-check align-middle"></i>
                                لیست تمرینات
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="exercise-list-summary">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>پرس سینه</span>
                                    <span class="badge bg-light text-dark">4 ست</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>زیربغل هالتر</span>
                                    <span class="badge bg-light text-dark">3 ست</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>اسکوات</span>
                                    <span class="badge bg-light text-dark">4 ست</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>پرس سرشانه</span>
                                    <span class="badge bg-light text-dark">3 ست</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- فرم اصلی ساخت برنامه -->
                <div class="col-xl-9 col-lg-8">
                    <!-- اطلاعات کلی برنامه -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="ri-information-line align-middle me-2"></i>
                                اطلاعات کلی برنامه
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-name">
                                            <i class="ri-pencil-line align-middle me-1"></i>
                                            نام برنامه <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" id="program-name"
                                               placeholder="مثال: برنامه حجم‌گیری فاز اول"
                                               type="text"
                                               value="برنامه حجم‌گیری فاز اول"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-goal">
                                            <i class="ri-target-line align-middle me-1"></i>
                                            هدف برنامه <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="program-goal">
                                            <option value="">انتخاب هدف</option>
                                            <option value="muscle_gain" selected>افزایش حجم عضلات</option>
                                            <option value="weight_loss">کاهش وزن</option>
                                            <option value="strength">افزایش قدرت</option>
                                            <option value="endurance">افزایش استقامت</option>
                                            <option value="rehab">توانبخشی</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-level">
                                            <i class="ri-user-star-line align-middle me-1"></i>
                                            سطح ورزشکار <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="program-level">
                                            <option value="">انتخاب سطح</option>
                                            <option value="beginner">مبتدی</option>
                                            <option value="intermediate" selected>متوسط</option>
                                            <option value="advanced">پیشرفته</option>
                                            <option value="pro">حرفه‌ای</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-duration">
                                            <i class="ri-calendar-line align-middle me-1"></i>
                                            مدت برنامه <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="program-duration">
                                            <option value="">انتخاب مدت</option>
                                            <option value="2">2 هفته</option>
                                            <option value="4" selected>4 هفته</option>
                                            <option value="6">6 هفته</option>
                                            <option value="8">8 هفته</option>
                                            <option value="12">12 هفته</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-days">
                                            <i class="ri-calendar-2-line align-middle me-1"></i>
                                            روزهای تمرین در هفته <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" id="program-days">
                                            <option value="">انتخاب تعداد</option>
                                            <option value="3">3 روز</option>
                                            <option value="4">4 روز</option>
                                            <option value="5" selected>5 روز</option>
                                            <option value="6">6 روز</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="program-description">
                                            <i class="ri-file-text-line align-middle me-1"></i>
                                            توضیحات برنامه
                                        </label>
                                        <textarea class="form-control" id="program-description"
                                                  rows="3"
                                                  placeholder="توضیحات کامل برنامه، اهداف و نحوه اجرای تمرینات...">این برنامه برای افزایش حجم عضلات طراحی شده است. شامل تمرینات ترکیبی و پایه برای حداکثر تحریک عضلات می‌باشد.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تمرینات برنامه -->
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">
                                <i class="ri-dumbbell-line align-middle me-2"></i>
                                تمرینات برنامه
                            </h4>
                            <button class="btn btn-sm btn-success" onclick="addExercise()">
                                <i class="ri-add-line align-middle"></i>
                                افزودن تمرین
                            </button>
                        </div>
                        <div class="card-body">

                            <!-- تمرین 1 -->
                            <div class="exercise-section">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 text-primary">
                                        <i class="ri-basketball-line align-middle me-2"></i>
                                        پرس سینه با هالتر
                                    </h5>
                                    <span class="remove-btn" onclick="removeExercise(this)">
                                    <i class="ri-delete-bin-line fs-18"></i>
                                    حذف
                                </span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">گروه عضلانی</label>
                                            <select class="form-control">
                                                <option selected>سینه</option>
                                                <option>پشت</option>
                                                <option>پا</option>
                                                <option>شانه</option>
                                                <option>بازو</option>
                                                <option>ساق</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تعداد ست‌ها</label>
                                            <input type="number" class="form-control" value="4" min="1" max="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تکرارها</label>
                                            <input type="text" class="form-control" value="8-12" placeholder="مثال: 8-12">
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-3">جزئیات ست‌ها:</h6>
                                <div class="set-row">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 1</label>
                                                <input type="text" class="form-control form-control-sm" value="60kg x 12">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 2</label>
                                                <input type="text" class="form-control form-control-sm" value="70kg x 10">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 3</label>
                                                <input type="text" class="form-control form-control-sm" value="80kg x 8">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 4</label>
                                                <input type="text" class="form-control form-control-sm" value="70kg x 10">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" rows="2" placeholder="نکات اجرایی تمرین...">تمرین پایه برای عضلات سینه. در حین اجرا کمر را صاف نگه دارید.</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- تمرین 2 -->
                            <div class="exercise-section">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 text-primary">
                                        <i class="ri-basketball-line align-middle me-2"></i>
                                        زیربغل هالتر خم
                                    </h5>
                                    <span class="remove-btn" onclick="removeExercise(this)">
                                    <i class="ri-delete-bin-line fs-18"></i>
                                    حذف
                                </span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">گروه عضلانی</label>
                                            <select class="form-control">
                                                <option>سینه</option>
                                                <option selected>پشت</option>
                                                <option>پا</option>
                                                <option>شانه</option>
                                                <option>بازو</option>
                                                <option>ساق</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تعداد ست‌ها</label>
                                            <input type="number" class="form-control" value="3" min="1" max="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تکرارها</label>
                                            <input type="text" class="form-control" value="10-15" placeholder="مثال: 10-15">
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-3">جزئیات ست‌ها:</h6>
                                <div class="set-row">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 1</label>
                                                <input type="text" class="form-control form-control-sm" value="50kg x 15">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 2</label>
                                                <input type="text" class="form-control form-control-sm" value="60kg x 12">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 3</label>
                                                <input type="text" class="form-control form-control-sm" value="70kg x 10">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" rows="2" placeholder="نکات اجرایی تمرین...">زانوها را کمی خم کنید و کمر صاف باشد. هالتر را تا پایین سینه بکشید.</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- تمرین 3 -->
                            <div class="exercise-section">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 text-primary">
                                        <i class="ri-basketball-line align-middle me-2"></i>
                                        اسکوات با هالتر
                                    </h5>
                                    <span class="remove-btn" onclick="removeExercise(this)">
                                    <i class="ri-delete-bin-line fs-18"></i>
                                    حذف
                                </span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">گروه عضلانی</label>
                                            <select class="form-control">
                                                <option>سینه</option>
                                                <option>پشت</option>
                                                <option selected>پا</option>
                                                <option>شانه</option>
                                                <option>بازو</option>
                                                <option>ساق</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تعداد ست‌ها</label>
                                            <input type="number" class="form-control" value="4" min="1" max="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">تکرارها</label>
                                            <input type="text" class="form-control" value="6-10" placeholder="مثال: 6-10">
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-3">جزئیات ست‌ها:</h6>
                                <div class="set-row">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 1</label>
                                                <input type="text" class="form-control form-control-sm" value="80kg x 10">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 2</label>
                                                <input type="text" class="form-control form-control-sm" value="100kg x 8">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 3</label>
                                                <input type="text" class="form-control form-control-sm" value="120kg x 6">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-2">
                                                <label class="form-label small">ست 4</label>
                                                <input type="text" class="form-control form-control-sm" value="100kg x 8">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" rows="2" placeholder="نکات اجرایی تمرین...">تمرین پادشاه برای عضلات پا. کمر صاف و زانوها در راستای انگشتان پا.</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- تنظیمات پیشرفته -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="ri-settings-3-line align-middle me-2"></i>
                                تنظیمات پیشرفته
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">مدت زمان هر جلسه (دقیقه)</label>
                                        <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ri-timer-line"></i>
                                        </span>
                                            <input type="number" class="form-control" value="60" min="15" max="180">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">کالری مصرفی تخمینی</label>
                                        <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ri-fire-line"></i>
                                        </span>
                                            <input type="number" class="form-control" value="450" min="100" max="1000">
                                            <span class="input-group-text">کالری</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">تجهیزات مورد نیاز</label>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip1" checked>
                                                    <label class="form-check-label" for="equip1">دمبل</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip2" checked>
                                                    <label class="form-check-label" for="equip2">هالتر</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip3">
                                                    <label class="form-check-label" for="equip3">میز پرس</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip4">
                                                    <label class="form-check-label" for="equip4">جیمبال</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip5" checked>
                                                    <label class="form-check-label" for="equip5">میز زیربغل</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="equip6">
                                                    <label class="form-check-label" for="equip6">طناب</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">نکات مهم و هشدارها</label>
                                        <textarea class="form-control" rows="3" placeholder="نکات ایمنی و موارد مهم...">۱. قبل از تمرین حتما گرم کنید
۲. در صورت احساس درد غیرمعمول تمرین را متوقف کنید
۳. بین ست‌ها ۶۰-۹۰ ثانیه استراحت کنید
۴. بعد از تمرین حرکات کششی انجام دهید</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه‌های نهایی -->
                    <div class="mb-3 rounded mt-3">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button class="btn btn-primary w-100" onclick="saveProgram()">
                                    <i class="ri-save-line align-middle me-1"></i>
                                    ذخیره برنامه
                                </button>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-danger w-100" onclick="window.location.href='#'">
                                    <i class="ri-close-line align-middle me-1"></i>
                                    انصراف
                                </button>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-outline-secondary w-100" onclick="previewProgram()">
                                    <i class="ri-eye-line align-middle me-1"></i>
                                    پیش‌نمایش
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        // توابع استاتیک برای نمایش
        function saveProgram() {
            alert('برنامه با موفقیت ذخیره شد!');
            // در حالت واقعی، اینجا اطلاعات به سرور ارسال می‌شود
        }

        function previewProgram() {
            alert('در حال نمایش پیش‌نمایش برنامه...');
            // در حالت واقعی، اینجا یک مدال با پیش‌نمایش کامل باز می‌شود
        }

        function addExercise() {
            alert('اضافه کردن تمرین جدید');
            // در حالت واقعی، اینجا یک فرم جدید برای تمرین اضافه می‌شود
        }

        function removeExercise(element) {
            if (confirm('آیا از حذف این تمرین مطمئن هستید؟')) {
                element.closest('.exercise-section').remove();
                updateExerciseCount();
            }
        }

        function updateExerciseCount() {
            // به روزرسانی تعداد تمرینات در پیش‌نمایش
            const count = document.querySelectorAll('.exercise-section').length;
            document.getElementById('preview-exercise-count').textContent = count;
        }

        // به روزرسانی خودکار پیش‌نمایش هنگام تغییر مقادیر
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = ['program-name', 'program-level', 'program-duration', 'program-days'];
            inputs.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('change', function() {
                        const previewId = 'preview-' + id.replace('program-', '');
                        const previewElement = document.getElementById(previewId);
                        if (previewElement) {
                            previewElement.textContent = this.value;
                        }
                    });
                }
            });
        });
    </script>
@endsection
