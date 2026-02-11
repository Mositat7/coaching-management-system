<?php

namespace App\Http\Controllers\Admin\nutrition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nutrition\StoreNutritionPlanRequest;
use App\Models\NutritionPlan;
use App\Models\NutritionPlanDay;
use App\Models\NutritionMeal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class NutritionController extends Controller
{
    public function create(): View
    {
        return view('admin.plans.nutrition.create');
    }

    public function store(StoreNutritionPlanRequest $request): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $plan = NutritionPlan::create([
            'name'            => $data['name'],
            'goal'            => $data['goal'] ?? null,
            'level'           => $data['level'] ?? null,
            'duration_days'   => (int) ($data['duration_days'] ?? 7),
            'daily_calories'  => isset($data['daily_calories']) ? (int) $data['daily_calories'] : null,
            'description'     => $data['description'] ?? null,
            'notes'           => $data['notes'] ?? null,
            'supplements'     => $data['supplements'] ?? [],
            'restrictions'    => $data['restrictions'] ?? [],
            'coach_id'        => Session::get('coach_id'),
        ]);

        foreach ($data['days'] ?? [] as $sortOrder => $dayData) {
            /** @var NutritionPlanDay $day */
            $day = $plan->days()->create([
                'day_index'  => (int) ($dayData['day_index'] ?? $sortOrder),
                'title'      => $dayData['title'] ?? null,
                'notes'      => $dayData['notes'] ?? null,
                'sort_order' => $sortOrder,
            ]);

            foreach ($dayData['meals'] ?? [] as $mealOrder => $mealData) {
                $day->meals()->create([
                    'name'        => $mealData['name'],
                    'time_text'   => $mealData['time_text'] ?? null,
                    'calories'    => isset($mealData['calories']) ? (int) $mealData['calories'] : 0,
                    'priority'    => $mealData['priority'] ?? 'required',
                    'description' => $mealData['description'] ?? null,
                    'items_json'  => $mealData['items'] ?? [],
                    'sort_order'  => $mealOrder,
                ]);
            }
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'برنامه غذایی با موفقیت ذخیره شد.',
                'id'      => $plan->id,
            ]);
        }

        return redirect()
            ->route('plans.library')
            ->with('success', 'برنامه غذایی با موفقیت ذخیره شد.');
    }

    public function edit(NutritionPlan $plan): View
    {
        $plan->load(['days.meals']);
        return view('admin.plans.nutrition.edit', ['plan' => $plan]);
    }

    public function show(NutritionPlan $plan): View
    {
        $plan->load(['days.meals']);
        return view('admin.plans.nutrition.show', ['plan' => $plan]);
    }
}
