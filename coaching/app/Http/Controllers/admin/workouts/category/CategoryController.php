<?php

namespace App\Http\Controllers\admin\workouts\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutCategory\StoreMuscleGroupRequest;
use App\Http\Requests\WorkoutCategory\StoreWorkoutExerciseRequest;
use App\Http\Requests\WorkoutCategory\StoreMuscleSubGroupRequest;
use App\Models\MuscleGroup;
use App\Models\MuscleSubGroup;
use App\Models\WorkoutExercise;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
/**
 * کنترلر صفحهٔ دسته‌بندی تمرین‌ها (عضلات، زیرمجموعه‌ها، حرکات)
 */
class CategoryController extends Controller
{
    /**
     * نمایش لیست عضلات با زیرمجموعه‌ها و تمرین‌ها
     */
    public function index(): View
    {
        $muscleGroups = MuscleGroup::with(['subGroups.exercises'])
            ->orderBy('sort_order')
            ->get();

        return view('admin.plans.workout.Categories.categories', compact('muscleGroups'));
    }

    /**
     * ذخیرهٔ عضلهٔ جدید
     */
    public function store(StoreMuscleGroupRequest $request): RedirectResponse
    {
        $maxOrder = MuscleGroup::max('sort_order') ?? 0;

        MuscleGroup::create([
            'name'       => $request->validated('name'),
            'icon'       => $request->validated('icon') ?: 'ri-apps-line',
            'color_slug' => $request->validated('color_slug'),
            'sort_order' => $maxOrder + 1,
        ]);

        return redirect()
            ->route('Workouts.category')
            ->with('success', 'عضله با موفقیت اضافه شد.');
    }

    /**
     * ذخیرهٔ تمرین جدید (تحت یک زیرمجموعه)
     */
    public function storeExercise(StoreWorkoutExerciseRequest $request): RedirectResponse
    {
        $subGroupId = $request->validated('muscle_sub_group_id');
        $maxOrder = WorkoutExercise::where('muscle_sub_group_id', $subGroupId)->max('sort_order') ?? 0;

        WorkoutExercise::create([
            'muscle_sub_group_id' => $subGroupId,
            'name'                => $request->validated('name'),
            'sort_order'           => $maxOrder + 1,
        ]);

        return redirect()
            ->route('Workouts.category')
            ->with('success', 'تمرین با موفقیت اضافه شد.');
    }

    /**
     * ذخیرهٔ زیرمجموعهٔ جدید (تحت یک عضله)
     */
    public function storeSubGroup(StoreMuscleSubGroupRequest $request): RedirectResponse
    {
        $groupId = $request->validated('muscle_group_id');
        $maxOrder = MuscleSubGroup::where('muscle_group_id', $groupId)->max('sort_order') ?? 0;

        MuscleSubGroup::create([
            'muscle_group_id' => $groupId,
            'name'            => $request->validated('name'),
            'sort_order'       => $maxOrder + 1,
        ]);

        return redirect()
            ->route('Workouts.category')
            ->with('success', 'زیرمجموعه با موفقیت اضافه شد.');
    }

    /**
     * حذف عضله (به‌همراه زیرمجموعه‌ها و تمرین‌ها به‌خاطر cascade)
     */
    public function destroyMuscleGroup(MuscleGroup $muscleGroup): RedirectResponse
    {
        $muscleGroup->delete();
        return redirect()
            ->route('Workouts.category')
            ->with('success', 'عضله با موفقیت حذف شد.');
    }

    /**
     * حذف تمرین
     */
    public function destroyExercise(WorkoutExercise $exercise): RedirectResponse
    {
        $exercise->delete();
        return redirect()
            ->route('Workouts.category')
            ->with('success', 'تمرین با موفقیت حذف شد.');
    }
}
