<?php

namespace App\Http\Controllers\admin\workouts\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('plans.workout.Categories.categories');
    }
}
