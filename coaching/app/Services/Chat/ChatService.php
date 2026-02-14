<?php

namespace App\Services\Chat;

use App\Models\ChatMessage;
use App\Models\Member;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ChatService
{
    /**
     * لیست مکالمات مربی با اعضا (هر عضو با آخرین پیام و تعداد خوانده‌نشده)
     */
    public function getConversationsForCoach(int $coachId): Collection
    {
        $memberIds = ChatMessage::where('coach_id', $coachId)
            ->distinct()
            ->pluck('member_id');

        if ($memberIds->isEmpty()) {
            return collect();
        }

        $members = Member::whereIn('id', $memberIds)->get()->keyBy('id');

        $lastMessages = ChatMessage::where('coach_id', $coachId)
            ->whereIn('member_id', $memberIds)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('member_id')
            ->keyBy('member_id');

        $unreadCounts = ChatMessage::where('coach_id', $coachId)
            ->whereIn('member_id', $memberIds)
            ->where('is_from_coach', false)
            ->whereNull('read_at')
            ->selectRaw('member_id, count(*) as cnt')
            ->groupBy('member_id')
            ->pluck('cnt', 'member_id');

        $conversations = collect();
        foreach ($lastMessages as $memberId => $lastMsg) {
            $member = $members->get($memberId);
            if (! $member) {
                continue;
            }
            $conversations->push((object) [
                'member'       => $member,
                'last_message' => $lastMsg,
                'unread_count' => $unreadCounts->get($memberId, 0),
            ]);
        }

        return $conversations->sortByDesc(fn ($c) => $c->last_message->created_at)->values();
    }

    /**
     * پیام‌های بین مربی و یک عضو
     */
    public function getMessages(int $coachId, int $memberId, int $perPage = 50): LengthAwarePaginator
    {
        return ChatMessage::where('coach_id', $coachId)
            ->where('member_id', $memberId)
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);
    }

    /**
     * ارسال پیام از طرف مربی
     */
    public function sendFromCoach(int $coachId, int $memberId, string $body): ChatMessage
    {
        return ChatMessage::create([
            'coach_id'      => $coachId,
            'member_id'     => $memberId,
            'body'          => $body,
            'is_from_coach' => true,
        ]);
    }

    /**
     * علامت‌زدن پیام‌های یک مکالمه به عنوان خوانده‌شده
     */
    public function markAsRead(int $coachId, int $memberId): void
    {
        ChatMessage::where('coach_id', $coachId)
            ->where('member_id', $memberId)
            ->where('is_from_coach', false)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }
}
