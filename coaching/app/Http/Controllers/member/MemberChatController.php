<?php

namespace App\Http\Controllers\member;

use App\Helpers\Jalali;
use App\Http\Controllers\Controller;
use App\Services\Chat\ChatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class MemberChatController extends Controller
{
    public function __construct(
        protected ChatService $chatService
    ) {
    }

    /**
     * صفحه چت با مربی
     */
    public function index(): View|RedirectResponse
    {
        $memberId = (int) Session::get('member_id');
        if (! $memberId) {
            return redirect()->route('dashboard.member')->with('error', 'لطفاً وارد پنل شوید.');
        }

        $member = \App\Models\Member::with('coach')->find($memberId);
        if (! $member) {
            Session::forget('member_id');
            return redirect()->route('dashboard.member')->with('error', 'عضو یافت نشد.');
        }

        $this->chatService->markCoachMessagesAsReadByMember($memberId);
        $messages = $this->chatService->getMessagesForMember($memberId, 100);
        $messagesWithLabel = $messages->getCollection()->map(function ($m) {
            $m->date_label = Jalali::chatDateLabel($m->created_at);

            return $m;
        });

        return view('member.chat', [
            'member'   => $member,
            'messages' => $messagesWithLabel,
        ]);
    }

    /**
     * لیست پیام‌ها برای چت (AJAX - برای بروزرسانی بدون رفرش)
     */
    public function messages(): JsonResponse
    {
        $memberId = (int) Session::get('member_id');
        if (! $memberId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->chatService->markCoachMessagesAsReadByMember($memberId);
        $messages = $this->chatService->getMessagesForMember($memberId, 100);
        $list = $messages->getCollection()->map(function ($m) {
            return [
                'id'            => $m->id,
                'body'          => $m->body,
                'is_from_coach' => $m->is_from_coach,
                'created_at'    => $m->created_at->format('H:i'),
                'created_date'  => $m->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($m->created_at),
                'read_at'       => $m->read_at?->format('Y-m-d H:i'),
                'edited_at'     => $m->edited_at?->format('Y-m-d H:i'),
            ];
        });

        return response()->json(['messages' => $list->values()->all()]);
    }

    /**
     * ارسال پیام از طرف شاگرد (AJAX)
     */
    public function send(Request $request): JsonResponse
    {
        $memberId = (int) Session::get('member_id');
        if (! $memberId) {
            return response()->json(['error' => 'لطفاً وارد پنل شوید.'], 403);
        }

        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        try {
            $msg = $this->chatService->sendFromMember($memberId, $request->body);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }

        return response()->json([
            'message' => [
                'id'            => $msg->id,
                'body'          => $msg->body,
                'is_from_coach' => false,
                'created_at'    => $msg->created_at->format('H:i'),
                'created_date'  => $msg->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($msg->created_at),
                'read_at'       => null,
                'edited_at'     => null,
            ],
        ]);
    }

    /**
     * ویرایش پیام شاگرد
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $memberId = (int) Session::get('member_id');
        if (! $memberId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate(['body' => 'required|string|max:2000']);

        $msg = $this->chatService->updateByMember($id, $memberId, $request->body);
        if (! $msg) {
            return response()->json(['error' => 'پیام یافت نشد یا قابل ویرایش نیست.'], 404);
        }

        return response()->json([
            'message' => [
                'id'            => $msg->id,
                'body'          => $msg->body,
                'is_from_coach' => false,
                'created_at'    => $msg->created_at->format('H:i'),
                'created_date'  => $msg->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($msg->created_at),
                'read_at'       => $msg->read_at?->format('Y-m-d H:i'),
                'edited_at'     => $msg->edited_at?->format('Y-m-d H:i'),
            ],
        ]);
    }

    /**
     * حذف پیام شاگرد
     */
    public function destroy(int $id): JsonResponse
    {
        $memberId = (int) Session::get('member_id');
        if (! $memberId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $ok = $this->chatService->deleteByMember($id, $memberId);
        if (! $ok) {
            return response()->json(['error' => 'پیام یافت نشد یا قابل حذف نیست.'], 404);
        }

        return response()->json(['success' => true]);
    }
}
