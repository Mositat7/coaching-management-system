<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * روزهای برنامه (شنبه=0 تا جمعه=6 یا سفارشی)
     */
    public function up(): void
    {
        Schema::create('workout_plan_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_plan_id')->constrained('workout_plans')->cascadeOnDelete();
            $table->unsignedTinyInteger('day_index')->default(0); // 0-6 برای روز هفته
            $table->string('title')->nullable();
            $table->string('focus')->nullable();
            $table->unsignedSmallInteger('duration_minutes')->default(60);
            $table->string('difficulty', 20)->default('medium'); // easy, medium, hard
            $table->text('notes')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_plan_days');
    }
};
