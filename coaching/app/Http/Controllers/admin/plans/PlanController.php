<?php

namespace App\Http\Controllers\Admin\plans;

use App\Http\Controllers\Controller;
use App\Models\NutritionPlan;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function assign()
    {
        return view('admin.plans.assign');
    }

    /**
     * لیست برنامه‌ها (نمایش فقط‌خواندنی)
     */
    public function list()
    {
        return view('admin.plans.list');
    }

    /**
     * کتابخانه برنامه‌ها: نمایش برنامه‌های ذخیره‌شده مربی
     */
    public function library()
    {
        $coachId = Session::get('coach_id');

        $plans = WorkoutPlan::with(['days.exercises'])
            ->when($coachId, fn ($q) => $q->where('coach_id', $coachId))
            ->latest()
            ->get();

        $nutritionPlans = NutritionPlan::with(['days.meals'])
            ->when($coachId, fn ($q) => $q->where('coach_id', $coachId))
            ->latest()
            ->get();

        return view('admin.plans.library', [
            'plans' => $plans,
            'nutritionPlans' => $nutritionPlans,
        ]);
    }
}
