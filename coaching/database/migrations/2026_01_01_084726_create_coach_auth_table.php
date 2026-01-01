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
        Schema::create('coach_auth', function (Blueprint $table) {
            $table->id();

            // ارتباط با مربی
            $table->foreignId('coach_id')
                ->constrained('coaches')
                ->onDelete('cascade');

            // اطلاعات OTP
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->integer('otp_attempts')->default(0);
            $table->timestamp('otp_blocked_until')->nullable();

            // اطلاعات لاگین
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('last_login_device')->nullable();

            // تایم‌استمپ‌ها
            $table->timestamps();

            // ایندکس‌ها
            $table->index(['coach_id', 'otp_code']);
            $table->index('otp_expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_auth');
    }
};
