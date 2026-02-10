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
                    <div class="card border-0 bg-white shadow-sm mb-3">
                        <div class="card-body py-3 px-3 px-md-4">
                            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3 gap-lg-4">
                                <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                                    <i class="ri-add-circle-line text-primary fs-2 d-none d-md-block"></i>
                                    <div class="min-w-0 flex-grow-1">
                                        <input type="text"
                                               class="form-control form-control-lg border-1 border-primary-subtle"
                                               placeholder="نام برنامه خود را اینجا بنویسید..."
                                               style="font-size: 1.15rem; font-weight: 600; border-radius: 10px;"
                                               oninput="updateProgramName(this.value)">
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 flex-shrink-0">
                                    <button type="button" class="btn btn-outline-primary btn-sm d-none d-md-inline-flex" onclick="sendProgram()">
                                        <i class="ri-send-plane-line me-1"></i>ارسال
                                    </button>
                                    <button class="btn btn-primary btn-sm" onclick="saveProgram()">
                                        <i class="ri-save-3-line me-1"></i>ذخیره برنامه
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <textarea class="form-control form-control-sm border-0 bg-light"
                                          rows="2"
                                          placeholder="توضیحات اختیاری..."
                                          style="border-radius: 8px; resize: none; padding: 0.5rem 0.75rem; font-size: 0.9rem;"
                                          oninput="updateProgramDescription(this.value)"></textarea>
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
                                             onclick="selectDay({{ $index }}, '{{ $day }}')">
                                            <div class="fw-medium" style="font-size: 0.9rem;">{{ $day }}</div>
                                            <small class="text-muted day-count" data-day="{{ $index }}">۰ تمرین</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <button class="btn btn-outline-primary btn-sm w-100" onclick="addCustomDay()">
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
                                <button class="btn btn-sm btn-light p-1" onclick="refreshLibrary()">
                                    <i class="ri-refresh-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body py-2">
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text bg-light border-end-0 py-1"><i class="ri-search-line"></i></span>
                                <input type="text" class="form-control border-start-0 py-1" placeholder="جستجو..." oninput="filterExercises(this.value)">
                            </div>
                            <div class="vstack gap-1" id="exercise-library"></div>
                            <div class="text-center mt-2">
                                <button class="btn btn-sm btn-outline-secondary" onclick="showAllExercises()">نمایش همه</button>
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
                                        <select class="form-select form-select-sm py-1" id="day-focus" onchange="updateDayFocus()">
                                            <option>سینه و پشت بازو</option>
                                            <option>پا</option>
                                            <option>شانه</option>
                                            <option>کامل بدن</option>
                                        </select>
                                    </div>
                                    <input type="text" id="day-title-input" class="form-control form-control-sm" style="width: 140px;" placeholder="عنوان روز">
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-danger" onclick="clearCurrentDay()"><i class="ri-delete-bin-line me-1"></i>پاک کردن</button>
                                    <button class="btn btn-sm btn-success" onclick="markDayComplete()"><i class="ri-check-double-line me-1"></i>تکمیل</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="exercises-container" class="animate-fade-in" style="animation-delay: 0.3s;"></div>

                    <div class="add-exercise-area animate-fade-in" style="animation-delay: 0.4s;" onclick="showExerciseModal()" ondragover="handleDragOver(event)" ondrop="handleDrop(event)">
                        <div class="py-3">
                            <i class="ri-add-circle-fill fs-24 text-primary mb-2 d-block"></i>
                            <span class="fw-medium">افزودن تمرین</span>
                            <small class="text-muted d-block mb-2">کلیک کنید یا از کتابخانه بکشید</small>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); showExerciseModal()"><i class="ri-add-line me-1"></i>دستی</button>
                                <button class="btn btn-sm btn-outline-success" onclick="event.stopPropagation(); openLibrary()"><i class="ri-database-2-line me-1"></i>کتابخانه</button>
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
                                        <input type="number" id="day-duration" class="form-control py-1" min="15" max="180" value="60" onchange="updateDayStats()">
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
                    <button class="btn btn-sm btn-outline-primary p-1" onclick="editExerciseSets(this)" title="ست‌ها"><i class="ri-settings-3-line"></i></button>
                    <button class="btn btn-sm btn-outline-secondary p-1" onclick="duplicateExercise(this)" title="کپی"><i class="ri-file-copy-line"></i></button>
                    <button class="btn btn-sm btn-outline-danger p-1" onclick="removeExercise(this)" title="حذف"><i class="ri-delete-bin-line"></i></button>
                </div>
            </div>
            <div class="set-row">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 small">جزئیات ست‌ها</h6>
                    <button class="btn btn-sm btn-link p-0 small" onclick="addSet(this)"><i class="ri-add-line me-1"></i>افزودن ست</button>
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
        // کتابخانه تمرینات از سرور (دیتابیس دسته‌بندی تمرین‌ها)
        window.exerciseLibraryFromServer = @json($exerciseLibrary ?? []);
        window.plansStoreUrl = '{{ route("plans.store") }}';
        window.plansStoreToken = '{{ csrf_token() }}';
        window.plansAssignUrl = '{{ route("plans.assign") }}';

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
            saveCurrentDayToState();

            document.querySelectorAll('.day-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            if (event && event.target && event.target.closest) {
                const tab = event.target.closest('.day-tab');
                if (tab) tab.classList.add('active');
            } else {
                document.querySelector(`.day-tab[data-day="${dayIndex}"]`)?.classList.add('active');
            }

            programState.currentDay = dayIndex;

            const header = document.getElementById('current-day-header');
            header.style.display = 'block';
            document.getElementById('current-day-title').textContent = dayName;

            loadDayExercises(dayIndex);
            loadDaySettings(dayIndex);
            updateDayCount(dayIndex);
            updateCompletionProgress();
        }

        function saveCurrentDayToState() {
            const dayIndex = programState.currentDay;
            if (!programState.days[dayIndex]) programState.days[dayIndex] = { exercises: [], duration_minutes: 60, difficulty: 'easy', notes: '', title: '', focus: '' };

            const container = document.getElementById('exercises-container');
            const cards = container.querySelectorAll('.exercise-card');
            programState.days[dayIndex].exercises = [];
            cards.forEach(card => {
                const titleEl = card.querySelector('.exercise-title');
                const muscleSelect = card.querySelector('.muscle-select');
                const setsInput = card.querySelectorAll('.quick-input')[0];
                const repsInput = card.querySelectorAll('.quick-input')[1];
                const restInput = card.querySelector('.input-group input');
                const notesEl = card.querySelector('.set-row + div textarea, .mt-2 textarea');
                programState.days[dayIndex].exercises.push({
                    name: titleEl ? titleEl.value : '',
                    workout_exercise_id: card.dataset.workoutExerciseId || null,
                    custom_name: titleEl && !card.dataset.workoutExerciseId ? titleEl.value : null,
                    sets_count: setsInput ? parseInt(setsInput.value, 10) || 3 : 3,
                    reps_text: repsInput ? repsInput.value : '',
                    rest_seconds: parseRestToSeconds(restInput ? restInput.value : ''),
                    notes: notesEl ? notesEl.value : ''
                });
            });

            const durEl = document.getElementById('day-duration');
            const notesEl = document.getElementById('day-notes');
            const titleEl = document.getElementById('day-title-input');
            const focusEl = document.getElementById('day-focus');
            const diffRadio = document.querySelector('input[name="dayDifficulty"]:checked');
            programState.days[dayIndex].duration_minutes = durEl ? parseInt(durEl.value, 10) || 60 : 60;
            programState.days[dayIndex].notes = notesEl ? notesEl.value : '';
            programState.days[dayIndex].title = titleEl ? titleEl.value : '';
            programState.days[dayIndex].focus = focusEl ? focusEl.value : '';
            programState.days[dayIndex].difficulty = diffRadio ? diffRadio.value || 'medium' : 'medium';
        }

        function parseRestToSeconds(val) {
            if (!val) return null;
            val = String(val).trim().toLowerCase();
            const num = parseInt(val, 10);
            if (!isNaN(num)) return num;
            if (val.endsWith('s')) return parseInt(val, 10) || null;
            if (val.endsWith('m')) return (parseInt(val, 10) || 0) * 60;
            return null;
        }

        function loadDaySettings(dayIndex) {
            const d = programState.days[dayIndex] || {};
            const durEl = document.getElementById('day-duration');
            const notesEl = document.getElementById('day-notes');
            const titleEl = document.getElementById('day-title-input');
            const focusEl = document.getElementById('day-focus');
            if (durEl) durEl.value = d.duration_minutes ?? 60;
            if (notesEl) notesEl.value = d.notes ?? '';
            if (titleEl) titleEl.value = d.title ?? '';
            if (focusEl) focusEl.value = d.focus ?? '';
            const diff = d.difficulty || 'easy';
            const r = document.querySelector(`input[name="dayDifficulty"][value="${diff}"]`);
            if (r) r.checked = true;
        }

        function updateDayCount(dayIndex) {
            const count = (programState.days[dayIndex] && programState.days[dayIndex].exercises) ? programState.days[dayIndex].exercises.length : 0;
            const el = document.querySelector(`.day-count[data-day="${dayIndex}"]`);
            if (el) el.textContent = count + ' تمرین';
        }

        function loadDayExercises(dayIndex) {
            const container = document.getElementById('exercises-container');
            container.innerHTML = '';

            if (programState.days[dayIndex] && programState.days[dayIndex].exercises) {
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
            if (exerciseData.workoutExerciseId != null) {
                exerciseCard.dataset.workoutExerciseId = exerciseData.workoutExerciseId;
            }

            // Set values if provided
            if (exerciseData.name) {
                exerciseCard.querySelector('.exercise-title').value = exerciseData.name;
            }
            const qInputs = exerciseCard.querySelectorAll('.quick-input');
            if (exerciseData.sets_count && qInputs[0]) qInputs[0].value = exerciseData.sets_count;
            if (exerciseData.reps_text && qInputs[1]) qInputs[1].value = exerciseData.reps_text;
            const restInput = exerciseCard.querySelector('.input-group input');
            if (restInput && exerciseData.rest_seconds != null) restInput.value = exerciseData.rest_seconds + 's';
            const notesTa = exerciseCard.querySelector('.mt-2 textarea, textarea[placeholder*="نکات"]');
            if (notesTa && exerciseData.notes) notesTa.value = exerciseData.notes;

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
            const container = document.getElementById('exercises-container');
            const exercises = container ? container.querySelectorAll('.exercise-card').length : 0;
            const sets = document.querySelectorAll('.set-row').length;

            const statEx = document.getElementById('stat-exercises');
            if (statEx) statEx.textContent = exercises;
            const statSets = document.getElementById('stat-sets');
            if (statSets) statSets.textContent = sets;

            const currentDay = programState.currentDay;
            const dayCountEl = document.querySelector(`.day-count[data-day="${currentDay}"]`);
            if (dayCountEl) dayCountEl.textContent = exercises + ' تمرین';
        }

        function updateCompletionProgress() {
            const progressBar = document.getElementById('completion-progress');
            const progressText = document.getElementById('completion-text');
            if (!progressBar || !progressText) return;
            const totalFields = 10;
            const filledFields = document.querySelectorAll('input[value], textarea[value], select option:checked').length;
            const progress = Math.min(100, Math.round((filledFields / totalFields) * 100));
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${progress}٪ تکمیل شده`;
            progressBar.classList.remove('bg-warning', 'bg-success', 'bg-danger');
            if (progress < 30) progressBar.classList.add('bg-danger');
            else if (progress < 70) progressBar.classList.add('bg-warning');
            else progressBar.classList.add('bg-success');
        }

        function showHelp() { showToast('راهنما به زودی.', 'info'); }
        function updateProgramName(v) { programState.name = v; }
        function updateProgramDescription(v) { programState.description = v; }
        function updateDayFocus() {}
        function updateDayStats() {}
        function clearCurrentDay() {
            if (!confirm('پاک کردن تمام تمرینات این روز؟')) return;
            saveCurrentDayToState();
            programState.days[programState.currentDay].exercises = [];
            loadDayExercises(programState.currentDay);
            loadDaySettings(programState.currentDay);
            updateStats();
            updateDayCount(programState.currentDay);
            showToast('روز خالی شد.', 'warning');
        }
        function markDayComplete() { showToast('روز به عنوان تکمیل علامت زده شد.', 'success'); }
        function showExerciseModal() { addExerciseToDOM({}); showToast('تمرین خالی اضافه شد.', 'info'); }
        function openLibrary() { document.querySelector('.col-xl-3 .card:nth-child(2)')?.scrollIntoView({ behavior: 'smooth' }); }
        function addQuickExercise() { addExerciseToDOM({}); }
        function showStats() { updateStats(); showToast('آمار به‌روز شد.', 'info'); }
        function filterExercises(q) {
            const lib = document.getElementById('exercise-library');
            if (!lib) return;
            q = (q || '').toLowerCase();
            lib.querySelectorAll('.exercise-library-item').forEach(el => {
                el.style.display = q ? (el.textContent.toLowerCase().includes(q) ? '' : 'none') : '';
            });
        }
        function showAllExercises() { filterExercises(''); }
        function refreshLibrary() { initializeLibrary(); showToast('کتابخانه به‌روز شد.', 'info'); }
        function addSet(btn) { showToast('افزودن ست به نسخه‌های بعدی اضافه می‌شود.', 'info'); }
        function editExerciseSets(btn) { showToast('ویرایش ست‌ها به زودی.', 'info'); }
        function handleDragOver(e) { e.preventDefault(); e.currentTarget.classList.add('drag-over'); }
        function handleDrop(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('drag-over');
            const idx = e.dataTransfer.getData('exerciseIndex');
            if (idx !== '') addLibraryExercise(parseInt(idx, 10));
        }

        // Library Functions — از سرور (دیتابیس) یا لیست پیش‌فرض
        function getLibraryExercises() {
            if (window.exerciseLibraryFromServer && window.exerciseLibraryFromServer.length > 0) {
                return window.exerciseLibraryFromServer.map(ex => ({
                    id: ex.id,
                    name: ex.name,
                    muscle: ex.muscle || '—',
                    sub_group: ex.sub_group || '',
                    difficulty: 'medium'
                }));
            }
            return [
                { id: null, name: 'پرس سینه با هالتر', muscle: 'سینه', sub_group: '', difficulty: 'medium' },
                { id: null, name: 'زیربغل هالتر خم', muscle: 'پشت', sub_group: '', difficulty: 'medium' },
                { id: null, name: 'اسکوات با هالتر', muscle: 'پا', sub_group: '', difficulty: 'hard' },
                { id: null, name: 'پرس سرشانه دمبل', muscle: 'شانه', sub_group: '', difficulty: 'medium' },
                { id: null, name: 'جلوبازو هالتر', muscle: 'بازو', sub_group: '', difficulty: 'easy' },
                { id: null, name: 'پشت بازو سیمکش', muscle: 'بازو', sub_group: '', difficulty: 'easy' },
                { id: null, name: 'لانگز دمبل', muscle: 'پا', sub_group: '', difficulty: 'medium' },
                { id: null, name: 'فیله کمر', muscle: 'پشت', sub_group: '', difficulty: 'easy' },
                { id: null, name: 'کرانچ', muscle: 'میان تنه', sub_group: '', difficulty: 'easy' },
                { id: null, name: 'پول آپ', muscle: 'پشت', sub_group: '', difficulty: 'hard' }
            ];
        }

        function initializeLibrary() {
            const exercises = getLibraryExercises();
            const library = document.getElementById('exercise-library');
            library.innerHTML = '';

            exercises.forEach((exercise, index) => {
                const item = document.createElement('div');
                item.className = 'exercise-library-item';
                item.draggable = true;
                item.dataset.exerciseIndex = index;
                const sub = exercise.sub_group ? ` • ${exercise.sub_group}` : '';
                item.innerHTML = `
                <div>
                    <div class="fw-medium">${exercise.name}</div>
                    <small class="text-muted">${exercise.muscle}${sub}</small>
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
            const exercises = getLibraryExercises();
            const ex = exercises[index];
            if (!ex) return;
            addExerciseToDOM({
                name: ex.name,
                workoutExerciseId: ex.id || null
            });
            showToast('تمرین اضافه شد', 'success');
        }

        // Save & Preview
        function submitProgram(redirectAfter = false) {
            saveCurrentDayToState();
            const programData = collectProgramData();

            const nameInput = document.querySelector('input[placeholder*="نام برنامه"]');
            if (!programData.name || !programData.name.trim()) {
                showToast('نام برنامه را وارد کنید.', 'danger');
                if (nameInput) nameInput.focus();
                return;
            }

            showToast('در حال ذخیره برنامه...', 'info');

            fetch(window.plansStoreUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.plansStoreToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(programData)
            })
            .then(async r => {
                if (r.ok || r.redirected) {
                    showToast('برنامه با موفقیت ذخیره شد.', 'success');
                    if (redirectAfter && window.plansAssignUrl) {
                        window.location.href = window.plansAssignUrl;
                    }
                    return;
                }
                const text = await r.text();
                let err = { message: 'خطا در ذخیره.' };
                try { err = JSON.parse(text); } catch (e) {}
                const msg = err.message || (err.errors && Object.values(err.errors).flat().join(' ')) || text || 'خطا در ذخیره.';
                return Promise.reject({ message: msg });
            })
            .catch(err => {
                showToast(err && err.message ? err.message : 'خطا در ذخیره.', 'danger');
            });
        }

        function saveProgram() {
            submitProgram(false);
        }

        function sendProgram() {
            submitProgram(true);
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
            const nameEl = document.querySelector('input[placeholder*="نام برنامه"]');
            const descEl = document.querySelector('textarea[placeholder*="توضیحات اختیاری"]');
            const days = [];
            const dayNames = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'];
            for (let i = 0; i < 7; i++) {
                const d = programState.days[i] || {};
                days.push({
                    day_index: i,
                    title: d.title || null,
                    focus: d.focus || null,
                    duration_minutes: d.duration_minutes ?? 60,
                    difficulty: d.difficulty || 'medium',
                    notes: d.notes || null,
                    exercises: (d.exercises || []).map(ex => ({
                        workout_exercise_id: ex.workout_exercise_id ? parseInt(ex.workout_exercise_id, 10) : null,
                        custom_name: ex.custom_name || ex.name || null,
                        sets_count: ex.sets_count ?? 3,
                        reps_text: ex.reps_text || null,
                        rest_seconds: ex.rest_seconds ?? null,
                        notes: ex.notes || null
                    }))
                });
            }
            return {
                name: nameEl ? nameEl.value.trim() : '',
                description: descEl ? descEl.value.trim() : '',
                days: days
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
