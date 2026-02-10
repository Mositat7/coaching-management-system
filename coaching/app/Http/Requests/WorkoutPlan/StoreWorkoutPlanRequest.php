<?php

namespace App\Http\Requests\WorkoutPlan;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        // احراز هویت قبلاً با میدلور auth.coach انجام می‌شود
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],

            'days'                     => ['nullable', 'array'],
            'days.*.day_index'         => ['required', 'integer', 'min:0', 'max:31'],
            'days.*.title'             => ['nullable', 'string', 'max:255'],
            'days.*.focus'             => ['nullable', 'string', 'max:255'],
            'days.*.duration_minutes'  => ['nullable', 'integer', 'min:1', 'max:300'],
            'days.*.difficulty'        => ['nullable', 'string', 'in:easy,medium,hard'],
            'days.*.notes'             => ['nullable', 'string', 'max:2000'],

            'days.*.exercises'                          => ['nullable', 'array'],
            'days.*.exercises.*.workout_exercise_id'    => ['nullable', 'integer', 'exists:workout_exercises,id'],
            'days.*.exercises.*.custom_name'            => ['nullable', 'string', 'max:255'],
            'days.*.exercises.*.sets_count'             => ['nullable', 'integer', 'min:1', 'max:20'],
            'days.*.exercises.*.reps_text'              => ['nullable', 'string', 'max:100'],
            'days.*.exercises.*.rest_seconds'           => ['nullable', 'integer', 'min:0', 'max:600'],
            'days.*.exercises.*.notes'                  => ['nullable', 'string', 'max:1000'],
        ];
    }
}

