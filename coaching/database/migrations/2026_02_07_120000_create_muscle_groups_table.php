<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * جدول عضلات (بازو، پا، سینه، ...)
     */
    public function up(): void
    {
        Schema::create('muscle_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // نام فارسی: بازو، پا، سینه
            $table->string('icon')->nullable();        // نام آیکون ریمیکس: ri-armchair-line
            $table->string('color_slug', 20)->default('primary'); // primary|success|danger|warning|info برای استایل کارت
            $table->unsignedSmallInteger('sort_order')->default(0); // ترتیب نمایش
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('muscle_groups');
    }
};
