<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaches = Coach::take(2)->get();
        $coachIds = $coaches->pluck('id')->toArray();

        $members = [
            ['full_name' => 'باربد باباخانی', 'mobile' => '09010010011', 'subscription_type' => '3month', 'subscription_expires_at' => now()->addDays(15), 'attendance_sessions' => 24, 'status' => 'active'],
            ['full_name' => 'شیرین رضایی', 'mobile' => '09010010012', 'subscription_type' => 'monthly', 'subscription_expires_at' => now()->addDays(5), 'attendance_sessions' => 18, 'status' => 'active'],
            ['full_name' => 'ایلیا میرزایی', 'mobile' => '09010010013', 'subscription_type' => '3month', 'subscription_expires_at' => now()->addDays(2), 'attendance_sessions' => 32, 'status' => 'active'],
            ['full_name' => 'نسترن سلطانی', 'mobile' => '09010010014', 'subscription_type' => 'monthly', 'subscription_expires_at' => now()->subDays(3), 'attendance_sessions' => 12, 'status' => 'active'],
            ['full_name' => 'زهرا عطایی', 'mobile' => '09010010015', 'subscription_type' => '6month', 'subscription_expires_at' => now()->addDays(45), 'attendance_sessions' => 28, 'status' => 'active'],
            ['full_name' => 'امیرارسلان رهنما', 'mobile' => '09010010016', 'subscription_type' => 'monthly', 'subscription_expires_at' => now()->addDays(10), 'attendance_sessions' => 8, 'status' => 'suspended'],
        ];

        foreach ($members as $index => $data) {
            $data['coach_id'] = $coachIds[$index % count($coachIds)] ?? null;
            $member = Member::query()->firstOrNew(['mobile' => $data['mobile']]);
            if (! $member->exists) {
                $member->code = Member::generateCode();
            }
            $member->fill($data);
            $member->save();
        }
    }
}
