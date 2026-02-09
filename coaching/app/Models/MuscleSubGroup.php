<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * مدل زیرمجموعهٔ عضله (جلو بازو، پشت بازو، ...)
 * هر زیرمجموعه به یک عضله تعلق دارد و چند تمرین دارد.
 */
class MuscleSubGroup extends Model
{
    protected $table = 'muscle_sub_groups';

    protected $fillable = [
        'muscle_group_id',
        'name',
        'sort_order',
    ];

    protected $casts = [
        'muscle_group_id' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * عضلهٔ والد
     */
    public function muscleGroup(): BelongsTo
    {
        return $this->belongsTo(MuscleGroup::class, 'muscle_group_id');
    }

    /**
     * تمرین‌های این زیرمجموعه
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class, 'muscle_sub_group_id')->orderBy('sort_order');
    }
}
