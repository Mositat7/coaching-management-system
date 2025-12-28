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
		 نمای کلی املاک
		</h4>
		<ol class="breadcrumb mb-0">
		 <li class="breadcrumb-item">
		  <a href="javascript: void(0);">
		   مشاور املاک
		  </a>
		 </li>
		 <li class="breadcrumb-item active">
		  نمای کلی املاک
		 </li>
		</ol>
	   </div>
	  </div>
	 </div>
	 <!-- ========== Page Title End ========== -->
	 <div class="row">
	  <div class="col-xl-3 col-lg-4">
	   <div class="card">
		<div class="card-header bg-light-subtle">
		 <h4 class="card-title">
		  جزئیات صاحب ملک
		 </h4>
		</div>
		<div class="card-body">
		 <div class="text-center">
		  <img alt="" class="avatar-xl rounded-circle border border-2 border-light mx-auto" src="assets/images/users/avatar-1.jpg"/>
		  <div class="mt-2">
		   <a class="fw-medium text-dark fs-16" href="#!">
			امیرارسلان رهنما
		   </a>
		   <p class="mb-0">
			(مالک)
		   </p>
		  </div>
		  <div class="mt-3">
		   <ul class="list-inline justify-content-center d-flex gap-1 mb-0 align-items-center">
			<li class="list-inline-item">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-primary fs-20" href="javascript: void(0);">
			  <i class="ri-facebook-fill">
			  </i>
			 </a>
			</li>
			<li class="list-inline-item">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-danger fs-20" href="javascript: void(0);">
			  <i class="ri-instagram-fill">
			  </i>
			 </a>
			</li>
			<li class="list-inline-item">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-info fs-20" href="javascript: void(0);">
			  <i class="ri-twitter-fill">
			  </i>
			 </a>
			</li>
			<li class="list-inline-item">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-success fs-20" href="javascript: void(0);">
			  <i class="ri-whatsapp-fill">
			  </i>
			 </a>
			</li>
		   </ul>
		  </div>
		 </div>
		</div>
		<div class="card-footer bg-light-subtle">
		 <div class="row g-2">
		  <div class="col-lg-6">
		   <a class="btn btn-primary w-100" href="#!">
			<iconify-icon class="align-middle fs-18" icon="solar:phone-calling-bold-duotone">
			</iconify-icon>
			تماس
		   </a>
		  </div>
		  <div class="col-lg-6">
		   <a class="btn btn-success w-100" href="#!">
			<iconify-icon class="align-middle fs-16" icon="solar:chat-round-dots-bold-duotone">
			</iconify-icon>
			پیام
		   </a>
		  </div>
		 </div>
		</div>
	   </div>
	   <div class="card">
		<div class="card-header bg-light-subtle">
		 <h4 class="card-title">
		  یک تور را برنامه ریزی کنید
		 </h4>
		</div>
		<div class="card-body">
		 <form>
		  <div class="mb-3">
		   <input class="form-control" id="schedule-date" placeholder="dd-mm-yyyy" type="text"/>
		  </div>
		  <div class="mb-3">
		   <input class="form-control" id="schedule-time" placeholder="12:00" type="text"/>
		  </div>
		  <div class="mb-3">
		   <input class="form-control" id="schedule-name" name="schedule-name" placeholder="نام و نام خانوادگی" type="text"/>
		  </div>
		  <div class="mb-3">
		   <input class="form-control" id="schedule-email" name="schedule-email" placeholder="ایمیل" type="email"/>
		  </div>
		  <div class="mb-3">
		   <input class="form-control" id="schedule-number" name="schedule-number" placeholder="شماره تماس" type="number"/>
		  </div>
		  <div>
		   <textarea class="form-control" id="schedule-textarea" placeholder="پیام" rows="5"></textarea>
		  </div>
		 </form>
		</div>
		<div class="card-footer bg-light-subtle">
		 <a class="btn btn-primary w-100" href="#!">
		  ارسال اطلاعات
		 </a>
		</div>
	   </div>
	  </div>
	  <div class="col-xl-9 col-lg-8">
	   <div class="card">
		<div class="card-body">
		 <div class="position-relative">
		  <img alt="" class="img-fluid rounded" src="assets/images/properties/p-11.jpg"/>
		  <span class="position-absolute top-0 start-0 p-2">
		   <span class="badge bg-warning text-light px-2 py-1 fs-13">
			برای فروش
		   </span>
		  </span>
		 </div>
		 <div class="d-flex flex-wrap justify-content-between my-3 gap-2">
		  <div>
		   <a class="fs-18 text-dark fw-medium" href="#!">
			اقامتگاه آسمان شهر در بیشه حبیب اصفهان
		   </a>
		   <p class="d-flex align-items-center gap-1 mt-1 mb-0">
			<iconify-icon class="fs-18 text-primary" icon="solar:map-point-wave-bold-duotone">
			</iconify-icon>
			اصفهان، بیشه حبیب، کوچه۴، پلاک۱۲
		   </p>
		  </div>
		  <div>
		   <ul class="list-inline float-end d-flex gap-1 mb-0 align-items-center">
			<li class="list-inline-item fs-20 dropdown">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-dark fs-20" data-bs-target="#videocall" data-bs-toggle="modal" href="javascript: void(0);">
			  <iconify-icon icon="solar:share-bold-duotone">
			  </iconify-icon>
			 </a>
			</li>
			<li class="list-inline-item fs-20 dropdown">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-danger fs-20" data-bs-target="#voicecall" data-bs-toggle="modal" href="javascript: void(0);">
			  <iconify-icon icon="solar:heart-angle-bold-duotone">
			  </iconify-icon>
			 </a>
			</li>
			<li class="list-inline-item fs-20 dropdown">
			 <a class="btn btn-light avatar-sm d-flex align-items-center justify-content-center text-warning fs-20" data-bs-toggle="offcanvas" href="#user-profile">
			  <iconify-icon icon="solar:star-bold-duotone">
			  </iconify-icon>
			 </a>
			</li>
			<li class="list-inline-item fs-20 dropdown d-none d-md-flex">
			 <a aria-expanded="false" class="dropdown-toggle arrow-none text-dark" data-bs-toggle="dropdown" href="javascript: void(0);">
			  <i class="ri-more-2-fill">
			  </i>
			 </a>
			 <div class="dropdown-menu dropdown-menu-end">
			  <a class="dropdown-item" href="javascript: void(0);">
			   <i class="ri-user-6-line me-2">
			   </i>
			   مشاهده پروفایل
			  </a>
			  <a class="dropdown-item" href="javascript: void(0);">
			   <i class="ri-music-2-line me-2">
			   </i>
			   رسانه، لینک ها و فایل ها
			  </a>
			  <a class="dropdown-item" href="javascript: void(0);">
			   <i class="ri-search-2-line me-2">
			   </i>
			   جستجو
			  </a>
			  <a class="dropdown-item" href="javascript: void(0);">
			   <i class="ri-image-line me-2">
			   </i>
			   والپیپر
			  </a>
			  <a class="dropdown-item" href="javascript: void(0);">
			   <i class="ri-arrow-right-circle-line me-2">
			   </i>
			   بیشتر
			  </a>
			 </div>
			</li>
		   </ul>
		  </div>
		 </div>
		 <div class="d-flex align-items-center gap-2">
		  <div class="avatar-sm bg-success-subtle rounded">
		   <iconify-icon class="fs-24 text-success avatar-title" icon="solar:wallet-money-bold-duotone">
		   </iconify-icon>
		  </div>
		  <p class="fw-medium text-dark fs-18 mb-0">
		   80,675.00
		  </p>
		 </div>
		 <div class="bg-light-subtle p-2 mt-3 rounded border border-dashed">
		  <div class="row align-items-center text-center g-2">
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <iconify-icon class="fs-18 text-primary" icon="solar:bed-broken">
			 </iconify-icon>
			 5 اتاق خواب
			</p>
		   </div>
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <iconify-icon class="fs-18 text-primary" icon="solar:bath-broken">
			 </iconify-icon>
			 4 حمام
			</p>
		   </div>
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <iconify-icon class="fs-18 text-primary" icon="solar:scale-broken">
			 </iconify-icon>
			 1800 متر مربع
			</p>
		   </div>
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <iconify-icon class="fs-18 text-primary" icon="solar:double-alt-arrow-up-broken">
			 </iconify-icon>
			 3 طبقه
			</p>
		   </div>
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6 border-end">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <span class="badge p-1 bg-light fs-12 text-dark">
			  <i class="ri-star-fill align-text-top fs-14 text-warning me-1">
			  </i>
			  4.4
			 </span>
			 مرور
			</p>
		   </div>
		   <div class="col-xl-2 col-lg-3 col-md-6 col-6">
			<p class="text-muted mb-0 fs-15 fw-medium d-flex align-items-center justify-content-center gap-1">
			 <iconify-icon class="fs-18 text-primary" icon="solar:check-circle-broken">
			 </iconify-icon>
			 برای فروش
			</p>
		   </div>
		  </div>
		 </div>
		 <h5 class="text-dark fw-medium mt-3">
		  برخی از امکانات:
		 </h5>
		 <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   استخر بزرگ
		  </span>
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   در نزدیکی فرودگاه
		  </span>
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   باغ با اندازه بزرگ
		  </span>
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   4 پارکینگ ماشین
		  </span>
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   24/7 برق
		  </span>
		  <span class="badge bg-light-subtle text-muted border fw-medium fs-13 px-2 py-1">
		   تئاتر شخصی
		  </span>
		 </div>
		 <h5 class="text-dark fw-medium mt-3">
		  جزئیات ملک:
		 </h5>
		 <p class="mt-2">
		  ملک به هر موردی اشاره دارد که یک فرد یا یک تجارت دارای عنوان قانونی است. این می تواند شامل موارد ملموس مانند خانه ها ، اتومبیل ها یا لوازم خانگی و همچنین موارد نامشهود باشد که ارزش احتمالی آینده مانند گواهینامه های سهام و اوراق را در خود جای داده است. از نظر قانونی ، املاک به دو دسته طبقه بندی می شود: املاک شخصی و املاک و مستغلات. این تمایز از قانون مشترک انگلیسی سرچشمه می گیرد ، و سیستم حقوقی معاصر ما همچنان بین این دو نوع تمایز قائل می شود.
		 </p>
		 <div class="d-flex align-items-center justify-content-between">
		  <a class="link-primary fw-medium" href="#!">
		   مشاهده جزئیات بیشتر
		   <i class="ri-arrow-left-fill">
		   </i>
		  </a>
		  <div>
		   <p class="mb-0 d-flex align-items-center gap-1">
			<iconify-icon class="fs-18 text-primary" icon="solar:calendar-date-broken">
			</iconify-icon>
			10 مه 2024
		   </p>
		  </div>
		 </div>
		</div>
	   </div>
	  </div>
	 </div>
	 <div class="row">
	  <div class="col-lg-12">
	   <div class="mapouter">
		<div class="gmap_canvas mb-2">
		 <iframe class="gmap_iframe rounded" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=1980&amp;height=400&amp;hl=en&amp;q=University%20of%20Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" style="height: 400px;" width="100%">
		 </iframe>
		</div>
	   </div>
	  </div>
	 </div>
	</div>
@endsection

@section('scripts')
    {{--   add script file--}}
@endsection

