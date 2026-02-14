<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'coach_id',
        'member_id',
        'type',
        'goal',
        'description',
        'status',
        'priority',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * نام و موبایل شاگرد برای نمایش در لیست (از عضو یا از توضیحات)
     */
    public function getMemberNameAttribute(): string
    {
        if ($this->member) {
            return $this->member->full_name;
        }
        return 'نامشخص';
    }

    public function getMemberPhoneAttribute(): ?string
    {
        return $this->member?->mobile;
    }
}
