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
            $table->foreignId('cls_id')->constrained('cls')->cascodeOnDelete();
            $table->foreignId('group_id')->constrained('groups')->cascodeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascodeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascodeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->cascodeOnDelete();
            $table->string('title')->nullable();

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
