<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Alur "Ganti Email" pada Pengelolaan Akun Guru (diagram 2):
    // butuh kode verifikasi sebelum email baru resmi dipakai.
    public function up(): void
    {
        Schema::create('email_change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('new_email');
            $table->string('verification_code', 6);
            $table->enum('status', ['pending', 'verified', 'expired', 'cancelled'])->default('pending');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_change_requests');
    }
};
