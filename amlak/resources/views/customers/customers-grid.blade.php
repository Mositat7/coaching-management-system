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
                            گرید مشتریان
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مشتریان
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                گرید مشتریان
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-2.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        باربد باباخانی
                                    </a>
                                    <div>
			<span class="badge bg-success text-white fs-12 px-2 py-1">
			 در دسترس
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    barbod@teleworm.us
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    ۰۹۰۱۰۰۱۰۰۱۱
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    ملاصدرا، کوچه۸، پلاک۲۲
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            231
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            27
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            928,128
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-3.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        شیرین رضایی
                                    </a>
                                    <div>
			<span class="badge bg-success text-white fs-12 px-2 py-1">
			 در دسترس
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    shirin@dayrep.com
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    09010010012
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    آتشگاه، کوچه۸، پلاک۲
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            134
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            13
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            435,892
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-4.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        ایلیا میرزایی
                                    </a>
                                    <div>
			<span class="badge bg-success text-white fs-12 px-2 py-1">
			 در دسترس
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    ilia@rhyta.com
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    09010010013
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    شاهد، کوچه۵، پلاک۱۰
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            301
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            15
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            743,120
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-5.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        نسترن سلطانی
                                    </a>
                                    <div>
			<span class="badge bg-danger text-white fs-12 px-2 py-1">
			 در دسترس نیست
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    nastaran@rhyta.com
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    09010010014
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    ملاصدرا، کوچه۱۳، پلاک ۱۱
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            109
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            7
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            635,812
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-6.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        زهرا عطایی
                                    </a>
                                    <div>
			<span class="badge bg-success text-white fs-12 px-2 py-1">
			 در دسترس
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    zahra@teleworm.us
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    09010010015
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    سعادت آباد، کوچه۳، پلاک۱۱
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            142
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            18
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            733,291
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-7.jpg"/>
                                <span class="position-absolute top-0 end-0 p-1">
		   <button
               class="btn btn-dark avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
               type="button">
			<iconify-icon icon="solar:pen-new-square-broken">
			</iconify-icon>
		   </button>
		  </span>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a class="fs-18 link-primary fw-semibold" href="customers-details.html">
                                        امیرارسلان رهنما
                                    </a>
                                    <div>
			<span class="badge bg-danger text-white fs-12 px-2 py-1">
			 در دسترس نیست
			</span>
                                    </div>
                                </div>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس ایمیل :
		   </span>
                                    arsalan@dayrep.com
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			شماره تماس :
		   </span>
                                    09010010016
                                </p>
                                <p class="text-muted fw-medium fs-14 mb-1">
		   <span class="text-dark me-1">
			آدرس :
		   </span>
                                    ملاصدرا، کوچه۱۳، پلاک۱۱
                                </p>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            109
                                        </h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            10
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری روی املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            831,760
                                        </h5>
                                    </div>
                                </div>
                                <h4 class="mt-3 fs-17">
                                    صفحات مجازی :
                                </h4>
                                <ul class="list-inline d-flex gap-1 mb-0 align-items-center mt-3">
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-facebook-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-danger avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-instagram-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-info avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-twitter-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-success avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-whatsapp-fill">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-soft-warning avatar-sm d-flex align-items-center justify-content-center fs-20"
                                           href="javascript: void(0);">
                                            <i class="ri-mail-fill">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top border-dashed gap-1 hstack">
                            <a class="btn btn-primary w-100" href="#!">
                                چت
                            </a>
                            <a class="btn btn-light w-100" href="#!">
                                تماس با مشتری
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script src="{{asset('assets/js/pages/customer-detail.js')}}">
            </script>
@endsection
