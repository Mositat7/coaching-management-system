<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف قبلی‌ها (اگر وجود دارند)
        \App\Models\admin\Coach::query()->delete();

// ایجاد مربی اول
        $coach1 = \App\Models\admin\Coach::create([
            'full_name' => 'علی محمدی',
            'mobile' => '09123456789',
            'avatar' => null,
            'experience_years' => 5,
            'biography' => 'مربی حرفه‌ای بدنسازی با ۵ سال سابقه',
            'certificates' => 'مدرک مربی‌گری درجه ۱ فدراسیون بدنسازی',
            'training_style' => 'strict',
            'specializations' => json_encode(['بدنسازی', 'تناسب اندام', 'کاهش وزن']),
            'code' => 'COACH001',
            'status' => 'active',
        ]);

// ایجاد مربی دوم
        $coach2 = \App\Models\admin\Coach::create([
            'full_name' => 'مریم کریمی',
            'mobile' => '09129876543',
            'avatar' => null,
            'experience_years' => 3,
            'biography' => 'مربی یوگا و پیلاتس',
            'certificates' => 'مدرک بین‌المللی یوگا',
            'training_style' => 'gentle',
            'specializations' => json_encode(['یوگا', 'پیلاتس', 'مدیتیشن']),
            'code' => 'COACH002',
            'status' => 'active',
        ]);

        echo "✅ مربیان ایجاد شدند:\n";
        echo "1. {$coach1->full_name} - {$coach1->mobile}\n";
        echo "2. {$coach2->full_name} - {$coach2->mobile}\n";
    }
}
