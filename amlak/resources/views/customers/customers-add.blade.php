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
                            اضافه کردن مشتری
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    مشاور املاک
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                اضافه کردن مشتری
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="customer-bg rounded position-relative">
                                <img alt=""
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-0 translate-middle ms-5"
                                     src="assets/images/users/avatar-2.jpg"/>
                            </div>
                            <div class="mt-5 pt-3 ms-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0 text-dark fw-semibold">
                                        باربد باباخانی
                                    </h4>
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
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            مشاهده اموال
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            231
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            دارایی های خود
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            27
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fw-medium mb-2">
                                            سرمایه گذاری املاک
                                        </p>
                                        <h5 class="mb-0 fw-semibold text-dark">
                                            142,465
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
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                اضافه کردن عکس مشتری
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="https://techzaa.in/" class="dropzone" data-plugin="dropzone"
                                  data-previews-container="#file-previews"
                                  data-upload-preview-template="#uploadPreviewTemplate" id="myAwesomeDropzone"
                                  method="post">
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
                                اطلاعات مشتری
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-name">
                                                نام مشتری
                                            </label>
                                            <input class="form-control" id="customer-name"
                                                   placeholder="نام و نام خانوادگی"
                                                   type="text"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-email">
                                                ایمیل مشتری
                                            </label>
                                            <input class="form-control" id="customer-email" placeholder="ایمیل"
                                                   type="email"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-number">
                                                شناسه مشتری
                                            </label>
                                            <input class="form-control" id="customer-number" placeholder="شماره شناسه"
                                                   type="number"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="view-properties">
                                                املاک
                                            </label>
                                            <input class="form-control" id="view-properties" placeholder="املاک"
                                                   type="number"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="own-properties">
                                                اموال
                                            </label>
                                            <input class="form-control" id="own-properties" placeholder="اموال"
                                                   type="number"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form>
                                        <label class="form-label" for="invest-property">
                                            سرمایه گذاری املاک
                                        </label>
                                        <div class="input-group mb-3">
			 <span class="input-group-text fs-20 px-2 py-0">
			  <i class="ri-money-dollar-circle-line">
			  </i>
			 </span>
                                            <input class="form-control" id="invest-property" placeholder="000"
                                                   type="number"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-address">
                                                آدرس مشتری
                                            </label>
                                            <textarea class="form-control" id="customer-address" placeholder="آدرس"
                                                      rows="3"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-zipcode">
                                                کد پستی
                                            </label>
                                            <input class="form-control" id="customer-zipcode" placeholder="کد پستی"
                                                   type="number"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <form>
                                            <label class="form-label" for="choices-city">
                                                شهر
                                            </label>
                                            <select class="form-control" data-choices="" data-choices-groups=""
                                                    data-placeholder="Select City" id="choices-city"
                                                    name="choices-city">
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
                                                        لیون
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
                                                        مونترال
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
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <form>
                                            <label class="form-label" for="choices-country">
                                                کشور
                                            </label>
                                            <select class="form-control" data-choices="" data-choices-groups=""
                                                    data-placeholder="Select Country" id="choices-country"
                                                    name="choices-country">
                                                <option value="">
                                                    انتخاب کشور
                                                </option>
                                                <optgroup label="">
                                                    <option value="United Kingdom">
                                                        انگلستان
                                                    </option>
                                                    <option value="France">
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
                                                        هند
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
                                <div class="col-lg-4">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="facebook-url">
                                                لینک فیسبوک
                                            </label>
                                            <input class="form-control" id="facebook-url" placeholder="لینک"
                                                   type="url"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="instagram-url">
                                                لینک اینستاگرام
                                            </label>
                                            <input class="form-control" id="instagram-url" placeholder="لینک"
                                                   type="url"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter-url">
                                                لینک توییتر
                                            </label>
                                            <input class="form-control" id="twitter-url" placeholder="لینک" type="url"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <form>
                                            <label class="form-label" for="choices-status">
                                                وضعیت
                                            </label>
                                            <select class="form-control" data-choices="" data-choices-groups=""
                                                    data-placeholder="Select status" id="choices-status"
                                                    name="choices-status">
                                                <option value="">
                                                    انتخاب ضعیت
                                                </option>
                                                <optgroup label="">
                                                    <option value="">
                                                        در دسترس
                                                    </option>
                                                    <option value="Fran">
                                                        در دسترس نیست
                                                    </option>
                                                </optgroup>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a class="btn btn-outline-primary w-100" href="#!">
                                    ساخت مشتری
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
        <!-- End Page Content -->
@endsection

@section('scripts')
    {{--           scripts--}}
@endsection
