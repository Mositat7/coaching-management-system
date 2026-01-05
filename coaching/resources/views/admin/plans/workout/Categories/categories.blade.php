@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Header --}}
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-semibold mb-1">مدیریت دسته‌بندی تمرین‌ها</h4>
                        <p class="text-muted mb-0">
                            تعریف عضلات، زیرمجموعه‌ها و حرکات تمرینی
                        </p>
                    </div>
                    <button class="btn btn-primary">
                        <i class="ri-add-line me-1"></i>
                        افزودن عضله جدید
                    </button>
                </div>
            </div>

            <div class="row g-4">

                {{-- =================== عضله: بازو =================== --}}
                <div class="col-xl-4 col-lg-6">
                    <div class="card h-100">

                        {{-- Card Header --}}
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar bg-primary bg-opacity-10 rounded">
                                    <i class="ri-armchair-line text-primary fs-22 avatar-title"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold">بازو</h5>
                            </div>
                            <div class="dropdown">
                                <a class="text-muted" data-bs-toggle="dropdown" href="#">
                                    <i class="ri-more-2-fill fs-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">ویرایش</a>
                                    <a class="dropdown-item text-danger" href="#">حذف</a>
                                </div>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">

                            <div class="accordion" id="accordion-arm">

                                {{-- زیرمجموعه: جلو بازو --}}
                                <div class="accordion-item mb-2 border rounded">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-medium"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#biceps-front">
                                            جلو بازو
                                        </button>
                                    </h2>
                                    <div id="biceps-front" class="accordion-collapse collapse">
                                        <div class="accordion-body">

                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    جلو بازو هالتر
                                                    <button class="btn btn-sm btn-soft-danger">
                                                        <i class="ri-delete-bin-6-line"></i>
                                                    </button>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    جلو بازو لاری
                                                    <button class="btn btn-sm btn-soft-danger">
                                                        <i class="ri-delete-bin-6-line"></i>
                                                    </button>
                                                </li>
                                            </ul>

                                            <button class="btn btn-sm btn-outline-primary w-100">
                                                <i class="ri-add-line"></i>
                                                افزودن تمرین
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- زیرمجموعه: پشت بازو --}}
                                <div class="accordion-item mb-2 border rounded">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-medium"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#biceps-back">
                                            پشت بازو
                                        </button>
                                    </h2>
                                    <div id="biceps-back" class="accordion-collapse collapse">
                                        <div class="accordion-body">

                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    پشت بازو سیم‌کش
                                                    <button class="btn btn-sm btn-soft-danger">
                                                        <i class="ri-delete-bin-6-line"></i>
                                                    </button>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    دیپ پشت بازو
                                                    <button class="btn btn-sm btn-soft-danger">
                                                        <i class="ri-delete-bin-6-line"></i>
                                                    </button>
                                                </li>
                                            </ul>

                                            <button class="btn btn-sm btn-outline-primary w-100">
                                                <i class="ri-add-line"></i>
                                                افزودن تمرین
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-outline-success w-100 mt-3">
                                <i class="ri-add-circle-line"></i>
                                افزودن زیرمجموعه جدید
                            </button>

                        </div>
                    </div>
                </div>

                {{-- =================== عضله: پا =================== --}}
                <div class="col-xl-4 col-lg-6">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar bg-success bg-opacity-10 rounded">
                                    <i class="ri-walk-line text-success fs-22 avatar-title"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold">پا</h5>
                            </div>
                            <i class="ri-more-2-fill fs-18 text-muted"></i>
                        </div>

                        <div class="card-body">
                            <p class="text-muted text-center mb-4">
                                هنوز زیرمجموعه‌ای اضافه نشده
                            </p>

                            <button class="btn btn-outline-success w-100">
                                <i class="ri-add-circle-line"></i>
                                افزودن زیرمجموعه
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
