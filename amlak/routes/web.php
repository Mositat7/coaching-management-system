<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard-agent');
});
Route::get('/property-add', function () {
    return view('property-add');
});

