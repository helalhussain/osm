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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->refers('id')->nullable();
            $table->foreignId('course_id')->refers('id')->nullable();
            $table->foreignId('admin_id')->refers('id')->nullable();
            $table->foreignId('administator_id')->nullable();
            $table->foreignId('teacher_id')->nullable();
            $table->string('user_type')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            // $table->string('dateline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
