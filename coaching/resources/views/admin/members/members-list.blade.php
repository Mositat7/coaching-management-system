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

            {{-- Filters & Actions --}}
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row justify-content-between">
                                <div class="col-lg-8">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <form class="app-search d-none d-md-block me-auto">
                                                <div class="position-relative">
                                                    <input autocomplete="off" class="form-control"
                                                           placeholder="جستجوی نام، موبایل یا کد عضویت"
                                                           type="search" value=""/>
                                                    <iconify-icon class="search-widget-icon"
                                                                  icon="solar:magnifer-broken">
                                                    </iconify-icon>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select">
                                                <option value="">وضعیت اشتراک</option>
                                                <option value="active">فعال</option>
                                                <option value="expired">منقضی</option>
                                                <option value="suspended">معلق</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select">
                                                <option value="">نوع اشتراک</option>
                                                <option value="monthly">ماهیانه</option>
                                                <option value="3month">سه ماهه</option>
                                                <option value="yearly">سالانه</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="form-select">
                                                <option value="">مربی</option>
                                                <option value="1">مربی احمدی</option>
                                                <option value="2">مربی رضایی</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-md-end mt-3 mt-md-0">
                                        <button class="btn btn-outline-primary me-1" type="button">
                                            <i class="ri-download-line me-1">
                                            </i>
                                            خروجی
                                        </button>
                                        <button class="btn btn-outline-primary me-1" type="button">
                                            <i class="ri-printer-line me-1">
                                            </i>
                                            چاپ
                                        </button>
                                        <a href="{{ route('members.add') }}" class="btn btn-success me-1" type="button">
                                            <i class="ri-add-line">
                                            </i>
                                            عضو جدید
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
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
                                    <span class="text-muted fw-medium">اشتراک‌های فعال</span>
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
                                    <span class="text-muted fw-medium">منقضی در ۷ روز</span>
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
                                    <span class="text-muted fw-medium">حضور امروز</span>
                                    <h4 class="mb-0">۱۵ نفر</h4>
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

            {{-- Members Table --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                            <div>
                                <h4 class="card-title">
                                    لیست همه اعضا
                                </h4>
                            </div>
                            <div class="dropdown">
                                <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                                   data-bs-toggle="dropdown" href="#">
                                    <i class="ri-filter-line me-1"></i>
                                    فیلتر
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-sort-asc me-2"></i> قدیمی‌ترین
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-sort-desc me-2"></i> جدیدترین
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-calendar-close-line me-2"></i> نزدیک به انقضا
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        <i class="ri-money-dollar-circle-line me-2"></i> پرداخت نشده
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheckAll" type="checkbox"/>
                                                <label class="form-check-label" for="customCheckAll">
                                                </label>
                                            </div>
                                        </th>
                                        <th>
                                            عضو
                                        </th>
                                        <th>
                                            موبایل
                                        </th>
                                        <th>
                                            مربی
                                        </th>
                                        <th>
                                            اشتراک
                                        </th>
                                        <th>
                                            وضعیت
                                        </th>
                                        <th>
                                            انقضا
                                        </th>
                                        <th>
                                            حضور
                                        </th>
                                        <th>
                                            اقدامات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- Member 1 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck1" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck1">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-2.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        باربد باباخانی
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1001
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۱
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-primary">مربی احمدی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">VIP</span>
                                                <p class="text-muted mb-0 fs-12">۳ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                                فعال
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۴/۱۵</span>
                                                <p class="text-muted mb-0 fs-12">۱۵ روز دیگر</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۲۴</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}"
                                                   data-bs-toggle="tooltip" title="مشاهده جزئیات">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#"
                                                   data-bs-toggle="tooltip" title="ویرایش">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-success btn-sm" href="#"
                                                   data-bs-toggle="tooltip" title="ثبت پرداخت">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:wallet-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-info btn-sm" href="#"
                                                   data-bs-toggle="tooltip" title="ارسال پیام">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:chat-line-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Member 2 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck2">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-3.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        شیرین رضایی
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1002
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۲
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success">مربی رضایی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">ماهیانه</span>
                                                <p class="text-muted mb-0 fs-12">۱ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                                فعال
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۳/۰۵</span>
                                                <p class="text-danger mb-0 fs-12">۵ روز دیگر</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۸</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-warning btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:bell-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-info btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:chat-line-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Member 3 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck3" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck3">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-4.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        ایلیا میرزایی
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1003
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۳
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-primary">مربی احمدی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">سه ماهه</span>
                                                <p class="text-muted mb-0 fs-12">۳ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">
                                                <i class="ri-alarm-warning-line align-middle me-1"></i>
                                                نزدیک انقضا
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۲/۲۸</span>
                                                <p class="text-danger mb-0 fs-12">۲ روز دیگر</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۳۲</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-success btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:wallet-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:bell-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Member 4 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck4" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck4">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-5.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        نسترن سلطانی
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1004
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۴
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success">مربی رضایی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">ماهیانه</span>
                                                <p class="text-muted mb-0 fs-12">۱ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">
                                                <i class="ri-close-circle-line align-middle me-1"></i>
                                                منقضی
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۲/۲۵</span>
                                                <p class="text-danger mb-0 fs-12">۳ روز قبل</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۲</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-success btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:wallet-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-info btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:chat-line-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Member 5 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck5" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck5">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-6.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        زهرا عطایی
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1005
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۵
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-primary">مربی احمدی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">VIP</span>
                                                <p class="text-muted mb-0 fs-12">۶ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <i class="ri-checkbox-circle-line align-middle me-1"></i>
                                                فعال
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۶/۱۵</span>
                                                <p class="text-muted mb-0 fs-12">۴۵ روز دیگر</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۲۸</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-info btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:chat-line-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Member 6 --}}
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="memberCheck6" type="checkbox"/>
                                                <label class="form-check-label" for="memberCheck6">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-7.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="{{ route('members.details') }}">
                                                        امیرارسلان رهنما
                                                    </a>
                                                    <p class="text-muted mb-0 fs-12">
                                                        MB-1006
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۶
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success">مربی رضایی</span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">ماهیانه</span>
                                                <p class="text-muted mb-0 fs-12">۱ ماهه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                <i class="ri-pause-circle-line align-middle me-1"></i>
                                                معلق
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۱۴۰۳/۰۴/۱۰</span>
                                                <p class="text-warning mb-0 fs-12">۱۰ روز دیگر</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fw-medium">۸</span>
                                                <p class="text-muted mb-0 fs-12">جلسه</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-light btn-sm" href="{{ route('members.details') }}">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-warning btn-sm" href="#">
                                                    <iconify-icon class="align-middle fs-16" icon="solar:play-circle-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="text-muted">
                                        نمایش ۱ تا ۶ از ۴۸ عضو
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <nav aria-label="Page navigation example" class="float-lg-end">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">
                                                    قبلی
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:void(0);">
                                                    1
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">
                                                    2
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">
                                                    3
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">
                                                    بعدی
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bulk Actions --}}
            <div class="row mt-3 d-none" id="bulkActions">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted" id="selectedCount">0 عضو انتخاب شده</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="ri-mail-line me-1"></i> ارسال پیام گروهی
                                    </button>
                                    <button class="btn btn-outline-success btn-sm">
                                        <i class="ri-notification-2-line me-1"></i> ارسال اعلان
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-sm" id="clearSelection">
                                        <i class="ri-close-line me-1"></i> لغو انتخاب
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
        // Bulk selection functionality
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('customCheckAll');
            const memberCheckboxes = document.querySelectorAll('input[id^="memberCheck"]');
            const bulkActionsDiv = document.getElementById('bulkActions');
            const selectedCountSpan = document.getElementById('selectedCount');
            const clearSelectionBtn = document.getElementById('clearSelection');

            // Select all functionality
            selectAllCheckbox.addEventListener('change', function() {
                memberCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActions();
            });

            // Individual checkbox change
            memberCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActions);
            });

            // Clear selection
            clearSelectionBtn.addEventListener('click', function() {
                memberCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                selectAllCheckbox.checked = false;
                updateBulkActions();
            });

            function updateBulkActions() {
                const selectedCount = Array.from(memberCheckboxes).filter(cb => cb.checked).length;

                if (selectedCount > 0) {
                    bulkActionsDiv.classList.remove('d-none');
                    selectedCountSpan.textContent = selectedCount + ' عضو انتخاب شده';
                } else {
                    bulkActionsDiv.classList.add('d-none');
                }
            }

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <style>
        .card-height-100 {
            height: 100%;
        }
        .bg-soft-primary {
            background-color: rgba(85, 110, 230, 0.15);
            color: #556ee6;
        }
        .bg-soft-success {
            background-color: rgba(45, 206, 137, 0.15);
            color: #2dce89;
        }
        .table > :not(caption) > * > * {
            vertical-align: middle;
        }
    </style>
@endsection
