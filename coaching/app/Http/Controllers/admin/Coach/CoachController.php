<?php

namespace App\Http\Controllers\admin\Coach;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Coach\StoreCoachRequest;
use App\Services\Coach\CoachService;
use Illuminate\Support\Facades\Log;
class CoachController extends Controller
{
    /**
     * Display a listing of coaches
     */
    public function index(Request $request)
    {
        $coaches = Coach::search($request->get('search'))
            ->whenStatus($request->get('status'))
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.coaches.coach-list', compact('coaches'));
    }

    /**
     * Display the specified coach
     */
    public function show(string $id)
    {
        $coach = Coach::findOrFail($id);
        return view('admin.coaches.coach-show', compact('coach'));
    }

    /**
     * Show the form for creating a new coach
     */
    public function add()
    {
        $nextCode = Coach::generateCode();
        return view('admin.coaches.coach-add', compact('nextCode'));
    }

    /**
     * Store a newly created coach
     */

    public function store(StoreCoachRequest $request, CoachService $coachService)
    {
        try {
            $coach = $coachService->createFromRequest($request->validated());

            return redirect()->route('Coach.add')
                ->with('success', "مربی با کد {$coach->code} با موفقیت ثبت شد.");
        } catch (\Exception $e) {
            Log::error('خطا در ثبت مربی: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'خطا در ثبت مربی.']);
        }
    }
    /**
     * Remove the specified coach
     */
    public function destroy($id, CoachService $coachService)
    {
        try {
            $coachService->destroyCoach($id);

            return back()->with('success', 'مربی با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'خطا در حذف مربی: ' . $e->getMessage()
            ]);
        }
    }
}
