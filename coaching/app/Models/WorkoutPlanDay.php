<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * یک روز از برنامه ورزشی
 */
class WorkoutPlanDay extends Model
{
    protected $table = 'workout_plan_days';

    protected $fillable = [
        'workout_plan_id',
        'day_index',
        'title',
        'focus',
        'duration_minutes',
        'difficulty',
        'notes',
        'sort_order',
    ];

    protected $casts = [
        'workout_plan_id' => 'integer',
        'day_index' => 'integer',
        'duration_minutes' => 'integer',
        'sort_order' => 'integer',
    ];

    public function workoutPlan(): BelongsTo
    {
        return $this->belongsTo(WorkoutPlan::class, 'workout_plan_id');
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(WorkoutPlanDayExercise::class, 'workout_plan_day_id')->orderBy('sort_order');
    }
}
