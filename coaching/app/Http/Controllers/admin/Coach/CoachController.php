<?php

namespace App\Http\Controllers\admin\Coach;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoachController extends Controller
{
    /**
     * Show the form for creating a new coach
     */
    public function add()
    {
        $nextCode = Coach::generateCode();
        return view('admin.coaches.coach-add', compact('nextCode'));
    }

    /**
     * Store a newly created coach
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|regex:/^09[0-9]{9}$/|unique:coaches,mobile',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'biography' => 'nullable|string|max:2000',
            'certificates' => 'nullable|string|max:1000',
            'training_style' => 'required|in:strict,moderate,gentle',
            'specializations' => 'nullable|array',
            'specializations.*' => 'string|max:100',
            'status' => 'required|in:active,inactive,suspended'
        ], [
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
        ]);

        try {
            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = 'coaches/' . Str::random(20) . '.' . $avatar->getClientOriginalExtension();
                $avatar->storeAs('public', $avatarName);
                $validated['avatar'] = $avatarName;
            }

            // Generate unique code
            $validated['code'] = Coach::generateCode();

            // Convert specializations array to JSON
            if (isset($validated['specializations'])) {
                $validated['specializations'] = json_encode($validated['specializations']);
            }

            // Create coach
            $coach = Coach::create($validated);

            return redirect()->route('Coach.add')
                ->with('success', "مربی با کد {$coach->code} با موفقیت ثبت شد.");

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'خطا در ثبت مربی: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified coach
     */
    public function destroy(string $id)
    {
        try {
            $coach = Coach::findOrFail($id);

            // Delete avatar if exists
            if ($coach->avatar && Storage::exists('public/' . $coach->avatar)) {
                Storage::delete('public/' . $coach->avatar);
            }

            $coach->delete();

            return redirect()->back()
                ->with('success', 'مربی با موفقیت حذف شد.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'خطا در حذف مربی: ' . $e->getMessage()]);
        }
    }
}
