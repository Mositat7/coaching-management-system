# توسعه بخش «ساخت برنامه ورزشی» (Workouts-add)

## وضعیت فعلی
- **ویو:** صفحه ساخت برنامه با روزهای هفته، کتابخانه تمرین (هاردکد در JS)، کارت تمرین، ذخیره فقط Toast (بدون بک‌اند).
- **کنترلر:** فقط `add()` و برگرداندن ویو بدون داده.
- **دیتا:** کتابخانه از جدول `workout_exercises` استفاده نمی‌کند.

## هدف
- برنامه ورزشی در دیتابیس ذخیره شود.
- کتابخانه تمرینات از دسته‌بندی تمرین‌ها (MuscleGroup → MuscleSubGroup → WorkoutExercise) لود شود.
- امکان ویرایش و نمایش برنامه ذخیره‌شده.

---

## فاز ۱: دیتابیس و مدل‌ها

### جداول پیشنهادی

| جدول | توضیح |
|------|--------|
| `workout_plans` | برنامه ورزشی (نام، توضیحات، مربی) |
| `workout_plan_days` | روزهای برنامه (روز هفته، عنوان، مدت، سطح، نکات) |
| `workout_plan_day_exercises` | تمرین هر روز (ارتباط با workout_exercises یا نام دستی، ست/تکرار/استراحت) |

### مدل‌ها
- `WorkoutPlan` → hasMany `WorkoutPlanDay`
- `WorkoutPlanDay` → belongsTo `WorkoutPlan`, hasMany `WorkoutPlanDayExercise`
- `WorkoutPlanDayExercise` → belongsTo `WorkoutPlanDay`, belongsTo `WorkoutExercise` (nullable برای تمرین دستی)

---

## فاز ۲: اتصال کتابخانه به دیتابیس

- در `WorkoutsController::add()` تمرینات را با `WorkoutExercise::with('muscleSubGroup.muscleGroup')` بگیر و به ویو پاس بده.
- در ویو کتابخانه را از این داده رندر کن (یا به صورت JSON در data attribute برای JS).

---

## فاز ۳: ذخیره برنامه (Store)

- روت: `POST /Workouts-add` یا `POST /plans` با نام `plans.store`.
- Request اعتبارسنجی: نام برنامه اجباری، آرایه روزها، هر روز آرایه تمرینات.
- در کنترلر: ایجاد `WorkoutPlan`، برای هر روز `WorkoutPlanDay`، برای هر تمرین `WorkoutPlanDayExercise` (با workout_exercise_id یا custom_name).

---

## فاز ۴: ویرایش و نمایش

- `edit($id)`: لود برنامه با روزها و تمرینات، پر کردن فرم.
- `show($id)`: نمایش فقط‌خواندنی برنامه.
- روت‌های مربوط: `GET /Workouts-edit/{id}`, `GET /Workouts-show/{id}`, `PUT/PATCH` برای آپدیت.

---

## ترتیب پیاده‌سازی پیشنهادی
1. ✅ مایگریشن‌ها + مدل‌ها (WorkoutPlan, WorkoutPlanDay, WorkoutPlanDayExercise)
2. ✅ پاس دادن تمرینات به ویو و پر کردن کتابخانه از سرور
3. ✅ روت و متد store برای ذخیره برنامه
4. صفحه ویرایش و نمایش (اختیاری در مرحله بعد)

---

## انجام‌شده (فاز ۱–۳)
- **مایگریشن‌ها:** `workout_plans`, `workout_plan_days`, `workout_plan_day_exercises`
- **مدل‌ها:** `WorkoutPlan`, `WorkoutPlanDay`, `WorkoutPlanDayExercise`
- **کنترلر:** `add()` با `$exerciseLibrary` از `WorkoutExercise::with('muscleSubGroup.muscleGroup')`
- **ویو:** کتابخانه از `window.exerciseLibraryFromServer`؛ state روزها با `saveCurrentDayToState` / `loadDayExercises` / `loadDaySettings`
- **ذخیره:** `POST plans.store` با JSON (name, description, days با exercises). ریدایرکت با پیام موفقیت یا پاسخ JSON در صورت `Accept: application/json`.
- **استاب توابع:** showHelp, clearCurrentDay, showExerciseModal, filterExercises, addSet, handleDragOver/handleDrop و بقیه برای جلوگیری از خطای JS.
