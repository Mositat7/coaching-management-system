<?php

use App\Http\Controllers\Members\MemberController;
use App\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
//بخش املاک
Route::get('/property-add', [PropertyController::class, 'add'])->name('properties.add');
Route::get('/property-details', [PropertyController::class, 'details'])->name('properties.details');
Route::get('/property-list', [PropertyController::class, 'list'])->name('properties.list');
Route::get('/property-grid', [PropertyController::class, 'grid'])->name('properties.grid');
//بحش مشتری ها
Route::get('/members-add', [MemberController::class, 'add'])->name('members.add');
Route::get('/members-details', [MemberController::class, 'details'])->name('members.details');
Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
Route::get('/members-grid', [MemberController::class, 'grid'])->name('members.grid');
