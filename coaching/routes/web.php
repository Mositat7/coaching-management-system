<?php
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
    Route::post('/Workouts-category', [CategoryController::class, 'store'])->name('workouts.category.store');
    Route::post('/Workouts-category/exercise', [CategoryController::class, 'storeExercise'])->name('workouts.category.exercise.store');
    Route::post('/Workouts-category/subgroup', [CategoryController::class, 'storeSubGroup'])->name('workouts.category.subgroup.store');
    Route::delete('/Workouts-category/muscle/{muscleGroup}', [CategoryController::class, 'destroyMuscleGroup'])->name('workouts.category.muscle.destroy');
    Route::delete('/Workouts-category/exercise/{exercise}', [CategoryController::class, 'destroyExercise'])->name('workouts.category.exercise.destroy');
    
    // بخش برنامه تمرینی
    Route::get('/Workouts-add', [WorkoutsController::class, 'add'])->name('plans.create');
    Route::post('/Workouts-add', [WorkoutsController::class, 'store'])->name('plans.store');
    Route::get('/Workouts-edit', [WorkoutsController::class, 'edit'])->name('Workouts.edit');
    Route::put('/Workouts-edit/{plan}', [WorkoutsController::class, 'update'])->name('Workouts.update');
    Route::get('/Workouts-show/{plan}', [WorkoutsController::class, 'show'])->name('Workouts.show');
    
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
    Route::get('/Coach-list', [CoachController::class, 'index'])->name('Coach.list');
    Route::get('/Coach-show/{id}', [CoachController::class, 'show'])->name('Coach.show');
    Route::get('/Coach-add', [CoachController::class, 'add'])->name('Coach.add');
    Route::post('/Coach-store', [CoachController::class, 'store'])->name('Coach.store');
    Route::delete('/Coach-delete/{id}', [CoachController::class, 'destroy'])->name('Coach.destroy');
});

// ======================
// Member Routes (راه‌های بخش عضو - بدون نیاز به لاگین ادمین)
// ======================
Route::get('/dashboard/member', [\App\Http\Controllers\member\DashboardController::class, 'index'])->name('dashboard.member');
