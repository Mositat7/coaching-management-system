<?php

use App\Http\Controllers\admin\Coach\CoachController;
use App\Http\Controllers\admin\Dashboard\DashboardController;
use App\Http\Controllers\admin\Members\MemberController;
use App\Http\Controllers\admin\nutrition\NutritionController;
use App\Http\Controllers\admin\plans\PlanController;
use App\Http\Controllers\admin\workouts\category\CategoryController;
use App\Http\Controllers\admin\workouts\WorkoutsController;
use Illuminate\Support\Facades\Route;
//داشبورد
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
//برنامه غذایی
Route::get('/nutrition-add', [NutritionController::class, 'create'])->name('nutrition.create');
Route::get('/nutrition-edit', [NutritionController::class, 'edit'])->name('nutrition.edit');
Route::get('/nutrition-show', [NutritionController::class, 'show'])->name('nutrition.show');
//کتگوری عضلات
Route::get('/Workouts-category', [CategoryController::class, 'index'])->name('Workouts.category');
//بخش برنامه تمرینی
Route::get('/Workouts-add', [WorkoutsController::class, 'add'])->name('plans.create');
Route::get('/Workouts-edit', [WorkoutsController::class, 'edit'])->name('Workouts.edit');
Route::get('/Workouts-show', [WorkoutsController::class, 'show'])->name('Workouts.show');
//منطق عمومی مدیریت برنامه‌ها
Route::get('/Plan-list', [PlanController::class, 'list'])->name('plans.list');
Route::get('/Plan-assign', [PlanController::class, 'assign'])->name('plans.assign');
Route::get('/Plan-library', [PlanController::class, 'library'])->name('plans.library');
//بحش عضو ها
Route::get('/members-add', [MemberController::class, 'add'])->name('members.add');
Route::get('/members-details', [MemberController::class, 'details'])->name('members.details');
Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
Route::get('/members-grid', [MemberController::class, 'grid'])->name('members.grid');
// بخش مربی
Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
//تنظیمات ورود
Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
//داشبورد عضویت ها
Route::get('/dashboard', [\App\Http\Controllers\member\DashboardController::class, 'index'])->name('dashboard.member');
