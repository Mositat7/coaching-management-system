@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">اضافه کردن مربی جدید</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">مدیریت مربیان</a></li>
                            <li class="breadcrumb-item active">مربی جدید</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Left Sidebar --}}
                <div class="col-xl-4 col-lg-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="{{ asset('assets/images/users/coach-default.jpg') }}"
                                     class="rounded-circle border border-3 border-primary"
                                     id="previewAvatar"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5>مربی جدید</h5>
                            <p class="text-muted">اطلاعات پس از ثبت نمایش داده می‌شود</p>

                            <div class="mt-4">
                                <p><strong>کد مربی:</strong> CO-001</p>
                                <p><strong>وضعیت:</strong> <span class="badge bg-success">فعال</span></p>
                                <p><strong>حق مربی:</strong> ۲۵٪</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Form --}}
                <div class="col-xl-8 col-lg-7">
                    {{-- Photo Upload --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">عکس پروفایل مربی</h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="{{ asset('assets/images/users/coach-default.jpg') }}"
                                     class="rounded-circle border border-3 border-light"
                                     id="avatarPreview"
                                     style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <input type="file" class="form-control" id="avatarInput" accept="image/*">
                            <small class="text-muted">فرمت‌های مجاز: JPG, PNG</small>
                        </div>
                    </div>

                    {{-- بقیه فرم (همان کد قبلی) --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">اطلاعات پایه</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control" placeholder="محمد احمدی">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">شماره موبایل</label>
                                        <input type="tel" class="form-control" placeholder="09xxxxxxxxx">
                                    </div>
                                </div>
                                {{-- بقیه فیلدها --}}
                            </div>
                        </div>
                    </div>
                    {{-- بعد از کارت "اطلاعات پایه" --}}

{{-- Coach Description --}}
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="ri-file-text-line align-middle me-2"></i>
            توضیحات مربی
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">بیوگرافی و سوابق</label>
                    <textarea class="form-control" rows="4" placeholder="تجربیات کاری، مدارک، افتخارات، سبک تمرین..."></textarea>
                    <small class="text-muted">این توضیحات در پروفایل مربی نمایش داده می‌شود.</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">مدارک و گواهینامه‌ها</label>
                    <textarea class="form-control" rows="2" placeholder="مدرک بدنسازی، CPR، تغذیه ورزشی..."></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">سابقه کاری (سال)</label>
                    <input type="number" class="form-control" placeholder="5">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">تخصص‌های ویژه</label>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">آسیب‌شناسی ورزشی</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">تمرین بانوان</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">تمرین سالمندان</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">رژیم‌شناسی</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">روش تمرین</label>
                    <div class="border rounded p-3 bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="training_style" checked>
                                    <label class="form-check-label">سخت‌گیرانه</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="training_style">
                                    <label class="form-check-label">متوسط</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="training_style">
                                    <label class="form-check-label">ملایم</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    {{-- Actions --}}
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-3">
                            <button class="btn btn-primary w-100">
                                <i class="ri-save-line me-1"></i> ثبت مربی
                            </button>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" class="btn btn-light w-100">
                                <i class="ri-close-line me-1"></i> انصراف
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // پیش‌نمایش عکس
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // به روزرسانی عکس در فرم
                document.getElementById('avatarPreview').src = e.target.result;
                // به روزرسانی عکس در پیش‌نمایش سمت چپ
                document.getElementById('previewAvatar').src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    });
</script>

<style>
.rounded-circle {
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.2s;
}

.rounded-circle:hover {
    transform: scale(1.05);
}
</style>
@endsection
