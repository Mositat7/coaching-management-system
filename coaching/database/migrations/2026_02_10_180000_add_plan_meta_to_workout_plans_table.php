<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * خلاصه برنامه، تجهیزات، نکات ایمنی، تعداد هفته، سطح، کالری تخمینی
     */
    public function up(): void
    {
        Schema::table('workout_plans', function (Blueprint $table) {
            $table->unsignedTinyInteger('weeks_count')->default(4);
            $table->string('level', 20)->default('medium');
            $table->unsignedSmallInteger('estimated_calories')->nullable();
            $table->text('equipment')->nullable();
            $table->text('safety_notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('workout_plans', function (Blueprint $table) {
            $table->dropColumn([
                'weeks_count',
                'level',
                'estimated_calories',
                'equipment',
                'safety_notes',
            ]);
        });
    }
};
