<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();

            // اطلاعات پایه
            $table->string('full_name');
            $table->string('mobile')->unique();

            // تصویر پروفایل
            $table->string('avatar')->nullable();

            // اطلاعات حرفه‌ای
            $table->integer('experience_years')->default(0);
            $table->text('biography')->nullable();
            $table->text('certificates')->nullable();
            $table->enum('training_style', ['strict', 'moderate', 'gentle'])->default('moderate');
            $table->json('specializations')->nullable();

            // کد و وضعیت
            $table->string('code')->unique();
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');

            // تایم‌استمپ‌ها
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
