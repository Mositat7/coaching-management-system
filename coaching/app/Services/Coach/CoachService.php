<?php

namespace App\Services\Coach;

use App\Models\Coach;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoachService
{
    public function createFromRequest(array $validated): Coach
    {
        // آپلود آواتار (فقط اگر فایل ارسال شده باشد)
        if (isset($validated['avatar']) && $validated['avatar'] instanceof UploadedFile) {
            $avatar = $validated['avatar'];
            $avatarName = $avatar->store('coaches', 'public');
            $validated['avatar'] = $avatarName;
        }

        // تولید کد منحصر به فرد
        $validated['code'] = Coach::generateCode();

        // تبدیل تخصص‌ها به JSON
        if (isset($validated['specializations'])) {
            $validated['specializations'] = json_encode($validated['specializations'], JSON_UNESCAPED_UNICODE);
        }

        // تنظیم مقادیر پیش‌فرض برای فیلدهای nullable
        $coachData = [
            'experience_years' => $validated['experience_years'] ?? 0,
            'biography' => $validated['biography'] ?? null,
            'certificates' => $validated['certificates'] ?? null,
            'avatar' => $validated['avatar'] ?? null,
            'specializations' => $validated['specializations'] ?? null,
        ];

        // ادغام با سایر داده‌های تأیید‌شده (مثل name, email و ...)
        $coachData = array_merge($validated, $coachData);

        return Coach::create($coachData);
    }
    
    public function destroyCoach(int $id): void
    {
        $coach = Coach::findOrFail($id);

        if ($coach->avatar && Storage::disk('public')->exists($coach->avatar)) {
            Storage::disk('public')->delete($coach->avatar);
        }

        $coach->delete();
    }
}
