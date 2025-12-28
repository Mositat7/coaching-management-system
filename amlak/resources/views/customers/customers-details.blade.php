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
                            جزئیات مشتری
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مشتریان
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                جزئیات مشتری
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleCaptions">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img alt="img-6" class="d-block w-100 rounded"
                                             src="assets/images/properties/p-14.jpg"/>
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img alt="img-7" class="d-block w-100 rounded"
                                             src="assets/images/properties/p-13.jpg"/>
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img alt="img-5" class="d-block w-100 rounded"
                                             src="assets/images/properties/p-11.jpg"/>
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img alt="img-5" class="d-block w-100 rounded"
                                             src="assets/images/properties/p-15.jpg"/>
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" data-bs-slide="prev"
                                        data-bs-target="#carouselExampleCaptions" type="button">
		   <span aria-hidden="true" class="carousel-control-next-icon">
		   </span>
                                    <span class="visually-hidden">
			بعدی
		   </span>
                                </button>
                                <button class="carousel-control-next" data-bs-slide="next"
                                        data-bs-target="#carouselExampleCaptions" type="button">
		   <span aria-hidden="true" class="carousel-control-next-icon">
		   </span>
                                    <span class="visually-hidden">
			بعدی
		   </span>
                                </button>
                            </div>
                            <div class="d-flex align-items-center my-3 gap-3">
                                <img alt="" class="rounded-circle avatar-xl img-thumbnail"
                                     src="assets/images/users/avatar-2.jpg"/>
                                <div>
                                    <h3 class="fw-semibold mb-1">
                                        باربد باباخانی
                                    </h3>
                                    <a class="link-primary fw-medium fs-14" href="#!">
                                        EastTribune.nl
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mt-3">
                                <div>
                                    <a class="btn btn-primary" href="#!">
                                        <i class="ri-chat-1-fill">
                                        </i>
                                        چت کردن
                                    </a>
                                    <a class="btn btn-outline-primary" href="#!">
                                        <i class="ri-phone-fill">
                                        </i>
                                        تماس
                                    </a>
                                </div>
                                <div class="d-flex gap-1">
                                    <a class="btn btn-dark avatar-sm d-flex align-items-center justify-content-center fs-20"
                                       href="javascript: void(0);">
                                        <i class="ri-edit-fill">
                                        </i>
                                    </a>
                                    <a class="btn btn-primary avatar-sm d-flex align-items-center justify-content-center fs-20"
                                       href="javascript: void(0);">
                                        <i class="ri-share-fill">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-lg-3">
                                    <p class="text-dark fw-semibold fs-16 mb-1">
                                        آدرس ایمیل :
                                    </p>
                                    <p class="mb-0">
                                        barbod@teleworm.us
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <p class="text-dark fw-semibold fs-16 mb-1">
                                        شماره تماس :
                                    </p>
                                    <p class="mb-0">
                                        ۰۹۰۱۰۰۱۰۰۱۱
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="text-dark fw-semibold fs-16 mb-1">
                                        لوکیشن :
                                    </p>
                                    <p class="mb-0">
                                        ملاصدرا، کوچه۸، پلاک۲۲
                                    </p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="text-dark fw-semibold fs-16 mb-1">
                                        Status :
                                    </p>
                                    <p class="mb-0">
			<span class="badge bg-success text-white fs-12 px-2 py-1">
			 در دسترس
			</span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="card-title mb-2">
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
                                <div class="col-lg-8">
                                    <h4 class="card-title mb-2">
                                        ترجیحات :
                                    </h4>
                                    <p class="mb-0">
                                        <i class="ri-circle-fill fs-10 me-2 text-success">
                                        </i>
                                        ۳-۴ اتاق خواب، ۲-۳ حمام
                                    </p>
                                    <p class="mb-0">
                                        <i class="ri-circle-fill fs-10 me-2 text-success">
                                        </i>
                                        نزدیک به حمل و نقل عمومی، منطقه آموزشی خوب، حیاط خلوت، آشپزخانه مدرن
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="border p-2 rounded">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="avatar bg-success bg-opacity-10 rounded">
                                                <iconify-icon class="fs-28 text-success avatar-title"
                                                              icon="solar:home-2-bold">
                                                </iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-dark fw-semibold fs-16 mb-0">
                                                    دارایی فعال
                                                </p>
                                                <p class="mb-0">
                                                    ۳۵۰ ملک فعال
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <p class="mb-1 text-dark fw-medium fa-15">
                                                مشاهده اموال
                                            </p>
                                            <div>
                                                <p class="mb-0 text-dark fw-semibold fs-15">
                                                    231
                                                </p>
                                            </div>
                                        </div>
                                        <div class="progress mt-2" style="height: 10px;">
                                            <div aria-valuemax="70" aria-valuemin="0" aria-valuenow="70"
                                                 class="progress-bar progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                 role="progressbar" style="width: 60%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border p-2 rounded">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="avatar bg-warning bg-opacity-10 rounded">
                                                <iconify-icon class="fs-28 text-warning avatar-title"
                                                              icon="solar:home-bold">
                                                </iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-dark fw-semibold fs-16 mb-0">
                                                    مشاهده اموال
                                                </p>
                                                <p class="mb-0">
                                                    231 مشاهده اموال
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <p class="mb-1 text-dark fw-medium fa-15">
                                                دارایی های خود
                                            </p>
                                            <div>
                                                <p class="mb-0 text-dark fw-semibold fs-15">
                                                    27
                                                </p>
                                            </div>
                                        </div>
                                        <div class="progress mt-2" style="height: 10px;">
                                            <div aria-valuemax="70" aria-valuemin="0" aria-valuenow="70"
                                                 class="progress-bar progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                 role="progressbar" style="width: 20%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border p-2 rounded">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="avatar bg-primary bg-opacity-10 rounded">
                                                <iconify-icon class="fs-28 text-primary avatar-title"
                                                              icon="solar:money-bag-bold">
                                                </iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-dark fw-semibold fs-16 mb-0">
                                                    دارایی های خود
                                                </p>
                                                <p class="mb-0">
                                                    27 دارایی خود
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <p class="mb-1 text-dark fw-medium fa-15">
                                                سرمایه گذاری روی املاک
                                            </p>
                                            <div>
                                                <p class="mb-0 text-dark fw-semibold fs-15">
                                                    928,128
                                                </p>
                                            </div>
                                        </div>
                                        <div class="progress mt-2" style="height: 10px;">
                                            <div aria-valuemax="70" aria-valuemin="0" aria-valuenow="70"
                                                 class="progress-bar progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                 role="progressbar" style="width: 80%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                املاک مورد علاقه (3)
                            </h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <div class="card overflow-hidden">
                                <div class="position-relative">
                                    <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-1.jpg"/>
                                    <span class="position-absolute top-0 start-0 p-1">
			<button
                class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
                type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar bg-light rounded">
                                            <iconify-icon class="fs-24 text-primary avatar-title"
                                                          icon="solar:home-bold-duotone">
                                            </iconify-icon>
                                        </div>
                                        <div>
                                            <a class="text-dark fw-medium fs-16" href="#!">
                                                دویلا رزیدنسز باتو
                                            </a>
                                            <p class="text-muted mb-0">
                                                اصفهان، ناژوان
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-2 g-2">
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bed-broken">
			   </iconify-icon>
			  </span>
			  5 خواب
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  4 حمام
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  1400متر
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:double-alt-arrow-up-broken">
			   </iconify-icon>
			  </span>
			  3 طبقه
			 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card overflow-hidden">
                                <div class="position-relative">
                                    <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-3.jpg"/>
                                    <span class="position-absolute top-0 start-0 p-1">
			<button
                class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
                type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar bg-light rounded">
                                            <iconify-icon class="fs-24 text-primary avatar-title"
                                                          icon="solar:home-bold-duotone">
                                            </iconify-icon>
                                        </div>
                                        <div>
                                            <a class="text-dark fw-medium fs-16" href="#!">
                                                تانگیس لاکچری
                                            </a>
                                            <p class="text-muted mb-0">
                                                اصفهان، بیشه حبیب
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-2 g-2">
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bed-broken">
			   </iconify-icon>
			  </span>
			  4 خواب
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  3 حمام
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  1200متر
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:double-alt-arrow-up-broken">
			   </iconify-icon>
			  </span>
			  2 طبقه
			 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card overflow-hidden">
                                <div class="position-relative">
                                    <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-6.jpg"/>
                                    <span class="position-absolute top-0 start-0 p-1">
			<button
                class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light"
                type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar bg-light rounded">
                                            <iconify-icon class="fs-24 text-primary avatar-title"
                                                          icon="solar:home-bold-duotone">
                                            </iconify-icon>
                                        </div>
                                        <div>
                                            <a class="text-dark fw-medium fs-16" href="#!">
                                                ویلا لوکس
                                            </a>
                                            <p class="text-muted mb-0">
                                                اصفهان، پینارت
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-2 g-2">
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bed-broken">
			   </iconify-icon>
			  </span>
			  7 خواب
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  6 حمام
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  2000متر
			 </span>
                                        </div>
                                        <div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:double-alt-arrow-up-broken">
			   </iconify-icon>
			  </span>
			  1 طبقه
			 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">
                                استعلام هفتگی
                            </h4>
                            <div class="dropdown">
                                <a aria-expanded="true"
                                   class="dropdown-toggle btn btn-sm btn-outline-light rounded show"
                                   data-bs-toggle="dropdown" href="#">
                                    ماه اخیر
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end"
                                     style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        روز
                                    </a>
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        ماه
                                    </a>
                                    <!-- item-->
                                    <a class="dropdown-item" href="#!">
                                        سال
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="apex-charts" id="weekly-inquiry">
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between border-top">
                            <p class="mb-0 fw-medium fs-15">
                                مهر-آبان ۱۴۰۳
                            </p>
                            <p class="mb-0 text-dark fw-semibold fs-15">
                                هفته اول ۳۷
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                معاملات
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="p-3 bg-primary bg-gradient rounded-4 border border-light border-2 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <img alt="" class="avatar" src="assets/images/chip.png"/>
                                    <div class="ms-auto">
                                        <img alt="" class="avatar" src="assets/images/card/mastercard.svg"/>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h4 class="text-white d-flex gap-2">
			<span class="text-white-50">
			 XXXX
			</span>
                                        <span class="text-white-50">
			 XXXX
			</span>
                                        <span class="text-white-50">
			 XXXX
			</span>
                                        3467
                                    </h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <div>
                                        <p class="text-white-50 mb-2">
                                            نام دارنده
                                        </p>
                                        <h4 class="mb-0 text-white">
                                            ایلیا میرزایی
                                        </h4>
                                    </div>
                                    <div>
                                        <p class="text-white-50 mb-2">
                                            اعتبار
                                        </p>
                                        <h4 class="mb-0 text-white">
                                            05/26
                                        </h4>
                                    </div>
                                    <img alt="" class="img-fluid" src="assets/images/contactless-payment.png"/>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="d-flex align-items-center gap-3 border-bottom pb-3">
                                    <div class="avatar bg-primary bg-opacity-10 rounded">
                                        <iconify-icon class="fs-28 text-primary avatar-title"
                                                      icon="solar:square-transfer-horizontal-bold">
                                        </iconify-icon>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-dark fw-medium fs-15">
                                            امیرارسلان رهنما
                                        </p>
                                        <p class="text-muted mb-0">
                                            info@iarsalan.com
                                        </p>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="mb-1 fs-16 text-dark fw-medium">
                                            13,987
                                            <span>
			  <i class="ri-checkbox-circle-line text-success ms-1">
			  </i>
			 </span>
                                        </p>
                                        <p class="mb-0 fs-13">
                                            TXN-341220
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 pt-3 rounded">
                                    <div class="avatar bg-primary bg-opacity-10 rounded">
                                        <iconify-icon class="fs-28 text-primary avatar-title"
                                                      icon="solar:square-transfer-horizontal-bold">
                                        </iconify-icon>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-dark fw-medium fs-15">
                                            نسترن سلطانی
                                        </p>
                                        <p class="text-muted mb-0">
                                            info@nastaran.com
                                        </p>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="mb-1 fs-16 text-dark fw-medium">
                                            2,710
                                            <span>
			  <i class="ri-checkbox-circle-line text-success ms-1">
			  </i>
			 </span>
                                        </p>
                                        <p class="mb-0 fs-13">
                                            TXN-836451
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a class="link-primary fw-medium" href="#!">
                                        مشاهده بیشتر
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                دارایی های خود
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="apex-charts" id="own-property">
                            </div>
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar flex-shrink-0">
			<span class="avatar-title bg-danger-subtle text-danger fw-bold rounded">
			 <i class="ri-arrow-up-line fs-20">
			 </i>
			</span>
                                    </div>
                                    <div>
                                        <h4 class="text-dark fw-semibold mb-1">
                                            928,128
                                        </h4>
                                        <p class="mb-0 text-muted">
                                            کل سرمایه گذاری روی املاک
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar flex-shrink-0">
			<span class="avatar-title bg-success-subtle text-success fw-bold rounded">
			 <i class="ri-arrow-down-line fs-20">
			 </i>
			</span>
                                    </div>
                                    <div>
                                        <h4 class="text-dark fw-semibold mb-1">
                                            613,321.12
                                        </h4>
                                        <p class="mb-0 text-muted">
                                            درآمد
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">
                                    تاریخچه معاملات
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
                                            شناسه سفارش
                                        </th>
                                        <th>
                                            تاریخ معامله
                                        </th>
                                        <th>
                                            نوع ملک
                                        </th>
                                        <th>
                                            آدرس ملک
                                        </th>
                                        <th>
                                            مقدار
                                        </th>
                                        <th>
                                            وضعیت
                                        </th>
                                        <th>
                                            نام و نام خانوادگی نماینده
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
                                            ORD-75234
                                        </td>
                                        <td>
                                            15/03/۱۴۰۳
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            ملاصدرا، کوچه۱۰، پلاک۲۳
                                        </td>
                                        <td>
                                            928,128
                                        </td>
                                        <td>
			  <span class="badge bg-success text-white fs-11">
			   پرداخت شده
			  </span>
                                        </td>
                                        <td>
                                            امیرارسلان رهنما
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
                                            ORD-54222
                                        </td>
                                        <td>
                                            20/03/۱۴۰۳
                                        </td>
                                        <td>
                                            تجاری
                                        </td>
                                        <td>
                                            سعادت آباد، کوچه۱۱، پلاک۲۳
                                        </td>
                                        <td>
                                            84,091
                                        </td>
                                        <td>
			  <span class="badge bg-success text-white fs-11">
			   پرداخت شده
			  </span>
                                        </td>
                                        <td>
                                            امیرارسلان رهنما
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
                                            ORD-63111
                                        </td>
                                        <td>
                                            25/03/۱۴۰۳
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            چهارباغ بالا، کوچه۴، پلاک۱۲
                                        </td>
                                        <td>
                                            83,120
                                        </td>
                                        <td>
			  <span class="badge bg-success text-white fs-11">
			   پرداخت شده
			  </span>
                                        </td>
                                        <td>
                                            امیرارسلان رهنما
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
                                            ORD-84623
                                        </td>
                                        <td>
                                            05/04/۱۴۰۳
                                        </td>
                                        <td>
                                            مسکونی
                                        </td>
                                        <td>
                                            آذر، کوچه۱۰، پلاک۷
                                        </td>
                                        <td>
                                            65,900
                                        </td>
                                        <td>
			  <span class="badge bg-success text-white fs-11">
			   پرداخت شده
			  </span>
                                        </td>
                                        <td>
                                            نسترن سلطانی
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
    </div>
    <!-- End Page Content -->
@endsection

@section('scripts')
    <script src="{{asset('assets/js/pages/customer-detail.js')}}">
    </script>
@endsection


