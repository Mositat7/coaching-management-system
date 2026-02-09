<?php

namespace App\Http\Requests\WorkoutCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuscleSubGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'muscle_group_id' => 'required|integer|exists:muscle_groups,id',
            'name'            => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'muscle_group_id.required' => 'عضله مشخص نیست.',
            'muscle_group_id.exists'   => 'عضله نامعتبر است.',
            'name.required'           => 'نام زیرمجموعه را وارد کنید.',
            'name.max'                 => 'نام زیرمجموعه حداکثر ۱۰۰ کاراکتر باشد.',
        ];
    }
}
