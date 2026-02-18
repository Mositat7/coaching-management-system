<?php

namespace App\Http\Controllers\admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProgramRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function index(Request $request): View
    {
        $coachId = (int) Session::get('coach_id');
        $memberIds = \App\Models\Member::where('coach_id', $coachId)->pluck('id');

        $query = Order::query()->with('member')->where('coach_id', $coachId);

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($qb) use ($q) {
                $qb->where('goal', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhereHas('member', fn ($m) => $m->where('full_name', 'like', "%{$q}%")->orWhere('mobile', 'like', "%{$q}%"));
            });
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $orders = $query->latest('created_at')->paginate(15)->withQueryString();

        $statsQuery = Order::where('coach_id', $coachId);
        if ($request->filled('q')) {
            $q = $request->q;
            $statsQuery->where(function ($qb) use ($q) {
                $qb->where('goal', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhereHas('member', fn ($m) => $m->where('full_name', 'like', "%{$q}%")->orWhere('mobile', 'like', "%{$q}%"));
            });
        }
        if ($request->filled('type')) {
            $statsQuery->where('type', $request->type);
        }
        if ($request->filled('status')) {
            $statsQuery->where('status', $request->status);
        }
        if ($request->filled('priority')) {
            $statsQuery->where('priority', $request->priority);
        }

        $stats = [
            'total'    => $statsQuery->count(),
            'accepted' => (clone $statsQuery)->where('status', 'accepted')->count(),
            'pending'  => (clone $statsQuery)->where('status', 'pending')->count(),
            'rejected' => (clone $statsQuery)->where('status', 'rejected')->count(),
        ];

        $programRequests = ProgramRequest::whereIn('member_id', $memberIds)
            ->with('member')
            ->latest('created_at')
            ->paginate(15, ['*'], 'pr_page')
            ->withQueryString();

        $prBase = ProgramRequest::whereIn('member_id', $memberIds);
        $prStats = [
            'pending'     => (clone $prBase)->where('status', 'pending')->count(),
            'in_progress' => (clone $prBase)->where('status', 'in_progress')->count(),
            'done'        => (clone $prBase)->where('status', 'done')->count(),
        ];

        return view('admin.orders.index', [
            'orders'          => $orders,
            'stats'           => $stats,
            'request'         => $request,
            'programRequests' => $programRequests,
            'prStats'         => $prStats,
        ]);
    }

    /**
     * به‌روزرسانی وضعیت درخواست برنامه (از پنل شاگرد)
     */
    public function updateProgramRequest(Request $request, int $id): RedirectResponse
    {
        $coachId = (int) Session::get('coach_id');
        $memberIds = \App\Models\Member::where('coach_id', $coachId)->pluck('id');

        $pr = ProgramRequest::whereIn('member_id', $memberIds)->findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,in_progress,done',
        ]);

        $pr->update(['status' => $request->status]);

        return redirect()->route('orders.index', $request->only(['q', 'type', 'status', 'priority']))
            ->with('success', 'وضعیت درخواست برنامه به‌روز شد.');
    }
}
