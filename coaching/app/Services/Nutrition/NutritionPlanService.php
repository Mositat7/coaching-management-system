<?php

namespace App\Services\Nutrition;

use App\Models\NutritionPlan;
use App\Models\NutritionPlanDay;

class NutritionPlanService
{
    /**
     * Create a new nutrition plan with days and meals from validated array.
     */
    public function createFromArray(array $data, ?int $coachId = null): NutritionPlan
    {
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
            'coach_id'        => $coachId,
        ]);

        $this->syncDaysAndMeals($plan, $data['days'] ?? []);

        return $plan;
    }

    /**
     * Update existing plan and replace days/meals with new structure.
     */
    public function updateFromArray(NutritionPlan $plan, array $data): NutritionPlan
    {
        $plan->update([
            'name'            => $data['name'],
            'goal'            => $data['goal'] ?? null,
            'level'           => $data['level'] ?? null,
            'duration_days'   => (int) ($data['duration_days'] ?? 7),
            'daily_calories'  => isset($data['daily_calories']) ? (int) $data['daily_calories'] : null,
            'description'     => $data['description'] ?? null,
            'notes'           => $data['notes'] ?? null,
            'supplements'     => $data['supplements'] ?? [],
            'restrictions'    => $data['restrictions'] ?? [],
        ]);

        $plan->days()->delete();
        $this->syncDaysAndMeals($plan, $data['days'] ?? []);

        return $plan;
    }

    /**
     * Create days and meals from days array structure.
     */
    protected function syncDaysAndMeals(NutritionPlan $plan, array $days): void
    {
        foreach ($days as $sortOrder => $dayData) {
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
    }
}
