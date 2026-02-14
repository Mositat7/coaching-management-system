<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class MemberEntryController extends Controller
{
    /**
     * ورود شاگرد با لینک مخصوص (توکن از طرف مربی)
     */
    public function enter(Request $request): RedirectResponse
    {
        $token = $request->query('token');
        if (! $token) {
            return redirect()->route('dashboard.member')->with('error', 'لینک نامعتبر است.');
        }

        try {
            $payload = Crypt::decrypt($token);
        } catch (\Throwable) {
            return redirect()->route('dashboard.member')->with('error', 'لینک منقضی یا نامعتبر است.');
        }

        $memberId = (int) ($payload['member_id'] ?? 0);
        $exp = (int) ($payload['exp'] ?? 0);
        if (! $memberId || $exp < time()) {
            return redirect()->route('dashboard.member')->with('error', 'لینک منقضی شده است.');
        }

        $member = Member::find($memberId);
        if (! $member) {
            return redirect()->route('dashboard.member')->with('error', 'عضو یافت نشد.');
        }

        Session::put('member_id', $member->id);
        return redirect()->route('dashboard.member')->with('success', 'خوش آمدید!');
    }

    public function logout(): RedirectResponse
    {
        Session::forget('member_id');
        return redirect()->route('dashboard.member')->with('info', 'از پنل خارج شدید.');
    }
}
