<?php

namespace App\Models;

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
}
