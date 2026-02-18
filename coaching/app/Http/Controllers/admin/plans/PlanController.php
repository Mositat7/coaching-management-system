<?php

namespace App\Http\Controllers\Admin\plans;

use App\Http\Controllers\Controller;
use App\Models\NutritionPlan;
use App\Models\Member;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function assign(Request $request)
    {
        $coachId = Session::get('coach_id');
        
        // دریافت شاگردان این مربی
        $query = Member::where('coach_id', $coachId)
            ->with(['programRequests' => function($q) {
                $q->latest()->limit(1);
            }]);
        
        // جستجو
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }
        
        // فیلتر سطح (اگر در دیتابیس ذخیره می‌کنید)
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }
        
        // دریافت شاگردان با صفحه‌بندی
        $members = $query->latest()->paginate(12)->withQueryString();
        
        // دریافت برنامه‌های مربی برای نمایش در سایدبار
        $workoutPlans = WorkoutPlan::where('coach_id', $coachId)
            ->latest()
            ->limit(5)
            ->get();
            
        $nutritionPlans = NutritionPlan::where('coach_id', $coachId)
            ->latest()
            ->limit(5)
            ->get();
        
        return view('admin.plans.assign', [
            'members' => $members,
            'workoutPlans' => $workoutPlans,
            'nutritionPlans' => $nutritionPlans,
            'search' => $request->search,
            'level' => $request->level,
        ]);
    }

    /**
     * دریافت برنامه فعلی شاگرد
     */
    private function getCurrentPlan($member)
    {
        // این تابع رو بر اساس ساختار دیتابیس خودت تکمیل کن
        // مثلاً اگر member_id توی workout_plan و nutrition_plan دارید
        $workout = WorkoutPlan::where('member_id', $member->id)
            ->where('status', 'active')
            ->latest()
            ->first();
            
        $nutrition = NutritionPlan::where('member_id', $member->id)
            ->where('status', 'active')
            ->latest()
            ->first();
            
        if ($workout) {
            return [
                'type' => 'workout',
                'name' => $workout->name,
                'label' => 'تمرینی'
            ];
        }
        
        if ($nutrition) {
            return [
                'type' => 'nutrition',
                'name' => $nutrition->name,
                'label' => 'تغذیه'
            ];
        }
        
        return null;
    }

    public function list()
    {
        return view('admin.plans.list');
    }

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
    

    /**
     * لیست برنامه‌ها (نمایش فقط‌خواندنی)
     */
    // public function list()
    // {
    //     return view('admin.plans.list');
    // }

    /**
     * کتابخانه برنامه‌ها: نمایش برنامه‌های ذخیره‌شده مربی
     */
    // public function library()
    // {
    //     $coachId = Session::get('coach_id');

    //     $plans = WorkoutPlan::with(['days.exercises'])
    //         ->when($coachId, fn ($q) => $q->where('coach_id', $coachId))
    //         ->latest()
    //         ->get();

    //     $nutritionPlans = NutritionPlan::with(['days.meals'])
    //         ->when($coachId, fn ($q) => $q->where('coach_id', $coachId))
    //         ->latest()
    //         ->get();

    //     return view('admin.plans.library', [
    //         'plans' => $plans,
    //         'nutritionPlans' => $nutritionPlans,
    //     ]);
    // }
}
