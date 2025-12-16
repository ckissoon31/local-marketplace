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
        Schema::create('trade_offers', function (Blueprint $table) {

            $table->id();
            $table->foreignId('proposed_by_user_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('requested_product_id')->index()->constrained('products')->onDelete('cascade');
            $table->decimal('cash_offer',10, 2)->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'accepted', 'declined', 'cancelled'])->default('pending');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_offers');
    }
};
