<?php

namespace App\Http\Controllers\admin\nutrition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nutrition\StoreNutritionPlanRequest;
use App\Models\NutritionPlan;
use App\Services\Nutrition\NutritionPlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class NutritionController extends Controller
{
    public function __construct(
        protected NutritionPlanService $nutritionPlanService,
    ) {
    }

    public function create(): View
    {
        return view('admin.plans.nutrition.create');
    }

    public function store(StoreNutritionPlanRequest $request): RedirectResponse|JsonResponse
    {
        $data = $request->validated();
        $plan = $this->nutritionPlanService->createFromArray($data, Session::get('coach_id'));

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

    public function update(StoreNutritionPlanRequest $request, NutritionPlan $plan): RedirectResponse|JsonResponse
    {
        $data = $request->validated();
        $plan = $this->nutritionPlanService->updateFromArray($plan, $data);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'برنامه غذایی با موفقیت به‌روزرسانی شد.',
                'id'      => $plan->id,
            ]);
        }

        return redirect()
            ->route('plans.library')
            ->with('success', 'برنامه غذایی با موفقیت به‌روزرسانی شد.');
    }

    public function show(NutritionPlan $plan): View
    {
        $plan->load(['days.meals']);

        return view('admin.plans.nutrition.show', ['plan' => $plan]);
    }
}
