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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolios');
            $table->foreignId('stock_id')->constrained('stocks');
            $table->foreignId('trade_type')->constrained('trade_type');
            $table->integer('quantity');
            $table->float('price_per_stock');
            $table->float('total_amount');
            $table->timestamp('trade_time');
            $table->foreignId('status')->constrained('trade_statuses');
            $table->timestamp('queue_time');
            $table->timestamp('completion_time');
            $table->string('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
