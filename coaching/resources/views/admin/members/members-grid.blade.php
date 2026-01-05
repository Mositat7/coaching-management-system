@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            لیست اعضا
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مدیریت باشگاه
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                لیست اعضا
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Filters & Search --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">جستجو</label>
                                    <input type="text" class="form-control" placeholder="نام، موبایل یا کد عضویت">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">وضعیت اشتراک</label>
                                    <select class="form-select">
                                        <option value="">همه</option>
                                        <option value="active">فعال</option>
                                        <option value="expired">منقضی</option>
                                        <option value="suspended">معلق</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">نوع اشتراک</label>
                                    <select class="form-select">
                                        <option value="">همه</option>
                                        <option value="monthly">ماهیانه</option>
                                        <option value="3month">سه ماهه</option>
                                        <option value="yearly">سالانه</option>
                                        <option value="vip">VIP</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">مربی</label>
                                    <select class="form-select">
                                        <option value="">همه مربیان</option>
                                        <option value="1">مربی احمدی</option>
                                        <option value="2">مربی رضایی</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">مرتب‌سازی</label>
                                    <select class="form-select">
                                        <option value="newest">جدیدترین</option>
                                        <option value="oldest">قدیمی‌ترین</option>
                                        <option value="expiry">نزدیک به انقضا</option>
                                    </select>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button class="btn btn-primary w-100">
                                        <i class="ri-search-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">کل اعضا</span>
                                    <h4 class="mb-0">۴۸ نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-primary rounded fs-24">
                                            <i class="ri-team-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">اعضای فعال</span>
                                    <h4 class="mb-0">۴۲ نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-success rounded fs-24">
                                            <i class="ri-checkbox-circle-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">اعضای منقضی</span>
                                    <h4 class="mb-0">۶ نفر</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-danger rounded fs-24">
                                            <i class="ri-alarm-warning-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted fw-medium">میانگین حضور</span>
                                    <h4 class="mb-0">۱۸ روز</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info rounded fs-24">
                                            <i class="ri-calendar-check-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Members Grid --}}
            <div class="row">
                {{-- Member Card 1 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        باربد باباخانی
                                    </a>
                                    <div>
                                        <span class="badge bg-success fs-12 px-2 py-1">
                                            <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                            فعال
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۱</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی احمدی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۲۴</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">VIP</h5>
                                        <small class="text-muted">۳ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">انقضا</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۱۵</h5>
                                        <small class="text-muted">روز دیگر</small>
                                    </div>
                                </div>

                                {{-- Quick Info --}}
                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۷۵ cm / ۷۵ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">افزایش حجم</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                <i class="ri-chat-1-line align-middle me-1"></i> پیام
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Member Card 2 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        شیرین رضایی
                                    </a>
                                    <div>
                                        <span class="badge bg-success fs-12 px-2 py-1">
                                            <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                            فعال
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۲</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی رضایی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۱۸</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">ماهیانه</h5>
                                        <small class="text-muted">۱ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">انقضا</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۵</h5>
                                        <small class="text-muted">روز دیگر</small>
                                    </div>
                                </div>

                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۶۵ cm / ۶۰ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">کاهش وزن</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                <i class="ri-chat-1-line align-middle me-1"></i> پیام
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Member Card 3 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        ایلیا میرزایی
                                    </a>
                                    <div>
                                        <span class="badge bg-warning fs-12 px-2 py-1">
                                            <i class="ri-alarm-warning-line align-middle me-1"></i>
                                            نزدیک انقضا
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۳</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی احمدی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۳۲</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">سه ماهه</h5>
                                        <small class="text-muted">۳ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">انقضا</p>
                                        <h5 class="mb-0 fw-semibold text-danger">۲</h5>
                                        <small class="text-danger">روز دیگر</small>
                                    </div>
                                </div>

                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۸۰ cm / ۸۵ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">فیتنس</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                <i class="ri-chat-1-line align-middle me-1"></i> پیام
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Member Card 4 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        نسترن سلطانی
                                    </a>
                                    <div>
                                        <span class="badge bg-danger fs-12 px-2 py-1">
                                            <i class="ri-close-circle-line align-middle me-1"></i>
                                            منقضی
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۴</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی رضایی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۱۲</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">ماهیانه</h5>
                                        <small class="text-muted">۱ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">منقضی شده</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۳</h5>
                                        <small class="text-danger">روز قبل</small>
                                    </div>
                                </div>

                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۶۰ cm / ۵۵ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">کاهش وزن</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-success w-100" href="#!">
                                <i class="ri-wallet-line align-middle me-1"></i> تمدید
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Member Card 5 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        زهرا عطایی
                                    </a>
                                    <div>
                                        <span class="badge bg-success fs-12 px-2 py-1">
                                            <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                            فعال
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۵</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی احمدی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۲۸</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">VIP</h5>
                                        <small class="text-muted">۶ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">انقضا</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۴۵</h5>
                                        <small class="text-muted">روز دیگر</small>
                                    </div>
                                </div>

                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۷۰ cm / ۶۵ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">تناسب اندام</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                <i class="ri-chat-1-line align-middle me-1"></i> پیام
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Member Card 6 --}}
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="member-bg rounded position-relative"
                                 style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); height: 80px;">
                                <span class="position-absolute top-0 end-0 p-1">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="mt-4 pt-2 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="{{ route('members.details') }}">
                                        امیرارسلان رهنما
                                    </a>
                                    <div>
                                        <span class="badge bg-secondary fs-12 px-2 py-1">
                                            <i class="ri-pause-circle-line align-middle me-1"></i>
                                            تعلیق
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="ri-smartphone-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">۰۹۰۱۰۰۱۰۰۱۶</span>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-user-follow-line text-muted me-2 fs-16"></i>
                                    <span class="text-muted fw-medium fs-14">مربی رضایی</span>
                                </div>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">حضور</p>
                                        <h5 class="mb-0 fw-semibold text-dark">۸</h5>
                                        <small class="text-muted">جلسه</small>
                                    </div>
                                    <div class="col-4 text-center border-start border-end">
                                        <p class="fw-medium mb-2 fs-12">اشتراک</p>
                                        <h5 class="mb-0 fw-semibold text-dark">ماهیانه</h5>
                                        <small class="text-muted">۱ ماهه</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="fw-medium mb-2 fs-12">تعلیق تا</p>
                                        <h5 class="mb-0 fw-semibold text-warning">۱۰</h5>
                                        <small class="text-warning">روز دیگر</small>
                                    </div>
                                </div>

                                <div class="mt-3 pt-3 border-top">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted fs-12">قد / وزن</span>
                                        <span class="fw-medium fs-13">۱۸۵ cm / ۹۰ kg</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-12">هدف</span>
                                        <span class="fw-medium fs-13">قدرت بدنی</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="{{ route('members.details') }}">
                                <i class="ri-eye-line align-middle me-1"></i> مشاهده
                            </a>
                            <a class="btn btn-warning w-100" href="#!">
                                <i class="ri-play-circle-line align-middle me-1"></i> فعال‌سازی
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            نمایش ۱ تا ۶ از ۴۸ عضو
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبلی</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">۱</a></li>
                                <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                <li class="page-item"><a class="page-link" href="#">۳</a></li>
                                <li class="page-item"><a class="page-link" href="#">۴</a></li>
                                <li class="page-item"><a class="page-link" href="#">۵</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">بعدی</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">دسترسی‌های سریع</h6>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('members.add') }}" class="btn btn-primary">
                                        <i class="ri-user-add-line align-middle me-1"></i> عضو جدید
                                    </a>
                                    <button class="btn btn-success">
                                        <i class="ri-file-excel-line align-middle me-1"></i> خروجی Excel
                                    </button>
                                    <button class="btn btn-info">
                                        <i class="ri-printer-line align-middle me-1"></i> چاپ لیست
                                    </button>
                                </div>
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
        // Simple search functionality
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.querySelector('input[placeholder*="جستجو"]');
            const memberCards = document.querySelectorAll('.col-md-6.col-xl-4');

            searchInput.addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();

                memberCards.forEach(card => {
                    const memberName = card.querySelector('.fs-18').textContent.toLowerCase();
                    const memberPhone = card.querySelector('.text-muted.fw-medium.fs-14').textContent;

                    if (memberName.includes(searchTerm) || memberPhone.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <style>
        .card-height-100 {
            height: 100%;
        }

        .member-bg {
            border-radius: 0.375rem 0.375rem 0 0;
        }

        .border-dashed {
            border-style: dashed !important;
        }

        .avatar-xxl {
            width: 110px;
            height: 110px;
        }
    </style>
@endsection
