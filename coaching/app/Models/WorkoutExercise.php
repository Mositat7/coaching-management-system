<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * مدل حرکت تمرینی (جلو بازو هالتر، دیپ پشت بازو، ...)
 * هر تمرین به یک زیرمجموعه تعلق دارد.
 */
class WorkoutExercise extends Model
{
    protected $table = 'workout_exercises';

    protected $fillable = [
        'muscle_sub_group_id',
        'name',
        'sort_order',
    ];

    protected $casts = [
        'muscle_sub_group_id' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * زیرمجموعهٔ والد
     */
    public function muscleSubGroup(): BelongsTo
    {
        return $this->belongsTo(MuscleSubGroup::class, 'muscle_sub_group_id');
    }
}
