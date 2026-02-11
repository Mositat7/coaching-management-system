<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NutritionPlan extends Model
{
    protected $table = 'nutrition_plans';

    protected $fillable = [
        'name',
        'goal',
        'level',
        'duration_days',
        'daily_calories',
        'description',
        'notes',
        'supplements',
        'restrictions',
        'coach_id',
    ];

    protected $casts = [
        'duration_days' => 'integer',
        'daily_calories' => 'integer',
        'supplements' => 'array',
        'restrictions' => 'array',
        'coach_id' => 'integer',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function days(): HasMany
    {
        return $this->hasMany(NutritionPlanDay::class, 'nutrition_plan_id')
            ->orderBy('sort_order')
            ->orderBy('day_index');
    }
}

