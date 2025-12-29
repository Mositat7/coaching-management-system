@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            کتابخانه برنامه‌ها
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                کتابخانه
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <!-- آمار و فیلتر -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-primary bg-opacity-10 p-3">
                                        <i class="ri-dumbbell-line text-primary fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۱۸</h5>
                                    <p class="text-muted mb-0">برنامه ورزشی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-success bg-opacity-10 p-3">
                                        <i class="ri-restaurant-line text-success fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۱۲</h5>
                                    <p class="text-muted mb-0">برنامه غذایی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-info bg-opacity-10 p-3">
                                        <i class="ri-star-line text-info fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۸</h5>
                                    <p class="text-muted mb-0">پراستفاده</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-warning bg-opacity-10 p-3">
                                        <i class="ri-user-line text-warning fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۴۲</h5>
                                    <p class="text-muted mb-0">ارسال شده</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- نوار جستجو و فیلتر -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="جستجوی برنامه...">
                                <button class="btn btn-primary">
                                    <i class="ri-search-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                                <button class="btn btn-outline-primary">
                                    <i class="ri-filter-line me-1"></i>
                                    فیلتر
                                </button>
                                <select class="form-select" style="width: auto;">
                                    <option>همه دسته‌ها</option>
                                    <option>ورزشی</option>
                                    <option>غذایی</option>
                                </select>
                                <select class="form-select" style="width: auto;">
                                    <option>مرتب‌سازی: جدیدترین</option>
                                    <option>مرتب‌سازی: پراستفاده</option>
                                    <option>مرتب‌سازی: الفبایی</option>
                                </select>
                                <a href="{{ route('plans.create') }}" class="btn btn-success">
                                    <i class="ri-add-line me-1"></i>
                                    برنامه جدید
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لیست برنامه‌ها -->
            <div class="row mt-3">
                <!-- برنامه ۱ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary">ورزشی</span>
                                    <span class="badge bg-warning ms-1">متوسط</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">برنامه حجم‌گیری فاز اول</h5>
                            <p class="text-muted mb-3">برنامه ۴ هفته‌ای برای افزایش حجم عضلات مبتدی تا متوسط</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۴ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-dumbbell-line text-muted me-2"></i>
                                        <small>۸ تمرین</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-timer-line text-muted me-2"></i>
                                        <small>۶۰ دقیقه</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۱۵ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۳/۰۱/۲۰</div>
                                </div>
                                <button class="btn btn-sm btn-primary">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- برنامه ۲ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-success">غذایی</span>
                                    <span class="badge bg-info ms-1">کاهش وزن</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">رژیم کاهش وزن متوسط</h5>
                            <p class="text-muted mb-3">برنامه غذایی ۲ هفته‌ای برای کاهش ۲-۳ کیلوگرم</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۲ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-restaurant-line text-muted me-2"></i>
                                        <small>۱۴ وعده</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-fire-line text-muted me-2"></i>
                                        <small>۱۸۰۰ کالری</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۲۲ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۳/۰۱/۱۸</div>
                                </div>
                                <button class="btn btn-sm btn-success">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- برنامه ۳ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary">ورزشی</span>
                                    <span class="badge bg-danger ms-1">پیشرفته</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">تمرینات قدرت فول بادی</h5>
                            <p class="text-muted mb-3">برنامه ۶ هفته‌ای برای افزایش قدرت کلی بدن</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۶ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-dumbbell-line text-muted me-2"></i>
                                        <small>۱۰ تمرین</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-timer-line text-muted me-2"></i>
                                        <small>۹۰ دقیقه</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۸ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۳/۰۱/۱۵</div>
                                </div>
                                <button class="btn btn-sm btn-primary">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- برنامه ۴ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-success">غذایی</span>
                                    <span class="badge bg-warning ms-1">حجم‌گیری</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">رژیم افزایش حجم عضلات</h5>
                            <p class="text-muted mb-3">برنامه غذایی پرکالری برای افزایش حجم خشک</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۸ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-restaurant-line text-muted me-2"></i>
                                        <small>۶ وعده</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-fire-line text-muted me-2"></i>
                                        <small>۳۲۰۰ کالری</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۱۴ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۳/۰۱/۱۰</div>
                                </div>
                                <button class="btn btn-sm btn-success">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- برنامه ۵ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary">ورزشی</span>
                                    <span class="badge bg-success ms-1">مبتدی</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">برنامه شروع بدنسازی</h5>
                            <p class="text-muted mb-3">برنامه ۱۲ هفته‌ای برای افراد کاملاً مبتدی</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۱۲ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-dumbbell-line text-muted me-2"></i>
                                        <small>۶ تمرین</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-timer-line text-muted me-2"></i>
                                        <small>۴۵ دقیقه</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۳۵ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۲/۱۲/۲۵</div>
                                </div>
                                <button class="btn btn-sm btn-primary">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- برنامه ۶ -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-success">غذایی</span>
                                    <span class="badge bg-info ms-1">ویژه بانوان</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </div>

                            <h5 class="card-title mb-2">رژیم تناسب اندام بانوان</h5>
                            <p class="text-muted mb-3">برنامه غذایی ویژه برای تناسب اندام و سلامت</p>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-calendar-line text-muted me-2"></i>
                                        <small>۴ هفته</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-restaurant-line text-muted me-2"></i>
                                        <small>۵ وعده</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-fire-line text-muted me-2"></i>
                                        <small>۲۰۰۰ کالری</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line text-muted me-2"></i>
                                        <small>۲۸ نفر</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">آخرین ویرایش:</small>
                                    <div class="small">۱۴۰۳/۰۱/۰۵</div>
                                </div>
                                <button class="btn btn-sm btn-success">
                                    <i class="ri-send-plane-line me-1"></i>
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- صفحه‌بندی -->
            <div class="row mt-4">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">قبلی</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">۱</a></li>
                            <li class="page-item"><a class="page-link" href="#">۲</a></li>
                            <li class="page-item"><a class="page-link" href="#">۳</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">بعدی</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- بدون اسکریپت اضافی --}}
@endsection
