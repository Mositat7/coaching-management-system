<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $memberId = Session::get('member_id');

        if ($request->filled('member_id') && app()->environment('local')) {
            $memberId = (int) $request->member_id;
            Session::put('member_id', $memberId);
        }

        if (! $memberId) {
            return view('member.guest');
        }

        $member = Member::with(['coach', 'programRequests'])->find($memberId);
        if (! $member) {
            Session::forget('member_id');
            return view('member.guest');
        }

        return view('member.dashboard', [
            'member'          => $member,
            'programRequests' => $member->programRequests()->limit(10)->get(),
        ]);
    }
}
