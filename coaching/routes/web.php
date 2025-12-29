<?php

use App\Http\Controllers\Coach\CoachController;
use App\Http\Controllers\Members\MemberController;
use App\Http\Controllers\nutrition\NutritionController;
use App\Http\Controllers\plans\PlanController;
use App\Http\Controllers\workouts\WorkoutsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
//برنامه غذایی
Route::get('/nutrition-add', [NutritionController::class, 'create'])->name('nutrition.create');
Route::get('/nutrition-edit', [NutritionController::class, 'edit'])->name('nutrition.edit');
Route::get('/nutrition-show', [NutritionController::class, 'show'])->name('nutrition.show');
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
