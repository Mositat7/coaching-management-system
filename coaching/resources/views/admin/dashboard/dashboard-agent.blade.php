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
                        نمایندگان
                    </h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                داشبوردها
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            نمایندگان
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ========== Page Title End ========== -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-2 fs-15 fw-medium">
                                    درآمد ماه
                                </p>
                                <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                    3548.09
                                </h3>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon class="fs-32 text-primary avatar-title" icon="solar:calendar-date-broken">
                                    </iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-2 fs-15 fw-medium d-flex align-items-center gap-2">
                                    کسب رشد
                                    <span class="badge text-success bg-success-subtle fs-11">
			 <i class="ri-arrow-up-line">
			 </i>
			 44%
			</span>
                                </p>
                                <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                    67435.00
                                </h3>
                            </div>
                            <div>
                                <div class="avatar-md bg-success bg-opacity-10 rounded">
                                    <iconify-icon class="fs-32 text-success avatar-title" icon="solar:graph-new-broken">
                                    </iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-2 fs-15 fw-medium">
                                    نرخ مکالمه
                                </p>
                                <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                    78.8%
                                </h3>
                            </div>
                            <div>
                                <div class="avatar-md bg-warning bg-opacity-10 rounded">
                                    <iconify-icon class="fs-32 text-warning avatar-title" icon="solar:user-plus-broken">
                                    </iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-2 fs-15 fw-medium">
                                    حاشیه سود ناخالص
                                </p>
                                <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                    34.00%
                                </h3>
                            </div>
                            <div>
                                <div class="avatar-md bg-info bg-opacity-10 rounded">
                                    <iconify-icon class="fs-32 text-info avatar-title" icon="solar:chart-2-broken">
                                    </iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0">
                                <h4 class="card-title">
                                    قیف فروش
                                </h4>
                                <div class="dropdown">
                                    <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
                                        ماه اخیر
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            امروز
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            ماه
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            سال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mx-n3">
                                    <div class="apex-charts mb-3" data-colors="#604ae3" id="sales_funnel">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-0 border-top">
                                <div class="bg-light-subtle p-1 rounded">
                                    <div class="row text-center">
                                        <div class="col-lg-3 col-3 border-end">
                                            <p class="mb-1 text-muted">
                                                مشاهده کننده
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                123.7k
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-3 border-end">
                                            <p class="mb-1 text-muted">
                                                مشاهده
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                167.1k
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-3 border-end">
                                            <p class="mb-1 text-muted">
                                                ثمره
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                89.7k
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-3">
                                            <p class="mb-1 text-muted">
                                                بازار
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                34.8k
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0">
                                <h4 class="card-title">
                                    کل درآمد
                                </h4>
                                <div class="dropdown">
                                    <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
                                        ماه اخیر
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            امروز
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            ماه
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            سال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="d-flex align-items-center gap-2 text-dark fw-semibold">
                                            15,563.786
                                            <span class="badge text-success bg-success-subtle px-2 py-1 fs-12">
			   <i class="ri-arrow-up-line">
			   </i>
			   4.53%
			  </span>
                                        </h3>
                                        <p class="mb-0 text-muted">
                                            به دست آمده در  ماه اخیر
                                            <span class="text-success">
			   978.56
			  </span>
                                        </p>
                                    </div>
                                    <div class="avatar-md bg-light bg-opacity-50 rounded">
                                        <iconify-icon class="fs-32 text-primary avatar-title" icon="solar:bag-2-broken">
                                        </iconify-icon>
                                    </div>
                                </div>
                                <div class="p-3 rounded bg-light-subtle border border-light mt-4">
                                    <h5>
                                        منابع درآمد
                                    </h5>
                                    <div class="row my-3 g-lg-0 g-2">
                                        <div class="col-lg-3 col-4">
                                            <p class="mb-1 text-muted">
                                                <i class="ri-circle-fill fs-6 text-primary">
                                                </i>
                                                اجاره
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                12,223.78
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <p class="mb-1 text-muted">
                                                <i class="ri-circle-fill fs-6 text-warning">
                                                </i>
                                                فروش
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                56,131
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <p class="mb-1 text-muted">
                                                <i class="ri-circle-fill fs-6 text-success">
                                                </i>
                                                معامله کارگزار
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                1,340.15
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <p class="mb-1 text-muted">
                                                <i class="ri-circle-fill fs-6 text-info">
                                                </i>
                                                بازار
                                            </p>
                                            <p class="fs-16 text-dark fw-medium mb-1">
                                                600.46
                                            </p>
                                        </div>
                                    </div>
                                    <div class="progress progress-lg rounded-0 gap-1 overflow-visible bg-light-subtle" style="height: 10px">
                                        <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 40%">
                                        </div>
                                        <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 30%">
                                        </div>
                                        <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: 20%">
                                        </div>
                                        <div class="progress-bar bg-info rounded-pill" role="progressbar" style="width: 20%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0">
                                <div>
                                    <h4 class="card-title mb-1">
                                        وضعیت نماینده اخیر
                                    </h4>
                                    <p class="text-muted mb-0">
                                        بیشتر از 50K
                                    </p>
                                </div>
                                <div class="dropdown">
                                    <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
                                        ماه اخیر
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            امروز
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            ماه
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            سال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center g-2">
                                    <div class="col-lg-12">
                                        <div class="row g-2 text-center">
                                            <div class="col-lg-4">
                                                <div class="border bg-light-subtle p-2 rounded">
                                                    <p class="text-muted mb-1">
                                                        امروز
                                                    </p>
                                                    <h5 class="text-dark mb-1">
                                                        8,839
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="border bg-light-subtle p-2 rounded">
                                                    <p class="text-muted mb-1">
                                                        ماه اخیر
                                                    </p>
                                                    <h5 class="text-dark mb-1">
                                                        52,356
                                                        <span class="text-success font-size-13">
				  0.2 %
				  <i class="mdi mdi-arrow-up ms-1">
				  </i>
				 </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="border bg-light-subtle p-2 rounded">
                                                    <p class="text-muted mb-1">
                                                        سال جاری
                                                    </p>
                                                    <h5 class="text-dark mb-1">
                                                        78
                                                        <span class="text-success font-size-13">
				  0.1 %
				  <i class="mdi mdi-arrow-up ms-1">
				  </i>
				 </span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="apex-charts mt-5" id="markers">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0">
                                <h4 class="card-title">
                                    مجموعه اجاره
                                </h4>
                                <div class="dropdown">
                                    <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
                                        ماه اخیر
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            امروز
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            ماه
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            سال
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="text-muted fs-14 mb-2">
                                            کل
                                        </p>
                                        <h3 class="text-dark fw-bold mb-1">
                                            500.50k
                                        </h3>
                                    </div>
                                    <div class="avatar-md bg-light bg-opacity-50 rounded">
                                        <iconify-icon class="fs-32 text-primary avatar-title" icon="solar:hand-money-broken">
                                        </iconify-icon>
                                    </div>
                                </div>
                                <div class="progress mt-3" style="height: 15px;">
                                    <div aria-valuemax="70" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <p class="mb-2 text-success fs-15 fw-medium">
                                            به دست آمده
                                        </p>
                                        <h4 class="text-dark fw-bold mb-0">
                                            250.50k
                                        </h4>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-2 fs-15 fw-medium">
                                            در انتظار
                                        </p>
                                        <h4 class="text-dark fw-bold mb-0">
                                            250.00k
                                        </h4>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center bg-light-subtle border justify-content-between p-3 rounded mt-4">
                                    <div>
                                        <h5 class="fw-medium mb-1 text-dark fs-16">
                                            مستاجرانی که صورتحسابشان معوق است
                                        </h5>
                                        <div class="avatar-group mt-3">
                                            <div class="avatar d-flex align-items-center justify-content-center">
                                                <img alt="" class="rounded-circle avatar border border-light border-3" src="assets/images/users/avatar-4.jpg"/>
                                            </div>
                                            <div class="avatar d-flex align-items-center justify-content-center">
                                                <img alt="" class="rounded-circle avatar border border-light border-3" src="assets/images/users/avatar-5.jpg"/>
                                            </div>
                                            <div class="avatar d-flex align-items-center justify-content-center">
                                                <img alt="" class="rounded-circle avatar border border-light border-3" src="assets/images/users/avatar-3.jpg"/>
                                            </div>
                                            <div class="avatar d-flex align-items-center justify-content-center">
                                                <img alt="" class="rounded-circle avatar border border-light border-3" src="assets/images/users/avatar-6.jpg"/>
                                            </div>
                                            <div class="avatar d-flex align-items-center justify-content-center">
                                                <img alt="" class="rounded-circle avatar border border-light border-3" src="assets/images/users/avatar-7.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-primary" href="#!">
                                            ارسال یادآوری
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center border-0">
                                <h4 class="card-title">
                                    جلسات بر اساس کشور
                                </h4>
                                <div class="dropdown">
                                    <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
                                        آسیا
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            ایالات متحده
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            روسیه
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            چین
                                        </a>
                                        <!-- item-->
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            کانادا
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between mt-1">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-md bg-light bg-opacity-50 rounded">
                                                <iconify-icon class="fs-32 text-primary avatar-title" icon="solar:user-rounded-broken">
                                                </iconify-icon>
                                            </div>
                                            <div>
                                                <p class="mb-0 fs-20 text-dark fw-medium">
                                                    145.678
                                                </p>
                                                <small>
                                                    (کل بازدیدکنندگان)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="mt-4" id="world-map-markers" style="height: 235px">
                                        </div>
                                    </div>
                                    <div class="col-lg-5" dir="ltr">
                                        <div class="p-3 bg-light-subtle rounded border border-light">
                                            <!-- Country Data -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    <iconify-icon class="fs-16 align-middle me-1" icon="circle-flags:us">
                                                    </iconify-icon>
                                                    <span class="align-middle">
				 ایالات متحده
				</span>
                                                </p>
                                                <p class="mb-0 fs-13 fw-semibold">
                                                    659k
                                                </p>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col">
                                                    <div class="progress progress-soft progress-sm">
                                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="" class="progress-bar bg-secondary" role="progressbar" style="width: 82.05%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="mb-0 fs-12 text-muted fw-medium">
                                                        82.05%
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Country Data -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    <iconify-icon class="fs-16 align-middle me-1" icon="circle-flags:ru">
                                                    </iconify-icon>
                                                    <span class="align-middle">
				 روسیه
				</span>
                                                </p>
                                                <p class="mb-0 fs-13 fw-semibold">
                                                    485k
                                                </p>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col">
                                                    <div class="progress progress-soft progress-sm">
                                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="" class="progress-bar bg-info" role="progressbar" style="width: 70.5%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="mb-0 fs-12 text-muted fw-medium">
                                                        70.5%
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Country Data -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    <iconify-icon class="fs-16 align-middle me-1" icon="circle-flags:cn">
                                                    </iconify-icon>
                                                    <span class="align-middle">
				 چین
				</span>
                                                </p>
                                                <p class="mb-0 fs-13 fw-semibold">
                                                    355k
                                                </p>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col">
                                                    <div class="progress progress-soft progress-sm">
                                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="" class="progress-bar bg-warning" role="progressbar" style="width: 65.8%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="mb-0 fs-12 text-muted fw-medium">
                                                        65.8%
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Country Data -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    <iconify-icon class="fs-16 align-middle me-1" icon="circle-flags:ca">
                                                    </iconify-icon>
                                                    <span class="align-middle">
				 کانادا
				</span>
                                                </p>
                                                <p class="mb-0 fs-13 fw-semibold">
                                                    204k
                                                </p>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="progress progress-soft progress-sm">
                                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="" class="progress-bar bg-success" role="progressbar" style="width: 55.8%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="mb-0 fs-12 text-muted fw-medium">
                                                        55.8%
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-2 pt-1 text-center">
                                                <a class="link-primary" href="#!">
                                                    موارد دیگر را اضافه کنید
                                                    <i class="ri-add-line">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            نمایندگان برتر
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="bg-primary position-relative rounded p-2 overflow-hidden z-1 text-center">
                            <img alt="" class="img-fluid rounded" src="assets/images/agent-1.png"/>
                            <div class="d-flex align-items-center justify-content-between bg-light bg-opacity-25 p-2 mt-2 rounded text-start">
                                <div>
                                    <a class="text-white fw-medium fs-16" href="#!">
                                        تیم iarsalan
                                    </a>
                                    <p class="mb-0 text-white-50">
                                        ایران، اصفهان
                                    </p>
                                    <div class="d-flex flex-wrap gap-2 align-items-center mt-1">
                                        <ul class="d-flex text-warning m-0 fs-18 list-unstyled">
                                            <li>
                                                <i class="ri-star-fill">
                                                </i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill">
                                                </i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill">
                                                </i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill">
                                                </i>
                                            </li>
                                            <li>
                                                <i class="ri-star-half-line">
                                                </i>
                                            </li>
                                        </ul>
                                        <p class="mb-0 text-white">
                                            4.5 / 5 نمره
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#!">
                                        <div class="avatar-sm flex-shrink-0">
			  <span class="avatar-title bg-primary text-white fs-4 rounded-circle">
			   <i class="ri-arrow-left-fill">
			   </i>
			  </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <h4 class="card-title">
                            اهداف
                        </h4>
                        <div>
                            <a class="link-dark fs-20" href="#!">
                                <i class="ri-settings-4-line">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="apex-charts mb-4" id="agent_goals">
                        </div>
                        <h5>
                            آمار درآمد
                        </h5>
                        <div class="row align-items-center justify-content-center mt-3">
                            <div class="col-lg-6 col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar bg-light bg-opacity-50 rounded">
                                        <iconify-icon class="fs-28 text-primary avatar-title" icon="solar:wallet-money-broken">
                                        </iconify-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-16 text-dark fw-semibold">
                                            12,167
                                        </p>
                                        <small>
                                            از مرداد
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <div class="avatar bg-light bg-opacity-50 rounded">
                                        <iconify-icon class="fs-28 text-primary avatar-title" icon="solar:wallet-money-broken">
                                        </iconify-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-16 text-dark fw-semibold">
                                            14,900
                                        </p>
                                        <small>
                                            از فروردین
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-0">
                        <div>
                            <h4 class="card-title mb-1">
                                نمایندگان اضافه شده
                            </h4>
                            <p class="mb-0 fs-13">
                                ۱۹۰ نماینده اضافه شده
                            </p>
                        </div>
                        <div class="dropdown">
                            <a aria-expanded="false" class="dropdown-toggle rounded arrow-none" data-bs-toggle="dropdown" href="#">
                                <i class="ri-edit-box-line fs-20 text-dark">
                                </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="javascript:void(0);">
                                    نماینده جدید
                                </a>
                                <!-- item-->
                                <a class="dropdown-item" href="javascript:void(0);">
                                    نماینده قدیمی
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom gap-2 pb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar">
                                    <img alt="avatar-3" class="img-fluid rounded-circle" src="assets/images/users/avatar-1.jpg"/>
                                </div>
                                <div class="d-block">
			<span class="text-dark">
			 <a class="text-dark fw-medium fs-15" href="#!">
			  امیرارسلان رهنما
			 </a>
			</span>
                                    <p class="mb-0 fs-13 text-muted">
                                        arsalan@jourrapide.com
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted fw-medium mb-0">
                                    اردیبشهت ۱۴۰۴
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom gap-2 py-3">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="avatar">
                                    <img alt="avatar-3" class="img-fluid rounded-circle" src="assets/images/users/avatar-2.jpg"/>
                                </div>
                                <div class="d-block">
			<span class="text-dark">
			 <a class="text-dark fw-medium fs-15" href="#!">
			  باربد باباخانی
			 </a>
			</span>
                                    <p class="mb-0 fs-13 text-muted">
                                        barbod@armyspy.com
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted fw-medium mb-0">
                                    اردیبشهت ۱۴۰۴
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom gap-2 py-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar">
                                    <img alt="avatar-3" class="img-fluid rounded-circle" src="assets/images/users/avatar-3.jpg"/>
                                </div>
                                <div class="d-block">
			<span class="text-dark">
			 <a class="text-dark fw-medium fs-15" href="#!">
			  شیرین رضایی
			 </a>
			</span>
                                    <p class="mb-0 fs-13 text-muted">
                                        shirinrezaei@dayrep.com
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted fw-medium mb-0">
                                    اردیبشهت ۱۴۰۴
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar">
                                    <img alt="avatar-3" class="img-fluid rounded-circle" src="assets/images/users/avatar-5.jpg"/>
                                </div>
                                <div class="d-block">
			<span class="text-dark">
			 <a class="text-dark fw-medium fs-15" href="#!">
			  نسترن سلطانی
			 </a>
			</span>
                                    <p class="mb-0 fs-13 text-muted">
                                        nastaran@armyspy.com
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted fw-medium mb-0">
                                    اردیبشهت ۱۴۰۴
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <a class="btn btn-primary w-100" href="#!">
                            مشاهده همه
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================================================== -->
<!-- End Page Content -->
<!-- ==================================================== -->
@endsection

{{--@section('scripts')--}}
{{--@endsection--}}
