<?php

use App\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
//بخش املاک
Route::get('/property-add', [PropertyController::class, 'add'])->name('properties.add');
Route::get('/property-details', [PropertyController::class, 'details'])->name('properties.details');
Route::get('/property-list', [PropertyController::class, 'list'])->name('properties.list');

