<?php

use App\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
//بخش املاک
Route::get('/property-add', [PropertyController::class, 'create'])->name('properties.create');

