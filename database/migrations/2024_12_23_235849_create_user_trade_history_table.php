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
        Schema::create('user_trade_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('stock_id')->constrained('stocks');
            $table->foreignId('trade_type')->constrained('trade_type');
            $table->integer('quantity');
            $table->float('price_per_stock');
            $table->float('total_amount');
            $table->float('transaction_fee');
            $table->timestamp('trade_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_trade_history');
    }
};
