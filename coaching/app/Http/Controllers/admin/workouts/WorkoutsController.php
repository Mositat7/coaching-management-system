<?php

namespace App\Http\Controllers\admin\workouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutPlan\StoreWorkoutPlanRequest;
use App\Models\WorkoutExercise;
use App\Models\WorkoutPlan;
use App\Services\Workout\WorkoutPlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WorkoutsController extends Controller
{
    public function __construct(
        protected WorkoutPlanService $workoutPlanService,
    ) {
    }

    /**
     * صفحه ساخت برنامه ورزشی جدید — کتابخانه تمرینات از دیتابیس
     */
    public function add(): View
    {
        return view('admin.plans.workout.create', [
            'exerciseLibrary' => $this->getExerciseLibrary(),
        ]);
    }

    /**
     * ذخیره برنامه ورزشی جدید
     */
    public function store(StoreWorkoutPlanRequest $request): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $plan = $this->workoutPlanService->createFromArray($data, Session::get('coach_id'));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'برنامه با موفقیت ذخیره شد.',
                'id'      => $plan->id,
            ]);
        }

        return redirect()
            ->route('plans.assign')
            ->with('success', 'برنامه با موفقیت ذخیره شد.');
    }

    /**
     * ویرایش برنامه ورزشی — لود برنامه با ?plan=10 و نمایش فرم create با دادهٔ اولیه
     */
    public function edit(Request $request): View|RedirectResponse
    {
        $planId = $request->query('plan');
        if (! $planId) {
            return redirect()->route('plans.library')->with('error', 'شناسه برنامه مشخص نیست.');
        }

        $plan = WorkoutPlan::with(['days.exercises.workoutExercise'])
            ->where('id', $planId)
            ->first();

        if (! $plan) {
            return redirect()->route('plans.library')->with('error', 'برنامه یافت نشد.');
        }

        return view('admin.plans.workout.create', [
            'exerciseLibrary' => $this->getExerciseLibrary(),
            'plan'            => $plan,
            'isEdit'          => true,
        ]);
    }

    /**
     * آپدیت برنامه ورزشی (همان ساختار store؛ روزها و تمرین‌ها جایگزین می‌شوند).
     */
    public function update(StoreWorkoutPlanRequest $request, WorkoutPlan $plan): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $plan = $this->workoutPlanService->updateFromArray($plan, $data);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'برنامه با موفقیت به‌روزرسانی شد.',
                'id'      => $plan->id,
            ]);
        }

        return redirect()
            ->route('plans.library')
            ->with('success', 'برنامه با موفقیت به‌روزرسانی شد.');
    }

    /**
     * نمایش یک برنامهٔ ذخیره‌شده به‌صورت فقط‌خواندنی.
     * فعلاً ساده: برنامه را با روزها و تمرین‌ها لود می‌کند و به ویو می‌فرستد.
     */
    public function show(WorkoutPlan $plan): View
    {
        $plan->load(['days.exercises.workoutExercise']);

        return view('admin.plans.workout.show', [
            'plan' => $plan,
        ]);
    }

    /**
     * کتابخانه تمرینات برای فرم ساخت/ویرایش (یک منبع، بدون تکرار).
     */
    private function getExerciseLibrary(): array
    {
        return WorkoutExercise::with(['muscleSubGroup.muscleGroup'])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($ex) => [
                'id'         => $ex->id,
                'name'       => $ex->name,
                'muscle'     => $ex->muscleSubGroup?->muscleGroup?->name ?? '—',
                'sub_group'  => $ex->muscleSubGroup?->name ?? '—',
            ])
            ->all();
    }
}
