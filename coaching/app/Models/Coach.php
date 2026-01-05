<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $fillable = [
        'mobile',
        'full_name',
        'status'
    ];

    public function coachAuth()
    {
        return $this->hasOne(CoachAuth::class, 'coach_id');
    }
}
