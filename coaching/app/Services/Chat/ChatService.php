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
     * علامت‌زدن پیام‌های یک مکالمه به عنوان خوانده‌شده (توسط مربی)
     */
    public function markAsRead(int $coachId, int $memberId): void
    {
        ChatMessage::where('coach_id', $coachId)
            ->where('member_id', $memberId)
            ->where('is_from_coach', false)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    /**
     * پیام‌های مکالمه شاگرد با مربی خودش
     */
    public function getMessagesForMember(int $memberId, int $perPage = 50): LengthAwarePaginator
    {
        $member = Member::find($memberId);
        if (! $member || ! $member->coach_id) {
            return new LengthAwarePaginator([], 0, $perPage);
        }

        return $this->getMessages($member->coach_id, $memberId, $perPage);
    }

    /**
     * ارسال پیام از طرف شاگرد
     */
    public function sendFromMember(int $memberId, string $body): ChatMessage
    {
        $member = Member::find($memberId);
        if (! $member || ! $member->coach_id) {
            throw new \InvalidArgumentException('عضو یا مربی معتبر نیست.');
        }

        return ChatMessage::create([
            'coach_id'      => $member->coach_id,
            'member_id'     => $memberId,
            'body'          => $body,
            'is_from_coach' => false,
        ]);
    }

    /**
     * علامت‌زدن پیام‌های مربی به عنوان خوانده‌شده توسط شاگرد
     */
    public function markCoachMessagesAsReadByMember(int $memberId): void
    {
        $member = Member::find($memberId);
        if (! $member || ! $member->coach_id) {
            return;
        }

        ChatMessage::where('coach_id', $member->coach_id)
            ->where('member_id', $memberId)
            ->where('is_from_coach', true)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    /**
     * ویرایش پیام توسط مربی (فقط پیام‌های خودش)
     */
    public function updateByCoach(int $messageId, int $coachId, string $body): ?ChatMessage
    {
        $msg = ChatMessage::where('id', $messageId)
            ->where('coach_id', $coachId)
            ->where('is_from_coach', true)
            ->first();

        if (! $msg) {
            return null;
        }

        $msg->update(['body' => $body, 'edited_at' => now()]);

        return $msg->fresh();
    }

    /**
     * حذف پیام توسط مربی (فقط پیام‌های خودش)
     */
    public function deleteByCoach(int $messageId, int $coachId): bool
    {
        $msg = ChatMessage::where('id', $messageId)
            ->where('coach_id', $coachId)
            ->where('is_from_coach', true)
            ->first();

        if (! $msg) {
            return false;
        }

        return $msg->delete();
    }

    /**
     * ویرایش پیام توسط شاگرد (فقط پیام‌های خودش)
     */
    public function updateByMember(int $messageId, int $memberId, string $body): ?ChatMessage
    {
        $msg = ChatMessage::where('id', $messageId)
            ->where('member_id', $memberId)
            ->where('is_from_coach', false)
            ->first();

        if (! $msg) {
            return null;
        }

        $msg->update(['body' => $body, 'edited_at' => now()]);

        return $msg->fresh();
    }

    /**
     * حذف پیام توسط شاگرد (فقط پیام‌های خودش)
     */
    public function deleteByMember(int $messageId, int $memberId): bool
    {
        $msg = ChatMessage::where('id', $messageId)
            ->where('member_id', $memberId)
            ->where('is_from_coach', false)
            ->first();

        if (! $msg) {
            return false;
        }

        return $msg->delete();
    }
}
