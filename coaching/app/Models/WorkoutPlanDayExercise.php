<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * یک تمرین داخل یک روز برنامه (از کتابخانه یا دستی)
 */
class WorkoutPlanDayExercise extends Model
{
    protected $table = 'workout_plan_day_exercises';

    protected $fillable = [
        'workout_plan_day_id',
        'workout_exercise_id',
        'custom_name',
        'sets_count',
        'reps_text',
        'rest_seconds',
        'notes',
        'sort_order',
    ];

    protected $casts = [
        'workout_plan_day_id' => 'integer',
        'workout_exercise_id' => 'integer',
        'sets_count' => 'integer',
        'rest_seconds' => 'integer',
        'sort_order' => 'integer',
    ];

    public function workoutPlanDay(): BelongsTo
    {
        return $this->belongsTo(WorkoutPlanDay::class, 'workout_plan_day_id');
    }

    public function workoutExercise(): BelongsTo
    {
        return $this->belongsTo(WorkoutExercise::class, 'workout_exercise_id');
    }

    /** نام نمایشی: از کتابخانه یا custom_name */
    public function getDisplayNameAttribute(): string
    {
        if ($this->workout_exercise_id && $this->workoutExercise) {
            return $this->workoutExercise->name;
        }
        return $this->custom_name ?? '—';
    }
}
