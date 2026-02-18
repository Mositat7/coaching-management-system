@extends('layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-semibold">
                                ارسال برنامه به شاگردان
                            </h4>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">
                                        سیستم مربی‌گری
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    ارسال برنامه
                                </li>
                            </ol>
                        </div>
                        <div>
                            <a href="{{ route('plans.library') }}" class="btn btn-outline-primary">
                                <i class="ri-book-open-line me-1"></i>
                                کتابخانه برنامه‌ها
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <!-- سایدبار -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block">
                                    <i class="ri-send-plane-line fs-36 text-primary"></i>
                                </div>
                                <h5 class="mt-3 mb-1">ارسال برنامه</h5>
                                <p class="text-muted">انتخاب برنامه از کتابخانه</p>
                            </div>

                            <!-- انتخاب برنامه -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">انتخاب برنامه</label>
                                <select class="form-select" id="planSelector">
                                    <option value="">انتخاب کنید...</option>
                                    <optgroup label="برنامه‌های تمرینی">
                                        @foreach($workoutPlans as $plan)
                                            <option value="workout_{{ $plan->id }}" 
                                                    data-type="workout" 
                                                    data-id="{{ $plan->id }}"
                                                    data-name="{{ $plan->name }}"
                                                    data-duration="{{ $plan->duration ?? '۴ هفته' }}"
                                                    data-level="{{ $plan->level ?? 'متوسط' }}">
                                                {{ $plan->name }} (تمرینی)
                                            </option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="برنامه‌های تغذیه">
                                        @foreach($nutritionPlans as $plan)
                                            <option value="nutrition_{{ $plan->id }}"
                                                    data-type="nutrition"
                                                    data-id="{{ $plan->id }}"
                                                    data-name="{{ $plan->name }}"
                                                    data-duration="{{ $plan->duration ?? '۴ هفته' }}"
                                                    data-level="{{ $plan->level ?? 'متوسط' }}">
                                                {{ $plan->name }} (تغذیه)
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>

                            <!-- نمایش برنامه انتخاب شده -->
                            <div id="selectedPlanDisplay" class="border rounded p-3 mb-3 d-none">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="ri-dumbbell-line fs-20 text-primary me-2" id="planIcon"></i>
                                    <div>
                                        <h6 class="mb-0" id="planName">حجم‌گیری فاز اول</h6>
                                        <small class="text-muted" id="planMeta">۴ هفته - سطح متوسط</small>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <small class="text-muted">نوع برنامه:</small>
                                        <div class="fw-medium" id="planType">تمرینی</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">مدت:</small>
                                        <div class="fw-medium" id="planDuration">۶۰ دقیقه</div>
                                    </div>
                                </div>
                            </div>

                            @if($workoutPlans->isEmpty() && $nutritionPlans->isEmpty())
                                <div class="alert alert-warning">
                                    <i class="ri-alert-line me-1"></i>
                                    برنامه‌ای در کتابخانه یافت نشد. ابتدا برنامه بسازید.
                                </div>
                            @endif

                            <div class="mt-4">
                                <h6 class="mb-3">آمار:</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>شاگردان انتخاب شده:</span>
                                    <span class="badge bg-primary" id="selectedCount">۰ نفر</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>کل شاگردان:</span>
                                    <span class="badge bg-secondary">{{ $members->total() }} نفر</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- محتوای اصلی -->
                <div class="col-xl-9 col-lg-8">
                    <!-- جستجو و فیلتر -->
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="{{ route('plans.assign') }}" id="searchForm">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" 
                                                   name="search" 
                                                   class="form-control" 
                                                   placeholder="جستجو بر اساس نام، موبایل یا کد عضویت..."
                                                   value="{{ $search }}">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="ri-search-line"></i>
                                            </button>
                                            @if($search)
                                                <a href="{{ route('plans.assign') }}" class="btn btn-outline-secondary">
                                                    <i class="ri-close-line"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <select name="level" class="form-control" onchange="this.form.submit()">
                                            <option value="">همه سطوح</option>
                                            <option value="beginner" {{ $level == 'beginner' ? 'selected' : '' }}>مبتدی</option>
                                            <option value="intermediate" {{ $level == 'intermediate' ? 'selected' : '' }}>متوسط</option>
                                            <option value="advanced" {{ $level == 'advanced' ? 'selected' : '' }}>پیشرفته</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- لیست شاگردان -->
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="ri-group-line me-2"></i>
                                لیست شاگردان
                                <span class="badge bg-primary ms-2">{{ $members->total() }}</span>
                            </h5>
                            <div>
                                <button class="btn btn-sm btn-outline-primary" onclick="toggleAllCheckboxes()">
                                    <i class="ri-checkbox-line me-1"></i>
                                    انتخاب همه
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($members->isEmpty())
                                <div class="text-center py-5">
                                    <i class="ri-user-search-line fs-48 text-muted"></i>
                                    <h6 class="mt-3">شاگردی یافت نشد</h6>
                                    <p class="text-muted">موردی با معیارهای جستجوی شما مطابقت ندارد.</p>
                                </div>
                            @else
                                <div class="row g-3" id="membersList">
                                    @foreach($members as $member)
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card member-card {{ $member->subscription_status == 'expired' ? 'border-danger' : '' }}" data-member-id="{{ $member->id }}">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            @if($member->avatar)
                                                                <img src="{{ $member->avatar_url }}" 
                                                                     class="rounded-circle" 
                                                                     width="64" 
                                                                     height="64"
                                                                     style="object-fit: cover;">
                                                            @else
                                                                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                                                     style="width: 64px; height: 64px;">
                                                                    <span class="text-primary fs-18">
                                                                        {{ mb_substr($member->full_name, 0, 1) }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">{{ $member->full_name }}</h6>
                                                            <p class="text-muted mb-0 small">
                                                                @if($member->mobile)
                                                                    <i class="ri-phone-line me-1"></i>
                                                                    {{ $member->mobile }}
                                                                @else
                                                                    <i class="ri-mail-line me-1"></i>
                                                                    {{ $member->email ?? 'بدون تماس' }}
                                                                @endif
                                                            </p>
                                                            <small class="text-muted">
                                                                کد: {{ $member->code }}
                                                            </small>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input member-checkbox" 
                                                                   type="checkbox" 
                                                                   value="{{ $member->id }}"
                                                                   data-name="{{ $member->full_name }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-3">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <small class="text-muted">وضعیت اشتراک:</small>
                                                                <div>
                                                                    @php
                                                                        $statusColors = [
                                                                            'active' => 'success',
                                                                            'expiring_soon' => 'warning',
                                                                            'expired' => 'danger',
                                                                            'suspended' => 'secondary'
                                                                        ];
                                                                        $color = $statusColors[$member->subscription_status] ?? 'secondary';
                                                                    @endphp
                                                                    <span class="badge bg-{{ $color }}">
                                                                        @switch($member->subscription_status)
                                                                            @case('active') فعال @break
                                                                            @case('expiring_soon') رو به اتمام @break
                                                                            @case('expired') منقضی @break
                                                                            @case('suspended') معلق @break
                                                                            @default نامشخص
                                                                        @endswitch
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <small class="text-muted">برنامه فعلی:</small>
                                                                <div>
                                                                    @php
                                                                        $currentPlan = $member->programRequests->first();
                                                                    @endphp
                                                                    @if($currentPlan && $currentPlan->status == 'done')
                                                                        <span class="badge bg-info">
                                                                            {{ $currentPlan->type == 'workout' ? 'تمرینی' : 'تغذیه' }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge bg-light text-dark">ندارد</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($member->subscription_expires_at)
                                                            <div class="mt-2 small text-muted">
                                                                <i class="ri-calendar-line me-1"></i>
                                                                {{ $member->subscription_expires_at_shamsi }}
                                                                ({{ $member->expiry_label }})
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- صفحه‌بندی -->
                                <div class="mt-4">
                                    {{ $members->links() }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- اقدامات پایانی -->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-2 me-3">
                                            <i class="ri-information-line text-primary fs-18"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0" id="readyMessage">برنامه‌ای انتخاب نشده است</h6>
                                            <p class="text-muted mb-0" id="selectedInfo">۰ نفر از {{ $members->total() }} نفر انتخاب شده‌اند</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-secondary w-100" onclick="saveSelection()">
                                            <i class="ri-save-line me-1"></i>
                                            ذخیره انتخاب
                                        </button>
                                        <button class="btn btn-primary w-100" onclick="sendPlan()" id="sendButton" disabled>
                                            <i class="ri-send-plane-line me-1"></i>
                                            ارسال برنامه
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- فرم مخفی برای ارسال -->
    <form id="sendPlanForm" method="POST" action="{{ route('plans.send') }}" style="display: none;">
        @csrf
        <input type="hidden" name="member_ids" id="selectedMembersInput">
        <input type="hidden" name="plan_type" id="planTypeInput">
        <input type="hidden" name="plan_id" id="planIdInput">
    </form>
@endsection

@section('scripts')
<script>
let selectedMembers = new Set();

// به‌روزرسانی تعداد انتخاب شده‌ها
function updateSelectedCount() {
    const count = selectedMembers.size;
    document.getElementById('selectedCount').textContent = count + ' نفر';
    document.getElementById('selectedInfo').innerHTML = count + ' نفر از {{ $members->total() }} نفر انتخاب شده‌اند';
    
    const sendButton = document.getElementById('sendButton');
    const planSelected = document.getElementById('planSelector').value;
    
    sendButton.disabled = !(count > 0 && planSelected);
    
    if (count > 0 && planSelected) {
        document.getElementById('readyMessage').innerHTML = '✅ آماده ارسال به ' + count + ' نفر';
    } else if (count > 0) {
        document.getElementById('readyMessage').innerHTML = '⚠️ لطفاً یک برنامه انتخاب کنید';
    } else {
        document.getElementById('readyMessage').innerHTML = 'برنامه‌ای انتخاب نشده است';
    }
}

// مدیریت چک‌باکس‌ها
document.querySelectorAll('.member-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            selectedMembers.add(this.value);
        } else {
            selectedMembers.delete(this.value);
        }
        updateSelectedCount();
    });
});

