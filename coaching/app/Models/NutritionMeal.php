<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionMeal extends Model
{
    protected $table = 'nutrition_meals';

    protected $fillable = [
        'nutrition_plan_day_id',
        'name',
        'time_text',
        'calories',
        'priority',
        'description',
        'items_json',
        'sort_order',
    ];

    protected $casts = [
        'nutrition_plan_day_id' => 'integer',
        'calories' => 'integer',
        'items_json' => 'array',
        'sort_order' => 'integer',
    ];

    public function day(): BelongsTo
    {
        return $this->belongsTo(NutritionPlanDay::class, 'nutrition_plan_day_id');
    }
}

