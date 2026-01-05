<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateCoach
{
    public function handle(Request $request, Closure $next)
    {
        // بررسی لاگین با سیستم Session شما
        if (!Session::has('coach_logged_in') || !Session::has('coach_id')) {
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'لطفاً ابتدا وارد شوید.']);
        }

        // برای امنیت بیشتر، بررسی وجود مربی در دیتابیس
        $coachId = Session::get('coach_id');
        $coach = \App\Models\Coach::find($coachId);

        if (!$coach) {
            Session::flush();
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'حساب کاربری یافت نشد.']);
        }

        if ($coach->status !== 'active') {
            Session::flush();
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'حساب شما غیرفعال است.']);
        }

        return $next($request);
    }
}
