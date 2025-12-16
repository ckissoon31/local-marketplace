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
        Schema::create('product_trade_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index()->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('trade_offer_id')->index()->nullable()->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_trade_offer');
    }
};
