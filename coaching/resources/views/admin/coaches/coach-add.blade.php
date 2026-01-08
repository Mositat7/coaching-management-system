@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ri-check-line me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if($errors->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ $errors->first('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">اضافه کردن مربی جدید</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="#">مدیریت مربیان</a></li>
                            <li class="breadcrumb-item active">مربی جدید</li>
                        </ol>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('Coach.store') }}" enctype="multipart/form-data" id="coachForm">
                @csrf

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
                                    <p><strong>کد مربی:</strong> <span id="coachCode">{{ $nextCode ?? 'CO-0001' }}</span></p>
                                    <p><strong>وضعیت:</strong> 
                                        <span class="badge bg-success" id="statusBadge">فعال</span>
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Form --}}
                <div class="col-xl-8 col-lg-7">
                    {{-- Photo Upload --}}
                    <div class="card mb-3">
                        <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-image-line align-middle me-2"></i>
                                    عکس پروفایل مربی
                                </h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="{{ asset('assets/images/users/coach-default.jpg') }}"
                                     class="rounded-circle border border-3 border-light"
                                     id="avatarPreview"
                                     style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                                <input type="file" 
                                       class="form-control @error('avatar') is-invalid @enderror" 
                                       id="avatarInput" 
                                       name="avatar"
                                       accept="image/jpeg,image/png,image/jpg">
                                @error('avatar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted d-block mt-2">فرمت‌های مجاز: JPG, PNG (حداکثر 2 مگابایت)</small>
                            </div>
                    </div>

                        {{-- Basic Information --}}
                    <div class="card mb-3">
                        <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="ri-user-line align-middle me-2"></i>
                                    اطلاعات پایه
                                </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                            <label class="form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('full_name') is-invalid @enderror" 
                                                   name="full_name"
                                                   value="{{ old('full_name') }}"
                                                   placeholder="محمد احمدی"
                                                   required>
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">شماره موبایل <span class="text-danger">*</span></label>
                                            <input type="tel" 
                                                   class="form-control @error('mobile') is-invalid @enderror" 
                                                   name="mobile"
                                                   value="{{ old('mobile') }}"
                                                   placeholder="09123456789"
                                                   pattern="09[0-9]{9}"
                                                   maxlength="11"
                                                   dir="ltr"
                                                   required>
                                            @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">وضعیت <span class="text-danger">*</span></label>
                                            <select class="form-select @error('status') is-invalid @enderror" 
                                                    name="status" 
                                                    id="statusSelect"
                                                    required>
                                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>فعال</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
                                                <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>تعلیق شده</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                            <label class="form-label">سابقه کاری (سال)</label>
                                            <input type="number" 
                                                   class="form-control @error('experience_years') is-invalid @enderror" 
                                                   name="experience_years"
                                                   value="{{ old('experience_years') }}"
                                                   placeholder="5"
                                                   min="0"
                                                   max="50">
                                            @error('experience_years')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <textarea class="form-control @error('biography') is-invalid @enderror" 
                                                      name="biography"
                                                      rows="4" 
                                                      placeholder="تجربیات کاری، مدارک، افتخارات، سبک تمرین...">{{ old('biography') }}</textarea>
                                            @error('biography')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                    <small class="text-muted">این توضیحات در پروفایل مربی نمایش داده می‌شود.</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">مدارک و گواهینامه‌ها</label>
                                            <textarea class="form-control @error('certificates') is-invalid @enderror" 
                                                      name="certificates"
                                                      rows="2" 
                                                      placeholder="مدرک بدنسازی، CPR، تغذیه ورزشی...">{{ old('certificates') }}</textarea>
                                            @error('certificates')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                                            <label class="form-label">روش تمرین <span class="text-danger">*</span></label>
                                            <div class="border rounded p-3 bg-light">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" 
                                                                   type="radio" 
                                                                   name="training_style" 
                                                                   id="training_strict"
                                                                   value="strict"
                                                                   {{ old('training_style', 'moderate') == 'strict' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="training_strict">سخت‌گیرانه</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" 
                                                                   type="radio" 
                                                                   name="training_style" 
                                                                   id="training_moderate"
                                                                   value="moderate"
                                                                   {{ old('training_style', 'moderate') == 'moderate' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="training_moderate">متوسط</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" 
                                                                   type="radio" 
                                                                   name="training_style" 
                                                                   id="training_gentle"
                                                                   value="gentle"
                                                                   {{ old('training_style') == 'gentle' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="training_gentle">ملایم</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('training_style')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">تخصص‌های ویژه</label>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               name="specializations[]" 
                                                               id="spec_sports_injury"
                                                               value="آسیب‌شناسی ورزشی"
                                                               {{ in_array('آسیب‌شناسی ورزشی', old('specializations', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="spec_sports_injury">آسیب‌شناسی ورزشی</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               name="specializations[]" 
                                                               id="spec_women"
                                                               value="تمرین بانوان"
                                                               {{ in_array('تمرین بانوان', old('specializations', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="spec_women">تمرین بانوان</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               name="specializations[]" 
                                                               id="spec_elderly"
                                                               value="تمرین سالمندان"
                                                               {{ in_array('تمرین سالمندان', old('specializations', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="spec_elderly">تمرین سالمندان</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-check mb-2">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               name="specializations[]" 
                                                               id="spec_nutrition"
                                                               value="رژیم‌شناسی"
                                                               {{ in_array('رژیم‌شناسی', old('specializations', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="spec_nutrition">رژیم‌شناسی</label>
                            </div>
                        </div>
                    </div>
                                            @error('specializations')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>

                    {{-- Actions --}}
                        <div class="row justify-content-end g-2 mb-4">
                        <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary w-100">
                                <i class="ri-save-line me-1"></i> ثبت مربی
                            </button>
                        </div>
                        <div class="col-lg-3">
                                <a href="{{ route('dashboard.index') }}" class="btn btn-light w-100">
                                <i class="ri-close-line me-1"></i> انصراف
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatarInput');
        const avatarPreview = document.getElementById('avatarPreview');
        const previewAvatar = document.getElementById('previewAvatar');
        const statusSelect = document.getElementById('statusSelect');
        const statusBadge = document.getElementById('statusBadge');

    // پیش‌نمایش عکس
        avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
                // بررسی حجم فایل
                if (file.size > 2 * 1024 * 1024) {
                    alert('حجم فایل نباید بیشتر از 2 مگابایت باشد.');
                    this.value = '';
                    return;
                }

            const reader = new FileReader();
            reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                    previewAvatar.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // تغییر وضعیت badge
        statusSelect.addEventListener('change', function() {
            const status = this.value;
            statusBadge.textContent = status === 'active' ? 'فعال' : 
                                     status === 'inactive' ? 'غیرفعال' : 'تعلیق شده';
            statusBadge.className = 'badge ' + 
                (status === 'active' ? 'bg-success' : 
                 status === 'inactive' ? 'bg-secondary' : 'bg-danger');
        });

        // فرمت شماره موبایل
        const mobileInput = document.querySelector('input[name="mobile"]');
        if (mobileInput) {
            mobileInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 0 && !value.startsWith('0')) {
                    value = '0' + value;
                }
                if (value.length > 11) {
                    value = value.substring(0, 11);
                }
                this.value = value;
            });
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

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
</style>
@endsection
