<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachAuth extends Model
{
    protected $table = 'coach_auth';

    protected $fillable = [
        'coach_id',
        'otp_code',
        'otp_expires_at',
        'otp_attempts',
        'otp_blocked_until',
        'last_login_at',
        'last_login_ip',
        'last_login_device'
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
        'otp_blocked_until' => 'datetime',
        'last_login_at' => 'datetime'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
