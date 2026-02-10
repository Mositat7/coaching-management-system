@extends('layouts.master')

@section('head')
    <style>
        .exercise-card {
            border-left: 3px solid #3b82f6;
            padding: 20px;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 0 12px 12px 0;
            backdrop-filter: blur(10px);
        }
        [data-bs-theme="dark"] .exercise-card {
            background: rgba(30, 41, 59, 0.5);
            border-left-color: #60a5fa;
        }
        .set-row {
            background: rgba(241, 245, 249, 0.5);
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
        }
        [data-bs-theme="dark"] .set-row {
            background: rgba(30, 41, 59, 0.3);
        }
        .set-number {
            width: 32px;
            height: 32px;
            background: #3b82f6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        .muscle-group-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        .difficulty-badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
        }
        .difficulty-easy {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .difficulty-medium {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        .difficulty-hard {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        .progress-ring {
            width: 80px;
            height: 80px;
            position: relative;
        }
        .progress-ring-circle {
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
        .timer-display {
            font-family: monospace;
            font-size: 24px;
            font-weight: bold;
            color: #3b82f6;
        }
        .equipment-badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        @media print {
            .print-hide {
                display: none !important;
            }
            .exercise-card {
                page-break-inside: avoid;
                border: 1px solid #ddd;
            }
        }
        .video-thumbnail {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .video-thumbnail:hover {
            transform: scale(1.02);
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
                            <i class="ri-dumbbell-line me-2"></i>
                            نمایش برنامه ورزشی
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
                                {{ $plan->name }}
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
                                    <div class="avatar-lg bg-primary bg-opacity-10 rounded-circle p-3">
                                        <i class="ri-dumbbell-fill fs-36 text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-1">{{ $plan->name }}</h2>
                                    @php
                                        $dayCount = $plan->days->count();
                                        $exerciseCount = $plan->days->sum(fn($d) => $d->exercises->count());
                                        $totalSets = $plan->days->sum(fn($d) => $d->exercises->sum('sets_count'));
                                        $avgMinutes = $plan->days->avg('duration_minutes');
                                        $levelLabel = match($plan->level ?? 'medium') { 'easy' => 'آسان', 'hard' => 'سخت', default => 'متوسط' };
                                    @endphp
                                    <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                        <span class="badge bg-primary">فعال</span>
                                        <span class="badge bg-warning">{{ $plan->weeks_count ?? 4 }} هفته</span>
                                        <span class="badge bg-success">سطح {{ $levelLabel }}</span>
                                        <span class="badge bg-info">{{ $exerciseCount }} تمرین</span>
                                        <span class="badge bg-danger">{{ (int) $avgMinutes }} دقیقه</span>
                                    </div>
                                    <p class="text-muted mb-0">
                                        {{ $plan->description ?? 'بدون توضیح' }}
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
                                <a href="#" class="btn btn-success" onclick="startWorkoutTimer()">
                                    <i class="ri-timer-line me-1"></i>
                                    شروع تمرین
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
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-line me-2"></i>ویرایش</a></li>
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
                    <!-- خلاصه برنامه -->
                    @php
                        $summaryDayCount = $plan->days->count();
                        $summaryExCount = $plan->days->sum(fn($d) => $d->exercises->count());
                        $summarySets = $plan->days->sum(fn($d) => $d->exercises->sum('sets_count'));
                        $summaryMinutes = (int) $plan->days->avg('duration_minutes');
                    @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-file-info-line me-2"></i>
                                خلاصه برنامه
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center mb-3">
                                <div class="col-6">
                                    <div class="fw-bold text-primary">{{ $plan->weeks_count ?? 4 }}</div>
                                    <small class="text-muted">هفته</small>
                                </div>
                                <div class="col-6">
                                    <div class="fw-bold text-success">{{ $summaryDayCount }}</div>
                                    <small class="text-muted">روز/هفته</small>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="fw-bold text-warning">{{ $summaryExCount }}</div>
                                    <small class="text-muted">تمرین</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-danger">{{ $summarySets }}</div>
                                    <small class="text-muted">ست کل</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold text-info">{{ $summaryMinutes }}</div>
                                    <small class="text-muted">دقیقه</small>
                                </div>
                            </div>
                            @if(!empty($plan->estimated_calories))
                                <div class="text-center mt-2 pt-2 border-top">
                                    <div class="fw-bold text-secondary">{{ $plan->estimated_calories }}</div>
                                    <small class="text-muted">کالری تخمینی</small>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- تایمر تمرین -->
                    <div class="card mb-3 print-hide">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-timer-line me-2"></i>
                                تایمر تمرین
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="timer-display" id="workout-timer">۶۰:۰۰</div>
                                <small class="text-muted">زمان باقی‌مانده</small>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary w-100" onclick="startWorkoutTimer()">
                                    <i class="ri-play-line me-1"></i>
                                    شروع
                                </button>
                                <button class="btn btn-outline-warning w-100" onclick="pauseWorkoutTimer()">
                                    <i class="ri-pause-line me-1"></i>
                                    توقف
                                </button>
                                <button class="btn btn-outline-danger w-100" onclick="resetWorkoutTimer()">
                                    <i class="ri-restart-line me-1"></i>
                                    ریست
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- تجهیزات مورد نیاز -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-tools-line me-2"></i>
                                تجهیزات مورد نیاز
                            </h5>
                        </div>
                        <div class="card-body">
                            @php
                                $equipmentList = $plan->equipment
                                    ? array_filter(array_map('trim', preg_split('/[\s،,]+/u', $plan->equipment)))
                                    : [];
                            @endphp
                            <div class="d-flex flex-wrap gap-2">
                                @forelse($equipmentList as $eq)
                                    <span class="equipment-badge">{{ $eq }}</span>
                                @empty
                                    <span class="text-muted small">تعیین نشده</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- نکات ایمنی -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="ri-alert-line me-2"></i>
                                نکات ایمنی
                            </h5>
                        </div>
                        <div class="card-body">
                            @php
                                $safetyLines = $plan->safety_notes
                                    ? array_filter(array_map('trim', explode("\n", $plan->safety_notes)))
                                    : [
                                        'قبل از تمرین حتماً گرم کنید',
                                        'در صورت احساس درد تمرین را متوقف کنید',
                                        'فرم صحیح حرکات را رعایت کنید',
                                    ];
                            @endphp
                            @foreach($safetyLines as $line)
                                <div class="alert alert-warning bg-warning bg-opacity-10 border-warning border-opacity-25 mb-2">
                                    <i class="ri-information-line me-2"></i>
                                    <small>{{ $line }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- تب‌های روزانه -->
                    <div class="card mb-3">
                        @if($plan->days->isNotEmpty())
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="workoutDaysTabs" role="tablist">
                                @foreach($plan->days as $dayIndex => $day)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $dayIndex === 0 ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#day-{{ $day->id }}" type="button">
                                            <i class="ri-calendar-2-line me-1"></i>
                                            روز {{ $dayIndex + 1 }} @if($day->title || $day->focus)({{ $day->title ?? $day->focus }})@endif
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="workoutDaysTabsContent">
                                @foreach($plan->days as $dayIndex => $day)
                                    @php
                                        $diffClass = match($day->difficulty ?? 'medium') { 'easy' => 'difficulty-easy', 'hard' => 'difficulty-hard', default => 'difficulty-medium' };
                                        $diffLabel = match($day->difficulty ?? 'medium') { 'easy' => 'آسان', 'hard' => 'سخت', default => 'متوسط' };
                                    @endphp
                                    <div class="tab-pane fade {{ $dayIndex === 0 ? 'show active' : '' }}" id="day-{{ $day->id }}" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <h5 class="mb-1">روز {{ $dayIndex + 1 }}: {{ $day->title ?? $day->focus ?? 'تمرین' }}</h5>
                                                <p class="text-muted mb-0">
                                                    <i class="ri-time-line me-1"></i>
                                                    زمان تخمینی: {{ $day->duration_minutes ?? 60 }} دقیقه
                                                    @if(!empty($plan->estimated_calories))
                                                        <i class="ri-fire-line ms-3 me-1"></i>
                                                        کالری تخمینی: {{ $plan->estimated_calories }}
                                                    @endif
                                                </p>
                                            </div>
                                            <button class="btn btn-success print-hide" onclick="completeDay({{ $day->id }})">
                                                <i class="ri-check-double-line me-1"></i>
                                                تکمیل روز
                                            </button>
                                        </div>

                                        @foreach($day->exercises as $exIndex => $ex)
                                            <div class="exercise-card">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="mb-1">
                                                            <i class="ri-basketball-line me-2"></i>
                                                            {{ $ex->display_name }}
                                                        </h6>
                                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                                            <span class="difficulty-badge {{ $diffClass }}">{{ $diffLabel }}</span>
                                                            <span class="badge bg-light text-dark"><i class="ri-repeat-line me-1"></i>{{ $ex->sets_count }} ست</span>
                                                            @if($ex->reps_text)
                                                                <span class="badge bg-light text-dark"><i class="ri-refresh-line me-1"></i>{{ $ex->reps_text }} تکرار</span>
                                                            @endif
                                                            @if($ex->rest_seconds)
                                                                <span class="badge bg-light text-dark"><i class="ri-time-line me-1"></i>{{ $ex->rest_seconds }} ثانیه استراحت</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-primary print-hide" onclick="toggleVideo({{ $ex->id }})">
                                                        <i class="ri-play-circle-line me-1"></i>
                                                        ویدیو
                                                    </button>
                                                </div>
                                                @if($ex->notes)
                                                    <p class="text-muted mb-3">{{ $ex->notes }}</p>
                                                @endif
                                                <div class="row">
                                                    @for($s = 1; $s <= $ex->sets_count; $s++)
                                                        <div class="col-md-6">
                                                            <div class="set-row">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <div class="set-number">{{ $s }}</div>
                                                                    <div class="ms-3">
                                                                        <div class="fw-medium">ست {{ $s }}</div>
                                                                        @if($ex->reps_text)
                                                                            <small class="text-muted">{{ $ex->reps_text }} تکرار</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                                <div class="mt-3 print-hide">
                                                    <button class="btn btn-sm btn-outline-success w-100" onclick="logSet({{ $ex->id }})">
                                                        <i class="ri-check-line me-1"></i>
                                                        ثبت ست انجام شده
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if($day->exercises->isEmpty())
                                            <div class="text-center py-4 text-muted">
                                                <i class="ri-dumbbell-line fs-32 d-block mb-2"></i>
                                                تمرینی برای این روز تعریف نشده است.
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="text-center py-5 text-muted">
                                <i class="ri-calendar-line fs-32 d-block mb-2"></i>
                                هنوز روزی برای این برنامه تعریف نشده است.
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- جدول پیشرفت هفتگی -->
                    @php $weeksCount = (int) ($plan->weeks_count ?? 4); $dayCount = max(1, $plan->days->count()); @endphp
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="ri-bar-chart-line me-2"></i>
                                جدول پیشرفت هفتگی
                            </h5>
                            <button class="btn btn-sm btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#progressTable">
                                نمایش/مخفی
                            </button>
                        </div>
                        <div class="collapse show" id="progressTable">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>هفته</th>
                                        @for($d = 1; $d <= $dayCount; $d++)
                                            <th>روز {{ $d }}</th>
                                        @endfor
                                        <th>پیشرفت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($w = 1; $w <= $weeksCount; $w++)
                                        <tr>
                                            <td>هفته {{ $w }}</td>
                                            @for($d = 1; $d <= $dayCount; $d++)
                                                <td><i class="ri-checkbox-circle-line text-muted"></i></td>
                                            @endfor
                                            <td><span class="badge bg-secondary">۰٪</span></td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- اطلاعات مربی -->
                    <div class="card print-hide">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}"
                                         class="rounded-circle" width="64" height="64" alt="مربی بدنسازی">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">طراحی شده توسط: مربی بدنسازی</h6>
                                    <p class="text-muted mb-0">
                                        <i class="ri-mail-line me-1"></i>
                                        coach@workout.com
                                        <i class="ri-phone-line ms-3 me-1"></i>
                                        ۰۹۱۲۳۴۵۶۷۸۹
                                    </p>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="ri-calendar-line me-1"></i>
                                            آخرین به‌روزرسانی: ۱۴۰۳/۰۱/۲۰
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
        // تایمر تمرین
        let workoutTimer = null;
        let remainingTime = 60 * 60; // 60 دقیقه به ثانیه

        function startWorkoutTimer() {
            if (workoutTimer) return;

            workoutTimer = setInterval(() => {
                remainingTime--;
                updateTimerDisplay();

                if (remainingTime <= 0) {
                    clearInterval(workoutTimer);
                    showNotification('زمان تمرین به پایان رسید!', 'success');
                }
            }, 1000);

            showNotification('تمرین شروع شد!', 'info');
        }

        function pauseWorkoutTimer() {
            if (workoutTimer) {
                clearInterval(workoutTimer);
                workoutTimer = null;
                showNotification('تمرین متوقف شد', 'warning');
            }
        }

        function resetWorkoutTimer() {
            pauseWorkoutTimer();
            remainingTime = 60 * 60;
            updateTimerDisplay();
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;
            document.getElementById('workout-timer').textContent =
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        // نمایش/مخفی کردن ویدیو
        function toggleVideo(videoId) {
            const videoDiv = document.getElementById(`video-${videoId}`);
            videoDiv.classList.toggle('d-none');
        }

        function playVideo(videoId) {
            alert(`پخش ویدیوی حرکت ${videoId}`);
            // در حالت واقعی، ویدیو پخش می‌شود
        }

        // تکمیل روز
        function completeDay(day) {
            const confirm = window.confirm(`آیا از تکمیل روز ${day} مطمئن هستید؟`);
            if (confirm) {
                showNotification(`روز ${day} با موفقیت تکمیل شد!`, 'success');

                // بروزرسانی دکمه
                const button = event.target.closest('button');
                button.classList.remove('btn-success');
                button.classList.add('btn-secondary');
                button.disabled = true;
                button.innerHTML = '<i class="ri-checkbox-circle-fill me-1"></i>تکمیل شده';
            }
        }

        // ثبت ست
        function logSet(exerciseId) {
            const setNumber = prompt('شماره ست را وارد کنید:', '1');
            const weight = prompt('وزن استفاده شده (کیلوگرم):', '60');
            const reps = prompt('تعداد تکرار:', '12');

            if (setNumber && weight && reps) {
                showNotification(`ست ${setNumber} با ${weight}kg × ${reps} تکرار ثبت شد`, 'success');
            }
        }

        // نمایش نوتیفیکیشن
        function showNotification(message, type = 'info') {
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

        // فعال‌سازی تب روز جاری
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().getDay(); // 0-6
            const dayTabs = document.querySelectorAll('#workoutDaysTabs .nav-link');

            // تبدیل روز هفته به روز تمرین (شنبه = 0)
            const workoutDay = (today + 1) % 5; // 5 روز تمرین در هفته

            if (dayTabs[workoutDay]) {
                dayTabs[workoutDay].classList.add('active');
                dayTabs[workoutDay].click();
            }

            updateTimerDisplay();
        });
    </script>
@endsection
