@extends('layouts.master')

@section('head')
    <style>
        .meal-schedule {
            border-left: 3px solid #10b981;
            padding-left: 15px;
            margin-bottom: 25px;
        }
        .meal-time {
            color: #10b981;
            font-weight: 600;
            font-size: 14px;
        }
        .ingredient-list {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }
        .ingredient-list li {
            padding: 8px 12px;
            margin-bottom: 6px;
            background: rgba(241, 245, 249, 0.5);
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        [data-bs-theme="dark"] .ingredient-list li {
            background: rgba(30, 41, 59, 0.3);
        }
        .calorie-tag {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .nutrition-facts {
            background: linear-gradient(135deg, #f0fdf4 0%, #f8fafc 100%);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        [data-bs-theme="dark"] .nutrition-facts {
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.2) 0%, rgba(30, 41, 59, 0.3) 100%);
            border-color: rgba(34, 197, 94, 0.1);
        }
        .nutrient-bar {
            height: 6px;
            border-radius: 3px;
            background: #e5e7eb;
            margin: 5px 0;
            overflow: hidden;
        }
        .nutrient-fill {
            height: 100%;
            border-radius: 3px;
        }
        .print-hide {
            display: block;
        }
        @media print {
            .print-hide {
                display: none !important;
            }
            .print-show {
                display: block !important;
            }
            .meal-schedule {
                page-break-inside: avoid;
            }
        }
        .badge-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
        .tip-box {
            background: rgba(251, 191, 36, 0.1);
            border-left: 4px solid #f59e0b;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 0 8px 8px 0;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            <i class="ri-restaurant-line me-2"></i>
                            نمایش برنامه غذایی
                        </h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">
                                    <i class="ri-home-4-line"></i>
                                    سیستم مربی‌گری
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('plans.library') }}">
                                    کتابخانه
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ $plan->name ?? 'برنامه غذایی' }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <!-- هدر برنامه -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="avatar-lg bg-success bg-opacity-10 rounded-circle p-3">
                                        <i class="ri-restaurant-fill fs-36 text-success"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-1">{{ $plan->name }}</h2>
                                    <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                        <span class="badge bg-success">فعال</span>
                                        <span class="badge bg-info">تغذیه</span>
                                        @if($plan->goal)
                                            @php
                                                $goalLabels = ['weight_loss' => 'کاهش وزن', 'muscle_gain' => 'افزایش حجم', 'maintenance' => 'نگهداری وزن', 'detox' => 'سم‌زدایی', 'energy' => 'افزایش انرژی', 'health' => 'سلامت عمومی'];
                                            @endphp
                                            <span class="badge bg-secondary">{{ $goalLabels[$plan->goal] ?? $plan->goal }}</span>
                                        @endif
                                        @if($plan->level)
                                            @php $levelLabels = ['beginner' => 'مبتدی', 'intermediate' => 'متوسط', 'advanced' => 'پیشرفته']; @endphp
                                            <span class="badge bg-warning text-dark">{{ $levelLabels[$plan->level] ?? $plan->level }}</span>
                                        @endif
                                        @if($plan->duration_days)
                                            <span class="badge bg-warning">{{ $plan->duration_days }} روز</span>
                                        @endif
                                        @if($plan->daily_calories)
                                            <span class="badge bg-primary badge-pulse">{{ number_format($plan->daily_calories) }} کالری/روز</span>
                                        @endif
                                    </div>
                                    <p class="text-muted mb-0">
                                        {{ $plan->description ?: 'بدون توضیح' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3 mt-lg-0">
                            <div class="d-flex flex-wrap gap-2 justify-content-lg-end print-hide">
                                <button class="btn btn-primary" onclick="window.print()">
                                    <i class="ri-printer-line me-1"></i>
                                    چاپ برنامه
                                </button>
                                <a href="#" class="btn btn-success">
                                    <i class="ri-calendar-line me-1"></i>
                                    افزودن به تقویم
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="ri-download-line me-2"></i>دانلود PDF</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-share-line me-2"></i>اشتراک‌گذاری</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2"></i>کپی برنامه</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('nutrition.edit', ['plan' => $plan->id]) }}"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- سایدبار اطلاعات -->
                <div class="col-xl-3 col-lg-4">
                    <!-- خلاصه تغذیه (براساس داده ذخیره‌شده) -->
                    @php
                        $totalMeals = $plan->days->sum(fn($d) => $d->meals->count());
                        $totalDays = $plan->days->count() ?: 1;
                        $dayCalories = $plan->daily_calories ?? $plan->days->sum(fn($d) => $d->meals->sum('calories'));
                        $totalCalories = $plan->duration_days ? (($plan->daily_calories ?? 0) * $plan->duration_days) : $plan->days->sum(fn($d) => $d->meals->sum('calories'));
                    @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-file-info-line me-2"></i>
                                خلاصه برنامه
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="d-inline-block position-relative">
                                    <div class="calorie-circle">
                                        <span class="fs-24 fw-bold text-success">{{ number_format($plan->daily_calories ?? $dayCalories) }}</span>
                                        <small class="text-muted">کالری/روز</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="fw-bold text-primary">{{ $totalMeals }}</div>
                                    <small class="text-muted">وعده</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-success">{{ $plan->duration_days ?? $totalDays }}</div>
                                    <small class="text-muted">روز</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-warning">{{ number_format($totalCalories) }}</div>
                                    <small class="text-muted">کل کالری</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات تغذیه‌ای (جمع‌شده از مواد ذخیره‌شده) -->
                    @php
                        $totP = 0; $totC = 0; $totF = 0; $totKcal = 0;
                        foreach ($plan->days as $day) {
                            foreach ($day->meals as $meal) {
                                foreach ($meal->items_json ?? [] as $it) {
                                    if (is_array($it)) {
                                        $totP += (float)($it['protein'] ?? 0);
                                        $totC += (float)($it['carbs'] ?? 0);
                                        $totF += (float)($it['fat'] ?? 0);
                                        $totKcal += (float)($it['calories'] ?? 0);
                                    }
                                }
                            }
                        }
                        $macroTotal = $totP + $totC + $totF;
                        $pctP = $macroTotal > 0 ? round(100 * $totP / $macroTotal) : 33;
                        $pctC = $macroTotal > 0 ? round(100 * $totC / $macroTotal) : 34;
                        $pctF = $macroTotal > 0 ? round(100 * $totF / $macroTotal) : 33;
                    @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-heart-pulse-line me-2"></i>
                                اطلاعات تغذیه‌ای
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="nutrition-facts">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">پروتئین</span>
                                        <span class="small fw-medium">{{ $pctP }}٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-primary" style="width: {{ min(100, $pctP) }}%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">کربوهیدرات</span>
                                        <span class="small fw-medium">{{ $pctC }}٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-success" style="width: {{ min(100, $pctC) }}%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">چربی</span>
                                        <span class="small fw-medium">{{ $pctF }}٪</span>
                                    </div>
                                    <div class="nutrient-bar">
                                        <div class="nutrient-fill bg-warning" style="width: {{ min(100, $pctF) }}%"></div>
                                    </div>
                                </div>
                                <div class="mt-3 pt-3 border-top">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="fw-bold">{{ number_format($totP) }}g</div>
                                            <small class="text-muted">پروتئین</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold">{{ number_format($totC) }}g</div>
                                            <small class="text-muted">کربوهیدرات</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="fw-bold">{{ number_format($totF) }}g</div>
                                            <small class="text-muted">چربی</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- نکات مهم (از فیلد notes برنامه) -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-lightbulb-flash-line me-2"></i>
                                نکات مهم
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($plan->notes)
                                @foreach(array_filter(preg_split('/\r\n|\n|\r/', $plan->notes)) as $line)
                                    <div class="tip-box">
                                        <i class="ri-information-line me-2"></i>
                                        {{ trim($line) }}
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted small mb-0">نکته‌ای ثبت نشده است.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- تب‌های روزانه (داینامیک از برنامه ذخیره‌شده) -->
                    <div class="card">
                        @if($plan->days->isNotEmpty())
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="daysTabs" role="tablist">
                                    @foreach($plan->days as $dIndex => $day)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link {{ $dIndex === 0 ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#day{{ $dIndex }}" type="button">
                                                {{ $day->title ?: ('روز ' . ($dIndex + 1)) }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="daysTabsContent">
                                    @foreach($plan->days as $dIndex => $day)
                                        @php $dayCal = $day->meals->sum('calories'); @endphp
                                        <div class="tab-pane fade {{ $dIndex === 0 ? 'show active' : '' }}" id="day{{ $dIndex }}" role="tabpanel">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">برنامه غذایی {{ $day->title ?: ('روز ' . ($dIndex + 1)) }}</h5>
                                                <span class="badge bg-success">مجموع کالری: {{ number_format($dayCal) }}</span>
                                            </div>

                                            @foreach($day->meals as $meal)
                                                @php $items = $meal->items_json ?? []; @endphp
                                                <div class="meal-schedule">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h6 class="mb-0">
                                                            <i class="ri-restaurant-2-line me-2 text-primary"></i>
                                                            {{ $meal->name }}
                                                        </h6>
                                                        <div>
                                                            @if($meal->time_text)
                                                                <span class="meal-time me-2">{{ $meal->time_text }}</span>
                                                            @endif
                                                            <span class="calorie-tag">{{ number_format($meal->calories ?? 0) }} کالری</span>
                                                        </div>
                                                    </div>
                                                    @if($meal->description)
                                                        <p class="text-muted mb-2">{{ $meal->description }}</p>
                                                    @endif

                                                    @if(!empty($items))
                                                        <ul class="ingredient-list">
                                                            @foreach($items as $item)
                                                                @php
                                                                    $name = is_array($item) ? ($item['name'] ?? '') : (string) $item;
                                                                    $weight = is_array($item) ? ($item['weight'] ?? null) : null;
                                                                    $cal = is_array($item) ? ($item['calories'] ?? null) : null;
                                                                    $p = is_array($item) ? ($item['protein'] ?? null) : null;
                                                                    $c = is_array($item) ? ($item['carbs'] ?? null) : null;
                                                                    $f = is_array($item) ? ($item['fat'] ?? null) : null;
                                                                @endphp
                                                                <li>
                                                                    <div>
                                                                        <span class="fw-medium">{{ $name }}</span>
                                                                        @if($weight !== null && $weight !== '')
                                                                            <small class="text-muted ms-2">{{ number_format((float) $weight) }} گرم</small>
                                                                        @endif
                                                                    </div>
                                                                    <div class="text-end">
                                                                        @if($cal !== null && $cal !== '')
                                                                            <span class="calorie-tag">{{ number_format((float) $cal) }} کالری</span>
                                                                        @endif
                                                                        @if($p !== null || $c !== null || $f !== null)
                                                                            <div class="text-muted small mt-1">{{ $p ?? 0 }}P • {{ $c ?? 0 }}C • {{ $f ?? 0 }}F</div>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-muted small mb-0">مواد این وعده ثبت نشده است.</p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="text-center text-muted py-5">
                                    <i class="ri-restaurant-line fs-32 mb-2 d-block"></i>
                                    هنوز روز یا وعده‌ای برای این برنامه تعریف نشده است.
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- مواد مجاز / ممنوع و مکمل‌ها (از داده ذخیره‌شده) -->
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-list-check me-2"></i>
                                        مواد غذایی مجاز / مکمل‌ها
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if(!empty($plan->supplements))
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach((array) $plan->supplements as $s)
                                                <span class="badge bg-primary">{{ is_string($s) ? $s : '' }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted small mb-0">ثبت نشده است.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-forbid-line me-2"></i>
                                        مواد غذایی ممنوع
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @if(!empty($plan->restrictions))
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach((array) $plan->restrictions as $r)
                                                <span class="badge bg-danger">{{ is_string($r) ? $r : '' }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted small mb-0">ثبت نشده است.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات مربی -->
                    <div class="card mt-3 print-hide">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                         class="rounded-circle" width="64" height="64" alt="مربی تغذیه">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">طراحی شده توسط: مربی تغذیه</h6>
                                    <p class="text-muted mb-0">
                                        <i class="ri-mail-line me-1"></i>
                                        nutrition@coach.com
                                        <i class="ri-phone-line ms-3 me-1"></i>
                                        ۰۹۱۲۳۴۵۶۷۸۹
                                    </p>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="ri-calendar-line me-1"></i>
                                            آخرین به‌روزرسانی: {{ $plan->updated_at?->format('Y/m/d') }}
                                        </small>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <button class="btn btn-outline-primary">
                                        <i class="ri-message-3-line me-1"></i>
                                        سوال از مربی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // علامت‌گذاری وعده‌های تکمیل شده
        document.querySelectorAll('.meal-schedule').forEach((meal, index) => {
            const checkBtn = meal.querySelector('button');
            if (checkBtn) {
                checkBtn.addEventListener('click', function() {
                    const isCompleted = this.classList.contains('btn-success');
                    this.classList.toggle('btn-success', !isCompleted);
                    this.classList.toggle('btn-outline-primary', isCompleted);

                    const icon = this.querySelector('i');
                    icon.classList.toggle('ri-check-double-line', !isCompleted);
                    icon.classList.toggle('ri-check-line', isCompleted);

                    const text = isCompleted ? 'تکمیل شده' : 'تأیید تکمیل';
                    this.innerHTML = `<i class="${isCompleted ? 'ri-check-double-line' : 'ri-check-line'} me-1"></i>${text}`;

                    // نمایش پیام
                    const mealName = meal.querySelector('h6').textContent.trim();
                    const message = isCompleted ? `وعده ${mealName} تکمیل نشد` : `وعده ${mealName} با موفقیت تکمیل شد`;
                    showToast(message, isCompleted ? 'warning' : 'success');
                });
            }
        });

        // نمایش نوتیفیکیشن
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
            toast.style.zIndex = '9999';
            toast.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // فعال‌سازی پرینت
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                e.preventDefault();
                window.print();
            }
        });

        // نشانگر پیشرفت روز
        const today = new Date().getDay(); // 0-6
        const dayTabs = document.querySelectorAll('#daysTabs .nav-link');
        if (dayTabs[today]) {
            dayTabs[today].classList.add('active');
            dayTabs[today].click();
        }
    </script>
@endsection
