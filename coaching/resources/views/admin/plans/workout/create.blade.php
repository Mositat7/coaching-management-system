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
            padding: 14px 16px;
            margin-bottom: 12px;
            background: #ffffff;
            border-radius: 10px;
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
            border-radius: 8px;
            padding: 10px 12px;
            margin: 8px 0;
            border: 1px solid rgba(226, 232, 240, 0.5);
        }

        [data-bs-theme="dark"] .set-row {
            background: rgba(30, 41, 59, 0.5);
            border-color: rgba(71, 85, 105, 0.5);
        }

        .day-tab {
            padding: 8px 12px;
            border-radius: 8px;
            margin: 3px;
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
            border-radius: 12px;
            padding: 20px 16px;
            text-align: center;
            background: rgba(248, 250, 252, 0.5);
            cursor: pointer;
            transition: var(--transition-smooth);
            margin: 12px 0;
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
            padding: 8px 12px;
            border-radius: 8px;
            margin-bottom: 5px;
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
            border-radius: 10px;
            padding: 12px 10px;
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

        #exercise-library {
            max-height: 220px;
            overflow-y: auto;
        }

        .workout-create-page .card-body {
            padding: 0.75rem 1rem;
        }

        .workout-create-page .card-header {
            padding: 0.5rem 1rem;
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
                padding: 12px;
                margin-bottom: 10px;
            }

            .set-row .row {
                flex-direction: column;
                gap: 6px;
            }

            .day-tab {
                padding: 6px 10px;
                font-size: 0.85rem;
                margin: 2px;
            }

            .floating-actions {
                bottom: 16px;
                right: 16px;
            }

            .floating-btn {
                width: 44px;
                height: 44px;
            }
        }

        @media (max-width: 576px) {
            .exercise-card {
                border-left-width: 3px;
                border-radius: 8px;
            }

            .add-exercise-area {
                padding: 16px 12px;
            }

            .stat-card {
                padding: 10px 8px;
            }

            .muscle-badge {
                padding: 4px 10px;
                font-size: 0.75rem;
            }

            .floating-actions {
                bottom: 12px;
                right: 12px;
                gap: 6px;
            }
        }

        /* Dark Mode Optimizations */
        .header-hero-card {
            background: #ffffff;
        }

        [data-bs-theme="dark"] .header-hero-card {
            background: #0f172a;
        }

        .hero-description-input {
            background: #f8fafc;
        }

        [data-bs-theme="dark"] .hero-description-input {
            background: #1e293b;
            border-color: #475569;
            color: #e5e7eb;
        }

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
    <div class="page-content workout-create-page">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="ri-checkbox-circle-line me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="ri-error-warning-line me-2"></i>{{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
                </div>
            @endif
            <!-- Page Title + Header compact -->
            <div class="row animate-fade-in">
                <div class="col-12">
                    <div class="card border-0 shadow-sm mb-3 header-hero-card">
                        <div class="card-body py-3 px-3 px-md-4">
                            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3 gap-lg-4">
                                <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                                    <i class="ri-add-circle-line text-primary fs-2 d-none d-md-block"></i>
                                    <div class="min-w-0 flex-grow-1">
                                        <input type="text"
                                               class="form-control form-control-lg border-1 border-primary-subtle"
                                               placeholder="نام برنامه خود را اینجا بنویسید..."
                                               style="font-size: 1.15rem; font-weight: 600; border-radius: 10px;"
                                               oninput="workoutPlanForm.updateProgramName(this.value)">
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 flex-shrink-0">
                                    <button type="button" class="btn btn-outline-primary btn-sm d-none d-md-inline-flex" onclick="workoutPlanForm.sendProgram()">
                                        <i class="ri-send-plane-line me-1"></i>ارسال
                                    </button>
                                    <button class="btn btn-primary btn-sm" onclick="workoutPlanForm.saveProgram()">
                                        <i class="ri-save-3-line me-1"></i>ذخیره برنامه
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <textarea class="form-control form-control-sm border-0 bg-light hero-description-input"
                                          rows="2"
                                          placeholder="توضیحات اختیاری..."
                                          style="border-radius: 8px; resize: none; padding: 0.5rem 0.75rem; font-size: 0.9rem;"
                                          oninput="workoutPlanForm.updateProgramDescription(this.value)"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <!-- سایدبار -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.2s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center">
                                <i class="ri-calendar-schedule-line me-2 text-primary"></i>
                                روزهای تمرین
                            </h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="row g-1" id="days-container">
                                @foreach(['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'] as $index => $day)
                                    <div class="col-6 col-md-4 col-lg-6 col-xl-12">
                                        <div class="day-tab text-center"
                                             data-day="{{ $index }}"
                                             data-day-name="{{ $day }}"
                                             onclick="workoutPlanForm.selectDay(this.dataset.day, this.dataset.dayName)">
                                            <div class="fw-medium" style="font-size: 0.9rem;">{{ $day }}</div>
                                            <small class="text-muted day-count" data-day="{{ $index }}">۰ تمرین</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <button class="btn btn-outline-primary btn-sm w-100" onclick="workoutPlanForm.addCustomDay()">
                                <i class="ri-add-circle-line me-1"></i>روز سفارشی
                            </button>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.3s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 small d-flex align-items-center">
                                    <i class="ri-database-2-line me-2 text-success"></i>
                                    کتابخانه تمرینات
                                </h5>
                                <button class="btn btn-sm btn-light p-1" onclick="workoutPlanForm.refreshLibrary()">
                                    <i class="ri-refresh-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body py-2">
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text bg-light border-end-0 py-1"><i class="ri-search-line"></i></span>
                                <input type="text" class="form-control border-start-0 py-1" placeholder="جستجو..." oninput="workoutPlanForm.filterExercises(this.value)">
                            </div>
                            <div class="vstack gap-1" id="exercise-library"></div>
                            <div class="text-center mt-2">
                                <button class="btn btn-sm btn-outline-secondary" onclick="workoutPlanForm.showAllExercises()">نمایش همه</button>
                            </div>
                        </div>
                    </div>

                    {{-- خلاصه برنامه (تعداد هفته، سطح، کالری تخمینی) --}}
                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.35s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center">
                                <i class="ri-file-info-line me-2 text-info"></i>
                                خلاصه برنامه
                            </h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="mb-2">
                                <label class="form-label small mb-0">تعداد هفته</label>
                                <input type="number" id="weeks-count-input" class="form-control form-control-sm" min="1" max="52" value="4" placeholder="۴">
                            </div>
                            <div class="mb-2">
                                <label class="form-label small mb-0">سطح برنامه</label>
                                <select class="form-select form-select-sm" id="level-input">
                                    <option value="easy">آسان</option>
                                    <option value="medium" selected>متوسط</option>
                                    <option value="hard">سخت</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label small mb-0">کالری تخمینی (اختیاری)</label>
                                <input type="number" id="estimated-calories-input" class="form-control form-control-sm" min="0" max="5000" placeholder="مثلاً ۴۵۰">
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.4s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center">
                                <i class="ri-bar-chart-line me-2 text-info"></i>
                                آمار برنامه
                            </h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="stat-card py-2">
                                        <div class="fs-18 fw-bold text-primary" id="stat-days">۰</div>
                                        <small class="text-muted" style="font-size: 0.7rem;">روز فعال</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card py-2">
                                        <div class="fs-18 fw-bold text-success" id="stat-exercises">۰</div>
                                        <small class="text-muted" style="font-size: 0.7rem;">تمرینات</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card py-2">
                                        <div class="fs-18 fw-bold text-warning" id="stat-sets">۰</div>
                                        <small class="text-muted" style="font-size: 0.7rem;">ست</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-card py-2">
                                        <div class="fs-18 fw-bold text-danger" id="stat-time">۰</div>
                                        <small class="text-muted" style="font-size: 0.7rem;">دقیقه</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-2 small">گروه‌های عضلانی</h6>
                                <div class="d-flex flex-wrap gap-1" id="muscle-groups"></div>
                            </div>
                        </div>
                    </div>

                    {{-- تجهیزات مورد نیاز --}}
                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.45s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center">
                                <i class="ri-tools-line me-2 text-secondary"></i>
                                تجهیزات مورد نیاز
                            </h5>
                        </div>
                        <div class="card-body py-2">
                            <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                مثال: دمبل، هالتر، میز پرس، سیمکش...
                            </small>
                            <textarea class="form-control form-control-sm"
                                      id="equipment-input"
                                      rows="2"
                                      placeholder="تجهیزات پیشنهادی برای اجرای این برنامه را بنویسید..."
                                      style="font-size: 0.8rem; resize: vertical;"></textarea>
                        </div>
                    </div>

                    {{-- نکات ایمنی --}}
                    <div class="card shadow-sm mb-3 animate-slide-in" style="animation-delay: 0.5s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center">
                                <i class="ri-alert-line me-2 text-warning"></i>
                                نکات ایمنی
                            </h5>
                        </div>
                        <div class="card-body py-2">
                            <textarea class="form-control form-control-sm"
                                      id="safety-notes-input"
                                      rows="3"
                                      placeholder="نکات و هشدارهای مهم برای اجرای ایمن برنامه را بنویسید..."
                                      style="font-size: 0.8rem; resize: vertical;"></textarea>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <div class="card shadow-sm mb-3 animate-fade-in" id="current-day-header" style="display: none;">
                        <div class="card-body py-2 px-3">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <h5 class="mb-0 fs-6" id="current-day-title">شنبه</h5>
                                    <div class="input-group input-group-sm" style="width: 160px;">
                                        <span class="input-group-text py-1"><i class="ri-focus-3-line"></i></span>
                                        <select class="form-select form-select-sm py-1" id="day-focus" onchange="workoutPlanForm.updateDayFocus()">
                                            <option>سینه و پشت بازو</option>
                                            <option>پا</option>
                                            <option>شانه</option>
                                            <option>کامل بدن</option>
                                        </select>
                                    </div>
                                    <input type="text" id="day-title-input" class="form-control form-control-sm" style="width: 140px;" placeholder="عنوان روز">
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-danger" onclick="workoutPlanForm.clearCurrentDay()"><i class="ri-delete-bin-line me-1"></i>پاک کردن</button>
                                    <button class="btn btn-sm btn-success" onclick="workoutPlanForm.markDayComplete()"><i class="ri-check-double-line me-1"></i>تکمیل</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="exercises-container" class="animate-fade-in" style="animation-delay: 0.3s;"></div>

                    <div class="add-exercise-area animate-fade-in" style="animation-delay: 0.4s;" onclick="workoutPlanForm.showExerciseModal()">
                        <div class="py-3">
                            <i class="ri-add-circle-fill fs-24 text-primary mb-2 d-block"></i>
                            <span class="fw-medium">افزودن تمرین</span>
                            <small class="text-muted d-block mb-2">کلیک کنید یا از کتابخانه بکشید</small>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); workoutPlanForm.showExerciseModal()"><i class="ri-add-line me-1"></i>دستی</button>
                                <button class="btn btn-sm btn-outline-success" onclick="event.stopPropagation(); workoutPlanForm.openLibrary()"><i class="ri-database-2-line me-1"></i>کتابخانه</button>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-3 animate-fade-in" style="animation-delay: 0.5s;">
                        <div class="card-header bg-transparent border-bottom py-2">
                            <h5 class="card-title mb-0 small d-flex align-items-center"><i class="ri-settings-3-line me-2"></i>تنظیمات روز</h5>
                        </div>
                        <div class="card-body py-2 px-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-4">
                                    <label class="form-label small mb-0">مدت (دقیقه)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text py-1"><i class="ri-timer-line"></i></span>
                                        <input type="number" id="day-duration" class="form-control py-1" min="15" max="180" value="60" onchange="workoutPlanForm.updateDayStats()">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label small mb-0">سطح</label>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="easy" value="easy" checked>
                                            <label class="form-check-label small" for="easy"><span class="badge bg-success">آسان</span></label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="medium" value="medium">
                                            <label class="form-check-label small" for="medium"><span class="badge bg-warning">متوسط</span></label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="dayDifficulty" id="hard" value="hard">
                                            <label class="form-check-label small" for="hard"><span class="badge bg-danger">سخت</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small mb-0">نکات روز</label>
                                    <textarea id="day-notes" class="form-control form-control-sm" rows="1" placeholder="اختیاری..." style="resize: none;"></textarea>
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
        <div class="exercise-card draggable-exercise" draggable="true" data-exercise-id="" data-workout-exercise-id="">
            <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                <div class="min-w-0 flex-grow-1">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="drag-handle text-muted" style="cursor: move;"><i class="ri-drag-move-2-line"></i></div>
                        <input type="text" class="form-control form-control-sm border-0 exercise-title bg-transparent px-0" placeholder="نام تمرین" style="font-weight: 600; font-size: 1rem;">
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <select class="form-select form-select-sm muscle-select" style="width: 110px;">
                            <option value="chest">سینه</option>
                            <option value="back">پشت</option>
                            <option value="legs">پا</option>
                            <option value="shoulders">شانه</option>
                            <option value="arms">بازو</option>
                            <option value="core">میان تنه</option>
                        </select>
                        <input type="number" class="form-control form-control-sm quick-input" placeholder="ست" style="width: 55px;" min="1" max="10">
                        <span class="text-muted">×</span>
                        <input type="text" class="form-control form-control-sm quick-input" placeholder="تکرار" style="width: 70px;">
                        <div class="input-group input-group-sm" style="width: 85px;">
                            <span class="input-group-text py-0"><i class="ri-timer-line"></i></span>
                            <input type="text" class="form-control py-0" placeholder="استراحت" value="90s">
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-1 flex-shrink-0">
                    <button class="btn btn-sm btn-outline-primary p-1" onclick="workoutPlanForm.editExerciseSets(this)" title="ست‌ها"><i class="ri-settings-3-line"></i></button>
                    <button class="btn btn-sm btn-outline-secondary p-1" onclick="workoutPlanForm.duplicateExercise(this)" title="کپی"><i class="ri-file-copy-line"></i></button>
                    <button class="btn btn-sm btn-outline-danger p-1" onclick="workoutPlanForm.removeExercise(this)" title="حذف"><i class="ri-delete-bin-line"></i></button>
                </div>
            </div>
            <div class="set-row">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 small">جزئیات ست‌ها</h6>
                    <button class="btn btn-sm btn-link p-0 small" onclick="workoutPlanForm.addSet(this)"><i class="ri-add-line me-1"></i>افزودن ست</button>
                </div>
                <div class="row g-2" id="sets-container"></div>
            </div>
            <div class="mt-2">
                <textarea class="form-control form-control-sm" rows="1" placeholder="نکات اجرایی (اختیاری)" style="resize: none;"></textarea>
            </div>
        </div>
    </template>

    <!-- Floating Actions -->
    <div class="floating-actions d-print-none">
        <button class="floating-btn btn-primary" onclick="workoutPlanForm.scrollToTop()" title="بازگشت به بالا">
            <i class="ri-arrow-up-line fs-20"></i>
        </button>
        <button class="floating-btn btn-success" onclick="workoutPlanForm.addQuickExercise()" title="افزودن سریع تمرین">
            <i class="ri-add-line fs-20"></i>
        </button>
        <button class="floating-btn btn-info" onclick="workoutPlanForm.showStats()" title="نمایش آمار">
            <i class="ri-bar-chart-box-line fs-20"></i>
        </button>
    </div>
