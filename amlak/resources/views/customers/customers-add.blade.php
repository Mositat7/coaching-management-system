@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">اضافه کردن عضو</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">مدیریت باشگاه</li>
                            <li class="breadcrumb-item active">ثبت شاگرد جدید</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Profile Card --}}
                <div class="col-xl-3 col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-body p-0">

                            <div class="customer-bg rounded position-relative">
                                <img id="studentAvatar"
                                     src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                     class="avatar-xl border border-light border-3 rounded-circle position-absolute top-100 start-50 translate-middle">
                            </div>

                            <div class="pt-5 px-3 text-center">
                                <h4 class="fw-semibold mb-1">نام شاگرد</h4>
                                <span class="badge bg-success fs-12 mb-3">اشتراک فعال</span>

                                <div class="text-muted fs-14 mt-3 text-start">

                                    <p class="mb-2 d-flex align-items-center gap-2">
        <span class="avatar-xs d-flex align-items-center justify-content-center rounded bg-soft-primary">
            <i class="ri-smartphone-line text-primary fs-16"></i>
        </span>
                                        <strong class="text-dark">موبایل:</strong>
                                        <span>09xxxxxxxx</span>
                                    </p>

                                    <p class="mb-2 d-flex align-items-center gap-2">
        <span class="avatar-xs d-flex align-items-center justify-content-center rounded bg-soft-secondary">
            <i class="ri-id-card-line text-secondary fs-16"></i>
        </span>
                                        <strong class="text-dark">کد عضویت:</strong>
                                        <span>ST-1023</span>
                                    </p>

                                    <p class="mb-3 d-flex align-items-center gap-2">
        <span class="avatar-xs d-flex align-items-center justify-content-center rounded bg-soft-success">
            <img src="{{ asset('assets/images/fit_logo/coch.png') }}"
                 width="18"
                 height="18"
                 alt="coach">
        </span>
                                        <strong class="text-dark">مربی:</strong>
                                        <span class="fw-medium">مربی احمدی</span>
                                    </p>

                                </div>


                                <div class="row text-center border-top pt-3 mt-3">
                                    <div class="col-4">
                                        <p class="mb-1 fw-medium">حضور</p>
                                        <h5 class="fw-semibold">24</h5>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-1 fw-medium">جلسات</p>
                                        <h5 class="fw-semibold">30</h5>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-1 fw-medium">برنامه</p>
                                        <h5 class="fw-semibold text-success">فعال</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- Main Form --}}
                <div class="col-xl-9">

                    {{-- Upload --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">آپلود عکس شاگرد</h4>
                        </div>
                        <div class="card-body text-center">

                            <img id="previewImage"
                                 src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                 class="rounded-circle mb-3"
                                 style="width:120px;height:120px;object-fit:cover;">

                            <input type="file"
                                   class="form-control"
                                   accept="image/*"
                                   onchange="previewAvatar(event)">
                        </div>
                    </div>


                    {{-- Student Info --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">اطلاعات شاگرد</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">

                                <div class="col-lg-6">
                                    <label class="form-label">نام و نام خانوادگی</label>
                                    <input class="form-control" placeholder="علی رضایی">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">شماره موبایل</label>
                                    <input class="form-control" placeholder="09xxxxxxxx">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">قد (cm)</label>
                                    <input class="form-control">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">وزن (kg)</label>
                                    <input class="form-control">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">هدف تمرین</label>
                                    <select class="form-control">
                                        <option>افزایش حجم</option>
                                        <option>کاهش وزن</option>
                                        <option>فیتنس</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">نام کاربری</label>
                                    <input class="form-control">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">رمز عبور</label>
                                    <input type="password" class="form-control">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">نوع اشتراک</label>
                                    <select class="form-control">
                                        <option>۱ ماهه</option>
                                        <option>۳ ماهه</option>
                                        <option>VIP</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">مربی</label>
                                    <select class="form-control">
                                        <option>مربی احمدی</option>
                                        <option>مربی رضایی</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- Actions --}}
                    <div class="row justify-content-end mt-3">
                        <div class="col-lg-2">
                            <button class="btn btn-primary w-100">ثبت شاگرد</button>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-danger w-100">انصراف</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function () {
                document.getElementById('previewImage').src = reader.result;
                document.getElementById('studentAvatar').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

