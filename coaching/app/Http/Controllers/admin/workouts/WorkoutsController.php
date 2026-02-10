<?php

namespace App\Http\Controllers\Admin\workouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutPlan\StoreWorkoutPlanRequest;
use App\Models\WorkoutExercise;
use App\Models\WorkoutPlan;
use App\Models\WorkoutPlanDay;
use App\Models\WorkoutPlanDayExercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WorkoutsController extends Controller
{
    /**
     * صفحه ساخت برنامه ورزشی جدید — کتابخانه تمرینات از دیتابیس
     */
    public function add(): View
    {
        $exercises = WorkoutExercise::with(['muscleSubGroup.muscleGroup'])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($ex) => [
                'id' => $ex->id,
                'name' => $ex->name,
                'muscle' => $ex->muscleSubGroup?->muscleGroup?->name ?? '—',
                'sub_group' => $ex->muscleSubGroup?->name ?? '—',
            ]);

        return view('admin.plans.workout.create', [
            'exerciseLibrary' => $exercises,
        ]);
    }
    /**
     * ذخیره برنامه ورزشی جدید
     */
    public function store(StoreWorkoutPlanRequest $request): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $plan = WorkoutPlan::create([
            'name'               => $data['name'],
            'description'        => $data['description'] ?? null,
            'weeks_count'       => (int) ($data['weeks_count'] ?? 4),
            'level'             => $data['level'] ?? 'medium',
            'estimated_calories' => isset($data['estimated_calories']) ? (int) $data['estimated_calories'] : null,
            'equipment'         => $data['equipment'] ?? null,
            'safety_notes'      => $data['safety_notes'] ?? null,
            'coach_id'          => Session::get('coach_id'),
        ]);

        foreach ($data['days'] ?? [] as $sortOrder => $dayData) {
            /** @var WorkoutPlanDay $day */
            $day = $plan->days()->create([
                'day_index'        => (int) ($dayData['day_index'] ?? 0),
                'title'            => $dayData['title'] ?? null,
                'focus'            => $dayData['focus'] ?? null,
                'duration_minutes' => (int) ($dayData['duration_minutes'] ?? 60),
                'difficulty'       => $dayData['difficulty'] ?? 'medium',
                'notes'            => $dayData['notes'] ?? null,
                'sort_order'       => $sortOrder,
            ]);

            foreach ($dayData['exercises'] ?? [] as $exOrder => $exerciseData) {
                $day->exercises()->create([
                    'workout_exercise_id' => ! empty($exerciseData['workout_exercise_id'])
                        ? (int) $exerciseData['workout_exercise_id']
                        : null,
                    'custom_name'   => $exerciseData['custom_name'] ?? null,
                    'sets_count'    => (int) ($exerciseData['sets_count'] ?? 3),
                    'reps_text'     => $exerciseData['reps_text'] ?? null,
                    'rest_seconds'  => isset($exerciseData['rest_seconds'])
                        ? (int) $exerciseData['rest_seconds']
                        : null,
                    'notes'         => $exerciseData['notes'] ?? null,
                    'sort_order'    => $exOrder,
                ]);
            }
        }

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

        $exercises = WorkoutExercise::with(['muscleSubGroup.muscleGroup'])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($ex) => [
                'id' => $ex->id,
                'name' => $ex->name,
                'muscle' => $ex->muscleSubGroup?->muscleGroup?->name ?? '—',
                'sub_group' => $ex->muscleSubGroup?->name ?? '—',
            ]);

        return view('admin.plans.workout.create', [
            'exerciseLibrary' => $exercises,
            'plan' => $plan,
            'isEdit' => true,
        ]);
    }

    /**
     * آپدیت برنامه ورزشی (همان ساختار store؛ روزها و تمرین‌ها جایگزین می‌شوند).
     */
    public function update(StoreWorkoutPlanRequest $request, WorkoutPlan $plan): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $plan->update([
            'name'               => $data['name'],
            'description'        => $data['description'] ?? null,
            'weeks_count'       => (int) ($data['weeks_count'] ?? 4),
            'level'             => $data['level'] ?? 'medium',
            'estimated_calories' => isset($data['estimated_calories']) ? (int) $data['estimated_calories'] : null,
            'equipment'         => $data['equipment'] ?? null,
            'safety_notes'      => $data['safety_notes'] ?? null,
        ]);

        $plan->days()->delete();

        foreach ($data['days'] ?? [] as $sortOrder => $dayData) {
            $day = $plan->days()->create([
                'day_index'        => (int) ($dayData['day_index'] ?? 0),
                'title'            => $dayData['title'] ?? null,
                'focus'            => $dayData['focus'] ?? null,
                'duration_minutes' => (int) ($dayData['duration_minutes'] ?? 60),
                'difficulty'       => $dayData['difficulty'] ?? 'medium',
                'notes'            => $dayData['notes'] ?? null,
                'sort_order'       => $sortOrder,
            ]);

            foreach ($dayData['exercises'] ?? [] as $exOrder => $exerciseData) {
                $day->exercises()->create([
                    'workout_exercise_id' => ! empty($exerciseData['workout_exercise_id'])
                        ? (int) $exerciseData['workout_exercise_id']
                        : null,
                    'custom_name'   => $exerciseData['custom_name'] ?? null,
                    'sets_count'    => (int) ($exerciseData['sets_count'] ?? 3),
                    'reps_text'     => $exerciseData['reps_text'] ?? null,
                    'rest_seconds'  => isset($exerciseData['rest_seconds'])
                        ? (int) $exerciseData['rest_seconds']
                        : null,
                    'notes'         => $exerciseData['notes'] ?? null,
                    'sort_order'    => $exOrder,
                ]);
            }
        }

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
    public function destroy(string $id)
    {
        //
    }
}
