@extends('layouts.master')
@section('head')
    {{--    link css--}}
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
                            لیست مشتریان
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مشتریان
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                لیست مشتریان
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <form class="app-search d-none d-md-block me-auto">
                                                <div class="position-relative">
                                                    <input autocomplete="off" class="form-control"
                                                           placeholder="Search Customer" type="search" value=""/>
                                                    <iconify-icon class="search-widget-icon"
                                                                  icon="solar:magnifer-broken">
                                                    </iconify-icon>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5 class="text-dark fw-medium mb-0">
                                                501
                                                <span class="text-muted">
			   مشتری
			  </span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-md-end mt-3 mt-md-0">
                                        <button class="btn btn-outline-primary me-1" type="button">
                                            <i class="ri-settings-2-line me-1">
                                            </i>
                                            تنظیمات بیشتر
                                        </button>
                                        <button class="btn btn-outline-primary me-1" type="button">
                                            <i class="ri-filter-line me-1">
                                            </i>
                                            فیلترها
                                        </button>
                                        <button class="btn btn-success me-1" type="button">
                                            <i class="ri-add-line">
                                            </i>
                                            مشتری جدید
                                        </button>
                                    </div>
                                </div>
                                <!-- end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                            <div>
                                <h4 class="card-title">
                                    لیست همه مشتریان
                                </h4>
                            </div>
                            <div class="dropdown">
                                <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                                   data-bs-toggle="dropdown" href="#">
                                    ماه اخیر
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        دانلود
                                    </a>
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        خروجی
                                    </a>
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        واردی
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
                                                <input class="form-check-input" id="customCheck1" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck1">
                                                </label>
                                            </div>
                                        </th>
                                        <th>
                                            نام و عکس مشتری
                                        </th>
                                        <th>
                                            ایمیل
                                        </th>
                                        <th>
                                            شماره تماس
                                        </th>
                                        <th>
                                            نوع ملک
                                        </th>
                                        <th>
                                            ملک مورد علاقه
                                        </th>
                                        <th>
                                            وضعیت
                                        </th>
                                        <th>
                                            آخرین تماس
                                        </th>
                                        <th>
                                            اقدام
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        باربد باباخانی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            barbod@teleworm.us
                                        </td>
                                        <td>
                                            ۰۹۰۱۰۰۱۰۰۱۱
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            ملاصدرا، کوچه۱۰، پلاک۲۳
                                        </td>
                                        <td>
                                            علاقمند
                                        </td>
                                        <td>
                                            15/03/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        شیرین رضایی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            shirinrezaei@dayrep.com
                                        </td>
                                        <td>
                                            09010010012
                                        </td>
                                        <td>
                                            تجاری
                                        </td>
                                        <td>
                                            سعادت آباد، کوچه۱۱، پلاک۲۳
                                        </td>
                                        <td>
                                            درحال بررسی
                                        </td>
                                        <td>
                                            20/03/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        ایلیا میرزایی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            jerepalmu@rhyta.com
                                        </td>
                                        <td>
                                            09010010013
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            چهارباغ بالا، کوچه۴، پلاک۱۲
                                        </td>
                                        <td>
                                            پیگیری
                                        </td>
                                        <td>
                                            25/03/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        نسترن سلطانی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            nastaran@rhyta.com
                                        </td>
                                        <td>
                                            09010010014
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            آذر، کوچه۱۰، پلاک۷
                                        </td>
                                        <td>
                                            علاقمند
                                        </td>
                                        <td>
                                            05/04/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        زهرا عطایی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            zahra@teleworm.us
                                        </td>
                                        <td>
                                            09010010015
                                        </td>
                                        <td>
                                            صنعتی
                                        </td>
                                        <td>
                                            سعادت آباد، کوچه۱۰، پلاک۱
                                        </td>
                                        <td>
                                            پیگیری
                                        </td>
                                        <td>
                                            12/04/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
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
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        امیرارسلان رهنما
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            arsalan@dayrep.com
                                        </td>
                                        <td>
                                            09010010016
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            ملاصدرا، کوچه۱۳، پلاک۱۱
                                        </td>
                                        <td>
                                            علاقمند
                                        </td>
                                        <td>
                                            15/04/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-8.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        رضا عطایی
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            reza@armyspy.com
                                        </td>
                                        <td>
                                            09010010017
                                        </td>
                                        <td>
                                            تجاری
                                        </td>
                                        <td>
                                            بیشه حبیب، کوچه۱، پلاک۴
                                        </td>
                                        <td>
                                            درحال بررسی
                                        </td>
                                        <td>
                                            18/04/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" id="customCheck2" type="checkbox"/>
                                                <label class="form-check-label" for="customCheck2">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <img alt="" class="avatar-sm rounded-circle"
                                                         src="assets/images/users/avatar-9.jpg"/>
                                                </div>
                                                <div>
                                                    <a class="text-dark fw-medium fs-15" href="#!">
                                                        مهسا رهنما
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            mahsa@dayrep.com
                                        </td>
                                        <td>
                                            09010010018
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            آتشگاه، کوچه۸، پلاک۲
                                        </td>
                                        <td>
                                            علاقمند
                                        </td>
                                        <td>
                                            20/04/۱۴۰۳
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-light btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:eye-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-primary btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18" icon="solar:pen-2-broken">
                                                    </iconify-icon>
                                                </a>
                                                <a class="btn btn-soft-danger btn-sm" href="#!">
                                                    <iconify-icon class="align-middle fs-18"
                                                                  icon="solar:trash-bin-minimalistic-2-broken">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
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
        <!-- End Page Content -->
        @endsection

        @section('scripts')
            <script src="{{asset('assets/js/pages/customer-detail.js')}}">
            </script>
@endsection
