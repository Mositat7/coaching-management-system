<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * تبدیل تاریخ میلادی به شمسی (جلالی) برای نمایش.
 * دیتابیس میلادی نگه داشته می‌شود؛ فقط خروجی برای کاربر شمسی است.
 */
class Jalali
{
    /**
     * تبدیل تاریخ به رشتهٔ شمسی با فرمت Y/m/d (مثلاً 1403/11/25)
     */
    public static function format(?Carbon $date, string $format = 'Y/m/d'): ?string
    {
        if (! $date) {
            return null;
        }

        $y = (int) $date->format('Y');
        $m = (int) $date->format('n');
        $d = (int) $date->format('j');

        $j = self::gregorianToJalali($y, $m, $d);
        if (! $j) {
            return $date->format('Y/m/d');
        }

        [$jy, $jm, $jd] = $j;

        $replace = [
            'Y' => (string) $jy,
            'm' => str_pad((string) $jm, 2, '0', STR_PAD_LEFT),
            'd' => str_pad((string) $jd, 2, '0', STR_PAD_LEFT),
        ];

        return str_replace(array_keys($replace), array_values($replace), $format);
    }

    /**
     * میلادی به جلالی (الگوریتم استاندارد)
     */
    public static function gregorianToJalali(int $g_y, int $g_m, int $g_d): array
    {
        $gy = $g_y - 1600;
        $gm = $g_m - 1;
        $gd = $g_d - 1;
        $g_day_no = 365 * $gy + (int) (($gy + 3) / 4) - (int) (($gy + 99) / 100) + (int) (($gy + 399) / 400) - 80 + $gd + (int) ((153 * $gm + 2) / 5);
        $j_day_no = $g_day_no - 79;
        $j_np = (int) ($j_day_no / 12053);
        $j_day_no = $j_day_no % 12053;
        $jy = 979 + 33 * $j_np + 4 * (int) ($j_day_no / 1461);
        $j_day_no %= 1461;
        if ($j_day_no >= 366) {
            $jy += (int) (($j_day_no - 1) / 365);
            $j_day_no = ($j_day_no - 1) % 365;
        }
        $jm = ($j_day_no < 186) ? 1 + (int) ($j_day_no / 31) : 7 + (int) (($j_day_no - 186) / 30);
        $jd = 1 + (($j_day_no < 186) ? ($j_day_no % 31) : (($j_day_no - 186) % 30));

        return [$jy, $jm, $jd];
    }
}