// انتخاب/لغو انتخاب همه
function toggleAllCheckboxes() {
    const checkboxes = document.querySelectorAll('.member-checkbox');
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = !allChecked;
        if (!allChecked) {
            selectedMembers.add(checkbox.value);
        } else {
            selectedMembers.delete(checkbox.value);
        }
    });
    
    updateSelectedCount();
}

// نمایش برنامه انتخاب شده
document.getElementById('planSelector').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    const displayDiv = document.getElementById('selectedPlanDisplay');
    const sendButton = document.getElementById('sendButton');
    
    if (this.value) {
        const type = selected.dataset.type;
        const name = selected.dataset.name;
        const duration = selected.dataset.duration;
        const level = selected.dataset.level;
        
        document.getElementById('planName').textContent = name;
        document.getElementById('planMeta').textContent = duration + ' - سطح ' + level;
        document.getElementById('planType').textContent = type === 'workout' ? 'برنامه تمرینی' : 'برنامه تغذیه';
        document.getElementById('planIcon').className = type === 'workout' ? 'ri-dumbbell-line fs-20 text-primary me-2' : 'ri-restaurant-line fs-20 text-success me-2';
        
        displayDiv.classList.remove('d-none');
    } else {
        displayDiv.classList.add('d-none');
    }
    
    updateSelectedCount();
});

