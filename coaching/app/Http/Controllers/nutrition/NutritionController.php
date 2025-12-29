<?php

namespace App\Http\Controllers\nutrition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function create()
    {
        return view('plans.nutrition.create');
    }
    public function edit(){
        return view('plans.nutrition.edit');
    }
    public function show(){
        return view('plans.nutrition.show');
    }
}
