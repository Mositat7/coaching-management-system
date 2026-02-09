<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * جدول زیرمجموعه‌های هر عضله (جلو بازو، پشت بازو، ...)
     */
    public function up(): void
    {
        Schema::create('muscle_sub_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muscle_group_id')->constrained('muscle_groups')->cascadeOnDelete();
            $table->string('name');                           // نام: جلو بازو، پشت بازو
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('muscle_sub_groups');
    }
};
