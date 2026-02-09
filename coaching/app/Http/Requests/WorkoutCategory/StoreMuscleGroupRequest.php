<?php

namespace App\Http\Requests\WorkoutCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuscleGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:100',
            'icon'      => 'nullable|string|max:80',
            'color_slug'=> 'required|in:primary,success,danger,warning,info',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'نام عضله را وارد کنید.',
            'name.max'        => 'نام عضله حداکثر ۱۰۰ کاراکتر باشد.',
            'color_slug.in'   => 'رنگ نامعتبر است.',
        ];
    }
}
