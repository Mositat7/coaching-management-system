@extends('layouts.master')

@section('title', 'دسته‌بندی تمرین‌ها | مدیریت')

@section('head')
    <link href="{{ asset('assets/css/pages/workout-categories.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-content workout-categories-page">
    <div class="container-fluid">

        {{-- پیام موفقیت یا خطا --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                <i class="ri-checkbox-circle-line me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                <i class="ri-error-warning-line me-2"></i>{{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
            </div>
        @endif

        {{-- هدر صفحه: عنوان + دکمه افزودن عضله --}}
        <div class="page-header">
            <div>
                <h1 class="page-title">دسته‌بندی تمرین‌ها</h1>
                <p class="page-desc">عضلات، زیرمجموعه‌ها و حرکات تمرینی را مدیریت کنید</p>
            </div>
            <button type="button" class="btn-add-muscle" data-bs-toggle="modal" data-bs-target="#modalAddMuscle">
                <i class="ri-add-line"></i>
                <span>افزودن عضله جدید</span>
            </button>
        </div>

        <div class="grid-categories">

            @forelse($muscleGroups as $group)
                {{-- کارت هر عضله --}}
                <div class="category-card category-card--{{ $group->color_slug }}">
                    <div class="category-card__header">
                        <div class="category-card__title-wrap">
                            <div class="category-card__icon">
                                <i class="{{ $group->icon ?? 'ri-apps-line' }}"></i>
                            </div>
                            <h2 class="category-card__title">{{ $group->name }}</h2>
                        </div>
                        <div class="dropdown" data-bs-boundary="viewport">
                            <button type="button" class="category-card__menu" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" title="منو">
                                <i class="ri-more-2-fill"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 py-2 min-w-180">
                                <li><a class="dropdown-item py-2 px-3" href="#"><i class="ri-edit-line me-2"></i>ویرایش</a></li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form action="{{ route('workouts.category.muscle.destroy', ['muscleGroup' => $group->id]) }}" method="POST" onsubmit="return confirm('آیا از حذف عضله «{{ $group->name }}» و تمام زیرمجموعه‌ها و تمرین‌های آن اطمینان دارید؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item py-2 px-3 text-danger border-0 bg-transparent w-100 text-start btn-dropdown-delete">
                                            <i class="ri-delete-bin-line me-2"></i>حذف عضله
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="category-card__body">

                        @if($group->subGroups->isEmpty())
                            {{-- حالت خالی: بدون زیرمجموعه --}}
                            <div class="empty-state">
                                <div class="empty-state__icon">
                                    <i class="ri-folder-open-line"></i>
                                </div>
                                <p class="empty-state__text">هنوز زیرمجموعه‌ای اضافه نشده است.</p>
                                <button type="button" class="btn-add-sub" data-bs-toggle="modal" data-bs-target="#modalAddSubGroup-{{ $group->id }}">
                                    <i class="ri-add-circle-line"></i>
                                    افزودن زیرمجموعه
                                </button>
                            </div>
                        @else
                            {{-- آکوردیون زیرمجموعه‌ها --}}
                            <div class="accordion" id="accordion-group-{{ $group->id }}">
                                @foreach($group->subGroups as $sub)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#sub-{{ $sub->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="sub-{{ $sub->id }}">
                                                {{ $sub->name }}
                                            </button>
                                        </h2>
                                        <div id="sub-{{ $sub->id }}" class="accordion-collapse collapse"
                                             data-bs-parent="#accordion-group-{{ $group->id }}">
                                            <div class="accordion-body">
                                                <ul class="exercise-list">
                                                    @foreach($sub->exercises as $exercise)
                                                        <li class="exercise-list__item">
                                                            <span>{{ $exercise->name }}</span>
                                                            <form action="{{ route('workouts.category.exercise.destroy', $exercise) }}" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف تمرین «{{ $exercise->name }}» اطمینان دارید؟');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-exercise-delete" title="حذف">
                                                                    <i class="ri-delete-bin-6-line"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-add-exercise" data-bs-toggle="modal" data-bs-target="#modalAddExercise-{{ $sub->id }}">
                                                    <i class="ri-add-line"></i>
                                                    افزودن تمرین
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn-add-sub" data-bs-toggle="modal" data-bs-target="#modalAddSubGroup-{{ $group->id }}">
                                <i class="ri-add-circle-line"></i>
                                افزودن زیرمجموعه جدید
                            </button>
                        @endif

                    </div>

                    {{-- مودال افزودن زیرمجموعه (یک مودال به ازای هر عضله — بدون نیاز به JS) --}}
                    <div class="modal fade" id="modalAddSubGroup-{{ $group->id }}" tabindex="-1" aria-labelledby="modalAddSubGroupLabel-{{ $group->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-3 shadow">
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold" id="modalAddSubGroupLabel-{{ $group->id }}">
                                        <i class="ri-add-circle-line me-2"></i>افزودن زیرمجموعه به «{{ $group->name }}»
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                                </div>
                                <form action="{{ route('workouts.category.subgroup.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="muscle_group_id" value="{{ $group->id }}">
                                    <div class="modal-body pt-0">
                                        <div class="mb-0">
                                            <label for="subgroup_name-{{ $group->id }}" class="form-label fw-medium">نام زیرمجموعه <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control rounded-3 @if(old('muscle_group_id') == $group->id && $errors->has('name')) is-invalid @endif"
                                                   id="subgroup_name-{{ $group->id }}" name="name" value="{{ old('muscle_group_id') == $group->id ? old('name') : '' }}"
                                                   placeholder="مثال: جلو بازو" required maxlength="100">
                                            @if(old('muscle_group_id') == $group->id && $errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">انصراف</button>
                                        <button type="submit" class="btn btn-primary rounded-3 px-4">
                                            <i class="ri-save-line me-1"></i>ذخیره
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- مودال‌های افزودن تمرین (یک مودال به ازای هر زیرمجموعه) --}}
                    @foreach($group->subGroups as $sub)
                    <div class="modal fade" id="modalAddExercise-{{ $sub->id }}" tabindex="-1" aria-labelledby="modalAddExerciseLabel-{{ $sub->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-3 shadow">
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold" id="modalAddExerciseLabel-{{ $sub->id }}">
                                        <i class="ri-add-line me-2"></i>افزودن تمرین به «{{ $sub->name }}»
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                                </div>
                                <form action="{{ route('workouts.category.exercise.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="muscle_sub_group_id" value="{{ $sub->id }}">
                                    <div class="modal-body pt-0">
                                        <div class="mb-0">
                                            <label for="exercise_name-{{ $sub->id }}" class="form-label fw-medium">نام تمرین <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control rounded-3 @if(old('muscle_sub_group_id') == $sub->id && $errors->has('name')) is-invalid @endif"
                                                   id="exercise_name-{{ $sub->id }}" name="name" value="{{ old('muscle_sub_group_id') == $sub->id ? old('name') : '' }}"
                                                   placeholder="مثال: جلو بازو هالتر" required maxlength="200">
                                            @if(old('muscle_sub_group_id') == $sub->id && $errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">انصراف</button>
                                        <button type="submit" class="btn btn-primary rounded-3 px-4">
                                            <i class="ri-save-line me-1"></i>ذخیره
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @empty
                {{-- هیچ عضله‌ای در دیتابیس نیست --}}
                <div class="grid-categories__empty">
                    <div class="empty-state" style="padding: 3rem;">
                        <div class="empty-state__icon" style="margin: 0 auto 1rem;">
                            <i class="ri-apps-2-line"></i>
                        </div>
                        <p class="empty-state__text">هنوز عضله‌ای تعریف نشده است. با دکمهٔ بالا اولین عضله را اضافه کنید.</p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</div>

{{-- مودال افزودن عضله جدید --}}
<div class="modal fade" id="modalAddMuscle" tabindex="-1" aria-labelledby="modalAddMuscleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="modalAddMuscleLabel">
                    <i class="ri-add-circle-line me-2"></i>افزودن عضله جدید
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
            </div>
            <form action="{{ route('workouts.category.store') }}" method="POST">
                @csrf
                <div class="modal-body pt-0">
                    <div class="mb-3">
                        <label for="muscle_name" class="form-label fw-medium">نام عضله <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                               id="muscle_name" name="name" value="{{ old('name') }}"
                               placeholder="مثال: شانه" required maxlength="100">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="muscle_icon" class="form-label fw-medium">آیکون</label>
                        <select class="form-select rounded-3 @error('icon') is-invalid @enderror" id="muscle_icon" name="icon">
                            <option value="">— بدون آیکون —</option>
                            <option value="ri-armchair-line" {{ old('icon') == 'ri-armchair-line' ? 'selected' : '' }}>بازو (armchair)</option>
                            <option value="ri-walk-line" {{ old('icon') == 'ri-walk-line' ? 'selected' : '' }}>پا (walk)</option>
                            <option value="ri-heart-pulse-line" {{ old('icon') == 'ri-heart-pulse-line' ? 'selected' : '' }}>سینه (heart)</option>
                            <option value="ri-body-scan-line" {{ old('icon') == 'ri-body-scan-line' ? 'selected' : '' }}>کول (body)</option>
                            <option value="ri-apps-line" {{ old('icon') == 'ri-apps-line' ? 'selected' : '' }}>عمومی (apps)</option>
                        </select>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label for="muscle_color" class="form-label fw-medium">رنگ کارت</label>
                        <select class="form-select rounded-3 @error('color_slug') is-invalid @enderror" id="muscle_color" name="color_slug">
                            <option value="primary" {{ old('color_slug', 'primary') == 'primary' ? 'selected' : '' }}>آبی (primary)</option>
                            <option value="success" {{ old('color_slug') == 'success' ? 'selected' : '' }}>سبز (success)</option>
                            <option value="danger" {{ old('color_slug') == 'danger' ? 'selected' : '' }}>قرمز (danger)</option>
                            <option value="warning" {{ old('color_slug') == 'warning' ? 'selected' : '' }}>نارنجی (warning)</option>
                            <option value="info" {{ old('color_slug') == 'info' ? 'selected' : '' }}>فیروزه (info)</option>
                        </select>
                        @error('color_slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary rounded-3 px-4">
                        <i class="ri-save-line me-1"></i>ذخیره
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
