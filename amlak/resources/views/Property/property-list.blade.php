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
		 لیست لیست
		</h4>
		<ol class="breadcrumb mb-0">
		 <li class="breadcrumb-item">
		  <a href="javascript: void(0);">
		   مشاور املاک
		  </a>
		 </li>
		 <li class="breadcrumb-item active">
		  لیست لیست
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
		   <h4 class="card-title mb-2">
			کل درآمد
		   </h4>
		   <p class="text-muted fw-medium fs-22 mb-0">
			12,7812.09
		   </p>
		  </div>
		  <div>
		   <div class="avatar-md bg-primary bg-opacity-10 rounded">
			<iconify-icon class="fs-32 text-primary avatar-title" icon="solar:wallet-money-broken">
			</iconify-icon>
		   </div>
		  </div>
		 </div>
		 <div class="d-flex align-items-center justify-content-between mt-3">
		  <p class="mb-0">
		   <span class="text-success fw-medium mb-0">
			<i class="ri-arrow-up-line">
			</i>
			34.4%
		   </span>
		   نسبت به ماه اخیر
		  </p>
		  <div>
		   <a class="link-primary fw-medium" href="#!">
			مشاهده
			<i class="ri-arrow-left-fill align-middle">
			</i>
		   </a>
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
		   <h4 class="card-title mb-2">
			همه املاک
		   </h4>
		   <p class="text-muted fw-medium fs-22 mb-0">
			15،780 واحد
		   </p>
		  </div>
		  <div>
		   <div class="avatar-md bg-primary bg-opacity-10 rounded">
			<iconify-icon class="fs-32 text-primary avatar-title" icon="solar:home-broken">
			</iconify-icon>
		   </div>
		  </div>
		 </div>
		 <div class="d-flex align-items-center justify-content-between mt-3">
		  <p class="mb-0">
		   <span class="text-danger fw-medium mb-0">
			<i class="ri-arrow-down-line">
			</i>
			8.5%
		   </span>
		   نسبت به ماه اخیر
		  </p>
		  <div>
		   <a class="link-primary fw-medium" href="#!">
			مشاهده
			<i class="ri-arrow-left-fill align-middle">
			</i>
		   </a>
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
		   <h4 class="card-title mb-2">
			واحد فروخته شده
		   </h4>
		   <p class="text-muted fw-medium fs-22 mb-0">
			893 واحد
		   </p>
		  </div>
		  <div>
		   <div class="avatar-md bg-primary bg-opacity-10 rounded">
			<iconify-icon class="fs-32 text-primary avatar-title" icon="solar:dollar-broken">
			</iconify-icon>
		   </div>
		  </div>
		 </div>
		 <div class="d-flex align-items-center justify-content-between mt-3">
		  <p class="mb-0">
		   <span class="text-success fw-medium mb-0">
			<i class="ri-arrow-up-line">
			</i>
			17%
		   </span>
		   نسبت به ماه اخیر
		  </p>
		  <div>
		   <a class="link-primary fw-medium" href="#!">
			مشاهده
			<i class="ri-arrow-left-fill align-middle">
			</i>
		   </a>
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
		   <h4 class="card-title mb-2">
			اجاره واحد
		   </h4>
		   <p class="text-muted fw-medium fs-22 mb-0">
			459 واحد
		   </p>
		  </div>
		  <div>
		   <div class="avatar-md bg-primary bg-opacity-10 rounded">
			<iconify-icon class="fs-32 text-primary avatar-title" icon="solar:key-minimalistic-square-broken">
			</iconify-icon>
		   </div>
		  </div>
		 </div>
		 <div class="d-flex align-items-center justify-content-between mt-3">
		  <p class="mb-0">
		   <span class="text-danger fw-medium mb-0">
			<i class="ri-arrow-down-line">
			</i>
			12%
		   </span>
		   نسبت به ماه اخیر
		  </p>
		  <div>
		   <a class="link-primary fw-medium" href="#!">
			مشاهده
			<i class="ri-arrow-left-fill align-middle">
			</i>
		   </a>
		  </div>
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
		  <h4 class="card-title mb-0">
		   لیست کلیه خصوصیات
		  </h4>
		 </div>
		 <div class="dropdown">
		  <a aria-expanded="false" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" href="#">
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
			 عکس و نام
			</th>
			<th>
			 اندازه
			</th>
			<th>
			 نوع ملک
			</th>
			<th>
			 اجاره/فروش
			</th>
			<th>
			 اتاق خواب
			</th>
			<th>
			 لوکیشن
			</th>
			<th>
			 قیمت
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-1.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				دویلا رزیدنسز باتو
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1400 فوت
			</td>
			<td>
			 باقیمانده
			</td>
			<td>
			 <span class="badge bg-success-subtle text-success py-1 px-2 fs-13">
			  اجاره
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  5
			 </p>
			</td>
			<td>
			 فرانسه
			</td>
			<td>
			 8,930.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-2.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				خانه ویلایی پیک
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1700 فوت
			</td>
			<td>
			 ویلا
			</td>
			<td>
			 <span class="badge bg-danger-subtle text-danger py-1 px-2 fs-13">
			  فروخته شده
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  6
			 </p>
			</td>
			<td>
			 برمودا
			</td>
			<td>
			 60,691.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-3.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				تانگیس لاکچری
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1200 فوت
			</td>
			<td>
			 خانه ییلاقی
			</td>
			<td>
			 <span class="badge bg-warning-subtle text-warning py-1 px-2 fs-13">
			  فروش
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  4
			 </p>
			</td>
			<td>
			 استرالیا
			</td>
			<td>
			 70,245.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-4.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				آپارتمان لاکچری
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 900 فوت
			</td>
			<td>
			 آپارتمان
			</td>
			<td>
			 <span class="badge bg-success-subtle text-success py-1 px-2 fs-13">
			  اجاره
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  2
			 </p>
			</td>
			<td>
			 فرانسه
			</td>
			<td>
			 5,825.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-5.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				ویلا آخر هفته ای
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1900ft
			</td>
			<td>
			 ویلا
			</td>
			<td>
			 <span class="badge bg-warning-subtle text-warning py-1 px-2 fs-13">
			  فروش
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  5
			 </p>
			</td>
			<td>
			 ایالات متحده
			</td>
			<td>
			 90,674.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-6.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				ویلا لوکس
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 2000ft
			</td>
			<td>
			 پنت هاوس
			</td>
			<td>
			 <span class="badge bg-success-subtle text-success py-1 px-2 fs-13">
			  اجاره
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  7
			 </p>
			</td>
			<td>
			 گرینلند
			</td>
			<td>
			 10,500.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-7.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				آپارتمان دوبلکس اوجیاگ
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1300 فوت
			</td>
			<td>
			 آپارتمان
			</td>
			<td>
			 <span class="badge bg-danger-subtle text-danger py-1 px-2 fs-13">
			  فروخته شده
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  3
			 </p>
			</td>
			<td>
			 فرانسه
			</td>
			<td>
			 75,341.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-8.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				ویلاهای لوکس ییلاقی
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1200 فوت
			</td>
			<td>
			 خانه ییلاقی
			</td>
			<td>
			 <span class="badge bg-warning-subtle text-warning py-1 px-2 fs-13">
			  فروش
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  4
			 </p>
			</td>
			<td>
			 فرانسه
			</td>
			<td>
			 54,230.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-9.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				خانه ییلاقی
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1800 فوت
			</td>
			<td>
			 باقیمانده
			</td>
			<td>
			 <span class="badge bg-success-subtle text-success py-1 px-2 fs-13">
			  اجاره
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  3
			 </p>
			</td>
			<td>
			 کانادا
			</td>
			<td>
			 14,564.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
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
			   <img alt="" class="avatar-md rounded border border-light border-3" src="assets/images/properties/p-10.jpg"/>
			  </div>
			  <div>
			   <a class="text-dark fw-medium fs-15" href="#!">
				آپارتمان سالار ب
			   </a>
			  </div>
			 </div>
			</td>
			<td>
			 1700 فوت
			</td>
			<td>
			 آپارتمان
			</td>
			<td>
			 <span class="badge bg-danger-subtle text-danger py-1 px-2 fs-13">
			  فروخته شده
			 </span>
			</td>
			<td>
			 <p class="mb-0">
			  <iconify-icon class="align-middle fs-16" icon="solar:bed-broken">
			  </iconify-icon>
			  5
			 </p>
			</td>
			<td>
			 ایالات متحده
			</td>
			<td>
			 34,341.00
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
			   <iconify-icon class="align-middle fs-18" icon="solar:trash-bin-minimalistic-2-broken">
			   </iconify-icon>
			  </a>
			 </div>
			</td>
		   </tr>
		  </tbody>
		 </table>
		</div>
		<!-- end table-responsive -->
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
   @endsection

   @section('scripts')
       {{--   add script file--}}
   @endsection
