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
		 شبکه لیست
		</h4>
		<ol class="breadcrumb mb-0">
		 <li class="breadcrumb-item">
		  <a href="javascript: void(0);">
		   مشاور املاک
		  </a>
		 </li>
		 <li class="breadcrumb-item active">
		  شبکه لیست
		 </li>
		</ol>
	   </div>
	  </div>
	 </div>
	 <!-- ========== Page Title End ========== -->
	 <div class="row">
	  <div class="col-xl-3 col-lg-12">
	   <div class="card">
		<div class="card-header border-bottom">
		 <div>
		  <h4 class="card-title">
		   املاک
		  </h4>
		  <p class="mb-0">
		    15,780 ملک
		  </p>
		 </div>
		</div>
		<div class="card-body border-light">
		 <form>
		  <label class="form-label" for="choices-single-groups">
		   محل خواص
		  </label>
		  <select class="form-control" data-choices="" data-choices-groups="" data-placeholder="Select City" id="choices-single-groups" name="choices-single-groups">
		   <option value="">
			انتخاب شهر
		   </option>
		   <optgroup label="انگلیس">
			<option value="لندن">
			 لندن
			</option>
			<option value="منچستر">
			 منچستر
			</option>
			<option value="لیورپول">
			 لیورپول
			</option>
		   </optgroup>
		   <optgroup label="فرانسه">
			<option value="پاریس">
			 پاریس
			</option>
			<option value="لیون">
			 لیون
			</option>
			<option value="مارسی">
			 مارسی
			</option>
		   </optgroup>
		   <optgroup disabled="" label="آلمان">
			<option value="هامبورگ">
			 هامبورگ
			</option>
			<option value="مونیخ">
			 مونیخ
			</option>
			<option value="برلین">
			 برلین
			</option>
		   </optgroup>
		   <optgroup label="آمریکا">
			<option value="نیویورک">
			 نیویورک
			</option>
			<option disabled="" value="واشنگتن">
			 واشنگتن
			</option>
			<option value="میشیگان">
			 میشیگان
			</option>
		   </optgroup>
		   <optgroup label="اسپانیا">
			<option value="مادرید">
			 مادرید
			</option>
			<option value="بارسلونا">
			 بارسلونا
			</option>
			<option value="مالاگا">
			 مالاگا
			</option>
		   </optgroup>
		   <optgroup label="کانادا">
			<option value="مونترال">
			 مونترال
			</option>
			<option value="تورنتو">
			 تورنتو
			</option>
			<option value="ونکوور">
			 ونکوور
			</option>
		   </optgroup>
		  </select>
		  <div class="mb-3">
		   <label class="form-label" for="typeplace">
			نوع مکان
		   </label>
		   <input class="form-control" id="typeplace" type="text"/>
		  </div>
		 </form>
		 <h5 class="text-dark fw-medium my-3">
		  دامنه قیمت سفارشی:
		 </h5>
		 <div [data-slider-size="md" ]="" class="" id="product-price-range">
		 </div>
		 <div class="formCost d-flex gap-2 align-items-center mt-3">
		  <input class="form-control form-control-sm text-center" id="minCost" type="text" value="0"/>
		  <span class="fw-semibold text-muted">
		   به
		  </span>
		  <input class="form-control form-control-sm text-center" id="maxCost" type="text" value="1000"/>
		 </div>
		 <h5 class="text-dark fw-medium my-3">
		  ویژگی های دسترسی:
		 </h5>
		 <div class="row g-1">
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck11" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck11">
			 برای اجاره
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck12" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck12">
			 برای فروش
			</label>
		   </div>
		  </div>
		 </div>
		 <h5 class="text-dark fw-medium my-3">
		  نوع خواص:
		 </h5>
		 <div class="row g-1">
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input checked="" class="form-check-input" id="defaultCheck" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck">
			 همه خصوصیات
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck1" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 کلبه
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck2" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 ویلا
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck3" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 آپارتمان
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck4" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 خانه ییلاقی
			</label>
		   </div>
		  </div>
		 </div>
		 <h5 class="text-dark fw-medium my-3">
		  اتاق خواب:
		 </h5>
		 <div aria-label="Basic checkbox toggle button group" class="" role="group">
		  <input class="btn-check" id="btncheck1" type="checkbox"/>
		  <label class="btn btn-outline-primary" for="btncheck1">
		   تک خواب
		  </label>
		  <input class="btn-check" id="btncheck2" type="checkbox"/>
		  <label class="btn btn-outline-primary" for="btncheck2">
		   دو خواب
		  </label>
		  <input checked="" class="btn-check" id="btncheck3" type="checkbox"/>
		  <label class="btn btn-outline-primary" for="btncheck3">
		   سه خواب
		  </label>
		  <input class="btn-check" id="btncheck4" type="checkbox"/>
		  <label class="btn btn-outline-primary my-1" for="btncheck4">
		   چهار و پنج خواب
		  </label>
		 </div>
		 <h5 class="text-dark fw-medium my-3">
		  ویژگی های دسترسی:
		 </h5>
		 <div class="row g-1">
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck5" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 بالکن
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck6" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 پارکینگ
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck7" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 اسپا
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck8" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 استخر
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck9" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 رستوران
			</label>
		   </div>
		  </div>
		  <div class="col-lg-6">
		   <div class="mb-2">
			<input class="form-check-input" id="defaultCheck10" type="checkbox" value=""/>
			<label class="form-check-label ms-1" for="defaultCheck1">
			 باشگاه تناسب اندام
			</label>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="card-footer">
		 <a class="btn btn-primary w-100" href="#!">
		  درخواست کردن
		 </a>
		</div>
	   </div>
	  </div>
	  <div class="col-xl-9 col-lg-12">
	   <div class="row">
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-1.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-success text-white fs-13">
			 برای اجاره
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			8,930.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-2.jpg"/>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-danger text-white fs-13">
			 فروخته شده
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  خانه ویلایی پیک
			 </a>
			 <p class="text-muted mb-0">
			  1اصفهان، شهید کشوری
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
			  6 خواب
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  5 حمام
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  1700متر
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-muted text-decoration-line-through fs-16 mb-0">
			60,691.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-3.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-warning text-white fs-13">
			 برای فروش
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			70,245.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-4.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn bg-warning-subtle avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-warning" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-success text-white fs-13">
			 برای اجاره
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:buildings-3-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  آپارتمان لاکچری
			 </a>
			 <p class="text-muted mb-0">
			  اصفهان، شهید کشوری
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
			  2 خواب
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  2 حمام
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  900متر
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			5,825.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-5.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn bg-warning-subtle avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-warning" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-warning text-white fs-13">
			 برای فروش
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  ویلا آخر هفته ای
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
			  5 خواب
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:bath-broken">
			   </iconify-icon>
			  </span>
			  5 حمام
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:scale-broken">
			   </iconify-icon>
			  </span>
			  1900متر
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			90,674.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-6.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn btn-warning avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-light" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-success text-white fs-13">
			 برای اجاره
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			10,500.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-7.jpg"/>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-danger text-white fs-13">
			 فروخته شده
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:buildings-3-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  خانه دوبلکس اوجیاگ
			 </a>
			 <p class="text-muted mb-0">
			  24 هانوفر ، نیویورک
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
			  3 خواب
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
			  1300متر
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-muted text-decoration-line-through fs-16 mb-0">
			75,341.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-8.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn bg-warning-subtle avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-warning" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-warning text-white fs-13">
			 برای فروش
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  ویلاهای لوکس ییلاقی
			 </a>
			 <p class="text-muted mb-0">
			  جاده مرق، کیلومتر۳۲
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
			  1 طبقه
			 </span>
			</div>
		   </div>
		  </div>
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			54,230.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-9.jpg"/>
		   <span class="position-absolute top-0 start-0 p-1">
			<button class="btn bg-warning-subtle avatar-sm d-inline-flex align-items-center justify-content-center fs-20 rounded text-warning" type="button">
			 <iconify-icon icon="solar:bookmark-broken">
			 </iconify-icon>
			</button>
		   </span>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-success text-white fs-13">
			 برای اجاره
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:home-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  خانه ییلاقی
			 </a>
			 <p class="text-muted mb-0">
			  25 ، خیابان ویلیسون
																 بکر
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
			  3 خواب
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
			  1800متر
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
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-dark fs-16 mb-0">
			14,564.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-lg-4 col-md-6">
		 <div class="card overflow-hidden">
		  <div class="position-relative">
		   <img alt="" class="img-fluid rounded-top" src="assets/images/properties/p-10.jpg"/>
		   <span class="position-absolute top-0 end-0 p-1">
			<span class="badge bg-danger text-white fs-13">
			 فروخته شده
			</span>
		   </span>
		  </div>
		  <div class="card-body">
		   <div class="d-flex align-items-center gap-2">
			<div class="avatar bg-light rounded">
			 <iconify-icon class="fs-24 text-primary avatar-title" icon="solar:buildings-3-bold-duotone">
			 </iconify-icon>
			</div>
			<div>
			 <a class="text-dark fw-medium fs-16" href="#!">
			  آپارتمان سالار ب
			 </a>
			 <p class="text-muted mb-0">
			  جاده ییلاقی
																 نیوبرارا
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
			  1700متر
			 </span>
			</div>
			<div class="col-lg-4 col-4">
			 <span class="badge bg-light-subtle text-muted border fs-12">
			  <span class="fs-16">
			   <iconify-icon class="align-middle" icon="solar:double-alt-arrow-up-broken">
			   </iconify-icon>
			  </span>
			  6 طبقه
			 </span>
			</div>
		   </div>
		  </div>
		  <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center border-top">
		   <p class="fw-medium text-muted text-decoration-line-through fs-16 mb-0">
			34,341.00
		   </p>
		   <div>
			<a class="link-primary fw-medium" href="#!">
			 تحقیق بیشتر
			 <i class="ri-arrow-left-fill align-middle">
			 </i>
			</a>
		   </div>
		  </div>
		 </div>
		</div>
	   </div>
	   <div class="p-3 border-top">
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
   <!-- ==================================================== -->
   <!-- End Page Content -->
   @endsection

   @section('scripts')
       <script
           src="{{asset('assets/js/pages/property-grid.js')}}">
       </script>
   @endsection
