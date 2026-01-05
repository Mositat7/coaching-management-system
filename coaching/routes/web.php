<?php
//
//use App\Http\Controllers\admin\Coach\CoachController;
//use App\Http\Controllers\admin\Dashboard\DashboardController;
//use App\Http\Controllers\admin\Members\MemberController;
//use App\Http\Controllers\admin\nutrition\NutritionController;
//use App\Http\Controllers\admin\plans\PlanController;
//use App\Http\Controllers\admin\workouts\category\CategoryController;
//use App\Http\Controllers\admin\workouts\WorkoutsController;
//use Illuminate\Support\Facades\Route;
////داشبورد
//Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
//Route::view('/coach/login', 'admin.auth.coach-login')->name('coach.send-otp');
//Route::view('/coach/verify', 'admin.auth.coach-verify')->name('coach.verify');
////برنامه غذایی
//Route::get('/nutrition-add', [NutritionController::class, 'create'])->name('nutrition.create');
//Route::get('/nutrition-edit', [NutritionController::class, 'edit'])->name('nutrition.edit');
//Route::get('/nutrition-show', [NutritionController::class, 'show'])->name('nutrition.show');
////کتگوری عضلات
//Route::get('/Workouts-category', [CategoryController::class, 'index'])->name('Workouts.category');
////بخش برنامه تمرینی
//Route::get('/Workouts-add', [WorkoutsController::class, 'add'])->name('plans.create');
//Route::get('/Workouts-edit', [WorkoutsController::class, 'edit'])->name('Workouts.edit');
//Route::get('/Workouts-show', [WorkoutsController::class, 'show'])->name('Workouts.show');
////منطق عمومی مدیریت برنامه‌ها
//Route::get('/Plan-list', [PlanController::class, 'list'])->name('plans.list');
//Route::get('/Plan-assign', [PlanController::class, 'assign'])->name('plans.assign');
//Route::get('/Plan-library', [PlanController::class, 'library'])->name('plans.library');
////بحش عضو ها
//Route::get('/members-add', [MemberController::class, 'add'])->name('members.add');
//Route::get('/members-details', [MemberController::class, 'details'])->name('members.details');
//Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
//Route::get('/members-grid', [MemberController::class, 'grid'])->name('members.grid');
//// بخش مربی
//Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
////تنظیمات ورود
//Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
////داشبورد عضویت ها
//Route::get('/dashboard', [\App\Http\Controllers\member\DashboardController::class, 'index'])->name('dashboard.member');


use App\Http\Controllers\admin\Auth\CoachAuthController;
use App\Http\Controllers\admin\Coach\CoachController;
use App\Http\Controllers\admin\Dashboard\DashboardController;
use App\Http\Controllers\admin\Members\MemberController;
use App\Http\Controllers\admin\nutrition\NutritionController;
use App\Http\Controllers\admin\plans\PlanController;
use App\Http\Controllers\admin\workouts\category\CategoryController;
use App\Http\Controllers\admin\workouts\WorkoutsController;
use Illuminate\Support\Facades\Route;

// ======================
// Auth Routes for Coaches
// ======================
// تست سیستم
Route::get('/test-system', function() {
    try {
        // تست Coach model
        $coachCount = \App\Models\admin\Coach::count();
        $coachAuthCount = \App\Models\admin\CoachAuth::count();

        return response()->json([
            'status' => 'OK',
            'coach_table_exists' => $coachCount !== null,
            'coach_auth_table_exists' => $coachAuthCount !== null,
            'coach_count' => $coachCount,
            'coach_auth_count' => $coachAuthCount,
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
});
Route::prefix('coach')->name('coach.')->group(function () {
    Route::get('/login', [CoachAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/send-otp', [CoachAuthController::class, 'sendOtp'])->name('send-otp');
    Route::get('/verify', [CoachAuthController::class, 'showVerifyForm'])->name('verify');
    Route::post('/verify-otp', [CoachAuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/logout', [CoachAuthController::class, 'logout'])->name('logout');
});

// ======================
// Redirect Routes
// ======================

// ریدایرکت /login به /coach/login
Route::get('/login', function () {
    return redirect()->route('coach.login');
});

// ریدایرکت روت اصلی
Route::get('/', function () {
    return redirect()->route('coach.login');
});

// ======================
// Admin Routes (راه‌های بخش ادمین - نیاز به لاگین)
// ======================
Route::middleware('auth.coach')->group(function () {
    // داشبورد
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // برنامه غذایی
    Route::get('/nutrition-add', [NutritionController::class, 'create'])->name('nutrition.create');
    Route::get('/nutrition-edit', [NutritionController::class, 'edit'])->name('nutrition.edit');
    Route::get('/nutrition-show', [NutritionController::class, 'show'])->name('nutrition.show');
    
    // کتگوری عضلات
    Route::get('/Workouts-category', [CategoryController::class, 'index'])->name('Workouts.category');
    
    // بخش برنامه تمرینی
    Route::get('/Workouts-add', [WorkoutsController::class, 'add'])->name('plans.create');
    Route::get('/Workouts-edit', [WorkoutsController::class, 'edit'])->name('Workouts.edit');
    Route::get('/Workouts-show', [WorkoutsController::class, 'show'])->name('Workouts.show');
    
    // منطق عمومی مدیریت برنامه‌ها
    Route::get('/Plan-list', [PlanController::class, 'list'])->name('plans.list');
    Route::get('/Plan-assign', [PlanController::class, 'assign'])->name('plans.assign');
    Route::get('/Plan-library', [PlanController::class, 'library'])->name('plans.library');
    
    // بخش عضوها
    Route::get('/members-add', [MemberController::class, 'add'])->name('members.add');
    Route::get('/members-details', [MemberController::class, 'details'])->name('members.details');
    Route::get('/members-list', [MemberController::class, 'list'])->name('members.list');
    Route::get('/members-grid', [MemberController::class, 'grid'])->name('members.grid');
    
    // بخش مربی
    Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
});

// ======================
// Member Routes (راه‌های بخش عضو - بدون نیاز به لاگین ادمین)
// ======================
Route::get('/dashboard/member', [\App\Http\Controllers\member\DashboardController::class, 'index'])->name('dashboard.member');
