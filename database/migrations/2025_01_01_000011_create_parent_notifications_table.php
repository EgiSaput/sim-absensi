<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parent_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_detail_id')->constrained('attendance_details')->cascadeOnDelete();
            $table->boolean('sent')->default(false);
            $table->timestamp('sent_at')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_notifications');
    }
};
