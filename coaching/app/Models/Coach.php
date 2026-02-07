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
        /** @var \Illuminate\Filesystem\FilesystemAdapter $storage */
        $storage = \Illuminate\Support\Facades\Storage::disk('public');

        if ($this->avatar && $this->avatar !== '' && $storage->exists($this->avatar)) {
            return $storage->url($this->avatar);
        }

        return asset('assets/images/users/coach-default.jpg');
    }

    public function coachAuth()
    {
        return $this->hasOne(CoachAuth::class, 'coach_id');
    }
    public function scopeSearch($query, ?string $term)
    {
        if (empty($term = trim($term))) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('full_name', 'like', "%{$term}%")
                ->orWhere('mobile', 'like', "%{$term}%")
                ->orWhere('code', 'like', "%{$term}%");
        });
    }

    public function scopeWhenStatus($query, ?string $status)
    {
        if (!$status) {
            return $query;
        }

        // فقط مقادیر مجاز انگلیسی رو بپذیر
        $allowed = ['active', 'inactive', 'suspended'];

        if (in_array($status, $allowed, true)) {
            return $query->where('status', $status);
        }

        return $query;
    }
}
