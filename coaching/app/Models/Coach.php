<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use SoftDeletes;

    protected $table = 'coaches';

    protected $fillable = [
        'full_name',
        'mobile',
        'avatar',
        'experience_years',
        'biography',
        'certificates',
        'training_style',
        'specializations',
        'code',
        'status'
    ];

    protected $casts = [
        'specializations' => 'array',
        'experience_years' => 'integer'
    ];

    /**
     * Generate unique coach code
     */
    public static function generateCode(): string
    {
        $lastCoach = self::withTrashed()->orderBy('id', 'desc')->first();
        $lastNumber = $lastCoach ? (int) substr($lastCoach->code, 3) : 0;
        $newNumber = $lastNumber + 1;
        
        return 'CO-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Get avatar URL or default
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return asset('assets/images/users/coach-default.jpg');
    }

    public function coachAuth()
    {
        return $this->hasOne(CoachAuth::class, 'coach_id');
    }
}
