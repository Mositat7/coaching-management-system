# پیشنهاد کامیت‌ها بر اساس تغییرات

از داخل پوشه `coaching` اجرا کنید.

---

## گزینه ۱: چند کامیت جدا (پیشنهادی)

```bash
# ۱) مدل‌ها و مایگریشن‌های دسته‌بندی تمرین
git add app/Models/MuscleGroup.php app/Models/MuscleSubGroup.php app/Models/WorkoutExercise.php
git add database/migrations/2026_02_07_120000_create_muscle_groups_table.php database/migrations/2026_02_07_120001_create_muscle_sub_groups_table.php database/migrations/2026_02_07_120002_create_workout_exercises_table.php
git commit -m "feat(db): افزودن مدل‌ها و مایگریشن‌های muscle_groups، muscle_sub_groups و workout_exercises"

# ۲) سیدر گروه عضلات
git add database/seeders/MuscleGroupSeeder.php database/seeders/DatabaseSeeder.php
git commit -m "feat(db): افزودن MuscleGroupSeeder و فراخوانی در DatabaseSeeder"

# ۳) درخواست‌های اعتبارسنجی
git add app/Http/Requests/WorkoutCategory/
git commit -m "feat(validation): افزودن Form Requestهای StoreMuscleGroup، StoreMuscleSubGroup و StoreWorkoutExercise"

# ۴) کنترلر و روت‌ها
git add app/Http/Controllers/admin/workouts/category/CategoryController.php routes/web.php
git commit -m "feat(workout): کنترلر دسته‌بندی تمرین با CRUD عضله/زیرمجموعه/حرکت و روت‌های حذف"

# ۵) ویو و استایل صفحه دسته‌بندی
git add resources/views/admin/plans/workout/Categories/categories.blade.php public/assets/css/pages/workout-categories.css
git commit -m "feat(workout): ویو و استایل صفحه دسته‌بندی تمرین با منوی کارت و دراپ‌داون"

# ۶) رفع لود تکراری اسکریپت
git add resources/views/layouts/master.blade.php
git commit -m "fix(layout): حذف لود تکراری vendor.js برای جلوگیری از تداخل Bootstrap"

# ۷) مستندات
git add docs/
git commit -m "docs: افزودن مستند توسعه صفحه دسته‌بندی تمرین‌ها"
```

---

## گزینه ۲: یک کامیت برای همه تغییرات

```bash
git add app/Http/Controllers/admin/workouts/category/CategoryController.php
git add app/Http/Requests/WorkoutCategory/
git add app/Models/MuscleGroup.php app/Models/MuscleSubGroup.php app/Models/WorkoutExercise.php
git add database/seeders/DatabaseSeeder.php database/seeders/MuscleGroupSeeder.php
git add database/migrations/2026_02_07_120000_create_muscle_groups_table.php database/migrations/2026_02_07_120001_create_muscle_sub_groups_table.php database/migrations/2026_02_07_120002_create_workout_exercises_table.php
git add public/assets/css/pages/workout-categories.css
git add resources/views/admin/plans/workout/Categories/categories.blade.php
git add resources/views/layouts/master.blade.php
git add routes/web.php
git add docs/

git commit -m "feat(workout): صفحه دسته‌بندی تمرین (عضلات، زیرمجموعه، حرکات) با CRUD و حذف

- مدل‌ها و مایگریشن‌های muscle_groups، muscle_sub_groups، workout_exercises
- سیدر MuscleGroupSeeder
- Form Request برای اعتبارسنجی
- کنترلر CategoryController با store/destroy برای عضله و تمرین
- ویو categories با منوی کارت و دراپ‌داون
- استایل workout-categories.css و رفع نمایش دراپ‌داون
- حذف لود تکراری vendor.js در layout
- مستندات توسعه"
```

---

## خلاصه پیام‌ها

| دسته | پیام کامیت |
|------|------------|
| مدل + مایگریشن | `feat(db): افزودن مدل‌ها و مایگریشن‌های muscle_groups، muscle_sub_groups و workout_exercises` |
| سیدر | `feat(db): افزودن MuscleGroupSeeder و فراخوانی در DatabaseSeeder` |
| Request | `feat(validation): افزودن Form Requestهای StoreMuscleGroup، StoreMuscleSubGroup و StoreWorkoutExercise` |
| کنترلر + روت | `feat(workout): کنترلر دسته‌بندی تمرین با CRUD و روت‌های حذف` |
| ویو + CSS | `feat(workout): ویو و استایل صفحه دسته‌بندی تمرین با منوی کارت و دراپ‌داون` |
| لایهٔ اصلی | `fix(layout): حذف لود تکراری vendor.js برای جلوگیری از تداخل Bootstrap` |
| مستندات | `docs: افزودن مستند توسعه صفحه دسته‌بندی تمرین‌ها` |
