<?php

namespace App\Http\Controllers\admin\Members;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Member\MemberListService;
class MemberController extends Controller
{
    public function add(): View
    {
        return view('admin.members.members-add');
    }

    public function details(?Member $member = null): View
    {
        if ($member) {
            $member->load('coach');
        }

        return view('admin.members.members-details', ['member' => $member]);
    }


    public function list(Request $request, MemberListService $memberService): View
    {
        return view('admin.members.members-list', [
            'members' => $memberService->getFilteredMembers($request),
            'stats'   => $memberService->getStats(),
            'coaches' => $memberService->getCoaches(),
            'request' => $request,
        ]);
    }

    public function grid(): View
    {
        return view('admin.members.members-grid');
    }

    public function destroy(string $id): void
    {
        //
    }
}
