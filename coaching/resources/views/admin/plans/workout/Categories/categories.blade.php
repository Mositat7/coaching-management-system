@extends('layouts.master')

@section('title', 'دسته‌بندی تمرین‌ها | مدیریت')

@section('head')
    <link href="{{ asset('assets/css/pages/workout-categories.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-content workout-categories-page">
    <div class="container-fluid">

        <div class="page-header">
            <div>
                <h1 class="page-title">دسته‌بندی تمرین‌ها</h1>
                <p class="page-desc">عضلات، زیرمجموعه‌ها و حرکات تمرینی را مدیریت کنید</p>
            </div>
            <button type="button" class="btn-add-muscle">
                <i class="ri-add-line"></i>
                <span>افزودن عضله جدید</span>
            </button>
        </div>

        <div class="grid-categories">

            {{-- کارت: بازو --}}
            <div class="category-card category-card--primary">
                <div class="category-card__header">
                    <div class="category-card__title-wrap">
                        <div class="category-card__icon">
                            <i class="ri-armchair-line"></i>
                        </div>
                        <h2 class="category-card__title">بازو</h2>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="category-card__menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 py-2">
                            <li><a class="dropdown-item py-2 px-3" href="#"><i class="ri-edit-line me-2"></i>ویرایش</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item py-2 px-3 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                        </ul>
                    </div>
                </div>
                <div class="category-card__body">
                    <div class="accordion" id="accordion-arm">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biceps-front" aria-expanded="false" aria-controls="biceps-front">
                                    جلو بازو
                                </button>
                            </h2>
                            <div id="biceps-front" class="accordion-collapse collapse" data-bs-parent="#accordion-arm">
                                <div class="accordion-body">
                                    <ul class="exercise-list">
                                        <li class="exercise-list__item">
                                            <span>جلو بازو هالتر</span>
                                            <button type="button" class="btn-exercise-delete" title="حذف"><i class="ri-delete-bin-6-line"></i></button>
                                        </li>
                                        <li class="exercise-list__item">
                                            <span>جلو بازو لاری</span>
                                            <button type="button" class="btn-exercise-delete" title="حذف"><i class="ri-delete-bin-6-line"></i></button>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn-add-exercise">
                                        <i class="ri-add-line"></i>
                                        افزودن تمرین
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#biceps-back" aria-expanded="false" aria-controls="biceps-back">
                                    پشت بازو
                                </button>
                            </h2>
                            <div id="biceps-back" class="accordion-collapse collapse" data-bs-parent="#accordion-arm">
                                <div class="accordion-body">
                                    <ul class="exercise-list">
                                        <li class="exercise-list__item">
                                            <span>پشت بازو سیم‌کش</span>
                                            <button type="button" class="btn-exercise-delete" title="حذف"><i class="ri-delete-bin-6-line"></i></button>
                                        </li>
                                        <li class="exercise-list__item">
                                            <span>دیپ پشت بازو</span>
                                            <button type="button" class="btn-exercise-delete" title="حذف"><i class="ri-delete-bin-6-line"></i></button>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn-add-exercise">
                                        <i class="ri-add-line"></i>
                                        افزودن تمرین
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-add-sub">
                        <i class="ri-add-circle-line"></i>
                        افزودن زیرمجموعه جدید
                    </button>
                </div>
            </div>

            {{-- کارت: پا (حالت خالی) --}}
            <div class="category-card category-card--success">
                <div class="category-card__header">
                    <div class="category-card__title-wrap">
                        <div class="category-card__icon">
                            <i class="ri-walk-line"></i>
                        </div>
                        <h2 class="category-card__title">پا</h2>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="category-card__menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 py-2">
                            <li><a class="dropdown-item py-2 px-3" href="#"><i class="ri-edit-line me-2"></i>ویرایش</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item py-2 px-3 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                        </ul>
                    </div>
                </div>
                <div class="category-card__body">
                    <div class="empty-state">
                        <div class="empty-state__icon">
                            <i class="ri-folder-open-line"></i>
                        </div>
                        <p class="empty-state__text">هنوز زیرمجموعه‌ای اضافه نشده است.</p>
                        <button type="button" class="btn-add-sub">
                            <i class="ri-add-circle-line"></i>
                            افزودن زیرمجموعه
                        </button>
                    </div>
                </div>
            </div>

            {{-- کارت نمونه: سینه --}}
            <div class="category-card category-card--danger">
                <div class="category-card__header">
                    <div class="category-card__title-wrap">
                        <div class="category-card__icon">
                            <i class="ri-heart-pulse-line"></i>
                        </div>
                        <h2 class="category-card__title">سینه</h2>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="category-card__menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 py-2">
                            <li><a class="dropdown-item py-2 px-3" href="#"><i class="ri-edit-line me-2"></i>ویرایش</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item py-2 px-3 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i>حذف</a></li>
                        </ul>
                    </div>
                </div>
                <div class="category-card__body">
                    <div class="empty-state">
                        <div class="empty-state__icon">
                            <i class="ri-folder-open-line"></i>
                        </div>
                        <p class="empty-state__text">هنوز زیرمجموعه‌ای اضافه نشده است.</p>
                        <button type="button" class="btn-add-sub">
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
