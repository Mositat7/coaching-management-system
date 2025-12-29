<?php

use App\Http\Controllers\Coach\CoachController;
use App\Http\Controllers\Members\MemberController;
use App\Http\Controllers\workouts\WorkoutsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
//بخش برنامه
Route::get('/Workouts-add', [WorkoutsController::class, 'add'])->name('plans.create');
Route::get('/Workouts-assign', [WorkoutsController::class, 'assign'])->name('Workouts.assign');
Route::get('/Workouts-list', [WorkoutsController::class, 'list'])->name('Workouts.list');
Route::get('/Workouts-library', [WorkoutsController::class, 'library'])->name('Workouts.library');
//بحش عضو ها
Route::get('/members-add', [MemberController::class, 'add'])->name('members.add');
Route::get('/members-details', [MemberController::class, 'details'])->name('members.details');
Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
Route::get('/members-grid', [MemberController::class, 'grid'])->name('members.grid');
// بخش مربی
Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
