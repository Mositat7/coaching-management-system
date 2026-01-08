<?php

namespace App\Http\Requests\Coach;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoachRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // یا منطق دسترسی مورد نظرت
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|regex:/^09[0-9]{9}$/|unique:coaches,mobile',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'biography' => 'nullable|string|max:2000',
            'certificates' => 'nullable|string|max:1000',
            'training_style' => 'required|in:strict,moderate,gentle',
            'specializations' => 'nullable|array',
            'specializations.*' => 'string|max:100',
            'status' => 'required|in:active,inactive,suspended',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'نام و نام خانوادگی الزامی است.',
            'mobile.required' => 'شماره موبایل الزامی است.',
            'mobile.regex' => 'فرمت شماره موبایل صحیح نیست. (مثال: 09123456789)',
            'mobile.unique' => 'این شماره موبایل قبلاً ثبت شده است.',
            'avatar.image' => 'فایل انتخاب شده باید تصویر باشد.',
            'avatar.mimes' => 'فرمت تصویر باید jpeg, png یا jpg باشد.',
            'avatar.max' => 'حجم تصویر نباید بیشتر از 2 مگابایت باشد.',
            'experience_years.integer' => 'سابقه کاری باید عدد باشد.',
            'experience_years.min' => 'سابقه کاری نمی‌تواند منفی باشد.',
            'experience_years.max' => 'سابقه کاری نمی‌تواند بیشتر از 50 سال باشد.',
            'training_style.required' => 'روش تمرین الزامی است.',
            'training_style.in' => 'روش تمرین انتخاب شده معتبر نیست.',
            'status.required' => 'وضعیت الزامی است.',
            'status.in' => 'وضعیت انتخاب شده معتبر نیست.',
        ];
    }
}
