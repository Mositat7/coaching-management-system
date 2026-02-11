<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\ChildHasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NutritionPlanDay extends Model
{
    protected $table = 'nutrition_plan_days';

    protected $fillable = [
        'nutrition_plan_id',
        'day_index',
        'title',
        'notes',
        'sort_order',
    ];

    protected $casts = [
        'nutrition_plan_id' => 'integer',
        'day_index' => 'integer',
        'sort_order' => 'integer',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(NutritionPlan::class, 'nutrition_plan_id');
    }

    public function meals(): HasMany|ChildHasOneOrMany
    {
        return $this->hasMany(NutritionMeal::class, 'nutrition_plan_day_id')
            ->orderBy('sort_order');
    }
}

