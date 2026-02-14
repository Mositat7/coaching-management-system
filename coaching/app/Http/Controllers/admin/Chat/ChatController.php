<?php

namespace App\Http\Controllers\admin\Chat;

use App\Helpers\Jalali;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Services\Chat\ChatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function __construct(
        protected ChatService $chatService
    ) {
    }

    public function index(): View
    {
        $coachId = (int) Session::get('coach_id');
        $conversations = $coachId ? $this->chatService->getConversationsForCoach($coachId) : collect();
        $membersForNew = $coachId ? Member::where('coach_id', $coachId)->orderBy('full_name')->get(['id', 'full_name']) : collect();

        return view('admin.chat.index', [
            'conversations'   => $conversations,
            'membersForNew'   => $membersForNew,
        ]);
    }

    /**
     * پیام‌های یک مکالمه (برای AJAX)
     */
    public function messages(Member $member): JsonResponse
    {
        $coachId = (int) Session::get('coach_id');
        if (! $coachId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->chatService->markAsRead($coachId, $member->id);
        $messages = $this->chatService->getMessages($coachId, $member->id, 100);

        return response()->json([
            'member'   => ['id' => $member->id, 'full_name' => $member->full_name],
            'messages' => $messages->getCollection()->map(fn ($m) => [
                'id'            => $m->id,
                'body'          => $m->body,
                'is_from_coach' => $m->is_from_coach,
                'created_at'    => $m->created_at->format('H:i'),
                'created_date'  => $m->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($m->created_at),
                'read_at'       => $m->read_at?->format('Y-m-d H:i'),
                'edited_at'     => $m->edited_at?->format('Y-m-d H:i'),
            ]),
        ]);
    }

    /**
     * ارسال پیام (برای AJAX)
     */
    public function send(Request $request): JsonResponse
    {
        $coachId = (int) Session::get('coach_id');
        if (! $coachId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'body'      => 'required|string|max:2000',
        ]);

        $msg = $this->chatService->sendFromCoach($coachId, (int) $request->member_id, $request->body);

        return response()->json([
            'message' => [
                'id'            => $msg->id,
                'body'          => $msg->body,
                'is_from_coach' => true,
                'created_at'    => $msg->created_at->format('H:i'),
                'created_date'  => $msg->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($msg->created_at),
                'read_at'       => null,
                'edited_at'     => null,
            ],
        ]);
    }

    /**
     * ویرایش پیام مربی
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $coachId = (int) Session::get('coach_id');
        if (! $coachId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate(['body' => 'required|string|max:2000']);

        $msg = $this->chatService->updateByCoach($id, $coachId, $request->body);
        if (! $msg) {
            return response()->json(['error' => 'پیام یافت نشد یا قابل ویرایش نیست.'], 404);
        }

        return response()->json([
            'message' => [
                'id'            => $msg->id,
                'body'          => $msg->body,
                'is_from_coach' => true,
                'created_at'    => $msg->created_at->format('H:i'),
                'created_date'  => $msg->created_at->format('Y-m-d'),
                'date_label'    => Jalali::chatDateLabel($msg->created_at),
                'read_at'       => $msg->read_at?->format('Y-m-d H:i'),
                'edited_at'     => $msg->edited_at?->format('Y-m-d H:i'),
            ],
        ]);
    }

    /**
     * حذف پیام مربی
     */
    public function destroy(int $id): JsonResponse
    {
        $coachId = (int) Session::get('coach_id');
        if (! $coachId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $ok = $this->chatService->deleteByCoach($id, $coachId);
        if (! $ok) {
            return response()->json(['error' => 'پیام یافت نشد یا قابل حذف نیست.'], 404);
        }

        return response()->json(['success' => true]);
    }
}
