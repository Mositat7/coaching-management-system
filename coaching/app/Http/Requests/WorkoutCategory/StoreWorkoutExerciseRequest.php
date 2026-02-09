<?php

namespace App\Http\Requests\WorkoutCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutExerciseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'muscle_sub_group_id' => 'required|integer|exists:muscle_sub_groups,id',
            'name'                => 'required|string|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'muscle_sub_group_id.required' => 'زیرمجموعه مشخص نیست.',
            'muscle_sub_group_id.exists'   => 'زیرمجموعه نامعتبر است.',
            'name.required'                => 'نام تمرین را وارد کنید.',
            'name.max'                     => 'نام تمرین حداکثر ۲۰۰ کاراکتر باشد.',
        ];
    }
}
