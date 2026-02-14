<?php

namespace App\Services\Member;

use App\Models\Coach;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MemberListService
{
    /**
     * دریافت لیست اعضا با فیلترها
     */
    public function getFilteredMembers(Request $request): LengthAwarePaginator
    {
        $query = Member::query()->with('coach');

        $this->applySearchFilter($query, $request);
        
        if ($request->filled('status')) {
            $this->applyStatusFilter($query, $request->status);
        }
        
        $this->applySubscriptionTypeFilter($query, $request);
        $this->applyCoachFilter($query, $request);

        return $query->latest('id')->paginate(15)->withQueryString();
    }

    /**
     * اعمال فیلتر جستجو
     */
    private function applySearchFilter($query, Request $request): void
    {
        if ($search = $request->filled('search') ? $request->search : null) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }
    }

    /**
     * اعمال فیلتر وضعیت - از کنترلر شما کپی شده
     */
    private function applyStatusFilter($query, string $status): void
    {
        if ($status === 'suspended') {
            $query->where('status', 'suspended');
            return;
        }
        if ($status === 'expired') {
            $query->whereNotNull('subscription_expires_at')
                ->where('subscription_expires_at', '<', now())
                ->where('status', '!=', 'suspended');
            return;
        }
        if ($status === 'expiring_soon') {
            $query->whereNotNull('subscription_expires_at')
                ->where('subscription_expires_at', '>=', now())
                ->where('subscription_expires_at', '<=', now()->addDays(7))
                ->where('status', '!=', 'suspended');
            return;
        }
        if ($status === 'active') {
            $query->where('status', '!=', 'suspended')
                ->where(function ($q) {
                    $q->whereNull('subscription_expires_at')
                        ->orWhere('subscription_expires_at', '>', now()->addDays(7));
                });
        }
    }

    /**
     * اعمال فیلتر نوع اشتراک
     */
    private function applySubscriptionTypeFilter($query, Request $request): void
    {
        if ($request->filled('subscription_type')) {
            $query->where('subscription_type', $request->subscription_type);
        }
    }

    /**
     * اعمال فیلتر مربی
     */
    private function applyCoachFilter($query, Request $request): void
    {
        if ($request->filled('coach_id')) {
            $query->where('coach_id', $request->coach_id);
        }
    }

    /**
     * دریافت آمار اعضا
     */
    public function getStats(): array
    {
        return [
            'total'          => Member::count(),
            'active'         => $this->countBySubscriptionStatus('active'),
            'expiring_soon'  => $this->countBySubscriptionStatus('expiring_soon'),
            'today_attendance' => 0,
        ];
    }

    /**
     * دریافت لیست مربیان
     */
    public function getCoaches()
    {
        return Coach::orderBy('full_name')->get(['id', 'full_name']);
    }

    /**
     * شمارش بر اساس وضعیت اشتراک - از کنترلر شما کپی شده
     */
    private function countBySubscriptionStatus(string $status): int
    {
        $q = Member::query();
        $this->applyStatusFilter($q, $status);

        return $q->count();
    }
}