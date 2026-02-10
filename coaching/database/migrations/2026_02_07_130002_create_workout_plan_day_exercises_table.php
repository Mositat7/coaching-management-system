<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * تمرین هر روز برنامه (از کتابخانه یا دستی)
     */
    public function up(): void
    {
        Schema::create('workout_plan_day_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_plan_day_id')->constrained('workout_plan_days')->cascadeOnDelete();
            $table->foreignId('workout_exercise_id')->nullable()->constrained('workout_exercises')->nullOnDelete();
            $table->string('custom_name')->nullable(); // وقتی از کتابخانه نباشد
            $table->unsignedTinyInteger('sets_count')->default(3);
            $table->string('reps_text', 50)->nullable(); // e.g. "10-12" or "تا ناتوانی"
            $table->unsignedSmallInteger('rest_seconds')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_plan_day_exercises');
    }
};
