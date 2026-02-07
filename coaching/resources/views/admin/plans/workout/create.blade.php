@extends('layouts.master')

@section('head')
    <style>
        /* تم اصلی - مشابه صفحه نمایش برنامه */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .exercise-card {
            border-left: 4px solid #3b82f6;
            padding: 25px;
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .exercise-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 50px rgba(59, 130, 246, 0.15);
        }

        .exercise-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .exercise-card:hover::before {
            opacity: 1;
        }

        [data-bs-theme="dark"] .exercise-card {
            background: #1e293b;
            border-left-color: #60a5fa;
        }

        .set-row {
            background: rgba(241, 245, 249, 0.7);
            border-radius: 10px;
            padding: 18px;
            margin: 12px 0;
            border: 1px solid rgba(226, 232, 240, 0.5);
        }

        [data-bs-theme="dark"] .set-row {
            background: rgba(30, 41, 59, 0.5);
            border-color: rgba(71, 85, 105, 0.5);
        }

        .day-tab {
            padding: 12px 20px;
            border-radius: 10px;
            margin: 5px;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: 2px solid transparent;
            background: #f8fafc;
        }

        .day-tab:hover {
            background: #e2e8f0;
            transform: scale(1.02);
        }

        .day-tab.active {
            background: #3b82f6 !important;
            color: white;
            border-color: #2563eb;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        [data-bs-theme="dark"] .day-tab {
            background: #334155;
        }

        [data-bs-theme="dark"] .day-tab:hover {
            background: #475569;
        }

        .muscle-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition-smooth);
        }

        .muscle-badge:hover {
            transform: scale(1.05);
        }

        .add-exercise-area {
            border: 2px dashed #94a3b8;
            border-radius: 16px;
            padding: 40px 20px;
            text-align: center;
            background: rgba(248, 250, 252, 0.5);
            cursor: pointer;
            transition: var(--transition-smooth);
            margin: 20px 0;
        }

        .add-exercise-area:hover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
            transform: translateY(-2px);
        }

        [data-bs-theme="dark"] .add-exercise-area {
            background: rgba(30, 41, 59, 0.3);
            border-color: #475569;
        }

        .exercise-library-item {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 8px;
            background: white;
            border: 1px solid #e2e8f0;
            cursor: move;
            transition: var(--transition-smooth);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .exercise-library-item:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            transform: translateX(5px);
        }

        [data-bs-theme="dark"] .exercise-library-item {
            background: #1e293b;
            border-color: #475569;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: var(--transition-smooth);
        }

        .stat-card:hover {
            box-shadow: var(--card-shadow);
            border-color: #cbd5e1;
        }

        [data-bs-theme="dark"] .stat-card {
            background: #1e293b;
            border-color: #475569;
        }

        .quick-input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            transition: var(--transition-smooth);
            background: white;
        }

        .quick-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        [data-bs-theme="dark"] .quick-input {
            background: #334155;
            border-color: #475569;
            color: white;
        }

        .floating-actions {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .floating-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: var(--transition-smooth);
            border: none;
        }

        .floating-btn:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .progress-ring {
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .progress-ring circle {
            transition: stroke-dashoffset 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        /* انیمیشن‌ها */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .animate-slide-in {
            animation: slideInRight 0.4s ease-out;
        }

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .exercise-card {
                padding: 18px;
                margin-bottom: 18px;
            }

            .set-row .row {
                flex-direction: column;
                gap: 10px;
            }

            .day-tab {
                padding: 10px 14px;
                font-size: 14px;
                margin: 3px;
            }

            .floating-actions {
                bottom: 20px;
                right: 20px;
            }

            .floating-btn {
                width: 48px;
                height: 48px;
            }

            .page-title-box h4 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .exercise-card {
                border-left-width: 3px;
                border-radius: 10px;
            }

            .add-exercise-area {
                padding: 30px 15px;
            }

            .stat-card {
                padding: 15px;
            }

            .muscle-badge {
                padding: 5px 12px;
                font-size: 12px;
            }

            .floating-actions {
                bottom: 15px;
                right: 15px;
                gap: 8px;
            }
        }

        /* Dark Mode Optimizations */
        [data-bs-theme="dark"] .quick-input::placeholder {
            color: #94a3b8;
        }

        [data-bs-theme="dark"] .form-control {
            background: #334155;
            border-color: #475569;
            color: white;
        }

        [data-bs-theme="dark"] .form-control:focus {
            background: #475569;
            border-color: #60a5fa;
        }

        /* Drag & Drop Feedback */
        .drag-over {
            background: rgba(59, 130, 246, 0.1) !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .dragging {
            opacity: 0.5;
            transform: rotate(3deg);
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row animate-fade-in">
                <div class="col-12">
                    <div class="page-title-box d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h4 class="mb-1 fw-semibold text-gradient">
                                <i class="ri-add-circle-fill me-2"></i>
                                ساخت برنامه ورزشی جدید
                            </h4>
                            <p class="text-muted mb-0">برنامه خود را به سادگی طراحی و شخصی‌سازی کنید</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary d-none d-md-flex" onclick="showHelp()">
                                <i class="ri-question-line me-1"></i>
                                راهنما
                            </button>
                            <button class="btn btn-primary" onclick="saveProgram()">
                                <i class="ri-save-3-line me-1"></i>
                                ذخیره برنامه
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Card -->
            <div class="row animate-fade-in" style="animation-delay: 0.1s;">
                <div class="col-12">
                    <!-- طراحی مینیمال و تمیز -->
                    <div class="card border-0 bg-white shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <!-- فقط یک Input بزرگ و ساده -->
                                    <div class="text-center mb-4">
                                        <i class="ri-add-circle-line text-primary fs-48 mb-3 d-block"></i>
                                        <h2 class="mb-3">برنامه ورزشی جدید</h2>
                                        <p class="text-muted mb-4">یک برنامه اختصاصی برای خودت بساز</p>
                                    </div>

                                    <!-- فیلد اصلی نام برنامه -->
                                    <div class="mb-4">
                                        <input type="text"
                                               class="form-control form-control-lg border-1 border-primary-subtle text-center py-3"
                                               placeholder="نام برنامه خود را اینجا بنویسید..."
                                               style="
                                        font-size: 1.5rem;
                                        font-weight: 600;
                                        border-radius: 12px;
                                   "
                                               oninput="updateProgramName(this.value)">
                                    </div>

                                    <!-- فیلد توضیحات (اختیاری) -->
                                    <div class="mb-3">
                            <textarea class="form-control border-0 bg-light"
                                      rows="3"
                                      placeholder="توضیحات اختیاری..."
                                      style="
                                        border-radius: 12px;
                                        resize: none;
                                        padding: 1rem 1.25rem;
                                      "
                                      oninput="updateProgramDescription(this.value)"></textarea>
                                        <small class="text-muted mt-1 d-block text-center">
                                            این فیلد اختیاری است - می‌توانید بعداً پر کنید
                                        </small>
                                    </div>

                                    <!-- راهنمای سریع -->
                                    <div class="alert alert-light border mt-4" role="alert">
                                        <div class="d-flex align-items-center">
                                            <i class="ri-lightbulb-line text-warning fs-20 me-3"></i>
                                            <div>
                                                <small class="text-muted">
                                                    بعد از انتخاب نام، می‌توانید روزهای تمرین و ورزش‌ها را اضافه کنید
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- سایدبار -->
                <div class="col-xl-3 col-lg-4">
                    <!-- انتخاب روزها -->
                    <div class="card shadow-sm mb-4 animate-slide-in" style="animation-delay: 0.2s;">
                        <div class="card-header bg-transparent border-bottom">
                            <h5 class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-calendar-schedule-line me-2 text-primary"></i>
                                روزهای تمرین
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2" id="days-container">
                                @foreach(['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'] as $index => $day)
                                    <div class="col-6 col-md-4 col-lg-6 col-xl-12">
                                        <div class="day-tab text-center"
                                             data-day="{{ $index }}"
                                             onclick="selectDay({{ $index }}, '{{ $day }}')">
                                            <div class="fw-medium mb-1">{{ $day }}</div>
                                            <small class="text-muted day-count" data-day="{{ $index }}">۰ تمرین</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr class="my-3">

                            <button class="btn btn-outline-primary w-100" onclick="addCustomDay()">
                                <i class="ri-add-circle-line me-2"></i>
                                روز سفارشی
                            </button>
                        </div>
                    </div>

                    <!-- کتابخانه تمرینات -->
                    <div class="card shadow-sm mb-4 animate-slide-in" style="animation-delay: 0.3s;">
                        <div class="card-header bg-transparent border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 d-flex align-items-center">
                                    <i class="ri-database-2-line me-2 text-success"></i>
                                    کتابخانه تمرینات
                                </h5>
                                <button class="btn btn-sm btn-light" onclick="refreshLibrary()">
                                    <i class="ri-refresh-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="ri-search-line"></i>
                            </span>
                                <input type="text"
                                       class="form-control border-start-0"
                                       placeholder="جستجوی تمرین..."
                                       oninput="filterExercises(this.value)">
                            </div>

                            <div class="vstack gap-2" id="exercise-library">
                                <!-- تمرینات به صورت دینامیک -->
                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-sm btn-outline-secondary" onclick="showAllExercises()">
                                    نمایش همه تمرینات
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- آمار و خلاصه -->
                    <div class="card shadow-sm animate-slide-in" style="animation-delay: 0.4s;">
                        <div class="card-header bg-transparent border-bottom">
                            <h5 class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-bar-chart-line me-2 text-info"></i>
                                آمار برنامه
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="stat-card">
                                        <div class="fs-24 fw-bold text-primary" id="stat-days">۰</div>
                                        <small class="text-muted">روز فعال</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card">
                                        <div class="fs-24 fw-bold text-success" id="stat-exercises">۰</div>
                                        <small class="text-muted">کل تمرینات</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card">
                                        <div class="fs-24 fw-bold text-warning" id="stat-sets">۰</div>
                                        <small class="text-muted">ست کل</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card">
                                        <div class="fs-24 fw-bold text-danger" id="stat-time">۰</div>
                                        <small class="text-muted">دقیقه</small>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="mb-3">گروه‌های عضلانی:</h6>
                                <div class="d-flex flex-wrap gap-2" id="muscle-groups">
                                    <!-- به صورت دینامیک -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- هدر روز جاری -->
                    <div class="card shadow-sm mb-4 animate-fade-in" id="current-day-header" style="display: none;">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                                <div>
                                    <h4 class="mb-2" id="current-day-title">شنبه</h4>
                                    <div class="d-flex flex-wrap gap-3">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                        <span class="input-group-text">
                                            <i class="ri-focus-3-line"></i>
                                        </span>
                                            <select class="form-select" id="day-focus" onchange="updateDayFocus()">
                                                <option>تمرینات سینه و پشت بازو</option>
                                                <option>تمرینات پا</option>
                                                <option>تمرینات شانه</option>
                                                <option>تمرینات کامل بدن</option>
                                            </select>
                                        </div>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               style="width: 180px;"
                                               placeholder="عنوان روز (اختیاری)">
                                    </div>
                                </div>
                                <div class="mt-3 mt-md-0 d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-danger" onclick="clearCurrentDay()">
                                        <i class="ri-delete-bin-line me-1"></i>
                                        پاک کردن روز
                                    </button>
                                    <button class="btn btn-sm btn-success" onclick="markDayComplete()">
                                        <i class="ri-check-double-line me-1"></i>
                                        تکمیل روز
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- لیست تمرینات روز -->
                    <div id="exercises-container" class="animate-fade-in" style="animation-delay: 0.3s;">
                        <!-- تمرینات به صورت دینامیک اضافه می‌شوند -->
                    </div>

                    <!-- ناحیه افزودن تمرین -->
                    <div class="add-exercise-area animate-fade-in"
                         style="animation-delay: 0.4s;"
                         onclick="showExerciseModal()"
                         ondragover="handleDragOver(event)"
                         ondrop="handleDrop(event)">
                        <div class="py-5">
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                                <i class="ri-add-circle-fill fs-36 text-primary"></i>
                            </div>
                            <h5 class="mb-2">افزودن تمرین جدید</h5>
                            <p class="text-muted mb-4">روی این ناحیه کلیک کنید یا تمرینی را از کتابخانه بکشید</p>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-outline-primary" onclick="event.stopPropagation(); showExerciseModal()">
                                    <i class="ri-add-line me-1"></i>
                                    افزودن دستی
                                </button>
                                <button class="btn btn-outline-success" onclick="event.stopPropagation(); openLibrary()">
                                    <i class="ri-database-2-line me-1"></i>
                                    از کتابخانه
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- تنظیمات روز -->
                    <div class="card shadow-sm mt-4 animate-fade-in" style="animation-delay: 0.5s;">
                        <div class="card-header bg-transparent border-bottom">
                            <h5 class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-settings-3-line me-2"></i>
                                تنظیمات روز
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">مدت زمان تخمینی (دقیقه)</label>
                                    <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ri-timer-line"></i>
                                    </span>
                                        <input type="number"
                                               class="form-control"
                                               min="15"
                                               max="180"
                                               value="60"
                                               onchange="updateDayStats()">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">سطح دشواری</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="easy" checked>
                                            <label class="form-check-label" for="easy">
                                                <span class="badge bg-success">آسان</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="medium">
                                            <label class="form-check-label" for="medium">
                                                <span class="badge bg-warning">متوسط</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="hard">
                                            <label class="form-check-label" for="hard">
                                                <span class="badge bg-danger">سخت</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">نکات و توضیحات روز</label>
                                    <textarea class="form-control"
                                              rows="3"
                                              placeholder="نکات مهم، هشدارها یا توضیحات اضافی..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Template برای تمرین -->
    <template id="exercise-template">
        <div class="exercise-card draggable-exercise" draggable="true" data-exercise-id="">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div style="flex: 1;">
                    <div class="d-flex align-items-center mb-3">
                        <div class="drag-handle me-3 text-muted" style="cursor: move;">
                            <i class="ri-drag-move-2-line fs-18"></i>
                        </div>
                        <input type="text"
                               class="form-control form-control-lg border-0 exercise-title bg-transparent px-0"
                               placeholder="نام تمرین (مثال: پرس سینه)"
                               style="font-weight: 700; font-size: 1.25rem;">
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-md-auto">
                            <select class="form-select form-select-sm muscle-select" style="width: 130px;">
                                <option value="chest">سینه</option>
                                <option value="back">پشت</option>
                                <option value="legs">پا</option>
                                <option value="shoulders">شانه</option>
                                <option value="arms">بازو</option>
                                <option value="core">میان تنه</option>
                            </select>
                        </div>
                        <div class="col-md-auto">
                            <div class="d-flex align-items-center gap-2">
                                <input type="number"
                                       class="form-control form-control-sm quick-input"
                                       placeholder="تعداد ست"
                                       style="width: 80px;"
                                       min="1" max="10">
                                <span class="text-muted">×</span>
                                <input type="text"
                                       class="form-control form-control-sm quick-input"
                                       placeholder="تکرارها"
                                       style="width: 100px;">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="input-group input-group-sm" style="width: 120px;">
                            <span class="input-group-text">
                                <i class="ri-timer-line"></i>
                            </span>
                                <input type="text"
                                       class="form-control"
                                       placeholder="استراحت"
                                       value="90s">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-shrink-0">
                    <button class="btn btn-sm btn-outline-primary" onclick="editExerciseSets(this)">
                        <i class="ri-settings-3-line"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="duplicateExercise(this)">
                        <i class="ri-file-copy-line"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="removeExercise(this)">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>

            <!-- ویرایش ست‌ها -->
            <div class="set-row">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">جزئیات ست‌ها</h6>
                    <button class="btn btn-sm btn-link" onclick="addSet(this)">
                        <i class="ri-add-line me-1"></i>
                        افزودن ست
                    </button>
                </div>
                <div class="row g-3" id="sets-container">
                    <!-- ست‌ها به صورت دینامیک -->
                </div>
            </div>

            <!-- توضیحات -->
            <div class="mt-4">
                <label class="form-label">توضیحات و نکات اجرایی</label>
                <textarea class="form-control" rows="2" placeholder="نکات مهم اجرای تمرین..."></textarea>
            </div>
        </div>
    </template>

    <!-- Floating Actions -->
    <div class="floating-actions d-print-none">
        <button class="floating-btn btn-primary" onclick="scrollToTop()" title="بازگشت به بالا">
            <i class="ri-arrow-up-line fs-20"></i>
        </button>
        <button class="floating-btn btn-success" onclick="addQuickExercise()" title="افزودن سریع تمرین">
            <i class="ri-add-line fs-20"></i>
        </button>
        <button class="floating-btn btn-info" onclick="showStats()" title="نمایش آمار">
            <i class="ri-bar-chart-box-line fs-20"></i>
        </button>
    </div>
@endsection

@section('scripts')
    <script>
        // State Management
        let programState = {
            currentDay: 0,
            days: {},
            exerciseCount: 0,
            draggedExercise: null
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initializeLibrary();
            selectDay(0, 'شنبه');
            updateStats();
        });

        // Day Management
        function selectDay(dayIndex, dayName) {
            // Update UI
            document.querySelectorAll('.day-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.closest('.day-tab').classList.add('active');

            // Update state
            programState.currentDay = dayIndex;

            // Show day header
            const header = document.getElementById('current-day-header');
            header.style.display = 'block';
            document.getElementById('current-day-title').textContent = dayName;

            // Load day exercises
            loadDayExercises(dayIndex);

            // Update completion progress
            updateCompletionProgress();
        }

        function loadDayExercises(dayIndex) {
            const container = document.getElementById('exercises-container');
            container.innerHTML = '';

            if (programState.days[dayIndex]) {
                programState.days[dayIndex].exercises.forEach(exercise => {
                    addExerciseToDOM(exercise);
                });
            }
        }

        // Exercise Management
        function addExerciseToDOM(exerciseData = {}) {
            const template = document.getElementById('exercise-template');
            const clone = template.content.cloneNode(true);
            const exerciseId = `ex-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;

            const exerciseCard = clone.querySelector('.exercise-card');
            exerciseCard.dataset.exerciseId = exerciseId;

            // Set values if provided
            if (exerciseData.name) {
                exerciseCard.querySelector('.exercise-title').value = exerciseData.name;
            }

            // Add drag & drop handlers
            exerciseCard.addEventListener('dragstart', handleExerciseDragStart);
            exerciseCard.addEventListener('dragover', handleExerciseDragOver);
            exerciseCard.addEventListener('drop', handleExerciseDrop);
            exerciseCard.addEventListener('dragend', handleExerciseDragEnd);

            // Add to DOM
            document.getElementById('exercises-container').appendChild(exerciseCard);

            // Add animation
            exerciseCard.style.animation = 'fadeIn 0.5s ease-out';

            // Update stats
            updateStats();

            return exerciseId;
        }

        function removeExercise(button) {
            if (confirm('آیا از حذف این تمرین مطمئن هستید؟')) {
                const exerciseCard = button.closest('.exercise-card');
                exerciseCard.style.animation = 'fadeOut 0.3s ease-out';

                setTimeout(() => {
                    exerciseCard.remove();
                    updateStats();
                    showToast('تمرین حذف شد', 'warning');
                }, 300);
            }
        }

        function duplicateExercise(button) {
            const exerciseCard = button.closest('.exercise-card');
            const clone = exerciseCard.cloneNode(true);
            const newId = `ex-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;

            clone.dataset.exerciseId = newId;
            clone.querySelector('.exercise-title').value += ' (کپی)';

            exerciseCard.after(clone);
            updateStats();
            showToast('تمرین کپی شد', 'success');
        }

        // Drag & Drop
        function handleExerciseDragStart(e) {
            programState.draggedExercise = this;
            this.classList.add('dragging');
            e.dataTransfer.effectAllowed = 'move';
        }

        function handleExerciseDragOver(e) {
            e.preventDefault();
            this.classList.add('drag-over');
        }

        function handleExerciseDrop(e) {
            e.preventDefault();
            this.classList.remove('drag-over');

            if (programState.draggedExercise !== this) {
                const container = this.closest('#exercises-container');
                const draggedIndex = Array.from(container.children).indexOf(programState.draggedExercise);
                const dropIndex = Array.from(container.children).indexOf(this);

                if (draggedIndex < dropIndex) {
                    this.after(programState.draggedExercise);
                } else {
                    this.before(programState.draggedExercise);
                }

                showToast('ترتیب تمرین تغییر کرد', 'info');
            }
        }

        function handleExerciseDragEnd() {
            this.classList.remove('dragging');
            programState.draggedExercise = null;
        }

        // Stats & Progress
        function updateStats() {
            const exercises = document.querySelectorAll('.exercise-card').length;
            const sets = document.querySelectorAll('.set-row').length;

            document.getElementById('total-exercises').textContent = exercises;
            document.getElementById('stat-exercises').textContent = exercises;
            document.getElementById('stat-sets').textContent = sets;

            // Update day counts
            const currentDay = programState.currentDay;
            const dayExercises = document.querySelectorAll(`[data-day="${currentDay}"] .exercise-card`).length;
            document.querySelector(`.day-count[data-day="${currentDay}"]`).textContent = `${dayExercises} تمرین`;
        }

        function updateCompletionProgress() {
            const totalFields = 10; // تعداد فیلدهای مورد نیاز
            const filledFields = document.querySelectorAll('input[value], textarea[value], select option:checked').length;
            const progress = Math.min(100, Math.round((filledFields / totalFields) * 100));

            const progressBar = document.getElementById('completion-progress');
            const progressText = document.getElementById('completion-text');

            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${progress}٪ تکمیل شده`;

            // Update progress bar color based on progress
            if (progress < 30) {
                progressBar.classList.remove('bg-warning', 'bg-success');
                progressBar.classList.add('bg-danger');
            } else if (progress < 70) {
                progressBar.classList.remove('bg-danger', 'bg-success');
                progressBar.classList.add('bg-warning');
            } else {
                progressBar.classList.remove('bg-danger', 'bg-warning');
                progressBar.classList.add('bg-success');
            }
        }

        // Library Functions
        function initializeLibrary() {
            const exercises = [
                { name: 'پرس سینه با هالتر', muscle: 'سینه', difficulty: 'medium' },
                { name: 'زیربغل هالتر خم', muscle: 'پشت', difficulty: 'medium' },
                { name: 'اسکوات با هالتر', muscle: 'پا', difficulty: 'hard' },
                { name: 'پرس سرشانه دمبل', muscle: 'شانه', difficulty: 'medium' },
                { name: 'جلوبازو هالتر', muscle: 'بازو', difficulty: 'easy' },
                { name: 'پشت بازو سیمکش', muscle: 'بازو', difficulty: 'easy' },
                { name: 'لانگز دمبل', muscle: 'پا', difficulty: 'medium' },
                { name: 'فیله کمر', muscle: 'پشت', difficulty: 'easy' },
                { name: 'کرانچ', muscle: 'میان تنه', difficulty: 'easy' },
                { name: 'پول آپ', muscle: 'پشت', difficulty: 'hard' }
            ];

            const library = document.getElementById('exercise-library');
            library.innerHTML = '';

            exercises.forEach((exercise, index) => {
                const item = document.createElement('div');
                item.className = 'exercise-library-item';
                item.draggable = true;
                item.dataset.exerciseIndex = index;
                item.innerHTML = `
                <div>
                    <div class="fw-medium">${exercise.name}</div>
                    <small class="text-muted">${exercise.muscle} • ${exercise.difficulty}</small>
                </div>
                <button class="btn btn-sm btn-outline-primary" onclick="addLibraryExercise(${index})">
                    <i class="ri-add-line"></i>
                </button>
            `;

                item.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('exerciseIndex', index);
                });

                library.appendChild(item);
            });
        }

        function addLibraryExercise(index) {
            const exercises = [
                { name: 'پرس سینه با هالتر' },
                { name: 'زیربغل هالتر خم' },
                { name: 'اسکوات با هالتر' },
                { name: 'پرس سرشانه دمبل' },
                { name: 'جلوبازو هالتر' },
                { name: 'پشت بازو سیمکش' },
                { name: 'لانگز دمبل' },
                { name: 'فیله کمر' },
                { name: 'کرانچ' },
                { name: 'پول آپ' }
            ];

            addExerciseToDOM({ name: exercises[index].name });
            showToast('تمرین اضافه شد', 'success');
        }

        // Save & Preview
        function saveProgram() {
            const programData = collectProgramData();

            // Show loading
            showToast('در حال ذخیره برنامه...', 'info');

            // Simulate API call
            setTimeout(() => {
                showToast('برنامه با موفقیت ذخیره شد!', 'success');

                // Optional: Redirect to program page
                // window.location.href = `/programs/${programData.id}`;
            }, 1500);
        }

        function previewProgram() {
            const programData = collectProgramData();

            // Open preview in new tab (in real app, this would render the preview page)
            const previewWindow = window.open('', '_blank');
            previewWindow.document.write(`
            <html>
                <head>
                    <title>پیش‌نمایش برنامه</title>
                    <style>
                        body { font-family: system-ui; padding: 20px; }
                        .preview-exercise { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 8px; }
                    </style>
                </head>
                <body>
                    <h1>پیش‌نمایش برنامه: ${programData.name}</h1>
                    <p>${programData.description || 'بدون توضیحات'}</p>
                    <hr>
                    <div id="preview-content">
                        <!-- برنامه رندر می‌شود -->
                    </div>
                </body>
            </html>
        `);
        }

        function collectProgramData() {
            return {
                name: document.querySelector('input[placeholder*="نام برنامه"]').value,
                description: document.querySelector('textarea[placeholder*="توضیح مختصر"]').value,
                duration: document.querySelector('select[onchange*="duration"]').value,
                level: document.querySelector('select[onchange*="level"]').value,
                days: programState.days,
                exercises: Array.from(document.querySelectorAll('.exercise-card')).map(card => ({
                    name: card.querySelector('.exercise-title').value,
                    muscle: card.querySelector('.muscle-select').value,
                    sets: card.querySelectorAll('.set-row').length
                }))
            };
        }

        // Helper Functions
        function showToast(message, type = 'info') {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-bg-${type} border-0 position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;

            document.body.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();

            // Remove after hide
            toast.addEventListener('hidden.bs.toast', () => toast.remove());
        }

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Update inputs on change
        document.querySelectorAll('input, textarea, select').forEach(element => {
            element.addEventListener('input', updateCompletionProgress);
            element.addEventListener('change', updateCompletionProgress);
        });
    </script>

    <!-- Bootstrap Icons (لوکال - از آیکون‌های موجود پروژه) -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">

    <!-- Additional CSS for animations -->
    <style>
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-20px); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
@endsection
