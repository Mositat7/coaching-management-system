@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- ================= Header ================= --}}
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-semibold mb-1">سلام، محمد 👋</h4>
                        <p class="text-muted mb-0">
                            خوش اومدی به پنل کاربری باشگاه
                        </p>
                    </div>

                    <div class="text-end">
                        <span class="badge bg-success fs-12 mb-1">عضویت فعال</span>
                        <p class="text-muted mb-0 fs-13">
                            ۱۲ روز باقی‌مانده
                        </p>
                    </div>
                </div>
            </div>

            {{-- ================= Stats ================= --}}
            <div class="row g-3 mb-4">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="avatar bg-primary bg-opacity-10 rounded">
                                <i class="ri-calendar-check-line text-primary fs-22 avatar-title"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">برنامه فعال</p>
                                <h5 class="mb-0">حجم عضلانی</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="avatar bg-success bg-opacity-10 rounded">
                                <i class="ri-fire-line text-success fs-22 avatar-title"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">جلسات این هفته</p>
                                <h5 class="mb-0">۴ جلسه</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="avatar bg-warning bg-opacity-10 rounded">
                                <i class="ri-heart-pulse-line text-warning fs-22 avatar-title"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">BMI</p>
                                <h5 class="mb-0">24.1</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="avatar bg-info bg-opacity-10 rounded">
                                <i class="ri-user-star-line text-info fs-22 avatar-title"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">مربی</p>
                                <h5 class="mb-0">احمد رضایی</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ================= Main Content ================= --}}
            <div class="row g-4">

                {{-- برنامه امروز --}}
                <div class="col-xl-8">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">برنامه تمرینی امروز</h5>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th>حرکت</th>
                                        <th>ست</th>
                                        <th>تکرار</th>
                                        <th>استراحت</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>پرس سینه</td>
                                        <td>4</td>
                                        <td>10</td>
                                        <td>90 ثانیه</td>
                                        <td>
                                            <span class="badge bg-success">انجام شد</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>فلای دمبل</td>
                                        <td>3</td>
                                        <td>12</td>
                                        <td>60 ثانیه</td>
                                        <td>
                                            <span class="badge bg-warning">در انتظار</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-outline-primary me-2">
                                <i class="ri-eye-line"></i>
                                مشاهده کامل برنامه
                            </button>
                            <button class="btn btn-primary">
                                <i class="ri-printer-line"></i>
                                چاپ برنامه
                            </button>
                        </div>
                    </div>
                </div>

                {{-- نوتیفیکیشن --}}
                <div class="col-xl-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">اطلاعیه‌ها</h5>
                        </div>

                        <div class="card-body">

                            <div class="alert alert-warning">
                                ⏳ عضویت شما ۷ روز دیگر به پایان می‌رسد
                            </div>

                            <div class="alert alert-info">
                                🆕 برنامه تمرینی جدید برای شما ثبت شد
                            </div>

                            <div class="alert alert-success mb-0">
                                💪 ادامه بده، عالی پیش می‌ری!
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
