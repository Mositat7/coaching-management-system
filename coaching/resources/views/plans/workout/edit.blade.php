@extends('layouts.master')

@section('head')
    <style>
        /* طراحی مشابه صفحه نمایش */
        .workout-edit-container {
            --edit-accent: #f59e0b;
            --edit-accent-light: rgba(245, 158, 11, 0.1);
        }

        .editable-card {
            border: 2px solid var(--edit-accent-light);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
            position: relative;
            transition: all 0.3s ease;
        }

        [data-bs-theme="dark"] .editable-card {
            background: #1e293b;
            border-color: rgba(245, 158, 11, 0.2);
        }

        .editable-card:hover {
            border-color: var(--edit-accent);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.15);
        }

        .edit-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--edit-accent);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
            z-index: 10;
            border: 2px solid white;
        }

        [data-bs-theme="dark"] .edit-badge {
            border-color: #1e293b;
        }

        /* حالت ویرایش فعال */
        .editing {
            animation: pulse-border 2s infinite;
        }

        @keyframes pulse-border {
            0%, 100% { border-color: rgba(245, 158, 11, 0.3); }
            50% { border-color: rgba(245, 158, 11, 0.6); }
        }

        /* فیلدهای ویرایش مستقیم */
        .inline-edit {
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            padding: 6px 10px;
            background: transparent;
            transition: all 0.2s ease;
            min-width: 100px;
        }

        .inline-edit:focus {
            outline: none;
            border: 1px solid #3b82f6;
            background: rgba(59, 130, 246, 0.05);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        [data-bs-theme="dark"] .inline-edit {
            border-color: #475569;
            background: rgba(255, 255, 255, 0.05);
        }

        [data-bs-theme="dark"] .inline-edit:focus {
            background: rgba(59, 130, 246, 0.1);
        }

        /* پنل ویرایش سایدبار */
        .edit-sidebar {
            position: sticky;
            top: 20px;
        }

        .edit-preview {
            border-left: 3px solid var(--edit-accent);
            background: var(--edit-accent-light);
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        [data-bs-theme="dark"] .edit-preview {
            background: rgba(245, 158, 11, 0.1);
        }

        /* دکمه‌های ویرایش سریع */
        .quick-edit-btn {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .editable-card:hover .quick-edit-btn {
            opacity: 1;
        }

        /* حالت مقایسه */
        .compare-mode .original-value {
            text-decoration: line-through;
            color: #dc2626;
            opacity: 0.6;
        }

        .compare-mode .new-value {
            color: #16a34a;
            font-weight: 500;
        }

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .editable-card {
                padding: 15px;
            }

            .edit-badge {
                font-size: 10px;
                padding: 3px 8px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- هدر ویرایش -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">
                                <i class="ri-pencil-line text-warning me-2"></i>
                                ویرایش برنامه ورزشی
                            </h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">کتابخانه</a></li>
                                    <li class="breadcrumb-item"><a href="#">برنامه‌های من</a></li>
                                    <li class="breadcrumb-item active">ویرایش حجم‌گیری</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="toggleCompareMode()">
                                <i class="ri-eye-line me-1"></i>
                                حالت مقایسه
                            </button>
                            <button class="btn btn-sm btn-warning" onclick="saveChanges()">
                                <i class="ri-save-line me-1"></i>
                                ذخیره تغییرات
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- سایدبار ویرایش -->
                <div class="col-xl-3 col-lg-4">
                    <div class="edit-sidebar">
                        <!-- خلاصه ویرایش -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-block">
                                        <i class="ri-edit-2-line fs-24 text-warning"></i>
                                    </div>
                                    <h6 class="mt-2 mb-1">در حال ویرایش</h6>
                                    <p class="text-muted small">برنامه حجم‌گیری فاز اول</p>
                                </div>

                                <!-- پیش‌نمایش تغییرات -->
                                <div class="edit-preview">
                                    <h6 class="small mb-2">تغییرات فعلی:</h6>
                                    <div class="vstack gap-2" id="changes-preview">
                                        <!-- تغییرات به صورت دینامیک -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تاریخچه ویرایش -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="mb-3">
                                    <i class="ri-history-line me-2"></i>
                                    آخرین ویرایش‌ها
                                </h6>
                                <div class="vstack gap-2">
                                    <div class="d-flex justify-content-between small">
                                        <span>افزایش زمان استراحت</span>
                                        <span class="text-muted">دیروز</span>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                        <span>اضافه کردن تمرین جدید</span>
                                        <span class="text-muted">۳ روز پیش</span>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                        <span>تغییر نام برنامه</span>
                                        <span class="text-muted">۱ هفته پیش</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- هشدارها -->
                        <div class="card border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <i class="ri-alert-line text-warning me-2"></i>
                                    <div>
                                        <small class="text-muted">
                                            تغییرات روی <strong>۲۴ شاگرد فعال</strong> تأثیر می‌گذارد.
                                            بعد از ذخیره، اطلاع‌رسانی می‌شود.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی (ویرایش مستقیم) -->
                <div class="col-xl-9 col-lg-8">
                    <!-- هدر برنامه -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                                <i class="ri-dumbbell-fill text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <!-- ویرایش مستقیم نام -->
                                            <input type="text"
                                                   class="form-control form-control-lg border-0 px-0 fw-bold bg-transparent"
                                                   value="برنامه حجم‌گیری فاز اول"
                                                   id="program-title"
                                                   onchange="logChange('نام برنامه', this.value)">
                                            <!-- ویرایش مستقیم توضیحات -->
                                            <textarea class="form-control border-0 bg-transparent px-0 mt-2"
                                                      rows="1"
                                                      placeholder="توضیحات برنامه..."
                                                      onchange="logChange('توضیحات', this.value)"
                                                      style="resize: none; min-height: auto;">برنامه ۴ هفته‌ای برای افزایش حجم عضلات با تمرکز بر حرکات پایه</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <!-- تنظیمات سریع -->
                                    <div class="vstack gap-2">
                                        <select class="form-select form-select-sm"
                                                onchange="logChange('وضعیت', this.value)">
                                            <option value="active" selected>فعال</option>
                                            <option value="draft">پیش‌نویس</option>
                                            <option value="archived">آرشیو</option>
                                        </select>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary w-100" onclick="previewProgram()">
                                                پیش‌نمایش
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger w-100" onclick="resetChanges()">
                                                بازنشانی
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تب‌های ویرایش -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#edit-days">
                                        <i class="ri-calendar-line me-2"></i>
                                        روزهای تمرین
                                        <span class="badge bg-warning ms-1">۵ روز</span>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-exercises">
                                        <i class="ri-dumbbell-line me-2"></i>
                                        تمرینات
                                        <span class="badge bg-warning ms-1">۸ تمرین</span>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-settings">
                                        <i class="ri-settings-3-line me-2"></i>
                                        تنظیمات
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <!-- ویرایش روزها -->
                                <div class="tab-pane fade show active" id="edit-days">
                                    <!-- روز ۱ -->
                                    <div class="editable-card">
                                        <span class="edit-badge">در حال ویرایش</span>

                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <!-- ویرایش نام روز -->
                                                <input type="text"
                                                       class="h5 mb-2 border-0 bg-transparent px-0 fw-bold"
                                                       value="روز اول: سینه و پشت بازو"
                                                       onchange="logChange('نام روز اول', this.value)">

                                                <!-- تنظیمات روز -->
                                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                                    <select class="form-select form-select-sm" style="width: auto;"
                                                            onchange="logChange('گروه عضلانی روز اول', this.value)">
                                                        <option selected>سینه و پشت بازو</option>
                                                        <option>پا</option>
                                                        <option>شانه و بازو</option>
                                                        <option>کامل بدن</option>
                                                    </select>

                                                    <div class="input-group input-group-sm" style="width: 120px;">
                                                        <input type="number" class="form-control" value="60"
                                                               onchange="logChange('زمان روز اول', this.value + ' دقیقه')">
                                                        <span class="input-group-text">دقیقه</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- اقدامات روز -->
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-sm btn-outline-primary" onclick="addExerciseToDay(1)">
                                                    <i class="ri-add-line"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" onclick="removeDay(1)">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- تمرینات این روز -->
                                        <div class="mt-3">
                                            <!-- تمرین ۱ -->
                                            <div class="exercise-item editable p-3 border rounded mb-2">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <!-- ویرایش نام تمرین -->
                                                        <input type="text"
                                                               class="inline-edit fw-medium"
                                                               value="پرس سینه با هالتر"
                                                               onchange="logChange('تمرین روز اول', this.value)">

                                                        <!-- ویرایش گروه عضلانی -->
                                                        <select class="form-select form-select-sm" style="width: auto;">
                                                            <option selected>سینه</option>
                                                            <option>پشت</option>
                                                            <option>پا</option>
                                                        </select>
                                                    </div>

                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-sm btn-outline-primary" onclick="editExerciseSets(this)">
                                                            <i class="ri-settings-3-line"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="removeExerciseFromDay(this)">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- ویرایش سریع ست‌ها -->
                                                <div class="row g-2">
                                                    <div class="col-md-3">
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-text">ست‌ها</span>
                                                            <input type="number" class="form-control" value="4"
                                                                   onchange="logChange('تعداد ست‌ها', this.value)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-text">تکرار</span>
                                                            <input type="text" class="form-control" value="8-12">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-text">استراحت</span>
                                                            <input type="text" class="form-control" value="90s">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-sm btn-outline-secondary w-100" onclick="showAdvancedEdit(this)">
                                                            جزئیات بیشتر
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- تمرین ۲ -->
                                            <div class="exercise-item editable p-3 border rounded">
                                                <!-- ساختار مشابه تمرین ۱ -->
                                            </div>
                                        </div>

                                        <!-- دکمه افزودن تمرین -->
                                        <div class="text-center mt-3">
                                            <button class="btn btn-sm btn-outline-primary" onclick="addExerciseToDay(1)">
                                                <i class="ri-add-line me-1"></i>
                                                افزودن تمرین جدید
                                            </button>
                                        </div>
                                    </div>

                                    <!-- سایر روزها -->
                                    <div class="editable-card">
                                        <span class="edit-badge">در حال ویرایش</span>
                                        <!-- محتوای مشابه روز اول -->
                                    </div>
                                </div>

                                <!-- ویرایش تمرینات -->
                                <div class="tab-pane fade" id="edit-exercises">
                                    <!-- لیست تمام تمرینات -->
                                    <div class="row g-3" id="exercises-list">
                                        <!-- تمرینات به صورت کارت‌های مجزا -->
                                    </div>

                                    <!-- افزودن تمرین جدید -->
                                    <div class="text-center mt-4">
                                        <button class="btn btn-primary" onclick="addNewExercise()">
                                            <i class="ri-add-line me-2"></i>
                                            افزودن تمرین جدید
                                        </button>
                                    </div>
                                </div>

                                <!-- تنظیمات -->
                                <div class="tab-pane fade" id="edit-settings">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">مدت برنامه</label>
                                                <select class="form-select" onchange="logChange('مدت برنامه', this.value)">
                                                    <option value="4">۴ هفته</option>
                                                    <option selected value="6">۶ هفته</option>
                                                    <option value="8">۸ هفته</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">سطح دشواری</label>
                                                <select class="form-select" onchange="logChange('سطح دشواری', this.value)">
                                                    <option value="beginner">مبتدی</option>
                                                    <option selected value="intermediate">متوسط</option>
                                                    <option value="advanced">پیشرفته</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- سایر تنظیمات -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه‌های نهایی -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-outline-secondary" onclick="cancelEditing()">
                                    <i class="ri-close-line me-1"></i>
                                    انصراف
                                </button>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary" onclick="saveDraft()">
                                    <i class="ri-save-line me-1"></i>
                                    ذخیره پیش‌نویس
                                </button>
                                <button class="btn btn-warning" onclick="saveChanges()">
                                    <i class="ri-save-3-line me-1"></i>
                                    انتشار تغییرات
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
    <script>
        // State Management
        let editingState = {
            originalData: {},
            changes: [],
            compareMode: false
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // ذخیره داده‌های اصلی
            saveOriginalData();

            // تنظیم رویدادهای ویرایش
            setupEditListeners();
        });

        // ذخیره داده‌های اصلی
        function saveOriginalData() {
            // در حالت واقعی، از سرور دریافت می‌شود
            editingState.originalData = {
                title: document.getElementById('program-title').value,
                // سایر داده‌ها...
            };
        }

        // ثبت تغییرات
        function logChange(field, newValue) {
            const change = {
                field: field,
                oldValue: editingState.originalData[field],
                newValue: newValue,
                timestamp: new Date().toLocaleTimeString('fa-IR')
            };

            editingState.changes.push(change);
            updateChangesPreview();

            // نشان‌دادن تأیید تغییر
            showChangeConfirmation(field);
        }

        // به‌روزرسانی پیش‌نمایش تغییرات
        function updateChangesPreview() {
            const container = document.getElementById('changes-preview');
            container.innerHTML = '';

            editingState.changes.slice(-5).forEach(change => {
                const changeElement = document.createElement('div');
                changeElement.className = 'd-flex justify-content-between small border-bottom pb-1';
                changeElement.innerHTML = `
                <span>${change.field}</span>
                <span class="text-success">${change.newValue}</span>
            `;
                container.appendChild(changeElement);
            });
        }

        // نمایش تأیید تغییر
        function showChangeConfirmation(field) {
            // ایجاد توست یا نشان‌دادن آیکون
            const fieldElement = event?.target;
            if (fieldElement) {
                fieldElement.classList.add('editing');
                setTimeout(() => {
                    fieldElement.classList.remove('editing');
                }, 1000);
            }
        }

        // حالت مقایسه
        function toggleCompareMode() {
            editingState.compareMode = !editingState.compareMode;
            document.body.classList.toggle('compare-mode', editingState.compareMode);

            if (editingState.compareMode) {
                showOriginalValues();
            }
        }

        // نمایش مقادیر اصلی
        function showOriginalValues() {
            // در حالت واقعی، مقادیر اصلی و جدید کنار هم نمایش داده می‌شوند
        }

        // ذخیره تغییرات
        function saveChanges() {
            if (editingState.changes.length === 0) {
                alert('هیچ تغییری ایجاد نشده است.');
                return;
            }

            if (confirm('آیا از ذخیره تغییرات مطمئن هستید؟')) {
                // در حالت واقعی: ارسال به سرور
                console.log('تغییرات ذخیره شد:', editingState.changes);
                alert('تغییرات با موفقیت ذخیره شدند.');

                // ریست تغییرات
                editingState.changes = [];
                updateChangesPreview();
            }
        }

        // بازنشانی تغییرات
        function resetChanges() {
            if (confirm('آیا می‌خواهید همه تغییرات را بازنشانی کنید؟')) {
                location.reload();
            }
        }

        // لغو ویرایش
        function cancelEditing() {
            if (editingState.changes.length > 0) {
                if (confirm('تغییرات ذخیره نشده از بین خواهند رفت. آیا ادامه می‌دهید؟')) {
                    window.history.back();
                }
            } else {
                window.history.back();
            }
        }

        // تنظیم رویدادهای ویرایش
        function setupEditListeners() {
            // ورودی‌های متنی
            document.querySelectorAll('input, textarea, select').forEach(element => {
                element.addEventListener('change', function() {
                    const fieldName = this.getAttribute('data-field') || this.previousElementSibling?.textContent;
                    if (fieldName) {
                        logChange(fieldName, this.value);
                    }
                });
            });
        }

        // پیش‌نمایش برنامه
        function previewProgram() {
            // باز کردن پیش‌نمایش در صفحه جدید با تغییرات اعمال شده
            const previewData = {
                original: editingState.originalData,
                changes: editingState.changes
            };

            console.log('پیش‌نمایش:', previewData);
            alert('پیش‌نمایش در برگه جدید باز شد.');

            // در حالت واقعی: باز کردن صفحه پیش‌نمایش
            // window.open('/preview?changes=' + encodeURIComponent(JSON.stringify(previewData)));
        }
    </script>
@endsection
