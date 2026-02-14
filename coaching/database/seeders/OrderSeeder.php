<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\Member;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $coach = Coach::first();
        if (! $coach) {
            return;
        }
        $coachId = $coach->id;
        $members = Member::take(4)->pluck('id')->toArray();
        if (empty($members)) {
            return;
        }

        if (Order::where('coach_id', $coachId)->exists()) {
            return;
        }

        $samples = [
            ['type' => 'workout', 'goal' => 'افزایش حجم عضلانی', 'description' => 'می‌خوام برنامه تمرینی برای حجم بگیرم، هفته‌ای ۴ جلسه.', 'status' => 'pending', 'priority' => 'high'],
            ['type' => 'nutrition', 'goal' => 'کاهش وزن', 'description' => 'درخواست برنامه غذایی برای کاهش چربی با کالری محدود.', 'status' => 'pending', 'priority' => 'normal'],
            ['type' => 'workout', 'goal' => 'تناسب اندام', 'description' => 'برنامه تمرینی عمومی برای حفظ تناسب.', 'status' => 'accepted', 'priority' => 'normal'],
            ['type' => 'nutrition', 'goal' => 'افزایش وزن', 'description' => 'برنامه پرکالری برای افزایش وزن سالم.', 'status' => 'rejected', 'priority' => 'low'],
        ];

        foreach ($samples as $i => $data) {
            Order::create([
                'coach_id'    => $coachId,
                'member_id'   => $members[$i % count($members)],
                'type'        => $data['type'],
                'goal'        => $data['goal'],
                'description' => $data['description'],
                'status'      => $data['status'],
                'priority'    => $data['priority'],
            ]);
        }
    }
}
