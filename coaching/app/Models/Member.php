<?php

namespace App\Models;

use App\Helpers\Jalali;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $table = 'members';

    protected $fillable = [
        'full_name',
        'mobile',
        'code',
        'avatar',
        'coach_id',
        'subscription_type',
        'subscription_expires_at',
        'attendance_sessions',
        'status',
    ];

    protected $casts = [
        'subscription_expires_at' => 'date',
        'attendance_sessions'     => 'integer',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    /**
     * وضعیت اشتراک برای نمایش: active, expired, suspended, expiring_soon
     */
    public function getSubscriptionStatusAttribute(): string
    {
        if ($this->status === 'suspended') {
            return 'suspended';
        }
        if (! $this->subscription_expires_at) {
            return 'active';
        }
        if ($this->subscription_expires_at->isPast()) {
            return 'expired';
        }
        if (! $this->subscription_expires_at->isPast() && $this->subscription_expires_at->diffInDays(now()) <= 7) {
            return 'expiring_soon';
        }

        return 'active';
    }

    /**
     * برچسب نوع اشتراک برای نمایش (فارسی)
     */
    public function getSubscriptionTypeLabelAttribute(): string
    {
        return match ($this->subscription_type) {
            'monthly' => 'ماهیانه',
            '3month'  => 'سه ماهه',
            '6month'  => '۶ ماهه',
            'yearly'  => 'سالانه',
            default   => $this->subscription_type,
        };
    }

    /**
     * تولید کد یکتا عضو (مثل MB-1001)
     */
    public static function generateCode(): string
    {
        $last = self::withTrashed()->orderBy('id', 'desc')->first();
        $num = $last ? (int) preg_replace('/\D/', '', $last->code) + 1 : 1;

        return 'MB-' . str_pad((string) $num, 4, '0', STR_PAD_LEFT);
    }

    /**
     * آدرس آواتار یا پیش‌فرض
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($this->avatar);
        }

        return asset('assets/images/users/avatar-2.jpg');
    }

    /**
     * متن انقضا برای نمایش: «X روز دیگر» یا «X روز قبل»
     * با startOfDay تا تفاوت بر اساس روز تقویمی باشد (منطقه زمانی ایران).
     */
    public function getExpiryLabelAttribute(): ?string
    {
        if (! $this->subscription_expires_at) {
            return null;
        }
        $expiresAt = $this->subscription_expires_at->copy()->startOfDay();
        $today = now()->startOfDay();
        $days = (int) $expiresAt->diffInDays($today, false);
        if ($days > 0) {
            return (string) $days . ' روز دیگر';
        }
        if ($days < 0) {
            return (string) abs($days) . ' روز قبل';
        }

        return 'امروز';
    }

    /**
     * تاریخ انقضای اشتراک به شمسی برای نمایش (مثلاً 1403/11/25)
     */
    public function getSubscriptionExpiresAtShamsiAttribute(): ?string
    {
        return Jalali::format($this->subscription_expires_at);
    }

    /**
     * لینک ورود به پنل شاگرد (برای ارسال توسط مربی) — معتبر برای ۷ روز
     */
    public function getEntryUrlAttribute(): string
    {
        $token = encrypt([
            'member_id' => $this->id,
            'exp'       => now()->addDays(7)->timestamp,
        ]);

        return route('member.enter', ['token' => $token]);
    }
}
