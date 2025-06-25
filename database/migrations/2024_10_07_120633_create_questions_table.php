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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('classroom_id')->refers('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('teacher_id')->refers('id')->on('teachers')->onDelete('cascade');
            $table->string('classroom_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('quiz_id')->nullable();
            $table->string('type')->nullable();
            $table->text('question')->nullable();
            $table->string('image_title_a')->nullable();
            $table->string('image_title_b')->nullable();
            $table->string('image_title_c')->nullable();
            $table->string('image_title_d')->nullable();
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('c')->nullable();
            $table->string('d')->nullable();
            $table->string('ans')->nullable();
            $table->string('mark')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