// ذخیره انتخاب در localStorage
function saveSelection() {
    const members = Array.from(selectedMembers);
    localStorage.setItem('selectedMembers', JSON.stringify(members));
    alert('انتخاب شما ذخیره شد');
}

// ارسال برنامه
function sendPlan() {
    const planSelect = document.getElementById('planSelector');
    if (!planSelect.value) {
        alert('لطفاً یک برنامه انتخاب کنید');
        return;
    }
    
    if (selectedMembers.size === 0) {
        alert('لطفاً حداقل یک شاگرد انتخاب کنید');
        return;
    }
    
    const [type, id] = planSelect.value.split('_');
    
    document.getElementById('selectedMembersInput').value = Array.from(selectedMembers).join(',');
    document.getElementById('planTypeInput').value = type;
    document.getElementById('planIdInput').value = id;
    
    if (confirm('برنامه برای ' + selectedMembers.size + ' نفر ارسال شود؟')) {
        document.getElementById('sendPlanForm').submit();
    }
}

// بازیابی انتخاب قبلی از localStorage
window.addEventListener('load', function() {
    const saved = localStorage.getItem('selectedMembers');
    if (saved) {
        const members = JSON.parse(saved);
        members.forEach(id => {
            const checkbox = document.querySelector(`.member-checkbox[value="${id}"]`);
            if (checkbox) {
                checkbox.checked = true;
                selectedMembers.add(id);
            }
        });
        updateSelectedCount();
    }
});
</script>
@endsection