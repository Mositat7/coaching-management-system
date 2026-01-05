@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            جزئیات عضو
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مدیریت اعضا
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                جزئیات عضو
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Left Column: Profile --}}
                <div class="col-lg-4">
                    {{-- Profile Card --}}
                    <div class="card">
                        <div class="card-body p-0">
                            {{-- Header --}}
                            <div class="member-header-bg position-relative"
                                 style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 120px;">
                            </div>

                            {{-- Avatar --}}
                            <div class="text-center pt-4">
                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                     class="avatar-xxl border border-4 border-white rounded-circle shadow">

                                <h4 class="mt-3 mb-1">باربد باباخانی</h4>
                                <div class="badge bg-success-subtle text-success fs-12 px-3 py-1 mb-2">
                                    <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                    اشتراک فعال
                                </div>
                                <p class="text-muted">عضویت از: ۱۴۰۳/۰۱/۱۵</p>
                            </div>

                            {{-- Quick Stats --}}
                            <div class="row text-center border-top py-3 mx-0">
                                <div class="col-4 border-end">
                                    <p class="mb-1 fw-medium text-muted">حضور</p>
                                    <h5 class="fw-semibold">۲۴</h5>
                                    <small class="text-muted">جلسه</small>
                                </div>
                                <div class="col-4 border-end">
                                    <p class="mb-1 fw-medium text-muted">قد / وزن</p>
                                    <h5 class="fw-semibold">۱۷۵/۷۵</h5>
                                    <small class="text-muted">cm/kg</small>
                                </div>
                                <div class="col-4">
                                    <p class="mb-1 fw-medium text-muted">BMI</p>
                                    <h5 class="fw-semibold text-success">۲۴.۵</h5>
                                    <small class="text-muted">نرمال</small>
                                </div>
                            </div>

                            {{-- Contact Info --}}
                            <div class="p-3 border-top">
                                <h6 class="card-title mb-3">اطلاعات تماس</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="avatar-xs d-flex align-items-center justify-content-center bg-soft-primary rounded">
                                            <i class="ri-smartphone-line text-primary fs-16"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">
                                            <strong>موبایل:</strong>
                                            <span class="text-muted">۰۹۰۱۰۰۱۰۰۱۱</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="avatar-xs d-flex align-items-center justify-content-center bg-soft-info rounded">
                                            <i class="ri-cake-line text-info fs-16"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">
                                            <strong>تاریخ تولد:</strong>
                                            <span class="text-muted">۱۳۷۵/۰۵/۲۰ (۲۸ سال)</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="avatar-xs d-flex align-items-center justify-content-center bg-soft-warning rounded">
                                            <i class="ri-id-card-line text-warning fs-16"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0">
                                            <strong>کد ملی:</strong>
                                            <span class="text-muted">۰۰۱۲۳۴۵۶۷۸</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Coach Info --}}
                            <div class="p-3 border-top">
                                <h6 class="card-title mb-3">مربی اختصاصی</h6>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/images/users/coach-1.jpg') }}"
                                             class="rounded-circle"
                                             width="50"
                                             height="50">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">مربی احمدی</h6>
                                        <p class="text-muted mb-0 fs-13">بدنسازی - فیتنس</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="#" class="btn btn-sm btn-outline-primary">پیام</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Health Status --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="card-title mb-0">وضعیت سلامت</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">گروه خونی</label>
                                <div class="badge bg-danger">O+</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">آلرژی / بیماری</label>
                                <p class="text-muted mb-0">فاقد بیماری خاص - آلرژی به پنی سیلین</p>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">داروهای مصرفی</label>
                                <p class="text-muted mb-0">مولتی ویتامین روزانه</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Details --}}
                <div class="col-lg-8">
                    {{-- Subscription Details --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-wallet-line align-middle me-2"></i>
                                اطلاعات اشتراک و مالی
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">نوع اشتراک</label>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-primary me-2">VIP</span>
                                            <span class="fw-medium">۳ ماهه</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">قیمت اشتراک</label>
                                        <h5 class="text-success">۱,۵۰۰,۰۰۰ تومان</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">تاریخ شروع</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-line text-muted me-2"></i>
                                            <span class="fw-medium">۱۴۰۳/۰۱/۱۵</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">تاریخ پرداخت</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-money-dollar-circle-line text-muted me-2"></i>
                                            <span class="fw-medium">۱۴۰۳/۰۱/۱۴</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">تاریخ انقضا</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-close-line text-muted me-2"></i>
                                            <span class="fw-medium text-danger">۱۴۰۳/۰۴/۱۵</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">روش پرداخت</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-bank-card-line text-muted me-2"></i>
                                            <span class="fw-medium">کارت به کارت</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">تاریخ تسویه بعدی</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-event-line text-muted me-2"></i>
                                            <span class="fw-medium text-warning">۱۴۰۳/۰۴/۱۰</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <div class="d-flex align-items-center">
                                    <i class="ri-information-line fs-20 me-2"></i>
                                    <div>
                                        <h6 class="alert-heading mb-1">یادآوری!</h6>
                                        <p class="mb-0">۵ روز تا تاریخ تسویه بعدی باقی مانده است.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Training Details --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-barbell-line align-middle me-2"></i>
                                اطلاعات تمرینی
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">هدف اصلی</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-target-line text-primary me-2"></i>
                                            <span class="fw-medium">افزایش حجم عضلانی</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">سطح آمادگی</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-run-line text-success me-2"></i>
                                            <span class="fw-medium">متوسط</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">برنامه فعلی</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-file-list-line text-info me-2"></i>
                                            <span class="fw-medium">برنامه حجم‌گیری فاز ۱</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">تعداد جلسات هفتگی</label>
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-schedule-line text-warning me-2"></i>
                                            <span class="fw-medium">۴ جلسه در هفته</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">توضیحات مربی</label>
                                <div class="border rounded p-3 bg-light">
                                    <p class="mb-0">عضو با انگیزه و منظم. نیاز به تمرکز بیشتر روی پرس سینه و زیربغل
                                        دارد. تغذیه مناسب را رعایت می‌کند.</p>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary">
                                    <i class="ri-eye-line align-middle me-1"></i> مشاهده برنامه تمرینی
                                </a>
                                <a href="#" class="btn btn-success">
                                    <i class="ri-file-edit-line align-middle me-1"></i> ویرایش برنامه
                                </a>
                                <a href="#" class="btn btn-info">
                                    <i class="ri-chat-1-line align-middle me-1"></i> ارسال پیام
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Attendance History --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-calendar-check-line align-middle me-2"></i>
                                تاریخچه حضور
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>تاریخ</th>
                                        <th>روز هفته</th>
                                        <th>ورود</th>
                                        <th>خروج</th>
                                        <th>مدت</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>۱۴۰۳/۰۲/۲۰</td>
                                        <td>دوشنبه</td>
                                        <td>۱۷:۳۰</td>
                                        <td>۱۹:۰۰</td>
                                        <td>۱.۵ ساعت</td>
                                        <td><span class="badge bg-success">حاضر</span></td>
                                    </tr>
                                    <tr>
                                        <td>۱۴۰۳/۰۲/۱۹</td>
                                        <td>یکشنبه</td>
                                        <td>۱۸:۰۰</td>
                                        <td>۱۹:۳۰</td>
                                        <td>۱.۵ ساعت</td>
                                        <td><span class="badge bg-success">حاضر</span></td>
                                    </tr>
                                    <tr>
                                        <td>۱۴۰۳/۰۲/۱۸</td>
                                        <td>شنبه</td>
                                        <td>۱۷:۰۰</td>
                                        <td>۱۸:۱۵</td>
                                        <td>۱.۲۵ ساعت</td>
                                        <td><span class="badge bg-success">حاضر</span></td>
                                    </tr>
                                    <tr>
                                        <td>۱۴۰۳/۰۲/۱۷</td>
                                        <td>جمعه</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><span class="badge bg-danger">غایب</span></td>
                                    </tr>
                                    <tr>
                                        <td>۱۴۰۳/۰۲/۱۶</td>
                                        <td>پنجشنبه</td>
                                        <td>۱۶:۴۵</td>
                                        <td>۱۸:۳۰</td>
                                        <td>۱.۷۵ ساعت</td>
                                        <td><span class="badge bg-success">حاضر</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-outline-primary">مشاهده همه تاریخچه</a>
                            </div>
                        </div>
                    </div>

                    {{-- Progress Tracking --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-line-chart-line align-middle me-2"></i>
                                پیگیری پیشرفت
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">وزن شروع</p>
                                        <h4 class="fw-semibold">۷۸ kg</h4>
                                        <span class="badge bg-info-subtle text-info">۱۴۰۳/۰۱/۱۵</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">وزن فعلی</p>
                                        <h4 class="fw-semibold">۷۵ kg</h4>
                                        <span class="badge bg-success-subtle text-success">۱۴۰۳/۰۲/۲۰</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">تغییر وزن</p>
                                        <h4 class="fw-semibold text-danger">-۳ kg</h4>
                                        <span class="text-muted fs-12">در ۳۵ روز</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">درصد چربی</p>
                                        <h4 class="fw-semibold">۱۸.۵٪</h4>
                                        <span class="text-muted fs-12">از ۲۲٪</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="row mt-3">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="#" class="btn btn-light">
                                <i class="ri-arrow-right-line align-middle me-1"></i> بازگشت به لیست
                            </a>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-warning">
                                <i class="ri-edit-line align-middle me-1"></i> ویرایش اطلاعات
                            </a>
                            <a href="#" class="btn btn-success">
                                <i class="ri-wallet-line align-middle me-1"></i> ثبت پرداخت جدید
                            </a>
                            <a href="#" class="btn btn-primary">
                                <i class="ri-calendar-line align-middle me-1"></i> افزودن جلسه
                            </a>
                            <button class="btn btn-danger">
                                <i class="ri-user-unfollow-line align-middle me-1"></i> غیرفعال کردن
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function showAlert(message, type = 'info', duration = 5000) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                animation: fadeIn 0.3s;
            `;
            
            alertDiv.innerHTML = `
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="ri-information-line me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close" onclick="this.parentElement.parentElement.remove()"></button>
                </div>
            `;
            
            document.body.appendChild(alertDiv);
            
            // بسته شدن خودکار
            if (duration > 0) {
                setTimeout(() => {
                    if (alertDiv.parentNode) {
                        alertDiv.remove();
                    }
                }, duration);
            }
        }
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert {
            animation: fadeIn 0.3s ease-out !important;
        }
        
        /* استایل‌های دیگر را نگه دار */
        .member-header-bg {
            border-radius: 0.375rem 0.375rem 0 0;
        }
        .avatar-xxl {
            width: 110px;
            height: 110px;
        }
        .bg-soft-primary { background-color: rgba(85, 110, 230, 0.1); }
        .bg-soft-info { background-color: rgba(45, 206, 137, 0.1); }
        .bg-soft-warning { background-color: rgba(247, 184, 75, 0.1); }
        .bg-soft-success { background-color: rgba(45, 206, 137, 0.1); }
        .bg-success-subtle { background-color: rgba(45, 206, 137, 0.15); }
        .bg-info-subtle { background-color: rgba(85, 110, 230, 0.15); }
        .bg-warning-subtle { background-color: rgba(247, 184, 75, 0.15); }
    </style>
@endsection
