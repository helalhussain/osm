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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained('classrooms')->cascodeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascodeOnDelete();
            $table->string('title')->nullable();
            // $table->string('slug')->unique();
            $table->string('fee')->nullable();
            $table->string('discount')->nullable();
            // $table->foreignId('subject_id')->constrained('subjects')->cascodeOnDelete();
            // $table->foreignId('teacher_id')->constrained('teachers')->cascodeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
