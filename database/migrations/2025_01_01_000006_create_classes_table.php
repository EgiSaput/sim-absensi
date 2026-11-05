<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Nama tabel "classes" (bukan "class", reserved word di PHP).
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // contoh: X IPA 1
            $table->string('grade_level'); // X, XI, XII
            $table->foreignId('homeroom_teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