@endsection

@section('scripts')
    {{-- فقط تنظیمات سرور برای JS فرم برنامه ورزشی (به‌صورت data-attribute تا TS درگیر JS نشود) --}}
    @php
        $exerciseJson = json_encode($exerciseLibrary ?? [], JSON_UNESCAPED_UNICODE);
        $initialPlanJson = null;
        if (isset($plan)) {
            $initialPlanState = [
                'name' => $plan->name,
                'description' => $plan->description,
                'weeks_count' => $plan->weeks_count ?? 4,
                'level' => $plan->level ?? 'medium',
                'estimated_calories' => $plan->estimated_calories,
                'equipment' => $plan->equipment,
                'safety_notes' => $plan->safety_notes,
                'days' => $plan->days->map(function ($day, $sortOrder) {
                    return [
                        'day_index' => $sortOrder,
                        'title' => $day->title,
                        'focus' => $day->focus,
                        'duration_minutes' => $day->duration_minutes ?? 60,
                        'difficulty' => $day->difficulty ?? 'medium',
                        'notes' => $day->notes,
                        'exercises' => $day->exercises->map(function ($ex) {
                            return [
                                'workout_exercise_id' => $ex->workout_exercise_id,
                                'custom_name' => $ex->custom_name,
                                'name' => $ex->display_name,
                                'sets_count' => $ex->sets_count ?? 3,
                                'reps_text' => $ex->reps_text,
                                'rest_seconds' => $ex->rest_seconds,
                                'notes' => $ex->notes,
                            ];
                        })->values()->all(),
                    ];
                })->values()->all(),
            ];
            $initialPlanJson = json_encode($initialPlanState, JSON_UNESCAPED_UNICODE);
        }
    @endphp

    <div id="workout-plan-config"
         data-exercise-library='{{ $exerciseJson }}'
         data-plans-store-url="{{ route('plans.store') }}"
         data-plans-token="{{ csrf_token() }}"
         data-plans-assign-url="{{ route('plans.assign') }}"
         data-plans-library-url="{{ route('plans.library') }}"
         @if(isset($plan))
             data-initial-plan='{{ $initialPlanJson }}'
             data-plans-update-url="{{ route('Workouts.update', $plan) }}"
             data-editing-plan-id="{{ $plan->id }}"
         @endif
    ></div>

    <script src="{{ asset('assets/js/pages/workout-plan-form.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <style>
        @keyframes fadeOut { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-20px); } }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .pulse { animation: pulse 2s infinite; }
    </style>
@endsection
