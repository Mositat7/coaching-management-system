<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('goal', 50)->nullable(); // weight_loss, muscle_gain, ...
            $table->string('level', 30)->nullable(); // beginner, intermediate, advanced
            $table->unsignedSmallInteger('duration_days')->default(7);
            $table->unsignedSmallInteger('daily_calories')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->json('supplements')->nullable();
            $table->json('restrictions')->nullable();
            $table->foreignId('coach_id')->nullable()->constrained('coaches')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_plans');
    }
};

