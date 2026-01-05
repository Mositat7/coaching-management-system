<?php

namespace App\Http\Controllers\Admin\nutrition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function create()
    {
        return view('admin.plans.nutrition.create');
    }
    public function edit(){
        return view('admin.plans.nutrition.edit');
    }
    public function show(){
        return view('admin.plans.nutrition.show');
    }
}
