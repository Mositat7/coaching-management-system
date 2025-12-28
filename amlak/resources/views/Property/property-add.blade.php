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
                        اضافه کردن املاک
                    </h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                مشاور املاک
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            اضافه کردن املاک
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ========== Page Title End ========== -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="position-relative">
                            <img alt="" class="img-fluid rounded bg-light" src="assets/images/properties/p-1.jpg"/>
                            <span class="position-absolute top-0 end-0 p-1">
		   <span class="badge bg-success text-light fs-13">
			برای اجاره
		   </span>
		  </span>
                        </div>
                        <div class="mt-3">
                            <h4 class="mb-1">
                                دویلا رزیدنسز باتو
                                <span class="fs-14 text-muted ms-1">
			(اقامتگاه ها)
		   </span>
                            </h4>
                            <p class="mb-1">
                                4604 ، فیلی لین کیووا ایالات متحده آمریکا
                            </p>
                            <h5 class="text-dark fw-medium mt-3">
                                قیمت:
                            </h5>
                            <h4 class="fw-semibold mt-2 text-muted">
                                8,930.00
                            </h4>
                        </div>
                        <div class="row mt-2 g-2">
                            <div class="col-lg-3 col-3">
		   <span class="badge bg-light-subtle text-muted border fs-12">
			<span class="fs-16">
			 <iconify-icon class="align-middle" icon="solar:bed-broken">
			 </iconify-icon>
			</span>
			5 خواب
		   </span>
                            </div>
                            <div class="col-lg-3 col-3">
		   <span class="badge bg-light-subtle text-muted border fs-12">
			<span class="fs-16">
			 <iconify-icon class="align-middle" icon="solar:bath-broken">
			 </iconify-icon>
			</span>
			4 حمام
		   </span>
                            </div>
                            <div class="col-lg-3 col-3">
		   <span class="badge bg-light-subtle text-muted border fs-12">
			<span class="fs-16">
			 <iconify-icon class="align-middle" icon="solar:scale-broken">
			 </iconify-icon>
			</span>
			1400 فوت
		   </span>
                            </div>
                            <div class="col-lg-3 col-3">
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
                    <div class="card-footer bg-light-subtle">
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <a class="btn btn-outline-primary w-100" href="#!">
                                    اضافه کردن
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a class="btn btn-danger w-100" href="#!">
                                    کنسل شده
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            عکس ملک را اضافه کنید
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="https://techzaa.in/" class="dropzone bg-light-subtle py-5" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate" id="myAwesomeDropzone" method="post">
                            <div class="file-upload">
                                <input hidden="" id="fileUpload" multiple="" name="file" type="file"/>
                                <label for="fileUpload">
                                    آپلود فایل&zwnj;ها
                                </label>
                            </div>
                            <div class="dz-message needsclick">
                                <i class="ri-upload-cloud-2-line fs-48 text-primary">
                                </i>
                                <h3 class="mt-4">
                                    عکس&zwnj;های خود را اینجا رها کنید، یا
                                    <span class="text-primary">
			 برای انتخاب کلیک کنید
			</span>
                                </h3>
                                <span class="text-muted fs-13">
			ابعاد تصویر توصیه شده: ۱۶۰۰ در ۱۲۰۰ پیکسل (۴:۳). فایل&zwnj;های PNG، JPG و GIF مجاز هستند.
		   </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            اطلاعات دارایی
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="property-name">
                                            نام املاک
                                        </label>
                                        <input class="form-control" id="property-name" placeholder="نام کاربری" type="text"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form>
                                    <label class="form-label" for="property-categories">
                                        دسته املاک
                                    </label>
                                    <select class="form-control" data-choices="" data-choices-groups="" data-placeholder="Select Categories" id="property-categories" name="choices-single-groups">
                                        <option value="Villas">
                                            ویلا
                                        </option>
                                        <option value="Residences">
                                            باقیمانده
                                        </option>
                                        <option value="Bungalow">
                                            خانه ییلاقی
                                        </option>
                                        <option value="Apartment">
                                            آپارتمان
                                        </option>
                                        <option value="Penthouse">
                                            پنت هاوس
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-price">
                                        قیمت
                                    </label>
                                    <div class="input-group mb-3">
			 <span class="input-group-text fs-20 px-2 py-0">
			  <i class="ri-money-dollar-circle-line">
			  </i>
			 </span>
                                        <input class="form-control" id="property-price" placeholder="000" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-for">
                                        دارایی برای
                                    </label>
                                    <select class="form-control" data-choices="" data-choices-groups="" data-placeholder="Select Categories" id="property-for" name="choices-single-groups">
                                        <option value="Sale">
                                            فروش
                                        </option>
                                        <option value="Rent">
                                            اجاره
                                        </option>
                                        <option value="Other">
                                            دیگر
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-bedroom">
                                        اتاق خواب
                                    </label>
                                    <div class="input-group mb-3">
			 <span class="input-group-text fs-20">
			  <iconify-icon class="align-middle" icon="solar:bed-broken">
			  </iconify-icon>
			 </span>
                                        <input class="form-control" id="property-bedroom" placeholder="" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-bathroom">
                                        حمام
                                    </label>
                                    <div class="input-group mb-3">
			 <span class="input-group-text fs-20">
			  <iconify-icon class="align-middle" icon="solar:bath-broken">
			  </iconify-icon>
			 </span>
                                        <input class="form-control" id="property-bathroom" placeholder="" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-square-foot">
                                        فوت مربع
                                    </label>
                                    <div class="input-group mb-3">
			 <span class="input-group-text fs-20">
			  <iconify-icon class="align-middle" icon="solar:scale-broken">
			  </iconify-icon>
			 </span>
                                        <input class="form-control" id="property-square-foot" placeholder="" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="property-square-foot">
                                        کف
                                    </label>
                                    <div class="input-group mb-3">
			 <span class="input-group-text fs-20">
			  <iconify-icon class="align-middle" icon="solar:double-alt-arrow-up-broken">
			  </iconify-icon>
			 </span>
                                        <input class="form-control" id="property-square-foot" placeholder="" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="property-address">
                                            آدرس املاک
                                        </label>
                                        <textarea class="form-control" id="property-address" placeholder="آدرس" rows="3"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="property-zipcode">
                                            کد پستی
                                        </label>
                                        <input class="form-control" id="property-zipcode" placeholder="کد پستی" type="number"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="choices-city">
                                        شهر
                                    </label>
                                    <select class="form-control" data-choices="" data-choices-groups="" data-placeholder="Select City" id="choices-city" name="choices-city">
                                        <option value="">
                                            انتخاب شهر
                                        </option>
                                        <optgroup label="انگلیس">
                                            <option value="London">
                                                لندن
                                            </option>
                                            <option value="Manchester">
                                                منچستر
                                            </option>
                                            <option value="Liverpool">
                                                لیورپول
                                            </option>
                                        </optgroup>
                                        <optgroup label="فرانسه">
                                            <option value="Paris">
                                                پاریس
                                            </option>
                                            <option value="Lyon">
                                                لون
                                            </option>
                                            <option value="Marseille">
                                                مارسی
                                            </option>
                                        </optgroup>
                                        <optgroup disabled="" label="آلمان">
                                            <option value="Hamburg">
                                                هامبورگ
                                            </option>
                                            <option value="Munich">
                                                مونیخ
                                            </option>
                                            <option value="Berlin">
                                                برلین
                                            </option>
                                        </optgroup>
                                        <optgroup label="آمریکا">
                                            <option value="New York">
                                                نیویورک
                                            </option>
                                            <option disabled="" value="Washington">
                                                واشنگتن
                                            </option>
                                            <option value="Michigan">
                                                میشیگان
                                            </option>
                                        </optgroup>
                                        <optgroup label="اسپانیا">
                                            <option value="Madrid">
                                                مادرید
                                            </option>
                                            <option value="Barcelona">
                                                بارسلونا
                                            </option>
                                            <option value="Malaga">
                                                مالاگا
                                            </option>
                                        </optgroup>
                                        <optgroup label="کانادا">
                                            <option value="Montreal">
                                                وابسته به مونترال
                                            </option>
                                            <option value="Toronto">
                                                تورنتو
                                            </option>
                                            <option value="Vancouver">
                                                ونکوور
                                            </option>
                                        </optgroup>
                                    </select>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <form>
                                    <label class="form-label" for="choices-country">
                                        کشور
                                    </label>
                                    <select class="form-control" data-choices="" data-choices-groups="" data-placeholder="Select Country" id="choices-country" name="choices-country">
                                        <option value="">
                                            یک کشور را انتخاب کنید
                                        </option>
                                        <optgroup label="">
                                            <option value="">
                                                انگلستان
                                            </option>
                                            <option value="Fran">
                                                فرانسه
                                            </option>
                                            <option value="Netherlands">
                                                هلند
                                            </option>
                                            <option value="U.S.A">
                                                ایالات متحده
                                            </option>
                                            <option value="Denmark">
                                                دانمارک
                                            </option>
                                            <option value="Canada">
                                                کانادا
                                            </option>
                                            <option value="Australia">
                                                استرالیا
                                            </option>
                                            <option value="India">
                                                هندوستان
                                            </option>
                                            <option value="Germany">
                                                آلمان
                                            </option>
                                            <option value="Spain">
                                                اسپانیا
                                            </option>
                                            <option value="United Arab Emirates">
                                                امارات متحده عربی
                                            </option>
                                        </optgroup>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <a class="btn btn-outline-primary w-100" href="#!">
                                ایجاد محصول
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-danger w-100" href="#!">
                                کنسل شده
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{--   add script file--}}
@endsection
