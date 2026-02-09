<?php

namespace Database\Seeders;

use App\Models\MuscleGroup;
use App\Models\MuscleSubGroup;
use App\Models\WorkoutExercise;
use Illuminate\Database\Seeder;

/**
 * دادهٔ اولیه برای دسته‌بندی تمرین‌ها (عضلات، زیرمجموعه‌ها، حرکات)
 */
class MuscleGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'بازو',
                'icon' => 'ri-armchair-line',
                'color_slug' => 'primary',
                'sort_order' => 1,
                'sub_groups' => [
                    [
                        'name' => 'جلو بازو',
                        'sort_order' => 1,
                        'exercises' => ['جلو بازو هالتر', 'جلو بازو لاری'],
                    ],
                    [
                        'name' => 'پشت بازو',
                        'sort_order' => 2,
                        'exercises' => ['پشت بازو سیم‌کش', 'دیپ پشت بازو'],
                    ],
                ],
            ],
            [
                'name' => 'پا',
                'icon' => 'ri-walk-line',
                'color_slug' => 'success',
                'sort_order' => 2,
                'sub_groups' => [],
            ],
            [
                'name' => 'سینه',
                'icon' => 'ri-heart-pulse-line',
                'color_slug' => 'danger',
                'sort_order' => 3,
                'sub_groups' => [],
            ],
        ];

        foreach ($groups as $g) {
            $subGroupsData = $g['sub_groups'];
            unset($g['sub_groups']);

            $group = MuscleGroup::create($g);

            foreach ($subGroupsData as $i => $sub) {
                $exercises = $sub['exercises'] ?? [];
                unset($sub['exercises']);
                $sub['muscle_group_id'] = $group->id;
                $sub['sort_order'] = $i + 1;

                $subGroup = MuscleSubGroup::create($sub);

                foreach ($exercises as $j => $name) {
                    WorkoutExercise::create([
                        'muscle_sub_group_id' => $subGroup->id,
                        'name' => $name,
                        'sort_order' => $j + 1,
                    ]);
                }
            }
        }
    }
}
