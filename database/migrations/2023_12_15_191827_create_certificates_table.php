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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->refers('id')->on('users')->onDelete('cascade');
            $table->foreignId('teacher_id')->refers('id')->on('teachers')->onDelete('cascade')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->string('request')->default('requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
