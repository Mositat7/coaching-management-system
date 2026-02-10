<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * برنامه ورزشی (یک برنامه چند روزه)
 */
class WorkoutPlan extends Model
{
    protected $table = 'workout_plans';

    protected $fillable = [
        'name',
        'description',
        'weeks_count',
        'level',
        'estimated_calories',
        'equipment',
        'safety_notes',
        'coach_id',
    ];

    protected $casts = [
        'coach_id' => 'integer',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function days(): HasMany
    {
        return $this->hasMany(WorkoutPlanDay::class, 'workout_plan_id')->orderBy('sort_order')->orderBy('day_index');
    }
}
