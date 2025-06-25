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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('administator_id')->nullable();
            $table->foreignId('teacher_id')->nullable();
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('administrator')->nullable();
            $table->string('teach')->nullable();
            $table->string('student')->nullable();
            $table->string('m_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
