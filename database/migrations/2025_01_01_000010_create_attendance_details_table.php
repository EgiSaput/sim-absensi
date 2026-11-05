<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_session_id')->constrained('attendance_sessions')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->enum('status', ['HADIR', 'IZIN', 'SAKIT', 'ALFA'])->default('HADIR');
            $table->string('keterangan')->nullable();
            $table->timestamp('edited_at')->nullable();
            $table->timestamps();

            $table->unique(['attendance_session_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendance_details');
    }
};
