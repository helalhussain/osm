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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 40)->default('OSMS');
            $table->string('currency_text', 10)->default('GBP');
            $table->string('currency_symbol', 5)->default('£');
            $table->string('tution_fee',100)->default('550');
            $table->string('timezone', 50)->nullable();
            $table->string('logo')->nullable();
            $table->string('dark_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('default_image')->nullable();
            $table->boolean('force_ssl')->default(false)->comment('0: disabled, 1: active');
            $table->boolean('secure_password')->default(false)->comment('0: disabled, 1: active');
            $table->boolean('agree')->default(false)->comment('0: disabled, 1: active');
            $table->boolean('registration')->default(false)->comment('0: Off, 1: On');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
