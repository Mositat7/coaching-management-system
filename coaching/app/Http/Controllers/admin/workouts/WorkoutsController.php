<?php

namespace App\Http\Controllers\Admin\workouts;

use App\Http\Controllers\Controller;
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
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'days' => 'nullable|array',
            'days.*.day_index' => 'required|integer|min:0|max:31',
            'days.*.title' => 'nullable|string|max:255',
            'days.*.focus' => 'nullable|string|max:255',
            'days.*.duration_minutes' => 'nullable|integer|min:1|max:300',
            'days.*.difficulty' => 'nullable|string|in:easy,medium,hard',
            'days.*.notes' => 'nullable|string|max:2000',
            'days.*.exercises' => 'nullable|array',
            'days.*.exercises.*.workout_exercise_id' => 'nullable|integer|exists:workout_exercises,id',
            'days.*.exercises.*.custom_name' => 'nullable|string|max:255',
            'days.*.exercises.*.sets_count' => 'nullable|integer|min:1|max:20',
            'days.*.exercises.*.reps_text' => 'nullable|string|max:100',
            'days.*.exercises.*.rest_seconds' => 'nullable|integer|min:0|max:600',
            'days.*.exercises.*.notes' => 'nullable|string|max:1000',
        ]);

        $plan = WorkoutPlan::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'coach_id' => Session::get('coach_id'),
        ]);

        $days = $request->input('days', []);
        foreach ($days as $sortOrder => $dayData) {
            $day = $plan->days()->create([
                'day_index' => (int) ($dayData['day_index'] ?? 0),
                'title' => $dayData['title'] ?? null,
                'focus' => $dayData['focus'] ?? null,
                'duration_minutes' => (int) ($dayData['duration_minutes'] ?? 60),
                'difficulty' => $dayData['difficulty'] ?? 'medium',
                'notes' => $dayData['notes'] ?? null,
                'sort_order' => $sortOrder,
            ]);

            $exercises = $dayData['exercises'] ?? [];
            foreach ($exercises as $exOrder => $ex) {
                $day->exercises()->create([
                    'workout_exercise_id' => ! empty($ex['workout_exercise_id']) ? (int) $ex['workout_exercise_id'] : null,
                    'custom_name' => $ex['custom_name'] ?? null,
                    'sets_count' => (int) ($ex['sets_count'] ?? 3),
                    'reps_text' => $ex['reps_text'] ?? null,
                    'rest_seconds' => isset($ex['rest_seconds']) ? (int) $ex['rest_seconds'] : null,
                    'notes' => $ex['notes'] ?? null,
                    'sort_order' => $exOrder,
                ]);
            }
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'برنامه با موفقیت ذخیره شد.', 'id' => $plan->id]);
        }

        return redirect()
            ->route('plans.assign')
            ->with('success', 'برنامه با موفقیت ذخیره شد.');
    }

    public function edit()
    {
        return view('admin.plans.workout.edit');
    }
    public function show()
    {
        return view('admin.plans.workout.show');
    }
    public function destroy(string $id)
    {
        //
    }
}
