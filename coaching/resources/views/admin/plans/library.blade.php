@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            کتابخانه برنامه‌ها
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                کتابخانه
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <!-- آمار و فیلتر -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-primary bg-opacity-10 p-3">
                                        <i class="ri-dumbbell-line text-primary fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">{{ isset($plans) ? $plans->count() : 0 }}</h5>
                                    <p class="text-muted mb-0">برنامه ورزشی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-success bg-opacity-10 p-3">
                                        <i class="ri-restaurant-line text-success fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">{{ isset($nutritionPlans) ? $nutritionPlans->count() : 0 }}</h5>
                                    <p class="text-muted mb-0">برنامه غذایی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-info bg-opacity-10 p-3">
                                        <i class="ri-star-line text-info fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۸</h5>
                                    <p class="text-muted mb-0">پراستفاده</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm rounded-circle bg-warning bg-opacity-10 p-3">
                                        <i class="ri-user-line text-warning fs-20"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">۴۲</h5>
                                    <p class="text-muted mb-0">ارسال شده</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- نوار جستجو و فیلتر -->
            <div class="card border-0 shadow-sm mt-2">
                <div class="card-body py-3 py-md-3">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="ri-search-line text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" placeholder="جستجوی برنامه...">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="ri-filter-line me-1"></i>
                                    فیلتر
                                </button>
                                <select class="form-select form-select-sm w-auto">
                                    <option>همه دسته‌ها</option>
                                    <option>ورزشی</option>
                                    <option>غذایی</option>
                                </select>
                                <select class="form-select form-select-sm w-auto">
                                    <option>مرتب‌سازی: جدیدترین</option>
                                    <option>مرتب‌سازی: پراستفاده</option>
                                    <option>مرتب‌سازی: الفبایی</option>
                                </select>
                                <a href="{{ route('plans.create') }}" class="btn btn-success btn-sm">
                                    <i class="ri-add-line me-1"></i>
                                    برنامه جدید
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success') || request('saved'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success', 'برنامه غذایی با موفقیت ذخیره شد.') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- برنامه‌های ورزشی -->
            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <h5 class="mb-0 fw-semibold">برنامه‌های ورزشی</h5>
                <span class="text-muted small">
                    {{ isset($plans) ? $plans->count() : 0 }} برنامه
                </span>
            </div>

            <div class="row g-3 mt-1">
                @forelse($plans as $plan)
                    @php
                        $dayCount = $plan->days->count();
                        $exerciseCount = $plan->days->sum(fn($d) => $d->exercises->count());
                    @endphp
                    <div class="col-xl-4 col-lg-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <span class="badge rounded-pill bg-primary-subtle text-primary">ورزشی</span>
                                        <span class="badge rounded-pill bg-warning-subtle text-warning ms-1">
                                            {{ $dayCount }} روز
                                        </span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                            <i class="ri-more-2-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('Workouts.edit') }}?plan={{ $plan->id }}">
                                                    <i class="ri-pencil-line me-2"></i>ویرایش
                                                </a>
                                            </li>
                                            
                                            <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <h5 class="card-title mb-2 text-truncate">{{ $plan->name }}</h5>
                                <p class="text-muted mb-3 small">
                                    {{ \Illuminate\Support\Str::limit($plan->description ?? 'بدون توضیح', 120) }}
                                </p>

                                <div class="row g-2 mb-3 small text-muted">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-line me-2"></i>
                                            <span>{{ $dayCount }} روز تمرین</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="ri-dumbbell-line me-2"></i>
                                            <span>{{ $exerciseCount }} تمرین</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div class="small text-muted">
                                        <div>آخرین ویرایش</div>
                                        <div>{{ $plan->updated_at?->format('Y/m/d') }}</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('Workouts.show', ['plan' => $plan->id]) }}" class="btn btn-sm btn-soft-primary">
                                            <i class="ri-eye-line me-1"></i>
                                            مشاهده
                                        </a>
                                        <a href="{{ route('Workouts.edit') }}?plan={{ $plan->id }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ri-pencil-line me-1"></i>
                                            ویرایش
                                        </a>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="ri-send-plane-line me-1"></i>
                                            ارسال
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center text-muted py-4">
                            <i class="ri-dumbbell-line fs-24 mb-2 d-block"></i>
                            برنامه ورزشی ذخیره‌شده‌ای ندارید.
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- برنامه‌های غذایی -->
            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <h5 class="mb-0 fw-semibold">برنامه‌های غذایی</h5>
                <span class="text-muted small">
                    {{ isset($nutritionPlans) ? $nutritionPlans->count() : 0 }} برنامه
                </span>
            </div>

            <div class="row g-3 mt-1">
                @forelse($nutritionPlans ?? [] as $plan)
                    @php
                        $dayCount = $plan->days->count();
                        $mealCount = $plan->days->sum(fn($d) => $d->meals->count());
                    @endphp
                    <div class="col-xl-4 col-lg-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <span class="badge rounded-pill bg-success-subtle text-success">غذایی</span>
                                        <span class="badge rounded-pill bg-warning-subtle text-warning ms-1">
                                            {{ $dayCount }} روز
                                        </span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0" type="button" data-bs-toggle="dropdown">
                                            <i class="ri-more-2-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="ri-send-plane-line me-2"></i>ارسال</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('nutrition.edit', ['plan' => $plan->id]) }}">
                                                    <i class="ri-pencil-line me-2"></i>ویرایش
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <h5 class="card-title mb-2 text-truncate">{{ $plan->name }}</h5>
                                <p class="text-muted mb-3 small">
                                    {{ \Illuminate\Support\Str::limit($plan->description ?? 'بدون توضیح', 120) }}
                                </p>

                                <div class="row g-2 mb-3 small text-muted">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="ri-calendar-line me-2"></i>
                                            <span>{{ $dayCount }} روز</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="ri-restaurant-line me-2"></i>
                                            <span>{{ $mealCount }} وعده</span>
                                        </div>
                                    </div>
                                    @if($plan->daily_calories)
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <i class="ri-fire-line me-2"></i>
                                                <span>{{ number_format($plan->daily_calories) }} کالری/روز</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div class="small text-muted">
                                        <div>آخرین ویرایش</div>
                                        <div>{{ $plan->updated_at?->format('Y/m/d') }}</div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('nutrition.show', ['plan' => $plan->id]) }}" class="btn btn-sm btn-soft-success">
                                            <i class="ri-eye-line me-1"></i>
                                            مشاهده
                                        </a>
                                        <a href="{{ route('nutrition.edit', ['plan' => $plan->id]) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ri-pencil-line me-1"></i>
                                            ویرایش
                                        </a>
                                        <button class="btn btn-sm btn-success">
                                            <i class="ri-send-plane-line me-1"></i>
                                            ارسال
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center text-muted py-4">
                            <i class="ri-restaurant-line fs-24 mb-2 d-block"></i>
                            برنامه غذایی ذخیره‌شده‌ای ندارید.
                        </div>
                    </div>
                @endforelse
            </div>
                          

            <!-- صفحه‌بندی -->
            <div class="row mt-4">
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">قبلی</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">۱</a></li>
                            <li class="page-item"><a class="page-link" href="#">۲</a></li>
                            <li class="page-item"><a class="page-link" href="#">۳</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">بعدی</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- بدون اسکریپت اضافی --}}
@endsection
