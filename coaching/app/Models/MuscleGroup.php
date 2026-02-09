<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * مدل عضله (بازو، پا، سینه، ...)
 * هر عضله چند زیرمجموعه دارد (جلو بازو، پشت بازو، ...)
 */
class MuscleGroup extends Model
{
    protected $table = 'muscle_groups';

    protected $fillable = [
        'name',
        'icon',
        'color_slug',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * زیرمجموعه‌های این عضله
     */
    public function subGroups(): HasMany
    {
        return $this->hasMany(MuscleSubGroup::class, 'muscle_group_id')->orderBy('sort_order');
    }
}
