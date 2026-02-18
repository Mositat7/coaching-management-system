<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramRequest extends Model
{
    protected $table = 'program_requests';

    protected $fillable = [
        'member_id',
        'type',
        'body',
        'status',
        'coach_note',
    ];

    public const TYPE_WORKOUT = 'workout';
    public const TYPE_NUTRITION = 'nutrition';

    public const STATUS_PENDING = 'pending';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_DONE = 'done';

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            self::TYPE_WORKOUT => 'برنامه تمرینی',
            self::TYPE_NUTRITION => 'برنامه تغذیه',
            default => $this->type,
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING => 'در انتظار',
            self::STATUS_IN_PROGRESS => 'در حال تهیه',
            self::STATUS_DONE => 'انجام شد',
            default => $this->status,
        };
    }
}
