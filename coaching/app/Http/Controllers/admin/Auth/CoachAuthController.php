<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\CoachAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoachAuthController extends Controller
{
    public function showLoginForm()
    {
        // اگر کاربر قبلاً لاگین کرده، به داشبورد بفرست
        if (Session::has('coach_logged_in') && Session::has('coach_id')) {
            return redirect()->route('dashboard.index');
        }

        return view('admin.auth.coach-login');
    }

    public function sendOtp(Request $request)
    {
        // اگر کاربر قبلاً لاگین کرده، به داشبورد بفرست
        if (Session::has('coach_logged_in') && Session::has('coach_id')) {
            return redirect()->route('dashboard.index');
        }

        $request->validate([
            'mobile' => 'required|regex:/^09[0-9]{9}$/'
        ]);

        $coach = Coach::where('mobile', $request->mobile)->first();

        if (!$coach || $coach->status !== 'active') {
            return back()->withErrors(['mobile' => 'مربی یافت نشد یا حساب غیرفعال است.']);
        }

        $coachAuth = CoachAuth::firstOrCreate(['coach_id' => $coach->id]);

        $otp = rand(100000, 999999);
        // ذخیره OTP به صورت string برای اطمینان از مقایسه صحیح
        $coachAuth->update([
            'otp_code' => (string) $otp,
            'otp_expires_at' => now()->addMinutes(5),
            'otp_attempts' => 0,
            'otp_blocked_until' => null
        ]);

        Session::put([
            'otp_coach_id' => $coach->id,
            'otp_mobile' => $coach->mobile
        ]);

        // ذخیره session قبل از ریدایرکت
        Session::save();

        return redirect()->route('coach.verify')
            ->with('success', "کد تأیید برای {$coach->mobile} ارسال شد.")
            ->with('debug_otp', $otp); // فقط برای توسعه
    }

    public function showVerifyForm()
    {
        // اگر کاربر قبلاً لاگین کرده، به داشبورد بفرست
        if (Session::has('coach_logged_in') && Session::has('coach_id')) {
            return redirect()->route('dashboard.index');
        }

        // اگر session OTP وجود ندارد، به صفحه لاگین بفرست
        if (!Session::has('otp_coach_id') || !Session::has('otp_mobile')) {
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'لطفاً ابتدا شماره موبایل خود را وارد کنید.']);
        }

        $mobile = Session::get('otp_mobile');
        $masked = substr($mobile, 0, 4) . '***' . substr($mobile, 7);

        return view('admin.auth.coach-verify', compact('masked', 'mobile'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'otp_code' => 'required|digits:6'
        ]);

        // بررسی وجود session
        if (!Session::has('otp_coach_id') || !Session::has('otp_mobile')) {
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'لطفاً ابتدا شماره موبایل خود را وارد کنید.']);
        }

        // بررسی تطابق شماره موبایل
        if (Session::get('otp_mobile') !== $request->mobile) {
            return back()->withErrors(['otp_code' => 'اطلاعات نامعتبر است.']);
        }

        $coachId = Session::get('otp_coach_id');
        $coachAuth = CoachAuth::where('coach_id', $coachId)->first();

        if (!$coachAuth) {
            Session::forget(['otp_coach_id', 'otp_mobile']);
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'خطا در احراز هویت. لطفاً دوباره تلاش کنید.']);
        }

        // بررسی کد OTP - تبدیل هر دو به string برای مقایسه صحیح
        $storedOtp = (string) $coachAuth->otp_code;
        $enteredOtp = (string) trim($request->otp_code);
        
        if ($storedOtp !== $enteredOtp) {
            return back()->withErrors(['otp_code' => 'کد تأیید صحیح نیست.']);
        }

        // بررسی انقضای کد
        if ($coachAuth->otp_expires_at && now()->gt($coachAuth->otp_expires_at)) {
            Session::forget(['otp_coach_id', 'otp_mobile']);
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'کد منقضی شده است. لطفاً دوباره کد دریافت کنید.']);
        }

        // ورود موفق - دریافت اطلاعات مربی
        $coach = Coach::find($coachId);
        
        if (!$coach || $coach->status !== 'active') {
            Session::forget(['otp_coach_id', 'otp_mobile']);
            return redirect()->route('coach.login')
                ->withErrors(['message' => 'حساب کاربری شما غیرفعال است.']);
        }

        // تنظیم session برای ورود
        Session::put([
            'coach_logged_in' => true,
            'coach_id' => $coach->id,
            'coach_name' => $coach->full_name
        ]);

        // پاک کردن session های OTP
        Session::forget(['otp_coach_id', 'otp_mobile']);

        // ذخیره session قبل از ریدایرکت
        Session::save();

        // ریدایرکت به داشبورد
        return redirect()->route('dashboard.index')
            ->with('success', "خوش آمدید {$coach->full_name}!");
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('coach.login');
    }
}
