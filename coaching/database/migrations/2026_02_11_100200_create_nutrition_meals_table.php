<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_plan_day_id')->constrained('nutrition_plan_days')->cascadeOnDelete();
            $table->string('name');
            $table->string('time_text', 50)->nullable();
            $table->unsignedSmallInteger('calories')->default(0);
            $table->string('priority', 20)->default('required'); // required, optional, if_possible
            $table->text('description')->nullable();
            $table->json('items_json')->nullable(); // مواد غذایی این وعده به صورت JSON ساده
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_meals');
    }
};

