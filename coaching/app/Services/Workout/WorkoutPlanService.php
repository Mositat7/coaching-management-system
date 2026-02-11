<?php

namespace App\Services\Workout;

use App\Models\WorkoutPlan;

class WorkoutPlanService
{
    /**
     * ساخت برنامهٔ جدید به‌همراه روزها و تمرین‌ها از آرایهٔ اعتبارسنجی‌شده.
     */
    public function createFromArray(array $data, ?int $coachId = null): WorkoutPlan
    {
        $plan = WorkoutPlan::create([
            'name'               => $data['name'],
            'description'        => $data['description'] ?? null,
            'weeks_count'        => (int) ($data['weeks_count'] ?? 4),
            'level'              => $data['level'] ?? 'medium',
            'estimated_calories' => isset($data['estimated_calories']) ? (int) $data['estimated_calories'] : null,
            'equipment'          => $data['equipment'] ?? null,
            'safety_notes'       => $data['safety_notes'] ?? null,
            'coach_id'           => $coachId,
        ]);

        $this->syncDaysAndExercises($plan, $data['days'] ?? []);

        return $plan;
    }

    /**
     * آپدیت برنامهٔ موجود به‌همراه جایگزینی روزها و تمرین‌ها.
     */
    public function updateFromArray(WorkoutPlan $plan, array $data): WorkoutPlan
    {
        $plan->update([
            'name'               => $data['name'],
            'description'        => $data['description'] ?? null,
            'weeks_count'        => (int) ($data['weeks_count'] ?? 4),
            'level'              => $data['level'] ?? 'medium',
            'estimated_calories' => isset($data['estimated_calories']) ? (int) $data['estimated_calories'] : null,
            'equipment'          => $data['equipment'] ?? null,
            'safety_notes'       => $data['safety_notes'] ?? null,
        ]);

        $plan->days()->delete();
        $this->syncDaysAndExercises($plan, $data['days'] ?? []);

        return $plan;
    }

    /**
     * ساخت روزها و تمرین‌ها بر اساس ساختار days[*] و exercises[*].
     */
    protected function syncDaysAndExercises(WorkoutPlan $plan, array $days): void
    {
        foreach ($days as $sortOrder => $dayData) {
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
    }
}

