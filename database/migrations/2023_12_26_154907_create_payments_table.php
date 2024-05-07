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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('charge')->default(0);
            $table->decimal('grand_total')->nullable();
            $table->string('btc_wallet')->nullable();
            $table->string('trx')->nullable();
            $table->enum('status', ['pending','success','cancel'])->default('pending');
            $table->string('method')->default('stripe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
