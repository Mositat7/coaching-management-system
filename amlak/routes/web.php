<?php

use App\Http\Controllers\customers\CustomerController;
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
Route::get('/customers-add', [CustomerController::class, 'add'])->name('customers.add');
Route::get('/customers-details', [CustomerController::class, 'details'])->name('customers.details');
Route::get('/customers-list', [CustomerController::class, 'list'])->name('customers.list');
Route::get('/customers-grid', [CustomerController::class, 'grid'])->name('customers.grid');
