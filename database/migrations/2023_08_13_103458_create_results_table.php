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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->refers('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('teacher_id')->refers('id')->on('teachers')->onDelete('cascade');
            $table->foreignId('administator_id')->refers('id')->on('administators')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->string('request')->default('requested');
            $table->boolean('status')->default(true)->comment('0: disabled, 1: active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
