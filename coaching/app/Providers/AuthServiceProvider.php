<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        // ایجاد guard مخصوص مربیان
        Auth::viaRequest('coach-session', function ($request) {
            if ($request->session()->has('coach_id')) {
                return \App\Models\admin\Coach::find(
                    $request->session()->get('coach_id')
                );
            }
            return null;
        });
    }
}
