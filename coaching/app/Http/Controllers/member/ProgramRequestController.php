<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\ProgramRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ProgramRequestController extends Controller
{
    /**
     * ثبت درخواست برنامه توسط شاگرد
     */
    public function store(Request $request): RedirectResponse
    {
        $memberId = Session::get('member_id');
        if (! $memberId) {
            return redirect()->route('dashboard.member')->with('error', 'لطفاً ابتدا وارد شوید.');
        }

        $validated = $request->validate([
            'type' => ['required', Rule::in([ProgramRequest::TYPE_WORKOUT, ProgramRequest::TYPE_NUTRITION])],
            'body' => ['nullable', 'string', 'max:2000'],
        ], [
            'type.required' => 'نوع برنامه را انتخاب کنید.',
            'type.in'       => 'نوع برنامه نامعتبر است.',
        ]);

        ProgramRequest::create([
            'member_id' => $memberId,
            'type'      => $validated['type'],
            'body'      => $request->input('body') ? trim($request->input('body')) : null,
            'status'    => ProgramRequest::STATUS_PENDING,
        ]);

        return redirect()->route('dashboard.member')
            ->with('success', 'درخواست برنامه با موفقیت ثبت شد. مربی در اسرع وقت آن را بررسی می‌کند.');
    }
}
