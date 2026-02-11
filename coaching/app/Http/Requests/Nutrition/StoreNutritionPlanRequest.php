<?php

namespace App\Http\Requests\Nutrition;

use Illuminate\Foundation\Http\FormRequest;

class StoreNutritionPlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:255'],
            'goal'            => ['nullable', 'string', 'max:50'],
            'level'           => ['nullable', 'string', 'in:beginner,intermediate,advanced'],
            'duration_days'   => ['nullable', 'integer', 'min:1', 'max:365'],
            'daily_calories'  => ['nullable', 'integer', 'min:0', 'max:5000'],
            'description'     => ['nullable', 'string', 'max:5000'],
            'notes'           => ['nullable', 'string', 'max:5000'],
            'supplements'     => ['nullable', 'array'],
            'supplements.*'   => ['string', 'max:100'],
            'restrictions'    => ['nullable', 'array'],
            'restrictions.*'  => ['string', 'max:100'],

            'days'                    => ['nullable', 'array'],
            'days.*.day_index'        => ['required', 'integer', 'min:0', 'max:365'],
            'days.*.title'            => ['nullable', 'string', 'max:255'],
            'days.*.notes'            => ['nullable', 'string', 'max:2000'],
            'days.*.meals'            => ['nullable', 'array'],

            'days.*.meals.*.name'        => ['required', 'string', 'max:255'],
            'days.*.meals.*.time_text'   => ['nullable', 'string', 'max:50'],
            'days.*.meals.*.calories'    => ['nullable', 'integer', 'min:0', 'max:2000'],
            'days.*.meals.*.priority'    => ['nullable', 'string', 'in:required,optional,if_possible'],
            'days.*.meals.*.description' => ['nullable', 'string', 'max:2000'],
            'days.*.meals.*.items'       => ['nullable', 'array'],
            'days.*.meals.*.items.*.name'     => ['nullable', 'string', 'max:255'],
            'days.*.meals.*.items.*.weight'   => ['nullable', 'numeric', 'min:0'],
            'days.*.meals.*.items.*.calories' => ['nullable', 'numeric', 'min:0'],
            'days.*.meals.*.items.*.protein'  => ['nullable', 'numeric', 'min:0'],
            'days.*.meals.*.items.*.carbs'    => ['nullable', 'numeric', 'min:0'],
            'days.*.meals.*.items.*.fat'      => ['nullable', 'numeric', 'min:0'],
        ];
    }
}

